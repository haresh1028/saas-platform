@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Role for {{ $user->name }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.roles.update', $user) }}">
                        @csrf
                        @method('PUT')

                        @include('admin.roles.partials.user_info')

                        <div class="mb-3">
                            <label for="role" class="form-label">New Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" name="role" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $currentRole === $role->name ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Role</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
