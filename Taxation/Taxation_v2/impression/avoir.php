<?php
include_once "../assets/TCPDF-master/tcpdf.php";
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
$pdf->setFont('Helvetica','',12);
$pdf->Cell(180,5,'FIFN0092502100',0,1,'R');
$pdf->setFont('Helvetica','',11);
$pdf->writeHTMLCell(60,20,135,38,'
<h2>Client:</h2>
<h4>ICE</h4>
',0,0);
$pdf->RoundedRect(130, 35, 60, 30, 3.50, '1111');
$pdf->Cell(5,13,'',0,1);
$pdf->Cell(100,5,'AVOIR',0,1,'C');
$pdf->Cell(27,5,'Date Avoir',1,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'N° Avoir',1,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'Code Client',1,1,'C');
$pdf->Cell(27,5,'15/03/2019',0,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'80000000000',0,0,'C');
$pdf->Cell(3);
$pdf->Cell(27,5,'0',0,1,'C');
$pdf->Ln(12);
$pdf->Cell(40,5,'Avoir su Facture N°',0,0);
$pdf->Cell(3);
$pdf->Cell(30,5,'80000000',0,1);
$pdf->Ln(30);
#Lignes des montants
$pdf->Cell(100);
$pdf->Cell(30,5,'Total HT',1,0);
$pdf->Cell(2);
$pdf->Cell(30,5,'0',1,1,'R');
#
$pdf->Cell(100);
$pdf->Cell(30,5,'Taux TVA',1,0);
$pdf->Cell(2);
$pdf->Cell(30,5,'0',1,1,'R');
#
$pdf->Cell(100);
$pdf->Cell(30,5,'Total TVA',1,0);
$pdf->Cell(2);
$pdf->Cell(30,5,'0',1,1,'R');
#
$pdf->Cell(100);
$pdf->Cell(30,5,'Total TTC',1,0);
$pdf->Cell(2);
$pdf->Cell(30,5,'0',1,1,'R');
$pdf->Ln(10);
$pdf->Cell(190,5,'Arrêté le présent Avoir à la somme de',0,1);
$pdf->Cell(190,5,'zéro dirhams TTC',0,1);



#$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));


$pdf->Output();
 ?>
