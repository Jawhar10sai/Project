<?php
//phpinfo(); 
/*
ini_set('sendmail_from', 'no-reply@lavoieexpress.ma');
ini_set("SMTP","100.64.10.12");
ini_set("smtp_port","25");
*/

function choppe_image($_url, $_fichier)
{
    $in =    fopen($_url, "rb");
    $out =   fopen($_fichier, "wb");
    // tant qu'il y a des 1 et des 0, on boucle
    while ($brut = fread($in, 8192)) {
        // on les ecrits dans le fichier de sortie
        fwrite($out, $brut, 8192);
    }
    fclose($in); // on referme l'ouverture sur le fichier source
    fclose($out); // on referme le fichier qu'on vient de creer
}


require("PHPMailer_5.2.4/class.phpmailer.php");


$mail = new PHPMailer();
// Now you only need to add the necessary stuff
$mail->CharSet = 'UTF-8';
// HTML body
try {
    /**/

    // And the absolute required configurations for sending HTML with attachement
    $mail->setFrom('no-reply@lavoieexpress.ma');

    $tab_mail = explode(",", $_GET['mail_client']);
    /*echo var_dump($tab_mail);
echo $tab_mail[0]."<br>";
  echo $tab_mail[1];*/
    foreach ($tab_mail as $maill) {
        //echo $maill."<br>";
        $mail->AddAddress($maill);
    }
    //////////////////////////////email copie//////////////
    $tab_mail_c = explode(",", $_GET['mail_copie']);

    foreach ($tab_mail_c as $mail2) {
        //echo $maill."<br>";
        $mail->addCC($mail2);
    }
    //////////////////////////////email copie//////////////
    //$mail->AddAddress("y.takourt@lavoieexpress.ma" );

    //$mail->addCC('m.boussalham@lavoieexpress.ma');
    //$mail->addBCC('m.boussalham@lavoieexpress.ma');//copie cachée

    $body = "</pre>
<div>";

    switch ($_GET['type']) {
        case 0: // BL
            $mail->Subject = "Test for BL " . $_GET['envoi'] . "";
            $body = $body . "Bonjour,<br> <br>La voie express vous informe que votre envoi a bien été livré,voir la photo ci-jointe de BL.<br> <br>Nous vous remercions de votre confiance.<br>Service Exploitation La Voie Express.";
            $body = $body . '<br> <br> <p><a href="http://www.lavoieexpress.com"><img src="http://lavoieexpress.com/images/logo-lavoieexpress.png" alt="" width="286" height="94"></a></p><br>
Service Exploitation ';

            break;
        case 1: //avarie

            $mail->Subject = "Test for avarie " . $_GET['envoi'] . "";
            $body = $body . "Bonjour,<br> <br>La voie express vous informe que votre envoi est en avarie,pour suivi merci d'appeler le service SAV (+212) 05 22 34 43 16.<br> <br>Nous vous remercions de votre compréhension.<br>Service SAV La Voie Express. ";
            $body = $body . '<br> <br> <p><a href="http://www.lavoieexpress.com"><img src="http://lavoieexpress.com/images/logo-lavoieexpress.png" alt="" width="286" height="94"></a></p><br>
Service SAV ';
            break;
        case 2: //magasin fermé

            $mail->Subject = "Test for magasin fermé " . $_GET['envoi'] . "";

            $body = $body . "Bonjour,<br> <br>La voie express vous informe que votre envoi<br> <br> Nous vous remercions de votre confiance.<br>Service Exploitation La Voie Express.";
            $body = $body . '<br> <br> <p><a href="http://www.lavoieexpress.com"><img src="http://lavoieexpress.com/images/logo-lavoieexpress.png" alt="" width="286" height="94"></a></p><br>
Service Exploitation';

            break;
    }



    $body = $body . '
19, Rue Ibnou Koutia Ain Sebaâ, Casablanca, Maroc<br>
T : +212 5 22 34 43 16<br>
F : +212 5 22 34 42 64<br>
http://www.lavoieexpress.com
</div>';



    $mail->MsgHTML($body);


    #$date = date('Y')."m".date('m');
    #choppe_image("http://46.18.132.236:8089/upload_mobile_BL/".$date."/".$_GET['path']."/".$img,$img);
    $tab_img = explode(",", $_GET['img']);

    foreach ($tab_img as $img) {
        choppe_image("http://46.18.132.236:8089/upload_mobile_BL/" . $_GET['path'] . "/" . $img, $img);
        #echo $img."<br>";
        $mail->AddAttachment($img);
    }

    #$mail->AddAttachment($_GET['img']);



    if (!$mail->Send()) {
        echo "There was an error sending the message";
        exit;
    }
    foreach ($tab_img as $img) {
        unlink($img);
    }

    echo "Message was sent successfully";
} catch (Exception $e) {
    echo 'Message could not be sent.';
}

/*
error_reporting(E_ALL);
require("PHPMailer_5.2.4/class.phpmailer.php");

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP(); 
$mail->verify_peer=false;
$mail->verify_peer_name=false;
$mail->allow_self_signed=true; 
                                     // Set mailer to use SMTP
    $mail->Host = '100.64.10.12';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'no-reply@lavoieexpress.ma';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;   
 
    //Recipients
    $mail->setFrom('no-reply@lavoieexpress.ma',"LVE");
    $mail->addAddress("y.takourt@lavoieexpress.ma");     // Add a recipient              // Name is optional
    $mail->addReplyTo('no-reply@lavoieexpress.ma',"LVE");
  //  $mail->addCC('atest1042@gmail.com',"ahmed");
    //$mail->addBCC('atest1042@gmail.com',"ahmed");

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<html>
    <head> 
         
    
    </head>
    <body>
        <div class="parent"> test </div>
            </body></html>';
   

    $mail->send();
    echo 'Message has been sent ';
                
                
} catch (Exception $e) {
    echo 'Message could not be sent.';
    
}*/
