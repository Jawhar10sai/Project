<?php
class test
{
  public  $id, $statut, $count;
  protected $connection;
  function __construct()
  {
    $this->id = "";
    $this->statut = "";
    $this->count = "";
    $this->connection = new PDO("mysql:host=localhost;dbname=test", "root", "");
  }
  public static function ListeTests()
  {
    $test = new self;
    return $test->connection->query("SELECT * FROM `table_test`")->fetchObject(__CLASS__);
  }
}
/**
 *
 */
/**
 *
 */
class userr
{
  public $id, $nom, $prenom, $mail;
  #protected $position;
  protected $connection;
  function __construct()
  {
    #$this->connection = new mysqli('localhost', 'root', '', 'test');
    $this->prenom = 'testPrenom';
    $this->mail = 'test@mail.com';
  }
}

class Employe extends userr
{
  protected $insert_data;
  function __construct()
  {
    $this->id = "DEV1007";
    $this->nom = 'testnom2';
    $this->prenom = 'testPrenom1';
    $this->mail = 'test@mail.com1';
    $this->position = NULL;

    #$this->connection = new mysqli('localhost', 'root', '', 'test');
    $this->connection = new PDO("mysql:host=localhost;dbname=test", "root", "");
    # mysqli('localhost', 'root', '', 'test');
  }
  private function actualiser_donner()
  {
    $this->insert_data = array(
      ':id'    =>  $this->id,
      ':nom'    =>  $this->nom,
      ':mail'    =>  $this->prenom,
      ':position'    =>  $this->position
    );
  }
  public static function person_by_id($id)
  {
    $emp = new self;
    #$stmt = $emp->connection->query("SELECT * FROM employe WHERE id=$id")->fetch_object(__CLASS__);
    $stm = $emp->connection->query("SELECT * FROM employe WHERE id=$id");
    #->fetch_object(__CLASS__);
    #$stm->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    #return $stm->fetch();
    return $stm->fetchObject();
    #return $stmt->fetch_object(__CLASS__);
    //PDO:
    #$stmt->execute([$id]);
    #return $stmt->fetchObject(__CLASS__);
  }
  public function MesStatuts()
  {
    return $this->connection->query("SELECT * FROM `table_test`")->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'test');
    #$test = new test;
    #return test::ListeTests();
  }
  public static function LsitePerson()
  {
    $emp = new self;
    #$liste_emps = array();
    return $emp->connection->query("SELECT * FROM employe")->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__);
    #$stmt = $emp->connection->query("SELECT * FROM employe")->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    #return $stmt      ->setFetchMode(PDO::FETCH_CLASS, __CLASS__)      ->fetchAll();

    /*foreach ($stmt  as $stm) {
      $liste_emps[] = $stm->fetch_object(__CLASS__);
    }
    return $liste_emps;*/
  }

  public function ChangeNom($nom)
  {
    $this->nom = $nom;
  }
  public function EnregisterPerson()
  {
    $this->actualiser_donner();
    $statement = $this->connection->prepare("INSERT INTO person (`matricule`,`nom`, `mail`, `position`) VALUES (:id, :nom, :mail, :position)");
    if ($statement->execute($this->insert_data)) {
      echo $this->connection->lastInsertId();
    }
  }
  /*
  public function EnregisterEmploye()
  {

    $insert_data = array(
      ':nom'    =>  $this->nom,
      ':prenom'    =>  $this->prenom,
      ':mail'    =>  $this->mail
    );

    $query = "
      INSERT INTO employe 
      (nom, prenom, email) 
      VALUES (:nom, :prenom, :mail)
      ";

    $statement = $this->connection->prepare($query);
    if ($statement->execute($insert_data)) {
      echo $this->connection->lastInsertId();
      #"Inserted";
    }
    #$conn = new mysqli('localhost', 'root', '', 'test');
    #$this->connection->query("INSERT INTO `employe`( `nom`, `prenom`, `email`) VALUES ('$this->nom','$this->prenom','$this->mail')");
  }
  public function AllEmployes()
  {

    #$conn = new mysqli('localhost', 'root', '', 'test');
    $result = $this->connection->query("SELECT * FROM `employe`");
    return $result;
  }
  public static function load_by_id($id)
  {
    $emp = new self;
    $stmt = $emp->connection->prepare('SELECT * FROM employe WHERE id=?');
    $stmt->execute([$id]);
    return $stmt->fetchObject(__CLASS__);
  }

  public function ModifierEmploye($id)
  {

    $insert_data = array(
      ':id' => $id,
      ':nom'    =>  $this->nom,
      ':prenom'    =>  $this->prenom,
      ':mail'    =>  $this->mail
    );

    $query = "
    UPDATE employe set nom=:nom, prenom=:prenom, email=:mail
    where id=:id
      ";

    $statement = $this->connection->prepare($query);
    if ($statement->execute($insert_data)) {
      echo "Updated";
    }
    #$conn = new mysqli('localhost', 'root', '', 'test');
    #$this->connection->query("INSERT INTO `employe`( `nom`, `prenom`, `email`) VALUES ('$this->nom','$this->prenom','$this->mail')");
  }*/
}

/*
$emp = new Employe;
#var_dump($emp->MesStatuts());
#exit;
foreach ($emp->MesStatuts() as $statut) {
  echo $statut->count . '<br>';
}
exit;*/
#$emp->ChangeNom("test' 4");
#$emp->EnregisterPerson();

$user = Employe::person_by_id(1);
if ($user)
  echo $user->id . " - " . $user->nom;
else
  echo "Not found";
/*foreach (Employe::LsitePerson() as $user) {
  echo $user->id . " - " . $user->nom . " - " . $user->prenom . "<br>";
}*/
#print var_dump($user);


#$emp->EnregisterEmploye();
#echo "<br>" . $nom . "<br>";
#$nom = "my' test 1";
#$emp->ChangeNom($nom);
#$emp->ModifierEmploye(2);


  #echo "SELECT * FROM `declaration_v` WHERE " . $client . "=$this->CLIENT_ID AND `supprime_le` IS NULL";
    #exit;
    #$stmt = $this->connection->prepare("SELECT * FROM `declaration_v` WHERE " . $client . "=? AND `supprime_le` IS NULL");
    #$stmt->execute([$this->CLIENT_ID]);
    #return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Declarations');