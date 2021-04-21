<?php
include_once('../../config/connect.php');
	$id_page=$_GET['id_page'];
	
	$ordre="asc";
	if(isset($_GET['ordre']) && $_GET['ordre']=="decoissant"){
	$ordre="desc";
	}
	
	$req_Produits = "SELECT * FROM Produit where id_page='$id_page' and status=1 order by Prix $ordre";
	$Produits  = mysql_query($req_Produits ,$connect);
	$nbr_Produits=mysql_num_rows($Produits);
	
	$req_param = "SELECT * FROM param_catalogue where id_page='$id_page'";
	$param_catalogue  = mysql_query($req_param ,$connect);
	$row_param_catalogue  = mysql_fetch_assoc($param_catalogue);
	$nbr_Produits_page=$row_param_catalogue['Nbr_articles'];
	$Devise=$row_param_catalogue['Devise'];
	
	if(isset($_GET['produits_page'])){
	$nbr_Produits_page=strip_tags($_GET['produits_page']);
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catalogue</title>
<link rel="stylesheet" type="text/css" href="../../css/style_blog.css"/>
<link rel="stylesheet" type="text/css" href="css/style_catalogue.css"/>
<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="../../js/jquery.quick.pagination.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("ul.pagination").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo $nbr_Produits_page; ?>"});
});
</script>

</head>

<body style="text-align:center">

<div id="block">
<form id="frm1">
Trier par : 
<select id="ordre" name="ordre" onchange="frm1.submit();">
<option value="coissant"<?php if($_GET['ordre']=="coissant") echo ' selected="selected"'?>>Prix coissant</option>
<option value="decoissant"<?php if($_GET['ordre']=="decoissant") echo ' selected="selected"'?>>Prix decoissant</option>
</select>

Nombre de produits par page : 
<select id="produits_page" name="produits_page" onchange="frm1.submit();">
<option>Nombre de produits par page</option>
<option<?php if($_GET['produits_page']==1) echo ' selected="selected"'?>>1</option>
<option<?php if($_GET['produits_page']==2) echo ' selected="selected"'?>>2</option>
<option<?php if($_GET['produits_page']==3) echo ' selected="selected"'?>>3</option>
<option<?php if($_GET['produits_page']==5) echo ' selected="selected"'?>>5</option>
<option<?php if($_GET['produits_page']==10) echo ' selected="selected"'?>>10</option>
<option<?php if($_GET['produits_page']==15) echo ' selected="selected"'?>>15</option>
<option<?php if($_GET['produits_page']==20) echo ' selected="selected"'?>>20</option>
<option<?php if($_GET['produits_page']==25) echo ' selected="selected"'?>>25</option>
<option<?php if($_GET['produits_page']==50) echo ' selected="selected"'?>>50</option>
<option<?php if($_GET['produits_page']==100) echo ' selected="selected"'?>>100</option>
<option<?php if($_GET['produits_page']==$nbr_Produits) echo ' selected="selected"'?> value="<?php echo $nbr_Produits?>">Tous</option>
</select>

</form>

<ul class="pagination">
<?php if($nbr_Produits>0){while($row_Produits  = mysql_fetch_assoc($Produits)){?>
<li class="catalogue-item">
	<div class="catalogue-title"><h2><?php echo utf8_encode($row_Produits['Nom'])?></h2></div>
    <div class="catalogue-preview">
    <img src="<?php echo $row_Produits['Image']?>" />
    </div>
    <div class="catalogue_content">    
    	<div class="blog-text"><?php echo substr(utf8_encode($row_Produits['Description']),0,50)?></div>
        <a class="read-more" href="Produit_catalogue.php?Produit=<?php echo $row_Produits['id']?>">Details »</a> 
        <?php if($row_Produits['show_prix']){?>
        Prix:  <span class="signature"><?php echo $row_Produits['Prix'].$Devise?></span>
		<?php }?>
        
        
    </div>
    </li>
<?php }}?>
</ul>
</div>

</body>
</body>
</html>