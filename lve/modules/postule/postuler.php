<script language="javascript">
$(document).ready(function () {

    $('#cv').change( function()
    {
       $('#cv_val').html( $(this).val() );
    });
    $('#photo').change( function()
    {
       $('#photo_val').html( $(this).val() );
    });
    $('#lm').change( function()
    {
       $('#lm_val').html( $(this).val() );
    });

$('table#table_postule td').css({'padding':'2px 5px'});
$('form#form_recrute .btn_envoi').css({'background':'none repeat scroll 0 0 #009EE0','border':'medium none','color':'#FEFEFE','font-family':'Arial, Helvetica, sans-serif','font-size':'14px','padding':'4px 10px','width':'auto','float':'right'});	
$('form#form_recrute label.description').css({'border':'none','display':'block','font-size':'11px','line-height':'150%','padding':'0 0 1px','font-weight':'bold'});	
$('form#form_recrute select.select').css({'margin':'1px 0','padding':'1px 0 0','width':'100%','border-color':'#7C7C7C #C3C3C3 #DDDDDD','border-style':'solid','border-width':'1px','color':'#333333','font-size':'12px'});	
$('form#form_recrute h3').css({'margin':'0'});	
$('form#form_recrute em.radio_btn').css({'float':'left','font-style':'normal','width':'50%'});	
$('form#form_recrute input.radio').css({'display':'block','height':'13px','line-height':'1.4em','margin':'6px 0 0 3px','width':'13px'});
$('form#form_recrute input').css({'color':'#4E4E4E'});	
$('form#form_recrute label.choice').css({'display':'block','font-size':'12px','line-height':'1.4em','margin':'-1.55em 0 0 18px','width':'100%','padding':'2px 3px 5px','width':'100%'});
$('form#form_recrute input.medium_input').css({'float':'left','width':'100%'});
$('form#form_recrute textarea.textarea').css({'border-color':'#7C7C7C #C3C3C3 #DDDDDD','border-style':'solid','border-width':'1px','color':'#333333','font-family':'"Lucida Grande", Tahoma, Arial, Verdana, sans-serif','font-size':'100%','width':'100%','margin':'0'});
$('form#form_recrute textarea.small').css({'height':'5.5em'});
$('form#form_recrute li').css({'height':'1%','display':'block','margin':'0','padding':'2px 5px 2px 9px','float':'left','width':'30%'});
$('form#form_recrute li span').css({'float':'left','margin':'0 4px 0 0','padding':'0'});
$('form#form_recrute .required').css({'float':'none','font-weight':'700'});
$('form#form_recrute input.file').css({'color':'#333333','font-size':'100%','margin':'0','padding':'2px 0'});
$('form#form_recrute .guidelines').css({'background':'#F5F5F5','border':'1px solid #E6E6E6','color':'#444444','font-size':'80%','left':'60%','line-height':'130%','margin':'0 0 0 8px','padding':'8px 10px 9px','position':'absolute','top':'0','visibility':'hidden','width':'60%','z-index':'1000'});
$('form#form_recrute .btn_envoi').css({'color':'#FFF'});
$("#date_naissance").datepicker();
	
});
</script>

<script type="text/javascript" src="<?php echo SITEPATH; ?>modules/postule/js/validator.js"></script>


        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm2();" class="appnitro" id="form_recrute">
        
        <?php
	if(isset($_GET['err'])) {
		if($_GET['err'] == ''){
?>
		
		<label class="description"> <span class="required">Vous avez déjà enregistré votre candidature.</span></label>
		
<?php 
		}else if($_GET['err'] == 'mail')
		{
?>
		
		<label class="description"> <span class="required">L'e-mail spécifié existe déjà.</span></label>
		
<?php	
		}else if($_GET['err'] == 'tel')
		{
?>
		
		<label class="description"> <span class="required">Le téléphone spécifié existe déjà.</span></label>
		
<?php	
		}
	}
?>
<table width="100%" border="0" cellspacing="0" id="table_postule">
  
<?php if($idsite == 53){ ?>
 <tr>
    <td height="46" colspan="6" valign="top">
    
<label for="demande" class="description">Demande <span class="required">*</span></label>

 

<select class="element select large" id="poste_demande" name="poste_demande" style="width: 100%;" > 
<option value="0" >Sélectionnez</option>
<option value="Stage" >Stage</option>
<option value="Emploi" >Emploi</option>
</select>
</td>
    </tr>
<?php } ?>

<?php if(mysql_num_rows($query_champs) > 0){ ?>
  <tr>
    <td height="46" colspan="6" valign="top">
    
<label for="poste_recherche" class="description">Type de poste recherché <span class="required">*</span></label>

 

<select class="element select large" id="poste_recherche" name="poste_recherche" style="width: 100%;" > 
<option value="0" >Sélectionnez</option>
 
<?php do{ ?>
<option value="<?php echo stripslashes(($row_champs['type'])); ?>" ><?php echo stripslashes(($row_champs['type'])); ?></option>
<?php }while($row_champs = mysql_fetch_assoc($query_champs)); ?>
</select>
</td>
    </tr>
<?php } ?>
  <tr>
    <td colspan="3" width="50%"><h3>État Civil</h3></td>
    <td width="50%"><h3>Profil</h3></td>
  </tr>
  <tr>
    <td colspan="2"><label for="situation_actuelle" class="description">Situation Familiale <span class="required">*</span> :</label>
    <select name="situation_familiale">
      <option value="Célibataire">Célibataire</option>
      <option value="Marié(e)">Marié(e)</option>
    </select>
    </td>
    <td width="25%"><label for="situation_actuelle" class="description">Civilité <span class="required">*</span> :</label>
    <select name="civilite">
      <option value="Mr">Mr</option>
      <option value="Mlle">Mlle</option>
      <option value="Mme">Mme</option>
    </select></td>
    <td colspan="2"><label for="situation_actuelle" class="description">Situation Actuelle <span class="required">*</span> :</label>
      <select tabindex="14" name="situation_actuelle" id="situation_actuelle" class="element select large obligatoire"> 
        <option selected="selected" value="">Choisissez</option>
        <option value="En recherche">En recherche</option>
        <option value="Veille active">Veille active</option>
        <option value="Veille passive">Veille passive</option>
        <option value="En poste">En poste</option>
        </select>
      <div id="dsituation_actuelle" style="display:none" class="picto-false"> </div></td>
  </tr>
  <tr>
    <td width="28%"><label for="nom" class="description">Nom <span class="required">*</span> :</label>
  <input tabindex="3" value="" size="23" onFocus="clearText(this)" name="nom" id="nom" class="medium_input obligatoire">
  <div id="dnom" style="display:none" class="picto-false"></div></td>
    <td colspan="2"><label for="prenom" class="description">Prénom <span class="required">*</span> :</label>
      <input tabindex="4" value="" size="23" onFocus="clearText(this)" name="prenom" id="prenom" class="medium_input obligatoire">
      <div id="dprenom" style="display:none" class="picto-false"></div></td>
    <td colspan="2"><label for="experience" class="description">Expérience <span class="required">*</span> :</label>
      <select tabindex="15" name="experience" id="experience" class="element select large obligatoire">
        <option selected="selected" value="">Choisissez</option> 
        <option value="Etudiant">Etudiant</option>
        <option value="Jeune diplomé">Jeune diplomé</option>
        <option value="1-2ans">1 à 2 ans</option>
        <option value="3-5ans">3 à 5 ans</option>
        <option value="6-10ans">6 à 10 ans</option>
        <option value="+11ans">Plus de 11 ans</option>
        </select>
      <div id="dexperience" style="display:none" class="picto-false"> </div></td>
  </tr>
  <tr>
    <td colspan="2"><label for="prenom" class="description">Nationalité <span class="required">*</span> :</label>
      <input tabindex="3" value="" size="17" onFocus="clearText(this)" name="nationalite" id="nationalite" class="medium_input obligatoire">
      <div id="dnationalite" style="display:none" class="picto-false"></div></td>
    <td>
      <label for="date_naissance" class="description">Date de naissance <span class="required">*</span> :</label><input type="text" tabindex="9" value="" maxlength="10" class="medium_input obligatoire" onFocus="clearText(this)" name="date_naissance" id="date_naissance" style="width:50%; width:50%\0"> 
<div id="ddate_naissance" style="display:none" class="picto-false"></div>    </td>
    <td colspan="2"><label for="niveau_etudes" class="description">Niveau d'études <span class="required">*</span> :</label>
  <select tabindex="16" name="niveau_etudes" id="niveau_etudes" class="element select large obligatoire"> 
  <option selected="selected" value="">Choisissez</option>
  <option value="Niveau Bac">Niveau Bac</option>
  <option value="Bac">Bac</option>
  <option value="Bac+1">Bac+1</option>
  <option value="Bac+2">Bac+2</option>
  <option value="Bac+3">Bac+3</option>
  <option value="Bac+4">Bac+4</option>
  <option value="Bac+5">Bac+5</option>
  <option value="Bac+5 et plus">Bac+5 et plus</option>
  </select>
  <div id="dniveau_etudes" style="display:none" class="picto-false"> </div></td>
    </tr>
  <tr>
    <td colspan="3"><label for="adresse" class="description">Adresse <span class="required">*</span> :</label>
  <input type="text" tabindex="5" value="" class="medium_input obligatoire" onFocus="clearText(this)" name="adresse" id="adresse">  
  <div id="dadresse" style="display:none" class="picto-false"> </div>
      </td>
    <td colspan="2"><label for="etablissement" class="description">Établissement <span class="required">*</span> :</label>
      <input type="text" tabindex="17" value="" maxlength="255" class="medium_input obligatoire" name="etablissement" onfocus="clearText(this)" id="etablissement" style="width:99% !important;" />
      <div id="detablissement" style="display:none" class="picto-false"> </div></td>
    </tr>
  <tr>
    <td>      <label for="ville" class="description">Ville <span class="required">*</span> :</label>
      <input type="text" tabindex="10" value="" maxlength="255" class="medium_input obligatoire" name="ville" onFocus="clearText(this)" id="ville">
      <div id="dville" style="display:none" class="picto-false"> </div>
</td>
    <td colspan="2"><label for="pays_residence" class="description">Pays de résidence <span class="required">*</span> :</label><input type="text" tabindex="10" value="" maxlength="255" class="medium_input obligatoire" name="pays_residence" onFocus="clearText(this)" id="pays_residence"> 
  <div id="dpays_residence" style="display:none" class="picto-false"> </div></td>
    <td colspan="2"><label for="type_formation" class="description">Type de formation <span class="required">*</span> :</label>
      <select tabindex="18" name="type_formation" id="type_formation" class="element select large obligatoire"> 
        <option selected="selected" value="">Choisissez</option>
        <option value="Bac">Bac</option>
        <option value="BEP">BEP</option>
        <option value="BTS">BTS</option>
        <option value="Ecole d'ingénieurs">Ecole d'ingénieurs</option>
        <option value="Ecole de commerce">Ecole de commerce</option>
        <option value="Formation continue">Formation continue</option>
        <option value="Formation spécialisée">Formation spécialisée</option>
        <option value="Université">Université</option>
        <option value="Autres">Autres</option>
        </select>
      <div id="dtype_formation" style="display:none" class="picto-false"> </div></td>
    </tr>
  <tr>
    <td><label for="vemail" class="description">Adresse e-mail <span class="required">*</span> :</label>
<input type="text" tabindex="11" value="" maxlength="255" class="medium_input obligatoire email valid" title="Adresse e-mail" name="vemail" onFocus="clearText(this)"  id="vemail"> 
<div id="dvemail" style="display:none" class="picto-false"> </div></td>
    <td colspan="2"></td>
    <td colspan="2" rowspan="2"><label for="description" class="description">Décrivez vous en quelques lignes </label>
      
      <textarea tabindex="19" class="element textarea small" name="description" id="description"></textarea> 
      <div id="ddescription" style="display:none" class="picto-false"> </div></td>
    </tr>
  <tr>
    <td colspan="3"><label for="phone" class="description">Numéro de téléphone <span class="required">*</span></label>
  <input type="text" tabindex="13" value="" maxlength="10" class="medium_input obligatoire Numeric" title="Numéro de téléphone" name="phone" onFocus="clearText(this)" id="phone" style="width:50%; width:50%\0"> 
  <p class="guidelines" id="guide_1"><small>Format: 06011223344</small></p>
  <div id="dphone" style="display:none" class="picto-false"> </div></td>
    </tr>
  <tr>
    <td colspan="5">
    <ul style="margin:0px; padding:0; margin-top:10px;">
    <li id="li_11" style="width:23%; padding-left:0;">
<label for="cv" class="description">CV <span class="required">*</span>
<div class="fileinputs">
	<input type="file" name="cv" id="cv" class="file hidden" title="CV"  tabindex="20" style="width:100%">
<div class="fakefile"><input><img src="images/CV.png"><br /><div id="cv_val" class="fakefile2"></div></div></div>


</label>
<!--<p id="guide_1" class="guidelines"><small>Veuillez bien nommer votre cv avant de l'uploader (Exemple: nom_prenom.doc)</small></p> -->
</li>
<li id="li_12" style="width:36%">
  <label for="lm" class="description">Lettre de motivation  <span class="required">*</span>
   
    <div class="fileinputs">
	<input type="file" name="lm" id="lm" class="file hidden" title="lettre de motivation"  tabindex="21" style="width:100%">
<div class="fakefile"><input><img src="images/Lettre.png"><br /><div id="lm_val" class="fakefile2"></div></div></div>
    
    
  </label>
  <!--<p id="guide_1" class="guidelines"><small>Veuillez bien nommer votre cv avant de l'uploader (Exemple: nom_prenom.doc)</small></p> -->
</li>
<li id="li_13">
<label for="image" class="description">Photo  <span class="required">*</span>
  
   <div class="fileinputs">
	<input type="file" name="photo" id="photo" class="file hidden" title="photo"  tabindex="22" style="width:100%">
<div class="fakefile"><input><img src="images/image.png"><br /><div id="photo_val" class="fakefile2"></div></div></div>
    
</label>
</li>
</ul></td>
    </tr>
  <tr>
    <td colspan="5" align="right"><input name="send_mail" type="submit" value="Valider" class="btn_envoi" /></td>
  </tr>
</table>

</form>
     
<?php 
$rep = 'uploads/site_'.$idsite.'/recrute';/* vous decider */
if (@file_exists('uploads/site_'.$idsite.'/recrute')){
}else{
@mkdir('uploads/site_'.$idsite.'/recrute', 0755);
}
if(isset($_POST['send_mail'])){
include('wmailer/class.mailer.php');



		$poste_recherche=stripslashes(strip_tags($_POST['poste_recherche']));
		$situation_familiale=strip_tags(stripslashes($_POST['situation_familiale']));
		$civilite=strip_tags(stripslashes($_POST['civilite']));
  		$nationalite=strip_tags(stripslashes($_POST['nationalite']));
  		$nom=strip_tags(stripslashes($_POST['nom']));
 		$prenom=strip_tags(stripslashes($_POST['prenom']));
		$adresse=strip_tags(stripslashes($_POST['adresse']));
		//$cp=(strip_tags($_POST['cp']));
		$ville=(strip_tags(stripslashes($_POST['ville'])));
		//$region=(strip_tags($_POST['region']));
		$date_naissance=stripslashes(strip_tags($_POST['date_naissance']));
		$pays_residence=strip_tags(stripslashes($_POST['pays_residence']));
		$email=stripslashes(strip_tags($_POST['email']));
		$phone=stripslashes(strip_tags($_POST['phone']));
		$situation_actuelle=stripslashes(strip_tags($_POST['situation_actuelle']));
		$experience=stripslashes(strip_tags($_POST['experience']));
		//$experience=$_SESSION['experience'];
		$niveau_etudes=stripslashes(strip_tags($_POST['niveau_etudes']));
		$etablissement=stripslashes(strip_tags($_POST['etablissement']));
		$type_formation=stripslashes(strip_tags($_POST['type_formation']));
		$description=stripslashes(strip_tags($_POST['description']));
		//$cv=htmlentities(strip_tags($_POST['cv']));
		//$photo=htmlentities(strip_tags($_POST['photo']));

		//$_FILES["cv"]["type"];

				  if ($_FILES["cv"]["error"] > 0){
					$error="Erreur de téléchargement du fichier: " . $_FILES["cv"]["error"] . "<br />";
				  }else{
						$extension = end(explode(".", $_FILES["cv"]["name"]));
						$CV=$rep."/CV_" . urlencode(namefile(str_replace("(",'',str_replace(")",'',$phone)))).".".$extension;
						move_uploaded_file($_FILES["cv"]["tmp_name"], $CV);
				   }

				  if ($_FILES["lm"]["error"] > 0){
					$error="Erreur de téléchargement du fichier: " . $_FILES["lm"]["error"] . "<br />";
				  }else{
						$extension = end(explode(".", $_FILES["lm"]["name"]));
						$lm=$rep."/Lettre_de_motivation_" . urlencode(namefile($phone)).".".$extension;
						move_uploaded_file($_FILES["lm"]["tmp_name"], $lm);
				   }

				  if ($_FILES["photo"]["error"] > 0){
					$error="Erreur de téléchargement du fichier: " . $_FILES["photo"]["error"] . "<br />";
				  }else{
						$extension = end(explode(".", $_FILES["photo"]["name"]));
						$Photo=$rep."/Photo_" . urlencode(namefile($phone)).".".$extension;
						move_uploaded_file($_FILES["photo"]["tmp_name"], $Photo);
				   }
				   

	
		$sql="INSERT INTO postuler (id_site,poste_recherche, situation_familiale,civilite,nationalite, nom, prenom, adresse, cp, ville, region, date_naissance, pays_residence, email, phone, situation_actuelle, experience, niveau_etudes, etablissement, type_formation, description, cv, photo)
	  VALUES('$idsite','".addslashes($poste_recherche)."', '".addslashes($situation_familiale)."','".addslashes($civilite)."','".addslashes($nationalite)."', '".addslashes($nom)."', '".addslashes($prenom)."', '".addslashes($adresse)."', '".addslashes($cp)."', '".addslashes($ville)."', '".addslashes($region)."', '".addslashes($date_naissance)."', '".addslashes($pays_residence)."', '".addslashes($email)."', '".addslashes($phone)."', '".addslashes($situation_actuelle)."', '".addslashes($experience)."', '".addslashes($niveau_etudes)."', '".addslashes($etablissement)."', '".addslashes($type_formation)."', '".addslashes($description)."', '".$cv."', '".$photo."')";
$result=mysql_query($sql);
		//Headers
		

		//E-mail auquel sera envoyé le formulaire
		$to = $formulaire['email'];
		$subject = utf8_encode($formulaire['Sujet']);
		


		// création du message, les \n permettent de faire un saut de ligne
		$message = "Bonjour,<br>
			Une demande de candidature a été envoyée :<br />";
			
			
			if($idsite == 53){$message .= "Demande : ".$_POST['poste_demande']."<br />";}
			
			$message .= "Poste recherché : ".$poste_recherche."<br />
			Nom : ".$nom."<br />
			Prénom : ".$prenom."<br />
			Situation familiale  : ".$situation_familiale."<br />
			Civilité  : ".$civilite."<br />
			Nationalité : ".$nationalite."<br />
			Adresse : ".$adresse."<br />
			Ville : ".$ville."<br />
			Date de naissance : ".$date_naissance."<br />
			Pays de résidence : ".$pays_residence."<br />
			Adresse e-mail  : ".$email."<br />
			Numéro de téléphone : ".$phone."<br />
			Situation Actuelle  : ".$situation_actuelle."<br />
			Expérience : ".$experience."<br />
			Niveau d'études  : ".$niveau_etudes."<br />
			Etablissement : ".$etablissement."<br />
			Description : ".$description."<br />
			Type de formation : ".$type_formation."<br /><br />
			Télécharger <a href='".SITEPATH.$CV."'>CV</a>  <br />
			Télécharger <a href='".SITEPATH.$lm."'>Lettre de motivation</a>  <br />
			Télécharger <a href='".SITEPATH.$Photo."'>Photo</a>
			
			<br><br>Réponse automatique, ne pas répondre à cet e-mail.";
					
					
	$nom_sites = "SELECT * FROM site where id_site='".$idsite."'";
	$query_nom_sites  = mysql_query($nom_sites ,$connect);
	$req_nom_sites  = mysql_fetch_assoc($query_nom_sites);
					
					
		//send mail
			$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from($email,"Site : ".$req_nom_sites['Nom']."");
			$mailer->set_address($to);
			$mailer->set_format('html');
			$mailer->set_subject(utf8_decode(stripcslashes($subject)));
			$htmlmessage = nl2br(utf8_decode($message));
			$mailer->set_message($htmlmessage, array('TAG1' => ''));
			$mailer->send();
		

//$headers ='From: "Aksal Academy"<contact@aksalacademy.com>'."\n";
// multiple recipients
	$from = $email;

// message
$message2 = "Bonjour,<br>
		<p>Nous accusons réception de votre candidature et nous vous remercions de l'intérêt que vous portez à notre société. Sans réponse de notre part dans un délai de 15 jours, nous nous permettrons de conserver votre CV dans notre base de données et ne manquerons pas de vous recontacter dès qu'une opportunité, en adéquation avec votre profil, se présentera.</p>Cordialement,<br>
<br><br>Réponse automatique, ne pas répondre à cet e-mail.";

//send mail
			$mailer2 = new Mailer();
			$mailer2->set_priority('Highest');
			$mailer2->set_from($to,utf8_decode(stripcslashes($subject)));
			$mailer2->set_address($from);
			$mailer2->set_format('html');
			$mailer2->set_subject(utf8_decode('Accusé de réception candidature'));
			$htmlmessage2 = nl2br(utf8_decode($message2));
			$mailer2->set_message($htmlmessage2, array('TAG1' => ''));
			$mailer2->send();


?>
<script>
alert("Votre demande a bien été envoyée. Un email de confirmation vous sera envoyé ");
</script>
<?php } ?>

