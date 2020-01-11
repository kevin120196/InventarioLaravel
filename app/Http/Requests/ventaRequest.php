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
            'fecha_factura'=>'required',
            'estado_factura'=>'required',
            'descuento'=>'required',
        ];
    }
}
