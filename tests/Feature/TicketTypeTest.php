<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api/ticket_types');

        $response->assertStatus(200);
    }
    public function test_create_ticket_type(): void
    {
        $response = $this->post('/api/ticket_types', [
            'adult_price'=>rand(100,1000),
            'child_price'=>rand(100,1000),
            'adult_count'=>rand(1,10),
            'child_count'=>rand(1,10)
        ]);
        $response->assertStatus(201);
    }
}
