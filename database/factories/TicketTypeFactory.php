<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket_Type>
 */
class TicketTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adult_price'=>$this->faker->numberBetween(10,1000),
            'child_price'=>$this->faker->numberBetween(10,1000),
            'adult_count'=>$this->faker->numberBetween(10,1000),
            'child_count'=>$this->faker->numberBetween(10,1000),
        ];
    }
}
