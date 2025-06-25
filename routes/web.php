<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;


Route::get('/', fn () => view('welcome'));

// Authenticated & verified user routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Subscription
    Route::prefix('subscription')->name('subscription.')->group(function () {
        Route::get('/plans', [SubscriptionController::class, 'plans'])->name('plans');
        Route::post('/subscribe/{plan}', [SubscriptionController::class, 'subscribe'])->name('subscribe');
        Route::post('/cancel', [SubscriptionController::class, 'cancel'])->name('cancel');
    });

    // Projects
    Route::middleware('check.project.limit')->group(function () {
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    });

    Route::resource('projects', ProjectController::class)->except(['create', 'store']);
    
    Route::post('/projects/{project}/assign-team', [ProjectController::class, 'assignTeamMember'])
        ->name('projects.assign-team')
        ->middleware('can:team_assignment');
});

// Admin-only routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Users
        Route::resource('users', UserController::class);

        // Roles
        // Route::resource('roles', RoleController::class);

        // Permissions
        // Route::resource('permissions', PermissionController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    });

require __DIR__ . '/auth.php';
