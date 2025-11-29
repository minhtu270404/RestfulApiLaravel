<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public function definition(): array
    {
        $levels = ['Vip', 'Medium', 'Normal'];

        return [
            'name' => $this->faker->name('male'|'female'), // Tên Việt Nam
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // mật khẩu mặc định
            'remember_token' => Str::random(10),
            'google_id' => null,
            'google_access_token' => null,
            'google_refresh_token' => null,
            'google_scopes' => null,
            'avatar' => $this->faker->imageUrl(200, 200, 'people'), // ảnh giả
            'point' => $this->faker->numberBetween(0, 1000),
            'contribution_points' => $this->faker->numberBetween(0, 500),
            'check_first_login' => $this->faker->boolean(50),
            'level' => $this->faker->randomElement($levels),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
