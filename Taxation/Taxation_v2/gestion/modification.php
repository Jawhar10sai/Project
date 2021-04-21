<?php
include_once "classes/fetchclas.php";
include_once "control_utilisateur.php";
if (isset($_POST['modification_declaration'])) {
  $declarations->TrouverDeclaration($_POST['mnumero']);
  $declarations->client1_id = $client_lve->CLIENT_ID;
  $declarations->userid = $client_lve->CLIENT_ID;
  #Tester l'existance du sous client avant de modifier les données.
  if (!$sous_client->TrouverClientParCode($_POST['mclient'])) {
    $sous_client->CLIENT_COD = $_POST['mclient'];
    $sous_client->NOM = $_POST['mmodnom'];
    $sous_client->PRENOM = $_POST['mmodprenom'];
    $sous_client->telephone = $_POST['mmodtelephone'];
    $sous_client->id_user = $client_lve->CLIENT_ID;
    $declarations->client2_id = $sous_client->AjouterClient();
  }else {
    $sous_client->NOM = $_POST['mmodnom'];
    $sous_client->PRENOM = $_POST['mmodprenom'];
    $sous_client->telephone = $_POST['mmodtelephone'];
    $sous_client->ModifierClient($nom_d_utilisateur);
    $declarations->client2_id = $sous_client->CLIENT_ID;
  }
  # Vérification de l'adresse du client
    $adresses->adresse = $_POST['mmodadresse'];
    $adresses->id_client = $sous_client->CLIENT_ID;
    $adresses->id_user = $client_lve->CLIENT_ID;
    $adresses->id_ville = $_POST['mmodville'];
    #vérifier si l'adresse est associée au client courant.
    if (!$adresses->AdresseExiste()) {
      $declarations->id_adres = $adresses->AjouterAdresse();
    }else {
      $adresses->ModifierAdresse($nom_d_utilisateur);
      $declarations->id_adres = $adresses->id;
    }

  #$date = $_POST['mdate'];
  $declarations->colis = $_POST['mcolis'];
  $declarations->poids = $_POST['mpoids'];
  $declarations->valeur = $_POST['mvaleur'];
  $declarations->livraison = $_POST['mlivraison'];
  $declarations->port = $_POST['mport'];
  if ($_POST['mcourrier_typ']=='M') {
    $declarations->courrier_typ ='M';
    $declarations->express = $_POST['mtypliv'];
  }else
    $declarations->courrier_typ =$_POST['affrettyp'];
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
  $declarations->ModifierDeclaration($nom_d_utilisateur);
  header('location:Déclarations');
}
#Modification de la session du client:
if (isset($_POST['codesession'])) {
  $messessions->TrouverSession($_POST['codesession']);
  $messessions->AGENCE_LIB = $_POST['mod_session_lib'];
  if (!empty($_POST['mod_session_pass']))
    $messessions->MOT_D_PASS = sha1($_POST['mod_session_pass']);
    $messessions->ModifierSession($nom_d_utilisateur);
    header('location: Mes_sessions');
}
if (isset($_POST['infos_perso_modif'])) {
  $client_lve->TrouverClient($_POST['infos_perso_modif']);
  $client_lve->NOM = $_POST['nom'];
  $client_lve->PRENOM = $_POST['prenom'];
  $client_lve->mail = $_POST['mail'];
  $client_lve->adresse = $_POST['adresse'];
  $client_lve->telephone = $_POST['telephone'];
  $client_lve->ModifierClient($nom_d_utilisateur);
}
if (isset($_POST['modifier_mdp'])) {
  if ($client_lve->mot_de_passe == sha1($_POST['mdp_actuel'])) {
    if ($_POST['nv_mdp'] == $_POST['confirmation_mdp']) {
        if ($_POST['nv_mdp'] != $_POST['mdp_actuel']) {
          $client_lve->mot_de_passe = sha1($_POST['nv_mdp']);
          $client_lve->ModifierClient($nom_d_utilisateur);
          echo "modifie";
        }else
          echo "Le nouveau mot de passe doit être différent du mot de passe actuel";
    }
    else
      echo "Mot de passe et confirmation non-compatibles";
  }else
    echo "Le Mot de passe actuel est incorrect!";
}


 ?>
