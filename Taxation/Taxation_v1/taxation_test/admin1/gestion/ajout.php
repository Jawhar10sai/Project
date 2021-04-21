<?php
require_once('../../classes/fetchclas.php');
require_once('../../classes/conftaxDB.php');

/*                                        Ajout des adresses                     */
if (isset($_POST['ajout_adresse'])) {
  $lib = $_POST['lib'];
  $idcli = $_POST['idcli'];
  $util = $_POST['util'];
  $vill = $_POST['vill'];
  $adresses->AjouterAdresse($idcli,$lib,$util,$vill);
  header('location: ../?p=ADAdresses');
}

/*                                        Ajout des agences                     */
if (isset($_POST['ajout_agence'])) {
  $code_agence = $_POST['code_agence'];
  $lib_agence = $_POST['lib_agence'];
  $adresse_agence = $_POST['adresse_agence'];
  $tel_agence = $_POST['tel_agence'];
  $conn->query("INSERT INTO `agence`(`AGENCE_COD`, `AGENCE_LIB`, `AGENCE_ADRESSE`, `AGENCE_TEL`) VALUES ($code_agence,'$lib_agence','$adresse_agence','$tel_agence')");
}

/*                                        Ajout des déclarations                     */
if (isset($_POST['ajout_declaration'])) {
  if (empty($_POST['valeur'])) {
    $_POST['valeur']=100;
  }elseif ($_POST['valeur']<4) {
    $_POST['valeur']=4;
  }
  if (empty($_POST['Espece'])) {
    $_POST['Espece']=0;
  }
  if (empty($_POST['Cheque'])) {
    $_POST['Cheque']=0;
  }
  if (empty($_POST['Traite'])) {
    $_POST['Traite']=0;
  }

  if ($_POST['BLstat']=="Non") {
    $_POST['BL']="";
    $Nbre_BL=0;
  }else {
    $nombres = explode(" | ", $_POST['BL']);
    $Nbre_BL=-1;
    foreach ($nombres as $nombre) {
      $Nbre_BL+=1;
    }
  }
  if (empty($_POST['prenom'])) {
    $_POST['prenom'] = "";
  }
  if ($_POST['courrier_typ']=='M') {
    $courrier_typ = 'M';
    $typliv = $_POST['typliv'];
  }else{
    $courrier_typ = $_POST['affrettyp'];
    $typliv = "";
  }
if($_POST['palstat']=="Non"){
 $paletteA=0;
  $paletteB=0;
  $paletteC=0;
}else{
  if (empty($_POST['paletteA'])) {
    $paletteA=0;
  }else {
      $paletteA = $_POST['paletteA'];
  }
  if (empty($_POST['paletteB'])) {
    $paletteB=0;
  }else {
    $paletteB = $_POST['paletteB'];
  }
  if (empty($_POST['paletteC'])) {
    $paletteC=0;
  }else {
    $paletteC = $_POST['paletteC'];
  }
}
  if (empty($_POST['long'])) {
    $long = 0;
  }else {
    $long = $_POST['long'];
  }
  if (empty($_POST['larg'])) {
    $larg = 0;
  }else {
    $larg = $_POST['larg'];
  }
  if (empty($_POST['haut'])) {
    $haut = 0;
  }else {
    $haut = $_POST['haut'];
  }
  $cl =$_POST['codecli'];
  $adr = $_POST['adresse'];
  $declarations->AjouterDeclar(date('Y-m-d'),$_POST['colis'],$_POST['poids'],$paletteA,$paletteB,$paletteC,$long,$haut,$larg,$_POST['valeur'],$cl,$_POST['livraison'],$typliv,$_POST['port'],$courrier_typ,$_POST['nature'],$_SESSION['user_id'],$_POST['Espece'],$_POST['Cheque'],$_POST['Traite'],$Nbre_BL,$_POST['BL'],$adr);
  if ($_POST['codecli']=='0') {
    $clients->setNull($cl);
  }
}
if (isset($_POST['ajout_pr'])) {

}
if (isset($_POST['ajout_reclamation'])){
  if (empty($_POST['codeClient'])) {
  $codeClient ="";
}else {
  $codeClient = $clients->CODID($_POST['codeClient']);
}
	$telFix = $_POST['telFix'];
	$telGSM = $_POST['telGSM'];
	$nDeclaration = $_POST['nDeclaration'];
	$expediteur = $_POST['expediteur'];
	$recTypeObjet = $_POST['recTypeObjet'];
	$recObjet = $_POST['recObjet'];
	$date =  date('Y-m-d');
	$conn->query("INSERT INTO `reclamation`(`date_reclamation`, `idclient`, `objet_reclamation`, `num_declar`, `id_user`, `tpy_reclam`) VALUES('$date' ,$codeClient,'$recObjet','$nDeclaration',$iduser,'$recTypeObjet')");
}
/*                                        Ajout des utilisateurs                     */
if (isset($_POST['ajout_utilisateur'])) {
  $CLIENT_COD = $_POST['codecli'];
  $NOM = $_POST['nom'];
  $PRENOM = $_POST['prenom'];
  $ID_FISCALE = $_POST['idfiscle'];
  $CAPITAL_SOC = $_POST['capsoc'];
  $CLIENT_COD2 = $_POST['chaininter'];
  $debinterval = $_POST['debinter'];
  $fininterval = $_POST['fininter'];
  $mail = $_POST['contact'];
  $ICE = $_POST['ice'];
  $adresse = $_POST['adresse'];
  $ville = $_POST['ville'];
  $telephone = $_POST['telephone'];
  $login = $_POST['login'];
  $mot_de_passe = $_POST['mdpass'];
  $clients->AjoutUser($CLIENT_COD,$NOM,$PRENOM,$ID_FISCALE,$CAPITAL_SOC,$CLIENT_COD2, $debinterval, $fininterval,$mail,$ICE,$adresse,$ville,$telephone,$login,$mot_de_passe);
}

/*                                        Ajout des villes                     */
if (isset($_POST['ajout_ville'])) {
  $codvil = $_POST['codvil'];
  $AGENCE_COD = $_POST['AGENCE_COD'];
  $VILLE_LIB = $_POST['VILLE_LIB'];
  $VILLE_TYP = $_POST['VILLE_TYP'];
  $DELAI = $_POST['DELAI'];
  $ZONE_COD = $_POST['ZONE_COD'];
  #echo "INSERT INTO `ville`(`VILLE_COD`,`AGENCE_COD`, `VILLE_LIB`, `VILLE_TYP`, `DELAI`, `ZONE_COD`) VALUES ($codvil,'$AGENCE_COD','$VILLE_LIB','$VILLE_TYP',$DELAI,'$ZONE_COD')";
  #exit;
  $villes->ajouterVille($codvil,$AGENCE_COD,$VILLE_LIB,$VILLE_TYP,$DELAI,$ZONE_COD);
  header('location: ../?p=ADvilles');
}

/*                                        Ajout des sessions                     */
if (isset($_POST['ajout_session'])) {
    $agences->AjouterAgence($_POST['code_user'],$_POST['nom']);
    header('location: ../?p=ADuser');
}


?>
