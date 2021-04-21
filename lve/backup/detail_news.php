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
</head>

<body style="line-height:17px;" >
<table width="929" height="963" border="0" align="center">
<tr  >
  <td height="141" align="left" valign="top" >
  <?php include('header.html');
   ?> </td>
</tr>
<tr>
  <td height="36" align="left" valign="top"><?php
  include('menu.html');
   ?> </td>
</tr>
<tr  >

  <td align="left" valign="top"><table width="100%" height="700"  >
    <tr><td width="73%" height="108" align="left" valign="top">
  <table width="100%"><tr><td height="168" colspan="3" align="left" valign="top"><?php include('banniere2.html'); ?></td>
    </tr>
 
    <tr>
      <td width="24%" height="257" align="left" valign="top"><?php include('menu_gauche_qui_sommes_nous.html');?></td>
      <td width="4%" align="left" valign="top"></td>
      <td width="71%" align="left" valign="top" style="padding-left:2px">
 <?





$npp = 7;

$m = ($n - 1) * $npp;

$r=$_GET['r']?$_GET['r']:1;

$q = "SELECT * FROM news WHERE id = " .$_GET[id];

$qu = $q . " ORDER BY id DESC LIMIT 0,2";

//echo $qu;
$r = mysql_query($qu);
$row = mysql_fetch_array($r)

?>
	  <b><?=($row['titre'])?></b>
	  <p>
      <?=($row['resume'])?>
      </p>
      </td>
    </tr>
  </table></td>
    <td width="1%" align="left" valign="top">&nbsp;</td>
    <td width="26%" align="left" valign="top"><?php include('menu_droit.html'); ?>
	<?php include('newsletter.php'); ?>
</td>
  </tr></table></td>
</tr>

<tr>
  <td height="147" align="left" valign="top"><?php include('footer.html');?></td>
</tr>
</table>
</body>
</html>
