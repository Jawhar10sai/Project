<?php
#Etat des carnets de ramassage et création d'un nouveau.
include_once "classes/conftaxDB.php";
include_once "control_utilisateur.php";
$nums = $_POST['idss'];
$dateram = date('Y-m-d',strtotime(date($_POST['datera'])));
$iduser = $_SESSION['user_id'];
$rand = rand(1,500000);
if ($client_lve->carnetEncours()==='nouv') {
  $createcarnet = "INSERT INTO `ramasse`(`dateramassage`, `user_id`,`code_ramassage`) VALUES ('$dateram',$iduser,'$rand')";
  $conn->query($createcarnet);
      $lasts= $conn->query("SELECT * from `ramasse` ORDER BY `numeroCarnet` desc LIMIT 1");
      foreach ($lasts as $value) {
        $last_id = $value['numeroCarnet'];
        }
}else {
  $last_id = $client_lve->carnetEncours();
}
    foreach ($nums as $key) {
      $conn->query("INSERT INTO `panierramasse`(`numeroCarnet`,`declaration`) VALUES ($last_id,'$key')");
    }
 ?>
