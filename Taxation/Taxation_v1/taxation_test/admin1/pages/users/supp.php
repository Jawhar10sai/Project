<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');
if (isset($_POST['decoclient'])) {
$clients->deconnecte($_POST['idclient']);
header('location: ../index.php?p=ADuser');
}

 ?>
