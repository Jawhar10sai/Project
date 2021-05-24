<?php
require_once '../../../gestion/classes/fetchclas.php';
?>
<div class="content-title m-x-auto">
  <h1>Sous-clients:</h1>
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
        <?php foreach (ClientLve::ListeClients() as $user) : ?>
          <option value="<?= $user->CLIENT_ID; ?>"><?= $user->NOM; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    Sous-clients
  </div>
  <div class="card-body">
    <div class="clitable">

    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.idcli').on('change', function() {
      var idcli = $(this).val();
      $.ajax({
        url: 'pages/users/clitable.php',
        method: 'post',
        data: {
          idcli: idcli
        },
        success: function(res) {
          try {
            //console.log(res);
            $('.clitable').html(res);
          } catch (e) {
            $('.clitable').html('Pas de sessions!');
          }
        }
      });



    });
  });
</script>