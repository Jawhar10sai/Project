<?php
$conn = new mysqli('localhost','root','','test');
  $conn->query("TRUNCATE `distinctdate`");
$m = date('m');
$a  = date('Y');
for ($i=1; $i <= date('t') ; $i++) {
  $dateedition =$a.'-'.$m.'-'.sprintf("%02d", $i);
  $conn->query("INSERT INTO `distinctdate`VALUES ($i,$m,$a,'$dateedition')");
}
echo "<script>window.close();</script>";

 ?>
