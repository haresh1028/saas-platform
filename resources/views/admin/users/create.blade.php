@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>{{ isset($user) ? 'Edit User' : 'Add User' }}</h2>

    <form method="POST" action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}">
        @csrf
        @if(isset($user)) @method('PUT') @endif

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password {{ isset($user) ? '(Leave blank to keep current)' : '' }}</label>
            <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
        </div>

        <button class="btn btn-success">{{ isset($user) ? 'Update' : 'Create' }} User</button>
    </form>
</div>
@endsection
