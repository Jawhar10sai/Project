<?php

class Stock
{
    function __construct()
    {
    }

    public static function Etat_de_stock($client)
    {
        $result = Connection::getConnection()->prepare("SELECT * FROM `etat_stock_intralot` WHERE `client_cod`=?");
        return ($result->execute([$client])) ? $result->fetchAll(PDO::FETCH_OBJ) : false;
    }
    public static function Date_MAJ()
    {
        $result = Connection::getConnection()->query("SELECT * FROM `etat_stock_intralot` LIMIT 1");
        return ($result) ? $result->fetch(PDO::FETCH_OBJ)->date_mise_a_jour : false;
    }
}
