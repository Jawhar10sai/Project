<?php
include_once "control_utilisateur.php";

if (isset($_POST['modification_declaration'])) {
  $declarations = Declarations::TrouverDeclaration($_POST['mnumero']);
  $declarations->client1_id = $client_lve->CLIENT_ID;
  $declarations->userid = $client_lve->CLIENT_ID;
  $sous_client = SousClient::TrouverClientParCode($_POST['mclient']);
  #Tester l'existance du sous client avant de modifier les données.
  if (!$sous_client) {
    $sous_client = new SousClient;
    $sous_client->CLIENT_COD = $_POST['mclient'];
    $sous_client->NOM = $_POST['mmodnom'];
    $sous_client->PRENOM = $_POST['mmodprenom'];
    $sous_client->telephone = $_POST['mmodtelephone'];
    $sous_client->id_user = $client_lve->CLIENT_ID;
    $declarations->client2_id = $sous_client->Enregistrer();
  } else {
    $sous_client->NOM = $_POST['mmodnom'];
    $sous_client->PRENOM = $_POST['mmodprenom'];
    $sous_client->telephone = $_POST['mmodtelephone'];
    $sous_client->commit_par = $client_lve->NOM;
    $sous_client->Enregistrer();
    $declarations->client2_id = $sous_client->CLIENT_ID;
  }
  # Vérification de l'adresse du client
  $adresses = Adresses::AdresseExiste($sous_client->CLIENT_ID, $_POST['adresse']);
  if (!$adresses) {
    $adresses = new Adresses;
    $adresses->lib_adresse = $_POST['mmodadresse'];
    $adresses->id_client = $sous_client->CLIENT_ID;
    $adresses->id_user = $client_lve->CLIENT_ID;
    $adresses->id_ville = $_POST['mmodville'];
    $declarations->id_adres = $adresses->AjouterAdresse();
  } else {
    $adresses->lib_adresse = $_POST['mmodadresse'];
    $adresses->id_client = $sous_client->CLIENT_ID;
    $adresses->id_user = $client_lve->CLIENT_ID;
    $adresses->id_ville = $_POST['mmodville'];
    $adresses->commit_par = $nom_d_utilisateur;
    $adresses->ModifierAdresse();
    $declarations->id_adres = $adresses->id;
  }
  $declarations->colis = $_POST['mcolis'];
  $declarations->poids = $_POST['mpoids'];
  $declarations->valeur = $_POST['mvaleur'];
  $declarations->livraison = $_POST['mlivraison'];
  $declarations->port = $_POST['mport'];
  if ($_POST['mcourrier_typ'] == 'M') {
    $declarations->courrier_typ = 'M';
    $declarations->express = $_POST['mtypliv'];
  } else
    $declarations->courrier_typ = $_POST['affrettyp'];
  $declarations->nature = $_POST['mnature'];
  $declarations->Espece = $_POST['mEspece'];
  $declarations->Cheque = $_POST['mCheque'];
  $declarations->Traite = $_POST['mTraite'];
  #$BL = $_POST['mBL'];
  #$numero = $_POST['mnumero'];
  $declarations->long = $_POST['mlong'];
  $declarations->larg = $_POST['mlarg'];
  $declarations->haut = $_POST['mhaut'];
  $declarations->paletteA = $_POST['mpaletteA'];
  $declarations->paletteB = $_POST['mpaletteB'];
  $declarations->paletteC = $_POST['mpaletteC'];
  $declarations->commit_par = $nom_d_utilisateur;
  $declarations->ModifierDeclaration();
  header('location:Déclarations');
}
#Modification de la session du client:
if (isset($_POST['codesession'])) {
  $messessions = ClientSession::TrouverSession($_POST['codesession']);
  $messessions->AGENCE_LIB = $_POST['mod_session_lib'];
  if (!empty($_POST['mod_session_pass']))
    $messessions->MOT_D_PASS = sha1($_POST['mod_session_pass']);
  $messessions->commit_par = $nom_d_utilisateur;
  $messessions->ModifierSession();
  header('location: Mes_sessions');
}
if (isset($_POST['infos_perso_modif'])) {
  //$client_lve = ClientLve::TrouverClient($_POST['infos_perso_modif']);
  $client_lve->NOM = $_POST['nom'];
  $client_lve->PRENOM = $_POST['prenom'];
  $client_lve->mail = $_POST['mail'];
  $client_lve->adresse = $_POST['adresse'];
  $client_lve->telephone = $_POST['telephone'];
  $client_lve->commit_par = $_POST['nom'];
  $client_lve->Enregistrer();
}

if (isset($_POST['modifier_mdp'])) {
  if ($client_lve->mot_de_passe == sha1($_POST['mdp_actuel'])) {
    if ($_POST['nv_mdp'] == $_POST['confirmation_mdp']) {
      if ($_POST['nv_mdp'] != $_POST['mdp_actuel']) {
        $client_lve->mot_de_passe = sha1($_POST['nv_mdp']);
        $client_lve->commit_par = $nom_d_utilisateur;
        $client_lve->Enregistrer();
        echo "modifie";
      } else
        echo "Le nouveau mot de passe doit être différent du mot de passe actuel";
    } else
      echo "Mot de passe et confirmation non-compatibles";
  } else
    echo "Le Mot de passe actuel est incorrect!";
}
