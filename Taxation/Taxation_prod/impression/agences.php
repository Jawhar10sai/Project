<?php
require_once "../assets/TCPDF-master/tcpdf.php";
require_once "../gestion/control_utilisateur.php";
$pdf = new TCPDF('P','mm','A4');
class mypdf extends TCPDF
{
  public function setHeader(){
    $this->Image('../images/voielvej.png',10,10,40);
    $this->Image('../images/Afaq_27001_outline.png',175,10,15);
    $this->Image('../images/logo_certificat_iso_9001_afnor_nov_2012.png',190,10,15);
  }

}
$pdf = new mypdf('P','mm','A4');
$pdf->setHeader();
$pdf->AddPage();
$pdf->Ln(30);
$pdf->Cell(35,10,'Agence',1,0,'C');
$pdf->Cell(105,10,'Adresse',1,0,'C');
$pdf->Cell(40,10,'Telephone',1,1,'C');
foreach (Agence::ListeAgences() as $agences) {
  $pdf->Cell(35,10,$agences->AGENCE_LIB,1,0);
  $pdf->Cell(105,10,$agences->AGENCE_ADRESSE,1,0);
  $pdf->Cell(40,10,$agences->AGENCE_TEL,1,1);
}
$pdf->Output();
