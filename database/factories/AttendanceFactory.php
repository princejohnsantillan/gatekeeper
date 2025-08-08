<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\Guardian;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id' => Child::factory(),
            'service_id' => Service::factory(),
            'checked_in_by' => Guardian::factory(),
            'checked_in_at' => now(),
            'checked_out_by' => Guardian::factory(),
            'checked_out_at' => now()->addHours(2),
            'entered_by' => User::factory()->admin(),
            'exited_by' => User::factory()->admin(),
        ];
    }

    public function notCheckedOut(): static
    {
        return $this->state(fn (array $attributes) => [
            'checked_out_by' => null,
            'checked_out_at' => null,
            'exited_by' => null,
        ]);
    }
}
