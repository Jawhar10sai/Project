<?php
include_once('../../config/connect.php');
$Produit=mysql_escape_string(($_GET['Produit']));
		if(isset($_GET['Produit']) && !empty($Produit)){
			$Produits = "SELECT * FROM Produit where id='$Produit'";
			$req_Produits = mysql_query($Produits ,$connect);
			$row_Produits = mysql_fetch_assoc($req_Produits);
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $row_Produits['Nom']?></title>

<link rel="stylesheet" type="text/css" href="css/style_blog.css"/>
</head>

<body style="text-align:center">
<div id="block">

<div class="blog-preview"><img src="<?php echo $row_Produits['Image']?>" style="width:100%" /></div>

    	<div class="blog-title"><h2><?php echo utf8_encode($row_Produits['Nom'])?></h2></div>

        	<div class="blog-text"><?php echo utf8_encode($row_Produits['Description'])?></div>
            
        <?php if($row_Produits['show_prix']){?>
       <h2> Prix : <span class="signature"><?php echo $row_Produits['Prix']?></span></h2>
		<?php }?>
        <a href="catalogue.php"><<  Retour au catalogue</a> 
</div>

</body>
</html>