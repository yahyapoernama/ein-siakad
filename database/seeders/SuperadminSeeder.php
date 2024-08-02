<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $username = 'superadmin';
        if (!User::where('username', $username)->exists()) {
            $roleId = UserRole::create([
                'name' => 'Superadmin',
            ])->id;
    
            User::create([
                'name' => 'Superadmin',
                'username' => $username,
                'role_id' => $roleId,
                'email' => 'superadmin@aliasesein.com',
                'password' => Hash::make('superadmin'),
            ]);
        }
    }
}
