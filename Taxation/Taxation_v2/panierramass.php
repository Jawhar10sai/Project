<?php
require_once ('txheads.php');
require_once "gestion/control_utilisateur.php";
if ($client_lve->CLIENT_COD =='15038' || $client_lve->CLIENT_COD =='362' || $client_lve->CLIENT_COD=='9588' || $client_lve->CLIENT_COD=='9616' || $client_lve->CLIENT_COD =='15141')
  echo "<script>history.go(-1);</script>";
$list_dec = $declarations->DeclarARamassees($client_lve->CLIENT_ID);
 ?>
 <title>LVE - Panier</title>
     <!--###################################################################################-->
		<?php include_once "includes/lve_navbar.php"; ?>
     <!--###################################################################################-->
    <body>
      <div class="container-fluid" style="margin-top:80px;background-color:white;">
        <div class="row">
          <div class="col-12">
            <form class="panier-form" autocomplete="off" action="" method="post">
              <table class="table table-striped table-bordered table-responsive col-12">
                <tr>
                  <td >
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox"  class="form-check-input" id="checkAll" >Ramasser
                      </label>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                  <td>Numéro</td>
                  <td>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Colis</td>
                  <td>Valeur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Destinataire</td>
                  <td>Livraison&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Express</td>
                  <td>Port</td>
                  <td>Courrier</td>
                  <td>Nature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Espèces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Chèque&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Traite&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>BL</td>
                  <td>Adresse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                  <?php if (!empty($list_dec)) {
                  foreach ($list_dec as $row_list_dec) {
                    $declarations->TrouverDeclaration($row_list_dec['numero']);
                    $sous_client->TrouverClient($declarations->client2_id);
                    $adresses->TrouverAdresse($declarations->id_adres);
                    #Tester si c'est express ou bien simple
                    $expr = ($declarations->express=="X") ? "Oui" : "Non";
                    #Tester le type de liraison
                    $livr  = ($declarations->livraison == "D") ? "À domicile" : ($declarations->livraison == "p" ? "Points relais" : "En gare");
                    #Tester le type de courrier
                    $typcr = ($declarations->courrier_typ == "M") ? "Messagerie" : ($declarations->courrier_typ == "25" ? "Affrêtement 25T" :($declarations->courrier_typ == "14" ? "Affrêtement 14T" :($declarations->courrier_typ == "5" ? "Affrêtement 5T" : "Affrêtement utilitaires")));
                    #Tester le type de port
                    $prt = ($declarations->port == "P") ? "Payé" : "Du";
                    ?>
                    <tr>
                      <td> <input type="checkbox" class="numexramassage" name="numeros[]" value="<?=$declarations->numero; ?>"> </td>
                      <td><?= $declarations->numero; ?></td>
                      <td><?=$declarations->date; ?></td>
                      <td><?= $declarations->colis; ?></td>
                      <td class="text-right"><?= number_format($declarations->valeur, 2, ',', ' '); ?></td>
                      <td><?= strtoupper($sous_client->NOM); ?></td>
                      <td><?= $livr; ?></td>
                      <td><?= $expr;?></td>
                      <td><?= $prt; ?></td>
                      <td><?= $typcr; ?></td>
                      <td><?= $declarations->nature; ?></td>
                      <td class="text-right"><?= number_format($declarations->Espece, 2, ',', ' '); ?></td>
                      <td class="text-right"><?= number_format($declarations->Cheque, 2, ',', ' '); ?></td>
                      <td class="text-right"><?= number_format($declarations->Traite, 2, ',', ' '); ?></td>
                      <td><?= $declarations->BL; ?></td>
                      <td><?=ucfirst($adresses->adresse);?></td>
                    </tr>
                    <?php
                  }
                }if ($list_dec->num_rows==0) {
                  ?>
                  <tr>
                    <td colspan="16" class="text-center">Pas de demande de ramassage</td>
                  </tr>
                  <?php
                } ?>
              </table>
              <div class="form-row text-center">
                <div class="vdiv col-5">
                  <div class="form-group text-left ">
                    <p>
                      <h6>Veuillez-vous sélectionner les déclarations pour valider le carnet!</h6>
                    </p>
                    <label for="">Code de ramassage:</label>
                    <input type="text" name="codrams" id="coderams" required class="form-control">
                  </div>
                  <div class="text-center">
                    <input type="hidden" name="valider_carnet">
                    <button type="submit" class="btn btn-success  btn-block btn-lve" name="valider">Valider le ramassage</button>
                  </div>
                </div>
                </form>
                <div class="adiv col-5">
                  <div class="form-group text-left">
                    <p>
                      <h6>Annuler l'ensemble des déclarations du carnet de ramassage!</h6>
                    </p>
                    <label for="mmotif">Motif d'annulation:</label>
                    <input type="text" class="form-control" id="mmotif" name="motif">
                  </div>
                  <div class="text-center">
                    <button type="button" id="annuler_carnet" class="btn btn-danger btn-block btn-lve">Annuler la demande de ramassage</button>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
      <script src="assets/scripts/lve-ramass.js" charset="utf-8"></script>
      <?php include_once("includes/lve_footer.php"); ?>
