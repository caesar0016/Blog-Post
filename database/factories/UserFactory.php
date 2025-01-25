<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Generate a random username
            'username' => $this->faker->userName(),
            
            // Generate a random email (unique to avoid duplication)
            'email' => $this->faker->unique()->safeEmail(),
            
            // Encrypt the password
            'password' => bcrypt('password123'), // or use Hash::make('password123')
            
            // If your model has additional fields, add them here
            // 'profile_picture' => $this->faker->imageUrl(),
        ];
    }
}
