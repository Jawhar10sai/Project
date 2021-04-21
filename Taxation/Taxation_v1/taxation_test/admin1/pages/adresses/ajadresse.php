<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');
?>
             <div class="content-title m-x-auto">
               <h1>Adresses:</h1>
             </div>
             <div class="row">
              <div class="col-md-12">
                 <form class="" action="gestion/ajout.php" method="post">
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
                     <button type="submit" class="btn btn-lg btn-primary" name="ajout_adresse">Ajouter l'adresse</button>
                   </div>
                 </form>
               </div>
             </div>
