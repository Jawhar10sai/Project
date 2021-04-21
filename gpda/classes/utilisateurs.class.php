<?php
class Utilisateurs
{
    public $id, $nom, $prenom, $poste, $us_login, $us_mdpasse, $date_creation, $date_modification, $date_suppression, $commit_par;
    function __construct()
    {

        $this->id = NULL;
        $this->nom = NULL;
        $this->prenom = NULL;
        $this->poste = NULL;
        $this->us_login = NULL;
        $this->us_mdpasse = "7c222fb2927d828af22f592134e8932480637c0d";
        $this->date_creation = NULL;
        $this->date_modification = NULL;
        $this->date_suppression = NULL;
        $this->commit_par = NULL;
    }
    public static function TrouverUtilisateur($id)
    {
        $result = Connexion::getConnexion()->prepare("SELECT * FROM `utilisateurs` WHERE `id`=? AND `date_suppression` IS NULL");
        if ($result->execute([$id])) {
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
            return $result->fetch();
        } else
            return false;
    }
    public static function ListeUtilisateurs()
    {
        return Connexion::getConnexion()
            ->query("SELECT * FROM `utilisateurs` WHERE  `date_suppression` IS NULL")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    }

    public static function VerifierUtilisateur($username, $mot_passe)
    {
        $result = Connexion::getConnexion()
            ->prepare("SELECT * FROM `utilisateurs` WHERE `us_login`=? AND `us_mdpasse`=? AND `date_suppression` IS NULL");
        if ($result->execute([$username, $mot_passe])) {
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
            return $result->fetch();
        } else
            return false;
    }

    private function AjouterUtilisateur()
    {
        if (self::VerifierUtilisateur($this->us_login, $this->us_mdpasse))
            return false;
        else {
            $liste_donnees = array(
                ':nom' => $this->nom,
                ':prenom' => $this->prenom,
                ':poste' => $this->poste,
                ':us_login' => $this->us_login,
                ':us_mdpasse' => $this->us_mdpasse,
                ':commit_par' => $this->commit_par
            );
            $stmt = Connexion::getConnexion()
                ->prepare("INSERT INTO `utilisateurs`(`nom`, `prenom`, `poste`, `us_login`, `us_mdpasse`, `commit_par`) VALUES (:nom,:prenom,:poste,:us_login,:us_mdpasse,:commit_par)");
            return ($stmt->execute($liste_donnees)) ? true : false;
        }
    }

    private function ModifierUtilisateur()
    {
        $liste_donnees = array(
            ':id' => $this->id,
            ':nom' => $this->nom,
            ':prenom' => $this->prenom,
            ':poste' => $this->poste,
            ':us_login' => $this->us_login,
            ':us_mdpasse' => $this->us_mdpasse,
            ':commit_par' => $this->commit_par
        );
        $stmt = Connexion::getConnexion()
            ->prepare("INSERT INTO `utilisateurs` SET `nom`=:nom, `prenom`=:prenom, `poste`=:poste, `us_login`=:us_login, `us_mdpasse`=:us_mdpasse,`date_modification`=now(), `commit_par`=:commit_par WHERE `id`=:id)");
        return ($stmt->execute($liste_donnees)) ? true : false;
    }

    public function Enregistrer()
    {
        if ($this->id != NULL)
            $this->ModifierUtilisateur();
        else
            $this->AjouterUtilisateur();
    }
    public function SupprimerUtilisateur()
    {
        $stmt = Connexion::getConnexion()->prepare("UPDATE `utilisateurs` SET `date_suppression`=now(), `commit_par`=? WHERE id=?");
        return ($stmt->execute([$this->commit_par, $this->id])) ? true  : false;
    }
}
