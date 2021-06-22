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

class AgereelExport implements FromCollection,ShouldAutoSize,WithColumnWidths,WithStyles,WithHeadings
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
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $counter=$this->nbrtotal + 2;
        $sheet->setCellValue('A'.$counter , 'TOTAL');
        $sheet->setCellValue('B'.$counter ,$this->nbrtotal);

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
         }
        //  for($i=2;$i<$counter;$i++){
        //     $val=$sheet->getCell('D'.$i)->getValue();
        //     $sheet->setCellValue('D'.$i ,$val+1);
        //  }
       
     
        return [

             'A' => ['font' => ['size' => 12,'name'=>'Book Antiqua']],
             'B' => ['font' => ['size' => 12,'name'=>'Book Antiqua']],
             'C' => ['font' => ['size' => 12,'name'=>'Book Antiqua']],
             'D' => ['font' => ['size' => 12,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],

            
            'A1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'B1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'C1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'D1' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            
            'A'.$counter => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'B'.$counter => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],


        ]; 
    }

    public function headings():array{
        return[
            'Commercial',
            'Client',
            'Secteur',
            'AGE CLIENT (semaine)',

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list_info=Statistic::select('commercial','client','secteur','age_reel')->where('nom_utilisateur',Auth::user()->name)->orderBy('age_reel', 'DESC')->get();
        return $list_info;
    }
}
