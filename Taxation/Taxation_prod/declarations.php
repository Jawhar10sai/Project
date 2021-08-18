<?php
require_once "txheads.php";
#if ($client_lve->CLIENT_COD =='15038' || $client_lve->CLIENT_COD =='362' || $client_lve->CLIENT_COD=='9588' || $client_lve->CLIENT_COD=='9616' || $client_lve->CLIENT_COD=='14235' || $client_lve->CLIENT_COD =='15141')
#echo "<script>history.go(-1);</script>";
$declaration = "active";
require_once "includes/lve_navbar.php";
?>
<title>LVE - Déclarations</title>

<div class="container-fluid lve-content">
  <div class="form-dec">
    <?php require_once "includes/lve_declaration_form.php"; ?>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <label class="col-11">
            <h4> <b>Liste des déclarations non-ramassées</b> </h4>
          </label>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <form class="maform" method="post">
                <div class="form-group">
                  <label for="">Date de ramassage</label>
                  <input type="date" class="form-control" id="datram" name="" value="<?= date('Y-m-d'); ?>">
                </div>
                <button type="submit" class="btn btn-success btn-lve" id="ramass">Créer le carnet de ramassage</button>
              </form>

            </div>
            <div class="col-8" style="margin-bottom:10px;">
              <p class="h4" style="border: 1px solid red;border-radius:5px;padding:10px;">
                <b>Note: </b><br>Avant de créer le carnet de ramassage, il faut d'abord selectionner les déclarations à ajouter au carnet à partir du tableau ci-dessous.
              </p>
            </div>
          </div>
          <div class="form-group" id="mesDNR">

          </div>
        </div>
      </div>
    </div>
    <!--######################################******************* FIN LISTE DES DECLARATIONS ********************#############################################-->
  </div>
</div>
<script src="assets/scripts/declar-form.js" charset="utf-8"></script>
<script type="text/javascript">
  function checkCode() {
    code = $('#codecli').val();
    if (code != "") {
      $.ajax({
        type: 'POST',
        url: 'gestion/infos_client.php',
        data: 'code_client=' + code,
        success: function(res) {
          try {
            $('#mess').hide();
            result = JSON.parse(res);
            $('#nom').val(result.NOM);
            $('#prenom').val(result.PRENOM);
            $('#adresse').val(result.ADRESSE);
            $('#firstval').text(result.VILLE_LIB);
            $('#firstval').val(result.VILLE_COD);
            $('#telephone').val(result.telephone);

          } catch (e) {
            $('#mess').show();
            $('#nom').val("");
            $('#prenom').val("");
            $('#adresse').val("");
            $('#firstval').text("");
            $('#firstval').val("");
            $('#telephone').val("");
          }
        }
      });
    } else {
      $('#mess').hide();
    }
  }

  $(document)
    .ready(function() {
      try {
        $('#codecli').focus();
      } catch (e) {}
      NombredanslePanier();
      getDeclarations();
      afficheaffretement();
      Nomsuggestions();
      emtyNomsuggestions();
    })
    .on('click', '.mtr', function() {
      $('.nom').val($('tr>td:first').text());
      $('#codecli').val($(this).find('td:last').text());
      checkCode();
      $('.segg').fadeOut();
    });
  $('.mainbtn').on('mouseover', function() {
      $(this).css("background-color", "gainsboro");
    })
    .on('mouseleave', function() {
      $(this).css("background-color", "#A9A9A9");
    });
</script>
<?php include_once "includes/lve_footer.php"; ?>