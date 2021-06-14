<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Globstatistic;
use Illuminate\Support\Facades\Auth;

class FglobaleImport implements ToCollection
{

    public function  __construct($inc_age_reel)
    {
        $this->inc_age_reel= $inc_age_reel;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
         foreach($collection as $key=>$value){
            if($key > 0){
                if($value[0] != null && $value[0] != "TOTAL"){
                    //$client=Globstatistic::where('client','=',$value[1])->where('nom_utilisateur','=',Auth::user()->name)->count();
                
                   // if($client == 0){
                        Globstatistic::insert([ 'commercial'=>$value[0],'client'=>$value[1],'secteur'=>$value[2],'age_reel'=>$value[3]+$this->inc_age_reel,'age_avec_0ramassage'=>$value[4],'age_avec_3_5ramassage'=>$value[5],'nom_utilisateur'=>Auth::user()->name]);
                   // }
                }
               
            }
        }  
    }
}
