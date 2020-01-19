<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ventaRequest extends FormRequest
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
            'codigo_factura'=>'min:5|max:10|required|unique:facturas_ventas',
            'fecha_factura'=>'required',
            'tipos_factura_id'=>'required',
            'estado_factura'=>'required',
            'clientes_id'=>'required',
            'descuentos_clientes_id'=>'required',
            'vendedores_id'=>'required',
        ];
    }

    public function attributes()
    {
        return [
            'codigo_factura'=>'Código de Factura',
            'fecha_factura'=>'Fecha de Facturación',
            'tipos_factura_id'=>'Tipo de Factura',
            'estado_factura'=>'Estado de Factura',
            'clientes_id'=>'Cliente',
            'descuentos_clientes_id'=>'Descuento',
            'vendedores_id'=>'Vendedor',        
        ];
    }
}
