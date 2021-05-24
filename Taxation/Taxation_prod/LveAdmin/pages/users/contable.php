<?php
require_once '../../../gestion/classes/fetchclas.php';
$iduser = strip_tags($_POST['idcli']);
$client_lve = ClientLve::TrouverClient($iduser);
?>
<h6>Nombre total des connexions: <?= count($client_lve->MesConnexions()); ?></h6>
<table class="table table-striped" id="con-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Client</th>
      <th>Date de connexion</th>
      <th>Date de deconnexion</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($client_lve->MesConnexions()) {
      foreach ($client_lve->MesConnexions() as $key) { ?>
        <tr>
          <td><?= $key->id; ?></td>
          <td><?= $client_lve->NOM; ?></td>
          <td><?= $key->date_connexion; ?></td>
          <td><?= $key->date_deconnexion; ?></td>
        </tr>
      <?php
      }
    } else {
      ?>
      <tr>
        <td colspan="4" class="text-center">Merci de selectionner le client!</td>
      </tr>
    <?php
    } ?>

  </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function() {
    $('#con-table').dataTable({
      "language": {
        "lengthMenu": "Affichage _MENU_ pages",
        "zeroRecords": "Pas d'elements",
        "info": "Affichage de _PAGE_ of _PAGES_",
        "infoEmpty": "Pas d'elements",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "search": "Recherche",
        "paginate": {
          "previous": "Précédent",
          "next": "Suivant"
        }
      }
    });
  });
</script>