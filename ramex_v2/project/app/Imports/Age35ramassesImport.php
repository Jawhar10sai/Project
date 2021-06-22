<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


use App\Models\Tacramassage;

use Illuminate\Support\Facades\Auth;

class Age35ramassesImport implements ToCollection
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
        foreach($collection as $key=>$value){
            if($key > 0){
                $client=Tacramassage::where('client','=',$value[1])->where('nom_utilisateur','=',Auth::user()->name)->count();
                
                if($client == 0){
                    if($value[3] != NULL){
                    Tacramassage::insert([ 'commercial'=>$value[0],'client'=>$value[1],'age_avec_3_5ramassages'=>$value[4],'nom_fichier'=>$this->nom_fichier,'nom_utilisateur'=>Auth::user()->name]);                }
                    }
            }
        }
    }
}
