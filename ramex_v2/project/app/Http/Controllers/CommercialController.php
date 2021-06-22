<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commercial;

class CommercialController extends Controller
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
        $Commercial=new Commercial();
        $Commercial->code_commercial="COM".$Commercial->id;
        $Commercial->nom_commercial=$req->nom;
        $Commercial->agence_commercial=$req->agence;
        $Commercial->secteur_commercial=$req->secteur;
        $Commercial->save();
        $code="COM".$Commercial->id;
        $Commercial->code_commercial=$code;
        $Commercial->save();

        $Commercials=Commercial::orderBy('id','DESC')->get();
        return $Commercials;
      
       // return $motifs->json(['success' => 'Ajout dun nouveau motif avec succes']);
    }

        //update agence
    
        public function update(Request $req){
            $Commercial=Commercial::find($req->id);
            $Commercial->nom_commercial=$req->nom;
            $Commercial->agence_commercial=$req->agence;
            $Commercial->secteur_commercial=$req->secteur;
            $Commercial->save();
    
            $Commercials=Commercial::orderBy('id','DESC')->get();
            return $Commercials;
            }


        public function delete(Request $req){
            $Commercial=Commercial::find($req->input('iddelcommercial'));
            $Commercial->delete();
            return $Commercial;
        }
}
