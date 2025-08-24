<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'firstname'   => 'System',
            'middlename'  => 'Admin',
            'lastname'    => 'User',
            'username'    => 'admin',
            'designation' => 'Administrator',
            'email'       => 'admin@example.com',
            'address'     => 'Main Office',
            'phone_num'   => '09123456789',
            'status'      => 'active',
            'password'    => Hash::make('password123'), // change this later
            'notify'      => true,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
