<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Auth;
use App\Models\Statistic;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;

class SecteursImport implements ToCollection,WithCalculatedFormulas,WithEvents
{
    use Importable, RegistersEventListeners;

    public $sheetNames=array();

    public function  __construct()
    {
        $this->sheetNames = [];
    }

      
    //ajouter les noms des feuilles dans une table global
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $this->sheetNames[] = $event->getSheet()->getDelegate()->getTitle();
            }
        ];
    } 
/*
    Sheet::listen(BeforeSheet::class, function (BeforeSheet $event) {
        $this->sheetNames[] = $event->getSheet()->getDelegate()->getTitle();
    }); */

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dd( $this->sheetNames[0]);
/*
        $spreadsheet = new Spreadsheet();
       
        // $sheet = $spreadsheet->getSheet(0)->getTitle();
        $title = $spreadsheet->getActiveSheet()->getTitle();*/


        foreach($collection as $key=>$value){
            if($key > 6 && $value[0] != ""){
                
                    if($value[0] !="" && $value[1]!=""){
                      //  if($value[13]!=""){
                      //      Statistic::insert([ 'commercial'=>$value[0],'client'=>$value[1],'somme'=>0,'nom_utilisateur'=>Auth::user()->name,'secteur'=>$value[2]]);
                       // }else{
                            Statistic::insert([ 'commercial'=>$value[0],'client'=>$value[1],'somme'=>$value[13],'nom_utilisateur'=>Auth::user()->name,'secteur'=>$value[2]]);
                       // }
                       // Statistic::insert([ 'commercial'=>$value[0],'client'=>$value[1],'somme'=>$value[13],'nom_utilisateur'=>Auth::user()->name,'secteur'=>$this->sheetNames[0]]);
                    }
                
            }
        }
    }
}
