<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Zeroramassage;

use Illuminate\Support\Facades\Auth;

class AgezeroramasseImport implements ToCollection
{

    public function  __construct($nom_fichier)
    {
        $this->nom_fichier= $nom_fichier;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
           //dd($this->nom_fichier);
           foreach($collection as $key=>$value){
            if($key > 0){
                $client=Zeroramassage::where('client','=',$value[1])->where('nom_utilisateur','=',Auth::user()->name)->count();
                
                if($client == 0){
                    if($value[3] != NULL){
                   Zeroramassage::insert([ 'commercial'=>$value[0],'client'=>$value[1],'age_avec_0ramassage'=>$value[4],'nom_fichier'=>$this->nom_fichier,'nom_utilisateur'=>Auth::user()->name]);
                    }
                }
            }
        }  
        
    }
}
