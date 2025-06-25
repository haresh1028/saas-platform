@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <!-- Title + Flash -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $project->name }}</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Project Details Card -->
    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Project Details</h2>
        <div class="grid md:grid-cols-2 gap-4 text-gray-700">
            <div><strong>Description:</strong> {{ $project->description ?: '—' }}</div>
            <div><strong>Status:</strong> {{ ucfirst($project->status) }}</div>
            <div><strong>Start Date:</strong> {{ optional($project->start_date)->format('M j, Y') ?: 'N/A' }}</div>
            <div><strong>End Date:</strong> {{ optional($project->end_date)->format('M j, Y') ?: 'N/A' }}</div>
            <div><strong>Created At:</strong> {{ $project->created_at->format('M j, Y') }}</div>
        </div>
    </div>

    <!-- Team Management Section -->
    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Team Members</h2>
        </div>

        @if($canAssignTeams)
            <form method="POST" action="{{ route('projects.assign-team', $project->id) }}" class="mb-6">
                @csrf
                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Select User</label>
                        <select name="user_id" class="w-full border-gray-300 rounded-md shadow-sm">
                            @foreach(\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Role</label>
                        <select name="role" class="w-full border-gray-300 rounded-md shadow-sm">
                            <option value="member">Member</option>
                            <option value="lead">Lead</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Assign Member
                        </button>
                    </div>
                </div>
            </form>
        @else
            <p class="text-sm text-red-500">Team assignment is not available in your plan.
                <a href="{{ route('subscription.plans') }}" class="underline text-blue-600">Upgrade now</a>.
            </p>
        @endif

        @if($teamMembers->count())
            <table class="min-w-full mt-4 text-sm border">
                <thead class="bg-gray-50 text-gray-700 uppercase tracking-wide">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Role</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach($teamMembers as $member)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $member->name }}</td>
                            <td class="px-4 py-2">{{ $member->email }}</td>
                            <td class="px-4 py-2 capitalize">{{ $member->pivot->role }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600 mt-4">No team members assigned yet.</p>
        @endif
    </div>

</div>
@endsection
