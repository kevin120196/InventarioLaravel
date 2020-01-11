<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class comprasRequest extends FormRequest
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
            'fecha_compra'=>'required',
            'tipo_factura_id'=>'required',
            'proveedores_id'=>'required',
            'estado_factura'=>'required'
        ];
    }
}
