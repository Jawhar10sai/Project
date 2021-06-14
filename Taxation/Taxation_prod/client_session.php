<?php
require_once __DIR__ . "/txheads.php";
$messess = 'active';
?>
<title>LVE - Mes sessions</title>
<!--###################################################################################-->
<?php include_once __DIR__ . "/includes/lve_navbar.php"; ?>
<!--###################################################################################-->

<div class="container lve-content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h4>Mes agences</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-10 col-xs-12 tabb">

            </div>
            <div class="col-md-2  col-xs-12">
              <form id="ajout-session" action="" method="post">
                <input type="hidden" name="ajouter_session" value="">
                <div class="form-group">
                  <label for="">Agence:</label>
                  <input type="text" id="lib_session" class="form-control" name="lib_session" value="">
                </div>
                <button type="submit" class="btn btn-success col-12 btn-lve" id="ajoutAG">Ajouter l'agence</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#ajout-session').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
      url: 'gestion/ajout.php',
      method: 'POST',
      data: $('#ajout-session').serialize(),
      beforeSend: function() {
        //console.log(res);
        $('#ajoutAG').prop('disabled', true);
        $('#ajoutAG').html('<img src="images/red-load.gif" height="32"/>');
      },
      success: function() {
        //console.log(res);
        Swal.fire({
          icon: 'success',
          title: 'Session bien ajoutée!'
        });
        $('#ajout-session')[0].reset();
        $.ajax({
          url: 'gestion/mes_session.php',
          success: function(res) {
            $('.tabb').html(res);
          }
        });
        $('#ajoutAG').prop('disabled', false);
        $('#ajoutAG').text("Ajouter l'agence");
      }
    });
  });
  $(document).ready(function() {
    $.ajax({
      url: 'gestion/mes_session.php',
      success: function(res) {
        $('.tabb').html(res);
      }
    });
  });
</script>
<?php include_once "includes/lve_footer.php"; ?>