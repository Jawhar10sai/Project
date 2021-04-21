<?php
require_once("conftaxDB.php");
class Declarations{
  public $numero;
  public $date;
  public $facture_id;
  public $colis;
  public $poids;
  public $palettes;
  public $paletteA;
  public $paletteB;
  public $paletteC;
  public $paletteAutre;
  public $Nbre_palettes;
  public $longueur;
  public $hauteur;
  public $largeur;
  public $coef;
  public $valeur;
  public $client1_id;
  public $client2_id;
  public $livraison;
  public $express;
  public $port;
  public $courrier_typ;
  public $courrier_eta;
  public $date_saisie;
  public $userid;
  public $nature;
  public $Espece;
  public $Cheque;
  public $Traite;
  public $Nbre_BL;
  public $BL;
  public $id_adres;
  public $statut;
  public $commentaire;
  public $date_modification;
  public $date_suppression;
  protected $connection;
    function __construct()
  {
      $this->numero="";
      $this->date=date('Y-m-d');
      $this->facture_id=0;
      $this->colis="";
      $this->poids="";
      $this->paletteA=0;
      $this->paletteB=0;
      $this->paletteC=0;
      $this->paletteAutre=0;
      $this->palettes=($this->paletteA+$this->paletteB+$this->paletteC);
      $this->Nbre_palettes=($this->paletteA+$this->paletteB+$this->paletteC);
      $this->longueur=1;
      $this->hauteur=1;
      $this->largeur=1;
      $this->coef=($this->longueur*$this->hauteur*$this->largeur);
      $this->valeur=100;
      $this->client1_id="";
      $this->client2_id="";
      $this->livraison="";
      $this->express="S";
      $this->port="P";
      $this->courrier_typ="";
      $this->courrier_eta="";
      $this->date_saisie=date('Y-m-d');
      $this->userid=0;
      $this->nature="";
      $this->Espece=0;
      $this->Cheque=0;
      $this->Traite=0;
      $this->Nbre_BL=0;
      $this->BL="";
      $this->id_adres=0;
      $this->statut="";
      $this->commentaire="";
      $this->date_modification="";
      $this->date_suppression="";
      $this->connection = $GLOBALS['conn'];
  }
#Ajouter une déclaration
  public function AjouterDeclaration(){
    $cllves = $this->connection->query("SELECT * FROM `client_lve` WHERE `CLIENT_ID`=$this->client1_id");
    if ($cllves->num_rows>0) {
      foreach ($cllves as $cllve) {
        if ($cllve['debinterval']<$cllve['fininterval']) {
          $interval = $cllve['debinterval']+1;
          $this->numero = (string)$cllve['CLIENT_COD2'].(string)$interval;
          $inserer = $this->connection->query("INSERT INTO `declaration_v`(`numero`, `date`, `facture_id`, `colis`, `poids`, `palettes`, `paletteA`, `paletteB`, `paletteC`, `paletteAutre`, `Nbre_palettes`, `longueur`, `hauteur`, `largeur`, `coef`, `valeur`, `client1_id`, `client2_id`, `livraison`, `express`, `port`, `courrier_typ`, `courrier_eta`, `date_saisie`, `userid`, `nature`, `Espece`, `Cheque`, `Traite`, `Nbre_BL`, `BL`, `id_adres`, `statut`, `commentaire`) VALUES ('$this->numero','$this->date',$this->facture_id,$this->colis,$this->poids,$this->palettes,$this->paletteA,$this->paletteB,$this->paletteC,$this->paletteAutre,$this->Nbre_palettes,$this->longueur,$this->hauteur,$this->largeur,$this->coef,$this->valeur,$this->client1_id,$this->client2_id,'$this->livraison','$this->express','$this->port','$this->courrier_typ','$this->courrier_eta','$this->date_saisie',$this->userid,'$this->nature',$this->Espece,$this->Cheque,$this->Traite,$this->Nbre_BL,'$this->BL',$this->id_adres,'$this->statut','$this->commentaire')");
          if ($inserer) {
          $this->connection->query("UPDATE `client_lve` SET `debinterval`=$interval WHERE `CLIENT_ID`=".$this->client1_id);
          }
        }else {
          echo "<script>alert('Nombre des declarations depassé');</script>";
        }
      }
    }
  }
  #Supprimer une déclaration par son numero
  public function SupprimerDeclaration($par){
  $this->connection->query("UPDATE `declaration_v` SET `supprime_le`=now(),`commit_par`='$par' WHERE `numero`='$this->numero'");
  $this->connection->query("UPDATE `client_lve` SET `fininterval`=`fininterval`+1 WHERE `CLIENT_ID`=$this->client1_id");
}
#Trouver une déclaration par son numero
  public function TrouverDeclaration($code){
    $result = $this->connection->query("SELECT * FROM `declaration_v` WHERE `numero`='$code'");
    if ($result) {
      if ($result->num_rows>0){
        foreach ($result as $declaration) {
          $this->numero =$declaration['numero'];
          $this->date =$declaration['date'];
          $this->facture_id =$declaration['facture_id'];
          $this->colis =$declaration['colis'];
          $this->poids =$declaration['poids'];
          $this->palettes =$declaration['palettes'];
          $this->paletteA =$declaration['paletteA'];
          $this->paletteB =$declaration['paletteB'];
          $this->paletteC =$declaration['paletteC'];
          $this->paletteAutre =$declaration['paletteAutre'];
          $this->Nbre_palettes =$declaration['Nbre_palettes'];
          $this->longueur =$declaration['longueur'];
          $this->hauteur =$declaration['hauteur'];
          $this->largeur =$declaration['largeur'];
          $this->coef =$declaration['coef'];
          $this->valeur =$declaration['valeur'];
          $this->client1_id =$declaration['client1_id'];
          $this->client2_id =$declaration['client2_id'];
          $this->livraison =$declaration['livraison'];
          $this->express =$declaration['express'];
          $this->port =$declaration['port'];
          $this->courrier_typ =$declaration['courrier_typ'];
          $this->courrier_eta =$declaration['courrier_eta'];
          $this->date_saisie =$declaration['date_saisie'];
          $this->userid =$declaration['userid'];
          $this->nature =$declaration['nature'];
          $this->Espece =$declaration['Espece'];
          $this->Cheque =$declaration['Cheque'];
          $this->Traite =$declaration['Traite'];
          $this->Nbre_BL =$declaration['Nbre_BL'];
          $this->BL =$declaration['BL'];
          $this->id_adres =$declaration['id_adres'];
          $this->statut =$declaration['statut'];
          $this->commentaire =$declaration['commentaire'];
        }
        return true;
      }else
        return false;
    }else
      return false;
}
#déclaration d'un utilisateur donné
public function Declaration_utilisateur($code,$user){
  $result = $this->connection->query("SELECT * FROM `declaration_v` WHERE `numero`='$code' AND `client1_id`=$user AND `supprime_le`IS NULL");
  if ($result) {
    if ($result->num_rows>0){
      foreach ($result as $declaration) {
        $this->TrouverDeclaration($declaration['numero']);
      }
      return true;
    }else
      return false;
  }else
    return false;
}

#Modification du déclaration
  public function ModifierDeclaration($par){
    $this->Nbre_palettes=($this->paletteA+$this->paletteB+$this->paletteC);
    $this->connection->query("UPDATE `declaration_v` SET `date`='$this->date',`facture_id`=$this->facture_id,`colis`=$this->colis,`poids`=$this->poids,`palettes`=$this->palettes,`paletteA`=$this->paletteA,`paletteB`=$this->paletteB,`paletteC`=$this->paletteC,`paletteAutre`=$this->paletteAutre,`Nbre_palettes`=$this->Nbre_palettes,`longueur`=$this->longueur,`hauteur`=$this->hauteur,`largeur`=$this->largeur,`coef`=$this->coef,`valeur`=$this->valeur,`client1_id`=$this->client1_id,`client2_id`=$this->client2_id,`livraison`='$this->livraison',`express`='$this->express',`port`='$this->port',`courrier_typ`='$this->courrier_typ',`courrier_eta`='$this->courrier_eta',`date_saisie`='$this->date_saisie',`userid`=$this->userid,`nature`='$this->nature',`Espece`=$this->Espece,`Cheque`=$this->Cheque,`Traite`=$this->Traite,`Nbre_BL`=$this->Nbre_BL,`BL`='$this->BL',`id_adres`=$this->id_adres,`statut`='$this->statut',`commentaire`='$this->commentaire',`modifie_le`=now(),`commit_par`='$par' WHERE `numero`='$this->numero'");
  }

#L'etat de la déclaration dans le panier(En cours, validéé ou annulée)
public function EtatDDP(){
  $declars = $this->connection->query("SELECT * FROM `panierramasse` WHERE  `declaration`='$this->numero' AND ((`etat` like 'valide') OR (`etat` like 'En cours'))");
  if ($declars->num_rows>0) {
    foreach ($declars as $key) {
      return $key['etat'];
    }
  }
}

public static function ListeDeclaration(){
  $listedeclar = array();
  $exp = new self;
  $declars = $exp->connection->query("SELECT * FROM `declaration_v`");
  if ($declars) {
    if ($declars->num_rows>0) {
      foreach ($declars as $declar) {
        $exp = new self;
        if ($exp->TrouverDeclaration($declar['numero'])) {
          $listedeclar[] = $exp;
        }
      }
      return $listedeclar;
    }else
      return false;
  }else
    return false;
}

public static function DeclarationArchives(){
  $listedeclar = array();
  $exp = new self;
  $declars = $exp->connection->query("SELECT * FROM `declaration_v` WHERE `supprime_le`IS NOT NULL");
  if ($declars) {
    if ($declars->num_rows>0) {
      foreach ($declars as $declar) {
        $exp = new self;
        if ($exp->TrouverDeclaration($declar['numero'])) {
          $listedeclar[] = $exp;
        }
      }
      return $listedeclar;
    }else
      return false;
  }else
    return false;
}

public static function Total_Declarations(){
  $exp = new self;
  $declars = $exp->connection->query("SELECT * FROM `declaration_v`");
  return $declars->num_rows;
}

/*--------------------------------------------------------------- OLD -----------------------------------------------------------------*/

public function ARamassees($code){
    $conn = $GLOBALS['conn'];
    $declars = $this->connection->query("SELECT * FROM `declaration_v` WHERE `numero` in(SELECT `declaration` FROM `panierramasse` WHERE `etat`='En cours') AND `client1_id`=".$code);
    if ($declars) {
      if ($declars->num_rows>0) {
        return $declars->num_rows;
        }else
              return 0;
    }  else {
          return 0;
        }
    }
  public function DeclarARamassees($code){
      return $this->connection->query("SELECT * FROM `declaration_v` WHERE `numero` in(SELECT `declaration` FROM `panierramasse` WHERE `etat`='En cours') AND `client1_id`=".$code);
    }


public function validerRamassage($carnet){
  $this->connection->query("UPDATE `panierramasse` SET `etat`='Valide',`date_modification`=now() WHERE `declaration`='$this->numero' AND `numeroCarnet`=".$carnet);
}
public function GetLibCodeLiv($code){
  $oldconnection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
  $result = $oldconnection->query("SELECT * FROM livraisoncode WHERE id=".$code);
  if ($result) {
    if ($result->num_rows>0) {
      foreach ($result as $key) {
        return $key['lib'];
      }
    }else {
      return ' ';
    }
  }else {
    return ' ';
  }
}
public function GetLibCodeMotif($code){
  $oldconnection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
  $result = $oldconnection->query("SELECT * FROM motif WHERE id=".$code);
  if ($result) {
    if ($result->num_rows>0) {
      foreach ($result as $key) {
        return $key['lib'];
      }
    }else {
      return ' ';
    }
  }else {
    return ' ';
  }
}

public function Executer_requete($requete){
    $conn = $GLOBALS['conn'];
    $result = $this->connection->query($requete);
    return $result;
}

}
?>
