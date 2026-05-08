<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'huellas:submit',
            'huellas:moderate',
            'huellas:feature',
            'huellas:unpublish',
            'huellas:delete',
            'huellas:read',
            'huellas:submit_own',
            'huellas:read_own_status',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles = [
            'superadmin'           => $permissions,
            'admin_mesa'           => ['huellas:submit','huellas:moderate','huellas:feature','huellas:unpublish','huellas:read'],
            'editor'               => ['huellas:submit','huellas:read'],
            'rector'               => ['huellas:submit_own','huellas:read_own_status','huellas:read'],
            'ciudadano_registrado' => ['huellas:read'],
            'anonimo'              => ['huellas:read'],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}