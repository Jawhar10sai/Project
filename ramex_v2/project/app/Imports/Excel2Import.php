<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Statistic;

class Excel2Import implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dd($collection);
       $datas=Statistic::select('commercial','client')->get();
      
       // dd($data);
        foreach($collection as $key=>$value){

            if($key > 0){
              //  Statistic::update(['age_avec_0ramassage' =>$value[2] ]);
                foreach($datas as $data){
                    if($data->commercial == $value[0] && $data->client==$value[1] ){
                        Statistic::where('commercial',$data->commercial)
                        ->where('client',$data->client)
                        ->update(['age_avec_0ramassage' =>$value[2]]);
                    }
               /*     Statistic::where($value[0],$data->commercial)
                    ->where($value[1],$data->client)
                    ->update(['age_avec_0ramassage' =>$value[2]]); */
                }
           //  Statistic::insert([ 'commercial'=>$value[0],'client'=>$value[1],'age_'=>$value[2]]);
            }
           
        } 
        
    }
}
