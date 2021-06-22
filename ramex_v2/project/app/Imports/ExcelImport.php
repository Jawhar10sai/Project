<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Statistic;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $len=$collection->count();

       foreach($collection as $key=>$value){
           if($key > 0){
            Statistic::insert([ 'commercial'=>$value[0],'client'=>$value[1],'age_reel'=>$value[3]]);
           }
       }
    }
}
