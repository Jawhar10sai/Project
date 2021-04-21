<?php
require_once('txheads.php');
if (isset($_SESSION['user_id'])) {
  $cllves = $clients->CurrentUser($_SESSION['user_id']);
}
if (isset($_POST['changer'])) {
  if ($_POST['nvmdp']==$_POST['confnvmdp']) {
    $clients->changerMDP($_SESSION['user_id'],$_POST['nvmdp']);
    echo "<script>
      alert('mot de passe bien modifié!');
    </script>";
  }else {
    echo "<script>
      alert('mot de passe et confirmation incompatible!');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="  background-image: url('images/LOGOSANS150.jpg');
    background-size: 150px 104px;
    background-repeat: repeat;
	/*zoom: 90%;*//*zoom: 90%;*/">

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
						<a class="nav-link " href="tracking.php" style="font-size:18px;">Suivis des envois</a>
					   </li>
                       <li class="nav-item">
                          <a class="nav-link " href="agences.php" style="font-size:18px;">Mes sessions</a>
                       </li>
                     <?php endif; ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="" style="font-size:18px;">Facturation</a>
                     </li>-->
				<li class="nav-item">
                    <a class="nav-link " href="tracking.php" style="font-size:18px;">Suivis des envois</a>
                 </li>
                     <li class="nav-item">
                        <a class="nav-link" href="Reclamation/" style="font-size:18px;">Réclamations</a>
                     </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right col-1">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=$_SESSION['usernom'];?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><span><i class="fas fa-user"></i></span>Profile</a>
                        <a class="dropdown-item" href="deco.php"><span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>Deconnecter</a>
                      </div>
                    </li>
                  </ul>
               </div>
            </nav>
    <div class="container"style="margin-top:80px;">
      <div class="row">
        <div class="col-lg-8 offset-lg-3 col-xs-12">
          <div class="card">
            <?php foreach ($cllves as $cllve): ?>
            <div class="card-header">
              <h1><?=$cllve['NOM'];?></h1>
            </div>
            <div class="card-body">


                <div class="row">
                    <label class="col-5 h3">Votre Code:</label><label class="col-2">:</label><label class="col-5 h3"><?=$cllve['CLIENT_COD'];?></label>
                    <label class="col-5 h3">ICE:</label><label class="col-2">:</label><label class="col-5 h3"><?=$cllve['ICE'];?></label>
                    <label class="col-5 h3">Capital:</label><label class="col-2">:</label><label class="col-5 h3"><?=$cllve['CAPITAL_SOC'];?></label>
                    <label class="col-5 h3">Id fiscale:</label><label class="col-2">:</label><label class="col-5 h3"><?=$cllve['ID_FISCALE'];?></label>
                    <label class="col-5 h3">Téléphone:</label><label class="col-2">:</label><label class="col-5 h3"><?=$cllve['telephone'];?></label>
                    <div class="col-12 text-center">
                      <button  onclick="afficherchmdp()" class="btn"> <u>changer le mot de passe</u> </button>
                    </div>
                </div>

            </div>
          <?php endforeach; ?>
          </div>
      </div>
    </div>
    <div class="row" id="changementmdp">
      <div class="col-lg-8 offset-lg-3 col-xs-12">
        <div class="card">
          <?php foreach ($cllves as $cllve): ?>
          <div class="card-header">
            <h1>Changer mot de passe</h1>
          </div>
          <div class="card-body">
              <div class="row">
              <div class="col-12">
                <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                  <h5><?=$cllve['NOM']; ?></h5>
                  <div class="form-group">
                    <label for="">Nouveau mot de passe:</label>
                    <input type="password" class="form-control" name="nvmdp" value="">
                  </div>
                  <div class="form-group">
                    <label for="">confirmer le mot de passe:</label>
                    <input type="password" class="form-control" name="confnvmdp" value="">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg" name="changer">Changer le mot de passe</button>
                  </div>
                </form>
              </div>
              </div>

          </div>
        <?php endforeach; ?>
        </div>
    </div>
  </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#changementmdp').hide();
      });
      function afficherchmdp(){
        $('#changementmdp').show();
      }
    </script>
  </body>
</html>
