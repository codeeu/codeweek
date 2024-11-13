<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'create event']);
        Permission::create(['name' => 'update event']);
        Permission::create(['name' => 'moderate event']);

        Permission::create(['name' => 'create school']);
        Permission::create(['name' => 'update school']);

        Permission::create(['name' => 'generate certificate']);
        Permission::create(['name' => 'view activities']);
        // create permissions
        Permission::create(['name' => 'moderate resource']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'resource editor']);
        $role->givePermissionTo(['moderate resource']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'member']);
        $role->givePermissionTo(['create event', 'create school']);

        $role = Role::create(['name' => 'event owner']);
        $role->givePermissionTo(['update event', 'generate certificate']);

        $role = Role::create(['name' => 'ambassador']);
        $role->givePermissionTo(['moderate event']);

        $role = Role::create(['name' => 'school manager']);
        $role->givePermissionTo(['update school', 'generate certificate']);

        $role = Role::create(['name' => 'super admin']);
        $role->givePermissionTo(Permission::all());
    }
}
