<?php

namespace Database\Seeders;

use App\Models\User; // Import the User model
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create 10 random users using the factory
        User::factory(10)->create();
    }
}

//steps to create a seeder
//1. generate a file of seeder through artisan
//2. Generate the factories
//3. Run the seed