<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteRequest extends FormRequest
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
        return [
            //

            'nombre'=>'min:10|max:100|required',
            'direccion'=>'min:10|max:100|required',
            'cedula'=>'max:20|required|unique:clientes',
            'numero_telefono'=>'max:15|nullable',
            'correo_electronico'=>'min:4|max:250|required|unique:clientes',
            'descuento_id'=>'required'
        ];
    }
}
