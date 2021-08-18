<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database="api_service";
    $connection= new mysqli($servername, $username, $password,$database);


    if(isset($_POST["consignes"])){
        $requet="SELECT num_serie_consigne,etat,gps_latitude,gps_longitude,adresse,ville_affectation FROM consigne";
        $result=mysqli_query($connection,$requet);
        $consignes = array();
        while($row=mysqli_fetch_assoc($result)){
            $consignes[]=$row;
        }

        echo json_encode($consignes);
    }

    if(isset($_POST["villes"])){
        $requet="SELECT ville FROM ville";
        $result=mysqli_query($connection,$requet);
        $villes = array();
        while($row=mysqli_fetch_assoc($result)){
            $villes[]=$row;
        }

        echo json_encode($villes);
    }

    if(isset($_POST["numeroCasier"], $_POST["code"], $_POST["nom"], $_POST["prenom"], $_POST["ville"], $_POST["telephone"], $_POST["nbrColis"], $_POST["poids"], $_POST["tailleColis"])){
        echo "good";
        echo "<br/>". $_POST["numeroCasier"] ;
        echo "<br/>". $_POST["code"] ;
        echo "<br/>". $_POST["nom"] ;
        echo "<br/>". $_POST["prenom"] ;
        echo "<br/>". $_POST["ville"] ;
        echo "<br/>". $_POST["telephone"] ;
        echo "<br/>". $_POST["nbrColis"] ;
        echo "<br/>". $_POST["poids"] ;
        echo "<br/>". $_POST["tailleColis"] ;
    }