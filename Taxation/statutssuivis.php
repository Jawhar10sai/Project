<?php
// fal fa-desktop
case "En saisie":
//fad fa-scanner
case "En preparation":
//fad fa-box-check
case "Préparée":
//fad fa-shipping-timed
case "à Relivrée":
//fad fa-hand-holding-box
case "Livrée":
//fad fa-warehouse-alt
case "Arrivée : Agence de Destination La Voie Express":
case "Arrivée : Agence Transit La Voie Express":
//fas fa-truck
case "Chargé":
//fad fa-warehouse
case "Retournée":
case "Epave":
case "Avarie":
// fas fa-shipping-fast
case "En Route":
case "En Route vers RABAT":
case "En Route vers AIT MELLOUL":
case "En Route vers TANGER":
case "En Route vers MARRAKECH":
case "En Route vers AGADIR":
case "En Route vers CASABLANCA":
case "En Route vers FES":
case "En Route vers OUJDA":
case "En Route vers TETOUAN":
case "En Route vers KENITRA":
case "En Route vers MEKNES":
case "En Route vers BENI MELLAL":
case "En Route vers NADOR":
case "En Route vers LARACHE":
case "En Route vers SAFI":
case "En Route vers TAZA":
//fad fa-dolly-flatbed-alt
case "En cours":
case "En Cours de Chargement dans un Camion":
//fad fa-warehouse
case "Expedition Encore dans l''agence de depart":
case "Expedition Encore dans l'agence de depart":

switch ($_get['statut']) {
  case "En saisie":
    $enscolor ="green";
    break;
  case "En preparation":

    break;
  case "Préparée":

    break;
  case "à Relivrée":

    break;
  case "Livrée":

    break;
  case "Arrivée : Agence de Destination La Voie Express":
  case "Arrivée : Agence Transit La Voie Express":

    break;
  case "Chargé":

    break;
  case "Retournée":
  case "Epave":
  case "Avarie":

    break;
  case "En Route":
  case "En Route vers RABAT":
  case "En Route vers AIT MELLOUL":
  case "En Route vers TANGER":
  case "En Route vers MARRAKECH":
  case "En Route vers AGADIR":
  case "En Route vers CASABLANCA":
  case "En Route vers FES":
  case "En Route vers OUJDA":
  case "En Route vers TETOUAN":
  case "En Route vers KENITRA":
  case "En Route vers MEKNES":
  case "En Route vers BENI MELLAL":
  case "En Route vers NADOR":
  case "En Route vers LARACHE":
  case "En Route vers SAFI":
  case "En Route vers TAZA":

    break;
  case "En cours":
  case "En Cours de Chargement dans un Camion":

    break;
  case "Expedition Encore dans l''agence de depart":
  case "Expedition Encore dans l'agence de depart":

    break;

  default:
    $enscolor ="green";
    break;
}



 ?>
