<?php 
include_once('config/connect.php');
include_once('config/connect_m.php');
include("wmailer/class.mailer.php");

$option_acces 	= $_POST['option_acces'];

if($option_acces == 'signup'){
	
		
	$query="SELECT * FROM espace_securise WHERE id_site = '".$_POST['id_site']."' AND email = '".$_POST['email']."' AND mot_passe = '".$_POST['password']."'";
	$req_query = mysql_query($query ,$connect_m);
	$tab_query = mysql_fetch_assoc($req_query);
	$num_query = mysql_num_rows($req_query);
	
	if($num_query > 0){
		
		echo 'exist';
		
	}else{
	
	
$query = "INSERT INTO espace_securise (id_site,nom_prenom,email,mot_passe,tel,date_naissance)
		VALUES ('".$_POST['id_site']."','".$_POST['nom_prenom']."','".$_POST['email']."','".$_POST['password']."','".$_POST['tel']."','".$_POST['date_naissance']."')";
mysql_query($query,$connect_m);
		$id=mysql_insert_id();


	// création du message, les \n permettent de faire un saut de ligne
		$message = 'Bonjour,
			Merci d\'avoir présenté une demande d\'inscription à notre site. <br>
			Pour assurer le bon fonctionnement de votre adresse e-mail, il est essentiel de valider votre inscription en cliquant <a href="http://www.oneoweb.com/valide_inscription.php?site='.$_POST['id_site'].'&id='.$id.'" target="_blank">ici</a>. 			
			<br><br>Réponse automatique, ne pas répondre à cet e-mail.';
					
		//send mail
			$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from("noreply@oneo.ma","Merci de votre inscription sur notre Site");
			$mailer->set_address($_POST['email']);
			$mailer->set_format('html');
			$mailer->set_subject(utf8_decode(stripcslashes("Merci de votre inscription sur notre Site")));
			$htmlmessage = nl2br(utf8_decode($message));
			$mailer->set_message($htmlmessage, array('TAG1' => ''));
			$mailer->send();



	
echo 'signup';
	}

}else if($option_acces == 'login'){
	
	$query="SELECT * FROM espace_securise WHERE id_site = '".$_POST['id_site']."' AND email = '".$_POST['email']."' AND mot_passe = '".$_POST['password']."'";
	$req_query = mysql_query($query ,$connect_m);
	$tab_query = mysql_fetch_assoc($req_query);
	$num_query = mysql_num_rows($req_query);
	if($num_query > 0 && $tab_query['etat'] == 1){
		$_SESSION['nom_acces'] = $tab_query['nom_prenom']; 
		$_SESSION['id_acces'] = $tab_query['id']; 
		
		echo $_SESSION['nom_acces'];
		
		}else if($num_query > 0 && $tab_query['etat'] == 0){
			$_SESSION['nom_acces'] = '';
			echo 'non_valide';
		}else{
			$_SESSION['nom_acces'] = '';
			echo 'non';
		}
	
}else if($option_acces == 'login_password'){
	
	$query="SELECT * FROM secure_page WHERE id_site = '".$_POST['id_site']."' AND id_page = '".$_POST['id_page']."' AND password = MD5('".$_POST['password']."')";
	$req_query = mysql_query($query ,$connect);
	$tab_query = mysql_fetch_assoc($req_query);
	$num_query = mysql_num_rows($req_query);
	if($num_query > 0){
	$_SESSION['access_page'] = $_POST['id_page'];
		echo $_SESSION['access_page'];
		
		}else{
			$_SESSION['access_page'] = '';
			echo 'non';
		}
	
}


?>