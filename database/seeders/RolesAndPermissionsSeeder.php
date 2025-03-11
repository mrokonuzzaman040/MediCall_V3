<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // User permissions
            'view profile',
            'edit profile',
            
            // Admin permissions
            'manage users',
            'view users',
            'create users',
            'edit users',
            'delete users',
            
            // Super admin permissions
            'manage roles',
            'manage permissions',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions if they don't exist already
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        $userPermissions = Permission::whereIn('name', ['view profile', 'edit profile'])->get();
        $userRole->syncPermissions($userPermissions);

        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminPermissions = Permission::whereIn('name', [
            'view profile',
            'edit profile',
            'manage users',
            'view users',
            'create users',
            'edit users',
            'delete users',
        ])->get();
        $adminRole->syncPermissions($adminPermissions);

        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $superAdminRole->syncPermissions(Permission::all());
    }
}
