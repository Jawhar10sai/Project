<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profil;
use App\Models\Agence;
use App\Models\Secteur;
use App\Models\Commercial;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Ramasseur;
use App\Models\Motif;
use App\Models\Statistic;
use App\Models\Fichier;
use App\Models\Age;
use App\Models\Zeroramassage;
use App\Models\Tacramassage;
use App\Models\Statistics0ram;
use App\Models\Statistics35ram;
use App\Models\Passage;
use App\Models\Globstatistic;
use App\Models\Clients_historique;
use App\Models\Ramassages_historique;
use App\Models\Users_historique;


use Illuminate\Support\Facades\Auth;

class SelectController extends Controller
{
    
    public function selectprofil(){
        $profils=Profil::all();
        return $profils;
    }

    public function selectagence(){
        //$agences=Agence::all();
        if(Auth::user()->profil == "ADMIN"){
            $agences=Agence::all();
        }else{
            $agences=Agence::where('nom_agence',Auth::user()->agence)->get();
        }
        return $agences;
    }

    public function selectsector(Request $req){
        $agence=$req->ag;
        if(Auth::user()->profil == "ADMIN"){
            $sectors=Secteur::where('nom_agence', $agence)->get();
                }else{
             $sectors=Secteur::where('nom_agence',Auth::user()->agence)->get();
        }
       // $sectors=Secteur::where('nom_agence', $agence)->get();
      // $sectors=Secteur::where('nom_agence',Auth::user()->agence)->get();
        return $sectors;
    }

    public function selectsector2(Request $req){
       $sectors=Secteur::where('nom_agence',Auth::user()->agence)->get();
        $sectors=Secteur::orderBy('id','desc')->get();
        return $sectors;
    }

    public function selectAllCommercials(Request $req){
        if(Auth::user()->profil == "ADMIN"){
            $commercials=Commercial::orderBy('id','desc')->get();
        } else{
            $commercials=Commercial::where('agence_commercial',Auth::user()->agence)->orderBy('id','desc')->get();
        }
        return $commercials;
    }
    
    //edit users
    public function selectname(){
        $users=User::orderBy('id','desc')->get();
        return $users;
    }

    public function SelectedProfil(Request $req){
        $name=$req->nm;
        $user=User::where('name', $name)->get();
        return $user;
    }

    //add client
    public function selectcommercial(Request $req){
        $secteur=$req->sec;
        $commercials=Commercial::where('secteur_commercial', $secteur)->get();
        return $commercials;
    }
    //select all clients
    //edit users
    public function clients(){
       // $clients=Client::orderBy('id','DESC')->get();;
        $clients=Client::whereIn('nom_saisisseur', User::where('agence', Auth::user()->agence)->pluck('name'))->orderBy('id','DESC')->get();
        return $clients;
    }

    //select client by code
    public function SelectedClient(Request $req){
        $code=$req->cd;
        if($code != 0){
            $client=Client::where('code_client', $code)->where('agence_client', Auth::user()->agence)->get();
            //  $client=Client::where('code_client', $code)->get();
              return $client;
        }     
    }

     //select client by name
     public function SelectedClientByName(Request $req){
        $name=$req->nm;
        $client=Client::where('nom_client', $name)->where('agence_client', Auth::user()->agence)->get();
        //$client=Client::where('nom_client', $name)->get();
        return $client;
    }

    //show all commands
     public function selectcommand(Request $req){
        $du= $req->du;
        $au=  $req->au;
        $commands=Commande::whereBetween( 'date_saisie',[ $du, $au]);
        $commands=$commands->where('agence_saisisseur',Auth::user()->agence);
      //  $commands=$commands->where('agence_client',Auth::user()->agence);
        //$commands=$commands->Where( 'date_saisie',$au);
        $commands=$commands->orderBy('date_saisie', 'DESC');
        $commands=$commands->get();
        return $commands;
    } 

    //show commands after filters
    
     public function selectcommandsafterfilters(Request $req){
        $du= $req->param_du;
        $au=  $req->param_au;
        $agence=  $req->param_agence;
        $secteur= $req->param_secteur;
        $etat=  $req->param_etat;

        //$commands=Commande::where('agence_client',Auth::user()->agence);
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
           
        $commands = $commands->orderBy('date_saisie', 'DESC');
                    
        
        $commands = $commands->get();
       // $commands=Commande::paginate(5);
        //$commands=Commande::all();
        //$commands=Commande::orderBy('date_saisie', 'DESC')->get();
        return $commands;
    } 

     //select command by id
     public function SelectedCommandById(Request $req){
        $id=$req->id;
        $command=Commande::where('id', $id)->get();
        return $command;
    }

     //select ramasseur by matricule
     public function SelectedRamasseurByMatricule(Request $req){
        $matricule=$req->matricule;
        $agence=$req->agence;
        $ramasseur=Ramasseur::where('matricule', $matricule)->where('agence', Auth::user()->agence)->get();
        return $ramasseur;
    }

     //select ramasseur by name
     public function SelectedRamasseurByName(Request $req){
        $name=$req->nm;
        $ramasseur=Ramasseur::where('nom', $name)->get();
        return $ramasseur;
    }

    

    //show all motifs
    public function selectmotif(){

        $motif=Motif::orderBy('id', 'DESC')->get();

        return $motif;
    }

     //show all statistics of clients with zero ram
     public function selectstatistic1(){

           //$statistics=Statistic::where('somme',0)->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_0ramassage', 'ASC')->get();
           $statistics=Statistic::where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_0ramassage', 'ASC')->get();
           $ages=Age::all();
           $agezerorams=Zeroramassage::all();

        foreach($statistics as $statistic){
            foreach($ages as $age){
          //      if($statistic->commercial == $age->commercial && $statistic->client == $age->client){
                    if($statistic->client == $age->client && $statistic->nom_utilisateur == $age->nom_utilisateur){
                    
                //    $max_age=Age::where('commercial',$statistic->commercial)->where('client',$statistic->client)->max('age_reel');
                /*    $max_age=Age::where('client',$statistic->client)->max('age_reel');
                    $statistic->age_reel=$max_age;*/
                    $statistic->age_reel=$age->age_reel;
                 //   $statistic->save();

                }

            }

            //ecrire 1 a l'age reel des nouveaux clients
         /*   $val=Age::where('nom_utilisateur',Auth::user()->name)->where('client',$statistic->client)->count();
            if($val==0){
                $statistic->age_reel =1;
            }*/

            foreach($agezerorams as $agezeroram){
                if($statistic->nom_utilisateur == $agezeroram->nom_utilisateur && $statistic->client == $agezeroram->client){

               /*   $max_agezeroram=Zeroramassage::where('nom_utilisateur',$statistic->nom_utilisateur)->where('client',$statistic->client)->max('age_avec_0ramassage');
                    $nom_fichier=Zeroramassage::select('nom_fichier')->where('nom_utilisateur',$statistic->nom_utilisateur)->where('client',$statistic->client)->value('nom_fichier');
                
                  
                    $statistic->age_avec_0ramassage=$max_agezeroram;
                    $statistic->nom_fichier_age_0ram=$nom_fichier;*/
                    if($statistic->somme == 0){
                        $statistic->age_avec_0ramassage=$agezeroram->age_avec_0ramassage+1;
                    } else{
                        $statistic->age_avec_0ramassage=$agezeroram->age_avec_0ramassage;
                    }

                    $statistic->nom_fichier_age_0ram=$agezeroram->nom_fichier;

                }
            }


            $statistic->save();


        }

         //Table utilisée dans la chart des clients avec zero ramasse(statistics0rams)

         //remplir la colonne age
        //$stats=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->whereNotNull('age_avec_0ramassage')->get();
        $stats=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->orderBy('age_avec_0ramassage', 'ASC')->get();
        //dd($stats);
        // $stats0rams=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->get();

        foreach($stats as $stat){
        
            //$var=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->where('age',$stat->age_avec_0ramassage)->count();
            if($stat->age_avec_0ramassage != null){
                Statistics0ram::firstOrCreate([ 'age'=>$stat->age_avec_0ramassage,'nom_utilisateur'=>Auth::user()->name]);
            }
        }

        //remplir la colonne nbr_clients et pourcentage
        $nbr_clients=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->count();
        $stats0rams=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->get();
        foreach($stats0rams as $stats0ram){
            $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->where('age_avec_0ramassage',$stats0ram->age)->count();
            $percentage=($counter * 100)/$nbr_clients;

            $stats0ram->nbr_clients=$counter;
            $stats0ram->pourcentage=$percentage;

            $stats0ram->save();
        }
        //end table

    

        $statistics2=Statistic::where('somme',0)->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_0ramassage', 'ASC')->get();

        return $statistics2;
    }


    
     //show all statistics of clients with 3*5 ram
     public function selectstatistic2(){

       // $statistics=Statistic::whereBetween( 'somme',[ 3, 5])->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_3_5ramassage', 'ASC')->get();
        $statistics=Statistic::where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_3_5ramassage', 'ASC')->get();
        $ages=Age::all();
        $age35rams=Tacramassage::all();

     foreach($statistics as $statistic){
         foreach($ages as $age){
       //      if($statistic->commercial == $age->commercial && $statistic->client == $age->client){
                 if($statistic->client == $age->client && $statistic->nom_utilisateur == $age->nom_utilisateur){
                 
             //    $max_age=Age::where('commercial',$statistic->commercial)->where('client',$statistic->client)->max('age_reel');
            /*     $max_age=Age::where('client',$statistic->client)->max('age_reel');
                 $statistic->age_reel=$max_age;*/
                 $statistic->age_reel=$age->age_reel;
              //   $statistic->save();

             }
         }

         //ecrire 1 a l'age reel des nouveaux clients
      /*   $val=Age::where('nom_utilisateur',Auth::user()->name)->where('client',$statistic->client)->count();
         if($val==0){
             $statistic->age_reel =1;
         }*/

         foreach($age35rams as $age35ram){
             if($statistic->nom_utilisateur == $age35ram->nom_utilisateur && $statistic->client == $age35ram->client){

              /*   $max_agetacram=Tacramassage::where('client',$statistic->client)->max('age_avec_3_5ramassages');
                 $statistic->age_avec_3_5ramassage=$max_agetacram;*/
                 if($statistic->somme >= 3){
                    $statistic->age_avec_3_5ramassage=$age35ram->age_avec_3_5ramassages+1;
                } else{
                    $statistic->age_avec_3_5ramassage=$age35ram->age_avec_3_5ramassages;
                                }
           //      $statistic->age_avec_3_5ramassage=$age35ram->age_avec_3_5ramassages;
                 $statistic->nom_fichier_age_3_5ram=$age35ram->nom_fichier;
                 

             }
         }
         $statistic->save();
     }

      //Table utilisée dans la chart des clients avec 3*5 ramasses(statistics35rams)

         //remplir la colonne age
        // $stats=Statistic::where('nom_utilisateur',Auth::user()->name)->whereBetween( 'somme',[ 3, 5])->whereNotNull('age_avec_3_5ramassage')->get();
         $stats=Statistic::where('nom_utilisateur',Auth::user()->name)->whereBetween( 'somme',[ 3, 5])->orderBy('age_avec_3_5ramassage', 'ASC')->get();

  
         foreach($stats as $stat){
            if($stat->age_avec_3_5ramassage != null){
                 Statistics35ram::firstOrCreate([ 'age'=>$stat->age_avec_3_5ramassage,'nom_utilisateur'=>Auth::user()->name]);
            }
         }
 
         //remplir la colonne nbr_clients et pourcentage
         $nbr_clients=Statistic::where('nom_utilisateur',Auth::user()->name)->whereBetween( 'somme',[ 3, 5])->count();
         $stats35rams=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->get();
         foreach($stats35rams as $stats35ram){
             $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->where('age_avec_3_5ramassage',$stats35ram->age)->whereBetween( 'somme',[ 3, 5])->count();
             $percentage=($counter * 100)/$nbr_clients;
 
             $stats35ram->nbr_clients=$counter;
             $stats35ram->pourcentage=$percentage;
             $stats35ram->save();
         }





     $statistics2=Statistic::whereBetween( 'somme',[ 3, 5])->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_3_5ramassage', 'ASC')->get();

    // $statistics2=Statistic::where('somme',0)->orderBy('age_avec_0ramassage', 'ASC')->get();
     return $statistics2;
 }





      //show all clients in ramassage sheet
      public function selectstatistic3(){

        $statistics=Statistic::where('nom_utilisateur',Auth::user()->name)->get();
       
     return $statistics;
 }

 
      //show all clients in passage sheet
      public function selectstatistic4(){

        //ajouter les clients qui existent dans la feuille de ramasse et n'existe pas dans la feuille passage
        $stats=Statistic::where('nom_utilisateur',Auth::user()->name)->get();
        foreach($stats as $stat){
            $counter = Passage::where('nom_utilisateur',Auth::user()->name)->where('client',$stat->client)->count();
            if($counter == 0){
                Passage::firstOrCreate([ 'client'=>$stat->client,'secteur'=>$stat->secteur,'nom_utilisateur'=>Auth::user()->name,'s1'=> 0,'s2'=> 0,'s3'=> 0,'s4'=> 0]);
            }
        }

        //affecter s5 aux clients dans la table passage
        $passages=Passage::where('nom_utilisateur',Auth::user()->name)->get();
        foreach($passages as $passage){
            $somme = Statistic::where('nom_utilisateur',Auth::user()->name)->where('client',$passage->client)->value('somme');
            if($somme == 0){
                $passage->s5 = 0;
            } else{
                $passage->s5 = 1;
            }
            $passage->save();
        }

        //remplir la colonne total dans la table passage
        foreach($passages as $passage){
            $somme = $passage->s1 +$passage->s2 +$passage->s3 +$passage->s4 +$passage->s5;
            $passage->total_passage = $somme;
            $passage->save();
        }

        //remplir les champs 0 1*2 3*5
        foreach($passages as $passage){
           if($passage->total_passage == 0){
               $passage->cat_0 = 1;
               $passage->cat_12 = 0;
               $passage->cat_35 = 0;
           }
           if($passage->total_passage > 0 && $passage->total_passage < 3){
            $passage->cat_0 = 0;
            $passage->cat_12 = 1;
            $passage->cat_35 = 0;
           }
           if($passage->total_passage > 2){
            $passage->cat_0 = 0;
            $passage->cat_12 = 0;
            $passage->cat_35 = 1;
            }

         $passage->save();
        }

     $passages=Passage::where('nom_utilisateur',Auth::user()->name)->get();
     return $passages;
 }




 /********************** ***********************/
     //show all statistics of clients 
     public function selectstatistic5(){
      //  $age_inc=$req->age;
        //$statistics=Statistic::where('somme',0)->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_0ramassage', 'ASC')->get();
        $statistics=Statistic::where('nom_utilisateur',Auth::user()->name)->orderBy('age_reel', 'ASC')->get();
        $clients=Globstatistic::where('nom_utilisateur',Auth::user()->name)->get();

        // $statisticsx=Statistic::where('nom_utilisateur',Auth::user()->name)->orderBy('age_reel', 'ASC')->get();
        // foreach($statisticsx as $statisticx){
        //    if($statisticx->age_reel== null) {
        //     $statisticx->age_reel=$age_inc;
        //     $statisticx->save();
        //    }
        // }
       

     foreach($statistics as $statistic){

        $counter=Globstatistic::where('nom_utilisateur',Auth::user()->name)->where('client',$statistic->client)->count();

        if($counter == 0){
            if( $statistic->somme == 0){
                $statistic->age_avec_0ramassage=1;
             }else if($statistic->somme >=3){
                $statistic->age_avec_3_5ramassage=1;
             }
        }

         foreach($clients as $client){
       //      if($statistic->commercial == $age->commercial && $statistic->client == $age->client){
                 if($statistic->client == $client->client && $statistic->nom_utilisateur == $client->nom_utilisateur){
                 
             //    $max_age=Age::where('commercial',$statistic->commercial)->where('client',$statistic->client)->max('age_reel');
             /*    $max_age=Age::where('client',$statistic->client)->max('age_reel');
                 $statistic->age_reel=$max_age;*/
                 $statistic->age_reel=$client->age_reel;

                 if( $statistic->somme == 0){
                    $statistic->age_avec_0ramassage=$client->age_avec_0ramassage+1;
                    $statistic->age_avec_3_5ramassage=$client->age_avec_3_5ramassage;
                 }else if($statistic->somme >=3){
                    $statistic->age_avec_0ramassage=$client->age_avec_0ramassage;
                    $statistic->age_avec_3_5ramassage=$client->age_avec_3_5ramassage+1;
                 } else{
                    $statistic->age_avec_0ramassage=$client->age_avec_0ramassage;
                    $statistic->age_avec_3_5ramassage=$client->age_avec_3_5ramassage;
                 }

                
              //   $statistic->save();

             }

         }

         $statistic->save();
     }

     $statistics2=Statistic::where('nom_utilisateur',Auth::user()->name)->orderBy('age_reel', 'DESC')->get();
     foreach($statistics2 as $statistic2){
        //   if($statistic2->age_reel == null){
        //      $statistic2->age_reel = 1;
        //   }
         if($statistic2->age_avec_0ramassage == null){
            $statistic2->age_avec_0ramassage = 0;
         }
         if($statistic2->age_avec_3_5ramassage == null){
            $statistic2->age_avec_3_5ramassage = 0;
         }
         $statistic2->save();
     } 

     /*changer l'age reel des nouveaux clients */ 
    //   $statistics3=Statistic::where('nom_utilisateur',Auth::user()->name)->orderBy('age_reel', 'DESC')->get();
    // //  $clients2=Globstatistic::where('nom_utilisateur',Auth::user()->name)->get();
    //  $max_age=Globstatistic::where('nom_utilisateur',Auth::user()->name)->max('age_reel');
    //  $client_glob=Globstatistic::where('nom_utilisateur',Auth::user()->name)->where('age_reel',$max_age)->first();
    // $client_stat=Statistic::where('client',$client_glob->client)->where('nom_utilisateur',Auth::user()->name)->first();
   // $diff_age=null;
    // foreach($statistics3 as $statistic3){
    //     if($statistic3->client == $client_glob->client){
    //       //  dd($statistic);
    //       $diff_age=$statistic3->age_reel - $client_glob->age_reel;
    //       dd($diff_age);
    //     }
    // }
     //$diff_age=$client_stat->age_reel - $client_glob->age_reel;
    // dd( $diff_age);



        /* Table utilisée dans la chart des clients avec zero ramasse(statistics0rams) */
         //remplir la colonne age
        $stats=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->orderBy('age_avec_0ramassage', 'ASC')->get();
        foreach($stats as $stat){
            if($stat->age_avec_0ramassage != null){
                Statistics0ram::firstOrCreate([ 'age'=>$stat->age_avec_0ramassage,'nom_utilisateur'=>Auth::user()->name]);
            }
        }
        //remplir la colonne nbr_clients et pourcentage
        $nbr_clients=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->count();
        $stats0rams=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->get();
        foreach($stats0rams as $stats0ram){
            $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->where('age_avec_0ramassage',$stats0ram->age)->count();
            $percentage=($counter * 100)/$nbr_clients;

            $stats0ram->nbr_clients=$counter;
            $stats0ram->pourcentage=$percentage;

            $stats0ram->save();
        }
        /* end table */




        /* Table utilisée dans la chart des clients avec 3*5 ramasses(statistics35rams) */
         //remplir la colonne age
        $stats2=Statistic::where('nom_utilisateur',Auth::user()->name)->whereBetween( 'somme',[ 3, 5])->orderBy('age_avec_3_5ramassage', 'ASC')->get();
        foreach($stats2 as $stat2){
           if($stat2->age_avec_3_5ramassage != null){
                Statistics35ram::firstOrCreate([ 'age'=>$stat2->age_avec_3_5ramassage,'nom_utilisateur'=>Auth::user()->name]);
           }
        }
        //remplir la colonne nbr_clients et pourcentage
        $nbr_clients2=Statistic::where('nom_utilisateur',Auth::user()->name)->whereBetween( 'somme',[ 3, 5])->count();
        $stats35rams2=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->get();
        foreach($stats35rams2 as $stats35ram2){
            $counter2=Statistic::where('nom_utilisateur',Auth::user()->name)->where('age_avec_3_5ramassage',$stats35ram2->age)->whereBetween( 'somme',[ 3, 5])->count();
            $percentage2=($counter2 * 100)/$nbr_clients2;
            $stats35ram2->nbr_clients=$counter2;
            $stats35ram2->pourcentage=$percentage2;
            $stats35ram2->save();
        }
        /* end sec table*/

     $statistics4=Statistic::where('nom_utilisateur',Auth::user()->name)->orderBy('age_reel', 'DESC')->get();

     return $statistics4;
 }

 /********************** **********************/



    //show all file names
    public function selectfilenames(){

        $files=Fichier::where('nom_utilisateur',Auth::user()->name)->orderBy('id', 'DESC')->get();

        return $files;
    }


     //show all clients with somme=0
     public function selectNullsomme(){

        $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->count();
        return $counter;
     }

     //show all clients with age_0ram=null
     public function selectNullAges(){

       $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->whereNull('age_avec_0ramassage')->count();
       return $counter;
    }

     //show all clients with somme=0
     public function select35somme(){

        $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->whereBetween( 'somme',[ 3, 5])->count();
        return $counter;
     }

     //show all clients with age_3*5ram=null
     public function select35Ages(){

        $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->whereBetween( 'somme',[ 3, 5])->whereNull('age_avec_3_5ramassage')->count();
        return $counter;
     }

     //show all clients in feuille de ramasse
     public function selectAllFramClients(){

        $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->count();
        return $counter;
     }

    //show all chart data of clients with age0ram
    public function statszeroram(){
        $stats=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->orderBy('age','asc')->get();
        return $stats;
     }

      //show all chart data of clients with age35rams
    public function stats35rams(){
        $stats=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->orderBy('age','asc')->get();
        return $stats;
     }

      //show all clients in passages table
      public function selectAllPassageClients(){
        $counter=Passage::where('nom_utilisateur',Auth::user()->name)->count();
        return $counter;
     }

      //show all clients history
      public function selectAllClientsHistory(){
        $history=Clients_historique::orderBy('id','desc')->get();
        return $history;
     }

      //show all commands history
      public function selectAllCommandsHistory(){
        $history=Ramassages_historique::orderBy('id','desc')->get();
        return $history;
     }
    
      //show all users history
      public function selectAllUsersHistory(){
        $history=Users_historique::orderBy('id','desc')->get();
        return $history;
     }

}
