<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //return view('home');
        if( (Auth::user()->profil) === "ADMIN"){
             return view('homeadmin');
        }

        else 
        if((Auth::user()->profil) === "RESPONSABLE DE RAMASSAGE" ){
            return view('homerespramassage');
        }
        else 
        if((Auth::user()->profil) === "RESPONSABLE ADV"){
            return view('homeresprdv');
        }
        else
        if((Auth::user()->profil) === "OPERATEUR CALL CENTER"){
            return view('homeoperateurcallcenter');
        }
        else
        if((Auth::user()->profil) === "RESPONSABLE CALL CENTER"){
            return view('homerespcallcenter');
        }
       
    }

    public function erreur403(){
        return view('error403');
    }

}
