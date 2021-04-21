<?php
session_start();
include_once "styles.php";
include_once "scripts.php";
 ?>
 <style media="screen">
 p h6{
   font-family: 'Source Sans Pro' ;
   font-size: 25px;
 }
   body{
     background-color: #fff;
   }
   .container{
    top: 35%;
    position: fixed;
    left: 0;
    bottom: 0;
    right: 0;
   }
 </style>
<div class="container">
  <?php
  if (isset($_SESSION['typage'])) {
   if ($_SESSION['typage']=="DP"){ ?>
    <div class="alert alert-warning mesalert">
      <p>
        <h6>DP</h6>
        <h6 class="text-center">Vous avez déjà passé cet questionnaire!</h6>
      </p>
    </div>
  <?php }elseif ($_SESSION['typage']=="CL") {
    ?>
    <div class="alert alert-danger mesalert">
      <p>
        <h6>Questionnaire clôturé</h6>
        <h6 class="text-center">Cet questionnaire a été côtuté!</h6>
      </p>
    </div>
    <?php
  }else {
  ?>
  <div class="alert alert-danger mesalert">
    <p>
      <h6>404</h6>
      <h6 class="text-center">Page Introuvable!</h6>
    </p>
  </div>
  <?php
  }
}else {
  ?>
  <div class="alert alert-danger mesalert">
    <p>
      <h6>404</h6>
      <h6 class="text-center">Page Introuvable!</h6>
    </p>
  </div>
  <?php
}?>
</div>
