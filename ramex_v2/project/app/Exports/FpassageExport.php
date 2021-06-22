<?php

namespace App\Exports;
use App\Models\Passage;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

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


//use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class FpassageExport implements FromCollection,ShouldAutoSize,WithColumnWidths,WithStyles,WithHeadings,WithStrictNullComparison,WithCharts
{

    use Exportable;

    public function __construct(int $nbr_total,int $nbr_cat0,int $nbr_cat12,int $nbr_cat35,string $col1,string $col2,string $col3,string $col4,string $col5)
    {
        $this->nbr_total = $nbr_total;
        $this->nbr_cat0 = $nbr_cat0;
        $this->nbr_cat12 = $nbr_cat12;
        $this->nbr_cat35 = $nbr_cat35;

        $this->col1 = $col1;
        $this->col2 = $col2;
        $this->col3 = $col3;
        $this->col4 = $col4;
        $this->col5 = $col5;
    }


    public function columnWidths(): array
    {
        return [
            'A' => 47,
            'B' => 43,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 27,
            'I' => 12,
            'J' => 12,
            'K' => 12,           
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $counter=$this->nbr_total + 2;
        $sheet->setCellValue('H'.$counter , 'TOTAL');
        $sheet->setCellValue('I'.$counter ,$this->nbr_cat0);
        $sheet->setCellValue('J'.$counter ,$this->nbr_cat12);
        $sheet->setCellValue('K'.$counter ,$this->nbr_cat35);

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
        for($i=1;$i<$counter;$i++){
           $sheet->getStyle('A'.$i)->applyFromArray($styleArray);
           $sheet->getStyle('B'.$i)->applyFromArray($styleArray);
           $sheet->getStyle('C'.$i)->applyFromArray($styleArray);
           $sheet->getStyle('D'.$i)->applyFromArray($styleArray);
           $sheet->getStyle('E'.$i)->applyFromArray($styleArray);
           $sheet->getStyle('F'.$i)->applyFromArray($styleArray);
           $sheet->getStyle('G'.$i)->applyFromArray($styleArray);
        }
        for($i=1;$i<=$counter;$i++){
            $sheet->getStyle('H'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('I'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('J'.$i)->applyFromArray($styleArray);
            $sheet->getStyle('K'.$i)->applyFromArray($styleArray);
         }
       
        // Sets all borders
        //$sheet->setAllBorders('thin');
       // $sheet->getStyle('C')->setAlignment('center');
        return [

             'A1:A'.$counter-1 => ['font' => ['size' => 12,'name'=>'Book Antiqua']],
             'B1:B'.$counter-1 => ['font' => ['size' => 12,'name'=>'Book Antiqua']],
             'C1:C'.$counter-1 => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'D1:D'.$counter-1 => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'E1:E'.$counter-1 => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'F1:F'.$counter-1 => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'G1:G'.$counter-1 => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'H1:H'.$counter => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'I1:I'.$counter => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'J1:J'.$counter => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'K1:K'.$counter => ['font' => ['size' => 11,'name'=>'Book Antiqua'],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],

            
            'A1:K1' => ['font' => ['bold' => true,'size' => 14],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
             'I'.$counter.':K'.$counter => ['font' => ['bold' => true],'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]],
 

        ]; 
    }

    public function headings():array{
        return[
            'Client',
            'Secteur',
            $this->col1,
            $this->col2,
            $this->col3,
            $this->col4,
            $this->col5,
            'TOTAL PASSAGE',
            '0',
            '1*2',
            '3*5',

        ];
    }


    public function charts()
    {
        $counter=$this->nbr_total + 2;
        
        

        $labels     = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$I$1:$K$1', null,3)];
        $categories = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$I$1:$K$1', null, 3)];
        $values     = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$I$'.$counter.':$k$'.$counter, null,3)];


        //// adding data labels
        $layout1 = new Layout();
        //$layout1->setShowVal(true);
        $layout1->setShowPercent(true);
        // $plotArea = new PlotArea($layout1, [
        //     new DataSeries(DataSeries::TYPE_PIECHART, null, range(0, count($values) - 1), $labels, $categories, $values)
        // ]);
       // $legend = new \PhpOffice\PhpSpreadsheet\Chart\Legend(\PhpOffice\PhpSpreadsheet\Chart\Legend::POSITION_RIGHT, null, false);


        /////

        $chart1 = new Chart(
            'chart',
            new Title('Diagramme Circulaire'),
            new Legend(\PhpOffice\PhpSpreadsheet\Chart\Legend::POSITION_RIGHT, null, false),
            new PlotArea($layout1, [
                 new DataSeries(DataSeries::TYPE_PIECHART, null, range(0, count($values) - 1), $labels, $categories, $values)
                //new DataSeries(DataSeries::TYPE_PIECHART, null, range(0, count($values) - 1), $labels, $categories, $values,null,null, DataSeries::STYLE_LINEMARKER)
            ])
        );

        $chart1->setTopLeftPosition('B'.$counter+2);
        $chart1->setBottomRightPosition('H'.$counter+18);

        return $chart1; 
/*
        sheet->getDelegate()->fromArray(
            [
                ['', 2010, 2011, 2012],
                ['Q1', 12, 15, 21],
                ['Q2', 56, 73, 86],
                ['Q3', 52, 61, 69],
                ['Q4', 30, 32, 0],
            ]
        );

        //	Set the Labels for each data series we want to plot
        //		Datatype
        //		Cell reference for data
        //		Format Code
        //		Number of datapoints in series
        //		Data values
        //		Data Marker

        $dataSeriesLabels = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$B$1', null, 1), //	2010
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$C$1', null, 1), //	2011
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$D$1', null, 1), //	2012
        ];
        //	Set the X-Axis Labels
        //		Datatype
        //		Cell reference for data
        //		Format Code
        //		Number of datapoints in series
        //		Data values
        //		Data Marker
        $xAxisTickValues = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$A$2:$A$5', null, 4), //	Q1 to Q4
        ];
        //	Set the Data values for each data series we want to plot
        //		Datatype
        //		Cell reference for data
        //		Format Code
        //		Number of datapoints in series
        //		Data values
        //		Data Marker
        $dataSeriesValues = [
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$B$2:$B$5', null, 4),
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$C$2:$C$5', null, 4),
            new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Worksheet!$D$2:$D$5', null, 4),
        ];

        $dataSeriesValues[2]->setLineWidth(60000);

        //	Build the dataseries
        $series = new DataSeries(
            DataSeries::TYPE_LINECHART, // plotType
            DataSeries::GROUPING_STACKED, // plotGrouping
            range(0, count($dataSeriesValues) - 1), // plotOrder
            $dataSeriesLabels, // plotLabel
            $xAxisTickValues, // plotCategory
            $dataSeriesValues        // plotValues
        );

        //	Set the series in the plot area
        $plotArea = new PlotArea(null, [$series]);
        //	Set the chart legend
        $legend = new Legend(Legend::POSITION_TOPRIGHT, null, false);

        $title = new Title('Test Stacked Line Chart');
        $yAxisLabel = new Title('Value ($k)');
       //	Create the chart
       $chart = new Chart(
        'chart1', // name
        $title, // title
        $legend, // legend
        $plotArea, // plotArea
        true, // plotVisibleOnly
        0, // displayBlanksAs
        null, // xAxisLabel
        $yAxisLabel  // yAxisLabel
    );
      //	Set the position where the chart should appear in the worksheet

      $chart->setTopLeftPosition('B'.$counter+2);
      $chart->setBottomRightPosition('H'.$counter+20);

      //	Add the chart to the worksheet
      $event->sheet->getDelegate()->addChart($chart);*/

    }



    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $list_info=Passage::select('client','secteur','s1','s2','s3','s4','s5','total_passage','cat_0','cat_12','cat_35',)->where('nom_utilisateur',Auth::user()->name)->get();
        return $list_info;
    }
}
