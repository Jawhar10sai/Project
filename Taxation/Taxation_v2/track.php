<?php
#Page de suivis des colis
require_once('txheads.php');
$enprepline = "";
$prepline = "";
$depline = "";
$chrgmnline = "";
$chrgline = "";
$enrouteline = "";
$arivline = "";
$livline = "";
switch ($_GET['statut']) {
  case "En saisie":
    $enscolor ="green";
    break;
  case "En preparation":
      $enscolor ="green";
      $enprepcolor ="green";
      $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "Préparée":
      $enscolor ="green";
      $enprepcolor ="green";
      $prepcolor ="green";
      $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "à Relivrée":
  $enscolor = "green";
  $enprepcolor = "green";
  $prepcolor = "green";
  $depcolor = "red";
  $chrgmncolor = "red";
  $chrgcolor = "red";
  $relivgcolor = "red";
  $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
  $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "Livrée":
      $enscolor = "green";
      $enprepcolor = "green";
      $prepcolor = "green";
      $depcolor = "green";
      $chrgmncolor = "green";
      $chrgcolor = "green";
      $enroutecolor = "green";
      $arivcolor = "green";
      $livcolor = "green";
      $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $depline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $chrgmnline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $chrgline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $enrouteline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $arivline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $livline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "Arrivée : Agence de Destination La Voie Express":
  case "Arrivée : Agence Transit La Voie Express":
    $enscolor = "green";
    $enprepcolor = "green";
    $prepcolor = "green";
    $depcolor = "green";
    $chrgmncolor = "green";
    $chrgcolor = "green";
    $enroutecolor = "green";
    $arivcolor = "green";
    $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $depline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $chrgmnline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $chrgline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $enrouteline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $arivline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "Chargé":
  $enscolor = "green";
  $enprepcolor = "green";
  $prepcolor = "green";
  $depcolor = "green";
  $chrgmncolor = "green";
  $chrgcolor = "green";
  $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
  $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
  $depline = '<i class="fa-3x fas fa-arrow-down"></i>';
  $chrgmnline = '<i class="fa-3x fas fa-arrow-down"></i>';
  $chrgline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "Retournée":
  $enscolor = "green";
  $enprepcolor = "green";
  $prepcolor = "green";
  $depcolor = "red";
  $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
  $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
  $depline = '<i class="fa-3x fas fa-arrow-down"></i>';
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
      $enscolor = "green";
      $enprepcolor = "green";
      $prepcolor = "green";
      $depcolor = "green";
      $chrgmncolor = "green";
      $chrgcolor = "green";
      $chrgcolor = "green";
      $enroutecolor = "green";
      $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $depline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $chrgmnline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $chrgline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $enrouteline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "En cours":
  case "En Cours de Chargement dans un Camion":
      $enscolor = "green";
      $enprepcolor = "green";
      $prepcolor = "green";
      $depcolor = "green";
      $chrgmncolor = "green";
      $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $depline = '<i class="fa-3x fas fa-arrow-down"></i>';
      $chrgmnline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "Expedition Encore dans l''agence de depart":
  case "Expedition Encore dans l'agence de depart":
  case "Epave":
  case "Avarie":
    $enscolor = "green";
    $enprepcolor = "green";
    $prepcolor = "green";
    $depcolor = "green";
    $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $depline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
}



?>
<title>LVE - Suivis colis</title>
<!--###################################################################################-->
  <?php include_once "includes/lve_navbar.php"; ?>
<!--###################################################################################-->
<!-- Button trigger modal -->
<button type="button" data-toggle="modal" data-target="#trackmodal" style="margin-top:80px;padding: 8;border-radius:50%;" class="btn btn-outline-info btn-sm" >
  <i class="fa fa-map-marker" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="trackmodal" tabindex="-1" role="dialog" aria-labelledby="trackmodallabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="trackmodallabel">Suivis de la déclaration: <?='';?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="background-color: red;
                                                           color: #fff;
                                                           border-radius: 50%;
                                                           padding: 0px 10px 7px 10px;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="text-center">
            <?php if ($client_lve->CLIENT_COD=='9588'): ?>
              <div class="  col-xs-12"  style="color:<?=$enscolor;?>">
                <i class="fa-3x fal fa-desktop"></i>
                <p>En saisie</p>
              </div>
              <div class="  col-xs-12" style="color:<?=$enprepcolor;?>">
                <p><?=$enprepline; ?></p>
                <i class="fa-3x fad fa-scanner"></i>
                <p>En preparation</p>
              </div>
              <div class="  col-xs-12" style="color:<?=$prepcolor;?>">
                <p><?=$prepline; ?></p>
                <i class="fa-3x fad fa-box-check"></i>
                <p>Préparée</p>
              </div>
            <?php endif; ?>
            <div class="  col-xs-12" style="color:<?=$depcolor;?>">
              <?php if ($client_lve->CLIENT_COD=='9588'): ?>
                <p><?=$depline; ?></p>
              <?php endif; ?>
              <i class="fa-3x fad fa-warehouse"></i>
              <p>Déclaration dans l'agence de départ</p>
            </div>
            <div class="  col-xs-12" style="color:<?=$chrgmncolor;?>">
              <p><?=$chrgmnline; ?></p>
              <i class="fa-3x fad fa-dolly-flatbed-alt"></i>
              <p>En cours de chargement dans un camion</p>
            </div>
            <div class="  col-xs-12" style="color:<?=$chrgcolor;?>">
              <p><?=$chrgline; ?></p>
              <i class="fa-3x fas fa-truck"></i>
              <p>Chargée</p>
            </div>
            <?php if ($_GET['statut'] == 'à Relivrée'): ?>
              <div class="  col-xs-12 " style="color:<?=$relivgcolor;?>">
                <i class="fa-3x fad fa-shipping-timed"></i>
                <p>à relivrer</p>
              </div>
            <?php endif; ?>
            <div class="  col-xs-12" style="color:<?=$enroutecolor;?>">
              <p><?=$enrouteline; ?></p>
              <i class="fa-3x fas fa-shipping-fast"></i>
              <p>En route</p>
            </div>
            <div class="  col-xs-12" style="color:<?=$arivcolor;?>">
              <p><?=$arivline; ?></p>
              <i class="fa-3x fad fa-warehouse-alt"></i>
              <p>Arrivée</p>
            </div>
            <div class="  col-xs-12" style="color:<?=$livcolor;?>">
              <p><?=$livline; ?></p>
              <i class="fa-3x fad fa-hand-holding-box"></i>
              <p>Livrée</p>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<?php include_once "includes/lve_footer.php"; ?>
