<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');
$clientsnombres = $conn->query("SELECT * FROM `clientsnombres` ORDER BY `total_sous_clients` DESC");
 ?>
<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <button style="background:transparent; border:0;" class="nav-link" id="infoper" onclick="clientsinfosperso()">informations personnelles</button>
      </li>
      <li class="nav-item">
        <button style="background:transparent; border:0;" class="nav-link" id="infopro" onclick="clientsinfospro()">informations professionnelles</button>
      </li>
    </ul>
  </div>
  <div class="card-body infocl">

  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-8">
      <div class="card">
        <div class="card-header">
          Clients:
        </div>
        <div class="card-body">
          <table class="table table-bordered col-12">
            <tr>
              <td>Client</td>
              <td>Nombre des sous-clients</td>
              <td>Nombre des déclaration</td>
              <td>Nombre des sessions</td>
            </tr>
            <?php foreach ($clientsnombres as $clientsnombre): ?>
              <tr>
                <td><?=$clientsnombre['NOM']; ?></td>
                <td class="text-center"><?=$clientsnombre['total_sous_clients']; ?></td>
                <td class="text-center"><?=$clientsnombre['total_declars']; ?></td>
                <td class="text-center"><?=$clientsnombre['total_session']; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    clientsinfosperso();
  });
</script>
