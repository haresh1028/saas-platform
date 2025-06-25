@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Modules</h1>
    <x-permission-check module="modules" permission="create">
        <a href="{{ route('modules.create') }}" class="btn btn-primary">Add Module</a>
    </x-permission-check>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $module)
                    <tr>
                        <td>{{ $module->id }}</td>
                        <td>{{ $module->name }}</td>
                        <td><code>{{ $module->slug }}</code></td>
                        <td>{{ Str::limit($module->description, 50) }}</td>
                        <td>
                            <span class="badge {{ $module->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $module->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <x-permission-check module="modules" permission="read">
                                    <a href="{{ route('modules.show', $module) }}" class="btn btn-outline-info">View</a>
                                </x-permission-check>
                                <x-permission-check module="modules" permission="update">
                                    <a href="{{ route('modules.edit', $module) }}" class="btn btn-outline-warning">Edit</a>
                                </x-permission-check>
                                <x-permission-check module="modules" permission="delete">
                                    <form action="{{ route('modules.destroy', $module) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" 
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </x-permission-check>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ $modules->links() }}
    </div>
</div>
@endsection