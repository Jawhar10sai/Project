<?php
include ("txheads.php");
$reclamation="active";
require_once "includes/lve_navbar.php";
?>
<title>LVE - Réclamations</title>
    <div class="container-fluid" style="padding:80px; padding-bottom:0px;">
              <div class="card">
                <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
                  <h5><b>Réclamation</b></h5>
                </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="dragbox dragbox_1858" id="2" >
                      <div class="dragbox-content Slider">
                          <img class="img-fluid col-12 img-rounded" src="images/slide-3.jpg" alt="" />
                      <div class="dragbox  dragbox_5148" id="6" >
                        <div class="dragbox-content Image">
                            <div class="col-11" style="padding-left:20px;">
                              <p style="  font-size: 22px;font-family: SF Pro Text,SF Pro Icons,Helvetica Neue,Helvetica,Arial,sans-serif;">
                                Pour permettre un meilleur traitement et suivi de vos réclamations,
                                 nous vous remercions de renseigner les champs ci-dessous votre réclamation sera traitéé sous 48h,
                                Merci de  noter le numéro de ticket ****** afin d'assurer le suivi de votre réclamation.
                              </p>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
        <!--*********************************************************************************************************-->
                  <div class="col-md-4 col-xs-12">
                        <div class="dragbox dragbox_5149" id="7" >
                          <div class="dragbox-content RH">
                            <form action="" method="post" id="form_reclam" autocomplete="off">
                              <input type="hidden" name="ajouter_reclamation" value="">
                                <div class="form-group">
                                  <label for="situation_actuelle" class="description">Nom Client / Société <span style="color:red;">*</span> :</label>
                                  <input tabindex="2" value="" size="55" name="client" id="client" class="form-control form-control-sm">
                                </div>

                                <div class="form-group">
                                  <label for="situation_actuelle" class="description" >Code Client / Société <span class="required"> (optionnel)</span> :</label>
                                    <input tabindex="3" value="" size="55" name="codeClient" id="codeClient" class="form-control form-control-sm">
                                </div>


                                <div class="form-group">
                                  <label for="situation_actuelle" class="description">Tél fixe <span style="color:red;">*</span>:</label>(format : 09 99 99 99 99)
                                  <input tabindex="3" value="" size="10" maxlength="10"  name="telFix" class="form-control form-control-sm">
                              </div>
                                <div class="form-group">
                                  <label for="experience" class="description" >GSM <span style="color:red;">*</span>:</label>(format : 09 99 99 99 99)
                                  <input tabindex="3" size="10" placeholder="05XXXXXXXX" maxlength="10"  name="telGSM" class="form-control form-control-sm">
                                </div>

                                <div class="form-group">
                                  <label for="nom" class="description">N° de la Déclaration <span style="color:red;">*</span>:</label>(format : X 99 99 99)
                                  <input tabindex="3" value="" size="55"  name="nDeclaration" class="form-control form-control-sm">
                                </div>
                                <div class="form-group">
                                  <label for="prenom" class="description">je suis un Client <span style="color:red;">*</span> :</label>
                                  <div class="form-group" style="font-size:16px;">
                                    <input tabindex="3" value="Expéditeur" type="radio" name="expediteur" id="expediteur"  class=" form-control-xs">		Expéditeur
                                     <input tabindex="3" value="Déstinataire" type="radio" name="expediteur" id="expediteur" class=" form-control-xs"> Déstinataire
                                  </div>
                                </div>


                            <label for="prenom" class="description"><h3>Objet de la réclamation</h3></label>
                                <script language="javascript">
                                function typeObjet(val){
                                if(val==1){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="1">Ratée</option> <option value="2">Retard</option> <option value="3">Manque</option> <option value="4">Erreur</option> <option value="5">Endommagée</option> <option value="6">Autre</option>'); }
                                else if(val==2){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="7">Raté</option> <option value="8">Retard</option> <option value="9">Injoignable</option> <option value="10">Endommagé</option> <option value="11">Erreur</option> <option value="12">Autre</option>'); }
                                else if(val==3){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="13">Raté</option> <option value="14">Retard</option> <option value="15">Non conforme</option> <option value="16">Autre</option>'); }
                                else if(val==4){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="17">Inadapté</option> <option value="18">Etat</option> <option value="19">Qualité de chargement</option> <option value="20">Retard</option> <option value="21">Autre</option>'); }
                                else if(val==5){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="22">Emballage défecteux</option> <option value="23">Contenu colis endommagé partiellement ou totalement</option> <option value="24">Marchandise mouillée</option> <option value="25">Marchandise cassée</option> <option value="26">Autre</option>'); }
                                else if(val==6){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="27">Erreur</option> <option value="28">Autre</option>'); }
                                else if(val==7){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="29">Partiel</option> <option value="30">Total</option> <option value="31">Autre</option>'); }
                                else if(val==8){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="32">Erreur</option> <option value="33">Ratée</option> <option value="34">Autre</option>'); }
                                else if(val==9){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="35">Incivilité/ Comportement</option> <option value="36">Tenue/Présentation</option> <option value="37">Injoignable</option> <option value="38">Autre</option>'); }
                                else if(val==10){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="39">Facture non reçue</option> <option value="40">Erreur de tarification</option> <option value="41">Erreur poids</option> <option value="42">Paramétrage SI</option> <option value="43">Autre</option>'); }
                                else if(val==11){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="44">Erreur préparation</option> <option value="45">Gestion de stock</option> <option value="46">Avarie</option> <option value="47">Manque</option> <option value="48">Ecart d\'inventaire</option> <option value="49">Autre</option>'); }
                                else{$("#recObjet").empty()}
                              }
                                </script>
                <div class="col-12">
                  <div class="form-row">
                    <div class="form-group col-12" style="margin:10px;">
                      <label for="nom" class="description">Votre réclamation est liée à <span style="color:red;">*</span> :</label>
                      <select name="recTypeObjet" id="recTypeObjet" onchange="javascript:typeObjet(this.value);" class="form-control form-control-sm">
                        <option value="">Choisir un Type</option>
                        <option value="1">Livraison</option>
                        <option value="2">Ramassage</option>
                        <option value="3">Retour de Fond</option>
                        <option value="4">Véhicule</option>
                        <option value="5">Avarie</option>
                        <option value="6">Aiguillage</option>
                        <option value="7">Manque</option>
                        <option value="8">Taxation</option>
                        <option value="9">Chauffeur</option>
                        <option value="10">Facturation</option>
                        <option value="11">Logistique</option>
                      </select>
                      <select class="form-control form-control-sm" name="recObjet" id="recObjet">
                        <option value="">Choisir un objet</option>
                      </select>
                    </div>
                  </div>
                </div>
                <button class="btn btn-success btn-lve col-12" name="envoie_Reclamation"  type="submit" id="btn-reclame">
                  Valider
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php include_once "includes/lve_footer.php"; ?>
