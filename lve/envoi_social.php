<?php
include_once('wmailer/class.mailer.php');


			$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from($_POST['from']);
			$mailer->set_address($_POST['to']);
			$mailer->set_format('html');
			$mailer->set_subject(utf8_decode($_POST['objet']));
			$message = $_POST['texte'].'<br>'.$_POST['url'];
			$htmlmessage = $message;
			$mailer->set_message(utf8_decode($htmlmessage), array('TAG1' => ''));
			if($mailer->send()){
				echo '1';
			}else{
				echo '0';
			}

	
?>