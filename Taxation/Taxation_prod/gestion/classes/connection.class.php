<?php

class Connection
{

    public static function getConnection()
    {
        return new PDO('mysql:dbname=taxation;host=localhost', 'root', '');
    }

    public static function getConnectionProd()
    {
        return new PDO('mysql:dbname=taxation;host=localhost', 'lve', 'adminlvedba');
    }
    public static function getConnectiontest()
    {
        return new PDO('mysql:dbname=taxation_test;host=localhost', 'root', '');
    }
    public static function getPDAConnexion()
    {
        return  new PDO("mysql:dbname=lvedbmobile;host=localhost", 'lve', 'adminlvedba');
    }

    public static function getCourrierConnexion()
    {
        return  new PDO("mysql:dbname=lvedbexp;host=localhost", 'root', '');
    }
    public static function getConsigneConnexion()
    {
        return  new PDO("mysql:dbname=api_service;host=localhost", 'root', '');
    }
    public static function getConnexionVex()
    {
        return new PDO("sqlsrv:Server=100.64.10.29,1433;Database=VEXINITIALRecette", 'dmz', 'P@sslve2021');
    }

    public static function VerifierLigneConnection($utilisateur, $motdepasse)
    {
        $result = self::getConnection()->prepare("SELECT * FROM `client_lve` WHERE `login`=? AND `mot_de_passe`=? AND `supprime_le` IS NULL");
        $result_prod = self::getConnectiontest()->prepare("SELECT * FROM `client_lve` WHERE `login`=? AND `mot_de_passe`=? AND `supprime_le` IS NULL");
        if ($result->execute([$utilisateur, $motdepasse]))
            return self::getConnection();
        elseif ($result_prod->execute([$utilisateur, $motdepasse]))
            return self::getConnectiontest();
    }
}
