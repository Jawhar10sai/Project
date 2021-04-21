<div class="container" style="padding-top:120px;">
<h1 style="color:#dc1e2d;" class="h1 text-center titlessection">
<i class="fas fa-exclamation fa-3x"></i><br>
  Réclamation</h1>
<div class="row" data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="300"
     data-aos-offset="0">
<div class="col-md-12 col-xs-12">
  <p class="description" style="padding:40px;font-weight: 600;">Pour permettre un meilleur traitement et suivi de vos réclamations, nous vous remercions de renseigner les champs ci-dessous votre réclamation sera traitéé sous 48h, Merci de noter le numéro de ticket ****** afin d'assurer le suivi de vote réclamation.</p>
      <form action="/TPS/Lavoieexpress/index.php" method="post" id="form_recrute">
        <div class="form-row">
          <div class="form-group col-md-6 col-xs-12">
            <label for="situation_actuelle" >Nom Client / Société <span style="color:red;">*</span> :</label>
            <input tabindex="2" size="55" onFocus="clearText(this)" name="client" id="client" class="form-control form-control-sm">
          </div>
          <div class="form-group col-md-6 col-xs-12">
            <label for="situation_actuelle">Code Client / Société <span class="required"> (optionnel)</span> :</label>
              <input tabindex="3" value="" size="55" onFocus="clearText(this)"   name="codeClient" id="codeClient" class="form-control form-control-sm">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6 col-xs-12">
            <label for="situation_actuelle" >Tél fixe <span style="color:red;">*</span>:</label>(format : 09 99 99 99 99)
            <input tabindex="3" value="" size="10" maxlength="10"  name="telFix" class="form-control form-control-sm">
        </div>
          <div class="form-group col-md-6 col-xs-12">
            <label for="experience" >GSM <span style="color:red;">*</span>:</label>(format : 09 99 99 99 99)
                <input tabindex="3" value="" size="55" placeholder="05XXXXXXXX"  name="telGSM" class="form-control form-control-sm">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6 col-xs-12">
            <label for="nom">N° de la Déclaration<span style="color:red;">*</span>:</label>(format : X 99 99 99)
            <input tabindex="3" value="" size="55"  name="nDeclaration" class="form-control form-control-sm">
          </div>
          <div class="form-group col-md-6 col-xs-12">
            <label for="prenom">je suis un Client <span style="color:red;">*</span> :</label>
            <div class="form-group">
              <input tabindex="3" value="Expéditeur" type="radio" name="expediteur" id="expediteur"  class=" form-control-xs">		Expéditeur <br>
               <input tabindex="3" value="Déstinataire" type="radio" name="expediteur" id="destinataire" class=" form-control-xs"> Déstinataire
            </div>
          </div>
        </div>
        <h3>Objet de la réclamation</h3><br>
        <h5>Votre réclamation est liée à <span style="color:red;">*</span></h5>
        <div class="form-row">
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
          <div class="form-group col-md-6 col-xs-12">
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
          </div>
          <div class="form-group col-md-6 col-xs-12">
            <select class="form-control form-control-sm" name="recObjet" id="recObjet">
              <option value="">Choisir un objet</option>
            </select>
          </div>
        </div>
              <input class="btn btn-lg btn-lve offset-lg-4 col-lg-3 col-xs-12 text-light" name="envoie_Reclamation" type="submit" value="Valider" />
          </form>
        </div>
</div>
</div>
