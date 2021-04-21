<?php  include_once('config/connect.php');

$idpage =  $_GET["idpage"];
$idsite =  $_GET["idsite"];
$acces =  $_GET["acces"];

$param_liens = "SELECT * FROM parametres_liens where id_site = '".$idsite."'";
$req_param_liens  = mysql_query($param_liens ,$connect);
$row_param_liens = mysql_fetch_assoc($req_param_liens);

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connexion page</title>
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" type="text/css" href="install/css/style.css" />
<script src="js/jquery-1.7.2.js" type="text/javascript"></script>
<script language="javascript">
$(document).ready(function(){
$('#submit').click(function(){
	var mot_passe = $('#mot_passe').val();
	<?php if($acces == 2){ ?>
	var login = $('#login').val();
var order = 'acces=<?php echo $acces; ?>&id_site=<?php echo $idsite; ?>&id_page=<?php echo $idpage; ?>&login='+login+'&mot_passe='+mot_passe;
	<?php }else{ ?>
var order = 'acces=<?php echo $acces; ?>&id_site=<?php echo $idsite; ?>&id_page=<?php echo $idpage; ?>&mot_passe='+mot_passe;
		<?php } ?>
$.post("get_access.php", order, function(theResponse){	
if(theResponse == 1){
	$('#message').html('');
	window.parent.location.reload();
	return false;
	}else{
		window.parent.jQuery.lightbox().shake();
$('#message').html(theResponse); return false;
	}
});
	
	});		
});

</script>

<style>
.formular .text-input {
    width: 97%;
}
#formID .form_field {
    padding: 0 0 4px;
}
.formular .submit {
    margin-top: 9px;
}
#message{
	float: left;
    padding: 13px 0 0 13px;
	color:red;
	font-weight:bold;
	}
	
<?php if($row_param_liens["couleur_lien"] != ''){ ?>
h1, h2, h3, h4, h5, h6 {
    color: <?php echo $row_param_liens["couleur_lien"]; ?> !important;
}
.fancy {
    background: <?php echo $row_param_liens["couleur_lien"]; ?> !important; 
}

<?php } ?>
</style>
</head>
<body>
<h4>Identifiez-vous pour accéder à cette page</h4>
<form id="formID" class="formular" action="" method="post">
<?php if($acces == 2){ ?>
                <div class="form_field">
                                <label> <span><strong>Identifiant : </strong></span></label>
                      <input type="text" value="" id="login" name="login" class="validate[required,length[0,100]] text-input text round_6">
               
                </div>
                <?php } ?>
                <div class="form_field">
                  <label> <span><strong>Mot de passe : </strong></span></label>
                      <input type="password" value="" id="mot_passe" name="mot_passe" class="validate[required,length[6,20]] text-input text round_6">
               
                </div>
                 
               <div class="form_field">
                 
                    <input type="hidden" value="log" name="action">
                    <input type="button" style="float:left" value="S'identifier" class="submit fancy" id="submit">
                    <div id="message"></div>
                  </div>
                 
                </form>
</body>
</html>
