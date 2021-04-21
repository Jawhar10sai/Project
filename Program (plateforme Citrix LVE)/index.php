<?php
require_once("links.php");

if (isset($_POST['notepad'])) {
echo exec('Notepad.lnk');
}
if (isset($_POST['word'])) {
  echo exec('WINWORD');
}
if (isset($_POST['power_point'])) {
  echo exec('POWERPNT');
}
if (isset($_POST['dpi'])) {
  echo exec('DPI');
}
if (isset($_POST['gt'])) {
  echo exec('Google Traduction');
}
if (isset($_POST['qualiso'])) {
  echo exec('Qualiso');
}
if (isset($_POST['chrome'])) {
  echo exec('Utilisateurs.lnk');
}
if (isset($_POST['excel'])) {
  echo exec('Cmder.lnk');
}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LVE</title>
  </head>
  <body>
    <div class="container-fluid">
          <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <div class="row text-center">
              <button type="submit" name="chrome" class="col-md-2 col-sm-4 col-xs-6 appbutton">
                <img class="rounded img-lve" src="images/user.png" /><br>
                <h5>Dossier d'utilisateur</h5>
              </button>
              <button type="submit" name="notepad" class="col-md-2 col-sm-4 col-xs-6 appbutton">
                <img class="rounded img-lve" src="images/user.png" /><br>
                <h5>Notepad</h5>
              </button>

                <button type="submit" name="excel" class="col-md-2 col-sm-4 col-xs-6 appbutton">
                  <img class="rounded img-lve" src="images/excel.png" /><br>
                  <h5>CMDER</h5>
                </button>
                <button type="submit" name="word" class="col-md-2 col-sm-4 col-xs-6 appbutton">
                  <img class="rounded img-lve" src="images/Word.png" /><br>
                  <h5>Word</h5>
                </button>
                <button type="submit" name="power_point" class="col-md-2 col-sm-4 col-xs-6 appbutton">
                  <img class="rounded img-lve" src="images/POWERPNT.png" /><br>
                  <h5>Power point</h5>
                </button>
                <button type="submit" name="dpi" class="col-md-2 col-sm-4 col-xs-6 appbutton">
                  <img class="rounded img-lve" src="images/dpi.png" /><br>
                  <h5>DPI</h5>
                </button>
                <button type="submit" name="gt" class="col-md-2 col-sm-4 col-xs-6 appbutton">
                  <img class="rounded img-lve" src="images/gt.png" /><br>
                  <h5>Google traduction</h5>
                </button>
                <button type="submit" name="qualiso" class="col-md-2 col-sm-4 col-xs-6 appbutton">
                  <img class="rounded img-lve" src="images/qualiso.png" /><br>
                  <h5>Qualiso</h5>
                </button>
            </div>
          </form>
    </div>
  </body>
</html>
