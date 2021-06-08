<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etat_expedition;

class Etat_expeditionController extends Controller
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
    public function ListeCourriers()
    {
        return view('courriers', ["courriers" => Etat_expedition::all()]);
    }
}
