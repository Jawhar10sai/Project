<?php
require_once("conftaxDB.php");
class Courrier
{
  public $Agence;
  public $courrier_id;
  public $Numero;
  public $Date;
  public $Code1;
  public $Expediteur;
  public $Code2;
  public $destinataire;
  public $adresse1;
  public $adresse2;
  public $Ville1;
  public $Ville2;
  public $Port;
  public $Colis;
  public $Poids;
  public $type;
  public $Montant_ttc;
  public $Espece;
  public $Cheque;
  public $Traite;
  public $bl;
  public $Recu;
  public $date_recu;
  public $num;
  public $date_bordereau;
  public $date_livraison;
  public $Delais_Cible;
  public $Ecart;
  public $Depassement;
  public $Ecart2;
  public $service;
  public $BORDEREAU_NUM;
  public $livraison;
  public $ramasseur;
  public $FC_date1;
  public $FC_date2;
  public $date_caisse;
  public $statut;
  public $statut_suivis;
  public $FC_date_arrive;
  public $Motif;
  public $Taxateur;
  protected $connection;
  protected $connexion;

  function __construct(){
        $this->Agence="";
        $this->courrier_id="";
        $this->Numero="";
        $this->Date="";
        $this->Code1="";
        $this->Expediteur="";
        $this->Code2="";
        $this->destinataire="";
        $this->adresse1="";
        $this->adresse2="";
        $this->Ville1="";
        $this->Ville2="";
        $this->Port="";
        $this->Colis="";
        $this->Poids="";
        $this->type="";
        $this->Montant_ttc="";
        $this->Espece="";
        $this->Cheque="";
        $this->Traite="";
        $this->bl="";
        $this->Recu="";
        $this->date_recu="";
        $this->num="";
        $this->date_bordereau="";
        $this->date_livraison="";
        $this->Delais_Cible="";
        $this->Ecart="";
        $this->Depassement="";
        $this->Ecart2="";
        $this->service="";
        $this->BORDEREAU_NUM="";
        $this->livraison="";
        $this->ramasseur="";
        $this->FC_date1="";
        $this->FC_date2="";
        $this->date_caisse="";
        $this->statut="";
        $this->statut_suivis="";
        $this->FC_date_arrive="";
        $this->Motif="";
        $this->Taxateur="";
        $this->connection = $GLOBALS['conn'];
        $this->connexion = new mysqli('localhost','root','','lvedbexp');
  }

  public static function TrouverCourrier($id){
       $exp = new self;
      $expeditions = $exp->connexion->query("SELECT * from `total_courrier` where `courrier_id`=$id");
      foreach ($expeditions as $expedition) {
        $id = trim($id);
        $thisexp = new self;
        $thisexp->Agence = $expedition['Agence'];
        $thisexp->courrier_id = $expedition['courrier_id'];
        $thisexp->Numero = $expedition['Numero'];
        $thisexp->Date = $expedition['Date'];
        $thisexp->Code1 = $expedition['Code1'];
        $thisexp->Expediteur = $expedition['Expediteur'];
        $thisexp->Code2 = $expedition['Code2'];
        $thisexp->destinataire = $expedition['destinataire'];
        $thisexp->adresse1 = $expedition['adresse1'];
        $thisexp->adresse2 = $expedition['adresse2'];
        $thisexp->Ville1 = $expedition['Ville1'];
        $thisexp->Ville2 = $expedition['Ville2'];
        $thisexp->Port = $expedition['Port'];
        $thisexp->Colis = $expedition['Colis'];
        $thisexp->Poids = $expedition['Poids'];
        $thisexp->type = $expedition['type'];
        $thisexp->Montant_ttc = $expedition['Montant_ttc'];
        $thisexp->Espece = $expedition['Espece'];
        $thisexp->Cheque = $expedition['Cheque'];
        $thisexp->Traite = $expedition['Traite'];
        $thisexp->bl = $expedition['bl'];
        $thisexp->Recu = $expedition['Recu'];
        $thisexp->date_recu = $expedition['date_recu'];
        $thisexp->num = $expedition['num'];
        $thisexp->date_bordereau = $expedition['date_bordereau'];
        $thisexp->date_livraison = $expedition['date_livraison'];
        $thisexp->Delais_Cible = $expedition['Delais_Cible'];
        $thisexp->Ecart = $expedition['Ecart'];
        $thisexp->Depassement = $expedition['Depassement'];
        $thisexp->Ecart2 = $expedition['Ecart2'];
        $thisexp->service = $expedition['service'];
        $thisexp->BORDEREAU_NUM = $expedition['BORDEREAU_NUM'];
        $thisexp->livraison = $expedition['livraison'];
        $thisexp->ramasseur = $expedition['ramasseur'];
        $thisexp->FC_date1 = $expedition['FC_date1'];
        $thisexp->FC_date2 = $expedition['FC_date2'];
        $thisexp->date_caisse = $expedition['date_caisse'];
        $thisexp->statut = $expedition['statut'];
        $thisexp->statut_suivis = $expedition['statut_suivis'];
        $thisexp->FC_date_arrive = $expedition['FC_date_arrive'];
        $thisexp->Motif = $expedition['Motif'];
        $thisexp->Taxateur = $expedition['Taxateur'];
      }
      return $thisexp;
  }

  public static function TrouverCourrierNumero($id){
      $exp = new self;
     $expeditions = $exp->connexion->query("SELECT * from `total_courrier` where `Numero`='$id'");
     foreach ($expeditions as $expedition) {
       $thisexp = new self;
       $id = trim($id);
       $thisexp->Agence = $expedition['Agence'];
       $thisexp->courrier_id = $expedition['courrier_id'];
       $thisexp->Numero = $expedition['Numero'];
       $thisexp->Date = $expedition['Date'];
       $thisexp->Code1 = $expedition['Code1'];
       $thisexp->Expediteur = $expedition['Expediteur'];
       $thisexp->Code2 = $expedition['Code2'];
       $thisexp->destinataire = $expedition['destinataire'];
       $thisexp->adresse1 = $expedition['adresse1'];
       $thisexp->adresse2 = $expedition['adresse2'];
       $thisexp->Ville1 = $expedition['Ville1'];
       $thisexp->Ville2 = $expedition['Ville2'];
       $thisexp->Port = $expedition['Port'];
       $thisexp->Colis = $expedition['Colis'];
       $thisexp->Poids = $expedition['Poids'];
       $thisexp->type = $expedition['type'];
       $thisexp->Montant_ttc = $expedition['Montant_ttc'];
       $thisexp->Espece = $expedition['Espece'];
       $thisexp->Cheque = $expedition['Cheque'];
       $thisexp->Traite = $expedition['Traite'];
       $thisexp->bl = $expedition['bl'];
       $thisexp->Recu = $expedition['Recu'];
       $thisexp->date_recu = $expedition['date_recu'];
       $thisexp->num = $expedition['num'];
       $thisexp->date_bordereau = $expedition['date_bordereau'];
       $thisexp->date_livraison = $expedition['date_livraison'];
       $thisexp->Delais_Cible = $expedition['Delais_Cible'];
       $thisexp->Ecart = $expedition['Ecart'];
       $thisexp->Depassement = $expedition['Depassement'];
       $thisexp->Ecart2 = $expedition['Ecart2'];
       $thisexp->service = $expedition['service'];
       $thisexp->BORDEREAU_NUM = $expedition['BORDEREAU_NUM'];
       $thisexp->livraison = $expedition['livraison'];
       $thisexp->ramasseur = $expedition['ramasseur'];
       $thisexp->FC_date1 = $expedition['FC_date1'];
       $thisexp->FC_date2 = $expedition['FC_date2'];
       $thisexp->date_caisse = $expedition['date_caisse'];
       $thisexp->statut = $expedition['statut'];
       $thisexp->statut_suivis = $expedition['statut_suivis'];
       $thisexp->FC_date_arrive = $expedition['FC_date_arrive'];
       $thisexp->Motif = $expedition['Motif'];
       $thisexp->Taxateur = $expedition['Taxateur'];
     }
     return $thisexp;
   }

  public static function TrouverCourrierNumeroLogistique($id){
     $exp = new self;
    $expeditions = $exp->connexion->query("SELECT * from `declarations_intralot` where `Numero`='$id'");
    foreach ($expeditions as $expedition) {
      $id = trim($id);
      $thisexp = new self;
      $thisexp->Agence = trim($expedition['Agence']);
      $thisexp->courrier_id = trim($expedition['courrier_id']);
      $thisexp->Numero = trim($expedition['Numero']);
      $thisexp->Date = trim($expedition['Date']);
      $thisexp->Code1 = trim($expedition['Code1']);
      $thisexp->Expediteur = trim($expedition['Expediteur']);
      $thisexp->Code2 = trim($expedition['Code2']);
      $thisexp->destinataire = trim($expedition['destinataire']);
      $thisexp->adresse1 = trim($expedition['adresse1']);
      $thisexp->adresse2 = trim($expedition['adresse2']);
      $thisexp->Ville1 = trim($expedition['Ville1']);
      $thisexp->Ville2 = trim($expedition['Ville2']);
      $thisexp->Port = trim($expedition['Port']);
      $thisexp->Colis = trim($expedition['Colis']);
      $thisexp->Poids = trim($expedition['Poids']);
      $thisexp->type = trim($expedition['type']);
      $thisexp->Montant_ttc = trim($expedition['Montant_ttc']);
      $thisexp->Espece = trim($expedition['Espece']);
      $thisexp->Cheque = trim($expedition['Cheque']);
      $thisexp->Traite = trim($expedition['Traite']);
      $thisexp->bl = trim($expedition['bl']);
      $thisexp->Recu = trim($expedition['Recu']);
      $thisexp->date_recu = trim($expedition['date_recu']);
      $thisexp->num = trim($expedition['num']);
      $thisexp->date_bordereau = trim($expedition['date_bordereau']);
      $thisexp->date_livraison = trim($expedition['date_livraison']);
      $thisexp->Delais_Cible = trim($expedition['Delais_Cible']);
      $thisexp->Ecart = trim($expedition['Ecart']);
      $thisexp->Depassement = trim($expedition['Depassement']);
      $thisexp->Ecart2 = trim($expedition['Ecart2']);
      $thisexp->service = trim($expedition['service']);
      $thisexp->BORDEREAU_NUM = trim($expedition['BORDEREAU_NUM']);
      $thisexp->livraison = trim($expedition['livraison']);
      $thisexp->ramasseur = trim($expedition['ramasseur']);
      $thisexp->FC_date1 = trim($expedition['FC_date1']);
      $thisexp->FC_date2 = trim($expedition['FC_date2']);
      $thisexp->date_caisse = trim($expedition['date_caisse']);
      $thisexp->statut = trim($expedition['statut']);
      $thisexp->statut_suivis = trim($expedition['statut_suivis']);
      $thisexp->FC_date_arrive = trim($expedition['FC_date_arrive']);
      $thisexp->Motif = trim($expedition['Motif']);
      $thisexp->Taxateur = trim($expedition['Taxateur']);
    }
    return $thisexp;
   }

  public static function ListeCourrier(){
    $listecourriers = array();
    $exp = new self;
    $expeditions = $exp->connexion->query("SELECT * FROM `total_courrier` ");
    foreach ($expeditions as $expedition) {
      $thisexp =  self::TrouverCourrierNumero($expedition['Numero']);
      $listecourriers[]=$thisexp;
    }
    return $listecourriers;
  }

  public function CourrierLogistique(){
    $listecourriers = array();
    $courriers = $this->connexion ->query("SELECT * FROM `declarations_intralot` where `Code1`='$this->Code1'");
    foreach ($courriers as $courrier) {
      $thisexp =  self::TrouverCourrierNumeroLogistique($courrier['Numero']);
      $listecourriers[]=$thisexp;
    }
    return $listecourriers;
  }

  public function CourrierClient(){
    $listecourriers = array();
    $courriers = $this->connexion ->query("SELECT * FROM `total_courrier` where `Code1`='$this->Code1'");
    foreach ($courriers as $courrier) {
      $thisexp =  self::TrouverCourrier($courrier['Numero']);
      $listecourriers[]=$thisexp;
    }
    return $listecourriers;
  }

}
 ?>
