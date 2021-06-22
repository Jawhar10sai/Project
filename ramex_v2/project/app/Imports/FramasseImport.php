<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


/*
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet; */

class FramasseImport implements WithMultipleSheets, SkipsUnknownSheets
{

   // use Importable, RegistersEventListeners;

    public $sheetCounts=array();

    public function  __construct($nbr_sec)
    {
        $this->nbr_sec= $nbr_sec;
        
    }

    
    


    public function sheets(): array
    {
       //  dd($this->sheetCounts);
       // $spreadsheet = new Spreadsheet();
        //$title = $spreadsheet->getActiveSheet()->getTitle();

        $feuilles = $this->nbr_sec;
        $tab = array();
        for($i=1; $i<=$feuilles; $i++){
        //  $this->sheetNames[$i]=$spreadsheet->getActiveSheet()->getTitle();
           $tab[$i] = new SecteursImport();
        } 

       // dd( $this->sheetNames);


        return $tab;
        /*
        return [
            'ain sebaa 3' => new Sec1casaImport(),
            'MAARIF - Ouasis - Beausejour' => new Sec2casaImport(),
            'lissasfa oulfa' => new Sec3casaImport(),
            'LA VILETTE SIDI MOUMEN' => new Sec4casaImport(),
            'AIN BORJA-GIRONDE' => new Sec5casaImport(),
            'AIN SEBAA 4' => new Sec6casaImport(),
            '2 MARS + ABDELMOUMEN' => new Sec7casaImport(),
            'BELVEDERE' => new Sec8casaImport(),
            'MAARIF EXTENTION' => new Sec9casaImport(),
            'AIN SEBAA 1 ' => new Sec10casaImport(),
            'AIN SEBAA 2' => new Sec11casaImport(),
            'ROCHES NOIRES' => new Sec12casaImport(),
            'SIDI MAAROUF' => new Sec13casaImport(),
            'BOUSKOURA + OULED SALAH' => new Sec14casaImport(),
            'ZI MLY RACHID' => new Sec15casaImport(),
            'AIN CHOK SEBATA ' => new Sec16casaImport(),
            'Z.I SAPINO' => new Sec17casaImport(),
            'CENTRE0 VILLE ' => new Sec18casaImport(),
           'MOHAMMEDIA' => new Sec19casaImport(),
            'HAD SOUALEM' => new Sec20casaImport(),
          //  'BERRECHID' => new Sec21casaImport(),
        ]; */
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }


}
