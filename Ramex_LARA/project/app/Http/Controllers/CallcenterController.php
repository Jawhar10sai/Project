<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CallcenterController extends Controller
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
        if(Auth::user()->profil === "OPERATEUR CALL CENTER"){
            return view('homeoperateurcallcenter');
        }else{
            return view('error403');
        }
       // return view('homeoperateurcallcenter');
    }
    
    public function showCommands(){
        if(Auth::user()->profil === "OPERATEUR CALL CENTER"){
            return view('showCommandsCallCenter');
        }else{
            return view('error403');
        }
        //return view('showCommandsCallCenter');
    }

}
