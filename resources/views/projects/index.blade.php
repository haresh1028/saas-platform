@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0">My Projects</h1>
        
        {{-- @if($canCreateProject) --}}
        <a href="{{ route('projects.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Create New Project
        </a>
        {{-- @else
        <div class="text-end">
            <p class="text-danger small mb-2">Project limit reached</p>
            <a href="{{ route('subscription.plans') }}" class="btn btn-success">
                Upgrade Plan
            </a>
        </div>
        @endif --}}
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Projects Grid -->
    @if($projects->count() > 0)
        <div class="row g-4">
            @foreach($projects as $project)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold text-dark">{{ $project->name }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($project->description, 100) }}</p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="badge 
                                    {{ $project->status === 'active' ? 'bg-success' :
                                       ($project->status === 'completed' ? 'bg-primary' : 'bg-secondary') }}">
                                    {{ ucfirst($project->status) }}
                                </span>

                                <a href="{{ route('projects.show', $project) }}" class="text-decoration-none text-primary fw-medium">
                                    View Details
                                </a>
                            </div>

                            <div class="text-muted small mt-2">
                                Created: {{ $project->created_at->format('M j, Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-folder2-open display-1 text-secondary"></i>
            </div>
            <h3 class="fw-semibold">No Projects Yet</h3>
            <p class="text-muted">Get started by creating your first project.</p>

            @if($canCreateProject)
                <a href="{{ route('projects.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle me-1"></i> Create Your First Project
                </a>
            @else
                <p class="text-danger mt-3">You've reached your project limit.</p>
                <a href="{{ route('subscription.plans') }}" class="btn btn-success">
                    Upgrade to Create More Projects
                </a>
            @endif
        </div>
    @endif

</div>
@endsection
