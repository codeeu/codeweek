<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ResourceEditorRoleSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::firstOrCreate(['name' => 'moderate resource']);

        // create roles and assign created permissions

        $role = Role::firstOrCreate(['name' => 'resource editor']);
        $role->givePermissionTo(['moderate resource']);

    }
}
