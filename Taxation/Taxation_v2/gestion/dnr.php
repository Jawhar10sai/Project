<?php
#declarations non ramassées.
include_once "control_utilisateur.php";
?>
<?php if (!empty($client_lve->MesDNR())) {
  foreach ($client_lve->MesDNR() as $row_list_dec) {
    $declarations->TrouverDeclaration($row_list_dec['numero']);
    $adresses->TrouverAdresse($row_list_dec['id_adres']);
    $sous_client->TrouverClient($row_list_dec['client2_id']);
    #Tester si c'est express ou bien simple
    $expr = ($declarations->express == "X") ? "Oui" : "Non";
    #Tester le type de liraison
    $livr  = ($declarations->livraison == "D") ? "À domicile" : ($declarations->livraison == "p" ? "Points relais" : "En gare");
    #Tester le type de courrier
    $typcr = ($declarations->courrier_typ == "M") ? "Messagerie" : ($declarations->courrier_typ == "25" ? "Affrêtement 25T" : ($declarations->courrier_typ == "14" ? "Affrêtement 14T" : ($declarations->courrier_typ == "5" ? "Affrêtement 5T" : "Affrêtement utilitaires")));
    #Tester le type de port
    $prt = ($declarations->port == "P") ? "Payé" : "Du";
?>
    <tr class="text-center">
      <td> <input type="checkbox" name="numexramassage" class="numexramassage" value="<?= $row_list_dec['numero']; ?>"> </td>
      <td><?= $row_list_dec['numero']; ?></td>
      <td><?= date('d/m/Y', strtotime($declarations->date)); ?></td>
      <td><?= $declarations->colis; ?></td>
      <td><?= strtoupper($sous_client->NOM); ?></td>
      <td><?= ucfirst($adresses->adresse); ?></td>
      <td><?= $declarations->BL; ?></td>
      <td>
        <div class="dropleft">
          <button type="button" class="btn btn-details" id="drop<?= $declarations->numero; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-h"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="drop<?= $declarations->numero; ?>">
            <a style="color: #0099ff;" class="dropdown-item" id="modifier" data-toggle="modal" data-target="#modmodal-<?= $declarations->numero; ?>">
              <span><i class="fas fa-edit"></i></span> Modifier la déclaration
            </a>
            <a style="color: #c60101;" class="dropdown-item" id="supprimer" data-toggle="modal" data-target="#supmodal-<?= $declarations->numero; ?>">
              <span><i class="fas fa-trash"></i></span> Supprimer la déclaration
            </a>
          </div>
        </div>

        <!--########################  Modal de modification ##############################-->

        <div class="modal modmodal " tabindex="-1" role="dialog" id="modmodal-<?= $declarations->numero; ?>">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modifier la declaration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="background-color: red;
                                                                  color: #fff;
                                                                  border-radius: 50%;
                                                                  padding: 0px 10px 7px 10px;">&times;</span>
                </button>
              </div>
              <form autocomplete="off" method="post" action="Modification">
                <div class="modal-body" style="max-height:78vh;overflow:auto;">
                  <input type="hidden" name="mnumero" id="mnumero" value="<?= $declarations->numero; ?>">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="date2" class="col-form-label">Date</label>
                      <input class="form-control" type="date" name="mdate" value="<?= $declarations->date; ?>" id="mdate2">
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      Destinataire
                    </div>
                    <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-12">
                          <label for="client" class="col-form-label">Code client</label>
                          <input type="text" id="mclient" class="form-control" name="mclient" value="<?= $sous_client->CLIENT_COD; ?>">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mmodnom">Nom</label>
                          <input type="text" id="mmodnom" class="form-control" name="mmodnom" value="<?= $sous_client->NOM; ?>">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mmodpre">Prenom</label>
                          <input type="text" id="mmodpre" class="form-control" name="mmodprenom" value="<?= $sous_client->PRENOM; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="mmodadr">Adresse</label>
                        <input type="text" id="mmodadr" class="form-control" name="mmodadresse" value="<?= $adresses->adresse; ?>">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mmodvil">Ville</label>
                          <input type="text" id="mmodvil" class="form-control" name="mmodville" value="<?= $villes->VILLE_LIB; ?>">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mmodtel">Telephone</label>
                          <input type="text" id="mmodtel" class="form-control nombres" name="mmodtelephone" value="<?= $sous_client->telephone; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      Livraison
                    </div>
                    <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mcolis" class="col-4 col-form-label">Colis:</label>
                          <input class="form-control" type="number" min="0" step="1" name="mcolis" id="mcolis" value="<?= $declarations->colis; ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="mpoids" class="col-4 col-form-label">Poids:</label>
                          <input class="form-control chiffres" type="text" min="0" name="mpoids" id="mpoids" value="<?= $declarations->poids; ?>">
                        </div>
                      </div>
                      <div class="form-row">
                        <fieldset class="form-group  col-md-4 col-xs-12">
                          <?php if ($declarations->livraison == "G") {
                            $gchecked = "checked";
                            $pchecked = "";
                            $dchecked = "";
                          } elseif ($declarations->livraison == "P") {
                            $pchecked = "checked";
                            $gchecked = "";
                            $dchecked = "";
                          } else {
                            $dchecked = "checked";
                            $gchecked = "";
                            $pchecked = "";
                          }
                          ?>
                          <legend>Livraison</legend>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input livr" name="mlivraison" id="mG" value="G" <?= $gchecked; ?>>
                              En gare
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input livr" name="mlivraison" id="mD" value="D" <?= $dchecked; ?>>
                              à domicile
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input livr" disabled name="livraison" id="Pr" value="p" <?= $pchecked; ?>>
                              Points relais
                            </label>
                          </div>
                        </fieldset>
                        <fieldset class="form-group  col-md-2 col-xs-12">
                          <legend>Port</legend>
                          <?php if ($declarations->port == "P") {
                            $pochecked = "checked";
                            $duchecked = "";
                          } else {
                            $duchecked = "checked";
                            $pochecked = "";
                          }
                          ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input pay" name="mport" id="mP" value="P" <?= $pochecked; ?>>
                              Payé
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input pay" name="mport" id="mD" value="D" <?= $duchecked; ?>>
                              Dû
                            </label>
                          </div>
                        </fieldset>
                        <fieldset class="form-group col-md-6 col-xs-12">
                          <?php
                          if ($declarations->nature == "Normal") {
                            $norchecked = "checked";
                            $fragchecked = "";
                            $trgchecked = "";
                          } elseif ($declarations->nature == "Fragile") {
                            $fragchecked = "checked";
                            $norchecked = "";
                            $trgchecked = "";
                          } else {
                            $trgchecked = "checked";
                            $fragchecked = "";
                            $norchecked = "";
                          }
                          ?>
                          <legend>Nature marchandises :</legend>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input natu" name="mnature" id="mNormal" value="Normal" <?= $norchecked; ?>>
                              Normal
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input natu" name="mnature" id="mFragile" value="Fragile" <?= $fragchecked; ?>>
                              Fragile
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input natu" name="mnature" id="mTrès fragile" value="Très fragile" <?= $trgchecked; ?>>
                              Très fragile
                            </label>
                          </div>
                        </fieldset>
                      </div>
                      <div class="form-row">
                        <?php
                        $checkedsimple = "";
                        $checkedex = "";
                        $mchecked = "";
                        $lchecked = "";
                        $fretU =  "";
                        $fret5 =  "";
                        $fret14 =  "";
                        $fret25 =  "";
                        if ($declarations->express == "X") {
                          $checkedex = "checked";
                          $mchecked = "checked";
                        } elseif ($declarations->express == "S") {
                          $checkedsimple = "checked";
                          $mchecked = "checked";
                        } else {
                          $checkedsimple = "";
                          $checkedex = "";
                          $lchecked = "checked";
                          switch ($declarations->courrier_typ) {
                            case '25':
                              $fret25 = "checked";
                              break;
                            case '14':
                              $fret14 = "checked";
                              break;
                            case '5':
                              $fret5 = "checked";
                              break;
                            case 'U':
                              $fretU = "checked";
                              break;
                          }
                        }
                        ?>
                        <fieldset class="form-group  col-md-6 col-xs-12">
                          <legend>Produits et service :</legend>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input mtyp" name="mcourrier_typ" id="mM" value="M" <?= $mchecked; ?>>
                              Messagerie
                            </label>
                          </div>
                          <div class="mmess" style="border: 1px solid black;
                                                                     border-radius:5px;
                                                                     padding-left:15px;">
                            <fieldset class="form-group col-md-6 col-xs-12">
                              <div class="col-12">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="S" name="mtypliv" id="simple" <?= $checkedsimple; ?>>Simple
                                  </label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="X" name="mtypliv" id="express" <?= $checkedex; ?>>Express
                                  </label>
                                </div>
                              </div>
                            </fieldset>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input mtyp" name="mcourrier_typ" id="maffrtmnt" value="L" <?= $lchecked; ?>>
                              Affrêtement
                            </label>
                          </div>
                          <div class="maffret">
                            <div class="maff" style="border: 1px solid black;
                                                    border-radius:5px;
                                                    padding-left:15px;">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input affrt" name="affrettyp" id="25" value="25" <?= $fret25; ?>>
                                  25t
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input affrt" name="affrettyp" id="14" value="14" <?= $fret14; ?>>
                                  14t
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input affrt" name="affrettyp" id="5" value="5" <?= $fret5; ?>>
                                  5t
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input affrt" name="affrettyp" id="U" value="U" <?= $fretU; ?>>
                                  Utilitaires
                                </label>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      Dimensions
                    </div>
                    <div class="card-body">
                      <h5>Dimensions en (cm)</h5>
                      <div class="form-row">
                        <div class="form-group col-md-4 col-xs-12">
                          <label for="">Longueur</label>
                          <input type="text" class="form-control" name="mlong" value="<?= $declarations->longueur; ?>">
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                          <label for="">Largeur</label>
                          <input type="text" class="form-control" name="mlarg" value="<?= $declarations->largeur; ?>">
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                          <label for="">Hauteur</label>
                          <input type="text" class="form-control" name="mhaut" value="<?= $declarations->hauteur; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      Taxe advaleurime
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="mvaleur" class="col-form-label">Valeur declarée</label>
                        <input class="form-control" type="text" min="0" name="mvaleur" id="mvaleur" value="<?= $declarations->valeur; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      Retour de fonds
                    </div>
                    <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mEspece" class="col-form-label">Especes:</label>
                          <input class="form-control" type="text" min="0" name="mEspece" id="mEspece" value="<?= $declarations->Espece; ?>">

                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mCheque" class="col-form-label">Chèque:</label>
                          <input class="form-control" type="text" min="0" name="mCheque" id="mCheque" value="<?= $declarations->Cheque; ?>">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mTraite" class=" col-form-label">Traite:</label>
                          <input class="form-control" type="text" min="0" name="mTraite" id="mTraite" value="<?= $declarations->Traite; ?>">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                          <label for="mBL" class=" col-form-label">BL:</label>
                          <input class="form-control" type="text" name="mBL" id="mBL" value="<?= $declarations->BL; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      Retour palettes
                    </div>
                    <div class="card-body">
                      <h5>Type de palettes :</h5>
                      <div class="form-row">
                        <div class="form-group col-md-4 col-xs-12">
                          <label for="">800 * 1200</label>
                          <input type="text" name="mpaletteA" class="form-control" value="<?= $declarations->paletteA; ?>">
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                          <label for="">1000 * 1200</label>
                          <input type="text" name="mpaletteB" class="form-control" value="<?= $declarations->paletteB; ?>">
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                          <label for="">1200 * 1200</label>
                          <input type="text" name="mpaletteC" class="form-control" value="<?= $declarations->paletteC; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-lve btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
                  <button type="submit" class="btn btn-lve btn-primary" name="modification_declaration"><i class="fas fa-save"></i> Modifier</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--#################################  Fin de modal de modification ################################-->
        <!-- modal suppression-->
        <div class="modal fade" id="supmodal-<?= $declarations->numero; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Declaration N°: <?= $declarations->numero; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="background-color: red;
                                                                    color: #fff;
                                                                    border-radius: 50%;
                                                                    padding: 0px 10px 7px 10px;">&times;</span>
                </button>
              </div>
              <form class="" action="Suppression" method="post">
                <div class="modal-body">
                  <input type="hidden" name="supnumero" value="<?= $declarations->numero; ?>">
                  Voulez vous vraiment supprimer cette déclarations?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-lve" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                  <button type="submit" name="supprimer_declaration" class="btn btn-primary btn-lve"><i class="fa fa-save"></i> Confirmer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- fin modal suppression-->
        <?php #require_once "modal_modification.php";  
        ?>
      </td>
    </tr>
<?php   }
} ?>
<script type="text/javascript">
  if ($('#maffrtmnt').is(":checked")) {
    $('.maffret').show();
    $('.mmess').hide();
  } else {
    $('.maffret').hide();
    $('.mmess').show();
  }
  $('.mtyp').on('change', function() {
    if ($('#maffrtmnt').is(":checked")) {
      $('.maffret').show();
      $('.mmess').hide();
      $('.mtypliv').prop("checked", false);
    } else {
      $('.maffret').hide();
      $('.mmess').show();
    }
  });

  //Traitement sur la valeur
  $("#mvaleur").on('keyup', function(e) {
    var self = $(this);
    var colisval = $('#mcolis').val();
    if (self.val() >= (parseInt(colisval) * 10000)) {
      alert("la valeur ne doit pas être >" + (parseInt(colisval) * 10000));
      self.val('');
      e.preventDefault();
    }
  });
</script>