<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Etudiant;
use App\Models\Module;
use App\Models\In_etudiant;


class EtudiantController extends Controller
{
    public function liste(){
      #Connect to the second database:
      #return In_etudiant::all();
      #return DB::connection('mysql2')->table('in_etudiants')->get();
      #Connect to the first    database:
      
      $etudiants = Etudiant::all();
      $modules = Module::all();
      return view('etudiants.liste',[
        'etudiants'=>$etudiants,
        'modules'=>$modules,
      ]);
    }
    public function index($id){
      $etudiant = Etudiant::findOrfail($id);
      return view('etudiants.details',[
        'etudiant'=>$etudiant,
      ]);
    }
public function Ajouter(){
  $etudiant = new Etudiant;
  $etudiant->nom_etudiant = request('nom');
  $etudiant->prenom_etudiant = request('prenom');
  $etudiant->date_naisssance = request('datenaiss');
  $etudiant->matricule_etudiant = request('matricule');
  $etudiant->save();
return redirect('/etudiants');
}
public function Modifier($id){
  $etudiant = Etudiant::findOrfail($id);
  $etudiant->nom_etudiant = request('nom');
  $etudiant->prenom_etudiant = request('prenom');
  $etudiant->date_naisssance = request('datenaiss');
  $etudiant->matricule_etudiant = request('matricule');
  $etudiant->save();
return redirect('/etudiants');
}



}
