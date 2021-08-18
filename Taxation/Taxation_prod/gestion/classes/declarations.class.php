<?php
#use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use \PhpOffice\PhpSpreadsheet\Style\Font;

class Declarations
{
  public $numero, $date, $facture_id, $colis, $poids, $palettes, $paletteA, $paletteB, $paletteC, $paletteAutre, $Nbre_palettes, $longueur, $hauteur, $largeur, $coef, $valeur, $client1_id, $client2_id, $livraison, $express, $port, $courrier_typ, $courrier_eta, $date_saisie, $userid, $nature, $Espece, $Cheque, $Traite, $Nbre_BL, $BL, $id_adres, $statut, $commentaire, $modifie_le, $supprime_le, $commit_par, $id_cons, $typecase;
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
    $this->courrier_typ = "M";
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
    $this->id_cons = NULL;
    #$this->oldconnection = new PDO("mysql:host=localhost ;dbname=lvedbmobile", 'lve', 'adminlvedba');
  }

  static function  Utf8_ansi($valor = '')
  {
    $utf8_ansi2 = array(
      "\u00c0" => "À",
      "\u00c1" => "Á",
      "\u00c2" => "Â",
      "\u00c3" => "Ã",
      "\u00c4" => "Ä",
      "\u00c5" => "Å",
      "\u00c6" => "Æ",
      "\u00c7" => "Ç",
      "\u00c8" => "È",
      "\u00c9" => "É",
      "\u00ca" => "Ê",
      "\u00cb" => "Ë",
      "\u00cc" => "Ì",
      "\u00cd" => "Í",
      "\u00ce" => "Î",
      "\u00cf" => "Ï",
      "\u00d1" => "Ñ",
      "\u00d2" => "Ò",
      "\u00d3" => "Ó",
      "\u00d4" => "Ô",
      "\u00d5" => "Õ",
      "\u00d6" => "Ö",
      "\u00d8" => "Ø",
      "\u00d9" => "Ù",
      "\u00da" => "Ú",
      "\u00db" => "Û",
      "\u00dc" => "Ü",
      "\u00dd" => "Ý",
      "\u00df" => "ß",
      "\u00e0" => "à",
      "\u00e1" => "á",
      "\u00e2" => "â",
      "\u00e3" => "ã",
      "\u00e4" => "ä",
      "\u00e5" => "å",
      "\u00e6" => "æ",
      "\u00e7" => "ç",
      "\u00e8" => "è",
      "\u00e9" => "é",
      "\u00ea" => "ê",
      "\u00eb" => "ë",
      "\u00ec" => "ì",
      "\u00ed" => "í",
      "\u00ee" => "î",
      "\u00ef" => "ï",
      "\u00f0" => "ð",
      "\u00f1" => "ñ",
      "\u00f2" => "ò",
      "\u00f3" => "ó",
      "\u00f4" => "ô",
      "\u00f5" => "õ",
      "\u00f6" => "ö",
      "\u00f8" => "ø",
      "\u00f9" => "ù",
      "\u00fa" => "ú",
      "\u00fb" => "û",
      "\u00fc" => "ü",
      "\u00fd" => "ý",
      "\u00ff" => "ÿ"
    );
    return strtr($valor, $utf8_ansi2);
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
      if ($this->livraison != 'p') {
        #Livraison normale
        if ($clve->debinterval < $clve->fininterval) {
          $interval = $clve->debinterval + 1;
          $this->numero = trim((string)$clve->CLIENT_COD2) . trim((string)$interval);
        } else
          return "Interval depassé! merci de communiquer LaVoieExpress.";
      } else {
        #Livraison via consigne
        $cnt = self::conscount();
        $this->numero = $clve->CLIENT_ID . date('Y') . $cnt;
        $this->colis = 1;
      }
      $this->userid = $this->client1_id;
      $this->ActualiserListe();
      $inserer = Connection::getConnection()->prepare("INSERT INTO `declaration_v`(`numero`, `date`, `facture_id`, `colis`, `poids`, `palettes`, `paletteA`, `paletteB`, `paletteC`, `paletteAutre`, `Nbre_palettes`, `longueur`, `hauteur`, `largeur`, `coef`, `valeur`, `client1_id`, `client2_id`, `livraison`, `express`, `port`, `courrier_typ`, `courrier_eta`, `date_saisie`, `userid`, `nature`, `Espece`, `Cheque`, `Traite`, `Nbre_BL`, `BL`, `id_adres`, `statut`, `commentaire`,`commit_par`) VALUES (:numero,:date,:facture_id,:colis,:poids,:palettes,:paletteA,:paletteB,:paletteC,:paletteAutre,:Nbre_palettes,:longueur,:hauteur,:largeur,:coef,:valeur,:client1_id,:client2_id,:livraison,:express,:port,:courrier_typ,:courrier_eta,:date_saisie,:userid,:nature,:Espece,:Cheque,:Traite,:Nbre_BL,:BL,:id_adres,:statut,:commentaire,:commit_par)");

      if ($inserer->execute($this->liste_donnees)) {
        if ($this->livraison != 'p')
          Connection::getConnection()->query("UPDATE `client_lve` SET `debinterval`=$interval WHERE `CLIENT_ID`=" . $this->client1_id);
        else {
          $inst = Connection::getConnection()->prepare("INSERT INTO consigne_count(cmpt) VALUES (?)");
          $inst->execute([$cnt]);
          $reservation = new Consigne;
          $reservation->numero_expedition = $this->numero;
          $reservation->adresse_destination = $clve->adresse;
          $reservation->email = $clve->mail;
          $reservation->num_serie_consigne = $this->id_cons;
          $reservation->tel = $this->telephone;
          $reservation->type_case = $this->typecase;
          $reservation->Reservation();
        }
      }
    } else
      return "Client introuvable!";
  }
  public static function conscount()
  {
    $result1 = Connection::getConnection()->query("SELECT * FROM `consigne_count` ORDER BY `id` ASC LIMIT 1");
    $count1 = $result1->fetch(PDO::FETCH_OBJ)->cmpt;
    $result = Connection::getConnection()->query("SELECT * FROM `consigne_count` ORDER BY `id` DESC LIMIT 1");
    $count = $result->fetch(PDO::FETCH_OBJ);
    return ($result) ? $count1 . ($count->id + 1) : false;
  }
  public static function ListeDeclarations()
  {
    $result = Connection::getConnection()->query("SELECT * FROM `declaration_v` WHERE `supprime_le` IS NULL");
    return ($result) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
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

  public static function ImporterDeclarations($file, ClientLve $client)
  {
    require_once "vendor/autoload.php";
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
        $declarations = $spreadsheet->getActiveSheet()->toArray();
        if (count($declarations) - 1 <= $client->ResteInterval()) {
          foreach ($declarations as $row) {
            if ($row[0] == 'Code destinataire')
              continue;
            else {
              $declarations = new self;
              $declarations->client1_id = $client->CLIENT_ID;
              $result = $client->AjouterMonClient($row[0], $row[1], $row[2], $row[3], $row[4], Villes::TrouverVilleLib($row[5])->VILLE_COD);
              if ($result) {
                $declarations->client2_id = $result['id_sous_client'];
                $declarations->id_adres = $result['id_adress'];
              }
              $declarations->colis = $row[6];
              $declarations->poids = $row[7];
              $declarations->AjouterDeclaration();
            }
          }
          return true;
        } else
          echo "Nombre des déclarations dépasse l'interval.";
      } else return false;
    } else return false;
  }
  public static function ExporterDeclarations($declarations, $nom)
  {
    require_once "vendor/autoload.php";
    $file = new Spreadsheet();

    $active_sheet = $file->getActiveSheet();
    #Border the file.
    $active_sheet
      ->getStyle('A1:H' . count($declarations) + 1)
      ->getBorders()
      ->getInside()
      ->setBorderStyle(Border::BORDER_THIN);
    $active_sheet
      ->getStyle('A1:H' . count($declarations) + 1)
      ->getBorders()
      ->getOutline()
      ->setBorderStyle(Border::BORDER_THIN);
    $active_sheet
      ->getStyle('A1:H1')
      ->getFont()
      ->setBold(true);
    $active_sheet->getStyle('A1:H1')->getAlignment()->setHorizontal('center');

    $active_sheet->setCellValue('A1', 'Numéro');
    $active_sheet->getColumnDimension('A')->setAutoSize(true);
    $active_sheet->setCellValue('B1', 'Date');
    $active_sheet->getColumnDimension('B')->setAutoSize(true);
    $active_sheet->setCellValue('C1', 'Destinataire');
    $active_sheet->getColumnDimension('C')->setAutoSize(true);
    $active_sheet->setCellValue('D1', 'Code destinataire');
    $active_sheet->getColumnDimension('D')->setAutoSize(true);
    $active_sheet->setCellValue('E1', 'Adresse');
    $active_sheet->getColumnDimension('E')->setAutoSize(true);
    $active_sheet->setCellValue('F1', 'Ville');
    $active_sheet->getColumnDimension('F')->setAutoSize(true);
    $active_sheet->setCellValue('G1', 'Numero de BL');
    $active_sheet->getColumnDimension('G')->setAutoSize(true);
    $active_sheet->setCellValue('H1', 'Colis');
    $active_sheet->getColumnDimension('H')->setAutoSize(true);
    $count = 2;

    foreach ($declarations as $row) {
      $active_sheet->setCellValue('A' . $count, self::Utf8_ansi($row["numero"]));
      $active_sheet->setCellValue('B' . $count, self::Utf8_ansi($row["date"]));
      $active_sheet->setCellValue('C' . $count, self::Utf8_ansi($row["destinataire"]));
      $active_sheet->setCellValue('D' . $count, self::Utf8_ansi($row["code_destinataire"]));
      $active_sheet->setCellValue('E' . $count, self::Utf8_ansi($row["adresse"]));
      $active_sheet->setCellValue('F' . $count, self::Utf8_ansi($row["ville"]));
      $active_sheet->setCellValue('G' . $count, self::Utf8_ansi($row["BL"]));
      $active_sheet->setCellValue('H' . $count, self::Utf8_ansi($row["colis"]));
      $count = $count + 1;
    }

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

    $file_name = $nom . '_' . time() . '.' . strtolower('xlsx');

    $writer->save($file_name);

    header('Content-Type: application/x-www-form-urlencoded');

    header('Content-Transfer-Encoding: Binary');

    header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

    readfile($file_name);

    unlink($file_name);

    exit;
  }

  public static function DeclarationsAdresse($adresse)
  {
    $result = Connection::getConnection()->prepare("SELECT * FROM `declaration_v` WHERE `id_adres`=? AND `supprime_le` IS NULL");
    if ($result->execute([$adresse]))
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    else
      return false;
  }
}
