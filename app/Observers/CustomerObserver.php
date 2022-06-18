<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function creating(Customer $customer)
    {
        $customer->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Customer "updated" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function updated(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function deleted(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function restored(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function forceDeleted(Customer $customer)
    {
        //
    }
}
