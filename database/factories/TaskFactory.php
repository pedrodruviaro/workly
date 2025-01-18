<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'project_id' => rand(1, 20),
            'title' => fake()->text(40),
            'description' => fake()->text(120),
            'priority' => 'low',
            'completed' => false,
            'due_date' => Carbon::now()
        ];
    }
}
