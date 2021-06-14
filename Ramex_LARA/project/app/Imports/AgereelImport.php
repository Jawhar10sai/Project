<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Statistic;
use App\Models\Age;
use Illuminate\Support\Facades\Auth;


class AgereelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

           // dd($data);
         foreach($collection as $key=>$value){
 
             if($key > 0){
                
                $client=Age::where('commercial','=',$value[0])->where('client','=',$value[1])->count();
                
                if($client == 0){
                    if($value[3] != NULL){
                        Age::insert([ 'commercial'=>$value[0],'client'=>$value[1],'age_reel'=>$value[3],'nom_utilisateur'=>Auth::user()->name]);
                    }
                }
                 
                            }
            
                        } 
    /*    $datas=Statistic::select('commercial','client')->get();
      
        // dd($data);
         foreach($collection as $key=>$value){
 
             if($key > 0){
               //  Statistic::update(['age_avec_0ramassage' =>$value[2] ]);
                 foreach($datas as $data){
                     if($data->commercial == $value[0] && $data->client==$value[1] && $data->age_reel == null){
                         
                         
                            Statistic::where('commercial',$data->commercial)
                             ->where('client',$data->client)
                             ->update(['age_reel' =>$value[3]]);
                         
                         

                     }
        
                 }
             }
            
         } */
    }
}
