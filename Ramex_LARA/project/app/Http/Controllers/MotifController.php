<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\motifRequest;
use App\Http\Requests\modmotifRequest;

use App\Models\Motif;

use Illuminate\Support\Facades\Auth;

class MotifController extends Controller
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
    
    public function showMotifs(){
        if(Auth::user()->profil === "ADMIN"){
            return view('showMotifs');
        }else{
            return view('error403');
        }
        //return view('showMotifs');
    }

    //add motifs
    public function store(motifRequest $req){
        $motif=new Motif();
        $motif->motif=$req->motif;
        $motif->save();

        $motifs=Motif::orderBy('id','DESC')->get();
        return $motifs;
      
       // return $motifs->json(['success' => 'Ajout dun nouveau motif avec succes']);
    }

    //update motif
    
    public function update(modmotifRequest $req){

        $motif=Motif::find($req->id);
        $motif->motif=$req->newMotif;
        
        $motif->save();

        $motifs=Motif::orderBy('id','DESC')->get();
      
        return $motifs;
        }

        public function delete(Request $req){
            $motif=Motif::find($req->input('iddelmotif'));
            $motif->delete();
            return $motif;
        }

}
