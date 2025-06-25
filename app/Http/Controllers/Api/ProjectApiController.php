<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    public function index(Request $request)
    {
        // Optionally filter based on user, plan, etc.
        $projects = Project::query()
            ->with('team') // eager load team if needed
            ->paginate(10); // paginate results

        return response()->json([
            'data' => $projects
        ]);
    }
}
