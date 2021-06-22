<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\Statistic;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class FglobaleExport implements FromCollection,WithStrictNullComparison,ShouldAutoSize,WithColumnWidths,WithStyles /*,WithCustomStartCell*/,WithHeadings
{

    use Exportable;

    public function __construct(int $nbrtotal)
    {
        $this->nbrtotal = $nbrtotal;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 50,
            'C' => 50,
            'D' => 30, 
            'E' => 30,
            'F' => 30,          
        ];
    }

    public function headings():array{
        return[
            'Commercial',
            'Client',
            'Secteur',
            'AGE CLIENT (semaine)',
            'AGE 0 RAMASSE',
            'AGE 3*5 RAMASSES',

        ];
    }

    public function styles(Worksheet $sheet)
    {
        $counter=$this->nbrtotal + 2;
        $sheet->setCellValue('A'.$counter , 'TOTAL');
        $sheet->setCellValue('B'.$counter ,$this->nbrtotal);

       /* $tabcells=[];
        for($i=3;$i<=$counter;$i++){

        }*/


        // for($i=2;$i<$counter;$i++){
        //     $x=$sheet->getCell('D'.$i)->getValue();
        //     $x=$x + 1;
        //     $sheet->setCellValue('D'.$i,$x);
        // } 



        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                   // 'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];
        for($i=1;$i<=$counter;$i++){
           $sheet->getStyle('A'.$i)->applyFromArray($styleArray);
           $sheet->getStyle('B'.$i)->applyFromArray($styleArray);
        }
        for($i=1;$i<$counter;$i++){
            $sheet->getStyle('C'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('D'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('E'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('F'.$i)->applyFromArray($styleArray);
         }

        //  $sheet->getStyle('A'.$counter)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
        //  $sheet->getStyle('B'.$counter)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');

        // Sets all borders
        //$sheet->setAllBorders('thin');
       // $sheet->getStyle('C')->setAlignment('center');
        return [

            /*
             'A3' => ['font' => ['size' => 12,'name'=>'Book Antiqua'],'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                   // 'color' => ['argb' => 'FFFF0000'],
                ],
            ]],*/
             'A' => ['font' => ['size' => 12,'name'=>'Book Antiqua']],
             'B' => ['font' => ['size' => 12,'name'=>'Book Antiqua']],
             'C' => ['font' => ['size' => 12,'name'=>'Book Antiqua']],
             'D' => ['font' => ['size' => 12,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'E' => ['font' => ['size' => 12,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'F' => ['font' => ['size' => 12,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],

            'A1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'B1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'C1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'D1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'E1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'F1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],

            'A'.$counter => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'B'.$counter => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],


        ]; 
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list_info=Statistic::select('commercial','client','secteur','age_reel','age_avec_0ramassage','age_avec_3_5ramassage')->where('nom_utilisateur',Auth::user()->name)->orderBy('age_reel', 'DESC')->get();
        return $list_info;
    }
}
