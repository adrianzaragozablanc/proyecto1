<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function editRoles()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();

        return view('admin.roles', compact('users', 'roles'));
    }

    public function updateRoles(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('admin.roles.edit')->with('success', 'Roles actualizados exitosamente.');
    }
}
