<?php
require_once "../assets/TCPDF-master/tcpdf.php";
require_once "../gestion/control_utilisateur.php";
require_once "../gestion/classes/conftaxDB.php";
if (isset($_GET['numero'])) {
  $query_declaration = "SELECT * FROM impcarnet where etat='Valide' AND numeroCarnet=".$_GET['numero']." AND `client1_id`=$client_lve->CLIENT_ID";
  $declaration = $conn->query($query_declaration) or die(mysqli_error());
$pdf = new TCPDF('L','mm','A4');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
$pdf->setFont('Helvetica','',18);
$pdf->Cell(280,11,'Carnet de ramassage',0,1,'C');
$pdf->Cell(280,5,'N°: '.$_GET['numero'],0,1,'C');
$pdf->Ln(15);
$pdf->setFont('Helvetica','',12);
$pdf->Cell(60,5,'Chauffeur',0,1);
$pdf->Cell(60,5,'Véhicule',0,1);
$pdf->Cell(60,5,$client_lve->NOM,0,1);
$pdf->Cell(60,5,date('d/m/Y'),0,1);
$pdf->Ln(15);
$pdf->Cell(46,5,'Numero',1,0,'C');
$pdf->Cell(46,5,'Colis',1,0,'C');
$pdf->Cell(46,5,'Ville',1,0,'C');
$pdf->Cell(46,5,'Code',1,0,'C');
$pdf->Cell(46,5,'Destinataire',1,0,'C');
$pdf->Cell(46,5,'Date de déclaration',1,1,'C');
$total =0;
foreach ($declaration as $key) {
  $sous_client->TrouverClient($key['client2_id']);
  $villes->TrouverVille($key['villeDest']);
  $pdf->Cell(46,5,$key['numero'],1,0,'C');
  $pdf->Cell(46,5,$key['colis'],1,0,'C');
  $pdf->Cell(46,5,$villes->VILLE_LIB,1,0,'C');
  $pdf->Cell(46,5,$sous_client->CLIENT_COD,1,0,'C');
  $pdf->Cell(46,5,$sous_client->NOM,1,0,'C');
  $pdf->Cell(46,5,date("d/m/Y", strtotime($key['date'])),1,1,'C');
  $total+=$key['colis'];
}
$pdf->Cell(46,5,'Total:',1,1,'C');
$pdf->Cell(46,5,$declaration->num_rows,1,0,'C');
$pdf->Cell(46,5,$total,1,1,'C');
$pdf->writeHTMLCell(160,5,40,163,'
<h5>Visa client</h5>
',0,1);
$pdf->writeHTMLCell(160,5,135,163,'
<h5>Visa pointeur</h5>
',0,1);
$pdf->writeHTMLCell(160,5,235,163,'
<h5>Visa ramasseur</h5>
',0,1);
$pdf->RoundedRect(5, 160, 93, 45, 3.50, '1111');
$pdf->RoundedRect(100, 160, 98, 45, 3.50, '1111');
$pdf->RoundedRect(200, 160, 93, 45, 3.50, '1111');
$pdf->Output();
}else {
  echo "erreur";
}
 ?>
