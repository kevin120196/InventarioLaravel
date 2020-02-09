<?php

namespace App\Exports;

use App\Factura_Compra;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompraExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Factura_Compra::all();
    }
}
