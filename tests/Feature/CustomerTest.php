<?php

namespace Tests\Feature;

use App\Http\Resources\V1\CustomerCollection;
use App\Http\Resources\V1\CustomerResource;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_api_return_customer(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->getJson('api/v1/customers');
        $response->assertStatus(200);
    }

    public function test_api_return_customer_list() : void
    {
        $user = User::factory()->create();

        $customer = Customer::factory()->create();
        $response = $this->actingAs($user)->getJson('api/v1/customers');
        $response = $this->assertJson($customer);
    }

    public function test_customer_created_succsessfully() : void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('api/v1/customers',[
            'name'=>'ahmad',
            'email'=>'a@aaa.c',
            'type'=>'I',
            'address'=>'ads',
            'city'=>'ads',
            'state'=>'adsdf',
            'postalCode'=>'455445'
        ]);

        $response->assertStatus(200);
    }

    public function test_customer_validation_work() : void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('api/v1/customers',[
            'name'=>'ahmad',
            'email'=>'aaaa.c',
            'type'=>'I',
            'address'=>'ads',
            'city'=>'ads',
            'state'=>'',
            'postalCode'=>'455445'
        ]);

        $response->assertStatus(422);
    }


}
