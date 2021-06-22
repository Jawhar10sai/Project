<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agence;


class AgenceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

      //add agence
      public function store(Request $req){
        $agence=new Agence();
        $agence->nom_agence=$req->agence;
        $agence->adresse_agence=$req->adresse;
        $agence->telephone_agence=$req->num_tel;
        $agence->save();

        $agences=Agence::orderBy('id','DESC')->get();
        return $agences;
      
       // return $motifs->json(['success' => 'Ajout dun nouveau motif avec succes']);
    }

        //update agence
    
        public function update(Request $req){

            $agence=Agence::find($req->id);
            $agence->nom_agence=$req->agence;
            $agence->adresse_agence=$req->adresse;
            $agence->telephone_agence=$req->num_tel;
            $agence->save();
    
            $agences=Agence::orderBy('id','DESC')->get();
          
            return $agences;
            }


        public function delete(Request $req){
            $agence=Agence::find($req->input('iddelagence'));
            $agence->delete();
            return $agence;
        }
    

}
