<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Call the AdminUserSeeder to create admin users
        $this->call(AdminUserSeeder::class);

        // You can add other seeders here if needed, for example:
        // $this->call(OtherSeeder::class);
    }
}
