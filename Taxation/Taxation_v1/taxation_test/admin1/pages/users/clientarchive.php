<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
    <div class="content-title m-x-auto">
      <h1>Clients:</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Clients Archivés</h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr class="text-center">
                <td class="text-center">Client</td>
                <td class="text-center">Code du client</td>
                <td class="text-center">Adresse</td>
                <td class="text-center">Contact</td>
                <td class="text-center">Réinitialiser</td>
              </tr>
              <?php
              if ($clients->ClientArchives()->num_rows>0) {
              foreach ($clients->ClientArchives() as $user){ ?>
              <tr>
                <td><?=$user['NOM']; ?></td>
                <td><?=$user['CLIENT_COD']; ?></td>
                <td><?=$user['telephone']; ?></td>
                <td><?=$user['PRENOM']; ?></td>
                <td></td>
              </tr>
            <?php }
          }else {
            ?>
            <tr class="text-center">
              <td colspan="5">Pas de clients archivés</td>
            </tr>
            <?php
          } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
