<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Blogger']);

        //Permission::create(['name' => 'dashboard'])->syncRoles(['Admin', 'Blogger']);
        //Permission::create(['name' => 'post.index'])->syncRoles(['Admin', 'Blogger']);
        //Permission::create(['name' => 'post.show'])->syncRoles(['Admin', 'Blogger']);

        Permission::create(['name' => 'post.create'])->syncRoles(['Admin', 'Blogger']);
        Permission::create(['name' => 'post.store'])->syncRoles(['Admin', 'Blogger']);
        Permission::create(['name' => 'post.edit'])->syncRoles(['Admin', 'Blogger']);
        Permission::create(['name' => 'post.update'])->syncRoles(['Admin', 'Blogger']);
        Permission::create(['name' => 'post.destroy'])->syncRoles(['Admin', 'Blogger']);


        Permission::create(['name' => 'user.index'])->syncRoles(['Admin']);
        Permission::create(['name' => 'user.create'])->syncRoles(['Admin']);
        Permission::create(['name' => 'user.store'])->syncRoles(['Admin']);
        Permission::create(['name' => 'user.edit'])->syncRoles(['Admin']);
        Permission::create(['name' => 'user.update'])->syncRoles(['Admin']);
        Permission::create(['name' => 'user.show'])->syncRoles(['Admin']);
        Permission::create(['name' => 'user.destroy'])->syncRoles(['Admin']);

        
    }
}
