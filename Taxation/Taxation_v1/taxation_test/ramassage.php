<?php
include_once ("classes/conftaxDB.php");
include_once ("classes/fetchclas.php");
if (!isset($_SESSION)) {
  session_start();
}
$nums = $_POST['idss'];

$dateram = date('Y-m-d',strtotime(date($_POST['datera'])));
$iduser = $_SESSION['user_id'];
$rand = rand(1,500000);
if ($declarations->carnetEncours($iduser)==='nouv') {
  $createcarnet = "INSERT INTO `ramasse`(`dateramassage`, `user_id`,`code_ramassage`) VALUES ('$dateram',$iduser,'$rand')";
  $conn->query($createcarnet);
      $lasts= $conn->query("SELECT * from `ramasse` ORDER BY `numeroCarnet` desc LIMIT 1");
      foreach ($lasts as $value) {
        $last_id = $value['numeroCarnet'];
        }
}else {
  $last_id = $declarations->carnetEncours($iduser);
}
    foreach ($nums as $key) {
      #echo ("INSERT INTO `panierramasse`(`numeroCarnet`,`declaration`) VALUES ($last_id,'$key')");
      $conn->query("INSERT INTO `panierramasse`(`numeroCarnet`,`declaration`) VALUES ($last_id,'$key')");
    }
      #header('location: declaration.php');
 ?>
