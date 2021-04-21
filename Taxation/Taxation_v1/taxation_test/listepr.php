<?php
session_start();
require_once("classes/conftaxDB.php");
require_once("classes/fetchclas.php");
if ($_REQUEST['idvil']) {
   $idvil = strip_tags($_POST['idvil']);

   $resreqs = $conn->query("SELECT * FROM `points_relais` WHERE `id_ville`=".$idvil);
   $rowCount = $resreqs->num_rows;
   ?>
   <label for="">Ville points relais:&nbsp;&nbsp;&nbsp;&nbsp; <?=$villes->IDVille($idvil);?></label><br>
    <label for="">Nom PR:</label>
   <select class="form-control" name="nmpr">
     <option value=""></option>
   <?php
   if($rowCount > 0){
     while ($json = $resreqs->fetch_assoc()) {
       ?>
       <option value="<?=$json['id_pr'];?>"><?=$json['lib_pr'];?></option>
       <?php
     }
     }
?>
</select>
<?php
 }
 ?>
