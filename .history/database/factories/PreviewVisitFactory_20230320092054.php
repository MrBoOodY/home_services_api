<?php

namespace Database\Factories;

use App\Models\VisitRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreviewVisit>
 */
class PreviewVisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'visit_request_id' => VisitRequest::factory(),
            'images' => $this->faker->randomElement(array('1', '2', '3')),
            'notes' => $this->faker->paragraph,
            'lat' => $this->faker->randomFloat(null, 0, 30),
            'long' => $this->faker->randomFloat(null, 0, 30),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'duration' => rand(1, 24),
            'status' => $this->faker->randomElement(VisitStatus::array()),
        ];
    }
}
