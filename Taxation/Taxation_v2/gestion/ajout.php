<?php
include_once "classes/fetchclas.php";
include_once "control_utilisateur.php";
if (isset($_POST['ajouter_declaration'])) {
  # Vérification d'existance du client
  $declarations->client1_id = $client_lve->CLIENT_ID;
  $declarations->userid = $client_lve->CLIENT_ID;
  if (!$sous_client->TrouverClientParCode($_POST['codecli'])) {
    $sous_client->CLIENT_COD = $_POST['codecli'];
    $sous_client->NOM = $_POST['nom'];
    $sous_client->PRENOM = $_POST['prenom'];
    $sous_client->telephone = $_POST['telephone'];
    $sous_client->id_user = $client_lve->CLIENT_ID;
    // a verifer :
    $declarations->client2_id = $sous_client->AjouterClient();
  }else {
    $sous_client->NOM = $_POST['nom'];
    $sous_client->PRENOM = $_POST['prenom'];
    $sous_client->telephone = $_POST['telephone'];
    $sous_client->ModifierClient($sous_client->NOM);
    $declarations->client2_id = $sous_client->CLIENT_ID;
  }
  # Vérification de l'adresse du client
    $adresses->adresse = $_POST['adresse'];
    $adresses->id_client = $sous_client->CLIENT_ID;
    $adresses->id_user = $client_lve->CLIENT_ID;
    $adresses->id_ville = $_POST['ville'];
    if (!$adresses->AdresseExiste()) {
      $declarations->id_adres = $adresses->AjouterAdresse();
    }else {
      $declarations->id_adres = $adresses->id;
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
    if ($_POST['courrier_typ']=='M') {
      $declarations->courrier_typ ='M';
      $declarations->express = $_POST['typliv'];
    }else{
      $declarations->express = NULL;
      $declarations->courrier_typ =$_POST['affrettyp'];
    }
    $declarations->port = $_POST['port'];
    $declarations->nature = $_POST['nature'];
    if (!empty($_POST['Espece']))
      $declarations->Espece = $_POST['Espece'];
    if (!empty($_POST['Cheque']))
      $declarations->Cheque = $_POST['Cheque'];
    if (!empty($_POST['Traite']))
      $declarations->Traite = $_POST['Traite'];
    if ($_POST['BLstat']=="Non") {
      $_POST['BL']="";
      $declarations->Nbre_BL =0;
    }else {
      $nombres = explode(" | ", $_POST['BL']);
      $declarations->Nbre_BL =-1;
      foreach ($nombres as $nombre) {
        $declarations->Nbre_BL +=1;
      }
    }
  $declarations->BL = $_POST['BL'];
  $declarations->AjouterDeclaration();
  if ($sous_client->CLIENT_COD==0)
    $sous_client->setNull();
}
if (isset($_POST['ajouter_session'])) {
  $messessions->AGENCE_LIB = $_POST['lib_session'];
  $messessions->REFERENCIEE = $client_lve->CLIENT_ID;
  $messessions->AjouterSession();
}
if (isset($_POST['valider_carnet'])) {
  if($_POST['codrams']!=$client_lve->coderamassageEncours()){
    echo "Code erroné";
  }elseif ($_POST['codrams']==$client_lve->coderamassageEncours()) {
      $carnet = $client_lve->carnetEncours();
      $conn->query("UPDATE `panierramasse` SET `etat`='annule',`date_modification`=now() WHERE `numeroCarnet`=".$client_lve->carnetEncours());
      foreach ($_POST['numeros'] as $key) {
        $declarations->TrouverDeclaration($key);
        $declarations->validerRamassage($carnet);
      }
      $valide = $conn->query("UPDATE `ramasse` SET `code_ramassage`='0' WHERE `numeroCarnet`=".$carnet);
      if ($valide) {
       echo $carnet;
        #header('location: impcarnet.php?numero='.$carnet);
      }
    }
}
if (isset($_POST['ajouter_reclamation'])) {
  $reclamations->user = $client_lve->CLIENT_ID;
  $reclamations->telFix = $_POST['telFix'];
  $reclamations->telGSM = $_POST['telGSM'];
  $reclamations->numero = $_POST['nDeclaration'];
  $reclamations->typeutil = $_POST['expediteur'];
  $reclamations->client = $_POST['client'];
  $reclamations->recTypeObjet = $_POST['recTypeObjet'];
  $reclamations->recObjet = $_POST['recObjet'];
  $reclamations->AjouterReclamation();
  echo "reclame";
}

 ?>
