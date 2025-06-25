@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Subscribe to a Plan</h2>

    <!-- Step 1: Choose Plan -->
    <div class="card mb-4" id="step-plan">
        <div class="card-header bg-light">
            <h5 class="mb-0">Step 1: Select a Plan</h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                @foreach ($plans as $plan)
                    <div class="col-md-4">
                        <div class="card h-100 {{ old('plan_id') == $plan->id ? 'border-primary' : '' }}">
                            <div class="card-body text-center">
                                <h4>{{ $plan->name }}</h4>
                                <p class="text-muted">
                                    @if($plan->price == 0)
                                        Free
                                    @else
                                        ${{ number_format($plan->price, 2) }} / month
                                    @endif
                                </p>
                                <ul class="list-unstyled small">
                                    @foreach($plan->features as $feature)
                                        <li><i class="bi bi-check-circle text-success me-1"></i>{{ $feature->name }}</li>
                                    @endforeach
                                </ul>
                                <button class="btn btn-outline-primary mt-3 w-100" onclick="selectPlan({{ $plan->id }}, '{{ $plan->name }}')">
                                    Select {{ $plan->name }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Step 2: Payment Method -->
    <div class="card d-none" id="step-payment">
        <div class="card-header bg-light">
            <h5 class="mb-0">Step 2: Choose Payment Method</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('subscription.subscribe', ['plan' => '__PLAN_ID__']) }}" id="subscribeForm">
                @csrf
                <input type="hidden" name="plan_id" id="plan_id">
                <input type="hidden" name="payment_method" id="payment_method" value="">

                <div class="mb-3">
                    <label class="form-label">Payment Method</label>
                    <div class="d-flex gap-3">
                        <button type="button" class="btn btn-outline-secondary" onclick="selectPayment('card')">Card</button>
                        <button type="button" class="btn btn-outline-secondary" onclick="selectPayment('paypal')">PayPal</button>
                        <button type="button" class="btn btn-outline-secondary" onclick="selectPayment('bank')">Bank Transfer</button>
                    </div>
                </div>

                <div id="selected-summary" class="d-none mb-3">
                    <p class="mb-0">Selected Plan: <strong id="selected-plan-name"></strong></p>
                    <p class="mb-0">Payment Method: <strong id="selected-method-name"></strong></p>
                </div>

                <button type="submit" class="btn btn-primary d-none mt-3" id="confirmBtn">
                    <i class="bi bi-check-circle"></i> Confirm Subscription
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let selectedPlanId = null;

    function selectPlan(planId, planName) {
        selectedPlanId = planId;
        document.getElementById('plan_id').value = planId;
        document.getElementById('subscribeForm').action = `/subscription/subscribe/${planId}`;

        document.getElementById('step-plan').classList.add('d-none');
        document.getElementById('step-payment').classList.remove('d-none');
        document.getElementById('selected-plan-name').textContent = planName;
    }

    function selectPayment(method) {
        document.getElementById('payment_method').value = method;
        document.getElementById('selected-method-name').textContent = method.charAt(0).toUpperCase() + method.slice(1);
        document.getElementById('selected-summary').classList.remove('d-none');
        document.getElementById('confirmBtn').classList.remove('d-none');
    }
</script>
@endpush
@endsection
