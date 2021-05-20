<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
if (!isset($_SESSION))
  session_start();
require_once('../gestion/classes/fetchclas.php');
#require_once('gestion/classes/conftaxDB.php');
?>
<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
<link rel="stylesheet" href="assets/styles/FAall.min.css">
<link href="https://fonts.googleapis.com/css?family=Amiri|Montserrat|Nunito|Open+Sans|Raleway&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/styles/style.css" />
<link rel="stylesheet" href="assets/styles/mstyle.css">
<link rel="stylesheet" href="assets/styles/mystyle.css">
<link rel="stylesheet" href="assets/styles/jquery.dataTables.min.css">
</style>
<link rel="stylesheet" href="assets/styles/jquery-ui.css">

<script src="assets/scripts/vue.min.js" charset="utf-8"></script>
<script src="assets/scripts/axios.js" charset="utf-8"></script>
<script src="assets/scripts/jquery.js" charset="utf-8"></script>
<script src="assets/scripts/jquery-ui.min.js"></script>
<script src="assets/scripts/FAall.min.js" charset="utf-8"></script>
<script src="assets/scripts/vue.min.js" charset="utf-8"></script>
<script type="text/javascript" src="assets/scripts/jquery.dataTables.min.js"></script>
<script src="assets/scripts/bootstrap.min.js" charset="utf-8"></script>
<script src="assets/scripts/sweetalert2.all.min.js" charset="utf-8"></script>
<script type="text/javascript" src="assets/scripts/adm.js"></script>