<?php

 ?>

       <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id="infovil"><i class="fas fa-info-circle"></i>Infos</button>
            </li>
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id="ajo_ville"><i class="fas fa-plus"></i>Ajouter ville(s)</button>
            </li>
            <li class="nav-item">
              <button style="background:transparent; border:0;"  class="nav-link" id="cldeclarations"><i class="fas fa-file-archive"></i>Archives</button>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 vlcontent">
            <?php #include_once "Villes/ADlistevilles.php"; ?>
          </div>
        </div>
      </div>

    <script type="text/javascript">
    $(document).ready(function(){
      getlisteville();
      addville();
    });
    </script>
