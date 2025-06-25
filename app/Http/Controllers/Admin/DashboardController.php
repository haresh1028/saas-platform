<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Plan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'active_subscriptions' => Subscription::where('status', 'active')->count(),
            'total_revenue' => $this->calculateTotalRevenue(),
            'monthly_revenue' => $this->calculateMonthlyRevenue(),
        ];

        $recentUsers = User::latest()->limit(5)->get();
        $recentSubscriptions = Subscription::with(['user', 'plan'])
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentSubscriptions'));
    }

    public function users(Request $request)
    {
        $query = User::with(['activeSubscription.plan', 'roles']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('plan')) {
            $query->whereHas('activeSubscription.plan', function($q) use ($request) {
                $q->where('slug', $request->plan);
            });
        }

        $users = $query->paginate(15);
        $plans = Plan::all();

        return view('admin.users', compact('users', 'plans'));
    }

    private function calculateTotalRevenue()
    {
        return Subscription::join('plans', 'subscriptions.plan_id', '=', 'plans.id')
            ->where('subscriptions.status', 'active')
            ->sum('plans.price');
    }

    private function calculateMonthlyRevenue()
    {
        return Subscription::join('plans', 'subscriptions.plan_id', '=', 'plans.id')
            ->where('subscriptions.status', 'active')
            ->whereMonth('subscriptions.created_at', now()->month)
            ->sum('plans.price');
    }
}
