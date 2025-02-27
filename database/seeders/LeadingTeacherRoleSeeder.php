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

        // Check if permission already exists before creating
        $permission = Permission::firstOrCreate(['name' => 'submit resource']);

        // Check if role already exists before creating
        $leadingTeacherRole = Role::firstOrCreate(['name' => 'leading teacher']);
        if (!$leadingTeacherRole->hasPermissionTo($permission)) {
            $leadingTeacherRole->givePermissionTo($permission);
        }

        Role::firstOrCreate(['name' => 'leading teacher admin']);

        $this->command->info("✅ Leading Teacher roles and permissions seeded successfully!");
    }
}
