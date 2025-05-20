<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء دور Admin
        $adminRole = Role::create([
            'name' => "Admin"
        ]);

        // إنشاء دور Utilisateur
        $userRole = Role::create([
            'name' => "Utilisateur"
        ]);

        // إنشاء مستخدم Admin
        User::create([
            'full_name' => 'Admin Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make("password"),
            'role_id' => $adminRole->id
        ]);

        // إنشاء مستخدم Utilisateur
        User::create([
            'full_name' => 'Utilisateur Test',
            'email' => 'user@test.com',
            'password' => Hash::make("password"),
            'role_id' => $userRole->id
        ]);
    }
}
