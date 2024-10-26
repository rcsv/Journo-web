<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TripEventFactory extends Factory
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
            'title'     => fake()->text(),
            'trip_id'   => fake()->numberBetween($min=1,$max=20),
            //             $table->enum('event_type', ['transportation', 'stay', 'activity', 'sightseeing'])->default('activity'); // イベントの種類
            'event_type' => 'activity',
            'description' => fake()->text(),
            'start_time'=> $scheduled_date->format('Y-m-d H:i:s'),
            'end_time'  => $scheduled_date->modify('+1hour')->format('Y-m-d H:i:s'),
            'expense'   => fake()->numberBetween($min=10,$max=1000),
            //'point_of_departure',
            //'point_of_arrival',
            //'priority'
        ];
    }
}
