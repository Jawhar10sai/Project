<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Clients
{
  public $CLIENT_ID, $CLIENT_COD, $NOM, $PRENOM, $CIVILITE_COD, $CLIENT_TYP, $IDENTITE_TYP, $IDENTITE_VAL, $ID_FISCALE, $CAPITAL_SOC, $CREATION_DAT, $CLIENT_ETA, $MOTIF_ETA, $SECTEUR_COD, $EMPLOYE_ID, $SAISIE_DAT, $AGENCE_COD, $commentaire, $mail, $ICE, $telephone;
  protected $connection;

  function __construct()
  {
    $this->CLIENT_ID = NULL;
    $this->CLIENT_COD = "";
    $this->NOM = "";
    $this->PRENOM = "";
    $this->CIVILITE_COD = "";
    $this->CLIENT_TYP = "";
    $this->IDENTITE_TYP = "de";
    $this->IDENTITE_VAL = "";
    $this->ID_FISCALE = "";
    $this->CAPITAL_SOC = 0;
    $this->CREATION_DAT = date('Y-m-d');
    $this->CLIENT_ETA = "";
    $this->MOTIF_ETA = 0;
    $this->SECTEUR_COD = "";
    $this->EMPLOYE_ID = 0;
    $this->SAISIE_DAT = date('Y-m-d');
    $this->AGENCE_COD = "";
    $this->commentaire = "";
    $this->mail = "";
    $this->ICE = "";
    $this->telephone = "";
    $this->modifie_le = NULL;
    $this->supprime_le = NULL;
    $this->commit_par = NULL;
  }

  public function MesDeclarations()
  {
    $client = (get_class($this) == 'ClientLve') ? "client1_id" : "client2_id";
    return Declarations::DeclarationsClient($client, $this->CLIENT_ID);
  }
  #Les déclarations non-ramassées de l'utilisateur connecté
  public function MesDNR()
  {
    return Declarations::DeclarationNonRamassees($this->CLIENT_ID);
  }

  public function SupprimerClient()
  {
    if (!$this->commit_par)
      $this->commit_par = "admin";
    $client = (get_class($this) == 'ClientLve') ? "client_lve" : "client";
    $liste_modif = array(':commit_par' => $this->commit_par, ':code' => $this->CLIENT_COD);
    $stmt = Connection::getConnection()->prepare("UPDATE " . $client . " SET `supprime_le`=NOW(), `commit_par`=:commit_par WHERE `CLIENT_COD`=:code");
    $stmt->execute($liste_modif);
  }
}
/**
 * ############################################### Client  #############################################
 */
class ClientLve extends Clients
{
  function __construct()
  {
    parent::__construct();
    $this->CLIENT_COD2 = "E0000";
    $this->debinterval = 50000;
    $this->fininterval = 50200;
    $this->intervalag_deb = 50000;
    $this->intervalag_fin = 50020;
    $this->ville = NULL;
    $this->login = NULL;
    $this->mot_de_passe = "12345678";

    $this->adresse = NULL;
  }
  public static function ListeClients()
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `client_lve` WHERE `supprime_le` IS NULL")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }
  public static function ExistanceClient($code, $nom, $prenom)
  {
    $liste_recherche = array(
      ':code' => $code,
      ':nom' => $nom,
      ':prenom' => $prenom
    );
    $result = Connection::getConnection()
      ->prepare("SELECT * FROM `client_lve` WHERE `CLIENT_COD`=:code AND `NOM`=:nom AND `PRENOM`=:prenom AND `supprime_le` IS NULL LIMIT 1");
    if ($result->execute($liste_recherche)) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function VerifierCompte($login, $mot_de_passe)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client_lve` WHERE `login`=? AND `mot_de_passe`=? AND `supprime_le` IS NULL");
    if ($result->execute([$login, $mot_de_passe])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function TrouverClient($id)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=? AND `supprime_le` IS NULL");
    if ($result->execute([$id])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function TrouverClientParCode($code)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client_lve` WHERE `CLIENT_COD`=?");
    if ($result->execute([$code])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public function MesSessions()
  {
    return ClientSession::SessionsUtilisateur($this->CLIENT_ID);
  }
  public function MesTopDeclarations()
  {
    return Declarations::TopDeclarationUtilisateur($this->CLIENT_ID);
  }
  public function MesDeclarationsARamassees()
  {
    return Declarations::DeclarationsUtilisateurAramassees($this->CLIENT_ID);
  }
  #déclaration d'un utilisateur donné
  public function MaDeclaration($code)
  {
    return Declarations::DeclarationUtilisateur($code, $this->CLIENT_ID);
  }
  private function AjouterClient()
  {
    $con = Connection::getConnection();
    $liste_ajout = array(
      ':CLIENT_COD' => $this->CLIENT_COD,
      ':NOM' => $this->NOM,
      ':PRENOM' => $this->PRENOM,
      ':CIVILITE_COD' => $this->CIVILITE_COD,
      ':CLIENT_TYP' => $this->CLIENT_TYP,
      ':IDENTITE_TYP' => $this->IDENTITE_TYP,
      ':IDENTITE_VAL' => $this->IDENTITE_VAL,
      ':ID_FISCALE' => $this->ID_FISCALE,
      ':CAPITAL_SOC' => $this->CAPITAL_SOC,
      ':CREATION_DAT' => $this->CREATION_DAT,
      ':CLIENT_ETA' => $this->CLIENT_ETA,
      ':MOTIF_ETA' => $this->MOTIF_ETA,
      ':SECTEUR_COD' => $this->SECTEUR_COD,
      ':EMPLOYE_ID' => $this->EMPLOYE_ID,
      ':SAISIE_DAT' => $this->SAISIE_DAT,
      ':AGENCE_COD' => $this->AGENCE_COD,
      ':CLIENT_COD2' => $this->CLIENT_COD2,
      ':debinterval' => $this->debinterval,
      ':fininterval' => $this->fininterval,
      ':intervalag_deb' => $this->intervalag_deb,
      ':intervalag_fin' => $this->intervalag_fin,
      ':commentaire' => $this->commentaire,
      ':mail' => $this->mail,
      ':ICE' => $this->ICE,
      ':adresse' => $this->adresse,
      ':ville' => $this->ville,
      ':telephone' => $this->telephone,
      ':login' => $this->login,
      ':mot_de_passe' => sha1($this->mot_de_passe)
    );
    $stmt = $con->prepare("INSERT INTO `client_lve`( `CLIENT_COD`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD2`, `debinterval`, `fininterval`, `intervalag_deb`, `intervalag_fin`, `commentaire`, `mail`, `ICE`, `adresse`, `ville`, `telephone`, `login`, `mot_de_passe`) VALUES ( :CLIENT_COD, :NOM, :PRENOM, :CIVILITE_COD, :CLIENT_TYP, :IDENTITE_TYP, :IDENTITE_VAL, :ID_FISCALE, :CAPITAL_SOC, :CREATION_DAT, :CLIENT_ETA, :MOTIF_ETA, :SECTEUR_COD, :EMPLOYE_ID, :SAISIE_DAT, :AGENCE_COD, :CLIENT_COD2, :debinterval, :fininterval, :intervalag_deb, :intervalag_fin, :commentaire, :mail, :ICE, :adresse, :ville, :telephone, :login, :mot_de_passe)");
    if ($stmt->execute($liste_ajout))
      return $con->lastInsertId();
    else
      return false;
  }
  private function ModifierClient()
  {

    $liste_modif = array(
      ':CLIENT_ID' => ($this->CLIENT_ID == '') ? NULL : $this->CLIENT_ID,
      ':CLIENT_COD' => ($this->CLIENT_COD == '') ? NULL : $this->CLIENT_COD,
      ':NOM' => ($this->NOM == '') ? NULL : $this->NOM,
      ':PRENOM' => ($this->PRENOM == '') ? NULL : $this->PRENOM,
      ':CIVILITE_COD' => ($this->CIVILITE_COD == '') ? NULL : $this->CIVILITE_COD,
      ':CLIENT_TYP' => ($this->CLIENT_TYP == '') ? NULL : $this->CLIENT_TYP,
      ':IDENTITE_TYP' => ($this->IDENTITE_TYP == '') ? NULL : $this->IDENTITE_TYP,
      ':IDENTITE_VAL' => ($this->IDENTITE_VAL == '') ? NULL : $this->IDENTITE_VAL,
      ':ID_FISCALE' => ($this->ID_FISCALE == '') ? NULL : $this->ID_FISCALE,
      ':CAPITAL_SOC' => ($this->CAPITAL_SOC == '') ? NULL : $this->CAPITAL_SOC,
      ':CREATION_DAT' => ($this->CREATION_DAT == '') ? NULL : $this->CREATION_DAT,
      ':CLIENT_ETA' => ($this->CLIENT_ETA == '') ? NULL : $this->CLIENT_ETA,
      ':MOTIF_ETA' => ($this->MOTIF_ETA == '') ? NULL : $this->MOTIF_ETA,
      ':SECTEUR_COD' => ($this->SECTEUR_COD == '') ? NULL : $this->SECTEUR_COD,
      ':EMPLOYE_ID' => ($this->EMPLOYE_ID == '') ? NULL : $this->EMPLOYE_ID,
      ':SAISIE_DAT' => ($this->SAISIE_DAT == '') ? NULL : $this->SAISIE_DAT,
      ':AGENCE_COD' => ($this->AGENCE_COD == '') ? NULL : $this->AGENCE_COD,
      ':CLIENT_COD2' => ($this->CLIENT_COD2 == '') ? NULL : $this->CLIENT_COD2,
      ':debinterval' => ($this->debinterval == '') ? NULL : $this->debinterval,
      ':fininterval' => ($this->fininterval == '') ? NULL : $this->fininterval,
      ':intervalag_deb' => ($this->intervalag_deb == '') ? NULL : $this->intervalag_deb,
      ':intervalag_fin' => ($this->intervalag_fin == '') ? NULL : $this->intervalag_fin,
      ':commentaire' => ($this->commentaire == '') ? NULL : $this->commentaire,
      ':mail' => ($this->mail == '') ? NULL : $this->mail,
      ':ICE' => ($this->ICE == '') ? NULL : $this->ICE,
      ':adresse' => ($this->adresse == '') ? NULL : $this->adresse,
      ':ville' => ($this->ville == '') ? NULL : $this->ville,
      ':telephone' => ($this->telephone == '') ? NULL : $this->telephone,
      ':login' => ($this->login == '') ? NULL : $this->login,
      ':mot_de_passe' => ($this->mot_de_passe == '') ? NULL : $this->mot_de_passe,
      ':commit_par' => ($this->commit_par == '') ? NULL : $this->commit_par
    );
    $stmt = Connection::getConnection()
      ->prepare("UPDATE `client_lve` SET `CLIENT_COD`=:CLIENT_COD,`NOM`=:NOM,`PRENOM`=:PRENOM,`CIVILITE_COD`=:CIVILITE_COD,`CLIENT_TYP`=:CLIENT_TYP,`IDENTITE_TYP`=:IDENTITE_TYP,`IDENTITE_VAL`=:IDENTITE_VAL,`ID_FISCALE`=:ID_FISCALE,`CAPITAL_SOC`=:CAPITAL_SOC,`CREATION_DAT`=:CREATION_DAT,`CLIENT_ETA`=:CLIENT_ETA,`MOTIF_ETA`=:MOTIF_ETA,`SECTEUR_COD`=:SECTEUR_COD,`EMPLOYE_ID`=:EMPLOYE_ID,`SAISIE_DAT`=:SAISIE_DAT,`AGENCE_COD`=:AGENCE_COD,`CLIENT_COD2`=:CLIENT_COD2,`debinterval`=:debinterval,`fininterval`=:fininterval,`intervalag_deb`=:intervalag_deb,`intervalag_fin`=:intervalag_fin,`commentaire`=:commentaire,`mail`=:mail,`ICE`=:ICE,`adresse`=:adresse,`ville`=:ville,`telephone`=:telephone,`login`=:login,`mot_de_passe`=:mot_de_passe,`modifie_le`=now(),`commit_par`=:commit_par WHERE `CLIENT_ID`=:CLIENT_ID");
    #print_r($liste_modif);
    /*$stmt->bindParam(':CLIENT_ID', $this->CLIENT_ID, PDO::PARAM_INT);
    $stmt->bindParam(':CLIENT_COD', $this->CLIENT_COD);
    $stmt->bindParam(':NOM', $this->NOM);
    $stmt->bindParam(':PRENOM', $this->PRENOM);
    $stmt->bindParam(':CIVILITE_COD', $this->CIVILITE_COD);
    $stmt->bindParam(':CLIENT_TYP', $this->CLIENT_TYP);
    $stmt->bindParam(':IDENTITE_TYP', $this->IDENTITE_TYP);
    $stmt->bindParam(':IDENTITE_VAL', $this->IDENTITE_VAL);
    $stmt->bindParam(':ID_FISCALE', $this->ID_FISCALE);
    $stmt->bindParam(':CAPITAL_SOC', $this->CAPITAL_SOC);
    $stmt->bindParam(':CREATION_DAT', $this->CREATION_DAT);
    $stmt->bindParam(':CLIENT_ETA', $this->CLIENT_ETA);
    $stmt->bindParam(':MOTIF_ETA', $this->MOTIF_ETA, PDO::PARAM_INT);
    $stmt->bindParam(':SECTEUR_COD', $this->SECTEUR_COD);
    $stmt->bindParam(':EMPLOYE_ID', $this->EMPLOYE_ID, PDO::PARAM_INT);
    $stmt->bindParam(':SAISIE_DAT', $this->SAISIE_DAT);
    $stmt->bindParam(':AGENCE_COD', $this->AGENCE_COD);
    $stmt->bindParam(':CLIENT_COD2', $this->CLIENT_COD2);
    $stmt->bindParam(':debinterval', $this->debinterval, PDO::PARAM_INT);
    $stmt->bindParam(':fininterval', $this->fininterval, PDO::PARAM_INT);
    $stmt->bindParam(':intervalag_deb', $this->intervalag_deb, PDO::PARAM_INT);
    $stmt->bindParam(':intervalag_fin', $this->intervalag_fin, PDO::PARAM_INT);
    $stmt->bindParam(':commentaire', $this->commentaire);
    $stmt->bindParam(':mail', $this->mail);
    $stmt->bindParam(':ICE', $this->ICE);
    $stmt->bindParam(':adresse', $this->adresse);
    $stmt->bindParam(':ville', $this->ville);
    $stmt->bindParam(':telephone', $this->telephone);
    $stmt->bindParam(':login', $this->login);
    $stmt->bindParam(':mot_de_passe', $this->mot_de_passe);
    $stmt->bindParam(':commit_par', $this->commit_par);*/
    /*try {
      if ($stmt->execute())
        //echo $stmt->debugDumpParams();
        echo "done!";
      else
        echo $stmt->debugDumpParams();
      exit;
    } catch (PDOException $e) {
      echo $stmt->debugDumpParams();
      echo $e->getMessage();
    }*/
    /*if ($stmt->execute())
      echo $stmt->debugDumpParams();
    else
      echo $stmt->debugDumpParams();
    exit;*/
    return (($stmt->execute($liste_modif))) ? true : false;
  }
  public function Enregistrer()
  {
    if ($this->CLIENT_ID != NULL)
      $this->ModifierClient();
    else
      $this->AjouterClient();
  }
  /*
  public function ConnecterClient()
  {
    Connection::getConnection()->query("UPDATE `client_lve` SET `IDENTITE_TYP`='co' WHERE `CLIENT_ID`=$this->CLIENT_ID");
  }*/
  public function DeconnecterClient()
  {
    Connection::getConnection()->query("UPDATE `client_lve` SET `IDENTITE_TYP`='de' WHERE `CLIENT_ID`=$this->CLIENT_ID");
  }
  public function carnetEncours()
  {
    $declars = Connection::getConnection()
      ->prepare("SELECT * FROM `panierramasse` WHERE `etat`='En cours' AND `numeroCarnet` in(SELECT `numeroCarnet` FROM `ramasse` WHERE `user_id`=?)");
    if ($declars->execute([$this->CLIENT_ID]))
      return $declars->fetchObject()->numeroCarnet;
    else
      return 'nouv';
  }
  #Code de ramassage du carnet en cours et qui n'est pas encore validé
  public function coderamassageEncours()
  {
    $declars = Connection::getConnection()
      ->prepare("SELECT * FROM `ramasse` WHERE `numeroCarnet` in(SELECT `numeroCarnet` FROM `panierramasse` WHERE `etat`='En cours')  AND `user_id`=? AND `supprime_le`IS NULL");
    if ($declars->execute([$this->CLIENT_ID]))
      return $declars->fetchObject()->code_ramassage;
    else
      return false;
  }

  public function EnvoyerMailRamassage($code)
  {
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'lavoieexpressmaroc@gmail.com';
      $mail->Password   = 'L@voieexpre$$96';
      $mail->SMTPSecure = "ssl";
      $mail->Port       = 465;
      $mail->setFrom('lavoieexpressmaroc@gmail.com', 'Reclamation');
      $mail->addAddress('j.hassou@lavoieexpress.ma', 'Jawhar HASSOU');
      #$mail->addCC('s.zaki@lavoieexpress.ma');
      $mail->isHTML(true);
      $mail->Subject = 'Ramassage du client ' . $this->NOM;
      $body = "Bonjour,<br /><br />Je tiens a vous informer que le client " . $this->NOM . " - " . $this->CLIENT_COD . " a une nouvelle demande de ramassage,
       merci de la prendre en consideration, vous trouverez ci-dessous les informations necessaires pour effectuer cette operation au bonnes conditions:";
      $body .= "<h5> Code de ramassage : " . $code . "</h5>";
      $body .= "<h5> Numero de telephone : " . $this->telephone . "</h5>";
      $body .= "Cordialement.";
      $mail->Body    = $body;
      return ($mail->send()) ? true : false;
    } catch (Exception $e) {
      return false;
    }
  }

  public function CreerRamassage($declarations, $date)
  {
    $dateram = date('Y-m-d', strtotime(date($date)));
    $rand = ($this->CLIENT_COD == '15443') ? 554488 : rand(1, 500000);
    if (!$this->carnetEncours()) {
      $carnet = Connection::getConnection()->prepare("INSERT INTO `ramasse`(`dateramassage`, `user_id`,`code_ramassage`) VALUES (?,?,?)");
      if ($carnet->execute([$dateram, $this->CLIENT_ID, $rand])) {
        $last_id = Connection::getConnection()->query("SELECT * from `ramasse` ORDER BY `numeroCarnet` desc LIMIT 1")->fetchObject()->numeroCarnet;
        $this->EnvoyerMailRamassage($rand);
      }
    } else
      $last_id = $this->carnetEncours();
    foreach ($declarations as $declaration) {
      $stmt = Connection::getConnection()->prepare("INSERT INTO `panierramasse`(`numeroCarnet`,`declaration`) VALUES(?,?)");
      if (!$stmt->execute([$last_id, $declaration]))
        return false;
    }
    return true;
  }

  public function AnnulerCarnet($motif)
  {
    $carnet = $this->carnetEncours();
    $motif = (!empty($motif)) ? $motif : 'Retard';
    $stmt = Connection::getConnection()->prepare("UPDATE `panierramasse` SET `etat`='annule',`date_modification`=now(),`motif_annulation`=? WHERE `numeroCarnet`=?");
    if ($stmt->execute([$motif, $carnet])) {
      $valide = Connection::getConnection()->prepare("UPDATE `ramasse` SET `code_ramassage`='0' WHERE `numeroCarnet`=?");
      return ($valide->execute([$carnet])) ? true : false;
    } else
      return false;
  }
  # Mes Clients
  public function MesClient()
  {
    return SousClient::ClientsUtilisateur($this->CLIENT_ID);
  }
  public function MonClient($client)
  {
    return SousClient::CodeClientUtilisateur($client, $this->CLIENT_ID);
  }
  public function MonClientParID($client)
  {
    return SousClient::IdClientUtilisateur($client, $this->CLIENT_ID);
  }
  public function MonClientParNom($nom)
  {
    return SousClient::NomClientUtilisateur($nom, $this->CLIENT_ID);
  }
  public function ConnecterClient()
  {
    if ($this->IDENTITE_TYP != "co") {
      $connexion = new Connexion;
      $connexion->id_utilisateur = $this->CLIENT_ID;
      $connecte = $connexion->Connecter();
      if ($connecte) {
        $this->commit_par = $this->NOM;
        $this->IDENTITE_TYP = "co";
        $this->Enregistrer();
        return $connecte;
      }
    } else
      echo "deja co";
  }
  public function ValiderCarnet($codeRam, $declarations)
  {
    if ($codeRam != $this->coderamassageEncours()) {
      echo "Code erroné";
    } elseif ($codeRam == $this->coderamassageEncours()) {
      $carnet = $this->carnetEncours();
      $stmt = Connection::getConnection()->prepare("UPDATE `panierramasse` SET `etat`='annule',`date_modification`=now() WHERE `numeroCarnet`=?");
      if ($stmt->execute([$carnet])) {
        foreach ($declarations as $key) {
          $declaration = Declarations::TrouverDeclaration($key);
          $declaration->validerRamassage($carnet);
        }
        $valide = Connection::getConnection()->prepare("UPDATE `ramasse` SET `code_ramassage`='0' WHERE `numeroCarnet`=?");
        if ($valide->execute([$carnet]))
          echo $carnet;
      }
    }
  }
  public function EtatMesExpeditions($date1, $date2, $statut, $type)
  {
    if (empty($date1))
      $date1 = date('Y-m-' . (date('d') - 1));
    if (empty($date2))
      $date2 = date('Y-m-d');

    $where = "WHERE Code1=:code
      AND (Date BETWEEN :date1  AND :date2)";
    $recherche = array(
      ':code' => $this->CLIENT_COD,
      ':date1' => $date1,
      ':date2' => $date2,
    );
    if (!empty($statut)) {
      if ($statut == 'Livrée') {
        $where .= " AND statut_suivis NOT IN ('En cours','Retournée','à Relivrer','.','à Relivrée','Epave','Avarie','')";
      } else {
        $where .= " AND statut_suivis LIKE :statut";
        $recherche[':statut'] = "%$statut%";
      }
    }
    if (!empty($type)) {
      if ($type == "proactif") {
        $where .= " AND ( Numero LIKE :typee OR Numero LIKE :type)";
        $recherche[':typee'] = "F0%";
        $recherche[':type'] = "E0%";
      } else {
        $where .= " AND Numero LIKE :typee";
        $recherche[':typee'] = "C0%";
      }
    }

    $where .= " order by  date_livraison  DESC";
    if ($this->CLIENT_TYP == "TRL")
      $stmt = Connection::getCourrierConnexion()->prepare("SELECT * FROM declarations_intralot $where ");
    else
      $stmt = Connection::getCourrierConnexion()->prepare("SELECT * FROM etat_expedition $where ");

    if ($stmt->execute($recherche))
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    else
      return false;
  }
  public function ConsultationDeclarations($ville, $declaration, $client, $date1, $date2, $bl)
  {
    $result = Declarations::RechercheConultation($this->CLIENT_ID, $ville, $declaration, $client, $date1, $date2, $bl);
    return ($result) ? $result : $this->MesDeclarations();
  }
}

/**
 * ############################################### Sous Client  #############################################
 */
class SousClient extends Clients
{
  #public $id_user;
  function __construct()
  {
    parent::__construct();
    $this->CLIENT_ID_client_lve = NULL;
  }
  public static function ListeClients()
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `client` WHERE `supprime_le` IS NULL")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }
  public static function ExistanceClient($code, $nom, $prenom)
  {
    $liste_recherche = array(
      ':code' => $code,
      ':nom' => $nom,
      ':prenom' => $prenom
    );
    $result = Connection::getConnection()->prepare("SELECT * FROM `client` WHERE `CLIENT_COD`=:code AND `NOM`=:nom AND `PRENOM`=:prenom AND `supprime_le` IS NULL");
    if ($result->execute($liste_recherche)) {
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    } else
      return false;
  }
  public static function TrouverClient($id)
  {
    $result = Connection::getConnection()->query("SELECT * FROM `client` WHERE `CLIENT_ID`=$id  AND `supprime_le` IS NULL");
    if ($result) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function TrouverClientParCode($code)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client` WHERE `CLIENT_COD`=?");
    if ($result->execute([$code])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public function MesAdresses()
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `adresses` WHERE `id_client`=$this->CLIENT_ID")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Adresses');
  }
  public function DerniereAdresse()
  {
    return Adresses::AdresseClient($this->CLIENT_ID);
  }
  public static function DernierClient()
  {
    $result = Connection::getConnection()->query("SELECT * FROM `client` ORDER BY `CLIENT_ID` DESC LIMIT 1");
    if ($result) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  private function AjouterClient()
  {
    $liste_ajout = array(
      ':NOM' => $this->NOM,
      ':PRENOM' => $this->PRENOM,
      ':CIVILITE_COD' => $this->CIVILITE_COD,
      ':CLIENT_TYP' => $this->CLIENT_TYP,
      ':IDENTITE_TYP' => $this->IDENTITE_TYP,
      ':IDENTITE_VAL' => $this->IDENTITE_VAL,
      ':ID_FISCALE' => $this->ID_FISCALE,
      ':CAPITAL_SOC' => $this->CAPITAL_SOC,
      ':CREATION_DAT' => $this->CREATION_DAT,
      ':CLIENT_ETA' => $this->CLIENT_ETA,
      ':MOTIF_ETA' => $this->MOTIF_ETA,
      ':SECTEUR_COD' => $this->SECTEUR_COD,
      ':EMPLOYE_ID' => $this->EMPLOYE_ID,
      ':SAISIE_DAT' => $this->SAISIE_DAT,
      ':AGENCE_COD' => $this->AGENCE_COD,
      ':CLIENT_COD' => $this->CLIENT_COD,
      ':commentaire' => $this->commentaire,
      ':mail' => $this->mail,
      ':ICE' => $this->ICE,
      ':CLIENT_ID_client_lve' => $this->CLIENT_ID_client_lve,
      ':telephone' => $this->telephone
    );
    $stmt = Connection::getConnection()->prepare("INSERT INTO `client`(`NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `ID_FISCALE`, `CAPITAL_SOC`, `CREATION_DAT`, `CLIENT_ETA`, `MOTIF_ETA`, `SECTEUR_COD`, `EMPLOYE_ID`, `SAISIE_DAT`, `AGENCE_COD`, `CLIENT_COD`, `commentaire`, `mail`, `ICE`, `CLIENT_ID_client_lve`, `telephone`) VALUES (:NOM, :PRENOM, :CIVILITE_COD, :CLIENT_TYP, :IDENTITE_TYP, :IDENTITE_VAL, :ID_FISCALE, :CAPITAL_SOC, :CREATION_DAT, :CLIENT_ETA, :MOTIF_ETA, :SECTEUR_COD, :EMPLOYE_ID, :SAISIE_DAT, :AGENCE_COD, :CLIENT_COD, :commentaire, :mail, :ICE, :CLIENT_ID_client_lve, :telephone)");
    if ($stmt->execute($liste_ajout))
      return Connection::getConnection()->lastInsertId();
    else
      return false;
  }
  private function ModifierClient()
  {
    $liste_modif = array(
      ':CLIENT_ID' => $this->CLIENT_ID,
      ':NOM' => $this->NOM,
      ':PRENOM' => $this->PRENOM,
      ':CIVILITE_COD' => $this->CIVILITE_COD,
      ':CLIENT_TYP' => $this->CLIENT_TYP,
      ':IDENTITE_TYP' => $this->IDENTITE_TYP,
      ':IDENTITE_VAL' => $this->IDENTITE_VAL,
      ':ID_FISCALE' => $this->ID_FISCALE,
      ':CAPITAL_SOC' => $this->CAPITAL_SOC,
      ':CREATION_DAT' => $this->CREATION_DAT,
      ':CLIENT_ETA' => $this->CLIENT_ETA,
      ':MOTIF_ETA' => $this->MOTIF_ETA,
      ':SECTEUR_COD' => $this->SECTEUR_COD,
      ':EMPLOYE_ID' => $this->EMPLOYE_ID,
      ':SAISIE_DAT' => $this->SAISIE_DAT,
      ':AGENCE_COD' => $this->AGENCE_COD,
      ':CLIENT_COD' => $this->CLIENT_COD,
      ':commentaire' => $this->commentaire,
      ':mail' => $this->mail,
      ':ICE' => $this->ICE,
      ':CLIENT_ID_client_lve' => $this->CLIENT_ID_client_lve,
      ':telephone' => $this->telephone,
      ':commit_par' => $this->commit_par
    );
    $stmt = Connection::getConnection()->prepare("UPDATE `client`  SET `CLIENT_COD`=:CLIENT_COD,`NOM`=:NOM,`PRENOM`=:PRENOM,`CIVILITE_COD`=:CIVILITE_COD,`CLIENT_TYP`=:CLIENT_TYP,`IDENTITE_TYP`=:IDENTITE_TYP,`IDENTITE_VAL`=:IDENTITE_VAL,`ID_FISCALE`=:ID_FISCALE,`CAPITAL_SOC`=:CAPITAL_SOC,`CREATION_DAT`=:CREATION_DAT,`CLIENT_ETA`=:CLIENT_ETA,`MOTIF_ETA`=:MOTIF_ETA,`SECTEUR_COD`=:SECTEUR_COD,`EMPLOYE_ID`=:EMPLOYE_ID,`SAISIE_DAT`=:SAISIE_DAT,`AGENCE_COD`=:AGENCE_COD,`commentaire`=:commentaire,`mail`=:mail,`ICE`=:ICE,`CLIENT_ID_client_lve`=:CLIENT_ID_client_lve,`telephone`=:telephone,`modifie_le`=now(),`commit_par`=:commit_par WHERE `CLIENT_ID`=:CLIENT_ID");
    if ($stmt->execute($liste_modif))
      return $this->CLIENT_ID;
    else
      return false;
  }
  public function Enregistrer()
  {
    if ($this->CLIENT_ID != NULL)
      return $this->ModifierClient();
    else
      return $this->AjouterClient();
  }
  public function setNull()
  {
    Connection::getConnection()->query("UPDATE `client` SET `CLIENT_COD`=NULL WHERE `CLIENT_ID`=$this->CLIENT_ID");
  }
  public static function ClientsUtilisateur($client)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client` WHERE  `CLIENT_ID_client_lve`=? AND `supprime_le` IS NULL");
    if ($result->execute([$client]))
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    else
      return false;
  }
  public static function IdClientUtilisateur($id, $client)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client` WHERE `CLIENT_ID`=? AND `CLIENT_ID_client_lve`=?");
    if ($result->execute([$id, $client])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function CodeClientUtilisateur($code, $client)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client` WHERE `CLIENT_COD`=? AND `CLIENT_ID_client_lve`=?");
    if ($result->execute([$code, $client])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function NomClientUtilisateur($nom, $client)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `client` WHERE `NOM` LIKE ? AND `CLIENT_ID_client_lve` =? AND `supprime_le` IS NULL");
    if ($result->execute(["%$nom%", $client])) {
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      #return $result->fetch();
    } else
      return false;
  }
}
