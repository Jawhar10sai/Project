<?php
require_once('Connections/connection.php');
  include ('classes/declarations.php');
    $decs = new Declarations();

    if (isset($_GET['dec'])) {
      $decs->ArchevDeclaration($_GET['dec']);
      $decs->suuprimerDeclaration($_GET['dec']);
      //header('location: declaration.php');
     }

 ?>
