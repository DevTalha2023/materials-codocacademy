<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [

            'manage webinars',

            'manage attendees',

            'manage materials',

            'manage access',

            'view reports',

            'view activity logs',
        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        }

        $adminRole = Role::firstOrCreate([
            'name' => 'Admin',
        ]);

        $studentRole = Role::firstOrCreate([
            'name' => 'Student',
        ]);

        $adminRole->syncPermissions($permissions);
    }
}
