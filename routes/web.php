<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    // pofile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Subscription routes
    Route::prefix('subscription')->name('subscription.')->group(function () {
        Route::get('/plans', [SubscriptionController::class, 'plans'])->name('plans');
        Route::post('/subscribe/{plan}', [SubscriptionController::class, 'subscribe'])->name('subscribe');
        Route::post('/cancel', [SubscriptionController::class, 'cancel'])->name('cancel');
    });

    // Project routes
    Route::resource('projects', ProjectController::class);
    Route::post('/projects/{project}/assign-team', [ProjectController::class, 'assignTeamMember'])
        ->name('projects.assign-team')
        ->middleware('can:team_assignment');
    
    // Apply project limit middleware to create routes
    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->name('projects.create')
        ->middleware('check.project.limit');
    
    Route::post('/projects', [ProjectController::class, 'store'])
        ->name('projects.store')
        ->middleware('check.project.limit');
});

// Admin routes
// middleware(['auth', 'role:admin'])->
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [DashboardController::class, 'users'])->name('users');

    Route::resource('users', UserController::class);
    //  Route::resource('roles', RoleController::class);
    
    Route::resource('permissions', PermissionController::class);

});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{user}', [RoleController::class, 'show'])->name('roles.show'); // 👈 add this
    Route::get('roles/{user}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{user}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{user}', [RoleController::class, 'destroy'])->name('roles.destroy');
});


require __DIR__.'/auth.php';