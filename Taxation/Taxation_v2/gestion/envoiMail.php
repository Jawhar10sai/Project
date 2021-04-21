<?php
require_once "control_utilisateur.php";
 ?>
 <form name="codeform" action="http://www.lavoieexpress.com/phpmailer/mail.php" method="post">
   <input type="hidden"  name="body" id="cdbody" value="Le code de ramassage pour le client <?php echo $nom_d_utilisateur." est: ".$client_lve->coderamassageEncours(); ?>">
   <input type="hidden" name="coderem" id="codRam" value="<?=$client_lve->coderamassageEncours(); ?>">
   <input type="hidden"  name="AddAddress" id="cdAddAddress" value="j.hassou@lavoieexpress.ma">
   <input type="hidden"  name="addCC" id="cdAddcc" value="y.takourt@lavoieexpress.ma">
   <input type="hidden"  name="Subject" id="cdsubject" value="Code de ramassage">
 </form>
 <script type="text/javascript">
 window.onload = function(){
     document.forms['codeform'].submit();
   }
 </script>
