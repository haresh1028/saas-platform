@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="h3 mb-4 fw-bold text-dark">Admin Dashboard</h1>

        <!-- Stats Overview -->
        <div class="row g-4 mb-5">
            <!-- Total Users -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-people-fill fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-muted small">Total Users</div>
                            <div class="h5 mb-0">{{ $stats['total_users'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Subscriptions -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-check-circle-fill fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-muted small">Active Subscriptions</div>
                            <div class="h5 mb-0">{{ $stats['active_subscriptions'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Revenue -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-bar-chart-line-fill fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-muted small">Monthly Revenue</div>
                            <div class="h5 mb-0">${{ number_format($stats['monthly_revenue'], 2) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-purple bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-wallet-fill fs-5"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-muted small">Total Revenue</div>
                            <div class="h5 mb-0">${{ number_format($stats['total_revenue'], 2) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Lists -->
        <div class="row g-4">
            <!-- Recent Users -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-semibold">Recent Users</div>
                    <div class="card-body">
                        @foreach ($recentUsers as $user)
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <div>
                                    <div class="fw-semibold">{{ $user->name }}</div>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                                <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recent Subscriptions -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-semibold">Recent Subscriptions</div>
                    <div class="card-body">
                        @foreach ($recentSubscriptions as $subscription)
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <div>
                                    <div class="fw-semibold">{{ $subscription->user->name }}</div>
                                    <small class="text-muted">{{ $subscription->plan->name }} Plan</small>
                                </div>
                                <span
                                    class="badge {{ $subscription->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
