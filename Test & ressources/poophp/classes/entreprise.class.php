<?php
class Entreprise
{
    function __construct()
    {
    }

    public static function getEmlopee(Employe $employe)
    {
        echo $employe->nom;
    }
}
