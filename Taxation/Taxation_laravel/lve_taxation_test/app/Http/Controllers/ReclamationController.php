<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function pageReclamation(){
      return view('pages.reclamation');
    }
}
