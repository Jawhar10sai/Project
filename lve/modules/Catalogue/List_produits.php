<?php
	session_start();
include_once('../../config/connect.php');
	
	$id_page=$_GET['id_page'];
	$ord=1;
	$nbr_articles="0";
	
	


/*	$req_articles = "SELECT * FROM produit where id_page='$id_page' order by ordre";
	$articles  = mysql_query($req_articles ,$connect);
	
	while($data_articles= mysql_fetch_assoc($articles)){
	
		$static = "update Article set Ordre='".$ord."' where id='".$data_articles['id']."'";
		$query_static = mysql_query($static ,$connect) or die(mysql_error());
		$ord++;
	}
	if(isset($_GET['order']) && isset($_GET['direction'])){
	
		$direction=$_GET['direction'];
		$order=$_GET['order'];
		$id=$_GET['article'];
	
		if($direction=="up"){
			$new=$order-1;
		}
		if($direction=="down"){
			$new=$order+1;
		}
		
				    $static = "update Article set ordre='".$order."' where ordre='".$new."'";
					$query_static = mysql_query($static ,$connect) or die(mysql_error());
					
					$mooving = "update Article set ordre='".$new."' where ordre='".$order."' and id=$id";
					$query_mooving = mysql_query($mooving ,$connect) or die(mysql_error());
					
	}
*/
	
	$req_articles = "SELECT * FROM produit where id_page='$id_page'";
	$articles  = mysql_query($req_articles ,$connect);
	
if(isset($_GET['delete'])){
	$delete_article = "DELETE FROM `produit` WHERE `id`='".mysql_real_escape_string($_GET['delete'])."'";
	mysql_query($delete_article ,$connect);
?>
	<script language="javascript">
	
		document.location.href = "List_produits.php";
		
    </script>
<?php
}
if(isset($_GET['desactive'])){
	
$desactive_article = "update `produit` set `Status` ='0' where id=".$_GET['desactive'];
$desactive_article  = mysql_query($desactive_article ,$connect);
//exit();
?>
	<script language="javascript">
	
		document.location.href = "List_produits.php";
		
    </script>
<?php
}
if(isset($_GET['active'])){
	
$desactive_article = "update `produit` set `Status` ='1' where id=".$_GET['active'];
$desactive_article  = mysql_query($desactive_article ,$connect);
?>
	<script language="javascript">
	
		document.location.href = "List_produits.php";
		
    </script>
<?php
}
if(isset($_POST['save_blog_param'])){
	$change_param_blog = "update `param_catalogue` set `Devise`='".mysql_real_escape_string($_POST['Devise'])."' ,`Nbr_articles` ='".mysql_real_escape_string($_POST['nbr_articles'])."' where id_page='$id_page'";
	$change_param_blog  = mysql_query($change_param_blog ,$connect);
}
	
	$req_param = "SELECT * FROM param_catalogue where id_page='$id_page'";
	$param_blog  = mysql_query($req_param ,$connect);
	$row_param_blog  = mysql_fetch_assoc($param_blog);
	$nbr_articles=$row_param_blog['Nbr_articles'];
	$Devise=$row_param_blog['Devise'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestion blog</title>
<link rel="stylesheet" type="text/css" href="../../css/template.css"/>
<link rel="stylesheet" type="text/css" href="../../install/css/style.css"/>
</head>

<body>
<div style="width:50%">
<h1 class="replace">Gestion catalogue <a href="Produit.php" class="add_article" title="Ajouter un produit"></a></h1>
<form method="post">
<label>
Nombre de produits par page :
<input type="text" name="nbr_articles" id="nbr_articles" value="<?php echo $nbr_articles;?>" />
</label>

<label>
Devise
<input type="text" name="Devise" id="Devise" value="<?php echo $Devise;?>" />
</label><br />

<input type="submit" name="save_blog_param" value="Enregistrer" />
</form>
	<table class="data_table">
    <tr>
        <th><span>Photo</span></th>
        <th><span>Nom du produit</span></th>
        <th><span>Options</span></th>
    </tr>
                <?php if(mysql_num_rows($articles)>0){while($row_articles  = mysql_fetch_assoc($articles)){?>
    <tr>
        <td><img style="max-height:50px; max-width:100px;" src="<?php echo $row_articles['Image'] ?>" /></td>
        <td><?php echo utf8_encode($row_articles['Nom']); ?></td>    
        <td>
                <a href="Produit.php?produit=<?php echo $row_articles['id']?>" class="icone edit_site" title="Modifier"></a>
                <?php if($row_articles['Status']){ ?>
                <a href="?desactive=<?php echo $row_articles['id']?>" class="icone desactivate" title="Désactiver"></a>
                <?php }else{?>
                <a href="?active=<?php echo $row_articles['id']?>" class="icone activate" title="Activer"></a>
                <?php }?>
                <a href="#" class="icone delete" title="Supprimer" onclick='if(confirm("voulez-vous vraiment suprimer ce produit?")){document.location.href = "?delete=<?php echo $row_articles['id']?>";}'></a>
</td>
   </tr>
                    <?php }}else{?>
                    <tr>
                        <td colspan="3">Aucun produit n'a été ajouté</td>
                    </tr>
                    <?php }?>
</table>
</div></body>
</html>