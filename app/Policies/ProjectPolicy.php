<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ProjectPolicy
{
    public function view(User $user, Project $project): bool
    {
        return $user->id === $project->user_id || $project->teamMembers()->where('user_id', $user->id)->exists();
    }

    public function update(User $user, Project $project): bool
    {
        return $user->id === $project->user_id;
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->id === $project->user_id;
    }

    public function assignTeam(User $user, Project $project)
    {
        return $user->hasPermissionTo('project.assign-team');
    }
}
