<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.roles.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::pluck('name'); // ✅ Use actual roles from DB
        return view('admin.roles.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->syncRoles([$request->role]);

        return redirect()->route('admin.roles.index')->with('success', 'Role assigned successfully!');
    }

    public function show(User $user)
    {
        return view('admin.roles.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all(); // All roles
        $permissions = Permission::all(); // All permissions
        $rolePermissions = $user->getAllPermissions()->pluck('id')->toArray(); // User's current permissions
        $currentRole = $user->roles->pluck('name')->first(); // For role dropdown

        return view('admin.roles.edit', compact('user', 'roles', 'permissions', 'rolePermissions', 'currentRole'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $user->syncRoles([$request->role]); // Assign role

        // Optional: assign direct permissions
        $permissionNames = Permission::whereIn('id', $request->permissions ?? [])
            ->pluck('name')
            ->toArray();
        $user->syncPermissions($permissionNames);

        return redirect()->route('admin.roles.index')->with('success', 'Role and permissions updated!');
    }

    public function destroy(User $user)
    {
        $user->syncRoles(['User']); // ✅ Reset to default User role
        return redirect()->route('admin.roles.index')->with('success', 'Role reset to User successfully!');
    }
}
