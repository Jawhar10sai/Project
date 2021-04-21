<?php
require_once ('txheads.php');
$list_dec = $declarations->DeclarARamassees($_SESSION['user_id']);
if (isset($_POST['valider'])) {
  if ($_POST['codrams']=="") {
    echo "<script>
      alert('Veuillez vous saisir le code');
    </script>";
  }elseif($_POST['codrams']!=$declarations->coderamassageEncours($_SESSION['user_id'])){
    echo "<script>
      alert('Code erroné!');
    </script>";
  }elseif ($_POST['codrams']==$declarations->coderamassageEncours($_SESSION['user_id'])) {
      $carnet = $declarations->carnetEncours($_SESSION['user_id']);
      /*echo ("UPDATE `panierramasse` SET `etat`='annule',`date_modification`=now() WHERE `numeroCarnet`=".$carnet);
      foreach ($_POST['numeros'] as $key) {
        echo("<br> UPDATE `panierramasse` SET `etat`='Valide',`date_modification`=now() WHERE `declaration`='$key' AND `numeroCarnet`=".$carnet);

      } exit;*/
      $conn->query("UPDATE `panierramasse` SET `etat`='annule',`date_modification`=now() WHERE `numeroCarnet`=".$carnet);
      foreach ($_POST['numeros'] as $key) {
        $declarations->validerRamassage($key,$carnet);
        #echo $key;
      }
      $valide = $conn->query("UPDATE `ramasse` SET `code_ramassage`='0' WHERE `numeroCarnet`=".$carnet);
      if ($valide) {
        /*

        Code d'impression du carnet de ramassage:
          $query_declaration = "SELECT * FROM impcarnet where etat='Valide' AND numeroCarnet=".$numero;

        */
        echo "<script>
          alert('Canret validé!');
        </script>";
        header('location: carnet/'.$carnet);
      }

    }
}elseif (isset($_POST['annuler'])) {
  $carnet = $declarations->carnetEncours($_SESSION['user_id']);
  $motif = $_POST['motif'];
  $conn->query("UPDATE `panierramasse` SET `etat`='annule',`date_modification`=now(),`motif_annulation`='$motif' WHERE `numeroCarnet`=".$carnet);
  $valide = $conn->query("UPDATE `ramasse` SET `code_ramassage`='0' WHERE `numeroCarnet`=".$carnet);
  header('location: declaration.php');
}
 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>

     <meta charset="utf-8">
     <title></title>
     <style media="screen">
     #foot{
       background-color: #ffffff;
       border-radius: 5px;
       border: 1px solid;
     }
     </style>
   </head>
   <body>
     <!--###################################################################################-->

     <nav class="navbar navbar-expand-lg navbar-inverse fixed-top navbar-dark" style="background-color:#a8a8a8;">
            <a class="navbar-brand" href="consultation.php"> <img src="images/voielvej.png" height="37.453" width="114" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                 <li class="nav-item">
                    <a class="nav-link" href="consultation.php" style="font-size:18px;">Consultaion</a>
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="declaration.php" style="font-size:18px;">Déclaration <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="track.php" style="font-size:18px;">Suivi colis</a>
                  </li>
                  <?php if ($_SESSION['typuser']=="clientlve"): ?>
                    <li class="nav-item">
                       <a class="nav-link " href="agences.php" style="font-size:18px;">Mes sessions</a>
                    </li>
                  <?php endif; ?>
                  <!--<li class="nav-item">
                     <a class="nav-link" href="" style="font-size:18px;">Facturation</a>
                  </li>-->
				 <li class="nav-item">
                    <a class="nav-link " href="tracking.php" style="font-size:18px;">Suivis des envois</a>
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="Reclamation/" style="font-size:18px;">Réclamations</a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right" style=" padding: 5px;border-radius:15px;background-color: #CCCCCC;">
                 <li class="nav-item">
                   <a href="panierramass.php" style="color:red;"><img src="images/cart.png" width="25" height="25" alt=""><span style="padding-left: 15px;color:#545454;font-size:25px;"><?=$_SESSION['countcart'];?></span></a>
                 </li>
               </ul>
               <ul class="nav navbar-nav navbar-right col-1">
                 <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?=$_SESSION['usernom'];?>
                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="profile.php"><span><i class="fas fa-user"></i></span>Profile</a>
                     <a class="dropdown-item" href="deco.php"><span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>Deconnecter</a>
                   </div>
                 </li>
               </ul>
            </div>
         </nav>
    <body onload="hidemotif()">
      <div class="container-fluid" style="margin-top:80px;background-color:white;">
        <div class="row">
          <div class="col-12">
            <form class="" autocomplete="off" action="<?=$_SERVER['PHP_SELF']; ?>" method="post">
              <table class="table table-striped table-bordered table-responsive col-12">
                <tr>
                  <td >
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox"  class="form-check-input" id="checkAll" >Ramasser
                      </label>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                  <td>Numéro</td>
                  <td>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Colis</td>
                  <td>Valeur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Destinataire</td>
                  <td>Livraison&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Express</td>
                  <td>Port</td>
                  <td>Courrier</td>
                  <td>Nature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Espèces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Chèque&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>Traite&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>BL</td>
                  <td>Adresse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                  <?php if (!empty($list_dec)) {
                  foreach ($list_dec as $row_list_dec) {
                    if ($row_list_dec['express']=="X") {
                      $expr = "Oui";
                    }else {
                      $expr = "Non";
                    }
                    if ($row_list_dec['livraison'] == "D") {
                      $livr = "À domicile";
                    }elseif ($row_list_dec['livraison'] == "p") {
                      $livr = "Points relais";
                    }else {
                      $livr = "En gare";
                    }
                    if ($row_list_dec['courrier_typ'] == "M") {
                      $typcr = "Messagerie";
                    }elseif ($row_list_dec['courrier_typ'] == "25") {
                      // code...
                      $typcr = "Affrêtement 25T";
                    }elseif ($row_list_dec['courrier_typ'] == "14") {
                        $typcr = "Affrêtement 14T";
                    }elseif ($row_list_dec['courrier_typ'] == "5") {
                        $typcr = "Affrêtement 5T";
                    }elseif ($row_list_dec['courrier_typ'] == "U") {
                        $typcr = "Affrêtement utilitaires";
                    }
                    if ($row_list_dec['port'] == "P") {
                      $prt = "Payé";
                    }else{
                      $prt = "Du";
                    }
                    ?>
                    <tr>
                      <td> <input type="checkbox" class="numexramassage" name="numeros[]" value="<?= $row_list_dec['numero']; ?>"> </td>
                      <td><?= $row_list_dec['numero']; ?></td>
                      <td><?=$row_list_dec['date']; ?></td>
                      <td><?= $row_list_dec['colis']; ?></td>
                      <td class="text-right"><?= number_format($row_list_dec['valeur'], 2, ',', ' '); ?></td>
                      <td><?= strtoupper($clients->clientID($row_list_dec['client2_id'])); ?></td>
                      <td><?= $livr; ?></td>
                      <td><?= $expr;?></td>
                      <td><?= $prt; ?></td>
                      <td><?= $typcr; ?></td>
                      <td><?= $row_list_dec['nature']; ?></td>
                      <td class="text-right"><?= number_format($row_list_dec['Espece'], 2, ',', ' '); ?></td>
                      <td class="text-right"><?= number_format($row_list_dec['Cheque'], 2, ',', ' '); ?></td>
                      <td class="text-right"><?= number_format($row_list_dec['Traite'], 2, ',', ' '); ?></td>
                      <td><?= $row_list_dec['BL']; ?></td>
                      <td><?=ucfirst($adresses->IDAdresse($row_list_dec['id_adres']));?></td>
                    </tr>
                    <?php
                  }
                }if ($list_dec->num_rows==0) {
                  ?>
                  <tr>
                    <td colspan="16" class="text-center">Pas de demande de ramassage</td>
                  </tr>
                  <?php
                } ?>
              </table>
              <div class="form-row text-center">
                <div class="vdiv col-5">
                  <div class="form-group text-left ">
                    <p>
                      <h6>Veuillez-vous sélectionner les déclarations pour valider le carnet!</h6>
                    </p>
                    <label for="">Code de ramassage:</label>
                    <input type="text" name="codrams" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-success  btn-block" name="valider">Valider le ramassage</button>
                  </div>
                </div>
                <div class="adiv col-5">
                  <div class="form-group text-left">
                    <p>
                      <h6>Annuler l'ensemble des déclarations du carnet de ramassage!</h6>
                    </p>
                    <label for="mmotif">Motif d'annulation:</label>
                    <input type="text" class="form-control" id="mmotif" name="motif">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-danger btn-block" name="annuler">Annuler la demande de ramassage</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">
      $(document).ready(function(){

      $("#checkAll").change(function(){  //"select all" change
      $(".numexramassage").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
      });
        //".checkbox" change
        $('.numexramassage').change(function(){
          //uncheck "select all", if one of the listed checkbox item is unchecked
            if(false == $(this).prop("checked")){ //if this item is unchecked
                $("#checkAll").prop('checked', false); //change "select all" checked status to false
            }
          //check "select all" if all checkbox items are checked
          if ($('.numexramassage:checked').length == $('.numexramassage').length ){
            $("#checkAll").prop('checked', true);
          }
        });
      });
      function hidemotif(){
        $('.adiv').css({"border":"1px solid black","padding":"30px","border-radius":"5px","margin-left":"40px"});
        $('.vdiv').css({"border":"1px solid black","padding":"30px","border-radius":"5px","margin-left":"40px"});
      }
      $(document).ready(function(){
        $('#annul').on('click',function(){
          var content = $('.motifdiv').html();
          $('.vdiv').html('');
          $('.adiv').html(content);
          $('.vdiv').css({"border":"0px"});


        });
      });
      </script>
    </body>
   </html>
