<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>LVE - Authentification</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/LOGOSANS.png" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/styles/index2-style.css">
</head>

<body>
  <main role="main">
    <div class="content">
      <div class="index-header">
        <img src="images/voielvej.png" alt="" id="logo-lve">
        <div>
          <img src="images/Afaq_27001_outline.png" alt="" width="100" height="90" id="logo-iso27">
          <img src="images/logo_certificat_iso_9001_afnor_nov_2012.png" alt="" width="100" height="90" id="logo-iso91">
        </div>
      </div>
      <div class="index-header-phone">
        <img src="images/voielvej.png" alt="" id="logo-lve" height="40">
        <div>
          <img src="images/Afaq_27001_outline.png" alt="" height="40" id="logo-iso27">
          <img src="images/logo_certificat_iso_9001_afnor_nov_2012.png" alt="" height="40" id="logo-iso91">
        </div>
      </div>
      <div class="main">
        <div class="main-container text-center">
          <img src="images/utilisateur.png" height="70" />
          <h1 class="h3 mb-3 font-weight-normal">Authentification</h1>
          <form autocomplete="off" method="post" class="form-signin">
            <div class="form-group">
              <input type="text" id="inputEmail" class="form-control" name="nomuser" placeholder="Nom d'utilisateur..." required autofocus>
            </div>
            <div class="form-group">
              <input type="password" id="inputPassword" name="mdpass" class="form-control" placeholder="Mot de passe..." required>
            </div>
            <button class="btn btn-lg col-12 btn-secondary btn-block btn-lve" type="submit" id="btn-connect">
              <i class="fas fa-sign-in-alt"></i> Se connecter
            </button>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php include_once "includes/lve_footer_index.php"; ?>
  <script src="assets/scripts/tax.js" charset="utf-8"></script>
</body>

</html>