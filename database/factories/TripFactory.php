<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $scheduled_date = fake()->dateTimeBetween('+1day', '+1year');

        return [
            //
            'title' => fake()->realText(),
            'destination'   => fake()->text(),
            'start_date'    => $scheduled_date->format('Y-m-d H:i:s'),
            'end_date'      => $scheduled_date->modify('+1hour')->format('Y-m-d H:i:s'),
            'description' => fake()->text(),
            'cost'         => fake()->numberBetween($min=1000,$max=9000),
            // make user_id
            'user_id' => fake()->numberBetween($min=1,$max=12),
        ];
    }
}
