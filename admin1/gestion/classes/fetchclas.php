<?php
include_once ("clients.class.php");
include_once ('declarations.class.php');
include_once ("villes.class.php");
include_once ("adresses.class.php");
include_once ("agences.class.php");
include_once ("ClientSession.class.php");
include_once ("pointsrelais.class.php");
include_once ("ramassage.class.php");
include_once ("utilisateur.class.php");
include_once ("reclamations.class.php");
include_once ("courrier.class.php");
$client_lve = new ClientLve;
$sous_client = new SousClient;
$declarations = new Declarations;
$villes = new Villes;
$adresses = new Adresses;
$agences = new Agence;
$messessions = new ClientSession;
$pointsrelais = new PointsRelais;
$ramassages = new Ramassage;
$utilisateur = new Utilisateurs;
$reclamations = new Reclamations;
$courrier = new Courrier;

 ?>
