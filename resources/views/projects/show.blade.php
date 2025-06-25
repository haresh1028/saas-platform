@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Project Title -->
    <div class="mb-4">
        <h1 class="h2 fw-bold">{{ $project->name }}</h1>
    </div>

    <!-- Project Details -->
    <div class="card mb-5">
        <div class="card-header">
            <h5 class="mb-0">Project Details</h5>
        </div>
        <div class="card-body">
            <div class="row gy-3">
                <div class="col-md-6"><strong>Description:</strong> {{ $project->description ?: '—' }}</div>
                <div class="col-md-6"><strong>Status:</strong> {{ ucfirst($project->status) }}</div>
                <div class="col-md-6"><strong>Start Date:</strong> {{ optional($project->start_date)->format('M j, Y') ?: 'N/A' }}</div>
                <div class="col-md-6"><strong>End Date:</strong> {{ optional($project->end_date)->format('M j, Y') ?: 'N/A' }}</div>
                <div class="col-md-6"><strong>Created At:</strong> {{ $project->created_at->format('M j, Y') }}</div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Team Members</h5>
        </div>

        <div class="card-body">
            @if($canAssignTeams)
                <form action="{{ route('projects.assign-team', $project->id) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label class="form-label">Select User</label>
                            <select name="user_id" class="form-select" required>
                                @foreach(\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="member">Member</option>
                                <option value="lead">Lead</option>
                            </select>
                        </div>

                        <div class="col-md-4 d-grid">
                            <button type="submit" class="btn btn-primary">
                                Assign Member
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert alert-warning">
                    Team assignment is not available in your plan.
                    <a href="{{ route('subscription.plans') }}" class="text-decoration-underline">Upgrade now</a>.
                </div>
            @endif

            <!-- Members Table -->
            @if($teamMembers->count())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teamMembers as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td class="text-capitalize">{{ $member->pivot->role }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted mt-3">No team members assigned yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
