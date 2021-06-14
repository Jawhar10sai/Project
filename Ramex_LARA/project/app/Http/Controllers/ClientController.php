<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

use App\Http\Requests\clientRequest;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Clients_historique;
use Carbon\Carbon;

class ClientController extends Controller
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
    
    public function showClients(){

        if(Auth::user()->profil === "RESPONSABLE DE RAMASSAGE" || Auth::user()->profil === "RESPONSABLE CALL CENTER"){
            return view('showClients');
        }else{
            return view('error403');
        }
       // return view('showClients');
    }
    public function showClientsCallCenter(){
        if(Auth::user()->profil === "OPERATEUR CALL CENTER"){
            return view('showClientsCallCenter');
        }else{
            return view('error403');
        }
        //return view('showClientsCallCenter');
    }

    public function showClientsRespCallCenter(){
        if(Auth::user()->profil === "RESPONSABLE CALL CENTER"){
            return view('showClientsRespCallCenter');
        }else{
            return view('error403');
        }
    }

     //code commande 
     public function code(){
        $id=Client::max('id');
        $id=$id+1;
        $code="CL".$id;
        return $code;
    }


    public function store(clientRequest $req){

        //code client
        $id=Client::max('id');
        $id=$id+1;
        $code="CL".$id;

        $client=new Client();
        // $client->code_client=$req->input('code_client');
       // $client->code_client=$code;
        $client->nom_client=$req->input('nom_client');
        $client->agence_client=$req->input('agence_client');
        $client->secteur_client=$req->input('secteur_client');
        $client->commercial_client=$req->input('commercial_client');
        $client->adresse_client=$req->input('adresse_client');
        $client->num_tel=$req->input('num_tel_client');
        $client->date_de_creation=$req->input('date_de_creation');
        $client->nom_saisisseur=Auth::user()->name;
       
        $client->save();
        $client->code_client="CL".$client->id;
        $client->save();
        //$success="user is created succesfully";
       // return $success;
      // return redirect()->route('home')
       //->with('success','user is created succesfully');
       //$clients=Client::orderBy('id','DESC')->get();

       /*partie historique*/
       $now = Carbon::now();
       $historique_client=new Clients_historique();
       $historique_client->id_client=$client->id;
       $historique_client->code_client=$client->code_client;
       $historique_client->nom_client=$client->nom_client;
       $historique_client->agence_client=$client->agence_client;
       $historique_client->secteur_client=$client->secteur_client;
       $historique_client->action="creation";
       $historique_client->date_action=$now;
       $historique_client->nom_user=Auth::user()->name;
       $historique_client->save();


       $clients=Client::whereIn('nom_saisisseur', User::where('agence', Auth::user()->agence)->pluck('name'))->orderBy('id','DESC')->get();

        return $clients;
    }


    public function update(Request $req){

        $client=Client::find($req->input('id'));
        $client->nom_client=$req->input('modnom_client');
        $client->agence_client=$req->input('modagence_client');
        $client->secteur_client=$req->input('modsecteur_client');
        $client->commercial_client=$req->input('modcommercial_client');
        $client->num_tel=$req->input('modnum_tel_client');
        $client->adresse_client=$req->input('modadresse_client');

        $client->save();

        /*partie historique*/
       $now = Carbon::now();
       $historique_client=new Clients_historique();
       $historique_client->id_client=$client->id;
       $historique_client->code_client=$client->code_client;
       $historique_client->nom_client=$client->nom_client;
       $historique_client->agence_client=$client->agence_client;
       $historique_client->secteur_client=$client->secteur_client;
       $historique_client->action="modification";
       $historique_client->date_action=$now;
       $historique_client->nom_user=Auth::user()->name;
       $historique_client->save();

        //$clients=Client::orderBy('id','DESC')->get();
        $clients=Client::whereIn('nom_saisisseur', User::where('agence', Auth::user()->agence)->pluck('name'))->orderBy('id','DESC')->get();
        return $clients;
        }

    public function delete(Request $req){
        $client=Client::find($req->input('iddelclient'));
        $client->delete();

          /*partie historique*/
       $now = Carbon::now();
       $historique_client=new Clients_historique();
       $historique_client->id_client=$client->id;
       $historique_client->code_client=$client->code_client;
       $historique_client->nom_client=$client->nom_client;
       $historique_client->agence_client=$client->agence_client;
       $historique_client->secteur_client=$client->secteur_client;
       $historique_client->action="suppression";
       $historique_client->date_action=$now;
       $historique_client->nom_user=Auth::user()->name;
       $historique_client->save();

        return $client;
    }
}
