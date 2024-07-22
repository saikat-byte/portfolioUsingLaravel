<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // Create a user using the User model
        Admin::create([
            'name' => 'saikat',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // Hash the password using bcrypt
        ]);
    }
}
