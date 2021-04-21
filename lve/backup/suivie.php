        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LA VOIE EXPRESS</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="line-height:17px;" >
<table width="941" height="1036" border="0" align="center" cellpadding="0" cellspacing="0">
<tr  >
  <td width="941" height="141" align="left" valign="top" >
  <?php 
  
  include('header.html');
   ?> </td>
</tr>
<tr>
  <td height="48" align="left" valign="top"><?php
  include('menu.html');
   ?> </td>
</tr>
<tr  >

  <td align="left" valign="top"><table width="100%" height="700" border="0" cellpadding="0" cellspacing="0"  >
    <tr><td width="73%" height="108" align="left" valign="top">
  <table width="100%" border="0" cellpadding="0" cellspacing="0"><tr>
  <td height="168" colspan="3" align="left" valign="top">
  <?php //include('banniere2.html'); ?>
                        <? include ("slide_show2.php");?>
  
  </td>
    </tr>
    <tr>
      <td width="100%" height="257" align="left" valign="top">
      
<iframe src="http://81.192.161.148:8080/extranet/consult.php?module=vex&action=20&numero=<?=$_POST['numero']?>" marginheight="0" marginwidth="0" allowtransparency="" frameborder="0" width="675px" scrolling="no" height="510px"></iframe>      
<script type="text/javascript" language="javascript">
//bbb=document.getElementByTagName('body');
//top.frames[0].bbb='#ffffff';
top.frames[0].document.body.style.backgroundColor='#ffffff';
//.style.backgroundColor
</script></td>
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
