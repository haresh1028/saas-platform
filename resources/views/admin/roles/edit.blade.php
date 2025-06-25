@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Role</h1>
    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>

        <div class="mb-3">
            <label>Assign Permissions</label><br>
            @foreach ($permissions as $permission)
                <label>
                    <input type="checkbox" name="permissions[]"
                           value="{{ $permission->id }}"
                           {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                    {{ $permission->name }}
                </label><br>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
