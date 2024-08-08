<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LeadingTeacherRoleSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'submit resource']);

        // create roles and assign created permissions
        $leadingTeacherRole = Role::create(['name' => 'leading teacher']);
        $leadingTeacherRole->givePermissionTo(['submit resource']);

        $leadingTeacherAdminRole = Role::create(['name' => 'leading teacher admin']);

    }
}
