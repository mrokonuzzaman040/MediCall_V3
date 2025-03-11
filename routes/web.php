<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard redirect based on role
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Super Admin routes - using custom middleware
    Route::middleware(['auth', 'app.role:super_admin'])->prefix('superadmin')->group(function () {
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
        
        // User management
        Route::resource('users', UserManagementController::class);
        
        // Role & Permission management
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });
    
    // Admin routes - using custom middleware
    Route::middleware(['auth', 'app.role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    });
    
    // User routes - using custom middleware
    Route::middleware(['auth', 'app.role:user'])->prefix('user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::put('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
    });
});
