@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4">Create New Plan</h4>

    <form method="POST" action="{{ route('admin.plans.store') }}">
        @csrf
        @include('admin.plans._form', ['plan' => null])
    </form>
</div>
@endsection
