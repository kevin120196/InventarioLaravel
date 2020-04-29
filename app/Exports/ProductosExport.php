<?php

namespace App\Exports;

use App\Producto;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Carbon\Carbon;
class ProductosExport implements FromView, WithHeadings, ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():view
    {
        $timestamp = Carbon::now('-6:00');
        $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
        $dia->setTimezone('America/Managua');
        return view('admin.reportes.excelReporteProducto', [
            'productos' => Producto::orderBy('id','ASC')
            ->codigo(Request()->input('codigo'))  
            ->descripcion(Request()->input('descripcion'))
            ->estante(Request()->input('estante'))
            ->get(),
            'dia'=>$dia
            ]); 
    }

    public function headings(): array
    {
        return [
            'Código Original',
            'Código Alterno',
            'Cantidad',
            'Precio de Compra',
            'Precio de Venta',
            'Aplicación del Producto',
            'Descripción del Producto',
            'Unidad de Medida',
            'Numero de Estante',
            'Marca',
            'Categoria',
            'Proveedor' 
        ];
    }

    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // All headers - set font size to 14
                $cellRange = 'A1:L1'; 
                $event->sheet->getDelegate()->setMergeCells([$cellRange])->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('2637551');
                $event->sheet->getDelegate()->setMergeCells([$cellRange])->getStyle($cellRange)->getFont()->setUnderline($cellRange)->setSize(20)->getColor()->setRGB('fffffffff');
                $event->sheet->getStyle('A1:W2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setWrapText(true);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(155.9);  
                
                $cellRango = 'A2:L2'; 
                $event->sheet->getDelegate()->getStyle($cellRango)->getFont()->setBold($cellRango)->setSize(14);
                $event->sheet->getStyle($cellRango)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT)->setWrapText(true);
                $event->sheet->getStyle($cellRango)->getFont()->setUnderline($cellRange)->setSize(20)->getColor()->setRGB('fffffffff');
                $event->sheet->getStyle($cellRango)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('2637551');
                $cellRanges = 'A2:L10000'; 
                $event->sheet->getDelegate()->getStyle($cellRanges)->getFont()->setSize(13);
                $event->sheet->getStyle($cellRanges)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setWrapText(true);
                $drawing = new Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('This is my logo');
                $drawing->setPath(public_path('./img/logoeltriunfo.png'));
                $drawing->setWidth(1.2);
                $drawing->setHeight(195);
                $drawing->setCoordinates('D1');
                $drawing->setWorksheet($event->sheet->getDelegate());
                // Apply array of styles to B2:G8 cell range
                $styleArray = [
                    'borders' => [
                        'outline' => [
//                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['hex' => '#2d3e50'],
                            'Alingment' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        
                    ]
                    
                ];
                $event->sheet->getStyle('A2:L0')->applyFromArray($styleArray);
    
                // Set first row to height 20
                $event->sheet->getDelegate()->getRowDimension(10)->setRowHeight(20);
    
            },
            
        ];
    }

}
