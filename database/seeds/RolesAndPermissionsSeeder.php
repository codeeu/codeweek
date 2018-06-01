<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'create event']);
        Permission::create(['name' => 'update event']);
        Permission::create(['name' => 'moderate event']);

        Permission::create(['name' => 'create school']);
        Permission::create(['name' => 'update school']);

        Permission::create(['name' => 'generate certificate']);
        Permission::create(['name' => 'view activities']);


        // create roles and assign created permissions

        $role = Role::create(['name' => 'member']);
        $role->givePermissionTo(['create event','create school']);

        $role = Role::create(['name' => 'event owner']);
        $role->givePermissionTo(['update event', 'generate certificate']);

        $role = Role::create(['name' => 'ambassador']);
        $role->givePermissionTo(['moderate event']);

        $role = Role::create(['name' => 'school manager']);
        $role->givePermissionTo(['update school','generate certificate']);

        $role = Role::create(['name' => 'super admin']);
        $role->givePermissionTo(Permission::all());
    }
}
