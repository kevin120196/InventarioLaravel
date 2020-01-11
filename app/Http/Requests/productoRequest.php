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
            'codigo_original'=>'required|unique:Producto',
            'codigo_alterno'=>'required|unique:Producto',
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
}
