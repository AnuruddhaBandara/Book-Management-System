<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create roles
         Role::create(['name' => 'admin', 'guard_name' => 'staff']);
         Role::create(['name' => 'editor', 'guard_name' => 'staff']);
         Role::create(['name' => 'viewer', 'guard_name' => 'staff']);
         Role::create(['name' => 'reader', 'guard_name' => 'reader']);
    }
}
