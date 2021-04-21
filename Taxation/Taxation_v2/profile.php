<?php
require_once "txheads.php";
require_once "gestion/control_utilisateur.php";
$navuser= "active";
?>
<title>LVE - Mon profile</title>
<!--###################################################################################-->
  <?php include_once "includes/lve_navbar.php"; ?>
<!--###################################################################################-->
<div class="container-fluid" style="margin-top:80px;">
  <div class="row" style="min-height: 67vh;">
  <div class="col-xs-12 col-md-8">
    <div class="card">
      <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
        <h5><b>Mes informations</b></h5>
      </div>
      <div class="card-body">
        <form class="info-perso" action="" method="post" autocomplete="off">
          <input type="hidden" name="infos_perso_modif" value="<?=$client_lve->CLIENT_ID?>">
          <div class="form-row">
            <div class="form-group col-xs-12 col-md-6">
              <label for="">Nom :</label>
              <input type="text" class="form-control" name="nom" value="<?=$client_lve->NOM?>">
            </div>
            <div class="form-group col-xs-12 col-md-6">
              <label for="">Prénom :</label>
              <input type="text" class="form-control" name="prenom" value="<?=$client_lve->PRENOM?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-xs-12 col-md-6">
              <label for="">Mail :</label>
              <input type="text" class="form-control" name="mail" value="<?=$client_lve->mail?>">
            </div>
            <div class="form-group col-xs-12 col-md-6">
              <label for="">Téléphone :</label>
              <input type="text" class="form-control" name="telephone" value="<?=$client_lve->telephone?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-xs-12 col-md-6">
              <label for="">Adresse :</label>
              <input type="text" class="form-control" name="adresse" value="<?=$client_lve->adresse?>">
            </div>
            <div class="form-group col-xs-12 col-md-6">
              <label for="">Ville :</label>
              <select class="form-control" name="ville">
                <option value="<?=$client_lve->ville?>"><?=$client_lve->ville?>
                <?php foreach ($villes->ListeVilles() as $detville): ?>
                  <option value="<?=$detville['VILLE_LIB']; ?>"><?=$detville['VILLE_LIB']; ?>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-lve btn-success"  id="modif-infos"><i class="fas fa-save"></i> Enregistrer les changements  </button>
        </form>
      </div>
    </div>
  </div>
    <div class="col-xs-12 col-md-4">
      <div class="card">
        <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
          <h5><b>Changement de Mot de passe</b></h5>
        </div>
        <div class="card-body">
          <form class="mdp-change" action="" method="post" autocomplete="off">
            <input type="hidden" name="modifier_mdp" value="">
            <div class="form-group">
              <label for="">Mot de passe actuel:</label>
              <input type="password" class="form-control" name="mdp_actuel" value="">
            </div>
            <div class="form-group">
              <label for="">Nouveau mot de passe:</label>
              <input type="password" class="form-control" name="nv_mdp" value="">
            </div>
            <div class="form-group">
              <label for="">Confirmation du mot de passe:</label>
              <input type="password" class="form-control" name="confirmation_mdp" value="">
            </div>
            <button type="submit" class="btn btn-lve btn-success btn-block" id="mod-pass"><i class="fas fa-save"></i> Changer le mot de passe  </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "includes/lve_footer.php";?>
