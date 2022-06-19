<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Requests\StoreUpdateCustomer;

class StoreUpdateCustomerTest extends TestCase
{
    /**
     * Post Store
     * 
     * @test
     * 
     * @return void
     */
    public function should_return_roule_validation()
    {
        $request = new StoreUpdateCustomer();

        $uuid = null;

        $this->assertEquals([
            'name' => ['required', "min:3", "max:20", "unique:customer,name,{$uuid},uuid"]
        ], $request->rules());
    }

    /**
     * Post Store
     * 
     * @test
     * 
     * @return void
     */
    public function should_return_message_error()
    {
        $request = new StoreUpdateCustomer();

        $this->assertEquals([
                'name.required'     => 'O campo nome é obrigatório.',
                'name.min'          => 'O campo nome deve ter no minimo 3 caracteres.',
                'name.max'          => 'O campo nome deve ter no minimo 20 caracteres.',
                'name.unique'       => 'O campo nome já existe.'
        ], $request->messages());
    }
}
