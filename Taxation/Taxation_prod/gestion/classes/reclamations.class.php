<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Reclamations
{
  public $id, $numero, $client, $dateReclamation, $telFix, $user, $telGSM, $typeutil, $recTypeObjet, $recObjet;
  protected $connection;

  function __construct()
  {
    $this->id = "";
    $this->numero = "";
    $this->client = "";
    $this->dateReclamation = date('Y-m-d');
    $this->user = "";
    $this->telGSM = "";
    $this->telFix = "";
    $this->typeutil = "expediteur";
    $this->recTypeObjet = "";
    $this->recObjet = "";
    //Connection::getConnection() = $GLOBALS['conn'];
  }

  public function ListeReclamations()
  {
    return Connection::getConnection()->query("SELECT * FROM `reclamation` WHERE `supprime_le`IS NULL");
  }

  public function AjouterReclamation()
  {
    require 'vendor/autoload.php';
    $donnees = array(
      ":client" => $this->client,
      ":num_declar" => $this->numero,
      ":objet_reclamation" => $this->recObjet,
      ":id_user" => $this->user,
      ":type_utilisateur" => $this->typeutil,
      ":tpy_reclam" => $this->recTypeObjet
    );
    $stmt = Connection::getConnection()->prepare("INSERT INTO `reclamation`(`date_reclamation`, `client`, `num_declar`, `objet_reclamation`, `id_user`, `type_utilisateur`, `tpy_reclam`) VALUES (now(),:client,:num_declar,:objet_reclamation,:id_user,:type_utilisateur,:tpy_reclam)");
    if ($stmt->execute($donnees)) {
      $mail = new PHPMailer(true);
      try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'lavoieexpressmaroc@gmail.com';
        $mail->Password   = 'L@voieexpre$$96';
        $mail->SMTPSecure = "ssl";
        $mail->Port       = 465;
        $mail->setFrom('lavoieexpressmaroc@gmail.com', 'Reclamation');
        $mail->addAddress('j.hassou@lavoieexpress.ma', 'Jawhar HASSOU');
        #$mail->addCC('s.zaki@lavoieexpress.ma');
        $mail->isHTML(true);
        $mail->Subject = 'Objet de test';
        $body = 'Ceci est un mail de <b>test</b> <br />';
        $body .= "
        Je tiens a vous informer qu'il y a un retard a la livraison de ma declaration: <b style='color:red;'>" . $this->numero . " </b><br/>
        <h5>Numero de telephone: " . $this->telGSM . "</h5>
        <h5>Numero de fixe: " . $this->telFix . "</h5>";
        $mail->Body    = $body;
        return ($mail->send()) ? true : false;
      } catch (Exception $e) {
        return false;
        #echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    } else
      return false;
  }
  public function TrouverReclamation($id)
  {
    $reclams = Connection::getConnection()->query("SELECT * FROM `reclamation` WHERE `id_reclamation`=$this->id AND `supprime_le`IS NULL");
    if ($reclams) {
      if ($reclams->num_row > 0) {
        foreach ($reclams as $reclam) {
          $this->id = $reclam['id_reclamation'];
          $this->numero = $reclam['num_declar'];
          $this->client = $reclam['idclient'];
          $this->dateReclamation = $reclam['date_reclamation'];
          $this->recObjet = $reclam['objet_reclamation'];
          $this->user = $reclam['id_user'];
          $this->typeutil = $reclam['type_utilisateur'];
          $this->recTypeObjet = $reclam['tpy_reclam'];
        }
        return true;
      } else
        return false;
    } else
      return false;
  }
  public function ModifierReclamation($par)
  {
    Connection::getConnection()->query("UPDATE `reclamation` SET `date_reclamation`='$this->dateReclamation',`client`='$this->client',`num_declar`='$this->numero',`objet_reclamation`='$this->recObjet',`id_user`=$this->user,`type_utilisateur`='$this->typeutil',`tpy_reclam`='$this->recTypeObjet',`modifie_le`=now(),`commit_par`='$par' WHERE `id_reclamation`=$this->id");
  }
  public function SupprimerReclamation($par)
  {
    Connection::getConnection()->query("UPDATE `reclamation` SET `supprime_le`=now(),`commit_par`='$par' WHERE `id_reclamation`=$this->id");
  }
}
