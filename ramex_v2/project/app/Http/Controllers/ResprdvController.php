<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Commande;

use App\Exports\CommandesExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Auth;

class ResprdvController extends Controller
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


    public function RespRDVview(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('homeresprdv');
        }else{
            return view('error403');
        }
        //return view('homeresprdv');
    }

    public function showCommands(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showRespRDVCommands');
        }else{
            return view('error403');
        }
        //return view('showRespRDVCommands');
    }

    /*public function export(Request $request) 
    {
       // $excel=new CommandesExport;
        //dd($request);
        return Excel::download(new CommandesExport, 'commandes.xlsx');
    }*/
}
