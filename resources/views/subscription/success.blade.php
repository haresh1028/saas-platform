
@extends('layouts.app')

@section('title', 'Subscription Successful')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <!-- Success Icon -->
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-6">
                <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <!-- Success Message -->
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                Welcome to {{ $subscription->plan->name }}!
            </h2>
            <p class="text-lg text-gray-600 mb-8">
                Your subscription has been activated successfully. You now have access to all {{ $subscription->plan->name }} features.
            </p>

            <!-- Subscription Details -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8 text-left">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Subscription Details</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Plan:</span>
                        <span class="font-medium text-gray-900">{{ $subscription->plan->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Price:</span>
                        <span class="font-medium text-gray-900">${{ number_format($subscription->plan->price, 2) }}/{{ $subscription->plan->billing_cycle }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Started:</span>
                        <span class="font-medium text-gray-900">{{ $subscription->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Next Billing:</span>
                        <span class="font-medium text-gray-900">{{ $subscription->next_billing_date->format('M d, Y') }}</span>
                    </div>
                    @if($subscription->plan->features->count() > 0)
                        <div class="pt-4 border-t border-gray-200">
                            <span class="text-gray-600 block mb-2">Included Features:</span>
                            <div class="space-y-2">
                                @foreach($subscription->plan->features as $feature)
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-sm text-gray-700">{{ $feature->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="{{ route('dashboard') }}" class="w-full flex justify-center py-3 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Go to Dashboard
                </a>
                
                <div class="flex space-x-4">
                    <a href="{{ route('subscription.plans') }}" class="flex-1 flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        View All Plans
                    </a>
                    <a href="#" class="flex-1 flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Download Receipt
                    </a>
                </div>
            </div>

            <!-- Help Text -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">
                    Need help getting started? 
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Contact our support team</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection