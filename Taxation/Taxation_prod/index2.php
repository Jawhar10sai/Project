<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LVE - Authentification</title>
  <link rel="stylesheet" href="assets/styles/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/styles/index2-style.css">
  <link href="https://fonts.googleapis.com/css?family=Amiri|Montserrat|Nunito|Open+Sans|Raleway&display=swap" rel="stylesheet">

</head>

<body>
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
        <form action="" autocomplete="off">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nom d'utilisateur...">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Mot de passe...">
          </div>
          <button class="btn btn-lg col-12 btn-secondary btn-block btn-lve" type="submit" id="btn-connect">
            <i class="fas fa-sign-in-alt"></i> Se connecter
          </button>
        </form>
      </div>
    </div>
    <div class="index-footer">
      <div class="footer-elem">
        <h5>
          <table>
            <tr>
              <td>Capital</td>
              <td>23.077.000,00 Dhs</td>
            </tr>
            <tr>
              <td>RC</td>
              <td>95457</td>
            </tr>
            <tr>
              <td>IF</td>
              <td>01601949</td>
            </tr>
            <tr>
              <td>Patente</td>
              <td>37951124</td>
            </tr>
            <tr>
              <td>CNSS</td>
              <td>2640961</td>
            </tr>
            <tr>
              <td>ICE</td>
              <td>001526339000073</td>
            </tr>
          </table>
        </h5>
      </div>
      <div class="footer-elem">
        <p class="h5"><i class="fa fa-map-marker" aria-hidden="true"></i> 19, Rue Abou Bkr Ibnou Koutia, Aîn Sebaâ – Casablanca</p>
        <p class="h5"><i class="fas fa-phone"> </i>05 22 34 43 16 </p>
        <p class="h5"><i class="fa fa-fax" aria-hidden="true"></i> 05 22 34 42 64</p>
        <p class="h5"><i class="fas fa-envelope-open-text"></i> client@lavoieexpress.ma</p>
        <p class="h5"><i class="fas fa-globe"></i> <a target="_blank" href="http://www.lavoieexpress.com" style="color:#fff;">lavoieexpress.com</a></p>
        <h5 class="text-center mt-5">
          <a target="_blank" style="color:#E5D0D0;margin:0.2rem;" href="https://www.facebook.com/lavoieexpress"><i class="fab fa-facebook fa-2x"></i></a>
          <a target="_blank" style="color:#E5D0D0;margin:0.2rem;" href="https://twitter.com/lavoieexpress"> <i class="fab fa-twitter-square fa-2x"></i></a>
          <a target="_blank" style="color:#E5D0D0;margin:0.2rem;" href="https://www.linkedin.com/profile/view?id=171560018&trk=spm_pic"><i class="fab fa-linkedin fa-2x"></i></a>
          <a target="_blank" style="color:#E5D0D0;margin:0.2rem;" href="https://www.youtube.com/channel/UCrTCXaUOu4puNT42dWxMGiQ"><i class="fab fa-youtube fa-2x"></i></a>
        </h5>
        <h5 class="text-center">&copy; <?= date('Y'); ?> La voie Express</h5>
      </div>
      <div class="footer-elem">
        <p class="h5">La valeur déclarée est de cent (100 Dhs) en cas de non déclaration de valeur. Les Clauses et conditions générales de transport Marchandise et Messagerie sont consultables auprès de LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet.</p>
      </div>
    </div>
  </div>
</body>

</html>