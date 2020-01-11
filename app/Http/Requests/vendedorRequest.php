<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class vendedorRequest extends FormRequest
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
            'nombre_vendedor'=>'min:10|max:100|required',
            'direccion'=>'min:10|max:100|required',
            'cedula_vendedor'=>'max:20|required|unique:vendedores',
            'numero_telefono'=>'max:15|nullable',
            'correo_electronico'=>'min:4|max:250|required|unique:vendedores'

        ];
    }
}
