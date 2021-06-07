<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Etat_expedition extends Model
{
    use HasFactory;
    protected $connection = "mysql2";
}
