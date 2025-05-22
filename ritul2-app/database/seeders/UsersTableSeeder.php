<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $ownerRole = Role::where('name', 'campaign_owner')->first();

        if (!$adminRole || !$ownerRole) {
            dd('Roles not found! Run RolesTableSeeder first.');
        }

        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id, // Use Eloquent model
            ],
            [
                'name' => 'Campaign Owner',
                'email' => 'owner@example.com',
                'password' => Hash::make('password'),
                'role_id' => $ownerRole->id,
            ],
        ]);
    }
}

