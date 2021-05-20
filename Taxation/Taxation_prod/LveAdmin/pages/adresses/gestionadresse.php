<?php
#require_once("adheads.php");
 if (isset($_POST['ajouter'])) {
$lib = $_POST['lib'];
$idcli = $_POST['idcli'];
$util = $_POST['util'];
$vill = $_POST['vill'];
$adresses->AjouterAdresse($idcli,$lib,$util,$vill);
echo "<script>alert('Bien ajoutée!');</script>";
header('location: index.php?p=ADAdresses');
 }
 if (isset($_POST['modifi'])) {
  $modida = $_POST['modidadd'];
  $modlib = $_POST['modlib'];
  $moduti = $_POST['modutil'];
  $modcli = $_POST['modidcli'];
  $modvil = $_POST['modvill'];
   $adresses->ModifierAdresse($modida,$modcli,$modlib,$moduti,$modvil);
   echo "<script>alert('Bien modifiée!');</script>";
   header('location: index.php?p=ADAdresses');
 }
 ?>
             <div class="content-title m-x-auto">
               <h1>Adresses:</h1>
             </div>
             <div class="row">
              <div class="col-md-3">
                 <form class="" action="index.php?p=ADAdresses" method="post">

                     <div class="form-group">
                       <label for="">Adresse</label>
                       <input class="form-control form-control-sm" type="text" name="lib" value="">
                     </div>
                     <div class="form-group">
                       <label for="">Utilisateur</label>
                       <select class="form-control form-control-sm" name="util">
                         <option value=""></option>
                         <?php foreach ($clients->listeUser() as $usr): ?>
                           <option value="<?=$usr['CLIENT_ID'];?>"><?=$usr['NOM'];?></option>
                         <?php endforeach; ?>
                       </select>
                     </div>
                     <div class="form-group">
                       <label for="">Client</label>
                       <select class="form-control form-control-sm" name="idcli">
                         <option value=""></option>
                         <?php foreach ($clients->listeClients() as $clis): ?>
                           <option value="<?=$clis['CLIENT_ID'];?>"><?=$clis['NOM'];?></option>
                         <?php endforeach; ?>
                       </select>
                     </div>
                     <div class="form-group">
                       <label for="">Ville</label>
                       <select class="form-control form-control-sm" name="vill">
                         <option value=""></option>
                         <?php foreach ($villes->listeVille() as $vil): ?>
                           <option value="<?=$vil['VILLE_COD'];?>"><?=$vil['VILLE_LIB'];?></option>
                         <?php endforeach; ?>
                       </select>
                     </div>
                   <div class="text-center">
                     <button type="submit" class="btn btn-lg btn-primary" name="ajouter">Ajouter l'adresse</button>
                   </div>
                 </form>
               </div>
                   <div class="adrtable">
                   </div>
             </div>
