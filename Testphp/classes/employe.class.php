<?php

class Employes{


public static function ListeEmployes(){
    $result = Connection::getConnection()->query("select * from employe");
      return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    #$result = Connection::getConnection()->prepare("SELECT * FROM `ville` WHERE `VILLE_COD`=?");
    #if ($result->execute([$code])) {
      #$result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
      #return $result->fetch();
   # } else
    #  return false;

}

}
