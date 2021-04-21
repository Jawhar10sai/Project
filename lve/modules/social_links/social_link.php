<?php include_once('../../config/connect.php');?>
<script src="../../js/jquery-1.7.2.js"></script>
<script language="javascript">
$('#osx-modal-title', window.parent.document).html("R&eacute;seaux Sociaux");
</script>
<?php 
if($session == 'ok'){
	$idsite = $_GET['idsite'];
if(isset($_POST["action"]) && $_POST["action"] == "edit"){
	
	$edit_social = "SELECT * FROM socialicon where id_site = '".$idsite."'";
	$req_edit_social  = mysql_query($edit_social ,$connect);
	$row_edit_social  = mysql_num_rows($req_edit_social);

	if($row_edit_social > 0){
	$update= "UPDATE socialicon SET facebook = '".$_POST["Facebook"]."',email = '".$_POST["Email"]."',twitter = '".$_POST["Twitter"]."',youtube = '".$_POST["Youtube"]."'  WHERE id_site = '".$idsite."'";
	$queryUpdate1=mysql_query($update) or die("erreur".mysql_error());
	}else{
		
		$query_corp = "INSERT INTO socialicon (id_site,facebook,email,twitter,youtube)
				VALUES(
				'".$_POST["idsite"]."',
				'".utf8_decode($_POST["Facebook"])."',
				'".utf8_decode($_POST["Email"])."',
				'".utf8_decode($_POST["Twitter"])."',
				'".utf8_decode($_POST["Youtube"])."')";
	mysql_query($query_corp);
		
		}

	?>
	<script language="javascript">
	
	document.location.href='../footer/param_footer.php?idsite=<?php echo $_POST["idsite"]; ?>';
	</script>
	
	<?php
	
	
	}
	
	
	$social = "SELECT * FROM socialicon where id_site = '".$idsite."'";
	$req_social  = mysql_query($social ,$connect);
	$row_social  = mysql_fetch_assoc($req_social);

?>
<style type="text/css">
table#setup th {font-weight: bold; text-style: normal; padding-right: 8px; padding-top: 7px; white-space: nowrap}
table#setup td{ font-size:12px; padding-top: 5px; }
</style> 
	<form method="post" action="">
<table id="setup" width="100%">
	<tbody>
    <tr>
		<th align="left" valign="top">Facebook :</th>
		<td width="100%">
			<input id="Facebook" name="Facebook" value="<?php echo $row_social["facebook"] ?>" maxlength="255" style="width:100%" type="text"><br>
			<div class="ccm-note"></div>
	  </td>
	</tr>

    <tr>
		<th align="left" valign="top">Email :</th>
		<td width="100%">
			<input id="Email" name="Email" value="<?php echo $row_social["email"] ?>" maxlength="255" style="width:100%" type="text"><br>
			<div class="ccm-note"></div>
	  </td>
	</tr>
    <tr>
		<th align="left" valign="top">Twitter :</th>
		<td width="100%">
			<input id="Twitter" name="Twitter" value="<?php echo $row_social["twitter"] ?>" maxlength="255" style="width:100%" type="text"><br>
			<div class="ccm-note"></div>
	  </td>
	</tr>
    <tr>
		<th align="left" valign="top">Youtube :</th>
		<td width="100%">
			<input id="Youtube" name="Youtube" value="<?php echo $row_social["youtube"] ?>" maxlength="255" style="width:100%" type="text"><br>
			<div class="ccm-note"></div>
	  </td>
	</tr>
    
    
    
</tbody></table> 
<input type="hidden" name="action" value="edit" />
<input type="hidden" name="idsite" value="<?php echo $idsite; ?>" />
<input type="submit" class="btn primary" value="Enregistrer" style="float: right" />
</form>
<style>
	a.back{border: 1px solid #AAAAAA;
    cursor: pointer;
    float: left;
    padding: 4px;
    text-decoration: none;
	color:#AAAAAA;
	font-weight:bold;}
</style>
<a href="../footer/param_footer.php?idsite=<?php echo $idsite; ?>" class="back"><< Retour</a>

<?php }else{ echo '<p>Accès interdit. Vous devez vous connectez pour effectuer cette opération!</p>'; }?>