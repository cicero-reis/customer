<?php

namespace Tests\Feature;

#use Illuminate\Foundation\Testing\RefreshDatabase;
#use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;

class StoreUpdateCustomerTest extends TestCase
{
     /**
     * Post Store
     * 
     * @test
     * @return void
     */
    public function should_return_error_create_single_customer_attribute_name()
    {
        $response = $this->postJson('/api/v1/customer', [
            'name' => ''
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }     

    /**
     * Post Store
     * 
     * @test
     * @return void
     */
    public function should_return_error_create_single_customer_attribute_name_unique()
    {
        $response = $this->postJson('/api/v1/customer', [
            'name' => 'Cliente 1'
        ]);

        $response2 = $this->postJson('/api/v1/customer', [
            'name' => 'Cliente 1'
        ]);

        $response2->assertStatus(422);
        $response2->assertJsonValidationErrors(['name']);
    }  

    /**
     * Put update
     * 
     * @test
     * 
     * @return void
     */
    public function should_return_error_update_single_customer_attribute_name()
    {
        $customer =  Customer::factory()->create();

        $response = $this->putJson("/api/v1/customer/{$customer->uuid}",  [
            'name' => '',            
        ]);        

        $response->assertStatus(422);
    }       
}
