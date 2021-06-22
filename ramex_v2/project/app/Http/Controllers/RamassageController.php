<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Ramasseur;
use App\Models\Ramassages_historique;

use App\Http\Requests\commandeRequest;

use App\Exports\CommandesExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Auth;

//Carbon is a laravel api used to extract datetime 
use Carbon\Carbon;

class RamassageController extends Controller
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
    

    public function home(){
        if(Auth::user()->profil === "RESPONSABLE DE RAMASSAGE"){
            return view('homerespramassage');
        }else{
            return view('error403');
        }
        //return view('homerespramassage');
    }

    public function home2(){
        if(Auth::user()->profil === "RESPONSABLE CALL CENTER"){
            return view('homerespcallcenter');
        }else{
            return view('error403');
        }
        //return view('homerespramassage');
    }
    
    public function showCommands(){
        if(Auth::user()->profil === "RESPONSABLE DE RAMASSAGE"){
            return view('showCommands');
        }else{
            return view('error403');
        }

       // return view('showCommands');
    }

    public function showCommandsRespCallCenter(){
        if(Auth::user()->profil === "RESPONSABLE CALL CENTER"){
            return view('showCommandsRespCallCenter');
        }else{
            return view('error403');
        }

       // return view('showCommands');
    }

    //code commande 
    public function code(){
        $id=Commande::max('id');
        $id=$id+1;
        $code="RAM".$id;
        return $code;
    }

    //autocoplete nom_client with ajax
    public function fetch(Request $req){   
           if($req->nm){
            $nom=$req->nm;
            $data=Client::where('nom_client','LIKE',"%{$nom}%")->where('agence_client', Auth::user()->agence)->get();
            $output= '<ul class="dropdown-menu" style="display:block;margin-top:-16px;margin-left:12px">';
            foreach($data as $row){
                $output .='<li><a href="#" class="autocomplete-search" style="text-decoration: none;">'.$row->nom_client.'</a></li>';
            }
            $output .='</ul>';
            }       
         return $output;  
    }

     //autocoplete nom_benificiaire with ajax
     public function fetch2(Request $req){       
        if($req->nm){
         $nom=$req->nm;
         $data=Client::where('nom_client','LIKE',"%{$nom}%")->where('agence_client', Auth::user()->agence)->get();
         $output= '<ul class="dropdown-menu" style="display:block;margin-top:-16px;margin-left:12px">';
         foreach($data as $row){
             $output .='<li><a href="#" class="autocomplete-search-ben" style="text-decoration: none;">'.$row->nom_client.'</a></li>';
         }
         $output .='</ul>';
         }       
      return $output;  
      }

      //add command 
      //public function store(commandeRequest $req){
      public function store(Request $req){

        // code commande
        $id=Commande::max('id');
        $id=$id+1;
        $code="RAM".$id;



        $commande=new Commande();

       // $commande->num_ramasse=$req->num_ramasse;
        $commande->num_ramasse=$code;
        $commande->date_saisie=$req->date_saisie;
        $commande->nom_saisisseur=$req->nom_saisisseur;
        $commande->etat=$req->etat;
        $commande->canal_d_appel=$req->canal_appel;
        $commande->type=$req->type;
        $commande->source=$req->source;
        $commande->code_client=$req->code_client;
        $commande->nom_client=$req->nom_client;
        $commande->agence_client=$req->agence_client;
        $commande->secteur_client=$req->secteur_client;
        $commande->adresse_client=$req->adresse_client;
        $commande->code_benificiaire=$req->code_benificiaire;
        $commande->nom_benificiaire=$req->nom_benificiaire;
        $commande->acces_poids_lourds=$req->accessibilite;
        $commande->nbr_colis=$req->num_colis;
        $commande->nature_colis=$req->nature_colis;
        $commande->mesure=$req->mesure;
        $commande->date_ramasse=$req->date_ramasse;
        $commande->type_camion=$req->type_camion;
        $commande->hayon=$req->hayon;
        $commande->commentaire=$req->commentaire;
        $commande->agence_saisisseur=Auth::user()->agence;
        $commande->secteur_saisisseur=Auth::user()->secteur;
       
        $commande->save();
        $commande->num_ramasse="RAM".$commande->id;

        //parties historique
        $now = Carbon::now();
        $historique_ramassage=new Ramassages_historique();
        $historique_ramassage->id_ramasse=$commande->id;
        $historique_ramassage->code_ramasse=$commande->num_ramasse;
        $historique_ramassage->action="ajout";
        $historique_ramassage->date_action=$now;
        $historique_ramassage->nom_user=Auth::user()->name;
        $historique_ramassage->save();


        //filters
        $du= $req->param_du_filter;
        $au=  $req->param_au_filter;
        $agence=  $req->param_agence_filter;
        $secteur= $req->param_secteur_filter;
        $etat=  $req->param_etat_filter;

       // $commands=Commande::where('agence_saisisseur',Auth::user()->agence); 
        $commands=Commande::whereBetween( 'date_saisie',[ $du, $au]);
       // $commands=$commands->Where( 'date_saisie',$au);

       if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
           // $commands = $commands->Where('agence_client',$agence);
           $commands = $commands->Where('agence_saisisseur',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);
          //  $commands = $commands->Where('secteur_saisisseur',$secteur);
      /*  if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
            $commands = $commands->Where('agence_client',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);*/
           
        $commands = $commands->orderBy('date_saisie', 'DESC');
                    
        
        $commands = $commands->get();
       // $commands=Commande::paginate(5);
        //$commands=Commande::all();
        //$commands=Commande::orderBy('date_saisie', 'DESC')->get();
        return $commands;





        //$success="user is created succesfully";
       // return $success;
      // return redirect()->route('home')
       //->with('success','user is created succesfully');
        
    }
    
    //update command
    public function update(Request $req){

        $command=Commande::find($req->id);
        $command->date_ramasse=$req->date." ".$req->heure;

        $command->save();

        //parties historique
        $now = Carbon::now();
        $historique_ramassage=new Ramassages_historique();
        $historique_ramassage->id_ramasse=$command->id;
        $historique_ramassage->code_ramasse=$command->num_ramasse;
        $historique_ramassage->action="modification";
        $historique_ramassage->date_action=$now;
        $historique_ramassage->nom_user=Auth::user()->name;
        $historique_ramassage->save();

        //filters
        $du= $req->param_du_filter;
        $au=  $req->param_au_filter;
        $agence=  $req->param_agence_filter;
        $secteur= $req->param_secteur_filter;
        $etat=  $req->param_etat_filter;


        //$commands=Commande::where('agence_saisisseur',Auth::user()->agence);
        $commands=Commande::whereBetween( 'date_saisie',[ $du, $au]);
       // $commands=$commands->Where( 'date_saisie',$au);

       if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
           // $commands = $commands->Where('agence_client',$agence);
           $commands = $commands->Where('agence_saisisseur',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);
            //$commands = $commands->Where('secteur_saisisseur',$secteur);
     /*   if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
            $commands = $commands->Where('agence_client',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);*/
           
        $commands = $commands->orderBy('date_saisie', 'DESC');
                    
        
        $commands = $commands->get();

        return $commands;
        }
    
        public function delete(Request $req){
            $command=Commande::find($req->id);
            $command->delete();
            //parties historique
            $now = Carbon::now();
            $historique_ramassage=new Ramassages_historique();
            $historique_ramassage->id_ramasse=$command->id;
            $historique_ramassage->code_ramasse=$command->num_ramasse;
            $historique_ramassage->action="suppression";
            $historique_ramassage->date_action=$now;
            $historique_ramassage->nom_user=Auth::user()->name;
            $historique_ramassage->save();
            return $command;
        }

        public function affecte(Request $req){
            $command=Commande::find($req->id);
            //filters
        $du= $req->param_du_filter;
        $au=  $req->param_au_filter;
        $agence=  $req->param_agence_filter;
        $secteur= $req->param_secteur_filter;
        $etat=  $req->param_etat_filter;


        $commands=Commande::whereBetween( 'date_saisie',[ $du, $au]);
       // $commands=$commands->Where( 'date_saisie',$au);

       if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
           // $commands = $commands->Where('agence_client',$agence);
           $commands = $commands->Where('agence_saisisseur',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);
         //   $commands = $commands->Where('secteur_saisisseur',$secteur);
       /* if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
            $commands = $commands->Where('agence_client',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur); */
           
        $commands = $commands->orderBy('date_saisie', 'DESC');
                    
        
        $commands = $commands->get();

        return $commands;
        
        }


         //autocoplete nom_ramasseur with ajax
          public function fetchram(Request $req){   
              
               $nom=$req->nm;
               $agence=$req->agence;

               $data=Ramasseur::where('nom','LIKE',"%{$nom}%")->where('agence',Auth::user()->agence)->get();
               $output= '<ul class="dropdown-menu" style="display:block;margin-top:-1px;margin-left:12px">';
               foreach($data as $row){
                   $output .='<li><a href="#" class="autocomplete-search-ram" style="text-decoration: none;">'.$row->nom.'</a></li>';
               }
               $output .='</ul>';
                    
            return $output;  
           }

        //valider l'affectation
        public function assign(Request $req){
        $id=$req->id;
        $nouveau_etat="affectées";
        $nom_ramasseur=$req->ramasseur;

        $command=Commande::find($id);
        $command->ramasseur=$nom_ramasseur;
        $command->etat=$nouveau_etat;

        $command->save();

        //parties historique
        $now = Carbon::now();
        $historique_ramassage=new Ramassages_historique();
        $historique_ramassage->id_ramasse=$command->id;
        $historique_ramassage->code_ramasse=$command->num_ramasse;
        $historique_ramassage->action="affectation";
        $historique_ramassage->date_action=$now;
        $historique_ramassage->nom_user=Auth::user()->name;
        $historique_ramassage->save();

        //filters
        $du= $req->param_du_filter;
        $au=  $req->param_au_filter;
        $agence=  $req->param_agence_filter;
        $secteur= $req->param_secteur_filter;
        $etat=  $req->param_etat_filter;


        $commands=Commande::whereBetween( 'date_saisie',[ $du, $au]);
       // $commands=$commands->Where( 'date_saisie',$au);

      /*  if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
            $commands = $commands->Where('agence_client',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);*/
            if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
           // $commands = $commands->Where('agence_client',$agence);
           $commands = $commands->Where('agence_saisisseur',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);
           // $commands = $commands->Where('secteur_saisisseur',$secteur);
           
        $commands = $commands->orderBy('date_saisie', 'DESC');
                    
        
        $commands = $commands->get();

        return $commands;
        }

        //confirmer la demande
        public function confirm(Request $req){
            $id=$req->id;
            $nouveau_etat="Confirmées";
        
            $command=Commande::find($id);
            $command->etat=$nouveau_etat;
    
            $command->save();

            //parties historique
        $now = Carbon::now();
        $historique_ramassage=new Ramassages_historique();
        $historique_ramassage->id_ramasse=$command->id;
        $historique_ramassage->code_ramasse=$command->num_ramasse;
        $historique_ramassage->action="confirmation";
        $historique_ramassage->date_action=$now;
        $historique_ramassage->nom_user=Auth::user()->name;
        $historique_ramassage->save();
    
            //filters
        $du= $req->param_du_filter;
        $au=  $req->param_au_filter;
        $agence=  $req->param_agence_filter;
        $secteur= $req->param_secteur_filter;
        $etat=  $req->param_etat_filter;


        $commands=Commande::whereBetween( 'date_saisie',[ $du, $au]);
       // $commands=$commands->Where( 'date_saisie',$au);

      /*  if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
            $commands = $commands->Where('agence_client',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur); */
            if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
           // $commands = $commands->Where('agence_client',$agence);
           $commands = $commands->Where('agence_saisisseur',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);
           // $commands = $commands->Where('secteur_saisisseur',$secteur);
           
        $commands = $commands->orderBy('date_saisie', 'DESC');
                    
        
        $commands = $commands->get();

        return $commands;
            }

       //annuler la demande
       public function cancel(Request $req){
        $id=$req->id;
        $motif=$req->motif;
        $nouveau_etat="Annulées";
    
        $command=Commande::find($id);
        $command->etat=$nouveau_etat;
        $command->motif=$motif;

        $command->save();

        //parties historique
        $now = Carbon::now();
        $historique_ramassage=new Ramassages_historique();
        $historique_ramassage->id_ramasse=$command->id;
        $historique_ramassage->code_ramasse=$command->num_ramasse;
        $historique_ramassage->action="annulation";
        $historique_ramassage->date_action=$now;
        $historique_ramassage->nom_user=Auth::user()->name;
        $historique_ramassage->save();

        //filters
        $du= $req->param_du_filter;
        $au=  $req->param_au_filter;
        $agence=  $req->param_agence_filter;
        $secteur= $req->param_secteur_filter;
        $etat=  $req->param_etat_filter;


        $commands=Commande::whereBetween( 'date_saisie',[ $du, $au]);
       // $commands=$commands->Where( 'date_saisie',$au);

    /*    if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
            $commands = $commands->Where('agence_client',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);*/
            if( $etat )
            $commands = $commands->whereIn('etat', explode(',', $etat));

        if($agence)
           // $commands = $commands->Where('agence_client',$agence);
           $commands = $commands->Where('agence_saisisseur',$agence);

        if($secteur)
            $commands = $commands->Where('secteur_client',$secteur);
           // $commands = $commands->Where('secteur_saisisseur',$secteur);
           
        $commands = $commands->orderBy('date_saisie', 'DESC');
                    
        
        $commands = $commands->get();

        return $commands;
        }

        //exporter la table sous forme d'un fichier excel
    /*    public function excel(){
            $commands=Commande::orderBy('id', 'DESC')->get();
            $commands_array[]=array('num_ramasse','date_saisie','nom_saisisseur','etat');
        /*    $commands_array[]=array('id',' num_ramasse',
            'date_saisie',
            'nom_saisisseur',
            'etat',
            'canal_d_appel',
            'type',
            'source',
            'code_client',
            'nom_client',
            'agence_client',
            'secteur_client',
            'adresse_client',
            'code_benificiaire',
            'nom_benificiaire',
            'accessibilite',
            'nbr_colis',
            'nature_colis',
            'mesure',
            'date_ramasse',
            'type_camion',
            'hayon',
            'commentaire','created_at','updated_at','deleted_at','ramasseur','motif'); */
           /* foreach($commands as $command){
              $commands_array[]=array(
                'num_ramasse' => $command -> num_ramasse,
                'date_saisie' => $command -> date_saisie,
                'nom_saisisseur' => $command -> nom_saisisseur,
                'etat' => $command -> etat
              );
            }

           //    dd($commands_array) ;
        

             Excel::create('Commands',function($excel) use($commands_array){
               $excel->setTitle('commands list');
               $excel->sheet('commands',function($sheet) use($commands_array){
                   $sheet->formArray($commands_array,'null','A1',false,false);
               });
            })->download('xlsx');

        }*/

        public function export(Request $request) 
    {

        $du= $request->param_du;
        $au=  $request->param_au;
        $agence=  $request->param_agence;
        if(! $agence){
            $agence="";
        }
        $secteur= $request->param_secteur;
        if(! $secteur){
            $secteur="";
        }
        $etat=  $request->param_etat;
        if(! $etat){
            $etat="";
        }
       // $today=$request->au;
       // $threedaysago=$request->du;

       // $excel=new CommandesExport;
       // dd($threedaysago);
        $output=Excel::download(new CommandesExport($du,$au,$etat,$agence,$secteur), 'commandes.xlsx');
        return $output;
    }

    //fonction pour le tableau de bord
    public function dashboard(){
        $now = Carbon::now();
        $demandes=Commande::where('agence_saisisseur',Auth::user()->agence)->whereDay('created_at', '=', $now->day)->whereMonth('created_at', '=', $now->month)->whereYear('created_at', '=', $now->year)->count();
        $nv_demandes=Commande::where('agence_saisisseur',Auth::user()->agence)->whereDay('created_at', '=', $now->day)->where('etat','Nouvelle Demande')->whereMonth('created_at', '=', $now->month)->whereYear('created_at', '=', $now->year)->count();
        $af_demandes=Commande::where('agence_saisisseur',Auth::user()->agence)->whereDay('created_at', '=', $now->day-1)->where('etat','affectées')->whereMonth('created_at', '=', $now->month)->whereYear('created_at', '=', $now->year)->count();
        $an_demandes=Commande::where('agence_saisisseur',Auth::user()->agence)->whereDay('created_at', '=', $now->day)->where('etat','Annulées')->whereMonth('created_at', '=', $now->month)->whereYear('created_at', '=', $now->year)->count();

        $data=[$demandes,$nv_demandes,$af_demandes,$an_demandes];

        return $data;
    }

}
