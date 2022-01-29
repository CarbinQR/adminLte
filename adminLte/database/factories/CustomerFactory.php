<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class CustomerFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'email' => $this->faker->safeEmail(),
            'surname' => $this->faker->lastName(),
            'phone_number' =>  $this->faker->phoneNumber(),
        ];
    }
}
