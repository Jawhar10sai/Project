<?php
require_once('classes/fetchclas.php');
require_once('classes/conftaxDB.php');
/*------------------------------------------Clients et utilisateurs--------------------------------------*/
if (isset($_POST['modification_complete_utilisateur'])) {
    if ($client_lve->TrouverClientParCode($_POST['modcodecli'])) {
      $client_lve->NOM = $_POST['modnom'];
      $client_lve->PRENOM = $_POST['modprenom'];
      $client_lve->ID_FISCALE = $_POST['modidfiscle'];
      $client_lve->CAPITAL_SOC = $_POST['modcapsoc'];
      $client_lve->mail = $_POST['modcontact'];
      $client_lve->ICE = $_POST['modice'];
      $client_lve->adresse = $_POST['modadresse'];
      $client_lve->ville = $_POST['modville'];
      $client_lve->telephone = $_POST['modtelephone'];
      $client_lve->ModifierClient('Admin');
      header('location: ../Utilisateurs');
    }else {
      echo "introuvable";
    }

}
if (isset($_POST['deconnecter_utilisateur'])) {
    if ($client_lve->TrouverClient($_POST['idclient'])) {
      $client_lve->IDENTITE_TYP = "de";
      $client_lve->ModifierClient('Admin');
          header('location: ../Utilisateurs');
    }else {
      echo "introuvable";
    }
}

if (isset($_POST['modification_interval_utilisateur'])) {
  if ($client_lve->TrouverClient($_POST['id_client'])) {
    $client_lve->CLIENT_COD2 = $_POST['modchaininter'];
    $client_lve->debinterval = $_POST['moddebinter'];
    $client_lve->fininterval = $_POST['modfininter'];
    $client_lve->intervalag_deb = $_POST['moddebinterag'];
    $client_lve->intervalag_fin = $_POST['modfininterag'];
    $client_lve->ModifierClient('Admin');
    header('location: ../Utilisateurs');
  }else {
    echo "introuvable";
  }
}
if (isset($_POST['reinitialiser_utilisateur'])) {
  if ($client_lve->TrouverClient($_POST['idclient'])) {
    $client_lve->RenitialiserClient();
    header('location: ../Utilisateurs');
  }
}

if (isset($_POST['deconnecter_session'])) {
  if ($messessions->TrouverSession($_POST['idclient'])) {
    $messessions->IDENTITE_TYP = "de";
    $messessions->ModifierSession('Admin');
    header('location: ../Utilisateurs');
  }else
    echo "introuvable";
}
/*
#-----------------------------------------Adresse---------------------------------------
if (isset($_POST['modification_adresse'])) {
  $modida = $_POST['modidadd'];
  $modlib = $_POST['modlib'];
  $moduti = $_POST['modutil'];
  $modcli = $_POST['modidcli'];
  $modvil = $_POST['modvill'];
   $adresses->ModifierAdresse($modida,$modcli,$modlib,$moduti,$modvil);
}

#-----------------------------------------Déclarations---------------------------------------
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

#-----------------------------------------Points relais---------------------------------------
if (isset($_POST['modification_pr'])) {
  $id_pr = $_POST['mod_id_pr'];
  $lib_pr = $_POST['mod_lib_pr'];
  $id_ville = $_POST['mod_id_ville'];
  $loc_ver = $_POST['mod_loc_ver'];
  $loc_hor = $_POST['mod_loc_hor'];
  $conn->query("UPDATE `points_relais` SET `lib_pr`='$lib_pr',`id_ville`=$id_ville,`loc_ver`=$loc_ver,`loc_hor`=$loc_hor WHERE `id_pr`=$id_pr");
}

#-----------------------------------------Reclamations---------------------------------------
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

#-----------------------------------------Villes---------------------------------------
if (isset($_POST['modification_ville'])) {
    $codvil = $_POST['modidvil'];
    $AGENCE_COD = $_POST['modcodeag'];
    $VILLE_LIB = $_POST['modvill'];
    $VILLE_TYP = $_POST['modtypvil'];
    $DELAI = $_POST['moddelvil'];
    $ZONE_COD = $_POST['codezone'];

    $villes->ModifierVille($codvil,$AGENCE_COD,$VILLE_LIB,$VILLE_TYP,$DELAI,$ZONE_COD);
    header('location: ../index.php?p=ADvilles');
}

?>
