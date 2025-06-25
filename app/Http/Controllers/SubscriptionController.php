<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class SubscriptionController extends Controller
{
    public function __construct(private SubscriptionService $subscriptionService) {}

    public function plans()
    {
        $plans = Plan::where('is_active', true)->with('features')->get();
        $currentPlan = auth()->user()->activeSubscription?->plan;

        return view('subscription.plans', compact('plans', 'currentPlan'));
    }

    public function subscribe(Request $request, Plan $plan)
    {
        $request->validate([
            'payment_method' => 'required|in:card,paypal,bank',
        ]);

        try {
            $paymentData = [
                'method' => $request->payment_method,
                'transaction_id' => 'fake_' . uniqid(),
            ];

            $subscription = $this->subscriptionService->subscribe(auth()->user(), $plan, $paymentData);

            // ✅ Send invoice email
            Mail::to(auth()->user()->email)->queue(new InvoiceMail($subscription));

            return redirect()
                ->route('admin.dashboard')
                ->with('success', "Successfully subscribed to {$plan->name} plan!");
        } catch (\Exception $e) {
            report($e);
            return back()->with('error', 'Subscription failed. Please try again.');
        }
    }

    public function cancel()
    {
        $this->subscriptionService->cancelActiveSubscription(auth()->user());

        return redirect()->route('subscription.plans')->with('success', 'Subscription cancelled successfully.');
    }
}
