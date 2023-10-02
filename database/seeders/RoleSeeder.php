<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         /// Create permissions
        Permission::create(['name' => 'view books', 'guard_name' => 'staff']);
        Permission::create(['name' => 'edit books', 'guard_name' => 'staff']);
        Permission::create(['name' => 'delete books', 'guard_name' => 'staff']);
        Permission::create(['name' => 'manage staff', 'guard_name' => 'staff']);
        Permission::create(['name' => 'assign books', 'guard_name' => 'staff']);
        Permission::create(['name' => 'add books', 'guard_name' => 'staff']);
        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'staff']);
        $adminRole->syncPermissions(['view books', 'edit books', 'delete books', 'manage staff', 'assign books','add books']);

        $viewerRole = Role::create(['name' => 'viewer', 'guard_name' => 'staff']);
        $viewerRole->givePermissionTo('view books');

        $editorRole = Role::create(['name' => 'editor', 'guard_name' => 'staff']);
        $editorRole->syncPermissions(['edit books', 'assign books']);

        #Reader
        // Create permission for 'see borrow history'
        Permission::create(['name' => 'see borrow history', 'guard_name' => 'reader']);

        // Create 'reader' role and assign permission
        $readerRole = Role::create(['name' => 'reader', 'guard_name' => 'reader']);
        $readerRole->givePermissionTo('see borrow history');
    }
}
