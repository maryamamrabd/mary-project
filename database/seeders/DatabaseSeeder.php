<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $role = Role::create([
            'name' => "Admin"
        ]);


        User::create([
            'full_name' => 'Admin Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make("password"),
            'role_id' => $role->id
        ]);
    }
}
