<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeclarationController extends Controller
{
    public function pageDeclaration(){
      return view('pages.declaration');
    }
}
