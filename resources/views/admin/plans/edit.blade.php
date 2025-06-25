@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4">Edit Plan</h4>

    <form method="POST" action="{{ route('admin.plans.update', $plan->id) }}">
        @csrf
        @method('PUT')
        @include('admin.plans._form', ['plan' => $plan])
    </form>
</div>
@endsection
