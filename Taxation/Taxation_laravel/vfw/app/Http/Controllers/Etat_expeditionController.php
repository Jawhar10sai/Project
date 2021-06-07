<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etat_expedition;

class Etat_expeditionController extends Controller
{
    public function ListeCourriers()
    {
        return view('courriers', ["courriers" => Etat_expedition::all()]);
    }
}
