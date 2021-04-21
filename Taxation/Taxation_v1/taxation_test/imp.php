<?php require_once('txheads.php'); ?>
<?php
$colname_declaration = "-1";
if (isset($_GET['numero'])) {
  $colname_declaration = $_GET['numero'];
}
//mysql_select_db($database_connection, $connection);
$query_declaration = "SELECT * FROM vImpression WHERE `numero` like '$colname_declaration'";
$declaration = $conn->query($query_declaration) or die(mysqli_error());
$row_declaration = mysqli_fetch_assoc($declaration);
$totalRows_declaration = mysqli_num_rows($declaration);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMP</title>
</head>
<style type="text/css">
  @page {size: landscape;  }
  .cadiv{
    border: 1px solid black;
    border-radius: 5px;
    padding: 5px;
    height: 100%;
    margin-top:2px;
  }
  .footsignature{
    border-radius: 5px;
    border: 1px solid black;
    height: 150px;
  }
  .mbody{
    font-size: 8pt;
  }
</style>
<body class="mbody">
  <div style="
    position: absolute;
    font-size: 100px;
    color: #dedddd;
    transform: rotate(333deg);
    top: 300px;
    z-index: -1;
    opacity: 0.10;">Déclaration d'expédition</div>
    <div class="container-fluid">
      <div class="row" style="height:75px; margin-bottom:5px;" >
        <div class="cadiv" style="margin-right:4px;width:370.44px;">
          <div class="row">
            <h6 class="col-7"><b>Déclaration d'expédition</b></h6>
            <h6 class="col-5"> <b>تصريح بالإرسال</b></h6>
          </div>
          <h4 class="text-center"><?=$row_declaration['numero'];?></h4>
        </div>
        <div class="cadiv" style="width:430.87;margin-right:4px;">
          <div class="row">
            <div class="col-8">
              <img src="images/logo-lavoieexpress.png" height="65">
            </div>
            <div class="col-3" style="  left: 65px;">
              <img src="images/logo_certificat_iso_9001_afnor_nov_2012.png"  height="50">
            </div>
          </div>

        </div>
        <div class="cadiv" style="width:267.47"><br>
          <h6 class="text-center">Résérvé à La Voie Express</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-3" style="margin-right:-4px;">
          <div class="expid" style="margin-bottom:10px;">
            <h6>1.Expéditeur:</h6>
            <div class="cadiv" style="margin-top:-4px;">
              <label class="col-12">Nom: <span style="font-size:15px;"> <b><?=$row_declaration['NomEx']; ?></b></span></label>
              <label class="col-12">Code:<b><?=$clients->CODUSER($row_declaration['client1_id']); ?></b></label><br>
              <label class="col-12">Adresse: <b><?=$row_declaration['AdresseEx']; ?></b></label><br>
              <label class="col-12">Ville: <b><?=$row_declaration['VilleEx']; ?></b></label><br>
              <label class="col-12">Téléphone: <b><?=$row_declaration['TelEx']; ?></b></label>
            </div>
          </div>
          <div class="desti" style="margin-bottom:10px;">
            <h6>2.Destinataire:</h6>
            <div class="cadiv" style="margin-top:-5px;">
              <label class="col-12">Nom:<span style="font-size:15px;"> <b><?=$row_declaration['NomDest']; ?></b></span></label><br>
              <label class="col-12">Code:<b><?=$clients->IDtoCOD($row_declaration['client2_id']); ?></b></label>
              <label class="col-12">Adresse: <b><?=$row_declaration['AdresseDest']; ?></b></label><br>
              <label class="col-12">Ville: <b><?=$villes->IDVille($row_declaration['villeDest']); ?></b></label><br>
              <label class="col-12">Téléphone: <b><?=$row_declaration['TelDest']; ?></b></label>
            </div>
          </div>

          <div class="retpal">
            <h6>3.Retour palettes:</h6>
            <div class="cadiv" style="margin-top:-5px;">

              <table class="table-bordered" >
                <tr>
                  <td class="col-6">Type</td>
                  <td class="col-6">Nombre</td>
                </tr>
                <tr>
                  <td>800*1200</td>
                  <td class="text-center"><?=$row_declaration['paletteA'];?></td>
                </tr>
                <tr>
                  <td>1000*1200</td>
                  <td class="text-center"><?=$row_declaration['paletteB'];?></td>
                </tr>
                <tr>
                  <td>1200*1200</td>
                  <td class="text-center"><?=$row_declaration['paletteC'];?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-6" style="margin-right:-4px;">
          <div class="row">
            <div class="col-4">
              <div class="row">
                <div class="col-12 cadiv" style="height:70px;">
                  <h6>4.Nbre colis:</h6>
                  <div class="text-center">
                    <b style="font-size:15px;"><?=$row_declaration['colis'];?></b>
                  </div>
                </div>
                <div class="col-12 cadiv" style="height:70px;">
                  <h6>5.Nbre palettes:</h6>
                  <b style="font-size:15px;"><?php if (empty($row_declaration['palettes'])) {
                    echo "<br>";
                  }else {
                    echo $row_declaration['palettes'];
                  }?></b>
                </div>
                <div class="col-12 cadiv" style="height:70px;">
                  <h6>6.Poids (kgs):</h6>
                  <div class="text-right">
                    <b style="font-size:15px;"><?= number_format($row_declaration['poids'], 2, ',', ' ');?></b>
                  </div>
                </div>
                <div class="col-12 cadiv">
                  <?php
                    if ($row_declaration['port']=="P") {
                      $pchecked="checked";
                      $dchecked ="disabled";
                    }else {
                      $pchecked="disabled";
                      $dchecked ="checked";
                    }
                   ?>
                  <h6>7.Port:</h6>
                  <input <?=$pchecked;?> type="checkbox" >Du <br>
                  <input <?=$dchecked;?> type="checkbox" >Payé
                </div>
              </div>
            </div>
            <div class="col-8" >
              <div class="row" style="margin-left:-1px;">
                <div class="col-12 cadiv">
                  <h6>9.Nature de marchandises:</h6>
                  <?php
                  if ($row_declaration['nature']=="Normal") {
                    $fcheck = "disabled";
                    $tcheck = "disabled";
                    $ncheck = "checked";

                  }elseif ($row_declaration['nature']=="Fragile") {
                    $fcheck = "checked";
                    $tcheck = "disabled";
                    $ncheck = "disabled";
                  }else{
                    $tcheck = "checked";
                    $fcheck = "disabled";
                    $ncheck = "disabled";
                  }
                   ?>
                  <input type="checkbox" <?=$ncheck; ?>>Normal
                  <input type="checkbox" <?=$fcheck; ?>>Fragile
                  <input type="checkbox" <?=$tcheck; ?>>Très fragile
                </div>
                <div class="col-12 cadiv">
                  <h6>10.Valeur déclarée (dhs):</h6>
                  <div class="text-center">
                    <?php if ($row_declaration['valeur']==100.00) {
                      $valeur="<br>";
                    }else {
                      $valeur=$row_declaration['valeur'];
                    } ?>
                    <b><?=$valeur; ?></b>
                  </div>
                </div>
                <div class="col-12 cadiv">
                  <h6>11.Dimensions en (cm):</h6>
                  Longueur: <b><?=number_format($row_declaration['longueur'], 2, ',', ' ');?></b>
                  Largeur: <b><?=number_format($row_declaration['largeur'], 2, ',', ' ');?></b>
                  Hauteur: <b><?=number_format($row_declaration['hauteur'], 2, ',', ' ');?></b>
                </div>
                <div class="col-12">
                  <div class="row" style="height:116.63px">
                    <div class="cadiv" style="width: 120;margin-right:5px;">
                      <h6>12.Livraison:</h6>
                      <?php if ($row_declaration['livraison']=="G"){
                        $gchecked = "checked";
                        $pchecked = "disabled";
                        $dchecked = "disabled";
                      }elseif ($row_declaration['livraison']=="P") {
                        $pchecked = "checked";
                        $gchecked = "disabled";
                        $dchecked = "disabled";
                      }else {
                        $dchecked="checked";
                        $pchecked = "disabled";
                        $gchecked = "disabled";
                      }
                       ?>
                      <input type="checkbox" <?=$dchecked; ?>>À domicile <br><br>
                      <input type="checkbox" <?=$gchecked; ?>>En gare <br><br>
                      <input type="checkbox" <?=$pchecked; ?>>Points relais
                    </div>
                    <div class="cadiv" style="width: 220">
                      <h6>13.Produits et service:</h6>
                      <?php
                      $mcourrier = "disabled";
                      $sexpress = "disabled";
                      $xexpress = "disabled";
                      $lcourrier = "disabled";
                      $vccourrier = "disabled";
                      $qccourrier = "disabled";
                      $ccourrier = "disabled";
                      $ucourrier = "disabled";
                      if ($row_declaration['courrier_typ']=="M") {
                        $mcourrier ="checked";
                        if ($row_declaration['express']=="S") {
                          $sexpress = "checked";
                        }elseif ($row_declaration['express']=="X") {
                          $xexpress = "checked";
                        }
                      }elseif ($row_declaration['courrier_typ']=="25") {
                        $lcourrier ="checked";
                        $vccourrier="checked";
                      }elseif ($row_declaration['courrier_typ']=="14") {
                        $lcourrier ="checked";
                        $qccourrier="checked";
                      }elseif ($row_declaration['courrier_typ']=="5") {
                        $lcourrier ="checked";
                        $ccourrier="checked";
                      }elseif ($row_declaration['courrier_typ']=="U") {
                        $lcourrier ="checked";
                        $ucourrier="checked";
                      }
                       ?>
                      <div class="text-center">
                        <input type="checkbox" <?=$mcourrier;?>> <b>Messagerie</b>
                      </div>
                      <input type="checkbox" <?=$sexpress;?> >Express avant 10h00
                      <input type="checkbox" <?=$xexpress;?>>Simple<br>
                      <div class="text-center">
                        Ou
                      </div>
                      <div class="text-center">
                        <input type="checkbox" <?=$lcourrier;?> > <b>Affrètement</b>
                      </div>
                      <input type="checkbox" <?=$vccourrier;?> >25T
                      <input type="checkbox" <?=$qccourrier;?> >14T
                      <input type="checkbox" <?=$ccourrier;?> >5T
                      <input type="checkbox" <?=$ucourrier;?> >Utilitaires<br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-12 cadiv" style="height:188px;">
                <h6>8.Retour de fonds:</h6>
                <div class="row">
                  <div class="col-6" style="border-right:1px solid #000;height:100px">
                    <div class="text-center">
                      Montant (Dhs)
                    </div>
                    <?php
                    if ($row_declaration['Espece']==0) {
                      $checkesp = "disabled";
                    }else {
                      $checkesp = "checked";
                    }
                    if ($row_declaration['Cheque']==0) {
                      $checkcheq = "disabled";
                    }else {
                      $checkcheq = "checked";
                    }
                    if ($row_declaration['Traite']==0) {
                      $checktrt = "disabled";
                    }else {
                      $checktrt = "checked";
                    }

                     ?>
                     <div class="row">
                       <div class="col-4">
                         <input <?=$checkesp; ?> type="checkbox">C/Espèce
                       </div>
                       <div class="col-1">
                         :
                       </div>
                       <div class="col-6 text-right">
                         <b><?= number_format($row_declaration['Espece'], 2, ',', ' ');?></b>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-4">
                         <input <?=$checkesp; ?> type="checkbox">C/Chéque
                       </div>
                       <div class="col-1">
                         :
                       </div>
                       <div class="col-6 text-right">
                         <b><?= number_format($row_declaration['Cheque'], 2, ',', ' ');?></b>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-4">
                         <input <?=$checkesp; ?> type="checkbox">C/Traite
                       </div>
                       <div class="col-1">
                         :
                       </div>
                       <div class="col-6 text-right">
                         <b><?= number_format($row_declaration['Traite'], 2, ',', ' ');?></b>
                       </div>
                     </div>
                  </div>
                  <div class="col-6">
                    <?php if (!empty($row_declaration['BL'])) {
                      $chekbl ="checked";
                    }else {
                      $chekbl ="";
                    } ?>
                    C/BL <input type="checkbox" <?=$chekbl;?>><br>
                    Nombre de BL: <b style="font-size:14px;"><?=$row_declaration['Nbre_BL']; ?></b><br>
                    Numéros du BL: <b><?=$row_declaration['BL']; ?></b>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-3" style="margin-left:8px;">
          <div class="row footsignature">
            <div class="col-12 text-center">
              <h6>Visa ramasseur</h6>
            </div>
          </div>
          <div class="row footsignature" style="margin-top:5px;">
            <div class="col-12 text-center">
              <h6>Visa pointeur</h6>
            </div>
          </div>
          <div class="row footsignature" style="margin-top:5px; height:169px;">
            <div class="col-12 text-center">
              <h6>Visa taxateur</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:2px;">
        <div class="col-6">
          <br><br>
             <p>
              <span>
              LA VOIE EXPRESS 2 S.A au Capital 23.077.000,00 Dhs - 19, Rue Abou Bkr Ibnou Koutia, A&icirc;n Seba&acirc;,Casablanca
            </span>
            <br />
              <span style="font-size: 8pt;">
                RC 95457 &ndash; IF 01601949 &ndash; Patente 37951124 &ndash; CNSS 2640961 &ndash; ICE 001526339000073
              </span>
              <br />
              <span style="font-size: 8pt;">T&eacute;l : 05 22 34 43 16 / Fax : 0522344264 &ndash; E-mail : client@lavoieexpress.ma
              </span>
              <br /><br>
              <b><u>Important:</u></b><br>
              <span style="font-size: 8pt;">_ La valeur d&eacute;clar&eacute;e est de cent (100 Dhs) en cas de non d&eacute;claration de valeur.<br>
                 _ Les Clauses et conditions g&eacute;n&eacute;rales de transport Marchandise et Messagerie sont consultables aupr&egrave;s de <br>&nbsp;&nbsp; LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet: <span style="font-size: 8pt;"><b>www.lavoieexpress.com</b></span></span>
            </p>
        </div>
        <div class="col-6">
          <div class="row">
            <div class="col-6 text-center cadiv"   style="height: 156px;margin-left:-4px;">
              <h6>Le:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;</h6>
              <h6>Cachet et signature Expéditeur</h6>
            </div>
            <div class="col-6 text-center cadiv"  style="height: 156px; margin-left:4px;">
              <h6>Le:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;</h6>
              <h6>Cachet et signature Destinataire</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>

      window.print()
    </script>
</body>
</html>
<?php
mysqli_free_result($declaration);
?>
