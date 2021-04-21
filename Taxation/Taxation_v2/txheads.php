<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('gestion/classes/fetchclas.php');
require_once('gestion/classes/conftaxDB.php');
if (isset($_SESSION['user_id'])) {
  $client_lve->TrouverClient($_SESSION['user_id']);
}
#$_SESSION['countcart']= $declarations->ARamassees($_SESSION['user_id']);
?>
<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
<link rel="stylesheet" href="assets/styles/FAall.min.css">
<link href="https://fonts.googleapis.com/css?family=Amiri|Montserrat|Nunito|Open+Sans|Raleway&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/styles/mystyle.css">
<link rel="stylesheet" href="assets/styles/mstyle.css">
<link rel="shortcut icon" type="image/x-icon" href="images/LOGOSANS.png" />
<link rel="stylesheet" href="assets/styles/jquery.dataTables.min.css">
</style>
<link rel="stylesheet" href="assets/styles/jquery-ui.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<!--***************************** Body en footer.php ***********************************-->

<body>
  <script src="assets/scripts/popper.min.js" charset="utf-8"></script>
  <script src="assets/scripts/axios.js" charset="utf-8"></script>
  <script src="assets/scripts/jquery.js" charset="utf-8"></script>
  <script src="assets/scripts/jquery-ui.min.js"></script>
  <script src="assets/scripts/FAall.min.js" charset="utf-8"></script>
  <script src="assets/scripts/vue.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="assets/scripts/jquery.dataTables.min.js"></script>
  <script src="assets/scripts/bootstrap.min.js" charset="utf-8"></script>
  <script src="assets/scripts/sweetalert2.all.min.js" charset="utf-8"></script>