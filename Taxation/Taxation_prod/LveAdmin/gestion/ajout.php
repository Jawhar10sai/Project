<?php
/*                                        Ajout des adresses                     */
if (isset($_POST['ajout_adresse'])) {
  $adresses = new Adresses;
  $adresses->adresse = $_POST['lib'];
  $adresses->id_client = $_POST['idcli'];
  $adresses->id_user = $_POST['util'];
  $adresses->id_ville = $_POST['vill'];
  $adresses->AjouterAdresse();
  header('location: ../?p=ADAdresses');
}

/*                                        Ajout des agences                     */
if (isset($_POST['ajout_agence'])) {
  $agences->AGENCE_COD = $_POST['code_agence'];
  $agences->AGENCE_LIB = $_POST['lib_agence'];
  $agences->AGENCE_ADRESSE = $_POST['adresse_agence'];
  $agences->AGENCE_TEL = $_POST['tel_agence'];
  $agences->AjouterAgence();
}

/*                                        Ajout des déclarations                     */
if (isset($_POST['ajout_declaration'])) {

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
    $sous_client->ModifierClient();
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
if (isset($_POST['ajout_pr'])) {

}
/*                                        Ajout des utilisateurs                     */
if (isset($_POST['ajout_utilisateur'])) {
  $client_lve->CLIENT_COD = $_POST['codecli'];
  $client_lve->NOM = $_POST['nom'];
  $client_lve->PRENOM = $_POST['prenom'];
  $client_lve->ID_FISCALE = $_POST['idfiscle'];
  $client_lve->CAPITAL_SOC = $_POST['capsoc'];
  $client_lve->CLIENT_COD2 = $_POST['chaininter'];
  $client_lve->debinterval = $_POST['debinter'];
  $client_lve->fininterval = $_POST['fininter'];
  $client_lve->mail = $_POST['contact'];
  $client_lve->ICE = $_POST['ice'];
  $client_lve->adresse = $_POST['adresse'];
  $client_lve->ville = $_POST['ville'];
  $client_lve->telephone = $_POST['telephone'];
  $client_lve->login = $_POST['login'];
  $client_lve->AjouterClient();
}

/*                                        Ajout des villes                     */
if (isset($_POST['ajout_ville'])) {
  $villes->VILLE_COD = $_POST['codvil'];
  $villes->AGENCE_COD = $_POST['AGENCE_COD'];
  $villes->VILLE_LIB = $_POST['VILLE_LIB'];
  $villes->VILLE_TYP = $_POST['VILLE_TYP'];
  $villes->DELAI = $_POST['DELAI'];
  $villes->ZONE_COD = $_POST['ZONE_COD'];
  $villes->AjouterVille();
  header('location: ../?p=ADvilles');
}

/*                                        Ajout des sessions                     */
if (isset($_POST['ajout_session'])) {
  $messessions->AGENCE_LIB = $_POST['nom'];
  $messessions->REFERENCIEE = $_POST['code_user'];
  $messessions->AjouterSession();
    header('location: ../?p=ADuser');
}
