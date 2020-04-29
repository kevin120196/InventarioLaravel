<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class proveedorRequest extends FormRequest
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
            'nombre_proveedor'=>'min:10|max:100|required',
            'direccion_proveedor'=>'min:10|max:100|required',
            'cedula'=>'max:20|required|unique:proveedores',
            'numero_telefono'=>'max:15|nullable',
            'correo_electronico_proveedor'=>'min:4|max:250|required|unique:proveedores'
            ];
    }

    public function attributes()
    {
        return [
            'nombre_proveedor'=>'Nombre del Proveedor',
            'direccion_proveedor'=>'Dirección del Proveedor',
            'cedula'=>'Cédula',
            'numero_telefono'=>'Número Telefonico',
            'correo_electronico_proveedor'=>'Correo Electronico'        ];
    }
}
