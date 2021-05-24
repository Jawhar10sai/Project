<?php
require_once '../../../gestion/classes/fetchclas.php';
if (isset($_POST['decoclient'])) {
    $clients->deconnecte($_POST['idclient']);
    header('location: ../index.php?p=ADuser');
}
