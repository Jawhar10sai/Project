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
      <td width="24%" height="257" align="left" valign="top"><?php include('menu_gauche_carrieres.html');?></td>
      <td width="4%" align="left" valign="top"></td>
      <td width="72%" align="left" valign="top">
	  <b>Carrières > D&eacute;poser votre CV</b><br /><br />
	  <span class="titre1">D&eacute;poser votre CV</span><br /><br /><br />
	  
	  <form action="" method="post" name="cv" id="cv">
	  	<table>
			<tr>
				<td>Nom : </td>
				<td><input type="text" name="nom" /></td>
			</tr>
			<tr>
				<td>Prenom : </td>
				<td><input type="text" name="prenom" /></td>
			</tr>
			<tr>
				<td>Email : </td>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td>N°Tel : </td>
				<td><input type="text" name="tel" /></td>
			</tr>
			<tr>
				<td>Lettre de motivation : </td>
				<td><input type="file" name="lettre" /></td>
			</tr>
			<tr>
				<td>Curriculum vitae : </td>
				<td><input type="file" name="cv" /></td>
			</tr>
			<tr>
				<td></td>
				<td><br /><input type="submit" name="envoyer" value="Envoyer" style="margin-left:40px;background-color:#FF0000; font-weight:bold; color:#FFFFFF" />
				</td>
			</tr>
		</table>
	  </form>
        </td>
    </tr>
  </table></td>
    <td width="1%" align="left" valign="top">&nbsp;</td>
    <td width="26%" align="left" valign="top"><?php include('menu_droit.html'); ?><?php include('newsletter.php'); ?>
</td>
  </tr></table></td>
</tr>

<tr>
  <td height="147" align="left" valign="top"><?php include('footer.html');?></td>
</tr>
</table>
</body>
</html>
