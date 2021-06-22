<?php 
error_reporting(E_ERROR | E_PARSE);
#ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
<link rel="stylesheet" href="assets/styles/FAall.min.css">
<link rel="stylesheet" href="assets/styles/mystyle.css">
<link rel="stylesheet" type="text/css" href="assets/styles/datatables.min.css"/>
<!--****************************************************************-->
<script type="text/javascript" src="assets/scripts/datatables.min.js"></script>
<script src="assets/scripts/jquery.js" charset="utf-8"></script>
<script src="assets/scripts/Chart.bundle.min.js" charset="utf-8"></script>
<script src="assets/scripts/FAall.min.js" charset="utf-8"></script>
<script src="assets/scripts/bootstrap.min.js" charset="utf-8"></script>
<!--################################_MODAL_##############################################-->
<div class="modal" id="loading" tabindex="-1" role="dialog" style="top:15%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="assets/images/gif-red-loading-3.gif" class="ml-5" alt="" height="300">
      </div>
    </div>
  </div>
</div>
<!--################################_FIN DU MODAL_##############################################-->
<?php
function MoisActuel(){
switch (date('m')) {
  case 1:
     return 'Janvier';
  case 2:
     return 'Février';
  case 3:
     return 'Mars';
  case 4:
     return 'Avril';
  case 5:
     return 'Mai';
  case 6:
     return 'Juin';
  case 7:
     return 'Juillet';
  case 8:
     return 'Aout';
  case 9:
     return 'Septembre';
  case 10:
      return 'Octobre';
  case 11:
      return 'Novembre';
  case 12:
      return 'Dècembre';
}
}
?>