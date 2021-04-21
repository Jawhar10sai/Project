http://lavoieexpress.com/phpmailer/mail.php
<?php
require("PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
// Now you only need to add the necessary stuff
// HTML body
try {
$body = $_POST['body'];
// And the absolute required configurations for sending HTML with attachement
  $mail->setFrom('no-reply@lavoieexpress.ma' );
   foreach ($arr as &$_post['AddAddress']) {
         $mail->AddAddress( $value );
}
if (isset($_post['addCC'])){
//$mail->AddAddress("y.takourt@lavoieexpress.ma" );
    foreach ($arr as &$_post['addCC']) {
        $mail->addCC( $value );
    }
}
/*
foreach ($arr as &$_post['addBCC']) {



    $mail->addBCC( $value );

}*/
                // $mail->addCC('m.boussalham@lavoieexpress.ma',"mohamed BOUSSALHAM");
   //$mail->addBCC('m.boussalham@lavoieexpress.ma',"mohamed BOUSSALHAM");
$mail->Subject = $_post['Subject'];
$mail->MsgHTML($body);
if (isset($_post['AddAttachment'])){
//$mail->AddAttachment("logo.jpg");
foreach ($arr as &$_post['AddAttachment']) {
     $mail->AddAttachment($value);
  }
}
if(!$mail->Send()) {
echo "There was an error sending the message";
exit;
}
echo "Message was sent successfully";

} catch (Exception $e) {
    echo 'Message could not be sent.';
}
