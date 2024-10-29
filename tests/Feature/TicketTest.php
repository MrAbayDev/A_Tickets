<?php

namespace Tests\Feature;

use App\Models\TicketType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_all_tickets_test_example(): void
    {
        $response = $this->get('/api/tickets');

        $response->assertStatus(200);
    }
    public function test_create_ticket_test_example(): void
    {
        $response = $this->post('/api/tickets', [
            'ticket_type_id' => TicketType::all()->random()->id,
        ]);
        $response->assertStatus(201);
    }
}
