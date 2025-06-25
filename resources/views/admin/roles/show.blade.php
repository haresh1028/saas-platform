@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>User Role Details</h4>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $user->id }}
                    </div>
                    @include('admin.roles.partials.user_info')

                    <div class="mt-3">
                        <a href="{{ route('admin.roles.edit', $user) }}" class="btn btn-warning">Edit Role</a>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
