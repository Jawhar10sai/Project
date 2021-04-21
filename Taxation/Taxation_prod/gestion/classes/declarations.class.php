<?php
class Declarations
{
  public $numero, $date, $facture_id, $colis, $poids, $palettes, $paletteA, $paletteB, $paletteC, $paletteAutre, $Nbre_palettes, $longueur, $hauteur, $largeur, $coef, $valeur, $client1_id, $client2_id, $livraison, $express, $port, $courrier_typ, $courrier_eta, $date_saisie, $userid, $nature, $Espece, $Cheque, $Traite, $Nbre_BL, $BL, $id_adres, $statut, $commentaire, $modifie_le, $supprime_le, $commit_par;
  protected  $liste_donnees;
  function __construct()
  {
    $this->numero = "";
    $this->date = date('Y-m-d');
    $this->facture_id = 0;
    $this->colis = "";
    $this->poids = "";
    $this->paletteA = 0;
    $this->paletteB = 0;
    $this->paletteC = 0;
    $this->paletteAutre = 0;
    $this->palettes = ($this->paletteA + $this->paletteB + $this->paletteC);
    $this->Nbre_palettes = ($this->paletteA + $this->paletteB + $this->paletteC);
    $this->longueur = 1;
    $this->hauteur = 1;
    $this->largeur = 1;
    $this->coef = ($this->longueur * $this->hauteur * $this->largeur);
    $this->valeur = 100;
    $this->client1_id = "";
    $this->client2_id = "";
    $this->livraison = "";
    $this->express = "S";
    $this->port = "P";
    $this->courrier_typ = "";
    $this->courrier_eta = "";
    $this->date_saisie = date('Y-m-d');
    $this->userid = 0;
    $this->nature = "";
    $this->Espece = 0;
    $this->Cheque = 0;
    $this->Traite = 0;
    $this->Nbre_BL = 0;
    $this->BL = "";
    $this->id_adres = 0;
    $this->statut = "";
    $this->commentaire = "";
    $this->modifie_le = NULL;
    $this->supprime_le = NULL;
    $this->commit_par = NULL;
    #$this->oldconnection = new PDO("mysql:host=localhost ;dbname=lvedbmobile", 'lve', 'adminlvedba');
  }
  private function ActualiserListe()
  {
    $this->liste_donnees = array(
      ':numero' => $this->numero,
      ':date' => $this->date,
      ':facture_id' => $this->facture_id,
      ':colis' => $this->colis,
      ':poids' => $this->poids,
      ':paletteA' => $this->paletteA,
      ':paletteB' => $this->paletteB,
      ':paletteC' => $this->paletteC,
      ':paletteAutre' => $this->paletteAutre,
      ':palettes' => ($this->paletteA + $this->paletteB + $this->paletteC),
      ':Nbre_palettes' => ($this->paletteA + $this->paletteB + $this->paletteC),
      ':longueur' => $this->longueur,
      ':hauteur' => $this->hauteur,
      ':largeur' => $this->largeur,
      ':coef' => $this->coef,
      ':valeur' => $this->valeur,
      ':client1_id' => $this->client1_id,
      ':client2_id' => $this->client2_id,
      ':livraison' => $this->livraison,
      ':express' => $this->express,
      ':port' => $this->port,
      ':courrier_typ' => $this->courrier_typ,
      ':courrier_eta' => $this->courrier_eta,
      ':date_saisie' => $this->date_saisie,
      ':userid' => $this->userid,
      ':nature' => $this->nature,
      ':Espece' => $this->Espece,
      ':Cheque' => $this->Cheque,
      ':Traite' => $this->Traite,
      ':Nbre_BL' => $this->Nbre_BL,
      ':BL' => $this->BL,
      ':id_adres' => $this->id_adres,
      ':statut' => $this->statut,
      ':commentaire' => $this->commentaire,
      ':commit_par' => $this->commit_par
    );
  }
  #Ajouter une déclaration
  public function AjouterDeclaration()
  {
    $clve = ClientLve::TrouverClient($this->client1_id);
    if ($clve) {
      if ($clve->debinterval < $clve->fininterval) {
        $interval = $clve->debinterval + 1;
        $this->numero = (string)$clve->CLIENT_COD2 . (string)$interval;
        $this->ActualiserListe();
        $inserer = Connection::getConnection()->prepare("INSERT INTO `declaration_v`(`numero`, `date`, `facture_id`, `colis`, `poids`, `palettes`, `paletteA`, `paletteB`, `paletteC`, `paletteAutre`, `Nbre_palettes`, `longueur`, `hauteur`, `largeur`, `coef`, `valeur`, `client1_id`, `client2_id`, `livraison`, `express`, `port`, `courrier_typ`, `courrier_eta`, `date_saisie`, `userid`, `nature`, `Espece`, `Cheque`, `Traite`, `Nbre_BL`, `BL`, `id_adres`, `statut`, `commentaire`,`commit_par`) VALUES (:numero,:date,:facture_id,:colis,:poids,:palettes,:paletteA,:paletteB,:paletteC,:paletteAutre,:Nbre_palettes,:longueur,:hauteur,:largeur,:coef,:valeur,:client1_id,:client2_id,:livraison,:express,:port,:courrier_typ,:courrier_eta,:date_saisie,:userid,:nature,:Espece,:Cheque,:Traite,:Nbre_BL,:BL,:id_adres,:statut,:commentaire,:commit_par)");
        if ($inserer->execute($this->liste_donnees)) {
          Connection::getConnection()->query("UPDATE `client_lve` SET `debinterval`=$interval WHERE `CLIENT_ID`=" . $this->client1_id);
        }
      } else
        return "Interval depassé! merci de communiquer LaVoieExpress.";
    } else
      return "Client introuvable!";
  }
  #Supprimer une déclaration par son numero
  public function SupprimerDeclaration()
  {
    $stmt = Connection::getConnection()->prepare("UPDATE `declaration_v` SET `supprime_le`=now(),`commit_par`=? WHERE `numero`=?");
    if ($stmt->execute([$this->commit_par, $this->numero])) {
      Connection::getConnection()->query("UPDATE `client_lve` SET `fininterval`=`fininterval`+1 WHERE `CLIENT_ID`=$this->client1_id");
    } else
      return false;
  }
  #Trouver une déclaration par son numero
  public static function TrouverDeclaration($code)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `declaration_v` WHERE `numero`=?");
    if ($result->execute([$code])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  #Modification du déclaration
  public function ModifierDeclaration()
  {
    $this->ActualiserListe();
    $stmt = Connection::getConnection()->prepare("UPDATE `declaration_v` SET `date`=:date,`facture_id`=:facture_id,`colis`=:colis,`poids`=:poids,`palettes`=:palettes,`paletteA`=:paletteA,`paletteB`=:paletteB,`paletteC`=:paletteC,`paletteAutre`=:paletteAutre,`Nbre_palettes`=:Nbre_palettes,`longueur`=:longueur,`hauteur`=:hauteur,`largeur`=:largeur,`coef`=:coef,`valeur`=:valeur,`client1_id`=:client1_id,`client2_id`=:client2_id,`livraison`=:livraison,`express`=:express,`port`=:port,`courrier_typ`=:courrier_typ,`courrier_eta`=:courrier_eta,`date_saisie`=:date_saisie,`userid`=:userid,`nature`=:nature,`Espece`=:Espece,`Cheque`=:Cheque,`Traite`=:Traite,`Nbre_BL`=:Nbre_BL,`BL`=:BL,`id_adres`=:id_adres,`statut`=:statut,`commentaire`=:commentaire,`modifie_le`=now(),`commit_par`=:commit_par WHERE `numero`=:numero");
    if ($stmt->execute($this->liste_donnees))
      return $this->numero;
    else
      false;
  }
  #L'etat de la déclaration dans le panier(En cours, validéé ou annulée)
  public function EtatDDP()
  {
    $declars = Connection::getConnection()->prepare("SELECT * FROM `panierramasse` WHERE  `declaration`=? AND ((`etat` like 'valide') OR (`etat` like 'En cours'))");
    if ($declars->execute([$this->numero]))
      return $declars->fetchObject();
    else
      return false;
  }
  #Les déclarations des utilisateurs
  public static function TopDeclarationUtilisateur($client)
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `declaration_v` WHERE `client1_id`=$client ORDER BY `date` DESC LIMIT 5 AND `supprime_le`IS NULL")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
  }

  public static function DeclarationsClient($id, $client)
  {
    return Connection::getConnection()
      ->query("SELECT * FROM `declaration_v` WHERE " . $id . "=$client AND `supprime_le` IS NULL")
      ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    /*$result = Connection::getConnection()->prepare("SELECT * FROM `declaration_v` WHERE `client1_id`=? AND `supprime_le` IS NULL");
    if ($result->execute([$client]))
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    else
      return false;*/
  }
  public static function DeclarationUtilisateur($numero, $client)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `declaration_v` WHERE `numero`=? AND `client1_id`=? AND `supprime_le` IS NULL");
    if ($result->execute([$numero, $client])) {
      $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      return $result->fetch();
    } else
      return false;
  }
  public static function DeclarationsUtilisateurAramassees($client)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `declaration_v` WHERE `numero` in(SELECT `declaration` FROM `panierramasse` WHERE `etat`='En cours') AND `client1_id`=?");
    if ($result->execute([$client]))
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    else
      return false;
  }
  public static function DeclarationNonRamassees($client)
  {
    $result = Connection::getConnection()
      ->prepare("SELECT * FROM `declaration_v` WHERE `numero` not in(SELECT `declaration` FROM `panierramasse` WHERE `etat` IN('En cours','Valide')) AND `client1_id`=? AND `supprime_le` IS NULL ORDER BY `date` DESC");
    if ($result->execute([$client]))
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    else
      return false;
  }
  public function  AdresseDeclaration()
  {
    return Adresses::TrouverAdresse($this->id_adres);
  }
  #Les déclaration par ville
  public static function DeclarationsVille($ville)
  {
    $result = Connection::getConnection()
      ->prepare("SELECT * FROM `declaration_v` WHERE `id_adres` in(SELECT `id_adresse ` FROM `adresses` WHERE `	id_ville `=?) AND `supprime_le` IS NULL");
    ($result->execute([$ville])) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
  }
  public function validerRamassage($carnet)
  {
    $stmt = Connection::getConnection()->prepare("UPDATE `panierramasse` SET `etat`='Valide',`date_modification`=now() WHERE `declaration`=? AND `numeroCarnet`=?");
    return ($stmt->execute([$this->numero, $carnet])) ? true : false;
  }
  public static function GetLibCodeLiv($code)
  {
    $result = Connection::getCourrierConnexion()->prepare("SELECT * FROM livraisoncode WHERE id=?");
    ($result->execute([$code])) ? $result->fetchObject() : false;
  }
  public static function GetLibCodeMotif($code)
  {
    $result = Connection::getCourrierConnexion()->prepare("SELECT * FROM motif WHERE id=?");
    ($result->execute([$code])) ? $result->fetchObject() : false;
  }

  public static function GetScanBL($courrier)
  {
    $dir_path = "http://46.18.132.236:8089/upload_mobile_BL/" . trim($courrier);
    //$extensions_array = array('jpg', 'png', 'jpeg');
    $images = array();
    if (is_dir($dir_path)) {
      $files = scandir($dir_path);
      for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] != '.' && $files[$i] != '..') {
          $images[] = $dir_path . "/" . $files[$i];
        }
      }
      print_r($images);
      //return $images;
    } else
      return false;
    /*
    //http://46.18.132.236:8089/upload_mobile_BL/<?= trim($value->courrier_id) . '/' . Declarations::GetScanBL($value->courrier_id); 
    $result = Connection::getCourrierConnexion()->prepare("SELECT * FROM `capture` WHERE `courrierid`=?");
    return ($result->execute([$courrier])) ? $result->fetchObject() : ' ';*/
  }

  public static function DeclarationsUser($client)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `declaration_v` WHERE `client1_id`=? AND `supprime_le` IS NULL");
    if ($result->execute([$client]))
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    else
      return false;
  }

  public static function RechercheConultation($utilisateur, $ville, $declaration, $client, $date1, $date2, $bl)
  {
    $where = " WHERE `client1_id`=:code_us";
    $conditions  = array(':code_us' => $utilisateur);
    if (!empty($ville)) {
      $where .= " AND `ville`=:ville";
      $conditions[':ville'] = $ville;
    }

    if (!empty($bl)) {
      $where .= " AND `BL` LIKE :bl";
      $conditions[':bl'] = "%$bl%";
    }

    if (!empty($declaration)) {
      $where .= " and `numero` LIKE :declaration";
      $conditions[':declaration'] = "%$declaration%";
    }
    if (!empty($date1) && !empty($date2)) {
      $where .= " and `date` between :date1 and :date2";
      $conditions[':date1'] = "$date1";
      $conditions[':date2'] = "$date2";
    }
    if (!empty($client)) {
      $where .= " AND (`NOM` LIKE :client_nom OR `CLIENT_COD` LIKE :client_cod)";
      $conditions[':client_cod'] = $client;
      $conditions[':client_nom'] = "$client%";
    }
    $result = Connection::getConnection()->prepare("SELECT DISTINCT * FROM `vdeclaration` $where ORDER BY `date`");
    if ($result->execute($conditions)) {
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    } else
      return false;
  }

  public static function ImporterDeclarations($file)
  {
    /*
    require_once "PHPSpreadsheet/vendor/autoload.php";
    if ($file["name"] != '') {
      $allowed_extension = array('xls', 'csv', 'xlsx');
      $file_array = explode(".", $file["name"]);
      $file_extension = end($file_array);
      if (in_array($file_extension, $allowed_extension)) {
        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($file['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
        $spreadsheet = $reader->load($file_name);
        unlink($file_name);
        return $spreadsheet->getActiveSheet()->toArray();
      } else return false;
    } else return false;
    */
  }
}
