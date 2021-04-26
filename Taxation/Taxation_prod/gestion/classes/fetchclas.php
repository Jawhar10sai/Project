<?php
error_reporting(E_ERROR | E_PARSE);
include_once "connection.class.php";
include_once "clients.class.php";
include_once 'declarations.class.php';
include_once "villes.class.php";
include_once "adresses.class.php";
include_once "agences.class.php";
include_once "ClientSession.class.php";
include_once "pointsrelais.class.php";
include_once "reclamations.class.php";
include_once "connexion.class.php";
include_once "admin.class.php";


#Auto_Loader_cusomized
/*
spl_autoload_register('myAutoLoader');
function myAutoLoader($className)
{
    $path = $className . ".class.php";
    include_once $path;
}
*/