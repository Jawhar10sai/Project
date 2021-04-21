<?php
require_once('txheads.php');
if (isset($_POST['nom'])) {
  $agences->AjouterAgence($_SESSION['user_id'],$_POST['nom']);
}
 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Agences</title>
     <style media="screen">
     #foot{
       background-color: #ffffff;
       border-radius: 5px;
       border: 1px solid;
     }

     </style>
   </head>
   <body style="  background-image: url('images/LOGOSANS150.jpg');
    background-size: 150px 104px;
    background-repeat: repeat;
	zoom: 90%;">
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
                     <a class="nav-link" href="track.php" style="font-size:18px;">Suivi colis</a>
                  </li>
                  <li class="nav-item active">
                     <a class="nav-link" href="#" style="font-size:18px;">Mes sessions</a>
                  </li>
				 <li class="nav-item">
                    <a class="nav-link " href="tracking.php" style="font-size:18px;">Suivis des envois</a>
                 </li>
                  <!--<li class="nav-item">
                     <a class="nav-link" href="" style="font-size:18px;">Facturation</a>
                  </li>-->
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

     <div class="container" style="margin-top:80px;">
       <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <h4>Mes agences</h4>
             </div>
             <div class="card-body">
               <div class="row">
                 <div class="col-10 tabb">

                 </div>
                 <div class="col-2">
                   <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                     <div class="form-group">
                       <label for="">Agence:</label>
                       <input type="text" id="nom" class="form-control" name="nom" value="">
                     </div>
                     <button type="submit" class="btn btn-success col-12" id="ajoutAG" name="ajouter">Ajouter l'agence</button>
                   </form>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </body>
   <script type="text/javascript">
     $(document).ready(function(){
         $.ajax({
           url:'gesagence.php',
           success:function(res){
             $('.tabb').html(res);
             //console.log(res);
           }
         });
       });
   </script>
 </html>
