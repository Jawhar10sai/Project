<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LA VOIE EXPRESS</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="line-height:17px;" >
<table width="929" height="1167" border="0" align="center" cellpadding="0" cellspacing="0">
<tr  >
  <td height="141" align="left" valign="top" >
  <?php 
  error_reporting(E_WARNING);
  include('header.html');
   ?> </td>
</tr>
<tr>
  <td height="48" align="left" valign="top"><?php
  include('menu.html');
   ?> </td>
</tr>
<tr  >

  <td align="left" valign="top"><table width="929" height="700" border="0" cellpadding="0" cellspacing="0"  >
    <tr><td width="668" height="108" align="left" valign="top">
  <table width="668" border="0" cellpadding="0" cellspacing="0">
    <tr><td height="168" colspan="3" align="left" valign="top"><?php include('banniere2.html'); ?></td>
    </tr>
 
    <tr>
      <td width="160" height="257" align="left" valign="top"><img src="img/e_vex182.jpg" width="152" height="177" /></td>
      <td width="22" align="left" valign="top">&nbsp;</td>
      <td width="486" align="left" valign="top">
	  <span class="titre1">Contact</span><br />
	  <br />
	  Un interlocuteur privilégié est à votre disposition. Il connaît votre dossier, vos contraintes, qu’elles soient propres à votre activité ou à vos destinataires : un contact commercial personnalisé et efficace. <br />
	  <br />
	  Notre service clientèle est joignable chaque jour ouvrable de 8h00 à 18h00 et vous répond. Pour des raisons de sécurité et pour le confort de nos clients Nous tenons à leurs dispositions des archives documentaires concernant leurs expéditions. <br />
	  <br />
	  Contactez-nous pour plus de renseignements, explications, réclamations, ou questions. <br />
	  <br />
	  Adresse : 73, Bd Moulay Slimane, Aïn Sebaâ - Casablanca <br />
	  Téléphone : (+212) 22 34 43 16 (LG) <br />
	  Fax : (+212) 22 34 42 64<br />
	  <br />
	  <?php
//include("includes/mysql.php");
if($_REQUEST['trait']!=1){
?>
        <form action="" method="post" name="cv" id="cv">
              <input type="hidden" value="1" name="trait" />
	  	      <table width="328">
			<tr>
				<td width="111">Nom* : </td>
				<td width="205"><input type="text" name="nom" /></td>
			</tr>
			<tr>
				<td>Prenom* : </td>
				<td><input type="text" name="prenom" /></td>
			</tr>
			<tr>
				<td>Adresse : </td>
				<td><input type="text" name="adresse" /></td>
			</tr>
			<tr>
				<td>Email : </td>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td>N°Tel* : </td>
				<td><input type="text" name="tel" /></td></tr>
                <tr>
				<td>GSM : </td>
				<td><input type="text" name="GSM" /></td></tr>
                <tr>
				<td>Fax : </td>
				<td><input type="text" name="fax" /></td>
			</tr>
			<tr>
				<td>Pays* : </td>
				<td><input type="text" name="pays" /></td>
			</tr>

			<tr>
				<td>Ville* : </td>
				<td><input type="text" name="ville" /></td>
			</tr>	
			<tr>
				<td>Code postale : </td>
				<td><input type="text" name="cp" /></td>
			</tr>	
			<tr>
				<td>Société : </td>
				<td><input type="text" name="societe" /></td>
			</tr>	
			<tr>
				<td>Service* : </td>
				<td>
				<select name="service" title="service" style="width:145px">
				<option value="1" selected="selected">Service clientèle</option>
				<option value="2">Réclamations</option>
				<option value="3">Commande</option>
				<option value="4">Réservation</option>
				<option value="5">Ramassage</option>
				<option value="6">Informations</option>
				<option value="7">Direction général</option>
				</select>				</td>
			</tr>
				<tr>
				<td>Objet : </td>
				<td><input type="text" name="Objet" /></td>
			</tr>	
		<tr>
				<td>Message : </td>
				<td><textarea name="Message"  cols="50" rows="3"></textarea></td>
			</tr>	
			<tr>
				<td></td>
				<td><br /><input type="submit" name="envoyer" value="Envoyer" style="margin-left:35px;background-color:#FF0000; font-weight:bold; color:#FFFFFF" /></td>
			</tr>
			<tr><td><span style="color:#FF0000">* Champs obligatoires</span></td></tr>
		</table>
	  </form>
 <?php
}
else{
require_once "mysql.php";
$headers  =  "From: ".$_POST['nom']." ".$_POST['prenom']."<".$_POST['email'].">\n";
$headers .= "Reply-To: ".$_POST['email']."\n";
$headers .= "MIME-VERSION: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8;\n";
$headers .= "Content-Transfer-Encoding: 8bit;\n";
$q = "SELECT * FROM `contact` where id=".$_POST['service'];
$r = mysql_query($q);
$row = mysql_fetch_array($r);
$emaill = $row['emails'];
//$emaill = 'najib.fadil@gmail.com,'.$row['emails'];
$objet = $_POST['Objet'].' : '.$row['service'];

$mail= '

            <table cellspacing="0" cellpadding="0" border="0" style=" padding:20px;font-family:Verdana, Geneva, sans-serif; font-size:12px">
              <tbody>
                <tr>
                  <td width="127" align="left"><b>Nom / Prénom :</b></td>
                  <td width="274" align="left">
                    '.$_POST['nom'].' '.$_POST['prenom'].'
                  </td>
                </tr>
                <tr>
                  <td align="left"><b>Email :</b></td>
                  <td align="left">
                    '.$_POST['email'].'
                  </td>
                </tr>
                <tr>
                  <td align="left"><b>Adresse:</b></td>
                  <td align="left">
                    '.$_POST['adresse'].'
                  </td>
                </tr>
                <tr>
                  <td align="left"><b>Code postal:</b></td>
                  <td align="left">
                    '.$_POST['cp'].'
                  </td>
                </tr>
                <tr>
                  <td align="left"><b>Ville:</b></td>
                  <td align="left">
                    '.$_POST['ville'].'
                  </td>
                </tr>
                <tr>
                  <td align="left"><b>Société:</b></td>
                  <td align="left">
                    '.$_POST['societe'].'
                  </td>
                </tr>
                <tr>
                  <td align="left"><b>Pays:</b></td>
                  <td align="left">
                    '.$_POST['pays'].'
                  </td>
                </tr>
                 <tr>
                  <td align="left"><b>Tel.Mobile:</b></td>
                  <td align="left">
                    '.$_POST['Gsm'].'
                  </td>
                </tr>
                 <tr>
                  <td align="left"><b>Téléphone:</b></td>
                  <td align="left">
                    '.$_POST['tel'].'
                  </td>
                </tr>
               </table>
               ';
                
  				
		  
$r=mail($emaill, $objet, $mail, $headers);
if($r) 
echo '
<div align="center" style=" padding:10px;font-family:Verdana, Geneva, sans-serif">
Votre message a bien été envoyée. On va vous contactez dans les plus brefs délais.
</div><br />
';
else
echo '
<div align="center" style=" padding:10px;font-family:Verdana, Geneva, sans-serif">
Echec d\'envoie, veuillez réessayer plus tard.
</div><br />
';
}?>		</td>
    </tr>
  </table></td>
    <td width="19" align="left" valign="top">&nbsp;</td>
    <td width="242" align="left" valign="top"><?php include('menu_droit.html'); ?><?php include('newsletter.php'); ?> </td>
  </tr></table></td>
</tr>

<tr>
  <td height="147" align="left" valign="top"><?php include('footer.html');?></td>
</tr>
</table>
</body>
</html>
