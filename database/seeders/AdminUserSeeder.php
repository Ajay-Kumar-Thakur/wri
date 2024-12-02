<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create the Super Admin User
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmins123456s@gmail.com',
            'password' => Hash::make('super'), 
            'is_admin' => true,  
        ]);

        // Create the Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admins123456s@example.com',  
            'password' => Hash::make('admin'), 
            'is_admin' => true,
        ]);

        // Create the Team User (Different role or team, but marked as admin)
        User::create([
            'name' => 'Team User',
            'email' => 'teams123456s@example.com',  
            'password' => Hash::make('team'),
            'is_admin' => true,
        ]);

        // Create the Data Entry User
        User::create([
            'name' => 'Data Entry User',
            'email' => 'dataentrys123456s@example.com',  
            'password' => Hash::make('dataentry'),
            'is_admin' => true,
        ]);

        // Create the Interview Team User
        User::create([
            'name' => 'Interview Team User',
            'email' => 'interviews123456s@example.com',  
            'password' => Hash::make('interview'),
            'is_admin' => true,
        ]);

        // Create the NOC Team User
        User::create([
            'name' => 'NOC Team User',
            'email' => 'nocs123456s@example.com',  
            'password' => Hash::make('noc'),
            'is_admin' => true,
        ]);



        //user of the employees store data

        // Create the NOC Team User
        User::create([
            'name' => 'Gaurav Team User',
            'email' => 'Gauravss1456@example.com',  
            'password' => Hash::make('Gaurav'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Roshan Team User',
            'email' => 'Roshans456@example.com',  
            'password' => Hash::make('Roshan'),
            'is_admin' => true,
        ]);

        //add here
        User::create([
            'name' => 'Ram Team User',
            'email' => 'Ram456@example.com',  
            'password' => Hash::make('Ram'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'samiksha Team User',
            'email' => 'samiksha456@example.com',  
            'password' => Hash::make('samiksha'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Bikalp Team User',
            'email' => 'Bikalp456@example.com',  
            'password' => Hash::make('Bikalp'),
            'is_admin' => true,
        ]);

    }
}
