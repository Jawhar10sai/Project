<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once('txheads.php');
if (isset($_SESSION['user_id'])) {
  if (isset($_POST['nume'])) {
    $code= $_SESSION['user_id'];
    $numero = strip_tags($_POST['nume']);
    $reslt = $declarations->specDeclar($code,$numero);
    if ($reslt->num_rows>0) {

    foreach ($reslt as $key) {
      if ($key['courrier_eta']=='L') {
        $livree = 'glivree';
        $lligne = 'gligne';
        $eroute = 'geroute';
        $eligne = 'gligne';
        $agence = 'gagence';
        $aligne = 'gligne';
        $aprepar = 'gaprepar';
        $apligne = 'gligne';
        $asaisie = 'gasaisie';
      }elseif ($key['courrier_eta']=='R') {
        $livree = 'dlivree';
        $lligne = 'dligne';
        $eroute = 'geroute';
        $eligne = 'gligne';
        $agence = 'gagence';
        $aligne = 'gligne';
        $aprepar = 'gaprepar';
        $apligne = 'gligne';
        $asaisie = 'gasaisie';
      }elseif ($key['courrier_eta']=='A') {
        $livree = 'dlivree';
        $lligne = 'dligne';
        $eroute = 'deroute';
        $eligne = 'dligne';
        $agence = 'gagence';
        $aligne = 'gligne';
        $aprepar = 'gaprepar';
        $apligne = 'gligne';
        $asaisie = 'gasaisie';
      }elseif ($key['courrier_eta']=='P') {
        $livree = 'dlivree';
        $lligne = 'ligne';
        $eroute = 'deroute';
        $eligne = 'dligne';
        $agence = 'dagence';
        $aligne = 'dligne';
        $aprepar = 'gaprepar';
        $apligne = 'gligne';
        $asaisie = 'gasaisie';
      }else {
        $livree = 'dlivree';
        $lligne = 'dligne';
        $eroute = 'deroute';
        $eligne = 'dligne';
        $agence = 'dagence';
        $aligne = 'dligne';
        $aprepar = 'daprepar';
          $apligne = 'dligne';
        $asaisie = 'gasaisie';
      }
      $date = $key['date'];
      $exp = $key[''];
      $des = $clients->clientID($key['client2_id']);
      $agdep = $key[''];
      $agariv = $key[''];
      $adres = $adresses->IDAdresse($key['id_adres']);
      $vil = $villes->IDVille($adresses->VilleAdresse($key['id_adres']));
    }
    ?>
    <div class="row">
        <center>
          <table>
            <tr>
              <td><img src="images/<?=$asaisie;?>.png" alt="" class="img img-fluid" width="90px"></td>
              <td><img src="images/<?=$apligne;?>.png" alt="" class="img img-fluid"></td>
              <td><img src="images/<?=$aprepar;?>.png" alt="" class="img img-fluid" width="90px"></td>
              <td><img src="images/<?=$aligne;?>.png" alt="" class="img img-fluid"></td>
              <td><img src="images/<?=$agence;?>.png" alt="" class="img img-fluid" width="90px"></td>
              <td><img src="images/<?=$eligne;?>.png" alt="" class="img img-fluid"></td>
              <td><img src="images/<?=$eroute;?>.png" alt="" class="img img-fluid" width="90px"></td>
              <td><img src="images/<?=$lligne;?>.png" alt="" class="img img-fluid"></td>
              <td><img src="images/<?=$livree;?>.png" alt="" class="img img-fluid" width="90px"></td>
            </tr>
            <tr>
              <td class="text-center">En saisie</td>
              <td></td>
              <td class="text-center">En préparation</td>
              <td></td>
              <td class="text-center">En agence</td>
              <td></td>
              <td class="text-center">En route</td>
              <td></td>
              <td class="text-center">Livré</td>
            </tr>
          </table>
      </center>
  </div><br>
    <div class="row"><h4 class="col-6">Agence de départ</h4><label class="col-1">:</label><h4 class="col-5"><??></h4></div>
    <div class="row"><h4 class="col-6">Agence d'arrivée</h4><label class="col-1">:</label><h4 class="col-5"><?=$vil;?></h4></div>
    <div class="row"><h4 class="col-6">Date de départ</h4><label class="col-1">:</label><h4 class="col-5"><?=date('d/m/Y',strtotime($date));; ?></h4></div>
    <div class="row"><h4 class="col-6">Date de livraison</h4><label class="col-1">:</label><h4 class="col-5"><?=date('d/m/Y',strtotime($date));; ?></h4></div>
    <div class="row"><h4 class="col-6">Adresse</h4><label class="col-1">:</label><h4 class="col-5"><?=$adres .' - '.$vil;?></h4></div>
    <div class="row"><h4 class="col-6">Expéditeur</h4><label class="col-1">:</label><h4 class="col-5"><?=$_SESSION['usernom']; ?></h4></div>
    <div class="row"><h4 class="col-6">Déstinataire</h4><label class="col-1">:</label><h4 class="col-5"><?=$des;?></h4></div>
    <?php
  }else {

  ?>

  <div class="row">
    <center>
      <table>
        <tr>
          <td><img src="images/dasaisie.png" alt="" class="img img-responive" width="90px"></td>
          <td><img src="images/dligne.png" alt="" class="img img-responive"></td>
          <td><img src="images/daprepar.png" alt="" class="img img-responive" width="90px"></td>
          <td><img src="images/dligne.png" alt="" class="img img-responive"></td>
          <td><img src="images/dagence.png" alt="" class="img img-responive" width="90px"></td>
          <td><img src="images/dligne.png" alt="" class="img img-responive"></td>
          <td><img src="images/deroute.png" alt="" class="img img-responive" width="90px"></td>
          <td><img src="images/dligne.png" alt="" class="img img-responive"></td>
          <td><img src="images/dlivree.png" alt="" class="img img-responive" width="90px"></td>
        </tr>
        <tr>
          <td class="text-center">En saisie</td>
          <td></td>
          <td class="text-center">En préparation</td>
          <td></td>
          <td class="text-center">En agence</td>
          <td></td>
          <td class="text-center">En route</td>
          <td></td>
          <td class="text-center">Livré</td>
        </tr>
      </table><br>
      <h1>Code inexistant</h1>
  </center>
  </div>
  <?php
  }
  }
}else {
  header('location: index.php');
}
?>
