<?php

namespace Tests\Feature;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{

    public function test_get_events(): void
    {
        $response = $this->get('/api/events');
        $response->assertStatus(200);
    }
    public function test_create_event(): void
    {
        $response = $this->post('/api/events', [
            'name' => 'Test Event',
            'description' => 'Test Event',
            'schedule' => date('Y-m-d'),
            'ticket_id'=>Ticket::all()->random()->id,
        ]);
        $response->assertStatus(201);
    }
}
