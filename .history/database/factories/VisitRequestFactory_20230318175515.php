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
        /*           $table->foreignIdFor(User::class, 'user');
            $table->foreignIdFor(User::class, 'sales');
            $table->text('notes')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->enum('status', array(VisitRequestStatus::values()))->default('pending'); */
        return [
            'user_id' => User::factory(),
            'sales_id' => User::factory(),
            'notes' => $this->faker->paragraph,
            'lat' => $this->faker->randomFloat(null, 0, 30),
            'long' => $this->faker->randomFloat(null, 0, 30),
            'status' => $this->faker->randomElement(array(VisitRequestStatus::values())),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'duration' => rand(1, 24),
        ];
    }
}
