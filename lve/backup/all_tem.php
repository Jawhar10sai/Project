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
error_reporting(E_WARNING);

if (!isset($_GET["o"])) $o = 1;

else $o = $_GET["o"];

	

if (!isset($_GET["p"])) $p = 1;

else $p = $_GET["p"];



if (!isset($_GET["n"])) $n = 1;

else $n = $_GET["n"];



switch ($o) {

	case 0 : $order = "ASC"; break;

	case 1 : $order = "DESC"; break;

}



$order1 = "croissant";

$order2 = "décroissant";



switch ($p) {

	case 1 : $param = "news.id"; break;

	case 2 : $param = "type"; break;

	case 3 : $param = "prix_t"; break;

	case 4 : $param = "id"; break;

}



$npp = 7;

$m = ($n - 1) * $npp;

$r=$_GET['r']?$_GET['r']:1;

$q = "SELECT * FROM tem  ";

$qu = $q . " ORDER BY id DESC LIMIT " . ($n - 1) * $npp . ",{$npp}";

//echo $qu;
$r = mysql_query($qu);

//$row = mysql_fetch_array($r);

?>
 		<?
        $r = mysql_query($qu);
		$num = mysql_num_rows($r);
		while ($row = mysql_fetch_array($r)) {
		 ?>
       <span style="font-size:10px"><?=dd($row['date'])?></span><br />
        <span class="titre2">- <?=($row['titre'])?></span><br />
        <span style="color:#000000"> <?=($row['detail'])?></span><br />
		<br />
        <? }?>
 <?php



//$q = "SELECT * FROM `moto`";
$r = mysql_query($q);
$num = mysql_num_rows($r);



if ($num > $npp) {

	echo "<p align=center>Pages&nbsp;:";

	if ($num % $npp == 0) $j = $num / $npp;

	else $j = ($num - ($num % $npp)) / $npp + 1;



	for ($i = 1; $i <= $j; $i++) {

		if ($n != $i) echo "&nbsp;<a class=link_blue  href=\"all_tem.php?r=".$_GET['r']."&type=".$_GET['type']."&cmd=list-news&n={$i}&p={$p}&o={$o}\">{$i}</a>";

		else echo "&nbsp;<strong style='font-size:16px'>[ {$i} ]</strong>";

	}



	if ($n != $j) echo "&nbsp;<a class=link_blue href=\"all_tem.php?r=".$_GET['r']."&type=".$_GET['type']."&cmd=list-news&n=" . ($n + 1) . "&p={$p}&o={$o}\">Suivante</a>";

	else echo "&nbsp;Suivante</p>";

}

?>     </td>
    </tr>
  </table></td>
    <td width="1%" align="left" valign="top">&nbsp;</td>
    <td width="26%" align="left" valign="top"><?php include('menu_droit.html'); ?>
	<div style="background:url(img/bg_paragraphe.png) no-repeat; width:231px; padding-top:5px; height:151px;  ">
<div>&nbsp;&nbsp;<img src="img/newsletter.jpg" style="margin-top:px;" width="213" height="61" /> 
  </div> 
  <div style=" padding-left:10px;">  <img src="img/puce_fleche.jpg" />&nbsp;<span class="titre1">Newsletter</span><br />
    <a href="#">R&eacute;stez inform&eacute; </a><a href="#"></a>en vous inscrivant &agrave; notre newsletter 
    <br />
    <input name="text2" type="text" id="text2"  style="width:116px;"  class="zonetxt">&nbsp;<input name="button2" type="button" id="button2"   class="btn"  value="Rechercher" />
&nbsp;</div>
		  
 <br />
</div>
</td>
  </tr></table></td>
</tr>

<tr>
  <td height="147" align="left" valign="top"><?php include('footer.html');?></td>
</tr>
</table>
</body>
</html>
