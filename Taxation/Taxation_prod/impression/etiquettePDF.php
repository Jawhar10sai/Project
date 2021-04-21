<?php
require_once "../assets/TCPDF-master/tcpdf.php";
require_once "../gestion/control_utilisateur.php";
#require_once "../gestion/classes/conftaxDB.php";
if (isset($_GET['numero'])) {
  if ($declarations->Declaration_utilisateur($_GET['numero'],$client_lve->CLIENT_ID)) {
    $GLOBALS['decdate'] = $declarations->date;
$sous_client->TrouverClient($declarations->client2_id);
$adresses->TrouverAdresse($declarations->id_adres);
$villes->TrouverVille($adresses->id_ville);
class mypdf extends TCPDF
{
  public function setHeader(){
    $this->Image('../images/voielvej.png',10,10,30);
    #$this->Image('images/Afaq_27001_175b.png',50,5,20);
    $this->Image('../images/logo_certificat_iso_9001_afnor_nov_2012.png',60,5,10);
    $this->Cell(90,10,$GLOBALS['decdate'],0,1,'R');
  }
}
$pdf = new mypdf('P','mm','A7',true,'UTF-8',false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
for ($i=1; $i <= $declarations->colis ; $i++) {
  $pdf->AddPage();
#Premiere ligne
#Déclaration d'expédition
$pdf->Cell(30,10,'',0,1,'L');
$pdf->Cell(90,7,'LAVOIEEXPRESS',1,1,'L');
$pdf->Cell(90,7,$sous_client->NOM,1,1,'L');
$pdf->Cell(65,7,$villes->VILLE_LIB,1,0,'L');
$pdf->Cell(25,7,$i.'/'.$declarations->colis,1,1,'C');
$pdf->Ln(12);
$pdf->Output();
}

}else {
  echo "erreur";
}
}else {
  echo "erreur";
}
 ?>
