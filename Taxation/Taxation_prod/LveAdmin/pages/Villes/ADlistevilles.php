<?php
require_once '../../../gestion/classes/fetchclas.php';
?>
<table id="mtable" class="table table-bordered table-responsive table-sm table-responsive">
  <thead>
    <td>#</td>
    <td>Ville</td>
    <td>Agence</td>
    <td>Type de la ville</td>
    <td>Delai</td>
    <td>Zone</td>
    <td>Disservies</td>
    <td>Nombre des points relais</td>
    <td>Nombre des clients</td>
    <td>Nombre des déclarations</td>
    <td>Ville départ</td>
    <td>Ville d'arrivée</td>
    <td>Action</td>
  </thead>

  <tbody>
    <?php foreach (Villes::ListeVilles() as $ville) : ?>
      <tr>
        <td><?= $ville->VILLE_COD; ?></td>
        <td><?= ucfirst(strtolower($ville->VILLE_LIB)); ?></td>
        <td><?= Agence::TrouverAgence($ville->AGENCE_COD)->AGENCE_LIB; ?></td>
        <td><?= $ville->VILLE_TYP; ?></td>
        <td><?= $ville->DELAI; ?></td>
        <td><?= $ville->ZONE_COD; ?></td>
        <td><?php
            if ($ville->VILLE_TYP == 1)
              echo "Oui";
            else
              echo "Non";
            ?></td>
        <td><?= print_r($ville->Apointsrelais());
            ?></td>
        <td><?= count($ville->ClientsVille()); ?></td>
        <?php
        $count_dest = 0;
        $count_dep = 0;
        foreach ($ville->ClientsVille() as $client) {
          $count_dep += count($client->MesDeclarations());
        }
        foreach ($ville->AdressesVille() as $adresse) {
          $count_dest += count($adresse->AdresseDeclarations());
        }
        ?>
        <td><?= $count_dest + $count_dep; ?></td>
        <td><?= $count_dep; ?></td>
        <td><?= $count_dest; ?></td>
        <td>
          <div class="dropleft">
            <button type="button" class="btn btn-details" id="drop<?= $ville->VILLE_COD; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="drop<?= $ville->VILLE_COD; ?>">
              <a style="color: #0099ff;" class="dropdown-item" id="modifier" data-toggle="modal" data-target="#mod-<?= $ville->VILLE_COD; ?>">
                <span><i class="fas fa-edit"></i></span> Modifier la ville
              </a>
              <a style="color: #c60101;" class="dropdown-item" id="supprimer" data-toggle="modal" data-target="#supmod-<?= $ville->VILLE_COD; ?>">
                <span><i class="fas fa-trash"></i></span> Supprimer la ville
              </a>
            </div>
          </div>
          <!--#######################################################################################################-->
          <div class="modal modmod" tabindex="-1" role="dialog" id="mod-<?= $ville->VILLE_COD; ?>">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modifier ville</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="" action="gestion/modification.php" method="post">
                    <input type="hidden" name="modidvil" value="<?= $ville->VILLE_COD; ?>">
                    <div class="form-group">
                      <label for="">Ville</label>
                      <input class="form-control" type="text" name="modvill" value="<?= $ville->VILLE_LIB; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Code d'agence</label>
                      <input class="form-control" type="text" name="modcodeag" value="<?= $ville->AGENCE_COD; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Type de la ville</label>
                      <input class="form-control" type="text" name="modtypvil" value="<?= $ville->VILLE_TYP; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Delai</label>
                      <input class="form-control" type="text" name="moddelvil" value="<?= $ville->DELAI; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Code de la zone</label>
                      <input class="form-control" type="text" name="codezone" value="<?= $ville->ZONE_COD; ?>">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary" name="modification_ville">Modifier</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--#######################################################################################################-->
          <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?= $ville->VILLE_COD; ?>">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Supprimer ville</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="" action="gestion/supression.php" method="post">
                    <p>Voulez-vous vraiment supprimer ?</p>
                    <input type="hidden" name="id_ville" value="<?= $ville->VILLE_COD; ?>">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                      <button type="submit" class="btn btn-primary" name="suppression_ville">Oui</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script type="text/javascript">
  $(document).ready(function() {
    $('#mtable').dataTable({
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