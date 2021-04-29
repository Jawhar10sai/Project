<?php

$enprepline = "";
$prepline = "";
$depline = "";
$chrgmnline = "";
$chrgline = "";
$enrouteline = "";
$arivline = "";
$livline = "";
$enscolor = "";
$enprepcolor = "";
$prepcolor = "";
$depcolor = "";
$chrgmncolor = "";
$chrgcolor = "";
$enroutecolor = "";
$arivcolor = "";
$livcolor = "";
$true = false;
$arrivee = false;
switch (utf8_encode(trim($value->statut))) {
  case "En saisie":
    $enscolor = "green";
    break;
  case "En preparation":
    $enscolor = "green";
    $enprepcolor = "green";
    $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "Préparée":
    $enscolor = "green";
    $enprepcolor = "green";
    $prepcolor = "green";
    $enprepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    $prepline = '<i class="fa-3x fas fa-arrow-down"></i>';
    break;
  case "à Relivrée":
    $arrivee = true;
    $relivgcolor = "red";
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
  case "Livrée":
    $arrivee = true;
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
    $arrivee = true;
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
    $true = true;
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
  case "En route":
  case "Chargé":
  case "En cours":
  case "En Cours de Chargement dans un Camion":
    $true = false;
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
<!-- Modal -->
<div class="modal fade" id="trackmodal<?= trim($value->Numero); ?>" tabindex="-1" role="dialog" aria-labelledby="trackmodallabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="trackmodallabel">Suivis de la déclaration: <?= $value->Numero; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="background-color: red;
                                                           color: #fff;
                                                           border-radius: 50%;
                                                           padding: 0px 10px 7px 10px;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="">
          <?php if ($client_lve->CLIENT_TYP == 'TRL') : ?>
            <div class="div-log-main">
              <div class="div-log">
                <div class="  col-xs-12" style="color:<?= $enscolor; ?>">
                  <i class="fa-3x fal fa-desktop"></i>
                  <p>En saisie</p>
                </div>
                <div class="  col-xs-12" style="color:<?= $enprepcolor; ?>">
                  <p><?= $enprepline; ?></p>
                  <i class="fa-3x fad fa-scanner"></i>
                  <p>En préparation</p>
                </div>
                <div class="  col-xs-12" style="color:<?= $prepcolor; ?>">
                  <p><?= $prepline; ?></p>
                  <i class="fa-3x fad fa-box-check"></i>
                  <p>Préparée</p>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <div class="div-mess-main">
            <div class="div-mess">
              <div class="  col-xs-12" style="color:<?= $depcolor; ?>">
                <?php if ($client_lve->CLIENT_TYP == 'TRL') : ?>
                  <p><?= $depline; ?></p>
                <?php endif; ?>
                <i class="fa-3x fad fa-warehouse"></i>
                <p>Colis reçu à l'agence messagerie de départ</p>
              </div>
              <div class="  col-xs-12" style="color:<?= $enroutecolor; ?>">
                <p><?= $enrouteline; ?></p>
                <i class="fa-3x fas fa-shipping-fast"></i>
                <?php if ($true) : ?>
                  <p><?= utf8_encode($value->statut); ?></p>
                <?php else : ?>
                  <?php
                  $villes = Villes::TrouverVilleLib(trim($value->Ville2));
                  if ($villes) {
                    $agences = Agence::TrouverAgence($villes->AGENCE_COD);
                    if ($agences) {
                      $agnc = 'vers ' . strtoupper($agences->AGENCE_LIB);
                    }
                  }
                  ?>
                  <p>Colis en route <?= $agnc; ?></p>
                <?php endif; ?>
              </div>
              <?php if ($arrivee) : ?>
                <div class="  col-xs-12" style="color:<?= $arivcolor; ?>">
                  <p><?= $arivline; ?></p>
                  <i class="fa-3x fad fa-warehouse-alt"></i>
                  <p>Colis arrivée à l'agence de destination</p>
                </div>
                <?php if (utf8_encode($value->statut) == 'à Relivrée') : ?>
                  <div class="  col-xs-12 " style="color:red;">
                    <p><i class="fa-3x fas fa-arrow-down"></i></p>
                    <p>
                      <i class="fa-3x fad fa-shipping-timed"></i>
                      <i class="text-center">(<?= utf8_encode($value->Motif); ?>)</i>
                    </p>
                    <p>Colis à relivrer</p>
                  </div>
                <?php else : ?>
                  <div class="  col-xs-12" style="color:<?= $livcolor; ?>">
                    <p><?= $livline; ?></p>
                    <i class="fa-3x fad fa-hand-holding-box"></i>
                    <?php if (utf8_encode($value->statut) == 'Livrée') : ?>
                      <p>Colis livré</p>
                    <?php else : ?>
                      <p>Colis en cours de livraison</p>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php if (utf8_encode($value->statut) != 'Livrée') : ?>
          <div class="row">
            <h5>
              <?php
              echo 'Date estimée de livraison: ' . date('d/m/Y', strtotime($value->Date . ' +' . $villes->DELAI . ' day'));
              ?>
            </h5>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  .div-log-main {
    background-image: url("images/Image5.jpg");
    background-size: cover;
    border-radius: 0.5rem;
    /*rgba(0, 0, 0, 0.7);*/
  }

  .div-mess-main {
    background-image: url("images/35.jpg");
    background-size: cover;
    border-radius: 0.5rem;
  }

  .div-log {
    background-color: rgb(230, 230, 230, 0.7);
    border-radius: 0.5rem;
  }

  .div-mess {
    background-color: rgb(230, 230, 230, 0.7);
    border-radius: 0.5rem;
  }
</style>