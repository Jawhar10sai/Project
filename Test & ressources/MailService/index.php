<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = '100.64.10.12';
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@lavoieexpress.ma';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 25;
    #$mail->Host       = 'smtp.gmail.com';
    #$mail->SMTPAuth   = true;
    #$mail->Username   = 'lavoieexpressmaroc@gmail.com';
    #$mail->Password   = '';
    #$mail->SMTPSecure = "ssl";
    #$mail->Port       = 465;
    $mail->setFrom('no-reply@lavoieexpress.ma', 'No-reply');
    $mail->addAddress('j.hassou@lavoieexpress.ma', 'Jawhar HASSOU');
    #$mail->addCC('s.zaki@lavoieexpress.ma');
    $mail->isHTML(true);
    $mail->Subject = 'Objet de test';
    $body = 'Ceci est un mail de <b>test</b> <br />';
    $body .= "
        Je tiens a vous informer qu'il y a un retard a la livraison de ma declaration: <b style='color:red;'>TEST </b><br/>
        <h5>Numero de telephone: TEST</h5>
        <h5>Numero de fixe: TEST</h5>";
    $mail->Body    = $body;
    echo ($mail->send()) ? 'sent' : 'there is a process problem';
} catch (Exception $e) {
    #return false;
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


exit;




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
    //$mail->AddAddress("y.takourt@lavoieexpress.ma" );

    //$mail->addCC('y.takourt@lavoieexpress.ma');
    //$mail->addBCC('m.boussalham@lavoieexpress.ma');//copie cachée

    $body = "</pre>
<div>";

    switch ($_GET['type']) {
        case 0: // BL
            $mail->Subject = "Test for BL ";
            $body = $body . " Test message BL ";
            $body = $body . '<br> <br> <p><a href="http://www.lavoieexpress.com"><img src="http://lavoieexpress.com/images/logo-lavoieexpress.png" alt="" width="286" height="94"></a></p><br>
Service Exploitation ';

            break;
        case 1: //avarie

            $mail->Subject = "test for avarie ";
            $body = $body . " Test message avarie ";
            $body = $body . '<br> <br> <p><a href="http://www.lavoieexpress.com"><img src="http://lavoieexpress.com/images/logo-lavoieexpress.png" alt="" width="286" height="94"></a></p><br>
Service SAV ';
            break;
        case 2: //magasin fermé

            $mail->Subject = "test for magasin fermé ";

            $body = $body . " Test message magasin fermé ";
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


    $date = date('Y') . "m" . date('m');

    $tab_img = explode(",", $_GET['img']);

    foreach ($tab_img as $img) {
        choppe_image("http://46.18.132.236:8089/upload_mobile_BL/" . $date . "/" . $_GET['path'] . "/" . $img, $img);
        #echo $img."<br>";
        $mail->AddAttachment($img);
    }

    #$mail->AddAttachment($_GET['img']);



    if (!$mail->Send()) {
        echo "Erreur à l'envois du message";
        exit;
    }
    foreach ($tab_img as $img) {
        unlink($img);
    }

    echo "Le message a été bien envoyé";
} catch (Exception $e) {
    echo 'Message could not be sent.';
}
