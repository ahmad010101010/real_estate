<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_not_auth_user_cant_access_customer(): void
    {
        $response = $this->getJson('api/v1/customers');

        $response->assertStatus(401);
    }

    public function test_not_auth_user_cant_access_invoices(): void
    {
        $response = $this->getJson('api/v1/invoices');

        $response->assertStatus(401);
    }
}
