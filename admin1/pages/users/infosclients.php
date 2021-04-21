<?php
require_once('../../gestion/classes/fetchclas.php');
require_once('../../gestion/classes/conftaxDB.php');
$clientsnombres = $conn->query("SELECT * FROM `clientsnombres` ORDER BY `total_sous_clients` DESC");
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-8">

    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    clientsinfosperso();
  });
</script>
