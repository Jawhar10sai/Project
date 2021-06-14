<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Statistic;
use App\Models\Passage;
use Illuminate\Support\Facades\Auth;

class PassageImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        
        foreach($collection as $key=>$value){
            if($key > 0){
            $checker = Statistic::where('nom_utilisateur',Auth::user()->name)->where('client',$value[0])->count();
            if($checker > 0){
                Passage::insert([ 'client'=>$value[0],'secteur'=>$value[1],'s1'=>$value[3],'s2'=>$value[4],'s3'=>$value[5],'s4'=>$value[6],'nom_utilisateur'=>Auth::user()->name]);
            }

            }
        }
    }
}
