<?php
require_once("txheads.php");
if ($clients->siconnecte($_SESSION['user_id'])==='de') {
header('location:deco.php');
}
 ?>
