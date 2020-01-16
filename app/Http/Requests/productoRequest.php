<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productoRequest extends FormRequest
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
            'codigo_original'=>'required|unique:productos',
            'codigo_alterno'=>'required|unique:productos',
            'cantidad'=>'required',
            'precio_compra'=>'required',
            'precio_venta'=>'required',
            'aplicacion'=>'min:10|max:100|required',
            'descripcion'=>'min:10|max:100|required',
            'unidad_medida'=>'required',
            'numero_rack'=>'required',
            'marca_id'=>'required',
            'categoria_id'=>'required',
            'proveedor_id'=>'required'
        ];
    }


    
    public function attributes()
    {
        return [
            'codigo_original'=>'Código Original',
            'codigo_alterno'=>'Código Alterno',
            'cantidad'=>'Cantidad',
            'precio_compra'=>'Precio de Compra',
            'precio_venta'=>'Precio de Venta',
            'aplicacion'=>'Aplicación del Producto',
            'descripcion'=>'Descripción del Producto',
            'unidad_medida'=>'Unidad de Medida',
            'numero_rack'=>'Numero de Estante',
            'marca_id'=>'Marca',
            'categoria_id'=>'Categoria',
            'proveedor_id'=>'Proveedor'        
        ];
    }
}
