<?php
/* Démarrage de la session */
session_start();
?>
<html>
<head>
<title>Anti-Spam avec Captcha</title>
</head>
<body>
<div>
  <?php
  /* Si l’utilisateur a bien saisie le code Captcha */
if (isset($_REQUEST['userCaptchaCode'])) {
  if (!empty($_REQUEST['userCaptchaCode']))
  {
    $userCaptchaCode = $_REQUEST['userCaptchaCode'];
    /* Cryptage avec MD5 du code saisie par l’utilisateur et contrôle avec le code enregistré dans la session */
    if( md5($userCaptchaCode) == $_SESSION['sysCaptchaCode'] )
      echo '<h2 class="correct">Correct !</h2>'; // Le code est correcte
    else echo '<h2 class="incorrect">Ahem.. Recommencez !</h2>'; // Le code est incorrecte
  }
else
echo '<h2 class="correct">Vous 	&ecirc;tes un Spam !</h2>';
}
  ?>
 
  <!-- le traitement du formulaire se fait sur la même page index.php -->
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="captchaForm">
  <div name ="captchaDiv">
    <!-- Notre image captcha créée depuis antispam.php -->
    <img src="antispam.php" alt="Captcha" id="captcha" name="captcha"/>
    <!-- un peu de javascript pour recherger l'image si le code captcha est illisible  -->
    <a style="cursor:pointer" onclick="document.images.captcha.src='antispam.php?id='+Math.round(Math.random(0)*1000)+1"><img src="<?php echo dirname($_SERVER["PHP_SELF"]).'/images/refresh.png';?>" alt="recharger l'image"/></a>
    <p>
      <label for="userCaptchaCode">Entrez le code</label>
      <input name="userCaptchaCode" id="userCaptchaCode" type="text" />
      <input type="submit" name="submit" id="submit" value="Valider" />
    </p>
  </div>
  </form>
</div>
</body>
</html>
