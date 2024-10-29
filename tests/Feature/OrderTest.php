<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Random\RandomException;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api/orders');

        $response->assertStatus(200);
    }

    /**
     * @throws RandomException
     */
    public function test_create_order(): void
{
    // Create user, event, and ticket
    $user = User::factory()->create();
    $event = Event::factory()->create();
    $ticket = Ticket::factory()->create();

    // Create the order with the necessary data
    $response = $this->post('/api/orders', [
        'user_id' => $user->id,
        'event_id' => $event->id,
        'ticket_id' => $ticket->id,
        'barcode' => strval(rand(10, 100)),
        'equal_price' => number_format($ticket->price, 2, '.', ''), // Ensure correct format
    ]);

    // Log response for debugging
    \Log::info('Order creation response:', [
        'status' => $response->status(),
        'response' => $response->json(),
    ]);

    // Assert the response status
    $response->assertStatus(201);
}
}
