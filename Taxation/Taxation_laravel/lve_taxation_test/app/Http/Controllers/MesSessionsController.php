<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MesSessionsController extends Controller
{
    public function pageMesSessions(){
      return view('pages.sessionss');
    }
}
