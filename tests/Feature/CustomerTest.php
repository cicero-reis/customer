<?php

namespace Tests\Feature;

use App\Models\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * Get all Customer
     *
     * @test
     * 
     * @return void
     */
    public function should_get_all_customers()
    {
        Customer::factory()->count(5)->create();

        $response = $this->getJson('/api/v1/customer');

        $response->assertJsonCount(5, 'data');

        $response->assertStatus(200);
    }

    /**
     * Error Get Single Customer
     * 
     * @test
     *
     * @return void
     */
    public function should_get_error_single_customer()
    {
        $response = $this->getJson('/api/v1/customer/fake-uui');

        $response->assertStatus(404);
    }

    /**
     * Get Single Customer
     * 
     * @test
     *
     * @return void
     */
    public function should_get_single_customer()
    {
        $customer = Customer::factory()->create();

        $response = $this->getJson("/api/v1/customer/{$customer->uuid}");

        $response->assertStatus(200);
    }

     /**
     * Store Customer
     * 
     * @test
     * 
     * @return void
     */
    public function should_store_customer()
    {
        $response = $this->postJson('/api/v1/customer', [
            'name' => 'Cliente 1'
        ]);

        $response->assertStatus(201);
    }

    /**
     * Update Customer
     * 
     * @test
     * 
     * @return void
     */
    public function should_update_customer()
    {
        $customer =  Customer::factory()->create();

        $data = [
            'name' => 'Customer 1'
        ];

        $response1 = $this->putJson('/api/v1/customer/uuid', $data);
        $response1->assertStatus(404);
        $response1->assertJsonFragment([
            "mensagem" => "Falha na atualização do Cliente"
        ]);

        $response2 = $this->putJson("/api/v1/customer/{$customer->uuid}", $data);
        $response2->assertJsonFragment([
            'mensagem' => 'Cliente atualizado'
        ]);
        $response2->assertStatus(200);
        
    }

    /**
     * Delete Customer
     * 
     * @test
     *
     * @return void
     */
    public function should_delete_customer()
    {
        $customer =  Customer::factory()->create();

        $response1 = $this->deleteJson('/api/v1/customer/uuid');
        $response1->assertStatus(404);
        $response1->assertJsonFragment([
            "mensagem" => "Falha na exclusão do Cliente"
        ]);

        $response2 = $this->deleteJson("/api/v1/customer/{$customer->uuid}");
        $response2->assertJsonFragment([
            'mensagem' => 'Cliente removido'
        ]);
        $response2->assertStatus(200);
        
    }
}
