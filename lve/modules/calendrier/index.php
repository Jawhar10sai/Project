<?php 
require_once('header.php');
?>

<div class="main-content">
	<div class="header" >
		<div class="hdrl"></div>
		<div class="hdrr"></div>
		<h2>Votre Calendrier</h2>
	</div>
	<div class="block">
		<div id="calendar"></div>
		
	</div>
	<div class="bdrl"></div>
	<div class="bdrr"></div>
</div>
<script type="text/javascript">
			$(document).ready(function(){
				$("#calendar").smoothPhpCalendar(<?php echo $id_cal; ?>);
		
			});
			
			
			
	<?php if(!isset($_GET['etat']) || $_GET['etat'] != 'false'){ ?>
		document.location.href = "index.php?id_cal=<?php echo $id_cal; ?>&etat=false";
		<?php } ?>		
		</script>
<?php require_once('footer.php') ?>