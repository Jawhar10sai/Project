<?php 
$req_devise = "SELECT devise FROM site where id_site='".$idsite."'";
	$param_devise  = mysql_query($req_devise ,$connect);
	$row_param_devise  = mysql_fetch_assoc($param_devise);
	$Devise = $row_param_devise['devise'];
 ?>
	<div id="GlobalPanierResult"></div>
	<script language="javascript">
	$(document).ready(function(){
		$('#GlobalPanierResult').html("<img class='load_panier' src='<?php echo SITEPATH; ?>images/lightbox-ico-loading.gif' />");
		
			var order = 'idsite=<?php echo $idsite; ?>&devise=<?php echo $Devise; ?>';
				//alert("sortorder2 "+sortorder);
			$.get("<?php echo SITEPATH; ?>detail_panier.php", order, function(theResponse){
				$('#GlobalPanierResult').html(theResponse);
			});
				
			
			
	});
	</script>	