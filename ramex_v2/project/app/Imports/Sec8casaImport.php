<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Models\Statistic;
use Illuminate\Support\Facades\Auth;

class Sec8casaImport implements ToCollection,WithCalculatedFormulas
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$value){
            if($key > 6 && $value[0] != ""){
               
                    if($value[0] !="" && $value[1]!="" && $value[13]!=""){
                        Statistic::insert([ 'commercial'=>$value[0],'client'=>$value[1],'somme'=>$value[13],'nom_utilisateur'=>Auth::user()->name]);
                    }
                
            }
        }
    }
}
