<?php

namespace App\Exports;

use App\Factura_venta;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Reader\Xls\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Border as StyleBorder;

use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
class VentaExport implements FromView, WithHeadings, ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {

        $timestamp = Carbon::now('-6:00');
        $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
        $dia->setTimezone('America/Managua');
        if(Request()->input('inicio') && Request()->input('fin') != null){
            return view('admin.reportes.excelReporteVenta', [
                'venta' => Factura_venta::orderBy('id', 'desc')            
                ->codigo(Request()->input('codigo'))
                ->fecha(Request()->input('fecha'))
                ->estado(Request()->input('estado'))
                ->intervalo(Request()->input('inicio'),Request()->input('fin'))
                ->get(),
                'dia'=>$dia
                ]);   
    
        }else{
            return view('admin.reportes.excelReporteVenta', [
                'venta' => Factura_venta::orderBy('id', 'desc')            
                ->codigo(Request()->input('codigo'))
                ->fecha(Request()->input('fecha'))
                ->estado(Request()->input('estado'))
                ->get(),
                'dia'=>$dia
                ]);   
    
        }
    }

    public function headings(): array
    {
        return [
            'N° Factura',
            'Fecha de Factura',
            'Estado de Factura',
            'Tipo de Factura',
            'Cliente',
            'Descuento',
            'Vendedor',
            'Total',
        ];
    }

    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // All headers - set font size to 14
                $cellRange = 'A1:H1'; 
                $event->sheet->getDelegate()->setMergeCells([$cellRange])->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('2637551');
                $event->sheet->getDelegate()->setMergeCells([$cellRange])->getStyle($cellRange)->getFont()->setUnderline($cellRange)->setSize(20)->getColor()->setRGB('fffffffff');
                $event->sheet->getStyle('A1:W2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setWrapText(true);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(150.9);  
                
                $cellRango = 'A2:H2'; 
                $event->sheet->getDelegate()->getStyle($cellRango)->getFont()->setBold($cellRango)->setSize(14);
                $event->sheet->getStyle($cellRango)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT)->setWrapText(true);
                $event->sheet->getStyle($cellRango)->getFont()->setUnderline($cellRange)->setSize(20)->getColor()->setRGB('fffffffff');
                $event->sheet->getStyle($cellRango)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('2637551');
                $cellRanges = 'A2:H1000'; 
                $event->sheet->getDelegate()->getStyle($cellRanges)->getFont()->setSize(13);
                $event->sheet->getStyle($cellRanges)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)->setWrapText(true);
                $drawing = new Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('This is my logo');
                $drawing->setPath(public_path('./img/logoeltriunfo.png'));
                $drawing->setWidth(0.9);
                $drawing->setHeight(165);
                $drawing->setCoordinates('C1');
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
                $event->sheet->getStyle('A2:H0')->applyFromArray($styleArray);
    
                // Set first row to height 20
                $event->sheet->getDelegate()->getRowDimension(10)->setRowHeight(20);
    
            },
            
        ];
    }
}
