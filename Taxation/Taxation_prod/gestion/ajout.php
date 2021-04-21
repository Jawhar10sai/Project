<?php

include_once "control_utilisateur.php";

if (isset($_POST['ajouter_declaration'])) {
  $declarations = new Declarations;
  # Vérification d'existance du client
  $declarations->client1_id = $client_lve->CLIENT_ID;
  $declarations->userid = $client_lve->CLIENT_ID;
  $sous_client = $client_lve->MonClient($_POST['codecli']);

  if (!$sous_client) {
    $sous_client = new SousClient;
    $sous_client->CLIENT_COD = $_POST['codecli'];
    $sous_client->NOM = $_POST['nom'];
    $sous_client->PRENOM = $_POST['prenom'];
    $sous_client->telephone = $_POST['telephone'];
    $sous_client->CLIENT_ID_client_lve = $client_lve->CLIENT_ID;
    $declarations->client2_id = $sous_client->Enregistrer();
  } else {
    // Modification
    $sous_client->NOM = $_POST['nom'];
    $sous_client->PRENOM = $_POST['prenom'];
    $sous_client->telephone = $_POST['telephone'];
    $sous_client->commit_par = $client_lve->NOM;
    $sous_client->Enregistrer();
    $declarations->client2_id = $sous_client->CLIENT_ID;
  }
  # Vérification de l'adresse du client
  $adresses = Adresses::AdresseExiste($sous_client->CLIENT_ID, $_POST['adresse']);
  if ($adresses)
    $declarations->id_adres = $adresses->id_adresse;
  else {
    $adresses = new Adresses;
    $adresses->lib_adresse = $_POST['adresse'];
    $adresses->id_client = $declarations->client2_id;
    $adresses->id_user = $client_lve->CLIENT_ID;
    $adresses->id_ville = $_POST['ville'];
    $adresses->commit_par = $client_lve->NOM;
    $declarations->id_adres = $adresses->AjouterAdresse();
  }
  #Ajout de la déclarations
  $declarations->colis = $_POST['colis'];
  $declarations->poids = $_POST['poids'];
  if (!empty($_POST['paletteA']))
    $declarations->paletteA = $_POST['paletteA'];
  if (!empty($_POST['paletteB']))
    $declarations->paletteB = $_POST['paletteB'];
  if (!empty($_POST['paletteC']))
    $declarations->paletteC = $_POST['paletteC'];
  if (!empty($_POST['long']))
    $declarations->long = $_POST['long'];
  if (!empty($_POST['larg']))
    $declarations->larg = $_POST['larg'];
  if (!empty($_POST['haut']))
    $declarations->haut = $_POST['haut'];
  if (!empty($_POST['valeur']))
    $declarations->valeur = $_POST['valeur'];
  $declarations->livraison = $_POST['livraison'];

  if ($_POST['courrier_typ'] == 'M') {
    $declarations->courrier_typ = 'M';
    $declarations->express = $_POST['typliv'];
  } else {
    $declarations->express = NULL;
    $declarations->courrier_typ = $_POST['affrettyp'];
  }
  $declarations->port = $_POST['port'];
  $declarations->nature = $_POST['nature'];
  if (!empty($_POST['Espece']))
    $declarations->Espece = $_POST['Espece'];
  if (!empty($_POST['Cheque']))
    $declarations->Cheque = $_POST['Cheque'];
  if (!empty($_POST['Traite']))
    $declarations->Traite = $_POST['Traite'];
  if ($_POST['BLstat'] == "Non") {
    $_POST['BL'] = "";
    $declarations->Nbre_BL = 0;
  } else {
    $nombres = explode(" | ", $_POST['BL']);
    $declarations->Nbre_BL = -1;
    foreach ($nombres as $nombre) {
      $declarations->Nbre_BL += 1;
    }
  }
  $declarations->BL = $_POST['BL'];
  $declarations->AjouterDeclaration();
}

if (isset($_POST['ajouter_session'])) {
  $messessions = new ClientSession;
  $messessions->AGENCE_LIB = $_POST['lib_session'];
  $messessions->REFERENCIEE = $client_lve->CLIENT_ID;
  $messessions->commit_par = $client_lve->NOM;
  $messessions->AjouterSession();
}

if (isset($_POST['valider_carnet'])) {
  $client_lve->ValiderCarnet($_POST['codrams'], $_POST['numeros']);
}

if (isset($_POST['ajouter_reclamation'])) {
  $reclamation = new Reclamations;
  $reclamation->user = $client_lve->CLIENT_ID;
  $reclamation->telFix = $_POST['telFix'];
  $reclamation->telGSM = $_POST['telGSM'];
  $reclamation->numero = $_POST['nDeclaration'];
  $reclamation->typeutil = $_POST['expediteur'];
  $reclamation->client = $_POST['client'];
  $reclamation->recTypeObjet = $_POST['recTypeObjet'];
  $reclamation->recObjet = $_POST['recObjet'];
  if ($reclamation->AjouterReclamation())
    echo "reclame";
}
