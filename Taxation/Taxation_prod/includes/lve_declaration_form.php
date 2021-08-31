<form id="declaration-form-ajout" autocomplete="off" method="post">
  <div class="row">

    <input type="hidden" name="ajouter_declaration">
    <div class="col-xs-12 col-md-6 col-lg-4">
      <div class="card firstrow">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h5><b> 1) Expéditeur</b></h5>
        </div>
        <div class="card-body" style="background-color: gainsboro;border-radius: 0 0 0.65rem 0.65rem; ">
          <div class="form-row">
            <div class="form-group col-md-6 col-xs-12">
              <label for=""> Code:</label>
              <input type="text" class="form-control form-control-sm" value="<?= $client_lve->CLIENT_COD; ?>" disabled>
            </div>
            <div class="form-group col-md-6 col-xs-12">
              <label for=""> Nom:</label>
              <input type="text" class="form-control form-control-sm" value="<?= utf8_encode($client_lve->NOM); ?>" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-xs-12">
              <label for=""> ICE:</label>
              <input type="text" class="form-control form-control-sm" value="<?= $client_lve->ICE; ?>" disabled>
            </div>
            <div class="form-group col-md-6 col-xs-12">
              <label for=""> Telephone:</label>
              <input type="text" class="form-control form-control-sm" value="<?= $client_lve->telephone; ?>" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-7 col-xs-12">
              <label for=""> Contact:</label>
              <input type="text" class="form-control form-control-sm" value="<?= $client_lve->mail; ?>" disabled>
            </div>
            <div class="form-group col-md-5 col-xs-12">
              <label for=""> Ville:</label>
              <input type="text" class="form-control form-control-sm" value="<?= utf8_encode($client_lve->ville); ?>" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-12">
              <label for=""> Adresse:</label>
              <input type="text" class="form-control form-control-sm" value="<?= utf8_encode($client_lve->adresse); ?>" disabled>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-4">
      <div class="card firstrow">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h5> <b>2) Destinataire</b> </h5>
        </div>
        <div class="card-body">
          <div class="minfoclient">
            <div class="form-row">
              <div class="form-group col-12">
                <label for=""> Code:<span style="color:red;">*</span></label>
                <input type="text" class="form-control form-control-sm" id="codecli" v-model="codee" name="codecli" required>
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6 col-xs-12">
                <label for=""> Nom:<span style="color:red;">*</span></label>
                <input type="text" class="form-control form-control-sm" id="nom" name="nom" required v-model="nom">
                <div class="segg">

                </div>
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <label> Prénom:</label>
                <input type="text" class="form-control form-control-sm" id="prenom" name="prenom" v-model="prenom">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-12">
                <label for=""> Adresse:<span style="color:red;">*</span></label>
                <input type="text" class="form-control form-control-sm" id="adresse" name="adresse" required v-model="adresse">
              </div>
              <div class="form-group col-12" v-if="livr_typ == 'p'">
                <label for="">Mail:<span style="color:red;">*</span></label>
                <input type="text" class="form-control form-control-sm" id="mail_dest" name="mail_dest" required v-model="mail">
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6 col-xs-12">
                <label for=""> Ville:<span style="color:red;">*</span></label>
                <select class="form-control form-control-sm" name="ville" id="ville" required v-model="code_ville">
                  <option value="" id="firstval"></option>
                  <?php foreach (Villes::ListeVilles() as $ville) : ?>
                    <option value="<?= $ville->VILLE_COD; ?>"><?= $ville->VILLE_LIB; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <label for=""> Téléphone:<span style="color:red;">*</span></label>
                <input type="tel" maxlength="10" placeholder="05XXXXXXXX" class="form-control form-control-sm nombres" id="telephone" name="telephone" value="" required v-model="telephone">
              </div>
            </div>

            <div style="width:100%;" v-if="message">
              <label class="form-group col-12 alert alert-warning" role="alert">Client inexistant, veuillez-vous remplir les autres champs!</label>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-4">
      <div class="card firstrow">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h5> <b>3) Livraison</b> </h5>
        </div>
        <div class="card-body">
          <div class="form-row" v-if="livr_typ != 'p'">
            <div class="form-group col-md-6">
              <label for="colis">Nbre colis:<span style="color:red;">*</span></label>
              <input class="form-control form-control-sm nombres" type="number" min="1" step="1" name="colis" id="colis" required>
            </div>
            <div class="form-group col-md-6">
              <label for="poids">Poids:(Kg)<span style="color:red;">*</span></label>
              <input class="form-control form-control-sm text-right chiffres" type="text" min="0" name="poids" id="poids" required>
            </div>
          </div>
          <div class="form-row">
            <fieldset class="form-group col-xs-12 col-md-6 col-lg-8" style="border: 1px solid black;border-radius: 5px;">
              <h5>Livraison</h5>
              <div class="form-row">
                <fieldset class="form-group col-md-6">
                  <h6>Lve :</h6>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input livr" name="livraison" id="D" value="D" checked v-model="livr_typ">
                      À domicile
                    </label>
                  </div>
                  <div class="form-check" id="Gare">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input livr" name="livraison" id="G" value="G" v-model="livr_typ">
                      En gare
                    </label>
                  </div>
                </fieldset>
                <fieldset class="form-group col-md-6">
                  <h6>E-Vex :</h6>
                  <div class="form-check" id="pointR">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input livr" name="livraison" id="Prr" value="p" v-model="livr_typ">
                      Consigne
                    </label>
                  </div>
                  <div class="form-check" id="pointAdbtc">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input livr" name="livraison" id="PrA" value="Ad" v-model="livr_typ">
                      À domicile
                    </label>
                  </div>
                </fieldset>
              </div>
              <div id="showdesti" v-if="livr_typ == 'G'">

              </div>
            </fieldset>
            <fieldset class="form-group col-xs-12 col-md-6 col-lg-4" v-if="livr_typ != 'p'">
              <h5>Port :</h5>
              <div class=" form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input pay" name="port" id="P" value="P" checked>
                  Payé
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input pay" name="port" id="Du" value="D">
                  Dû
                </label>
              </div>
            </fieldset>
          </div>
          <div class="form-row">
            <fieldset class="form-group  col-md-6" v-if="livr_typ != 'p'">
              <h5>Produits et service :</h5>
              <div class=" form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input typ" name="courrier_typ" id="M" value="M" checked>
                  Messagerie
                </label>
              </div>
              <div class="mess" style="border: 1px solid black;
                                                                          border-radius:5px;
                                                                          padding-left:15px;">
                <fieldset class="form-group col-md-6">
                  <div class="col-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="S" name="typliv" id="simple" checked>Simple
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="X" name="typliv" id="express">Express
                      </label>
                    </div>
                  </div>
                </fieldset>
              </div>
              <!--
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input typ" name="courrier_typ" id="affrtmnt" value="L">
                          Affrêtement
                        </label>
                      </div>
                      <div class="affret">
                        <div class="aff" style="border: 1px solid black;
                                                          border-radius:5px;
                                                          padding-left:15px;">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input affrt" name="affrettyp" id="25" value="25" checked>
                              25t
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input affrt" name="affrettyp" id="14" value="14">
                              14t
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input affrt" name="affrettyp" id="5" value="5">
                              5t
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input affrt" name="affrettyp" id="U" value="U">
                              Utilitaires
                            </label>
                          </div>
                        </div>
                      </div>
                          -->
            </fieldset>
            <fieldset class="form-group col-md-6" v-if="livr_typ != 'p'">
              <h5>Nature marchandises :</h5>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input natu" name="nature" id="Normal" value="Normal" checked>
                  Normal
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input natu" name="nature" id="Fragile" value="Fragile">
                  Fragile
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input natu" name="nature" id="Très fragile" value="Très fragile">
                  Très fragile
                </label>
              </div>
            </fieldset>
          </div>
          <div class="form-group col-12" v-if="livr_typ == 'p'">
            <label>Taille de colis:</label>
            <select name="tail_consigne" id="tail_consigne" class="form-control">
              <option value="S">Small (10, 40, 60)cm
              <option value="M">Medium (25, 40, 60)cm
              <option value="L">Large (40, 40, 60)cm
              <option value="XL">XL (55, 40, 60)cm
              <option value="XXL">XXL (70, 40, 60)cm
            </select>
          </div>
          <div class="col-12 text-center" v-if="livr_typ === 'p'">
            <img src="images/logo_evex.JPG" width="400px;">
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-4" v-if="livr_typ != 'p'">
      <div class="card secondrow">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h5><b>4) Dimensions</b> </h5>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="">Longueur (cm)</label>
              <input type="text" class="form-control form-control-sm chiffres" name="long" id="long" value="">
            </div>
            <div class="form-group col-md-4">
              <label for="">Largeur (cm)</label>
              <input type="text" class="form-control form-control-sm chiffres" name="larg" id="larg" value="">
            </div>
            <div class="form-group col-md-4">
              <label for="">Hauteur (cm)</label>
              <input type="text" class="form-control form-control-sm chiffres" name="haut" id="haut" value="">
            </div>
          </div>
        </div>
        <div class="card-header">
          <h5><b>5) Taxe Ad valorem</b> </h5>
        </div>
        <div class="card-body">
          <div class="form-group col-md-12">
            <label for="">Valeur déclarée</label>
            <input type="text" class="form-control form-control-sm text-right chiffres" name="valeur" placeholder="100.00" id="valeur">
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-4" v-if="livr_typ != 'p'">
      <div class="card secondrow">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h5><b>6) Retour de fonds</b> </h5>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Espèces (MAD)</label>
              <input type="text" placeholder="0.00" class="form-control form-control-sm text-right chiffres" name="Espece" id="Espece">
            </div>
            <div class="form-group col-md-6">
              <label for="">Chèque (MAD)</label>
              <input type="text" placeholder="0.00" class="form-control form-control-sm text-right chiffres" name="Cheque" id="Cheque">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-xs-12">
              <label for="">Traite</label>
              <input type="text" placeholder="0.00" class="form-control form-control-sm text-right chiffres" name="Traite" id="Traite">
            </div>
            <div class="form-group col-md-3 col-xs-12">
              <label for="">Retour BL:</label>
              <div class="form-row">
                <div class="form-check">
                  <label class="form-check-label" style="margin-left: 10px;">
                    <input type="radio" class="form-check-input BLstat" checked name="BLstat" id="blnon" value="Non" v-model="blstat">
                    Non
                  </label>
                </div>
                <div class="form-check" style="margin-left: 10px;">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input BLstat" name="BLstat" id="bloui" value="Oui" v-model="blstat">
                    Oui
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group col-md-3 col-xs-12" id="blocbl" v-if="blstat=='Oui'">
              <label for="BL">Nombre de BL</label>
              <div class="form-row">
                <input type="text" class="form-control form-control-sm col-8 nombres" name="nbBL" id="BL" v-model="nbrbl">
                <button type="button" id="affichemodalbl" class="btn btn-primary col-2" data-toggle="modal" data-target="#modalBL" style="height: 30.99;margin-left: 10px;" @click="AfficherBLmodal()">...</button>
              </div>
            </div>
            <div class="form-group col-12" id="blocnumsbl" v-if="blstat=='Oui'">
              <label for="BL">Numéro de BL</label>
              <input type="text" class="form-control" id="numsbl" name="BL" value="">
            </div>
          </div>
          <!-- Modal du BL -->
          <div class="modal fade" id="modalBL" tabindex="-1" role="dialog" aria-labelledby="modalBLLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalBLLabel">Numero de BL</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="background-color: red;
                                                                       color: #fff;
                                                                       border-radius: 50%;
                                                                       padding: 0px 10px 7px 10px;">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="blres">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-lve" data-dismiss="modal">
                    <i class="fas fa-times"></i> Fermer
                  </button>
                  <button type="button" class="btn btn-primary btn-lve" data-dismiss="modal" id="validBL" @click="validerBL()">
                    <i class="fas fa-save"></i> valider
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin Modal du BL -->
        </div>
        <div class="card-header">
          <h4> <b>7) Retour palettes</b> </h4>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-check">
              <label class="form-check-label" style="margin-left: 10px;">
                <input type="radio" class="form-check-input palstat" checked name="palstat" id="palnon" value="Non" v-model="palstat">
                Non
              </label>
            </div>
            <div class="form-check" style="margin-left: 10px;">
              <label class="form-check-label">
                <input type="radio" class="form-check-input palstat" name="palstat" id="paloui" value="Oui" v-model="palstat">
                Oui
              </label>
            </div>
          </div>
          <div id="typpalet" v-if="palstat == 'Oui'">
            <h5>Type de palettes :</h5>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="">800 * 1200</label>
                <input type="text" name="paletteA" class="form-control nombres">
              </div>
              <div class="form-group col-md-4">
                <label for="">1000 * 1200</label>
                <input type="text" name="paletteB" class="form-control nombres">
              </div>
              <div class="form-group col-md-4">
                <label for="">1200 * 1200</label>
                <input type="text" name="paletteC" class="form-control nombres">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-8" v-if="livr_typ === 'p'">
      <div class="card secondrow" id="div-consigne">

      </div>
    </div>
    <div class="col-xs-12 col-md-4">
      <div class="card">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h5> <b>Documents</b> </h5>
        </div>
        <div class="card-body">
          <a href="assets/documents/agences.pdf" download onclick="telecharger()">
            <div class="col-12 row mesdocs">
              <label class="col-lg-6 col-md-12"><i class="fa fa-download"></i></label>
              <label class="h5 col-lg-6 col-md-12">Nos Agences</label>
            </div>
          </a>
          <a href="assets/documents/delais_livraison.pdf" download onclick="telecharger()">
            <div class="col-12 row mesdocs">
              <label class="col-lg-6 col-md-12"><i class="fa fa-download"></i></label>
              <label class="h5 col-lg-6 col-md-12">Nos villes desservies</label>
            </div>
          </a>
        </div>
      </div>
      <button type="submit" class="col-xs-12 btn-block btn btn-success btn-lg btn-lve" id="btn-envois">
        <i class="fas fa-save"></i> Confirmer la déclaration
      </button>
    </div>

  </div>
</form>
<script src="assets/scripts/consigne-map.js" charset="utf-8"></script>