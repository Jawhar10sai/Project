<nav class="navbar navbar-expand-lg">
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
     <li class="nav-item">
       <button style="background:transparent; border:0;" class="nav-link" id="clinarch"><i class="fas fa-file-archive"></i>Archives</button>
     </li>
     <li class="nav-item">
       <button style="background:transparent; border:0;"  class="nav-link" id="clinterval" ><i class="fas fa-sort-numeric-up"></i>Interval </button>
     </li>
     <li class="nav-item">
       <button style="background:transparent; border:0;"  class="nav-link" id="clsession" ><i class="fas fa-address-card"></i>Session </button>
     </li>
     <li class="nav-item">
       <button style="background:transparent; border:0;"  class="nav-link" id="clsclient" ><i class="fas fa-address-card"></i>Sous-clients</button>
     </li>
     <li class="nav-item">
       <button style="background:transparent; border:0;"  class="nav-link" id="cldeclarations" ><i class="fas fa-file-alt"></i>Déclaration</button>
     </li>
     <li class="nav-item">
       <button style="background:transparent; border:0;"  class="nav-link" id="clconnexions" ><i class="fas fa-file-alt"></i>Connexions</button>
     </li>
   </ul>
   <ul class="nav navbar-nav navbar-right ml-auto">
         <li class="nav-item dropdown <?=$navuser;?>">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-bell"></i> 0
           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="Profile"><span><i class="fas fa-user"></i></span>ProfileProfileProfileProfileProfileProfileProfileProfileProfileProfile</a>
             <a class="dropdown-item" href="gestion/deconnexion.php"><span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>DeconnecterProfileProfileProfileProfileProfileProfileProfile</a>
           </div>
         </li>
       </ul>
 </div>
</nav>
