@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Roles</h1>

    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">Create Role</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ implode(', ', $role->permissions->pluck('name')->toArray()) }}</td>
                <td>
                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this role?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
