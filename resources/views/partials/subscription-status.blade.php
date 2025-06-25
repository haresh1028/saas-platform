@if(auth()->check())
    @php
        $subscription = auth()->user()->activeSubscription;
    @endphp
    
    @if($subscription)
        <!-- Active Subscription Status -->
        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <h3 class="text-sm font-medium text-green-800">
                        Active Subscription: {{ $subscription->plan->name }}
                    </h3>
                    <div class="mt-1 text-sm text-green-700">
                        <p>Next billing: {{ $subscription->next_billing_date->format('M d, Y') }}</p>
                        <p class="mt-1">${{ number_format($subscription->plan->price, 2) }} per {{ $subscription->plan->billing_cycle }}</p>
                    </div>
                </div>
                <div class="ml-3">
                    <a href="{{ route('subscription.plans') }}" class="text-sm text-green-600 hover:text-green-800 font-medium">
                        Manage
                    </a>
                </div>
            </div>
        </div>
    @else
        <!-- No Active Subscription -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <h3 class="text-sm font-medium text-yellow-800">
                        No Active Subscription
                    </h3>
                    <div class="mt-1 text-sm text-yellow-700">
                        <p>Subscribe to a plan to access premium features.</p>
                    </div>
                </div>
                <div class="ml-3">
                    <a href="{{ route('subscription.plans') }}" class="text-sm text-yellow-600 hover:text-yellow-800 font-medium">
                        View Plans
                    </a>
                </div>
            </div>
        </div>
    @endif
@endif