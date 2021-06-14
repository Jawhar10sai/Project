<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Framassage;

class FramassagesImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$value){
            if($key > 0){
             Framassage::insert([ 'Client'=>$value[0],'Lundi'=>$value[1],'Mardi'=>$value[2],'Mercredi'=>$value[3],'Jeudi'=>$value[4],'Vendredi'=>$value[5],'Somme'=>$value[6]]);
            }
        }
    }
}
