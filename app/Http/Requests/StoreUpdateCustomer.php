<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $uuid = $this->customer;

        return [
            'name' => ['required', "min:3", "max:20", "unique:customer,name,{$uuid},uuid"]
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'O campo nome é obrigatório.',
            'name.min'          => 'O campo nome deve ter no minimo 3 caracteres.',
            'name.max'          => 'O campo nome deve ter no minimo 20 caracteres.',
            'name.unique'       => 'O campo nome já existe.',
        ];
    }
}
