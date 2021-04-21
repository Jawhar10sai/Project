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
             <li class="nav-item active">
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
