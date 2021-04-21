<?php
#Page de teste dans cette page on test si le mot de passe d'utilisateur est 12345678
require_once "control_utilisateur.php";
if (isset($_GET['pass'])) {
if ($client_lve->mot_de_passe ===sha1('12345678'))
  echo "a changer";
}else
  echo "a changer";
 ?>
