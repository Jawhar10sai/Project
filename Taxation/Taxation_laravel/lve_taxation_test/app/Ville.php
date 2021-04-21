<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
  public static function listeville(){
    $villes = Ville::where('VILLE_TYP','1')->get();
    return $villes;
  }

}
