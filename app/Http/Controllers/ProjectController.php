<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Services\AuditService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->latest()->paginate(10);
        $canCreateProject = auth()->user()->canCreateProject();
        
        return view('projects.index', compact('projects', 'canCreateProject'));
    }

    public function create()
    {
        // if (!auth()->user()->canCreateProject()) {
        //     return redirect()->route('projects.index')
        //         ->with('error', 'You have reached your project limit.');
        // }
        
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        // if (!auth()->user()->canCreateProject()) {
        //     return redirect()->route('projects.index')
        //         ->with('error', 'You have reached your project limit.');
        // }

        $project = auth()->user()->projects()->create($request->only(['name', 'description', 'start_date', 'end_date']));


        AuditService::log('project_created', "Created project: {$project->name}", [], [
            'project_id' => $project->id,
            'project_name' => $project->name,
        ]);

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        // $this->authorize('view', $project);
        
        $teamMembers = $project->teamMembers;
        $canAssignTeams = auth()->user()->activeSubscription?->plan->can_assign_teams ?? false;
        
        return view('projects.show', compact('project', 'teamMembers', 'canAssignTeams'));
    }

    public function assignTeamMember(Request $request, Project $project)
    {
        $this->authorize('update', $project);
        
        if (!auth()->user()->activeSubscription?->plan->can_assign_teams) {
            return back()->with('error', 'Team assignment requires a higher subscription plan.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:member,lead',
        ]);

        $user = User::findOrFail($request->user_id);
        
        $project->teamMembers()->syncWithoutDetaching([
            $user->id => ['role' => $request->role]
        ]);

        AuditService::log('team_member_assigned', "Assigned {$user->name} to project: {$project->name}");

        return back()->with('success', 'Team member assigned successfully!');
    }
}