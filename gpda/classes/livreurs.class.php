<?php
class Livreurs
{

    public $id_livreur, $nom, $prenom, $agence, $matricule, $date_embauche, $date_sortie, $numero_telephone, $date_creation, $date_modification, $date_suppression, $commit_par;

    function __constuct()
    {
        $this->nom = NULL;
        $this->prenom = NULL;
        $this->agence = NULL;
        $this->matricule = NULL;
        $this->date_embauche = NULL;
        $this->date_sortie = NULL;
        $this->numero_telephone = NULL;
        $this->date_creation = NULL;
        $this->date_modification = NULL;
        $this->date_suppression  = NULL;
        $this->commit_par = NULL;
    }
    public static function ListeLivreurs()
    {
        return Connexion::getConnexion()
            ->query("SELECT * FROM livreurs WHERE date_suppression IS NULL")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    }
    public static function TrouverLivreur($id)
    {
        $result = Connexion::getConnexion()->prepare("SELECT * FROM livreurs WHERE id_livreur=? AND date_suppression IS NULL");
        if ($result->execute([$id])) {
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
            return $result->fetch();
        } else
            return false;
    }

    public function AjouterLivreur()
    {
        $liste_donnees = array(
            ':nom' => $this->nom,
            ':prenom' => $this->prenom,
            ':agence' => $this->agence,
            ':matricule' => $this->matricule,
            ':date_embauche' => $this->date_embauche,
            ':numero_telephone' => $this->numero_telephone,
            ':commit_par' => $this->commit_par
        );
        $stmt = Connexion::getConnexion()->prepare("INSERT INTO `livreurs`( `nom`, `prenom`, `agence`, `matricule`, `date_embauche`, `numero_telephone`, `commit_par`) VALUES (':nom',':prenom',':agence',':matricule',':date_embauche', ':numero_telephone',':commit_par')");
        return ($stmt->execute($liste_donnees)) ? true : false;;
    }

    public function ModifierLivreur()
    {
        $liste_donnees = array(
            ':id_livreur' => $this->id_livreur,
            ':nom' => $this->nom,
            ':prenom' => $this->prenom,
            ':agence' => $this->agence,
            ':matricule' => $this->matricule,
            ':date_embauche' => $this->date_embauche,
            ':date_sortie' => $this->date_sortie,
            ':numero_telephone' => $this->numero_telephone,
            ':commit_par'  => $this->commit_par
        );
        $stmt = Connexion::getConnexion()->prepare("UPDATE `livreurs` SET `nom`=:nom,`prenom`=:prenom,`agence`=:agence,`matricule`=:matricule,`date_embauche`=:date_embauche,`date_sortie`=:date_sortie,`numero_telephone`=:numero_telephone,`date_modification`=now(),`commit_par`=:commit_par WHERE `id_livreur`=:id_livreur");
        return ($stmt->execute($liste_donnees)) ? true : false;
    }

    public function SupprimerLivreur()
    {
        $stmt = Connexion::getConnexion()->prepare("UPDATE `livreurs` SET `date_suppression`=now(),`commit_par`=? WHERE `id_livreur`=?");
        return ($stmt->execute([$this->commit_par, $this->id_livreur])) ? true : false;
    }

    public static function LivreurAgence($ag)
    {
        $result = Connexion::getConnexion()->prepare("SELECT * FROM `livreurs` WHERE agence=? AND `date_suppression` IS NULL");
        if ($result->execute([$ag]))
            return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
        else
            return false;
    }

    public function LivreurPda()
    {
        return PDAS::PdaLivreur($this->id_livreur);
    }
}
