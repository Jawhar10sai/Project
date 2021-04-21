<?php
$connection = new mysqli('localhost','root','','site_voieex');
$offres = $connection->query("SELECT * FROM `offres_d_emploi`");
 ?>
<div class="container">
      <!--
  <div class="row" style="padding-top:120px;" data-aos="zoom-in" data-aos-duration="2500" id="politique_RH">
    <div class="col-md-12">
      <h1 class="text-center titlessection" style="margin-bottom:10px;">Notre politique RH</h1>
      <h4 class="text-center sub-titlessection" style="color: #dc1e2d;margin-bottom:50px;">Notre Capital Humain, un levier de notre stratégie  de développement</h4>
      <p class="description">Leader  de la Logistique, Messagerie & Transport. La Voie Express,  grâce aux efforts notables de  ces 500 hommes et femmes se positionne aujourd’hui en tant qu’acteur de référence sur le marché national avec une ambition de devenir un acteur clé du développement économique au niveau africain.</p>
      <p class="description">Notre  Capital Humain est l’essence du développement de notre entreprise. C’est pour cela que notre stratégie est de recruter chaque année les vétérans dans chaque domaine en participant aux forums des grandes écoles tout en développant leur compétence par une mise à niveau permanente via des formations régulières dans toutes les compétences techniques et managériales de notre métier.</p>
    <p class="description">
      La clé de voûte de la politique Ressources Humaines de la Voie Express
      ne s’articule pas seulement autour de l’intégration réussie de nouveaux collaborateurs
      ou sa politique de formation mais aussi  sur la mise en place d’un plan de carrière qui permet à nos collaborateurs
      d’occuper des postes de responsabilité évolutives avec des missions clairement définies et des objectifs qui servent la vision globale de notre société et font,
      dans ce sens, appel à la concertation, à l’esprit d’équipe et à la qualité de service.</p>
      <p class="description">Nous sommes convaincus que nos  équipes motivées  avec des compétences distinctives  sont notre Devise.</p>
    </div>
</div>  -->
  <div class="row" style="padding-top:120px;" data-aos="zoom-in" data-aos-duration="2500" id="rejoignez_nous">
    <div class="col-md-12">
      <h1 class="text-center titlessection" style="margin-bottom:10px;">Rejoignez nous</h1>
      <h4 class="text-center sub-titlessection"  style="color: #dc1e2d;margin-bottom:50px;"> Que recherchez-vous? Un challenge, Des perspectives de carrière? Une entreprise apte à reconnaître vos talents?</h4>
      <p class="description">Venez développer votre expertise et vos qualités humaines, ainsi permettre à notre société de relever de nouveaux challenges. Alors rejoignez-nous  dans cette aventure qui dure depuis 17 ans, et qui a fait de nous une référence  nationale incontournable.</p>
      <form action="crud/insert.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6 col-xs-12">
            <label for="">Demande</label>
            <select class="form-control" name="typedemande">
              <option value="0"></option>
              <option value="emploi">Emploi</option>
              <option value="stage">Stage</option>
            </select>
          </div>
          <div class="form-group col-md-6 col-xs-12">
            <label for="">Type de poste recherché</label>
            <select class="form-control" name="affectation">
              <option value="0"></option>
              <option value="Achats">Achats</option>
              <option value="Audit &amp; Contrôle de Gestion">Audit &amp; Contrôle de Gestion</option>
              <option value="Autres">Autres</option>
              <option value="Commercial">Commercial</option>
              <option value="Fiance &amp; Comptabilité">Fiance &amp; Comptabilité</option>
              <option value="Logistique">Logistique</option>
              <option value="Marketing &amp; Communication">Marketing &amp; Communication</option>
              <option value="Messagerie">Messagerie</option>
              <option value="Qualité">Qualité</option>
              <option value="Recouvrement">Recouvrement</option>
              <option value="Ressources Humaines">Ressources Humaines</option>
              <option value="Services Après vente">Services Après vente</option>
              <option value="Systèmes  d’information">Systèmes  d’information</option>
              <option value="Technique">Technique</option>
              <option value="Transport">Transport</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 col-xs-12">
            <h5 class="sub-titlessection">Etat civil</h5>
            <div class="form-row">
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Situation familiale</label>
                <select class="form-control" name="situatF">
                  <option value="celib">Célibataire</option>
                  <option value="mari">Marié(e)</option>
                </select>
              </div>
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Civilité</label>
                <select class="form-control" name="civilite">
                  <option value="mr">Mr</option>
                  <option value="fem">Mme</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom" onkeypress="return lettersOnly() ">
              </div>
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Prénom</label>
                <input type="text" class="form-control" name="prenom" onkeypress="return lettersOnly() ">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Nationalité</label>
                <input type="text" class="form-control" name="nationalite">
              </div>
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Date de naissance</label>
                <input type="date" class="form-control" name="datenais">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-12">
                <label for="">Adresse</label>
                <input type="text" class="form-control" name="adresse">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Ville</label>
                <input type="text" class="form-control" name="ville">
              </div>
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Pays de résidence</label>
                <input type="text" class="form-control" name="pays">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Adresse electronique</label>
                <input type="mail" class="form-control" name="email" placeholder="exemple@mail.com" >
              </div>
              <div class="form-group col-xs-12 col-md-6">
                <label for="">Numéro de téléphone</label>
                <input type="text" class="form-control" id="telephone" maxlength="10" name="telephone" placeholder="05XXXXXXXX">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-12">
                <label for="">CV</label>
                <input type="file" class="form-control" name="cv">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xs-12">
            <h5 class="sub-titlessection">Profil</h5>
            <div class="form-group col-12">
              <label for="">Situation actuelle</label>
              <select class="form-control" name="situatP">
                <option value=""></option>
                <option value="En recherche">En recherche</option>
                <option value="Veille active">Veille active</option>
                <option value="Veille passive">Veille passive</option>
                <option value="En poste">En poste</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="">Expérience</label>
              <select class="form-control" name="experience">
                <option value=""></option>
                <option value="Etudiant">Etudiant</option>
                <option value="Jeune diplomé">Jeune diplomé</option>
                <option value="1-2ans">1 à 2 ans</option>
                <option value="3-5ans">3 à 5 ans</option>
                <option value="6-10ans">6 à 10 ans</option>
                <option value="+11ans">Plus de 11 ans</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="">Niveau d'études</label>
              <select class="form-control" name="niveau_etude">
                <option value=""></option>
                <option value="Niveau Bac">Niveau Bac</option>
                <option value="Bac">Bac</option>
                <option value="Bac+1">Bac+1</option>
                <option value="Bac+2">Bac+2</option>
                <option value="Bac+3">Bac+3</option>
                <option value="Bac+4">Bac+4</option>
                <option value="Bac+5">Bac+5</option>
                <option value="Bac+5 et plus">Bac+5 et plus</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="">Établissement</label>
              <input type="text" class="form-control" name="etablissement">
            </div>
            <div class="form-group col-12">
              <label for="">Type de formation</label>
              <select class="form-control" name="formation">
                <option value=""></option>
                <option value="Bac">Bac</option>
                <option value="BEP">BEP</option>
                <option value="BTS">BTS</option>
                <option value="Ecole d'ingénieurs">Ecole d'ingénieurs</option>
                <option value="Ecole de commerce">Ecole de commerce</option>
                <option value="Formation continue">Formation continue</option>
                <option value="Formation spécialisée">Formation spécialisée</option>
                <option value="Université">Université</option>
                <option value="Autres">Autres</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="">Motivations</label>
              <textarea name="motivations" class="form-control" rows="8" cols="80"></textarea>
            </div>
          </div>
        </div>
        <div class="text-center">
          <button  type="submit" class="btn btn-lg btn-lve" name="candidature">Valider la candidature</button>
        </div>
      </form>
    </div>
  </div>
  <div class="row" style="padding-top:120px;" id="offres_emploi">
    <div class="col-md-12">
      <h1 class="text-center titlessection" style="margin-bottom:10px;">Offres d'emploi</h1>
      <h4 class="text-center sub-titlessection"  style="color: #dc1e2d;margin-bottom:50px;">DES OFFRES STIMULANTES</h4>
      <p class="description">
        En travaillant chez la voie express vous serez amené(e) à prendre des responsabilités, relever des défis et vous développer continuellement. contribuez à notre succès en choisissant une carrière passionnante.
      </p>
      <div class="row">
      <!--****************************************************************-->
      <?php foreach ($offres as $offre): ?>
        <div class="card col-lg-4 col-md-6 col-xs-12">
          <div class="card-body">
            <h5 class="card-title"><?=$offre['titre_offre'];?></h5>
            <p class="card-text contelement" maxlength="500">
              <?=$offre['presentation'];?>
            </p>
            <!--******************buttton modal******************************-->
            <button class="btn btn-lve btn-block btn-lg" id="consulter"  data-toggle="modal" data-target="#supmod">En savoir plus</button>

            <!--#######################################################################################################-->
            <div class="modal supmod" tabindex="-1" role="dialog" id="supmod">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">INTITULÉ DE POSTE : <?=$offre['titre_offre'];?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body offresbody" >
                  <p class="description">
                    <?=$offre['presentation'];?>
                  </p>
                    <h4 class="sub-titlessection">Missions</h4>
                    <p class="description">
                      <?=$offre['presentation_mission'];?>
                    </p>
                    <ul class="contelement">
                      <?php
                      $missions = explode(' | ',$offre['missions']);
                       ?>
                       <?php foreach ($missions as $mission): ?>
                         <li><?=$mission;?></li>
                       <?php endforeach; ?>
                    </ul>
                    <h4 class="sub-titlessection">Profil recherché</h4>
                    <p class="description">
                        <?=$offre['profil']?>
                    </p>
                    <h4 class="sub-titlessection"><?=$offre['disponibilite']?></h4>
                    <p class="description">Pour répondre à cette offre, merci de transmettre votre candidature à l'adresse électronique suivante :</p>
                    <p class="description">recrutement@lavoieexpress.ma</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-lve" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
            </div>
            <!--*********************************fin du button modal*******************************-->
          </div>
        </div>

        <div class="card col-lg-4 col-md-6 col-xs-12">
          <div class="card-body">
            <h5 class="card-title"><?=$offre['titre_offre'];?></h5>
            <p class="card-text contelement" maxlength="500">
              <?=$offre['presentation'];?>
            </p>
            <!--******************buttton modal******************************-->
            <button class="btn btn-lve btn-block btn-lg" id="consulter"  data-toggle="modal" data-target="#supmod">En savoir plus</button>

            <!--#######################################################################################################-->
            <div class="modal supmod" tabindex="-1" role="dialog" id="supmod">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">INTITULÉ DE POSTE : <?=$offre['titre_offre'];?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body offresbody" >
                  <p class="description">
                    <?=$offre['presentation'];?>
                  </p>
                    <h4 class="sub-titlessection">Missions</h4>
                    <p class="description">
                      <?=$offre['presentation_mission'];?>
                    </p>
                    <ul class="contelement">
                      <?php
                      $missions = explode(' | ',$offre['missions']);
                       ?>
                       <?php foreach ($missions as $mission): ?>
                         <li><?=$mission;?></li>
                       <?php endforeach; ?>
                    </ul>
                    <h4 class="sub-titlessection">Profil recherché</h4>
                    <p class="description">
                        <?=$offre['profil']?>
                    </p>
                    <h4 class="sub-titlessection"><?=$offre['disponibilite']?></h4>
                    <p class="description">Pour répondre à cette offre, merci de transmettre votre candidature à l'adresse électronique suivante :</p>
                    <p class="description">recrutement@lavoieexpress.ma</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-lve" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
            </div>
            <!--*********************************fin du button modal*******************************-->
          </div>
        </div>

        <div class="card col-lg-4 col-md-6 col-xs-12">
          <div class="card-body">
            <h5 class="card-title"><?=$offre['titre_offre'];?></h5>
            <p class="card-text contelement" maxlength="500">
              <?=$offre['presentation'];?>
            </p>
            <!--******************buttton modal******************************-->
            <button class="btn btn-lve btn-block btn-lg" id="consulter"  data-toggle="modal" data-target="#supmod">En savoir plus</button>

            <!--#######################################################################################################-->
            <div class="modal supmod" tabindex="-1" role="dialog" id="supmod">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">INTITULÉ DE POSTE : <?=$offre['titre_offre'];?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body offresbody" >
                  <p class="description">
                    <?=$offre['presentation'];?>
                  </p>
                    <h4 class="sub-titlessection">Missions</h4>
                    <p class="description">
                      <?=$offre['presentation_mission'];?>
                    </p>
                    <ul class="contelement">
                      <?php
                      $missions = explode(' | ',$offre['missions']);
                       ?>
                       <?php foreach ($missions as $mission): ?>
                         <li><?=$mission;?></li>
                       <?php endforeach; ?>
                    </ul>
                    <h4 class="sub-titlessection">Profil recherché</h4>
                    <p class="description">
                        <?=$offre['profil']?>
                    </p>
                    <h4 class="sub-titlessection"><?=$offre['disponibilite']?></h4>
                    <p class="description">Pour répondre à cette offre, merci de transmettre votre candidature à l'adresse électronique suivante :</p>
                    <p class="description">recrutement@lavoieexpress.ma</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-lve" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
            </div>
            <!--*********************************fin du button modal*******************************-->
          </div>
        </div>









      <?php endforeach; ?>
        <!--****************************************************************-->
      </div>
    </div>
  </div>

</div>
