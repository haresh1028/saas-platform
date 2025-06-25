<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectTeamController extends Controller
{
    public function assign(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:member,lead',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::find($request->user_id);

        // Attach with role in pivot
        $project->team()->syncWithoutDetaching([
            $user->id => ['role' => $request->role],
        ]);

        return response()->json([
            'message' => "{$user->name} assigned as {$request->role} to project {$project->name}."
        ]);
    }
}
