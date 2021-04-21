  <?php

    class Marques
    {
        public $id_marque, $nomination, $date_creation, $date_modification, $date_suppression, $commit_par;
        function __construct()
        {
            $this->id_marque = "";
            $this->nomination = NULL;
            $this->date_creation = NULL;
            $this->date_modification = NULL;
            $this->date_suppression = NULL;
            $this->commit_par = NULL;
        }

        public static function TrouverMarque($id)
        {
            $result = Connexion::getConnexion()->prepare("SELECT * from `marque` where `id_marque`=? and date_suppression IS NULL");
            if ($result->execute([$id])) {
                $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
                return $result->fetch();
            } else
                return false;
        }

        public static function ListeMarques()
        {
            return Connexion::getConnexion()
                ->query("SELECT * from `marque` where date_suppression IS NULL")
                ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
        }

        public function MarquePda()
        {
            return PDAS::PdaMarque($this->id_marque);
        }

        public function AjouterMarque()
        {
            $stmt = Connexion::getConnexion()->prepare("INSERT INTO `marque`(`nomination`,`commit_par`) VALUES(?,?)");
            ($stmt->execute([$this->nomination, $this->commit_par])) ? true : false;
        }

        public function ModifierMarque()
        {
            $liste_donnees = array(
                ':nomination' => $this->nomination,
                ':commit_par' => $this->commit_par,
                ':id_marque' => $this->id_marque
            );
            $stmt = Connexion::getConnexion()->prepare("UPDATE `marque` SET `nomination`=:nomination,`date_modification`=now(),`commit_par`=:commit_par WHERE `id_marque`=:id_marque");
            ($stmt->execute($liste_donnees)) ? true : false;
        }
    }
