<?php

namespace App\Exports;

use App\Factura_Venta;
use Maatwebsite\Excel\Concerns\FromCollection;

class VentaFromView implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Factura_Venta::all();
    }
}
