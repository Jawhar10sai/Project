<?php
include_once ("classes/conftaxDB.php");
include_once ("classes/fetchclas.php");
if (!isset($_SESSION)) {
  session_start();
}
 ?>
 <form name="codeform" action="http://www.lavoieexpress.com/phpmailer/mail.php" method="post">
   <input type="hidden"  name="body" id="cdbody" value="Le code de ramassage pour le client <?php echo $_SESSION['usernom']." est: ".$declarations->coderamassageEncours($_SESSION['user_id']); ?>">
   <input type="hidden" name="coderem" id="codRam" value="<?=$declarations->coderamassageEncours($_SESSION['user_id']); ?>">
   <input type="hidden"  name="AddAddress" id="cdAddAddress" value="a.louhaichy@lavoieexpress.ma">
   <input type="hidden"  name="addCC" id="cdAddcc" value="y.takourt@lavoieexpress.ma">
   <input type="hidden"  name="Subject" id="cdsubject" value="Code de ramassage">
 </form>
 <script type="text/javascript">
 window.onload = function(){
     document.forms['codeform'].submit();
   }
 </script>
