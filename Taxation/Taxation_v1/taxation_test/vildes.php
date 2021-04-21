<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('classes/fetchclas.php');
require_once('classes/conftaxDB.php');
if (isset($_POST['libvil'])) {
  $libvil = $_POST['libvil'];
  $lviles = $conn->query("SELECT * FROM `ville` WHERE `VILLE_TYP`='1' AND `VILLE_LIB` LIKE '$libvil%'");
  $class = "col-12";
}else {
  $lviles = $villes->listeVille();
  $class = "col-3";
}
?>
<div class="col-12">
  <div class="row">
           <?php foreach ($lviles as $navils): ?>

      <label class="h5" style="width:380px;padding-left:15px;"><?=$navils['VILLE_LIB'];?></label>

           <?php endforeach; ?>
    </div>
 </div>
