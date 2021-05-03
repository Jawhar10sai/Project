<?php
include("classes/employe.class.php");
include("classes/entreprise.class.php");

$employe = new Employe();

$employe->nom = "test";
Entreprise::getEmlopee($employe);
exit;
/*
if (isset($_POST['save'])) {
  $employe->nom = $_POST['nom'];
  $employe->prenom = $_POST['prenom'];
  $employe->mail = $_POST['mail'];
  $employe->EnregisterEmploye();
  echo $employe->showInfo();
  exit;
  header('location:index.php');
} else {
  $listeemployes = $employe->AllEmployes();
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <table border="1">
    <tr>
      <td>id</td>
      <td>Nom</td>
      <td>Prenom</td>
      <td>E-mail</td>
    </tr>
    <?php foreach ($listeemployes as $emp) : ?>
      <tr>
        <td><?= $emp['id_employe']; ?></td>
        <td><?= $emp['nom']; ?></td>
        <td><?= $emp['prenom']; ?></td>
        <td><?= $emp['email']; ?></td>
      </tr>

    <?php endforeach; ?>
  </table>

  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom"><br>
    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" name="prenom"><br>
    <label for="age">Age</label>
    <input type="text" id="age" name="mail"><br>
    <input type="submit" name="save" value="Save">
  </form>

  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom"><br>
    <input type="submit" name="change" value="Change">
  </form>
</body>

</html>
*/