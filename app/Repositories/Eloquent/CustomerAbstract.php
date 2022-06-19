<?php

namespace App\Repositories\Eloquent;

abstract class CustomerAbstract
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel()
    {
        return app($this->model);
    }

    public function all()
    {
        return $this->model->paginate();
    }

    public function show($uuid)
    {
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }

    public function store($request)
    {
        return $this->model->create($request->all());
    }
    
    public function update($request, $uuid)
    {
        $model = $this->model->where('uuid', $uuid)->firstOrFail();

        return $model->update($request->all());
    }

    public function destroy($uuid)
    {
        $model = $this->model->where('uuid', $uuid)->firstOrFail();

        return $model->delete();
    }
}
