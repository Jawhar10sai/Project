<?php
class Courrier
{
    function __construct()
    {
    }
    public static function TrouverCourrierParNumero($numero)
    {
        $connection = new PDO("mysql:dbname=lvedbexp;host=localhost", 'lve', 'adminlvedba');
        $result =     $connection->prepare("SELECT * FROM `etat_expedition` WHERE `Numero`=?");
        return ($result->execute([$numero])) ? $result->fetch(PDO::FETCH_OBJ) : false;
    }

    public static function TrouverCourrier($id)
    {
        $connection = new PDO("mysql:dbname=lvedbexp;host=localhost", 'lve', 'adminlvedba');
        $result =     $connection->prepare("SELECT * FROM `etat_expedition` WHERE `courrier_id`=?");
        return ($result->execute([$id])) ?  $result->fetch(PDO::FETCH_OBJ) : false;
    }

    public static function TrouverCourrierClient($id, $client)
    {
        $connection = new PDO("mysql:dbname=lvedbexp;host=localhost", 'lve', 'adminlvedba');
        $result =   $connection->prepare("SELECT * FROM `etat_expedition` WHERE `courrier_id`=? AND Code1=?");
        return ($result->execute([$id, $client])) ? $result->fetch(PDO::FETCH_OBJ) : false;
    }
}
