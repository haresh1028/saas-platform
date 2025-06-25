@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Role</h1>
    <form method="POST" action="{{ route('admin.roles.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Assign Permissions</label><br>
            @foreach ($permissions as $permission)
                <label>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"> {{ $permission->name }}
                </label><br>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
