<?php
#Page de preparation des déclaration pour la page Tracking.php et le fichier excel_tracking.json
include_once "control_utilisateur.php";

$_POST['date1'] = (isset($_POST['date1']) ? $_POST['date1'] : '');
$_POST['date2'] = (isset($_POST['date2']) ? $_POST['date2'] : '');
$_POST['type_dec'] = (isset($_POST['type_dec']) ? $_POST['type_dec'] : '');
$_POST['type_courrier'] = (isset($_POST['type_courrier']) ? $_POST['type_courrier'] : '');
$result = $client_lve->EtatMesExpeditions($_POST['date1'], $_POST['date2'], $_POST['type_courrier'], $_POST['type_dec']);
$statistique = $client_lve->MonCourrierToJson($result);
?>
<h4 class="mb-2 text-center">Nombre des déclarations: <?= count($result); ?></h4>
<h5 style="color:#4ABB00;" class="mb-2 text-center">Livrée: <?= $statistique['dec_liv'] . '/ ' . count($result); ?></h5>
<h5 style="color:#E87400;" class="mb-2 text-center">En cours: <?= $statistique['dec_ret'] . '/ ' . count($result); ?></h5>
<h5 style="color:#E82300;" class="mb-2 text-center">Retournée: <?= $statistique['dec_enc'] . '/ ' . count($result); ?></h5>
<table class="table table-bordered col-12 tracktable table-striped" id="tracktable">
  <thead>
    <tr>
      <th class="text-center h6" width="100">Déclaration</th>
      <th class="text-center h6">Date d'expedition</th>
      <th class="text-center h6">Date de livraison</th>
      <?php if ($client_lve->CLIENT_COD == 9588) : ?>
        <th class="text-center h6">Date prévue de livraison</th>
      <?php endif; ?>
      <th class="text-center h6">Statut de livraison</th>
      <th class="text-center h6">Motifs</th>
      <?php if ($client_lve->CLIENT_COD == 15038) : ?>
        <th class="text-center h6">Code detaillant</th>
      <?php endif; ?>
      <?php if ($client_lve->CLIENT_COD == 9588) : ?>
        <th class="text-center h6">Retailer</th>
      <?php endif; ?>
      <th class="text-center h6">Destinataire</th>
      <?php if ($client_lve->CLIENT_COD == 362) : ?>
        <th class="text-center h6">colis</th>
        <th class="text-center h6">Poids</th>
      <?php endif; ?>
      <?php if ($client_lve->CLIENT_COD == 15038) { ?>
        <th class="text-center h6">Ville</th>
      <?php } else { ?>
        <th class="text-center h6">Adresse</th>
      <?php } ?>
      <?php if ($client_lve->CLIENT_COD == 9588) : ?>
        <th class="text-center h6">City</th>
        <th class="text-center h6">ILOT</th>
      <?php endif; ?>
      <th class="text-center h6">Documents</th>
    </tr>
  </thead>
  <?php if (count($result) > 0) {   ?>
    <?php foreach ($result  as $value) : ?>
      <tr>
        <td><?= $value->Numero; ?></td>
        <td><?= date("d/m/Y", strtotime($value->Date)); ?></td>
        <td><?= (utf8_encode($value->statut_suivis) === "Livrée") ? date("d/m/Y H:i", strtotime($value->date_livraison)) : " "; ?></td>
        <?php if ($client_lve->CLIENT_COD == 9588) : ?>
          <td>
            <?= (utf8_encode($value->statut) != 'Livrée') ? date('d/m/Y', strtotime($value->Date . ' +' . $villes->DELAI . ' day')) : ''; ?>
          </td>
        <?php endif; ?>
        <?php
        switch (utf8_encode($value->statut_suivis)) {
          case 'Livrée':
            $btncolor = 'green';
            break;
          case 'Livrée':
            $btncolor = 'orange';
            break;
          case 'En saisie':
          case 'En preparation':
          case 'Préparée':
            $btncolor = '';
            break;
          default:
            $btncolor = 'orange';
            break;
        }
        ?>

        <td style="background-color:<?= $btncolor; ?>;cursor: hand;color:#3f3f3f; " class="text-center">
          <a style="color: <?= $btncolor; ?>;" class="dropdown-item" id="supprimer" data-toggle="modal" data-target="#trackmodal<?= trim($value->Numero); ?>">
            <div class="row">
              <div class="col-8">
                <?php
                $conditions = array('En saisie', 'En preparation', 'Préparée', 'Livrée', 'Retournée');
                if (in_array(utf8_encode($value->statut_suivis), $conditions))
                  echo utf8_encode($value->statut_suivis);
                else
                  echo 'En cours';
                ?>
              </div>
              <div class="col-2">
                <?php /*
              <button type="button" data-toggle="modal" data-target="#trackmodal<?= trim($value->Numero); ?>" style="padding: 8;border-radius:50%;color:<?= $btncolor; ?>" class="btn btn-outline-info btn-sm">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
              </button>
              <?php #require "track_state.php"; 
              */
                ?>
              </div>
            </div>
          </a>
        </td>
        <td><?= (utf8_encode($value->statut_suivis) === "Livrée") ? "" : utf8_encode($value->Motif); ?>
          <?php
          if ($client_lve->CLIENT_COD == 15038 || $client_lve->CLIENT_COD == 9588) {
            $ndset = explode(' - ', $value->destinataire);
            if (!isset($ndset[1])) {
              $ndset[1] = $ndset[0];
              $ndset[0] = "";
            }
          ?>
        <td><?= $ndset[0]; ?></td>
      <?php $destinataire = $ndset[1];
          } else
            $destinataire = $value->destinataire;
      ?>
      <td><?= utf8_encode($destinataire); ?></td>
      <?php if ($client_lve->CLIENT_COD == 362) : ?>
        <td><?= $value->Colis; ?></td>
        <td><?= $value->Poids; ?></td>
      <?php endif; ?>
      <?php if ($client_lve->CLIENT_COD == 15038) { ?>
        <td><?= utf8_encode($value->Ville2); ?></td>
      <?php } else { ?>
        <td><?= utf8_encode($value->adresse2); ?></td>
      <?php } ?></td>
      <?php if ($client_lve->CLIENT_COD == 9588) : ?>
        <td><?= utf8_encode($value->Ville2); ?></td>
        <td><?= $value->num; ?></td>
      <?php endif; ?>
      <td class="text-center">

        <div class="dropleft">
          <button type="button" class="btn btn-details" id="drop<?= trim($value->Numero); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-h"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="drop<?= trim($value->Numero); ?>">
            <a style="color: #0099ff;" class="dropdown-item" id="modifier" data-toggle="modal" data-target="#contract-<?= trim($value->Numero); ?>">
              <span><i class="fa fa-print" aria-hidden="true"></i></span> Imprimer déclaration
            </a>
            <a style="color: #0099ff;" class="dropdown-item" id="supprimer" data-toggle="modal" data-target="#supmodal-<?= $declarations->numero; ?>">
              <span><i class="fa fa-print" aria-hidden="true"></i></span> Imprimer etiquette
            </a>
            <a style="color: #c60101;" class="dropdown-item" id="supprimer" data-toggle="modal" data-target="#supmodal-<?= $declarations->numero; ?>">
              <span><i class="far fa-images"></i></span> Documents scannés
            </a>
            <a style="color: <?= $btncolor; ?>;" class="dropdown-item" id="supprimer" data-toggle="modal" data-target="#trackmodal<?= trim($value->Numero); ?>">
              <span><i class="fa fa-map-marker" aria-hidden="true"></i></span> Détecter l'emplacement
            </a>
          </div>
        </div>
        <?php require "track_state.php"; ?>


        <?php if (utf8_encode($value->statut_suivis) == 'Livrée') : ?>
          <?php
          $scan = Declarations::GetScanBL($value->courrier_id);
          if ($scan != false) : ?>
            <button style="border-radius: 50%;width: 30px;height: 30px;" class="btn btn-info btn-sm" id="idcontract" data-toggle="modal" data-target=""></button>
          <?php else : ?>
            <button style="border-radius: 50%;width: 30px;height: 30px;" class="btn btn-danger btn-sm disabled"> </button>
          <?php endif; ?>
          <!--#######################################################################################################-->
          <div class="modal contract" tabindex="-1" role="dialog" id="contract-<?= trim($value->Numero); ?>">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="
                    background-color: red;
                    color: #fff;
                    border-radius: 50%;
                    padding: 0px 10px 7px 10px;
                    ">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <?php if (count($scan) > 0) {
                        foreach ($scan as $image) : ?>
                          <?php
                          $active = ($scan[0] == $image) ? "active" : "";
                          ?>
                          <div class="carousel-item <?= $active; ?>">
                            <img class="d-block w-100" src="http://46.18.132.236:8089/upload_mobile_BL/<?= trim($value->courrier_id) . '/' . $image; ?>" alt="" height="600px;" width="400px;">
                          </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if (count($scan) > 1) { ?>
                      <a style="border-radius:50%;background-color:red;width:50px;height:50px;" class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a style="border-radius:50%;background-color:red;width:50px;height:50px;" class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                  <?php
                        }
                      }
                  ?>
                  </div>
                  <div class="modal-footer">
                    <?php /*
                  <a target="_blank" type="button" class="btn btn-success btn-lve" href="http://46.18.132.236:8089/upload_mobile_BL/<?=$value->courrier_id.'/'.$declarations->GetScanBL($value->courrier_id);?>" download >Voir en taille réelle</a>
                */ ?>
                    <button class="btn btn-danger btn-lve" id="rotate-<?= $value->courrier_id; ?>"><i class="fas fa-snowboarding fa-flip-both"></i> Pivoter l'image</button>
                    <button type="button" class="btn btn-danger btn-lve" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php else : ?>
          <?= ""; ?>
        <?php endif; ?>
        <?php if ($client_lve->CLIENT_COD == '15443' && utf8_encode($value->statut_suivis) != 'Livrée') : ?>
          <button type="button" class="btn btn-info btn-sm btn-lve" style="padding: 8px;" name="button" onClick="javascript:window.open('etiquettes_courrier/<?= $value->Numero; ?>','_blank','status=yes,resizable=no,top=0,left=0,width=280,height=130');">
            <i class="fa fa-print" aria-hidden="true"></i> Etiquettes
          </button>
        <?php endif; ?>

      </td>
      </tr>
    <?php endforeach; ?>
    <?php
  } else {
    switch ($client_lve->CLIENT_COD) {
      case '9588':
      case '15038':
    ?>
        <tr>
          <td class="text-center" colspan="11">Pas d'expéditions pour le moment</td>
        </tr>
      <?php
        break;
      default:
      ?>
        <tr>
          <td class="text-center" colspan="10">Pas d'expéditions pour le moment</td>
        </tr>
  <?php
        break;
    }
  }
  ?>
</table>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tracktable').dataTable({
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