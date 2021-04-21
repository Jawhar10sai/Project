<?php
include_once "classes/TCPDF-master/tcpdf.php";
class mypdf extends TCPDF
{
  public function setHeader(){
    $this->Image('images/voielvej.png',10,10,40);
    #$this->Image('images/Afaq_27001_175b.png',50,5,20);
    $this->Image('images/logo_certificat_iso_9001_afnor_nov_2012.png',170,5,15);
    $this->Cell(190,5,'F-25',0,1,'R');
  }
  public function setFooter(){
    $this->SetY(-36);
    $this->setFont('Helvetica','',11);
    $this->StartTransform();
    $this->Rotate(90);
    $this->Cell(2,0,'www.lavoieexpress.com / client@lavoieexpress.com',0,1,'L',0,'');
    $this->StopTransform();
    $style = array(
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);
  // QRCODE,M : QR-CODE Medium error correction
    $this->write2DBarcode('www.lavoieexpress.com', 'QRCODE,M', 180, 240, 30, 90, $style, 'N');
    #$this->Cell(15,5,'',0,1);
    $this->Cell(120,5,'SA au capital de 23.077.000,00',0,1);
    $this->Cell(120,5,'19 Rue Abou Bakr Ibnou Koutia Ain Sebaa - Casablanca',0,1);
    $this->Cell(120,5,'Tél.: +(212) 05 22 34 43 16 - Fax: +(212) 05 22 34 42 64',0,1);
    $this->Cell(120,5,'RC 95457 - IF 01601949 - PATENTE 37951127 - CNSS 2640961',0,1);
    $this->Cell(120,5,'ICE: 001526339000073',0,1);
  }
}
$pdf = new mypdf('P','mm','A4');
$pdf->setPrintFooter(false);
$pdf->setHeader();
$pdf->setFooter();
$pdf->AddPage();
$pdf->Ln(12);
$pdf->setFont('Helvetica','',20);
$pdf->Cell(175,5,'Facture',0,1,'R');
$pdf->setFont('Helvetica','',11);
#$pdf->Cell(175,17,'',0,1,'R');
$pdf->Ln(17);
$pdf->Cell(28);
$pdf->Cell(27,5,'Date Facture',1,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'N° Facture',1,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'Code client',1,1,'C');
#Deuxieme ligne
$pdf->Cell(28);
$pdf->Cell(27,5,'29/05/2020',0,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'800100200',0,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'11129',0,1,'C');
#Ligne de type d'expédition
$pdf->Ln(5);
$pdf->Cell(28);
$pdf->Cell(20,5,'Type',0,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'Messagerie',0,0,'C');
$pdf->Cell(2);
$pdf->RoundedRect(130, 40, 75, 45, 3.50, '1111');
$pdf->writeHTMLCell(70,15,135,40,'
<div>
<h4>Client:</h4>
<h6>NOM</h6>
<h6>ADRESSE</h6>
<h6>VILLE</h6>
<h6>ICE</h6>
</div>
',0,1);
$pdf->Ln(30);
$pdf->Cell(23,5,'Numero',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'Date',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'Expéditeur',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'Destinataire',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'Ville départ',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'Ville arrivée',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(10,5,'Colis',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(10,5,'Poids',0,0,'C');
$pdf->Cell(2);
$pdf->Cell(21,5,'Montant H.T',0,1,'C');
$pdf->Cell(23,5,'E00003500',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'28/05/2020',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'TEST CL',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'TEST DEST',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'Casablanca',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(23,5,'Rabat',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(10,5,'4',0,0,'C');
$pdf->Cell(1);
$pdf->Cell(10,5,'12',0,0,'C');
$pdf->Cell(2);
$pdf->Cell(21,5,'89',0,1,'C');
$pdf->Ln(12);
#Ligne des titres  montants
$pdf->Cell(60);
$pdf->Cell(40,5,'Montant HT',1,0,'C');
$pdf->Cell(2);
$pdf->Cell(20,5,'Taux',1,0,'C');
$pdf->Cell(2);
$pdf->Cell(30,5,'TVA',1,1,'C');
#1ere Ligne des  montants
$pdf->Cell(60);
$pdf->Cell(40,5,'50.52',1,0,'R');
$pdf->Cell(2);
$pdf->Cell(20,5,'14%',1,0,'R');
$pdf->Cell(2);
$pdf->Cell(30,5,'7.37',1,1,'R');
#2eme Ligne des  montants
$pdf->Cell(60);
$pdf->Cell(40,5,'0.00',1,0,'R');
$pdf->Cell(2);
$pdf->Cell(20,5,'20%',1,0,'R');
$pdf->Cell(2);
$pdf->Cell(30,5,'0.00',1,0,'R');
$pdf->Cell(4,5,'',0,0,'C');
$pdf->Cell(30,5,'Facture TTC',1,1,'C');
#3eme Ligne des  montants
$pdf->Cell(60);
$pdf->Cell(40,5,'52.63',1,0,'R');
$pdf->Cell(2);
$pdf->Cell(20,5,'Total TVA',1,0,'R');
$pdf->Cell(2);
$pdf->Cell(30,5,'37.37',1,0,'R');
$pdf->Cell(4,5,'=',0,0,'C');
$pdf->Cell(30,5,'60.00',1,1,'R');


$pdf->Output();
 ?>
