<?php

namespace Database\Factories;

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
        /*           $table->foreignIdFor(User::class, 'user');
            $table->foreignIdFor(User::class, 'sales');
            $table->text('notes')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->enum('status', array(VisitRequestStatus::values()))->default('pending'); */
        return [
            'contract_id' => Contract::factory(),
            'images' => $this->faker->randomElement(array('1', '2', '3')),
            'notes' => $this->faker->paragraph,
            'lat' => $this->faker->randomFloat(null, 0, 30),
            'long' => $this->faker->randomFloat(null, 0, 30),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'duration' => rand(1, 24),
            'status' => $this->faker->randomElement(array('pending', 'start', 'end', 'delay',)),
        ];
    }
}
