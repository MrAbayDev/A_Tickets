<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_all_users_test_example(): void
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }
//    public function test_create_user_test_example(): void
//    {
//        $response = $this->post('/api/users', [
//            'name' => 'John Doe',
//            'email' => 'doekod@uhsua.com',
//            'password' => 'password',
//            'password_confirmation' => 'password',
//        ]);
//        $response->assertStatus(201);
//    }
}
