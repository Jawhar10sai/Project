<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('classes/fetchclas.php');
require_once('classes/conftaxDB.php');
$_SESSION['countcart']= $declarations->ARamassees($_SESSION['user_id']);
 ?>
<link rel="shortcut icon" type="image/x-icon" href="images/LOGOSANS.jpg" />
<link rel="stylesheet" href="assets/bootstrap.min.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="assets/mstyle.css">
<script type="text/javascript" src="assets/jquery.min.js"></script>
<script type="text/javascript" src="assets/vue.min.js"></script>
<script type="text/javascript" src="assets/popper.min.js"></script>
<script type="text/javascript" src="assets/tether.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/tax.js"></script>
