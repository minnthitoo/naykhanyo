<?php

namespace Database\Seeders;

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
        // create roles
        \App\Models\Role::factory()->create([
            'name' => 'superadmin'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'admin'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'user'
        ]);


        // create users
        \App\Models\User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@naykhanyo.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@naykhanyo.com',
            'password' => Hash::make('password'),
            'role_id' => 3
        ]);
    }
}
