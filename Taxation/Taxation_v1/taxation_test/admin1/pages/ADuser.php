       <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id="clclient"><i class="fas fa-user-plus"></i>Ajouter</button>
            </li>
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id="infoscl"><i class="far fa-edit"></i>Mise à jours infos</button>
            </li>
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id="clinarch"><i class="fas fa-file-archive"></i>Archives</button>
            </li>
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id="dejaco"><i id="dejaconn" class="fas fa-toggle-on"></i>Déjà connectés</button>
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
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 uscontent">
            <?php require_once "users/liste_user.php"; ?>
          </div>
        </div>
      </div>

    <script type="text/javascript">
    $(document).ready(function(){
      client();
      clientinterval();
      clientdejacon();
      clientsessions();
      clientsouclient();
      clientdeclaration();
      clientarchive();
      clientsinfos();
    });
    </script>
