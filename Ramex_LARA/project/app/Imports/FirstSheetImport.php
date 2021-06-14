<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
/*table zeroramassages*/
use App\Models\Zeroramassage;

use Illuminate\Support\Facades\Auth;

class FirstSheetImport implements ToCollection
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
            if($key > 1){
                if($value[1] != null){
                    $client=Zeroramassage::where('client','=',$value[1])->where('nom_utilisateur','=',Auth::user()->name)->count();
                
                    if($client == 0){
                       Zeroramassage::insert([ 'commercial'=>$value[0],'client'=>$value[1],'age_avec_0ramassage'=>$value[3]+1,'nom_fichier'=>$this->nom_fichier,'nom_utilisateur'=>Auth::user()->name]);
                    }
                }
               
            }
        }  
        
    }
}
