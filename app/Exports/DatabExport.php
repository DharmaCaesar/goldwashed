<?php

namespace App\Exports;

use App\Models\datab;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class DatabExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromCollection, WithHeadings, WithEvents, WithCustomValueBinder
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return datab::all();
    }

    public function headings(): array
    {
        return[
            'No',
            'Product Name', 
            'Qty',
            'Price',
            'Buy date',
            'Supplier',
            'Status Product', 
            'Update time Status',
            'Created At',
            'Updated At' 
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);
                $event->sheet->getColumnDimension('H')->setAutoSize(true);
                $event->sheet->getColumnDimension('I')->setAutoSize(true);
                $event->sheet->getColumnDimension('J')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:H1');
                $event->sheet->setCellValue('A1', 'DATA MEMBER LAUNDRY');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:H3')->getFont()->setBold(true);
                $event->sheet->getStyle('A3:H3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:H3')->getFill()->applyFromArray(['fillType' => 'solid', 'rotation' => 0, 'color' => ['rgb' => '00BEC8']]);

                // HEADER 
                $event->sheet->getStyle('A3:H3')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb', '000000']
                        ]
                    ]
                ]);

                // CELLS
                $event->sheet->getStyle('A4:H' . $event -> sheet -> getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb', '000000']
                        ]
                    ]
                ]);
            }
        ];
    }
}
