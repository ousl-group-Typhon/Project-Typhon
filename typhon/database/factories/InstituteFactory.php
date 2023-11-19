<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Institute;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institute>
 */
class InstituteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'institiute_name' => $this->faker->name,
            //   'institiute_address' => $request->instAddress,
            'owner' => $this->faker->numberBetween(1, 3),
            // 'phone_number' => $request->phoneNumber, 
        ];
    }
}
