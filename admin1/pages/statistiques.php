<?php $clientsnombres = $conn->query("SELECT * FROM `clientsnombres` ORDER BY `total_sous_clients` DESC");  ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 stats-content">
<!-- *********************************** Stats row **************************************** -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="card stat-card">
            <h4>Nombre des clients</h4>
            <h1 class="text-center" style="margin-top:2rem;"><?=ClientLve::Total_Clients();?></h1>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="card stat-card">
            <h4>Nombre des sous-clients</h4>
            <h1 class="text-center" style="margin-top:2rem;"><?=SousClient::Total_Clients();?></h1>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="card stat-card">
            <h4>Nombre des déclarations</h4>
            <h1 class="text-center" style="margin-top:2rem;"><?=Declarations::Total_Declarations();?></h1>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="card stat-card">
            <h4>Nombre des sous-sessions</h4>
            <h1 class="text-center" style="margin-top:2rem;"><?=ClientSession::NombreSession();?></h1>
          </div>
        </div>
      </div>
<!-- *********************************** Graphs row**************************************** -->
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="card graph-card">
            <div class="card-header">
              <h6>Déclarations par agence</h6>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="card graph-card">
            <div class="card-header">
              <h6>Top 5 clients par déclarations</h6>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <tbody>
                  <?php foreach (ClientLve::Top5Client() as $clint): ?>
                    <tr>
                      <td><?=$clint['NOM']; ?></td>
                      <td class="text-center"><?=$clint['nbr_declaration']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="card graph-card">
            <div class="card-header">
              Clients:
            </div>
            <div class="card-body">
              <table class="table table-bordered col-12" id="detclient">
                <thead class="center">
                  <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Nombre des sous-clients</th>
                    <th>Nombre des déclaration</th>
                    <th>Nombre des sessions</th>
                  </tr>
                </thead>
                <?php foreach ($clientsnombres as $clientsnombre): ?>
                  <tr>
                    <td><?=$clientsnombre['CLIENT_ID']; ?></td>
                    <td><?=$clientsnombre['NOM']; ?></td>
                    <td class="text-center"><?=$clientsnombre['total_sous_clients']; ?></td>
                    <td class="text-center"><?=$clientsnombre['total_declars']; ?></td>
                    <td class="text-center"><?=$clientsnombre['total_session']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#detclient').dataTable({
        "language": {
            "lengthMenu": "Affichage _MENU_ pages",
            "zeroRecords": "Pas d'elements",
            "info": "Affichage de _PAGE_ of _PAGES_",
            "infoEmpty": "Pas d'elements",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":"Recherche",
            "paginate": {
                "previous": "Précédent",
                "next": "Suivant"
                }
        }
    } );
});
</script>
<!--
<script type="text/javascript" src="assets/scripts/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#detclient').dataTable({
          "language": {
              "lengthMenu": "Affichage _MENU_ pages",
              "zeroRecords": "Pas d'elements",
              "info": "Affichage de _PAGE_ of _PAGES_",
              "infoEmpty": "Pas d'elements",
              "infoFiltered": "(filtered from _MAX_ total records)",
              "search":"Recherche",
              "paginate": {
                  "previous": "Précédent",
                  "next": "Suivant"
                  }
          }
      } );
  });
</script>
-->
