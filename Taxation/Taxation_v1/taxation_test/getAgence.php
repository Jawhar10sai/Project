<?php
require_once("classes/fetchclas.php");
if (isset($_POST['code_ville'])) {
    echo "Votre expédition va être livrée à notre agence:  ".$villes->LIBAagence($villes->AgenceVille($_POST['code_ville']));
}else
    echo "Veillez vous choisir la ville de destination";
?>