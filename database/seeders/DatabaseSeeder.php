<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create super admin
        \App\Models\User::create([
            'name' => 'Akmal Raditya Wijaya',
            'email' => 'superadmin@visitsmuhero.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
        ]);

        // Create regular admin
        \App\Models\User::create([
            'name' => 'Irsyadi Bagas',
            'email' => 'admin@visitsmuhero.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create sample teachers
        \App\Models\Teacher::create(['name' => 'Fahima Sholatin', 'subject' => 'Kepala Sekolah']);
        \App\Models\Teacher::create(['name' => 'Hilal Pratama', 'subject' => 'Waka Kurikulum']);
        \App\Models\Teacher::create(['name' => 'Dendi Andika', 'subject' => 'Pertanian&Perikanan']);
        \App\Models\Teacher::create(['name' => 'Yogi Pradana', 'subject' => 'Peternakan']);
    }
}
