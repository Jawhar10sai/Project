<!-- Modal -->
<div class="modal modsession" id="aj-adresse" tabindex="-1" role="dialog">
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
            <div class="form-group">
              <label for="">Adresse:</label>
              <textarea name="adresse" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="">Client:</label>
              <select class="" name="utlid">
                <option value="">
                  <?php foreach ($client_lve->ListeClients() as $usr): ?>
                    <option value="<?=$usr['CLIENT_ID'];?>"><?=$usr['NOM'];?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Sous client:</label>
              <select class="form-control form-control-sm" name="idcli">
                <option value=""></option>
                <?php foreach ($sous_client->ListeClients() as $clis): ?>
                  <option value="<?=$clis['CLIENT_ID'];?>"><?=$clis['NOM'];?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Ville</label>
              <select class="form-control form-control-sm" name="vill">
                <option value=""></option>
                <?php foreach ($villes->ListeVilles() as $vil): ?>
                  <option value="<?=$vil['VILLE_COD'];?>"><?=$vil['VILLE_LIB'];?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger btn-lve"><i class="fas fa-undo"></i> Vider</button>
        <button type="submit" class="btn btn-primary btn-lve"><i class="fa fa-save"></i> Ajouter l'adresse</button>
      </div>
    </form>
  </div>
</div>
</div>
