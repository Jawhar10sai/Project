<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secteur;

class SecteurController extends Controller
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
        $sector=new Secteur();
        $sector->nom_agence=$req->agence;
        $sector->nom_secteur=$req->secteur;
        $sector->save();

        $secteurs=Secteur::orderBy('id','DESC')->get();
        return $secteurs;
      
       // return $motifs->json(['success' => 'Ajout dun nouveau motif avec succes']);
    }

        //update agence
    
        public function update(Request $req){

            $sector=Secteur::find($req->id);
            $sector->nom_agence=$req->agence;
            $sector->nom_secteur=$req->secteur;
            $sector->save();
    
            $secteurs=Secteur::orderBy('id','DESC')->get();
            return $secteurs;
            }


        public function delete(Request $req){
            $secteur=Secteur::find($req->input('iddelsector'));
            $secteur->delete();
            return $secteur;
        }
    

}
