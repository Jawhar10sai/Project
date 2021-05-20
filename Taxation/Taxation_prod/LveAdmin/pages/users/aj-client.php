<!-- Modal -->
<div class="modal modsession" id="aj-client" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ajout d'un client</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="background-color: red;
                                                         color: #fff;
                                                         border-radius: 50%;
                                                         padding: 0px 10px 7px 10px;">&times;</span>
      </button>
    </div>
    <form class="" action="Modification" method="post" autocomplete="off">
      <input type="hidden" name="codesession" value="<?=$key['AGENCE_COD'];?>">
      <div class="modal-body">
          <div class="row">
                  <div class="form-row col-12">
                    <div class="form-group col-md-4">
                      <label for="">Nom</label>
                      <input class="form-control form-control-sm" type="text" id="nom" name="nom" value="">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Prenom</label>
                      <input class="form-control form-control-sm" type="text" id="prenom" name="prenom" value="">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Code client</label>
                      <input class="form-control form-control-sm" type="text" id="codecli" name="codecli" value="">
                    </div>
                  </div>
                  <div class="form-row col-12">
                    <div class="form-group col-md-6">
                      <label for="">Nom d'utilisateur</label>
                      <input class="form-control form-control-sm" type="text" id="login" name="login" value="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Mot de passe</label>
                      <input class="form-control form-control-sm" type="text" id="mdpass" name="mdpass" value="">
                    </div>
                  </div>
                  <div class="form-row col-12">
                    <div class="form-group col-md-6">
                      <label for="">Telephone</label>
                      <input class="form-control form-control-sm" maxlength="10" type="text" id="telephone" name="telephone" value="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Ville</label>
                      <input class="form-control form-control-sm" type="text" id="ville" name="ville" value="">
                    </div>
                  </div>
                    <div class="form-group col-md-12">
                      <label for="">Adresse</label>
                      <input class="form-control form-control-sm" type="text" id="adresse" name="adresse" value="">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="">Contact</label>
                      <input class="form-control form-control-sm" type="mail" placeholder="contact@mail.com" id="contact" name="contact" value="">
                    </div>
                    <div class="form-row col-12">
                      <div class="form-group col-md-4">
                        <label for="">ICE</label>
                        <input class="form-control form-control-sm" type="text" id="ice" name="ice" value="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">ID fiscale</label>
                        <input class="form-control form-control-sm" type="text" id="idfiscle" name="idfiscle" value="">
                      </div>
                        <div class="form-group col-md-4">
                          <label for="">Capital social</label>
                          <input class="form-control form-control-sm" type="text" id="capsoc" name="capsoc" value="">
                        </div>
                    </div>
                      <legend>Intevals:</legend>
                      <div class="form-row col-12">
                          <div class="form-group col-md-4">
                            <label for="">Chaine d'interval</label>
                            <input class="form-control form-control-sm" type="text" id="chaininter" name="chaininter" value="">
                          </div>
                        <div class="form-group col-md-4">
                          <label for="">Interval debut</label>
                          <input class="form-control form-control-sm" type="text" id="debinter" name="debinter" value="">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="">Interval max</label>
                          <input class="form-control form-control-sm" type="text" id="fininter" name="fininter" value="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Interval debut (session)</label>
                          <input class="form-control form-control-sm" type="text" id="debinterses" name="debinterses" value="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="">Interval max (session)</label>
                          <input class="form-control form-control-sm" type="text" id="fininterses" name="fininterses" value="">
                        </div>
                      </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger btn-lve"><i class="fas fa-undo"></i> Vider</button>
        <button type="submit" class="btn btn-primary btn-lve"><i class="fa fa-save"></i> Ajouter le client</button>
      </div>
    </form>
  </div>
</div>
</div>
