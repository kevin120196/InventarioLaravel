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
            'codigo_factura'=>'required|min:5|max:20',
            'fecha_compra'=>'required',
            'tipo_factura_id'=>'required',
            'proveedores_id'=>'required',
            'estado_factura'=>'max:100|required'
        ];
    }

    public function attributes()
    {
        return [
            'codigo_factura'=>'Código de Factura',
            'fecha_compra'=>'Fecha de Compra',
            'tipo_factura_id'=>'Tipo de Factura',
            'proveedores_id'=>'Proveedor',
            'estado_factura'=>'Estado de la Factura'
        ];
    }
}
