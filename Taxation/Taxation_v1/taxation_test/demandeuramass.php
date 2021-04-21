<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once('txheads.php');

 ?>
 <div class="container-fluid">
   <div class="row">
     <div class="col-12">
       <table class="table table-striped table-bordered">
         <tr>
           <td>Clients</td>
           <td>Code de ramassage</td>
         </tr>
         <?php foreach ($clients->listeUser() as $utilisateur): ?>
           <tr>
             <td><?=$utilisateur['NOM']; ?></td>
             <td><?php
             $code = $declarations->coderamassageEncours($utilisateur['CLIENT_ID']);
             if ($code!=0) {
               echo $code;
             }else {
              echo "Pas de demande de ramassage";
             }


              ?></td>
           </tr>
         <?php endforeach; ?>
       </table>
       <div class="text-center">
         <button type="submit" onclick="refreshPage()" class="btn btn-success btn-lg" name="button"><i class="fas fa-sync"></i> Actualiser</button>
       </div>
    </div>
   </div>
 </div>
<script type="text/javascript">
function refreshPage(){
  window.location.reload();
}
</script>
