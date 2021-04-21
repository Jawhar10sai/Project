<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuivisDesEnvoisController extends Controller
{
    public function pageSuivis(){
      return view('pages.tracking');
    }
}
