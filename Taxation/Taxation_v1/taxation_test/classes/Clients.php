<?php
require_once("conftaxDB.php");
/**
 *
 */
class Clientss
{

  function __construct()
  {
  }

public function AjouterClient($nom,$prenom,$ville,$adresse,$telephone,$idus){
$conn = $GLOBALS['conn'];
$conn->query("INSERT INTO `client`( `NOM`, `PRENOM`,`CLIENT_ID_client_lve`,`adresse`, `ville`, `telephone`) VALUES ('$nom','$prenom',$idus,'$adresse','$ville','$telephone')");
}

public function insererClient($nom,$prenom,$CIVILITE_COD,$CLIENT_TYP,$IDENTITE_TYP,$IDENTITE_VAL,$ID_FISCALE,$capitalsoc,$creationdate,$clientetat,$motifEt,$SecteurCOD,$EmpID,$SAISIE_DAT,$AgenceCOD,$CLIENT_COD2,$commentaire,$mail,$ICE,$CLIENT_ID_client_lve,$adresse,$ville,$telephone){
$conn = new mysqli('localhost','root','','taxation');
$conn->query("INSERT INTO `client`( `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD2`, `commentaire`, `mail`, `ICE`, `CLIENT_ID_client_lve`, `adresse`, `ville`, `telephone`)  VALUES ('$nom','$prenom','$CIVILITE_COD','$CLIENT_TYP','$IDENTITE_TYP','$IDENTITE_VAL','$ID_FISCALE',$capitalsoc,'$creationdate','$clientetat',$motifEt,$SecteurCOD,$EmpID,'$SAISIE_DAT','$AgenceCOD','$CLIENT_COD2','$commentaire','$mail',$ICE,'$CLIENT_ID_client_lve','$adresse','$ville','$telephone')");
}

public function ModifierProfileClient($nom,$prenom,$telephone,$idclient){
  $conn = $GLOBALS['conn'];
  $conn->query("UPDATE `client` SET  `NOM`= '$nom', `PRENOM`='$prenom', `telephone`='$telephone' WHERE `CLIENT_COD`=".$idclient);
  }
/* Ajouter un client avec le code */
  public function AjouterCl($nom,$prenom,$telephone,$idus,$numero){
  $conn = $GLOBALS['conn'];
  $conn->query("INSERT INTO `client`( `NOM`, `PRENOM`,`CLIENT_COD`,`CLIENT_ID_client_lve`, `telephone`) VALUES ('$nom','$prenom','$numero',$idus,'$telephone')");
  }


public function ModifierClient($nom,$prenom,$CIVILITE_COD,$CLIENT_TYP,$IDENTITE_TYP,$IDENTITE_VAL,$ID_FISCALE,$capitalsoc,$creationdate,$clientetat,$motifEt,$SecteurCOD,$EmpID,$SAISIE_DAT,$AgenceCOD,$CLIENT_COD2,$commentaire,$mail,$ICE,$CLIENT_ID_client_lve,$adresse,$ville,$telephone,$idclient){
  $conn = $GLOBALS['conn'];
  $conn->query("UPDATE `client` SET `NOM`=$nom,`PRENOM`=$prenom,`CIVILITE_COD`=$CIVILITE_COD,`CLIENT_TYP`=$CLIENT_TYP,`IDENTITE_TYP`=$IDENTITE_TYP,`IDENTITE_VAL`=$IDENTITE_VAL,`ID_FISCALE`=$ID_FISCALE,`CAPITAL_SOC`=$capitalsoc,`CREATION_DAT`=$creationdate,`CLIENT_ETA`=$clientetat,`MOTIF_ETA`=$motifEt,`SECTEUR_COD`=$SecteurCOD,`EMPLOYE_ID`=$EmpID,`SAISIE_DAT`=$SAISIE_DAT,`AGENCE_COD`=$AgenceCOD,`CLIENT_COD2`=$CLIENT_COD2,`commentaire`=$commentaire,`mail`=$mail,`ICE`=$ICE,`CLIENT_ID_client_lve`=$CLIENT_ID_client_lve,`adresse`=$adresse,`ville`=$ville,`telephone`=$telephone WHERE `CLIENT_ID`=".$idclient);
  }

public function dernierClient(){
$conn = $GLOBALS['conn'];
  $dercs = $conn->query("SELECT * FROM `client` ORDER BY `CLIENT_ID` DESC LIMIT 1");
  foreach ($dercs as $derc) {
    $cliid = $derc['CLIENT_ID'];
  }
  return $cliid;
}

public function listeClients(){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client`");
    return $clis;
}
/*Les clients des utilisateurs*/
public function mesclient($clilve){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client` WHERE `CLIENT_ID_client_lve` =".$clilve);
    return $clis;
}

public function Clientt($clilve){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client` WHERE `CLIENT_ID` =".$clilve);
    return $clis;
}

/*Archive et suppression du clients des utilisateurs*/

public function supprimerClient($idclient){
  $conn = $GLOBALS['conn'];
  $conn->query("INSERT INTO `clientArchive` SELECT * FROM `client` WHERE `client.CLIENT_ID`='$idclient'");
  $conn->query("DELETE FROM `client` WHERE `CLIENT_ID`=".$idclient);
}

/*verification de l'existance du client avant de l'ajouter ou modifier*/
public function verificationClient($numero,$nom,$prenom,$telephone,$idus){
  $conn = $GLOBALS['conn'];
  $clients = $conn->query("SELECT * FROM `client` WHERE `CLIENT_COD`='$numero'");

  $nbrclis = $clients->num_rows;
  if ($nbrclis > 0) {
    foreach ($clients as $client) {
        $this->ModifierProfileClient($nom,$prenom,$telephone,$numero);
        $der = $client['CLIENT_ID'];
        break;
    }
  }else {
    if ($numero==0) {
      $der = $this->dernierClient();
      $mnum = $der+1;
      $this->AjouterCl($nom,$prenom,$telephone,$idus,$mnum);
      $der = $this->dernierClient();
    }else {
      $this->AjouterCl($nom,$prenom,$telephone,$idus,$numero);
      $der = $this->dernierClient();
    }

  }
return $der;
}

/*les declarations du clients*/
public function declarclients($num){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `declaration_v` WHERE `client2_id` =".$num);
    return $clis;
}

/*Nom du client à partir de son id*/
public function clientID($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client` WHERE `CLIENT_ID`=".$idcli);
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['NOM'];
    }
  }
}

/*code du client à partir de son id*/
public function IDtoCOD($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client` WHERE `CLIENT_ID`=".$idcli);
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['CLIENT_COD'];
    }
  }
}

/*id du client à partir de son code*/
public function CODID($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client` WHERE `CLIENT_COD`='$idcli'");
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['CLIENT_ID'];
    }
  }
}

/*affecter 0 au code client pour les clients de passage*/
public function setNull($id){
    $conn = $GLOBALS['conn'];
    $clis = $conn->query("UPDATE `client` SET `CLIENT_COD`=NULL WHERE `CLIENT_ID`=".$id);
}

/*Nom du client à partir de son code*/
public function CODNOM($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client` WHERE `CLIENT_COD`='$idcli'");
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['NOM'];
    }
  }
}
/*Prénom du client à partir de son code*/
public function CODPRENOM($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client` WHERE `CLIENT_COD`='$idcli'");
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['PRENOM'];
    }
  }
}

/*telephone du client à partir de son code*/
public function CODTEL($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client` WHERE `CLIENT_COD`='$idcli'");
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['telephone'];
    }
  }
}
/*id du client à partir de son nom*/
public function NOMCLIENT($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client_lve` WHERE `NOM`='$idcli'");
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['CLIENT_ID'];
    }
  }
}

/*Code d'utilisateur (client de la voie express) à partir de son id*/
public function CODUSER($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=".$idcli);
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['CLIENT_COD'];
    }
  }
}
/*Nom d'utilisateur (client de la voie express) à partir de son id*/
public function NOMUSER($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=".$idcli);
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['NOM'];
    }
  }
}
public function changerMDP($id,$mdp){
  $conn = $GLOBALS['conn'];
  $conn->query("UPDATE `client_lve` SET `mot_de_passe`='$mdp' WHERE `CLIENT_ID`=".$id);
}
/*Telephone d'utilisateur (client de la voie express) à partir de son id*/
public function TELUSER($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=".$idcli);
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['telephone'];
    }
  }
}
/*Utilisateur actuel*/
public function CurrentUser($idus){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=".$idus);
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    return $clis;
  }
}
/*liste des utilisateurs*/
public function listeUser(){
$conn = $GLOBALS['conn'];
  $liste = $conn->query("SELECT * FROM `client_lve`");
  if ($liste->num_rows > 0) {
    return $liste;
  }
$conn->close();
}
/*ajouter un utilisateur (client de la voie express)*/
public function AjoutUser($CLIENT_COD,$NOM,$PRENOM,$ID_FISCALE,$CAPITAL_SOC,$CLIENT_COD2,$debinterval,$fininterval,$mail,$ICE,$adresse,$ville,$telephone,$login,$mot_de_passe){
$conn = $GLOBALS['conn'];
$conn->query("INSERT INTO `client_lve`(`CLIENT_COD`, `NOM`, `PRENOM`, `ID_FISCALE`, `CAPITAL_SOC`,`CLIENT_COD2`, `debinterval`, `fininterval`,  `mail`, `ICE`, `adresse`, `ville`, `telephone`, `login`, `mot_de_passe`) VALUES ('$CLIENT_COD', '$NOM', '$PRENOM', '$ID_FISCALE', $CAPITAL_SOC,'$CLIENT_COD2', $debinterval, $fininterval,  '$mail', '$ICE', '$adresse', '$ville', '$telephone', '$login', '$mot_de_passe')");
$conn->close();
}
/*modifier un utilisateur (client de la voie express)*/
public function ModifierUser($CLIENT_COD,$NOM,$PRENOM,$ID_FISCALE,$CAPITAL_SOC,$CLIENT_COD2,$debinterval,$fininterval,$mail,$ICE,$adresse,$ville,$telephone){
$conn = $GLOBALS['conn'];
$conn->query("UPDATE `client_lve` SET  `NOM`='$NOM', `PRENOM`='$PRENOM', `ID_FISCALE`='$ID_FISCALE', `CAPITAL_SOC`=$CAPITAL_SOC,`CLIENT_COD2`='$CLIENT_COD2', `debinterval`=$debinterval, `fininterval`=$fininterval,  `mail`='$mail', `ICE`='$ICE', `adresse`='$adresse', `ville`='$ville', `telephone`='$telephone' WHERE `CLIENT_COD`='$CLIENT_COD'");
$conn->close();
}

public function SuppimerUser($id){
$conn = $GLOBALS['conn'];
$conn->query("DELETE FROM `client_lve` WHERE `CLIENT_ID`=".$id);
$conn->close();
}

/*test de la connexion des utilisateurs*/
 public function siconnecte($id){
   $conn = $GLOBALS['conn'];
   $res = $conn->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=".$id);
   foreach ($res as $key) {
     if ($key['IDENTITE_TYP']==='co') {
       return 'co';
     }else {
       return 'de';
     }
   }
 }
/*connecter l'utilisateur*/
 public function connecte($id){
   $conn = $GLOBALS['conn'];
   $res = $conn->query("UPDATE `client_lve` SET `IDENTITE_TYP`='co'  WHERE `CLIENT_ID`=".$id);
 }
/*deconnecter l'utilisateur*/
 public function deconnecte($id){
   $conn = $GLOBALS['conn'];
   $res = $conn->query("UPDATE `client_lve` SET `IDENTITE_TYP`='de'  WHERE `CLIENT_ID`=".$id);
 }

/*Valider l'authentification*/
 public function connectuser($login,$mdpss){
   $conn = $GLOBALS['conn'];
   $res = $conn->query("SELECT * FROM `client_lve` WHERE `login`= '$login' AND `mot_de_passe`='$mdpss'");
   return $res;
 }
/*Connexion d'admin*/
 public function connectadmin($login,$mdpss){
   $conn = $GLOBALS['conn'];
   $res = $conn->query("SELECT * FROM `admin` WHERE `adminname`= '$login' AND `password`='$mdpss'");
   return $res;
 }
 /*Groupe du client*/
 public function Clientgroup($idcli){
$conn = $GLOBALS['conn'];
  $clis = $conn->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=".$idcli);
  $nbrclis = $clis->num_rows;
  if ($nbrclis>0) {
    foreach ($clis as $cli) {
      return $cli['id_groupe'];
    }
  }
}
}
?>
