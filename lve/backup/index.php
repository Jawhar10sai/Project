<?
error_reporting(E_WARNING);
@require_once "mysql.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LA VOIE EXPRESS</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(img/bg_index.jpg);
}
-->
</style>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body >
<table width="940" height="963" border="0" align="center">
<tr  >
  <td height="141" align="left" valign="top" ><?php
  include('header.html');
   ?> </td>
</tr>
<tr>
  <td height="36" align="left" valign="top"><?php
  include('menu.html');
   ?> </td>
</tr>
<tr>
  <td height="613" align="left" valign="top"><table width="100%" height="100%" align="left">
    <tr>
  <td width="49%" align="left" valign="top">  <table width="100%" height="100%" align="left">
    <tr>
      <td height="242" colspan="3" align="left" valign="top"><?php include('banniere1.html'); ?></td>
    </tr>
    <tr valign="top">
      <td height="128" colspan="3" align="left" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><?php include('html/accueil.html')?></td>
        </tr>
      </table></td>
      </tr>
 <?





$npp = 7;

$m = ($n - 1) * $npp;

$r=$_GET['r']?$_GET['r']:1;

$q = "SELECT * FROM news  ";

$qu = $q . " ORDER BY id DESC LIMIT 0,2";

//echo $qu;
$r = mysql_query($qu);


?>
   <tr>
      <td width="47%" height="228" align="left" valign="top"><p><span class="titre1"><img src="img/puce_fleche.jpg" width="7" height="8" /> Actualit&eacute;s</span><br />
        <br />
 		
      
        <p align="right"><strong><a href="all_news.php">Toutes les actualit&eacute;s</a> </strong></p></p></td>
      <td width="3%" align="left" valign="top">&nbsp;</td>
      <td width="50%" align="left" valign="top"><p><span class="titre1"><img src="img/puce_fleche.jpg" width="7" height="8" /> T&eacute;moignage client</span><br />
  <?


$npp = 7;

$m = ($n - 1) * $npp;

$r=$_GET['r']?$_GET['r']:1;

$q = "SELECT * FROM tem  ";

$qu = $q . " ORDER BY id DESC LIMIT 0,2";

//echo $qu;
$r = mysql_query($qu);


?>
 		<?
        $r = mysql_query($qu);
		$num = mysql_num_rows($r);
		while ($row = mysql_fetch_array($r)) {
		 ?>
       <br />
        <?=substr($row['titre'],0,70)?><br />
  
   <span style="color:#000000"> &quot;<?=substr($row['detail'],0,120)?>&ldquo;</span></p>
   <? }?>
        <p align="right"><strong><a href="all_tem.php">D&eacute;couvrez d'autres t&eacute;moignages</a></strong></p></td>
    </tr>
  </table> </td>
  <td width="2%" align="left" valign="top">&nbsp;</td>
  <td width="24%" align="left" valign="top"><a href="index2.php?p=produits__evex" ><img border="0" src="img/e_vex.jpg" width="216" height="210" /></a><br />
<div><br />
  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="216" height="185">
    <param name="movie" value="Sans nom-1.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="Sans nom-1.swf" width="216" height="185">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
  <span class="titre1">&nbsp;&nbsp; <a href="http://www.youtube.com/user/lavoieexpress">Visualiser la vidéo complète</a></span></div><br />
<div ><?php
  include('newsletter.html');
   ?> </div></td>
  <td width="2%" align="left" valign="top">&nbsp;</td>
  <td width="23%" align="left" valign="top"><?php include('menu_droit.html'); ?>   </td>
  </tr></table>
  </td>
</tr>
<tr>
  <td height="147" align="left" valign="top"><?php include('footer.html');?></td>
</tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
