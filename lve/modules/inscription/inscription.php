<?php 
include_once('../../config/connect_m.php');
include("../../functions/reglages.php"); 
include("../../functions/function.php"); 
include("../../wmailer/class.mailer.php");

if(isset($_POST['action']) && $_POST['action'] == 'verif_email'){
	$exist = "SELECT id FROM formulaire_inscription WHERE id_site = '".$_POST['id_site']."' AND email = '".$_POST['email']."'";
	$query_exist = mysql_query($exist,$connect_m);
	$num_exist = mysql_num_rows($query_exist);
	
		echo $num_exist; 

	
	exit();
	} 



$query_form = "INSERT INTO formulaire_inscription (id,etat,nombre_point)
				VALUES(
				'',
				'0',
				'50')";
			mysql_query($query_form,$connect_m);

$id_form = mysql_insert_id();




$query = "INSERT INTO espace_securise (id_point,id_site,nom_prenom,email,mot_passe,tel,etat)
		VALUES ('".$id_form."','".$_POST['id_site']."','".$_POST['prenom']." ".$_POST['nom']."','".$_POST['email']."','".$_POST['mot_passe']."','".$_POST['mobile']."','1')";
mysql_query($query,$connect_m);
$id=mysql_insert_id();


$query_ad1 = "INSERT INTO adresses_client (id_client,type,adresse,code_postal,ville,pays,tel_domicile,tel_portable,alias)
		VALUES ('".$id."','livraison','".$_POST['adresse']."','".$_POST['code_postale']."','".$_POST['ville']."','".$_POST['pays']."','".$_POST['fixe']."','".$_POST['mobile']."','".$_POST['adresse2']."')";
mysql_query($query_ad1,$connect_m);

$query_ad2 = "INSERT INTO adresses_client (id_client,type,adresse,code_postal,ville,pays,tel_domicile,tel_portable,alias)
		VALUES ('".$id."','facturation','".$_POST['adresse']."','".$_POST['code_postale']."','".$_POST['ville']."','".$_POST['pays']."','".$_POST['fixe']."','".$_POST['mobile']."','".$_POST['adresse2']."')";
mysql_query($query_ad2,$connect_m);




$_SESSION['nom_acces'] = $nom_prenom; 
$_SESSION['id_acces'] = $id; 

foreach ($_POST as $key => $value){
	
	
	$query = "UPDATE formulaire_inscription SET ".$key." = '".$value."' WHERE id  = '".$id_form."'";
	mysql_query($query,$connect_m);
	
	
}

if($_POST['civilite'] != 'M.'){

 echo "<p>Chère ".$_POST['civilite']." ".$_POST['prenom']." ".$_POST['nom']."</p>
                    <p>Nous  vous remercions pour votre inscription. Nous vous confirmerons - par mail, votre  adhésion à notre panel, une fois la validation établie par notre comité.  </p> ";
					
}else{
	
	

 echo "<p>Chèr ".$_POST['civilite']." ".$_POST['prenom']." ".$_POST['nom']."</p>
                    <p>Nous  vous remercions pour votre inscription. Nous vous confirmerons - par mail, votre  adhésion à notre panel, une fois la validation établie par notre comité.  </p>
                   ";
	}



			$to = $_POST["email"];
			
			$subject = "Market Studies : Activation de votre compte";


$message = '<table width="800" height="604" border="0" align="center" cellpadding="0" cellspacing="0" id="Tableau_01" style="font:14px \'Century Gothic\', Century; color:#4e4e50;">
	<tr>
		<td height="110"><img width="383" height="73" alt="" src="http://marketstudies.oneoweb.com/uploads/site_69/images/Header/LOGO.png"></td>
	</tr>
	<tr>
		<td height="44">&nbsp;</td>
	</tr>
	<tr>
		<td height="39"><span style="font-size:20px; color:#c20000;">Bonjour '.$_POST["prenom"].' '.$_POST["nom"].'!</span><br>
Merci pour votre inscription sur marketstudies.ma!</td>
	</tr>
	<tr>
		<td height="22"></td>
	</tr>
	<tr>
		<td height="71">Vous pouvez maintenant vous connecter :<br>
        <p style="margin: 8px 0px;"><span style="color: rgb(194, 0, 0); padding-left: 20px; background: url(\'http://marketstudies.oneoweb.com/uploads/site_69/images/HomePage/footer/access_newsletter.png\') no-repeat scroll left 3px transparent; margin-left: 6px;">Login : </span> '.$_POST['email'].'</p>
       <p style="margin: 8px 0px;"> <span style="color: rgb(194, 0, 0); padding-left: 20px; background: url(\'http://marketstudies.oneoweb.com/uploads/site_69/images/HomePage/footer/access_newsletter.png\') no-repeat scroll left -19px transparent; margin-left: 6px;">Mot de passe : </span> '.$_POST['mot_passe'].'</p>

        </td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>
	<tr>
		<td height="120"><p>Nous vous sugg&eacute;rons de conserver cet email, au cas ou vous oublieriez votre pseudo ou votre mot de passe.</p>
		  <p>Afin d\'activer compl&egrave;tement votre compte, vous devez confirmer votre adresse email.<br>
		    Veuillez cliquer sur le lien ci-dessous :<br>
            <a href="http://www.marketstudies.ma/valide_inscription.php?site='.$_POST['id_site'].'&id='.$id.'" style="font-size:12px;float:left; margin-top:6px;padding:4px; background:#c20000; color:#FFF; border-radius:5px;">Activation de mon compte</a>
        </p></td>
	</tr>
	<tr>
		<td height="109"><p>Merci!</p>
	    <p>Veuillez ne pas r&eacute;pondre &agrave; cette email. Pour toutes questions ou commentaires, veuillez remplir le formulaire de contact &agrave; cette adresse : <a href="http://www.marketstudies.ma/contact" target="_blank" style="color:#4e4e50">http://www.marketstudies.ma/contact</a></p></td>
	</tr>
	<tr>
		<td height="69" align="center"><div  style="border-top:3px solid #c20000; width:100%; height:69px; float:left; padding:6px 0; font-size:10px">Vous pouvez vous d&eacute;sabonner de ces emails &agrave; tout moment<br>
	  ou trouver des r&eacute;ponses &agrave; vos questions sur l\'Assistance Market studies.</div></td>
	</tr>
</table>';











		
			$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from('info@marketstudies.ma');
			$mailer->set_address($to);
			$mailer->set_format('html');
			$mailer->set_subject($subject);
			$mailer->set_message(utf8_decode($message), array('TAG1' => ''));
			$mailer->send();





?>
