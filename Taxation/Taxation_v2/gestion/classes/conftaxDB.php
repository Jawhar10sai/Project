<?php
$taxserver = 'localhost';
$taxuser = 'root';
$taxpassword ='';
$taxabase = 'taxation';
$GLOBALS['conn'] = new mysqli($taxserver,$taxuser,$taxpassword,$taxabase) or die(mysqli_error($GLOBALS['conn']));
 ?>
