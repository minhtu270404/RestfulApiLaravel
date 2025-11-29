<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $genders = ['men', 'woman', 'other'];

        return [
            'user_id' => User::factory(), // Tạo liên kết user tự động
            'code' => strtoupper($this->faker->bothify('???###')), // Mã nhân viên giả
            'gender' => $this->faker->randomElement($genders),
            'birthdate' => $this->faker->dateTimeBetween('-50 years', '-18 years'),
            'birth_place' => $this->faker->city(),
            'national' => 'Việt Nam',
            'religion' => $this->faker->randomElement(['Phật giáo', 'Thiên Chúa giáo', 'Hồi giáo', 'Không']),
            'hometown' => $this->faker->city(),
            'identily' => $this->faker->numerify('###########'), // CMND/CCCD
            'identily_date' => $this->faker->dateTimeBetween('-30 years', 'now'),
            'identily_place' => $this->faker->city(),
            'tax_code' => $this->faker->numerify('#########'),
            'phone' => $this->faker->numerify('09########'),
            'address' => $this->faker->address(),
            'household' => $this->faker->address(),
            'bank_account' => $this->faker->numerify('############'),
            'bank' => $this->faker->randomElement(['Vietcombank', 'BIDV', 'Techcombank', 'VPBank']),
            'start_working_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'working_place' => $this->faker->city(),
            'note' => $this->faker->sentence(),
            'company_name' => $this->faker->company(),
            'department' => $this->faker->word(),
            'unit_name' => $this->faker->word(),
            'headquater_name' => $this->faker->company(),
            'position_name' => $this->faker->jobTitle(),
            'concurent_position_name' => $this->faker->jobTitle(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
