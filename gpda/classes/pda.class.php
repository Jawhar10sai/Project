<?php
class PDAS
{
    public $id_pda, $nomination, $Marque, $imei, $mac_wifi, $affectation, $date_affectation, $licence_pda, $date_creation, $date_modification, $date_suppression, $commit_par;
    function __construct()
    {
        $this->id_pda = "";
        $this->nomination = NULL;
        $this->Marque = NULL;
        $this->imei = NULL;
        $this->mac_wifi = NULL;
        $this->affectation = NULL;
        $this->date_affectation = NULL;
        $this->licence_pda = NULL;
        $this->date_creation = NULL;
        $this->date_modification = NULL;
        $this->date_suppression = NULL;
        $this->commit_par = NULL;
    }

    public static function TrouverPda($id)
    {
        $result = Connexion::getConnexion()->prepare("SELECT * FROM `pda` WHERE `id_pda`=? AND `date_suppression` IS NULL");
        if ($result->execute([$id])) {
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
            return $result->fetch();
        } else
            return true;
    }

    public static function ListePdas()
    {
        return Connexion::getConnexion()
            ->query("SELECT * FROM `pda` WHERE `date_suppression` IS NULL")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    }
    public static function PdaMarque($marque)
    {
        $result = Connexion::getConnexion()->prepare("SELECT * FROM `pda` WHERE `Marque`=? AND `date_suppression` IS NULL");
        if ($result->execute([$marque]))
            $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
        else
            return false;
    }

    public static function PdaLivreur($livreur)
    {
        $result = Connexion::getConnexion()->prepare("SELECT * FROM `pda` WHERE `affectation`=? AND `date_suppression` IS NULL");
        if ($result->execute([$livreur]))
            $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
        else
            return false;
    }

    public function AjouterPda()
    {
        $liste_donnees = array(
            ':nomination' => $this->nomination,
            ':Marque' => $this->Marque,
            ':imei' => $this->imei,
            ':mac_wifi' => $this->mac_wifi,
            ':affectation' => $this->affectation,
            ':date_affectation' => $this->date_affectation,
            ':licence_pda' => $this->licence_pda,
            ':commit_par' => $this->commit_par
        );
        $stmt = Connexion::getConnexion()->prepare("INSERT INTO `pda`(`nomination`, `Marque`, `imei`, `mac_wifi`, `affectation`, `date_affectation`, `licence_pda`, `commit_par`) VALUES (:nomination,:Marque,:imei,:mac_wifi,:affectation,:date_affectation,:licence_pda,:commit_par)");
        return ($stmt->execute($liste_donnees)) ? true : false;
    }

    public function ModifierPda()
    {
        $liste_donnees = array(
            ':id_pda' => $this->id_pda,
            ':nomination' => $this->nomination,
            ':Marque' => $this->Marque,
            ':imei' => $this->imei,
            ':mac_wifi' => $this->mac_wifi,
            ':affectation' => $this->affectation,
            ':date_affectation' => $this->date_affectation,
            ':licence_pda' => $this->licence_pda,
            ':commit_par' => $this->commit_par
        );
        $stmt = Connexion::getConnexion()->prepare("UPDATE `pda` SET `nomination`=:nomination,`Marque`=:Marque,`imei`=:imei,`mac_wifi`=:mac_wifi,`affectation`=:affectation,`date_affectation`=:date_affectation,`licence_pda`=:licence_pda,`date_modification`=now(),`commit_par`=:commit_par WHERE `id_pda`=:id_pda");
        return ($stmt->execute($liste_donnees)) ? true : false;
    }
    public function SupprimerPda()
    {
        $stmt = Connexion::getConnexion()->prepare("UPDATE `pda` SET `date_suppression`=now() WHERE `id_pda`=?");
        return ($stmt->execute([$this->id_pda])) ? true : false;
    }
}
