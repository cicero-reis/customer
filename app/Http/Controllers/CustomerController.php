<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\CustomerRepository;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\StoreUpdateCustomer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerController extends Controller
{
    private $model;

    public function __construct(CustomerRepository $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->model->all();

        return CustomerResource::collection($customers);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCustomer $request)
    {
        $customer = $this->model->store($request);

        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        try {
            $customer = $this->model->show($uuid);
            return new CustomerResource($customer);
        } catch(ModelNotFoundException $e) {
            return response()->json(['mensagem' => 'Registro não encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCustomer $request, $uuid)
    {
        try {
            $this->model->update($request, $uuid);
            return response()->json(['mensagem' => 'Cliente atualizado']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['mensagem' => 'Falha na atualização do Cliente'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        try {
            $this->model->destroy($uuid);
            return response()->json(['mensagem' => 'Cliente removido']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['mensagem' => 'Falha na exclusão do Cliente'], 400);
        }
    }
}
