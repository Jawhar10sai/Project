<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agence;

class AgenceController extends Controller
{
    public function ListeAgences()
    {
        return Agence::all();
    }

    public function AjouterAgence(Request $requete)
    {
        return Agence::create(
            $requete->all()
        );
    }
}
