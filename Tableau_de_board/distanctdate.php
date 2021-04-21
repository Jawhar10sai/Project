<?php
for ($i=0; $i <=date('t') ; $i++) {

$mounth = date('m');
$year = date('Y');
$date = $year."-".$mounth."-".$i;
$connection->query("INSERT INTO `distinctdate` VALUES ($i,$mounth,$year,'$date')");
}

 ?>
