<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ResourceEditorRoleSeeder extends Seeder
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
        Permission::create(['name' => 'moderate resource']);


        // create roles and assign created permissions

        $role = Role::create(['name' => 'resource editor']);
        $role->givePermissionTo(['moderate resource']);

    }
}
