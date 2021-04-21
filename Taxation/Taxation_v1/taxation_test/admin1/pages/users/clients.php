    <div class="content-title m-x-auto">
      <h1>Clients:</h1>
    </div>
    <form autocomplete="off" class="form" action="gestion/ajout.php" method="post">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h4>Informations personnelles</h4>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Nom</label>
                  <input class="form-control form-control-sm" type="text" id="nom" name="nom" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Prenom</label>
                  <input class="form-control form-control-sm" type="text" id="prenom" name="prenom" value="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Telephone</label>
                  <input class="form-control form-control-sm" maxlength="10" type="text" id="telephone" name="telephone" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Ville</label>
                  <input class="form-control form-control-sm" type="text" id="ville" name="ville" value="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">Adresse</label>
                  <input class="form-control form-control-sm" type="text" id="adresse" name="adresse" value="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Contact</label>
                  <input class="form-control form-control-sm" type="mail" placeholder="contact@mail.com" id="contact" name="contact" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">ICE</label>
                  <input class="form-control form-control-sm" type="text" id="ice" name="ice" value="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">ID fiscale</label>
                  <input class="form-control form-control-sm" type="text" id="idfiscle" name="idfiscle" value="">
                </div>
                  <div class="form-group col-md-6">
                    <label for="">Capital social</label>
                    <input class="form-control form-control-sm" type="text" id="capsoc" name="capsoc" value="">
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h4>Informations professionnelles</h4>
            </div>
            <div class="card-body">
                <div class="form-group col-md-12">
                  <label for="">Code client</label>
                  <input class="form-control form-control-sm" type="text" id="codecli" name="codecli" value="">
                </div>
                  <div class="form-group col-md-12">
                    <label for="">Chaine d'interval</label>
                    <input class="form-control form-control-sm" type="text" id="chaininter" name="chaininter" value="">
                  </div>
                <div class="form-group col-md-12">
                  <label for="">Interval debut</label>
                  <input class="form-control form-control-sm" type="text" id="debinter" name="debinter" value="">
                </div>
                <div class="form-group col-md-12">
                  <label for="">Interval max</label>
                  <input class="form-control form-control-sm" type="text" id="fininter" name="fininter" value="">
                </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Nom d'utilisateur</label>
                  <input class="form-control form-control-sm" type="text" id="login" name="login" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Mot de passe</label>
                  <input class="form-control form-control-sm" type="text" id="mdpass" name="mdpass" value="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-lg btn-primary" name="ajout_utilisateur">Ajouter l'utilisateur</button>
      </div>
    </form>
