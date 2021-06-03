<?php
class Consigne
{
    public $num_serie_consigne,$etat,$gps_latitude,$gps_localisation,$gps_longitude,$adresse,$adresse_ip,$date_affectation,$date_creation_consigne,$modele,$nbre_de_casier,$ville_affectation;

    function __construct()
    {
    }
    public static function TrouverConsigne($id)
    {
        $result = Connection::getConsigneConnexion()->prepare("SELECT * FROM `consigne` WHERE `num_serie_consigne`=?");
        if ($result->execute([$id])) {
            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
            return $result->fetch();
        }  else 
        return false;
    }
    public static function ListeConsignes(){
        $result = Connection::getConsigneConnexion()->query("SELECT * FROM `consigne`");
        return ($result) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
    }
    public static function CongisnesEtat($etat){
        $result = Connection::getConsigneConnexion()->prepare("SELECT * FROM `consigne` WHERE `etat` LIKE ?");
        return ($result->execute([$etat])) ? $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__) : false;
    }

}
