<?php
require_once('../../gestion/classes/fetchclas.php');
require_once('../../gestion/classes/conftaxDB.php');
 ?>
 <div class="content-title m-x-auto">
<div class="row">
  <h1 class="col-11">Sessions:</h1>
  <div class="col-1" style="margin-top:20px;margin-bottom:5px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="height:40px;">
      <i class="fas fa-plus"></i>
    </button>
  </div>
</div>
   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="gestion/ajout.php" method="post">
          <div class="form-group">
            <label for="">Choix de client</label>
            <select class="form-control" name="code_user">
              <option value=""></option>
              <?php foreach ($client_lve->ListeClients() as $user): ?>
                <option value="<?=$user['CLIENT_ID'];?>"><?=$user['NOM'];?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Nom de session</label>
            <input type="text" class="form-control" name="nom">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary" name="ajout_session">Ajouter</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
 </div>
 <div class="card">
   <div class="card-header">
     Client
   </div>
   <div class="card-body">
     <div class="form-group">
       <label for="">Choix de client</label>
       <select class="form-control idcli" name="">
         <option value=""></option>
         <?php foreach ($client_lve->ListeClients() as $user): ?>
           <option value="<?=$user['CLIENT_ID'];?>"><?=$user['NOM'];?></option>
         <?php endforeach; ?>
       </select>
     </div>
   </div>
 </div>
 <div class="card">
   <div class="card-header">
     Sessions
   </div>
   <div class="card-body">
     <div class="sestable">

     </div>
   </div>
 </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.idcli').on('change',function(){
      var idcli = $(this).val();
      $.ajax({
        url:'pages/users/sestable.php',
        method:'post',
        data:{idcli:idcli},
        success:function(res){
          try {
            //console.log(res);
            $('.sestable').html(res);
          } catch (e) {
            $('.sestable').html('Pas de sessions!');
          }
        }
      });



    });
  });
</script>
