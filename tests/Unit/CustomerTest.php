<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Customer;

class CustomerTest extends TestCase
{
    /**
     * return table name customer
     * 
     * @test
     * @return void
     */
    public function should_return_table_name(): void
    {
        $customer = new Customer();

        $this->assertEquals('customer', $customer->getTable());
    }

    /**
     * return attributes model Customer
     *
     * @test
     * @return void
     */
    public function should_return_attributes_model_customer(): void
    {
        $customer = new Customer();

        $fillable = [
            'uuid',
            'name',
        ];

        $this->assertEquals($fillable, $customer->getFillable());
    }
}
