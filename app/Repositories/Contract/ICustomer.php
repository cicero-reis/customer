<?php

namespace App\Repositories\Contract;

interface ICustomer
{
    public function all();
    public function show($uuid);
    public function store($uuid);
    public function update($request, $uuid);
    public function destroy($uuid);
}