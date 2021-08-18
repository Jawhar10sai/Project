<?php

include_once "control_utilisateur.php";

if (isset($_POST['ajouter_declaration'])) {
  $declarations = new Declarations;
  # Vérification d'existance du client
  $declarations->client1_id = $client_lve->CLIENT_ID;
  $result = $client_lve->AjouterMonClient($_POST['codecli'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['adresse'], $_POST['ville']);
  if ($result) {
    $declarations->client2_id = $result['id_sous_client'];
    $declarations->id_adres = $result['id_adress'];
  }
  #Ajout de la déclarations
  $declarations->livraison = $_POST['livraison'];
  if ($declaration->livraison != 'p') {
    $declarations->colis = $_POST['colis'];
    $declarations->poids = $_POST['poids'];
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
  } else {
    $declarations->id_cons = $_POST['consigne'];
    $declarations->typecase = $_POST['tail_consigne'];
  }
  if ($_POST['courrier_typ'] == 'M') {
    $declarations->courrier_typ = 'M';
    $declarations->express = $_POST['typliv'];
  } else {
    $declarations->express = NULL;
    $declarations->courrier_typ = $_POST['affrettyp'];
  }
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

#Creation d'un carnet de ramassage
if (isset($_POST['idss'])) {
  if ($client_lve->CreerRamassage($_POST['idss'], $_POST['datera']) != false)
    echo "ramasse";
}

#Iportation des déclarations
if (isset($_POST['importer_declaration'])) {
  if (Declarations::ImporterDeclarations($_FILES['import_excel'], $client_lve))
    echo "importées";
}
