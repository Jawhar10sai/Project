<?php

namespace App\Exports;

use App\Models\Statistic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class StatisticsExport implements FromCollection,ShouldAutoSize,WithColumnWidths,WithStyles ,WithCustomStartCell,WithHeadings
{

    use Exportable;

    public function __construct(int $nbrtotal, string $filename)
    {
        $this->nbrtotal = $nbrtotal;
        $this->filename = $filename;
    }


    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 50,
            'C' => 50,
            'D' => 30, 
            'E' => 30,          
        ];
    }

    public function styles(Worksheet $sheet)
    {

        $sheet->setCellValue('C2' , $this->filename);
        $sheet->getStyle('C2')->getFont()->setUnderline(true);
        // $sheet->getStyle('B2')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

        $counter=$this->nbrtotal + 5;
        $sheet->setCellValue('A'.$counter , 'TOTAL');
        $sheet->setCellValue('B'.$counter ,$this->nbrtotal);

       /* $tabcells=[];
        for($i=3;$i<=$counter;$i++){

        }*/
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                   // 'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];
        for($i=4;$i<=$counter;$i++){
           $sheet->getStyle('A'.$i)->applyFromArray($styleArray);
           $sheet->getStyle('B'.$i)->applyFromArray($styleArray);
        }
        for($i=4;$i<$counter;$i++){
            $sheet->getStyle('C'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('D'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('E'.$i)->applyFromArray($styleArray);
         }
         
         /*filtrage begin*/
             for($i=5;$i<$counter;$i++){
             $val=$sheet->getCell('D'.$i)->getValue()-2;
             $val2=$sheet->getCell('E'.$i)->getValue();
             if($val2 >= $val){
                $sheet->getStyle('A'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF71B5');
                $sheet->getStyle('B'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF71B5');
                $sheet->getStyle('C'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF71B5');
                $sheet->getStyle('D'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF71B5');
                $sheet->getStyle('E'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF71B5');
            }
             
        }

        $sheet->getStyle('B'.$counter+2 )->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF71B5');
        $sheet->setCellValue('C'.$counter+2 ,'Clients avec age 0 ramasse >= (age reel-2)');
       /*filtrage end*/


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

             'A' => ['font' => ['size' => 11,'name'=>'Book Antiqua']],
             'B' => ['font' => ['size' => 11,'name'=>'Book Antiqua']],
             'C' => ['font' => ['size' => 11,'name'=>'Book Antiqua']],
             'D' => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'E' => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],

            
            'A4' => ['font' => ['bold' => true,'size' => 11],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'B4' => ['font' => ['bold' => true,'size' => 11],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'C4' => ['font' => ['bold' => true,'size' => 11],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'D4' => ['font' => ['bold' => true,'size' => 11]],
            'E4' => ['font' => ['bold' => true,'size' => 11]],
            
            'A'.$counter => ['font' => ['bold' => true,'size' => 11],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            'B'.$counter => ['font' => ['bold' => true,'size' => 11],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],

           // 'C'.$counter+2 => ['font' => ['bold' => true,'size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],

            'C2' => ['font' => ['size' => 16,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],

        ]; 
    }

    public function startCell(): string
    {
        return 'A4';
    }
  
    public function headings():array{
        return[
            'Commercial',
            'Client',
            'Secteur',
            'AGE CLIENT (semaine)',
            'AGE 0 RAMASSE',

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list_info=Statistic::select('commercial','client','secteur','age_reel','age_avec_0ramassage')->where('somme',0)->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_0ramassage', 'DESC')->get();
        return $list_info;
    }
}
