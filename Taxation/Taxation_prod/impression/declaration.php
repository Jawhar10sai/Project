<?php
require_once "../assets/TCPDF-master/tcpdf.php";
require_once "../gestion/control_utilisateur.php";
#require_once "../gestion/classes/conftaxDB.php";
if (isset($_GET['numero'])) {
  $declarations = $client_lve->MaDeclaration($_GET['numero']);
  if ($declarations) {
    $sous_client = $client_lve->MonClientParID($declarations->client2_id);
    $adresses = Adresses::TrouverAdresse($declarations->id_adres);
    $villes = Villes::TrouverVille($adresses->id_ville);
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    #Premiere ligne
    #Déclaration d'expédition

    $pdf->RoundedRect(5, 5, 90, 20, 3.50, '1111');
    $pdf->SetFont('aefurat', '', 16);
    $pdf->writeHTMLCell(160, 5, 7, 5, '
<h5>Déclaration d' . "'" . 'expédition  بالإرسال تصريح  </h5>
', 0, 1);
    $pdf->writeHTMLCell(160, 8, 40, 15, '
<h4>' . $declarations->numero . '</h4>
', 0, 1);
    #Les logos
    $pdf->RoundedRect(97, 5, 115, 20, 3.50, '1111');
    $pdf->writeHTMLCell(116, 5, 100, 10, '
<img src="../images/logo-lavoieexpress.png" height="40">
', 0, 1);
    $pdf->writeHTMLCell(116, 5, 175, 10, '
<img src="../images/Afaq_27001_outline.png"  height="40">
', 0, 1);
    $pdf->writeHTMLCell(116, 5, 190, 10, '
<img src="../images/logo_certificat_iso_9001_afnor_nov_2012.png"  height="40">
', 0, 1);
    #Résérvé à la voie express
    $pdf->RoundedRect(214, 5, 77, 20, 3.50, '1111');
    $pdf->writeHTMLCell(116, 5, 225, 10, '<h5>Résérvé à La Voie Express</h5>', 0, 1);
    $pdf->SetFont('Helvetica', '', 11);
    #les colones du milieu

    #Nombre de colis
    $pdf->RoundedRect(72, 27, 45, 20, 3.50, '1111');
    $pdf->writeHTMLCell(40, 15, 75, 29, '<table>
<tr><td><h4>4.Nbre Colis</h4></td></tr>
<tr><td></td></tr>
<tr><td align="center">' . $declarations->colis . '</td></tr>
</table>', 0, 1);
    #Nombre des palettes
    $pdf->RoundedRect(72, 49, 45, 20, 3.50, '1111');
    $pdf->writeHTMLCell(40, 15, 75, 50, '<table>
<tr><td><h4>5.Nbre palettes</h4></td></tr>
<tr><td></td></tr>
<tr><td align="center" rowspan="2">' . $declarations->Nbre_palettes . '</td></tr>
</table>', 0, 1);
    #Poids
    $pdf->RoundedRect(72, 71, 45, 20, 3.50, '1111');
    $pdf->writeHTMLCell(40, 15, 75, 73, '<table>
<tr><td><h4>6.Poids (kgs)</h4></td></tr>
<tr><td></td></tr>
<tr><td align="right">' . $declarations->poids . '</td></tr>
</table>', 0, 1);
    #Port
    $port = ($declarations->port == "P") ? "Payé" : "Dû";
    $pdf->RoundedRect(72, 93, 45, 20, 3.50, '1111');
    $pdf->writeHTMLCell(40, 15, 75, 95, '
<table>
<tr><td><h4>7.Port</h4></td></tr>
<tr><td></td></tr>
<tr><td align="right">' . $port . '</td></tr>
</table>
', 0, 1);
    #Retour de fonds
    $pdf->RoundedRect(72, 115, 140, 37, 3.50, '1111');
    $pdf->writeHTMLCell(135, 5, 75, 117, '
<h4>8. Retour de fonds:</h4>
', 0, 1);
    $pdf->writeHTMLCell(65, 26, 80, 123, '
<table>
  <tr>
    <td colspan="3" align="center">Montant (Dhs)</td>
  </tr>
  <tr>
    <td>C/Espèce</td>
    <td>:</td>
    <td align="right">' . $declarations->Espece . '</td>
  </tr>
  <tr>
    <td>C/Chéque</td>
    <td>:</td>
    <td align="right">' . $declarations->Cheque . '</td>
  </tr>
  <tr>
    <td>C/Traite</td>
    <td>:</td>
    <td align="right">' . $declarations->Traite . '</td>
  </tr>
</table>
', 1, 1);
    $pdf->SetFont('Helvetica', '', 9);
    $pdf->writeHTMLCell(62, 26, 147, 123, '
<table>
    <tr>
      <td colspan="2" align="center">C/BL</td>
    </tr>
    <tr>
      <td>Nombre de BL:</td>
      <td>' . $declarations->Nbre_BL . '</td>
    </tr>
    <tr>
      <td>Numéro(s) du BL:</td>
      <td>' . $declarations->BL . '</td>
    </tr>
</table>
', 1, 1);
    /***/
    $pdf->SetFont('Helvetica', '', 11);
    #Nature de marchandises:
    $pdf->RoundedRect(118, 27, 94, 15, 3.50, '1111');
    $pdf->writeHTMLCell(95, 10, 120, 28, '
<table>
  <tr><td><h4>9.Nature de marchandises:</h4></td></tr><br>
  <tr><td align="center">' . $declarations->nature . '</td></tr>
</table>
', 0, 1);
    #Valeur déclaée
    $pdf->RoundedRect(118, 44, 94, 15, 3.50, '1111');
    $pdf->writeHTMLCell(95, 10, 120, 45, '
<table>
  <tr><td><h4>10.Valeur déclaée (Dhs):</h4></td></tr><br>
  <tr><td align="center">' . $declarations->valeur . '</td></tr>
</table>
', 0, 1);
    #Dimensions
    $pdf->RoundedRect(118, 61, 94, 15, 3.50, '1111');
    $pdf->writeHTMLCell(95, 10, 120, 62, '
<table>
  <tr><td colspan="3"><h4>11.Dimensions en (cm):</h4></td></tr>
  <tr>
    <td align="center">Longueur: ' . $declarations->longueur . '</td>
    <td align="center">Largeur: ' . $declarations->largeur . '</td>
    <td align="center">Hauteur: ' . $declarations->hauteur . '</td>
  </tr>
</table>
', 0, 1);
    #Livraison
    $livr  = ($declarations->livraison == "D") ? "À domicile" : ($declarations->livraison == "p" ? "Points relais" : "En gare");
    $pdf->RoundedRect(118, 78, 33, 35, 3.50, '1111');
    $pdf->writeHTMLCell(33, 34, 119, 79, '
<h4>12. Livraison:</h4>
<table>
<tr>
  <td></td><td></td>
</tr>
<tr>
  <td colspan="2" align="center">' . $livr . '</td>
</tr>
</table>
', 0, 0);
    #Produits et service
    $pdf->RoundedRect(153, 78, 59, 35, 3.50, '1111');
    if ($declarations->courrier_typ == "M") {
      if ($declarations->express == "X") {
        $pdf->writeHTMLCell(59, 34, 154, 79, '
  <h4>13.Produits et service:</h4>
  <table>
  <tr><td></td><td></td><td></td><td></td></tr>
  <tr>
    <td colspan="4" align="center">Messagerie</td>
  </tr>
  <tr>
    <td colspan="4" align="center">Express avant 10H</td>
  </tr>
  </table>
  ', 0, 1);
      }
      if ($declarations->express == "S") {
        $pdf->writeHTMLCell(59, 34, 154, 79, '
  <h4>13.Produits et service:</h4>
  <table>
  <tr><td></td><td></td><td></td><td></td></tr>
  <tr>
    <td colspan="4" align="center">Messagerie</td>
  </tr>
  <tr>
    <td colspan="4" align="center">Simple</td>
  </tr>
  </table>
  ', 0, 1);
      }
    } elseif ($declarations->courrier_typ == "25") {
      $pdf->writeHTMLCell(59, 34, 154, 79, '
  <h4>13.Produits et service:</h4>
  <table>
  <tr><td></td><td></td><td></td><td></td></tr>
  <tr>
    <td colspan="4" align="center">Affrètement</td>
  </tr>
  <tr>
  <td colspan="4" align="center">25T</td>
  </tr>
  </table>
  ', 0, 1);
    } elseif ($declarations->courrier_typ == "14") {
      $pdf->writeHTMLCell(59, 34, 154, 79, '
  <h4>13.Produits et service:</h4>
  <table>
  <tr><td></td><td></td><td></td><td></td></tr>
  <tr>
    <td colspan="4" align="center">Affrètement</td>
  </tr>
  <tr>
  <td colspan="4" align="center">14T</td>
  </tr>
  </table>
  ', 0, 1);
    } elseif ($declarations->courrier_typ == "5") {
      $pdf->writeHTMLCell(59, 34, 154, 79, '
  <h4>13.Produits et service:</h4>
  <table>
  <tr><td></td><td></td><td></td><td></td></tr>
  <tr>
    <td colspan="4" align="center">Affrètement</td>
  </tr>
  <tr>
  <td colspan="4" align="center">5T</td>
  </tr>
  </table>
  ', 0, 1);
    } else {
      $pdf->writeHTMLCell(59, 34, 154, 79, '
  <h4>13.Produits et service:</h4>
  <table>
  <tr><td></td><td></td><td></td><td></td></tr>
  <tr>
    <td colspan="4" align="center">Affrètement</td>
  </tr>
  <tr>
  <td colspan="4" align="center">Utilitaires</td>
  </tr>
  </table>
  ', 0, 1);
    }


    #Premiere colone
    $pdf->writeHTMLCell(160, 8, 5, 25, '
<h4>1. Expéditeur:</h4>
', 0, 1);
    $pdf->RoundedRect(5, 33, 65, 38, 3.50, '1111');
    $pdf->writeHTMLCell(65, 38, 5, 34, '
<label>Nom:          <b>' . $client_lve->NOM . '</b></label><br>
<label>Code:         <b>' . $client_lve->CLIENT_COD . '</b></label><br>
<label>Adresse:     <b>' . $client_lve->adresse . '</b></label><br>
<label>Ville:          <b>' . $client_lve->ville . '</b></label><br>
<label>Téléphone: <b>' . $client_lve->telephone . '</b></label>
', 0, 1);
    $pdf->writeHTMLCell(160, 8, 5, 71, '
<h4>2. Destinataire:</h4>
', 0, 1);
    $pdf->RoundedRect(5, 79, 65, 38, 3.50, '1111');
    $pdf->writeHTMLCell(65, 38, 5, 80, '
<label>Nom:          <b>' . $sous_client->NOM . '</b></label><br>
<label>Code:         <b>' . $sous_client->CLIENT_COD . '</b></label><br>
<label>Adresse:     <b>' . $adresses->adresse . '</b></label><br>
<label>Ville:          <b>' . $villes->VILLE_LIB . '</b></label><br>
<label>Téléphone: <b>' . $sous_client->telephone . '</b></label>
', 0, 1);
    $pdf->writeHTMLCell(160, 8, 5, 117, '
<h4>3. Retour palettes:</h4>
', 0, 1);
    $pdf->RoundedRect(5, 125, 65, 27, 3.50, '1111');
    $pdf->writeHTMLCell(63, 38, 6, 128, '
<table border="1">
<tr>
<th align="center">Type</th>
<th align="center">Nombre</th>
</tr>
<tr>
<td>800*1200</td>
<td align="center">' . $declarations->paletteA . '</td>
</tr>
<tr>
<td>1000*1200</td>
<td align="center">' . $declarations->paletteB . '</td>
</tr>
<tr>
<td>1200*1200</td>
<td align="center">' . $declarations->paletteC . '</td>
</tr>
</table>
', 0, 1);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->writeHTMLCell(128, 10, 5, 158, '
LA VOIE EXPRESS 2 S.A au Capital 23.077.000,00 Dhs - 19, Rue Abou Bkr Ibnou Koutia, A&icirc;n Seba&acirc;, Casablanca<br>
RC 95457 &ndash; IF 01601949 &ndash; Patente 37951124 &ndash; CNSS 2640961 &ndash; ICE 001526339000073<br>
T&eacute;l : 05 22 34 43 16 / Fax : 0522344264 &ndash; E-mail : client@lavoieexpress.ma<br>
 <b><u>Important:</u></b><br>
_ La valeur d&eacute;clar&eacute;e est de cent (100 Dhs) en cas de non d&eacute;claration de valeur.<br>
_ Les Clauses et conditions g&eacute;n&eacute;rales de transport Marchandise et Messagerie sont consultables aupr&egrave;s de
    LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet: <b>www.lavoieexpress.com</b>
', 0, 1);
    #Dernieres colones
    $pdf->SetFont('Helvetica', '', 16);
    $pdf->RoundedRect(214, 27, 78, 40, 3.50, '1111');
    $pdf->writeHTMLCell(60, 8, 232, 28, 'Visa ramasseur', 0, 1);
    $pdf->RoundedRect(214, 69, 78, 40, 3.50, '1111');
    $pdf->writeHTMLCell(40, 8, 232, 70, 'Visa pointeur', 0, 1);
    $pdf->RoundedRect(214, 111, 78, 41, 3.50, '1111');
    $pdf->writeHTMLCell(40, 8, 232, 112, 'Visa taxateur', 0, 1);
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->RoundedRect(214, 154, 78, 43, 3.50, '1111');
    $pdf->writeHTMLCell(60, 8, 230, 155, 'Le:  &nbsp;&nbsp;&nbsp; /&nbsp;&nbsp;&nbsp;   /', 0, 1);
    $pdf->writeHTMLCell(70, 8, 216, 160, 'Cachet et signature Destinataire', 0, 1);
    $pdf->RoundedRect(134, 154, 78, 43, 3.50, '1111');
    $pdf->writeHTMLCell(60, 8, 153, 155, 'Le:  &nbsp;&nbsp;&nbsp; /&nbsp;&nbsp;&nbsp;   /', 0, 1);
    $pdf->writeHTMLCell(70, 8, 138, 160, 'Cachet et signature Destinataire', 0, 1);
    $pdf->Output();
  } else {
    echo "erreur";
  }
} else {
  echo "erreur";
}
