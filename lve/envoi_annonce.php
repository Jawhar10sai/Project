<?php 
include_once('config/connect.php');
include("wmailer/class.mailer.php");

$email_annonceur 	= $_POST['email_annonceur'];
$nom 				= $_POST['nom'];
$email 				= $_POST['email'];
$infos 				= $_POST['infos'];
$id 				= $_POST['id'];


$articles = "SELECT Nom FROM annonces where id='".$id."'";
$req_articles = mysql_query($articles ,$connect);
$row_articles = mysql_fetch_assoc($req_articles);


	// création du message, les \n permettent de faire un saut de ligne
		$message = 'Nom et pr&eacute;nom : '.$nom.'<br>
			Email : '.$email.'<br>
			Message : '.$infos.'<br>';
					
		//send mail
			$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from($email,utf8_decode(stripcslashes("Je vous contact à propos de votre annonce : ".$row_articles['Nom'])));
			$mailer->set_address($email_annonceur);
			$mailer->set_format('html');
			$mailer->set_subject(utf8_decode(stripcslashes("Je vous contact à propos de votre annonce : ".$row_articles['Nom'])));
			$htmlmessage = nl2br(utf8_decode($message));
			$mailer->set_message($htmlmessage, array('TAG1' => ''));
			$mailer->send();

?>