@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">My Projects</h1>
        
        @if($canCreateProject)
            <a href="{{ route('projects.create') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                Create New Project
            </a>
        @else
            <div class="text-right">
                <p class="text-red-600 text-sm mb-2">Project limit reached</p>
                <a href="{{ route('subscription.plans') }}" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-200">
                    Upgrade Plan
                </a>
            </div>
        @endif
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    @if($projects->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $project->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                        
                        <div class="flex items-center justify-between">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $project->status === 'active' ? 'bg-green-100 text-green-800' : 
                                   ($project->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ ucfirst($project->status) }}
                            </span>
                            
                            <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                View Details
                            </a>
                        </div>
                        
                        <div class="mt-3 text-sm text-gray-500">
                            Created: {{ $project->created_at->format('M j, Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <div class="max-w-md mx-auto">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No Projects Yet</h3>
                <p class="text-gray-600 mb-6">Get started by creating your first project.</p>
                
                @if($canCreateProject)
                    <a href="{{ route('projects.create') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                        Create Your First Project
                    </a>
                @else
                    <p class="text-red-600 mb-4">You've reached your project limit.</p>
                    <a href="{{ route('subscription.plans') }}" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-200">
                        Upgrade to Create More Projects
                    </a>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection