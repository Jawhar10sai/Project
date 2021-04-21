<?php
require_once("conftaxDB.php");
class Declarations{

    function __construct()
  {

  }

  public function AjouterDeclar($datee, $colis, $poids,$paletteA,$paletteB,$paletteC,$longueur, $hauteur, $largeur, $valeur, $client2_id, $livraison, $express, $port, $courrier_typ, $nature,$client1_id,$Espece, $Cheque, $Traite,$Nbre_BL,$BL,$adr){
    $conn = $GLOBALS['conn'];
    $cllves = $conn->query("SELECT * FROM `client_lve` WHERE CLIENT_ID=".$client1_id);
    $nbrcl = $cllves->num_rows;
    if ($nbrcl>0) {
      foreach ($cllves as $cllve) {
        if ($cllve['debinterval']<$cllve['fininterval']) {
          $interval = $cllve['debinterval']+1;

          $nume = (string)$cllve['CLIENT_COD2'].(string)$interval;
          $date = date('Y-m-d',strtotime(date($datee)));
          $coef = $longueur*$hauteur*$largeur;
          $Nbre_palettes = $paletteA+$paletteB+$paletteC;
        # echo "INSERT INTO `declaration_v` (`numero`, `date`, `colis`, `poids`, `paletteA`, `paletteB`, `paletteC`, `Nbre_palettes`, `longueur`, `hauteur`, `largeur`, `coef`,`valeur`, `client2_id`, `livraison`, `express`, `port`, `courrier_typ`, `nature`,`client1_id`,`Espece`, `Cheque`, `Traite`,`BL`,`id_adres`) VALUES ('$nume', '$date', $colis, $poids, $paletteA, $paletteB, $paletteC, $Nbre_palettes, $longueur, $hauteur, $largeur, $coef, $valeur, $client2_id, '$livraison', '$express', '$port', '$courrier_typ', '$nature',$client1_id,$Espece, $Cheque, $Traite,'$BL',$adr)";
          #exit;

          $inserer = $conn->query("INSERT INTO `declaration_v` (`numero`, `date`, `colis`, `poids`, `paletteA`, `paletteB`, `paletteC`, `Nbre_palettes`, `longueur`, `hauteur`, `largeur`, `coef`,`valeur`, `client2_id`, `livraison`, `express`, `port`, `courrier_typ`, `nature`,`client1_id`,`Espece`, `Cheque`, `Traite`,`Nbre_BL`,`BL`,`id_adres`) VALUES ('$nume', '$date', $colis, $poids, $paletteA, $paletteB, $paletteC, $Nbre_palettes, $longueur, $hauteur, $largeur, $coef, $valeur, $client2_id, '$livraison', '$express', '$port', '$courrier_typ', '$nature',$client1_id,$Espece, $Cheque, $Traite,$Nbre_BL,'$BL',$adr)");
          if ($inserer) {
            $conn->query("UPDATE `client_lve` SET `debinterval`=$interval WHERE `CLIENT_ID`=".$client1_id);
          }
        }
      }

    }else {
      echo "<script>alert('Nombre de declaration depassé');</script>";
    }
  }

  public function ModifierDeclar($numero, $datee, $colis, $poids,$paletteA, $paletteB, $paletteC, $longueur,$hauteur,$largeur, $valeur, $client2_id, $livraison, $express, $port, $courrier_typ, $nature,$Espece, $Cheque, $Traite,$BL,$adr){
    $conn = $GLOBALS['conn'];
    $date = date('Y-m-d',strtotime(date($datee)));
    $conn->query("UPDATE `declaration_v` SET `date`='$date', `colis`=$colis, `poids`=$poids,  `paletteA`=$paletteA,`paletteB`=$paletteB,`paletteC`=$paletteC,`longueur`=$longueur,`hauteur`= $hauteur,`largeur`= $largeur, `valeur`=$valeur, `client2_id`=$client2_id, `livraison`='$livraison', `express`='$express', `port`='$port', `courrier_typ`='$courrier_typ', `nature`='$nature',`Espece`=$Espece, `Cheque`=$Cheque, `Traite`=$Traite,`BL`='$BL', `id_adres`=$adr WHERE `numero`='$numero'");
    echo "<script>alert('La declaration a été bien modifiée!')</script>";
  }

  public function mesDeclars($code){
      $conn = $GLOBALS['conn'];
      $declars = $conn->query("SELECT * FROM `declaration_v` WHERE `client1_id`=".$code." ORDER BY `date` DESC");
      return $declars;
  }

  public function mestopDeclars($code){
      $conn = $GLOBALS['conn'];
      $declars = $conn->query("SELECT * FROM `declaration_v` WHERE `client1_id`=".$code." ORDER BY `date` DESC LIMIT 5");
      return $declars;
  }

  /*Ajouter une declaration à l'archive*/
public function ArchevDeclaration($numero){
  $conn = $GLOBALS['conn'];
  $conn->query("INSERT INTO `declarationarchive` SELECT * FROM `declaration_v` WHERE `numero`='$numero'");
}
public function suuprimerDeclaration($numero){
    $conn = $GLOBALS['conn'];
  $conn->query("DELETE FROM `declaration_v` WHERE `numero`='$numero'");
}
public function specDeclar($code,$numero){
    $conn = $GLOBALS['conn'];
    $declars = $conn->query("SELECT * FROM `declaration_v` WHERE `numero`='$numero' AND `client1_id`=".$code);
    return $declars;
}
public function DeclarNonRamassees($code){
    $conn = $GLOBALS['conn'];
    $declars = $conn->query("SELECT * FROM `declaration_v` WHERE `numero` not in(SELECT `declaration` FROM `panierramasse` WHERE `etat` IN('En cours','Valide')) AND `client1_id`=".$code." ORDER BY `date` DESC");
    return $declars;
}
public function ARamassees($code){
    $conn = $GLOBALS['conn'];
    $declars = $conn->query("SELECT * FROM `declaration_v` WHERE `numero` in(SELECT `declaration` FROM `panierramasse` WHERE `etat`='En cours') AND `client1_id`=".$code);
    if ($declars->num_rows>0) {
      return $declars->num_rows;
    }else {
      return 0;
    }
  }
  public function DeclarARamassees($code){
      $conn = $GLOBALS['conn'];
      $declars = $conn->query("SELECT * FROM `declaration_v` WHERE `numero` in(SELECT `declaration` FROM `panierramasse` WHERE `etat`='En cours') AND `client1_id`=".$code);
      return $declars;
    }
public function carnetEncours($code){
  $conn = $GLOBALS['conn'];
  $declars = $conn->query("SELECT * FROM `panierramasse` WHERE `etat`='En cours' AND `numeroCarnet` in(SELECT `numeroCarnet` FROM `ramasse` WHERE `user_id`=$code) ");
  if ($declars->num_rows>0) {
    foreach ($declars as $declar) {
      return $declar['numeroCarnet'];
      break;
    }
  }else {
    return 'nouv';
  }
}

public function coderamassageEncours($code){
  $conn = $GLOBALS['conn'];
  $declars = $conn->query("SELECT * FROM `ramasse` WHERE `numeroCarnet` in(SELECT `numeroCarnet` FROM `panierramasse` WHERE `etat`='En cours')  AND `user_id`=".$code);
  if ($declars->num_rows>0) {
    foreach ($declars as $declar) {
      return $declar['code_ramassage'];
      break;
    }
  }else {
    return 0;
  }
}

public function validerRamassage($declar,$carnet){
  $conn = $GLOBALS['conn'];
  $conn->query("UPDATE `panierramasse` SET `etat`='Valide',`date_modification`=now() WHERE `declaration`='$declar' AND `numeroCarnet`=".$carnet);
}
public function etatDeclarEncours($declar){
  $conn = $GLOBALS['conn'];
  $declars = $conn->query("SELECT * FROM `panierramasse` WHERE  `declaration`='$declar' AND `etat` like 'En cours'");
  if ($declars->num_rows>0) {
    foreach ($declars as $key) {
      return $key['etat'];
    }
  }
}
public function etatDeclarValide($declar){
  $conn = $GLOBALS['conn'];
  $declars = $conn->query("SELECT * FROM `panierramasse` WHERE  `declaration`='$declar' AND `etat` like 'valide'");
  if ($declars->num_rows>0) {
    foreach ($declars as $key) {
      return $key['etat'];
    }
  }
}
public function GetLibCodeLiv($code){
  $oldconnection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
  $result = $oldconnection->query("SELECT * FROM livraisoncode WHERE id=".$code);
  if ($result->num_rows>0) {
    foreach ($result as $key) {
      return $key['lib'];
    }
  }else {
    return ' ';
  }
}
public function GetLibCodeMotif($code){
  $oldconnection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
  $result = $oldconnection->query("SELECT * FROM motif WHERE id=".$code);
  if ($result->num_rows>0) {
    foreach ($result as $key) {
      return $key['lib'];
    }
  }else {
    return ' ';
  }
}
/*_____________________________FACTURE____________________________________*/
  public function Facture($numero){
    $conn = $GLOBALS['conn'];
    $declars = $conn->query("SELECT * FROM `declaration_v` WHERE `numero`='$numero'");
    $NOM ="Nom";
    $adresse ="adresse";
    $ville ="ville";
    $ice ="ice";
    include_once "TCPDF-master/tcpdf.php";
  /*  class mypdf extends TCPDF
    {
      function __construct()
      {
      }
      public function setHeader(){
        $this->Image('images/voielvej.png',10,5,40);
        $this->Image('images/Afaq_27001_175b.png',50,5,20);
        $this->Image('images/logo_certificat_iso_9001_afnor_nov_2012.png',70,5,15);
      }
    }*/
    $pdf = new TCPDF('P','mm','A4');
    #$pdf->$pdf->SetHeaderData();
    #$pdf->$pdf->SetFooterData();
    #$pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    $pdf->setHeader();
/*
    $pdf->writeHTMLCell(180,15,'','','
    <div class="" style="position: relative;width:100%">
      <img height="30px" src="images/voielvej.png"/>
      <img height="30px" src="images/Afaq_27001_175b.png"/>
      <img height="30px" src="images/logo_certificat_iso_9001_afnor_nov_2012.png" style="padding-left:500px;"/>
      <label style="position: absolute;top:0px;right: 0px;text-align:right;">F-25</label>
    </div>
    <hr style="color:black;">
    ',0,1);
    */
    $pdf->Image('images/voielvej.png',10,5,40);
    $pdf->Image('images/Afaq_27001_175b.png',50,5,20);
    $pdf->Image('images/logo_certificat_iso_9001_afnor_nov_2012.png',70,5,15);
    $pdf->Cell(170);
    $pdf->Cell(20,5,'F-25',0,1);
    $pdf->Ln(12)  ;
    $pdf->setFont('Helvetica','',18);
    $pdf->Cell(150);
    $pdf->Cell(40,5,'Facture',0,1);
    $pdf->Ln();
    $pdf->setFont('Helvetica','',11);
    $pdf->Cell(20);
    $pdf->Cell(30,5,'Date de facture',1);
    $pdf->Cell(30,5,'N° Facture',1);
    $pdf->Cell(30,5,'Code client',1);
    $pdf->Ln();
    $pdf->Cell(20);
    $pdf->Cell(30,5,'Date de facture',0);
    $pdf->Cell(30,5,'N° Facture',0);
    $pdf->Cell(30,5,'Code client',0);
    $pdf->Cell(2);
    $pdf->Cell(78,30,'F-25',1,1);
    /*$pdf->writeHTMLCell(80,0,'','','
    <div style="border-radius:0.5rem;border:1px solid black;width:100%;">
      <h5>Client</h5>
      <h6>'.$NOM.'</h6>
      <h6>'.$adresse.'</h6>
      <h6>'.$ville.'</h6>
      <h6>'.$ice.'</h6>
    </div>
    ',0,1);*/
    $pdf->Output();
  }
  public function Avoir($numero){
    $conn = $GLOBALS['conn'];
    $declars = $conn->query("SELECT * FROM `declaration_v` WHERE `numero`='$numero'");

    #$pdf->AddPage();
    #$pdf->Output();
  }
}
?>
