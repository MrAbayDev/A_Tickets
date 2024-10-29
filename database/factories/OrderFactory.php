<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'event_id'=>Event::factory(),
            'ticket_id'=>Ticket::factory(),
            'barcode'=>$this->faker->unique()->ean8(),
            'equal_price'=>$this->faker->numberBetween(1,100),
        ];
    }
}
