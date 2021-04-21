<?php 
require_once('header.php');
require_once('smoothcalendar.php');

$id = (isset($_GET["id"]) && is_numeric($_GET["id"])) ? (int)$_GET["id"] : "";
?>

<div class="main-content">
	<div class="header" >
		<div class="hdrl"></div>
		<div class="hdrr"></div>
		<h2>supprimer Résultat</h2>
	</div>
	<div class="block">
<?php

if (strcmp($id, "") != 0)
{
	$result = $calendar->removeEvent($id);
	if (isset($result["error"]))
	{
?>
			<p class="message error">
				<?php echo $result["error"]; ?>
			</p>
<?php
	}
	else
	{
?>
		<p class="message">
				Evénement suprimer. <?php if (isset($_SERVER["HTTP_REFERER"])) { ?><a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Retour</a><?php } ?>
			</p>
<?php
	}
}
else 
{
?>
			<p class="message error">
				Il y a un problème avec cette demande.
			</p>
<?php
}
?>
	</div>
	<div class="bdrl"></div>
	<div class="bdrr"></div>
</div>

<?php require_once('footer.php') ?>