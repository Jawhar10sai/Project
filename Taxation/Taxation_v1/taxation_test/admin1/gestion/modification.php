<?php
require_once('../../classes/fetchclas.php');
require_once('../../classes/conftaxDB.php');
/*------------------------------------------Clients et utilisateurs--------------------------------------*/
if (isset($_POST['modification_complete_utilisateur'])) {
    $CLIENT_COD = $_POST['modcodecli'];
    $NOM = $_POST['modnom'];
    $PRENOM = $_POST['modprenom'];
    $ID_FISCALE = $_POST['modidfiscle'];
    $CAPITAL_SOC = $_POST['modcapsoc'];
    $CLIENT_COD2 = $_POST['modchaininter'];
    $debinterval = $_POST['moddebinter'];
    $fininterval = $_POST['modfininter'];
    $mail = $_POST['modcontact'];
    $ICE = $_POST['modice'];
    $adresse = $_POST['modadresse'];
    $ville = $_POST['modville'];
    $telephone = $_POST['modtelephone'];
    $clients->ModifierUser($CLIENT_COD,$NOM,$PRENOM,$ID_FISCALE,$CAPITAL_SOC,$CLIENT_COD2,$debinterval,$fininterval,$mail,$ICE,$adresse,$ville,$telephone);
    header('location: ../index.php?p=ADuser');
}
if (isset($_POST['modification_personnel_utilisateur'])) {
  $id_client = $_POST['id_client'];
  $NOM = $_POST['modnom'];
  $PRENOM = $_POST['modprenom'];
  $mail = $_POST['modcontact'];
  $adresse = $_POST['modadresse'];
  $ville = $_POST['modville'];
  $telephone = $_POST['modtelephone'];
  $clients->ModifierUserPersonnel($id_client,$NOM,$PRENOM,$mail,$adresse,$ville,$telephone);
  header('location: ../index.php?p=ADuser');
}
if (isset($_POST['modification_professionnel_utilisateur'])) {
  $id_client = $_POST['id_client'];
  $CLIENT_COD = $_POST['modcodecli'];
  $ID_FISCALE = $_POST['modidfiscle'];
  $CAPITAL_SOC = $_POST['modcapsoc'];
  $ICE = $_POST['modice'];
  $clients->ModifierUserProfessionnel($id_client,$CLIENT_COD,$ID_FISCALE,$CAPITAL_SOC,$ICE);
  header('location: ../index.php?p=ADuser');
}
if (isset($_POST['modification_interval_utilisateur'])) {
  $id_client = $_POST['id_client'];
  $CLIENT_COD2 = $_POST['modchaininter'];
  $debinterval = $_POST['moddebinter'];
  $fininterval = $_POST['modfininter'];
  $clients->ModifierUserinterval($id_client,$CLIENT_COD2,$debinterval,$fininterval);
  header('location: ../index.php?p=ADuser');
}
/*-----------------------------------------Adresse---------------------------------------*/
if (isset($_POST['modification_adresse'])) {
  $modida = $_POST['modidadd'];
  $modlib = $_POST['modlib'];
  $moduti = $_POST['modutil'];
  $modcli = $_POST['modidcli'];
  $modvil = $_POST['modvill'];
   $adresses->ModifierAdresse($modida,$modcli,$modlib,$moduti,$modvil);
}

/*-----------------------------------------Agences---------------------------------------*/
if (isset($_POST['modification_agence'])) {
$AGENCE_COD = $_POST['AGENCE_COD'];
$AGENCE_LIB = $_POST['AGENCE_LIB'];
$AGENCE_ADRESSE = $_POST['AGENCE_ADRESSE'];
$AGENCE_TEL = $_POST['AGENCE_TEL'];
$conn->query("UPDATE `agence` SET `AGENCE_LIB`='$AGENCE_LIB',`AGENCE_ADRESSE`='$AGENCE_ADRESSE',`AGENCE_TEL`='$AGENCE_TEL' WHERE `AGENCE_COD`=$AGENCE_COD");
}

/*-----------------------------------------Déclarations---------------------------------------*/
if (isset($_POST['modification_declaration'])) {
  if (isset($_POST['mexpress'])) {
    $express = "X";
  }else {
    $express = "S";
  }
  $date = $_POST['mdate'];
  $colis = $_POST['mcolis'];
  $poids = $_POST['mpoids'];
  $valeur = $_POST['mvaleur'];
  $client2_id = $clients->CODID($_POST['mclient']);
  $livraison = $_POST['mlivraison'];
  $port = $_POST['mport'];
  $courrier_typ = $_POST['mcourrier_typ'];
  $nature = $_POST['mnature'];
  $Espece = $_POST['mEspece'];
  $Cheque = $_POST['mCheque'];
  $Traite = $_POST['mTraite'];
  $BL = $_POST['mBL'];
  $numero = $_POST['mnumero'];
  $mlong = $_POST['mlong'];
  $mlarg = $_POST['mlarg'];
  $mhaut = $_POST['mhaut'];
  $mpaletteA = $_POST['mpaletteA'];
  $mpaletteB = $_POST['mpaletteB'];
  $mpaletteC = $_POST['mpaletteC'];
  $cl = $clients->verificationClient($_POST['mclient'],$_POST['mmodnom'],$_POST['mmodprenom'],$villes->VilleID($_POST['mmodville']),$_POST['mmodtelephone'],$_SESSION['user_id']);
  $adr = $adresses->verifieradresse($cl,$_POST['mmodadresse'],$_SESSION['user_id'],$villes->VilleID($_POST['mmodville']));
  $modf = $declarations->ModifierDeclar($numero,$date,$colis,$poids,$mpaletteA,$mpaletteB,$mpaletteC,$mlong,$mlarg,$mhaut,$valeur,$cl,$livraison,$express,$port,$courrier_typ,$nature,$Espece,$Cheque,$Traite,$BL,$adr);
}

/*-----------------------------------------Points relais---------------------------------------*/
if (isset($_POST['modification_pr'])) {
  $id_pr = $_POST['mod_id_pr'];
  $lib_pr = $_POST['mod_lib_pr'];
  $id_ville = $_POST['mod_id_ville'];
  $loc_ver = $_POST['mod_loc_ver'];
  $loc_hor = $_POST['mod_loc_hor'];
  $conn->query("UPDATE `points_relais` SET `lib_pr`='$lib_pr',`id_ville`=$id_ville,`loc_ver`=$loc_ver,`loc_hor`=$loc_hor WHERE `id_pr`=$id_pr");
}

/*-----------------------------------------Reclamations---------------------------------------*/
if (isset($_POST['modification_reclamation'])) {
  $id_reclamation = $_POST['mod_id_rec'];
  $date = $_POST['mod_date'];
  $codeClient = $_POST['mod_codeClient'];
  $recObjet = $_POST['mod_recObjet'];
  $nDeclaration = $_POST['mod_nDeclaration'];
  $iduser = $_POST['mod_iduser'];
  $recTypeObjet = $_POST['mod_recTypeObjet'];
  $conn->query("UPDATE `reclamation` SET `date_reclamation`='$date',`idclient`=$codeClient,`num_declar`='$recObjet',`objet_reclamation`='$nDeclaration',`id_user`=$iduser,`tpy_reclam`='$recTypeObjet' WHERE `id_reclamation`=$id_reclamation");
}

/*-----------------------------------------Villes---------------------------------------*/
if (isset($_POST['modification_ville'])) {
    $codvil = $_POST['modidvil'];
    $AGENCE_COD = $_POST['modcodeag'];
    $VILLE_LIB = $_POST['modvill'];
    $VILLE_TYP = $_POST['modtypvil'];
    $DELAI = $_POST['moddelvil'];
    $ZONE_COD = $_POST['codezone'];
    /*echo "UPDATE `ville` SET `AGENCE_COD`='$AGENCE_COD',`VILLE_LIB`='$VILLE_LIB',`VILLE_TYP`='$VILLE_TYP',`DELAI`=$DELAI,`ZONE_COD`='$ZONE_COD' WHERE `VILLE_COD`=".$codvil;
    exit;*/
    $villes->ModifierVille($codvil,$AGENCE_COD,$VILLE_LIB,$VILLE_TYP,$DELAI,$ZONE_COD);
    header('location: ../index.php?p=ADvilles');
}

/*-----------------------------------------Sessions---------------------------------------*/
if (isset($_POST['modification_session'])) {
  $agences->ModifierSession($_POST['code_session'],$_POST['code_user'],$_POST['nom']);
}
?>
