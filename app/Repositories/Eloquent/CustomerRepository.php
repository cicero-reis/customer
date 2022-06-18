<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;
use App\Repositories\Contract\ICustomer;
use App\Repositories\Eloquent\CustomerAbstract;

class CustomerRepository extends CustomerAbstract implements ICustomer
{
    protected $model = Customer::class;
}
