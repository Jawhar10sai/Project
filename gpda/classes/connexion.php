<?php

class Connexion
{
    protected  static $connexion;

    public static function getConnexion(){
        return new PDO('mysql:dbname=lve_gpda;host=localhost', 'root', '');
    }

}
