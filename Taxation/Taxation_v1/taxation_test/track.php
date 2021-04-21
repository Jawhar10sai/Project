<?php
require_once('txheads.php');

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
  <body onload="specifier()" style="  background-image: url('images/LOGOSANS150.jpg');
    background-size: 150px 104px;
    background-repeat: repeat;
	zoom: 90%;">
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
                 <li class="nav-item active">
                    <a class="nav-link" href="#"  style="font-size:18px;">Suivi colis</a>
                 </li>
                 <?php if ($_SESSION['typuser']=="clientlve"): ?>
                   <li class="nav-item">
                      <a class="nav-link" href="agences.php" style="font-size:18px;">Mes sessions</a>
                   </li>
                 <?php endif; ?>
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
                     <h4><b>Suivi de colis</b></h4>
                  </div>
                  <div class="card-body">
                    <form method="post" autocomplete="off">

                        <div class="form-group col-md-6">
                          <label for="">Numéro de déclaration:</label>
                          <input type="text" id="numero" name="numero" class="form-control" value="">
                        </div>
                        <div class="form-group col-md-4">
                          <button type="button" id="suivi" class="col-md-4 btn btn-success" name="suivi">Suivre</button>
                        </div>
                        </form>
                        <div class="result">
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
                              </table>
                          </center>
                          </div>
                        </div>


                  </div>
                </div>

            </div>

          </div>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <hr>
        <div class="container" id="foot">
          <div class="row">
             <div class="text-center col-lg-6 offset-lg-3">
                <p><span style="font-size: 8pt;">LA VOIE EXPRESS 2 S.A au Capital 23.077.000,00 Dhs - 19, Rue Abou Bkr Ibnou Koutia, A&icirc;n Seba&acirc; &ndash; Casablanca</span><br /><span style="font-size: 8pt;">RC 95457 &ndash; IF 01601949 &ndash; Patente 37951124 &ndash; CNSS 2640961 &ndash; ICE 001526339000073</span><br /><span style="font-size: 8pt;">T&eacute;l : 05 22 34 43 16 / Fax : 0522344264 </span><br /><span style="font-size: 8pt;">Site : <a href="http://www.lavoieexpress.com">www.lavoieexpress.com</a> &ndash; E-mail ; client@lavoieexpress.ma </span><br /><span style="font-size: 8pt;">La valeur d&eacute;clar&eacute;e est de cent (100 Dhs) en cas de non d&eacute;claration de valeur. Les Clauses et conditions g&eacute;n&eacute;rales de transport Marchandise et Messagerie sont consultables aupr&egrave;s de LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet. </span></p>
             </div>
          </div>
        </div>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#suivi').on('click',function(){
              var num = $('#numero').val();
              $.ajax({
                url:'trackres.php',
                method:'post',
                data:{nume:num},
                success:function(res){
                  try {
                    $('.result').html(res);
                  } catch (e) {

                  }

                  //console.log(res);
                }
              });
            });
          });
        </script>
      </body>
  </html>
