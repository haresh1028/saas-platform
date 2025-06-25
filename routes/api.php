<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectTeamController;
use App\Http\Controllers\Api\ProjectApiController;

// ✅ Public login route
Route::post('/login', [AuthController::class, 'login']);

// ✅ Protected routes
Route::middleware(['auth:sanctum'])->group(function () {

    // Assign team to project (requires permission)
    Route::post('/projects/{project}/assign-team', [ProjectTeamController::class, 'assign'])
        ->middleware('permission:project.assign-team');

    // List projects (optional permission check)
    Route::get('/projects', [ProjectApiController::class, 'index'])
        ->middleware('permission:project.view-any'); // remove if not needed
});
