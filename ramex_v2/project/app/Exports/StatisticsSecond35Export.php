<?php

namespace App\Exports;
use App\Models\Statistics35ram;

use Maatwebsite\Excel\Concerns\FromCollection;


use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

use Maatwebsite\Excel\Concerns\WithCharts;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
////
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class StatisticsSecond35Export implements FromCollection,ShouldAutoSize,WithColumnWidths,WithStyles,WithHeadings,WithCustomStartCell,WithStrictNullComparison,WithCharts,WithColumnFormatting
{

    use Exportable;
    public function __construct(int $nbr_lignes,int $nbr_total,float $nbr_percent, string $filename)
    {
        $this->nbr_lignes = $nbr_lignes;
        $this->nbr_total = $nbr_total;
        $this->nbr_percent = $nbr_percent;
        $this->filename = $filename;
    }

    public function startCell(): string
    {
        return 'A4';
    }

    // public function title(): string
    // {
    //     $worksheetname="Diagramme Clients avec age 3_5 rams";
    //     return $worksheetname;
    // }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,         
        ];
    }

    public function headings():array{
        return[
            'Age (semaine)',
            'Nombre de Client',
            'Pourcentage',
        ];
    }

    public function columnFormats(): array
    {
        return [
                 
            'C' => '0%',
              
            // 'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            // 'C' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        $sheet->setCellValue('B2' , $this->filename);
        $sheet->getStyle('B2')->getFont()->setUnderline(true);
        // $sheet->getStyle('B2')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


        $counter=$this->nbr_lignes + 5;
        $sheet->setCellValue('A'.$counter , 'TOTAL');
        $sheet->setCellValue('B'.$counter ,$this->nbr_total);
        $sheet->setCellValue('C'.$counter ,$this->nbr_percent." %");

        ///// 
        for($i=5;$i<$counter;$i++){
            $x=$sheet->getCell('A'.$i)->getValue();

            if($x<2){
                $x=$x." Semaine";
            }else{
                $x=$x." Semaines";
            }

             $sheet->setCellValue('A'.$i,$x);
        }

        for($i=5;$i<$counter;$i++){
            $x=$sheet->getCell('C'.$i)->getValue();
            $y = $x - floor($x);
            if($y < 0.5){
              $x=(int)$x;
            } else{
              $x=(int)$x + 1;
            }

              /* cette ligne est juste pour le formattage en pourcentage  */
              $x=$x/100;

           $sheet->setCellValue('C'.$i,$x);
                // $x=(int)$x;
            //  $sheet->setCellValue('C'.$i,$x);
        } 
       //$x=$sheet->getCell('A8')->getValue()." Semaines";
       //$sheet->setCellValue('D1',$x);
       ///////

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
           $sheet->getStyle('C'.$i)->applyFromArray($styleArray);
        }

        return [

            'B2' => ['font' => ['size' => 16,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],


             'A4:A'.$counter => ['font' => ['size' => 10,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'B4:B'.$counter => ['font' => ['size' => 10,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'C4:C'.$counter => ['font' => ['size' => 10,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
            
            'A4:C4' => ['font' => ['bold' => true,'size' => 12],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]], 
            'A'.$counter.':C'.$counter => ['font' => ['bold' => true]], 

        ]; 
    }

    public function charts()
    {
        
        $counter=$this->nbr_lignes + 5;
        
        /*
     
        $categories=array();
        for($i=2;$i<$counter;$i++){
            
                $categories[$i-2] = new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$A$'.$i, null,);
        } 
        */
        
         $spreadsheet = new Spreadsheet();
        //$excel->createSheet();
         $sheet = $spreadsheet->getSheet(0)->getTitle();
        //$title = $this->getWorksheet()->getTitle();
        $labels     = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, $sheet.'!$A$4', null,1)];
        $categories = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, $sheet.'!$A$5:$A$'.$counter-1, null,$counter-2)];
        $values     = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, $sheet.'!$B$5:$B$'.$counter-1, null,$counter-2)];

         //// adding data labels
         $layout1 = new Layout();
         $layout1->setShowVal(true);
       //  $layout1->setShowPercent(true);


        $chart1 = new Chart(
            'chart',
            new Title('Nombre de Clients'),
            new Legend(),
            new PlotArea($layout1, [
                new DataSeries(DataSeries::TYPE_BARCHART, null, range(0, count($values) - 1),$labels,$categories, $values)
            ])
        );

        $chart1->setTopLeftPosition('A'.$counter+2);
        $chart1->setBottomRightPosition('D'.$counter+16);

        ///////////
        $labels2     = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, $sheet.'!$A$4', null,1)];
        $categories2 = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, $sheet.'!$A$5:$A$'.$counter-1, null,$counter-2)];
        $values2     = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, $sheet.'!$C$5:$C$'.$counter-1, null,$counter-2)];

         //// adding data labels
         $layout2 = new Layout();
         $layout2->setShowVal(true);


        $chart2 = new Chart(
            'chart',
            new Title('Pourcentage des Clients'),
            new Legend(),
            new PlotArea($layout2, [
                new DataSeries(DataSeries::TYPE_BARCHART, null, range(0, count($values2) - 1),$labels2,$categories2, $values2)
            ])
        );

        $chart2->setTopLeftPosition('A'.$counter+17);
        $chart2->setBottomRightPosition('D'.$counter+31);
        ///////////
        
        $charts=array();
        $charts[0]=$chart1;
        $charts[1]=$chart2;
       // return $chart1;
        return $charts;

    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list_info=Statistics35ram::select('age','nbr_clients','pourcentage')->where('nom_utilisateur',Auth::user()->name)->orderBy('age', 'ASC')->get();
        return $list_info;
    }
}
