<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Count regular users (users with 'user' role)
        $usersCount = User::role('user')->count();
        
        return view('dashboards.admin', compact('usersCount'));
    }

    // User management methods
    public function users()
    {
        $users = User::role('user')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Additional methods for user management
}
