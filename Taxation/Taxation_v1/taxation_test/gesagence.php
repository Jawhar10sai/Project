<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('classes/fetchclas.php');
require_once('classes/conftaxDB.php');
$lists = $agences->mesAgences($_SESSION['user_id']);
  ?>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <td>Code d'agence</td>
        <td class="col-9">Agence</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($lists as $key): ?>
      <tr>
        <td><?=$key['AGENCE_COD'];?></td>
        <td><?=$key['AGENCE_LIB'];?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
