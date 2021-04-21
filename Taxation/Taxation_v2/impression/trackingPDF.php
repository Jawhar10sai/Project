<?php
include_once "../assets/TCPDF-master/tcpdf.php";
include_once "../gestion/control_utilisateur.php";
function Utf8_ansi($valor='') {
    $utf8_ansi2 = array(
    "\u00c0" =>"À",
    "\u00c1" =>"Á",
    "\u00c2" =>"Â",
    "\u00c3" =>"Ã",
    "\u00c4" =>"Ä",
    "\u00c5" =>"Å",
    "\u00c6" =>"Æ",
    "\u00c7" =>"Ç",
    "\u00c8" =>"È",
    "\u00c9" =>"É",
    "\u00ca" =>"Ê",
    "\u00cb" =>"Ë",
    "\u00cc" =>"Ì",
    "\u00cd" =>"Í",
    "\u00ce" =>"Î",
    "\u00cf" =>"Ï",
    "\u00d1" =>"Ñ",
    "\u00d2" =>"Ò",
    "\u00d3" =>"Ó",
    "\u00d4" =>"Ô",
    "\u00d5" =>"Õ",
    "\u00d6" =>"Ö",
    "\u00d8" =>"Ø",
    "\u00d9" =>"Ù",
    "\u00da" =>"Ú",
    "\u00db" =>"Û",
    "\u00dc" =>"Ü",
    "\u00dd" =>"Ý",
    "\u00df" =>"ß",
    "\u00e0" =>"à",
    "\u00e1" =>"á",
    "\u00e2" =>"â",
    "\u00e3" =>"ã",
    "\u00e4" =>"ä",
    "\u00e5" =>"å",
    "\u00e6" =>"æ",
    "\u00e7" =>"ç",
    "\u00e8" =>"è",
    "\u00e9" =>"é",
    "\u00ea" =>"ê",
    "\u00eb" =>"ë",
    "\u00ec" =>"ì",
    "\u00ed" =>"í",
    "\u00ee" =>"î",
    "\u00ef" =>"ï",
    "\u00f0" =>"ð",
    "\u00f1" =>"ñ",
    "\u00f2" =>"ò",
    "\u00f3" =>"ó",
    "\u00f4" =>"ô",
    "\u00f5" =>"õ",
    "\u00f6" =>"ö",
    "\u00f8" =>"ø",
    "\u00f9" =>"ù",
    "\u00fa" =>"ú",
    "\u00fb" =>"û",
    "\u00fc" =>"ü",
    "\u00fd" =>"ý",
    "\u00ff" =>"ÿ");
    return strtr($valor, $utf8_ansi2);
}
$pdf = new TCPDF('L','mm','A4');
$pdf->AddPage();
$donnees = file_get_contents("../gestion/excel_tracking.json");
$donnees = json_decode($donnees,true);
  if ($client_lve->CLIENT_COD =='9588') {
    $pdf->Cell(30,5,'Déclaration',1,0);
    $pdf->Cell(35,5,"Date d'expédition",1,0);
    $pdf->Cell(42,5,'Date de livraison',1,0);
    $pdf->Cell(35,5,'Statut de livraison',1,0);
    $pdf->Cell(70,5,'Desinataire',1,0);
    $pdf->Cell(32,5,'Retailer',1,0);
    $pdf->Cell(35,5,'ILOT',1,1);
  foreach ($donnees as $tracks) {
    $pdf->Cell(30,5,$tracks['Numero'],1,0);
    $pdf->Cell(35,5,$tracks['Date'],1,0);
    $pdf->Cell(42,5,$tracks['date_livraison'],1,0);
    switch (Utf8_ansi($tracks["statut"])) {
        case 'Arrivée : Agence Transit La Voie Express':
            $statut = "Arrivée (Ag LVE)";
            break;
        case 'Arrivée : Agence de Destination La Voie Express':
            $statut = "Arrivée (Ag LVE)";
            break;
        case "Expedition Encore dans l'agence de depart":
            $statut = "Agence départ";
            break;
        default:
        $statut = Utf8_ansi($tracks["statut"]);
            break;
    }
    /*$statut = (Utf8_ansi($tracks["statut"])== "Arrivée : Agence Transit La Voie Express" || Utf8_ansi($tracks["statut"])== "Arrivée : Agence de Destination La Voie Express")? "Arrivée (Ag LVE)" : (Utf8_ansi($tracks["statut"])=="Expedition Encore dans l'agence de depart") ? "Agence départ" : Utf8_ansi($tracks["statut"]) ;*/
    $pdf->Cell(35,5,substr($statut,0,17),1,0);
    $ndset = explode(' - ',$tracks["destinataire"]);
     if ( ! isset($ndset[1])) {
        $ndset[1] = $ndset[0];
        $ndset[0] = "";
     }
     $destinataire = $ndset[1];
    $pdf->Cell(70,5,substr($destinataire,0,25),1,0);
    $pdf->Cell(32,5,$ndset[0],1,0);
    $pdf->Cell(35,5,$tracks['num'],1,1);
  }
}elseif ($client_lve->CLIENT_COD =='15038') {
    $pdf->Cell(30,5,'Déclaration',1,0);
    $pdf->Cell(35,5,"Date d'expédition",1,0);
    $pdf->Cell(42,5,'Date de livraison',1,0);
    $pdf->Cell(35,5,'Statut de livraison',1,0);
    $pdf->Cell(32,5,'Code détaillant',1,0);
    $pdf->Cell(70,5,'Desinataire',1,0);
    $pdf->Cell(35,5,'BL',1,1);
  foreach ($donnees as $tracks) {
    $pdf->Cell(30,5,$tracks['Numero'],1,0);
    $pdf->Cell(35,5,$tracks['Date'],1,0);
    $pdf->Cell(42,5,$tracks['date_livraison'],1,0);
    switch (Utf8_ansi($tracks["statut"])) {
        case 'Arrivée : Agence Transit La Voie Express':
            $statut = "Arrivée (Ag LVE)";
            break;
        case 'Arrivée : Agence de Destination La Voie Express':
            $statut = "Arrivée (Ag LVE)";
            break;
        case "Expedition Encore dans l'agence de depart":
            $statut = "Agence départ";
            break;
        default:
        $statut = Utf8_ansi($tracks["statut"]);
            break;
    }
    /*$statut = (Utf8_ansi($tracks["statut"])== "Arrivée : Agence Transit La Voie Express" || Utf8_ansi($tracks["statut"])== "Arrivée : Agence de Destination La Voie Express")? "Arrivée (Ag LVE)" : (Utf8_ansi($tracks["statut"])=="Expedition Encore dans l'agence de depart") ? "Agence départ" : Utf8_ansi($tracks["statut"]) ;*/
    $pdf->Cell(35,5,substr($statut,0,17),1,0);
    $ndset = explode(' - ',$tracks["destinataire"]);
     if ( ! isset($ndset[1])) {
        $ndset[1] = $ndset[0];
        $ndset[0] = "";
     }
     $destinataire = $ndset[1];
    $pdf->Cell(32,5,$ndset[0],1,0);
    $pdf->Cell(70,5,substr($destinataire,0,25),1,0);
    $pdf->Cell(35,5,$tracks['num'],1,1);
  }
}else {
    $pdf->Cell(45,5,'Déclaration',1,0);
    $pdf->Cell(35,5,"Date d'expédition",1,0);
    $pdf->Cell(45,5,'Date de livraison',1,0);
    $pdf->Cell(35,5,'Statut de livraison',1,0);
    $pdf->Cell(85,5,'Desinataire',1,0);
    $pdf->Cell(35,5,'BL',1,1);
  foreach ($donnees as $tracks) {
    $pdf->Cell(45,5,$tracks['Numero'],1,0);
    $pdf->Cell(35,5,$tracks['Date'],1,0);
    $pdf->Cell(45,5,$tracks['date_livraison'],1,0);
    switch (Utf8_ansi($tracks["statut"])) {
        case 'Arrivée : Agence Transit La Voie Express':
            $statut = "Arrivée (Ag LVE)";
            break;
        case 'Arrivée : Agence de Destination La Voie Express':
            $statut = "Arrivée (Ag LVE)";
            break;
        case "Expedition Encore dans l'agence de depart":
            $statut = "Agence départ";
            break;
        default:
        $statut = Utf8_ansi($tracks["statut"]);
            break;
    }
    /*$statut = (Utf8_ansi($tracks["statut"])== "Arrivée : Agence Transit La Voie Express" || Utf8_ansi($tracks["statut"])== "Arrivée : Agence de Destination La Voie Express")? "Arrivée (Ag LVE)" : (Utf8_ansi($tracks["statut"])=="Expedition Encore dans l'agence de depart") ? "Agence départ" : Utf8_ansi($tracks["statut"]) ;*/
    $pdf->Cell(35,5,substr($statut,0,17),1,0);
    $pdf->Cell(85,5,substr($tracks["destinataire"],0,25),1,0);
    $pdf->Cell(35,5,$tracks['num'],1,1);
  }
}
$pdf->Output();
 ?>
