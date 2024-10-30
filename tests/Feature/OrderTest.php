<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_example(): void
    {
        $response = $this->get('/api/orders');

        $response->assertStatus(200);
    }
}
