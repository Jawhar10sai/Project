<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\userRequest;
use App\Http\Requests\moduserRequest;
use App\Models\Users_historique;
//Carbon is a laravel api used to extract datetime 
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        if(Auth::user()->profil === "ADMIN"){
            return view('homeadmin');
        }else{
            return view('error403');
        }
    }
    
    public function addUser(){
        if(Auth::user()->profil === "ADMIN"){
            return view('addUser');
        }else{
            return view('error403');
        }
        //return view('addUser');
    }

    public function modUser(){
        if(Auth::user()->profil === "ADMIN"){
            return view('modUser');
        }else{
            return view('error403');
        }
        //return view('modUser');
    }

    public function showUsers(){
        if(Auth::user()->profil === "ADMIN"){
            return view('showUsers');
        }else{
            return view('error403');
        }
       // return view('showUsers');
    }


    public function showClientsHistory(){
        if(Auth::user()->profil === "ADMIN"){
            return view('showClientsHistory');
        }else{
            return view('error403');
        }
       // return view('showUsers');
    }

    public function showCommandsHistory(){
        if(Auth::user()->profil === "ADMIN"){
            return view('showCommandsHistory');
        }else{
            return view('error403');
        }
       // return view('showUsers');
    }

    public function showUsersHistory(){
        if(Auth::user()->profil === "ADMIN"){
            return view('showUsersHistory');
        }else{
            return view('error403');
        }
    }

    public function showAgencesView(){
        if(Auth::user()->profil === "ADMIN"){
            return view('showAgences');
        }else{
            return view('error403');
        }
       // return view('showUsers');
    }

    public function showSectorsView(){
        if(Auth::user()->profil === "ADMIN"){
            return view('showSectors');
        }else{
            return view('error403');
        }
       // return view('showUsers');
    }

    public function showCommercialView(){
        if(Auth::user()->profil === "ADMIN"){
            return view('showCommercial');
        }else{
            return view('error403');
        }
       // return view('showUsers');
    }

    //add users
    public function store(userRequest $req){
        $user=new User();
        //obj->nom_du_champ_dans_la_DB=$req->input('nom du champ dans la vue')
        $user->profil=$req->input('profil');
        $user->agence=$req->input('agence');
        $user->secteur=$req->input('secteur');
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        //si la requete a un fichier posé dans le champ du nom image
        if($req->hasFile('image')){
            //$user->image=$req->image->store('C:/xampp/htdocs/login/storage/photos');
          // $user->image=$req->file('image')->store('photos');
    

          $image = $req->file('image');
          $image_name = $image->getClientOriginalExtension();
          $image_name = time(). '.' . $image_name;
          $image->move(public_path('photos'),$image_name);

       
        }
        $user->image = $image_name ?? null ;

        $user->save();

        //parties historique
        $now = Carbon::now();
        $historique_users=new Users_historique();
        $historique_users->id_user=$user->id;
        $historique_users->nom=$user->name;
        $historique_users->action="ajout";
        $historique_users->date_action=$now;
        $historique_users->nom_user=Auth::user()->name;
        $historique_users->save();




        //$success="user is created succesfully";
       // return $success;
      // return redirect()->route('home')
       //->with('success','user is created succesfully');
       $users=User::orderBy('id','desc')->get();
       return $users;
    }
    

    //mod user
    /*public function edit($name){
        $user=Profil::find($name);
        return view('modUser',['user'=>$user]);
        }*/
//modifier un utilisateur par l'admin
       public function update(Request $req){

        $user=User::find($req->input('id'));
        $user->profil=$req->input('modprofil');
        $user->agence=$req->input('modagence');
        $user->secteur=$req->input('modsecteur');
        $user->name=$req->input('modname');
        $user->email=$req->input('modemail');
        if($req->input('modpassword') != ""){
            $user->password=Hash::make($req->input('modpassword'));
        }
        //si la requete a un fichier posé dans le champ du nom image
        if($req->hasFile('modimage')){
            //$user->image=$req->modimage->store('photos');
          //  $user->image=$req->file('modimage')->store('photos');
          $image = $req->file('modimage');
          $image_name = $image->getClientOriginalExtension();
          $image_name = time(). '.' . $image_name;
          $image->move(public_path('photos'),$image_name);
        }

        $user->image = $image_name ?? null ;

        $user->save();

         //parties historique
         $now = Carbon::now();
         $historique_users=new Users_historique();
         $historique_users->id_user=$user->id;
         $historique_users->nom=$user->name;
         $historique_users->action="modification";
         $historique_users->date_action=$now;
         $historique_users->nom_user=Auth::user()->name;
         $historique_users->save();

        $users=User::orderBy('id','desc')->get();
        return $users;
        }

//modifier un utilisateur de ses infos personnelles
        public function update2(Request $req){

            $user=User::find(Auth::user()->id);
           // consol.log($user);
            if($req->input('modpassword2') != ""){
                $user->password=Hash::make($req->input('modpassword2'));
            }
            //si la requete a un fichier posé dans le champ du nom image
            if($req->hasFile('modimage2')){
                //$user->image=$req->modimage->store('photos');
              //  $user->image=$req->file('modimage')->store('photos');
              $image = $req->file('modimage2');
              $image_name = $image->getClientOriginalExtension();
              $image_name = time(). '.' . $image_name;
              $image->move(public_path('photos'),$image_name);
              $user->image = $image_name ?? null ;
            }
    
            
    
            $user->save();
    
             //parties historique
             $now = Carbon::now();
             $historique_users=new Users_historique();
             $historique_users->id_user=$user->id;
             $historique_users->nom=$user->name;
             $historique_users->action="modification";
             $historique_users->date_action=$now;
             $historique_users->nom_user=Auth::user()->name;
             $historique_users->save();
    
            $users=User::orderBy('id','desc')->get();
            return $users;
            }



        public function delete(Request $req){
            $user=User::find($req->input('iddeluser'));
            $user->delete();

            //parties historique
            $now = Carbon::now();
            $historique_users=new Users_historique();
            $historique_users->id_user=$user->id;
            $historique_users->nom=$user->name;
            $historique_users->action="suppression";
            $historique_users->date_action=$now;
            $historique_users->nom_user=Auth::user()->name;
            $historique_users->save();


            $users=User::orderBy('id','desc')->get();
            return $users;
        }

           /* public function finduser(){
            // $user=User::where('name',$req->param_name);
             $user=User::find($req->param_id);
             $user->profil=$req->param_profil;
             //$user->email=$req->param_email;
             //$user->username=$req->input('name');
             //$user->password=$req->input('password');
             $user->save();
             return redirect()->route('home')
             ->with('success','user is updated succesfully');
            //return $user;
             }*/

/*
//modify user part
public function index(){
  //  \App\Model::where('id', 1)->pluck('first_name','pic');
    //$nameusers=Profil::all()->pluck('username');
    $userslist=Profil::all()->pluck('username');
    return view('modUser',compact('userslist'));
}

public function showusers(){            
$myuserslist=Profil::all();
//return view('adminAccueil',compact('myuserslist','name'));
return view('adminAccueil')->with('myuserslist',$myuserslist);
}

public function edit($id){
$user=Profil::find($id);
return view('modUser',['user'=>$user]);
}

public function update(Request $req,$id){
$user=Profil::find($id);
$user->profil=$req->input('profil');
$user->username=$req->input('username');
$user->password=$req->input('password');
$user->save();
return redirect()->route('showusers')
->with('success','user is updated succesfully');
}

public function delete($id){
    $user=Profil::find($id);
    $user->delete();
    return redirect()->route('showusers')
    ->with('success','user is deleted succesfully');
}*/
}
