<?php
class Consigne
{
    public $num_serie_consigne, $etat, $gps_latitude, $gps_localisation, $gps_longitude, $adresse, $adresse_ip, $date_affectation, $date_creation_consigne, $modele, $nbre_de_casier, $ville_affectation,
        $numero_expedition, $adresse_destination, $email, $hauteur, $largeur, $longueur, $poids, $status_relais, $tel, $type_case, $message_erreur;
    function __construct()
    {
        $this->adresse_destination = NULL;
        $this->hauteur = NULL;
        $this->largeur = NULL;
        $this->longueur = NULL;
        $this->poids = 0;
        $this->status_relais = -1;
        $this->message_erreur = NULL;
    }
    public static function TrouverConsigne($id)
    {
        $result = Connection::getConsigneConnexion()->prepare("SELECT * FROM `consigne` WHERE `num_serie_consigne`=?");
        if ($result->execute([$id])) {
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
            return $result->fetch();
        } else
            return false;
    }
    public static function ListeConsignes()
    {
        $result = Connection::getConsigneConnexion()->query("SELECT * FROM `consigne`");
        return ($result) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
    }
    public static function CongisnesEtat($etat)
    {
        $result = Connection::getConsigneConnexion()->prepare("SELECT * FROM `consigne` WHERE `etat` LIKE ?");
        return ($result->execute([$etat])) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
    }

    public static function CongisnesVille($ville)
    {
        $result = Connection::getConsigneConnexion()->prepare("SELECT * FROM `consigne` WHERE `ville_affectation` LIKE ?");
        return ($result->execute(["%" . $ville . "%"])) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
    }

    public function Reservation()
    {

        $donnees_reservation = array(
            ":numero_expedition" => $this->numero_expedition,
            ":adresse_destination" => $this->adresse_destination,
            ":email" => $this->email,
            ":hauteur" => $this->hauteur,
            ":id_consigne" => $this->num_serie_consigne,
            ":largeur" => $this->largeur,
            ":longueur" => $this->longueur,
            ":poids" => $this->poids,
            ":status_relais" => $this->status_relais,
            ":tel" => $this->tel,
            ":type_case" => $this->type_case,
            ":message_erreur" => $this->message_erreur
        );
        $result = Connection::getConsigneConnexion()->prepare("INSERT INTO `expedition`(`numero_expedition`, `adresse_destination`, `email`, `hauteur`, `id_consigne`, `largeur`, `longueur`, `poids`, `status_relais`, `tel`, `type_case`, `message_erreur`) VALUES (:numero_expedition, :adresse_destination, :email, :hauteur, :id_consigne, :largeur, :longueur, :poids, :status_relais, :tel, :type_case, :message_erreur)");
        return ($result->execute($donnees_reservation)) ? true : false;
    }
}
