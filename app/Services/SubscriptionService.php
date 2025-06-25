<?php

namespace App\Services;

use App\Models\User;
use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionService
{
    public function subscribe(User $user, Plan $plan, array $paymentData = [])
    {
        return DB::transaction(function () use ($user, $plan, $paymentData) {
            // Cancel existing active subscription
            $this->cancelActiveSubscription($user);
            
            // Create new subscription
            $subscription = Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'status' => 'active',
                'starts_at' => now(),
                'expires_at' => $this->calculateExpiryDate($plan),
                'payment_method' => $paymentData['method'] ?? 'fake_payment',
                'transaction_id' => $paymentData['transaction_id'] ?? 'fake_' . uniqid(),
            ]);

            // Log the subscription change
            $this->logSubscriptionChange($user, 'subscription_created', $plan);

            return $subscription;
        });
    }

    public function cancelActiveSubscription(User $user)
    {
        $activeSubscription = $user->activeSubscription;
        
        if ($activeSubscription) {
            $activeSubscription->update(['status' => 'cancelled']);
            $this->logSubscriptionChange($user, 'subscription_cancelled', $activeSubscription->plan);
        }
    }

    public function checkExpiredSubscriptions()
    {
        $expiredSubscriptions = Subscription::where('status', 'active')
            ->where('expires_at', '<=', now())
            ->get();

        foreach ($expiredSubscriptions as $subscription) {
            $subscription->update(['status' => 'expired']);
            
            // Auto-subscribe to free plan
            $freePlan = Plan::where('name', 'Free')->first();
            if ($freePlan) {
                $this->subscribe($subscription->user, $freePlan);
            }
        }

        return $expiredSubscriptions->count();
    }

    private function calculateExpiryDate(Plan $plan)
    {
        $now = now();
        
        return match($plan->billing_cycle) {
            'monthly' => $now->addMonth(),
            'yearly' => $now->addYear(),
            default => $now->addMonth(),
        };
    }

    private function logSubscriptionChange(User $user, string $action, Plan $plan)
    {
        $user->auditLogs()->create([
            'action' => $action,
            'description' => "User {$action} for plan: {$plan->name}",
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'new_values' => ['plan_id' => $plan->id, 'plan_name' => $plan->name],
        ]);
    }
}