<?php

namespace Database\Factories;

use App\Enums\VisitRequestStatus;
use App\Models\User;
use App\Models\VisitRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisitRequest>
 */
class VisitRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::factory(),
            'sales_id' => User::factory(),
            'notes' => $this->faker->paragraph,
            'lat' => $this->faker->randomFloat(null, 0, 30),
            'long' => $this->faker->randomFloat(null, 0, 30),
            'status' => $this->faker->randomElement(array(VisitRequestStatus::array()),
        ];
    }
}
