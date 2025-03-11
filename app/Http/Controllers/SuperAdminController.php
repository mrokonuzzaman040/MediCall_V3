<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::count();
        $rolesCount = Role::count();
        $permissionsCount = Permission::count();
        
        return view('dashboards.superadmin', compact('usersCount', 'rolesCount', 'permissionsCount'));
    }

    // Additional methods for managing roles, permissions, etc.
}
