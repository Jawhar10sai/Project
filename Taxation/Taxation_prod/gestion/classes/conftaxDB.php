<?php
$taxserver = 'localhost';
$taxuser = 'root';
$taxpassword = '';
$taxabase = 'taxation';
$GLOBALS['conn'] = new PDO("mysql:host=" . $taxserver . ";dbname=" . $taxabase, $taxuser, $taxpassword);

#$GLOBALS['conn_etat_exp'] = new PDO("mysql:host=$taxserver ;dbname=$taxabase", $taxuser, $taxpassword);
#mysqli($taxserver,$taxuser,$taxpassword,$taxabase) or die(mysqli_error($GLOBALS['conn']));
