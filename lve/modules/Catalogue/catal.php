<?php

 if($affiche_article == 'groupe'){ ?>
      <div id="block">
      <?php
			   if($point_fidelite == 1 && isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != ''){?>
                <?php include 'panier_cad.php'; ?>
            <a href="#" id="show_gift">Mes cadeaux</a>   

               <?php }
			   
			   
			   if($show_tri == 1){ ?>
       
        <form id="frm1" method="post">
          <?php echo SORT; ?> :
          <select id="ordre" name="ordre" onchange="frm1.submit();">
            <option value="Defaut"<?php if($_POST['ordre']=="Defaut") echo ' selected="selected"'; ?>><?php echo DEFAUL; ?></option>
            <option value="coissant"<?php if($_POST['ordre']=="coissant") echo ' selected="selected"'; ?>><?php echo INCPRICES; ?></option>
            <option value="decoissant"<?php if($_POST['ordre']=="decoissant") echo ' selected="selected"'; ?>><?php echo DESCPRICES; ?></option>
          </select>
        </form>
        <br />
        <?php } ?>
        <ul class="pagination">
          <?php if($nbr_Produits_page>0){
	$nbr = 1;
	if($type_catalogue == 2){
	while($row_articles  = mysql_fetch_assoc($articles)){ ?>
          <li onclick="document.location.href='<?php echo get_name_page($idsite,$id_page); ?>&produit=<?php echo $row_articles['id']?><?php echo $lien_plus; ?>'" class="catalogue-item" style="<?php if($nbr == $row_catalogue && $row_catalogue > 1){ $nbr = 0; ?>margin-right:0px;<?php } ?><?php if($nbr ==  1){ ?>margin-left:0px;<?php } ?>">
            <div class="catalogue-title">
              <h3>
                <?php 
					  echo stripslashes($row_articles['Nom'.$lang_table]);?>
              </h3>
            </div>
            <div class="catalogue-preview">
              <?php 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$row_articles['id']."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ ?>
              <img src="<?php echo SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])); ?>" />
              <?php }else{ ?>
              <img src="<?php echo SITEPATH; ?>images/no_image.png" />
              <?php } ?>
            </div>
            <div class="catalogue_content">
             <?php if($row_articles['Description'.$lang_table] != "" && $show_desc == 1){ ?>
              <div class="blog-text" style="margin: 6px 0;">
                <?php 
			echo cleanCut(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',strip_tags($row_articles['Description'.$lang_table]))),120);
		?>
              </div>
              <?php } ?>
              <?php if($show_detail == 1){ ?>
              <a class="read-more" href="<?php echo get_name_page($idsite,$id_page); ?>&produit=<?php echo $row_articles['id']?><?php echo $lien_plus; ?>"><?php echo DETAILS; ?> »</a>
              <?php } ?>
              <?php if($row_articles['show_prix']){?>
               <?php if($point_fidelite != 1){?><?php echo PRICE; ?> : <?php } ?><span class="signature"><?php echo $row_articles['Prix'].' '.$Devise; ?></span>
              <?php }?>
            </div>
          </li>
          <?php 
$nbr = $nbr+1;
}
}else{ ?>
          <?php
while($row_articles  = mysql_fetch_assoc($articles)){?>
          <li class="catalogue-item">
            <table width="100%" border="0" >
              <tr>
                <td width="20%" rowspan="4" valign="top"><div class="catalogue-preview">
                    <?php 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$row_articles['id']."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ ?>
                    <img src="<?php echo SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])); ?>" />
                    <?php }else{ ?>
                    <img src="<?php echo SITEPATH; ?>images/no_image.png" />
                    <?php } ?>
                  </div></td>
                <td rowspan="4" width="2%">&nbsp;</td>
                <td width="70%" height="20" valign="top"><h3> <?php echo $row_articles['Nom'.$lang_table];?> </h3></td>
              </tr>
              <tr>
                <td height="20" valign="top"><?php if($row_articles['show_prix']){?>
                   <?php if($point_fidelite != 1){?><?php echo PRICE; ?> : <?php } ?><span class="signature"><?php echo $row_articles['Prix'].' '.$Devise?></span>
                  <?php }?></td>
              </tr>
              <tr>
                <td valign="top"><?php 
		echo cleanCut(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',strip_tags($row_articles['Description'.$lang_table]))),150);
		?></td>
              </tr>
              <?php if($show_detail == 1){ ?>
              <tr>
                <td align="right" valign="bottom"><a class="read-more" href="<?php echo get_name_page($idsite,$id_page); ?>&produit=<?php echo $row_articles['id']?><?php echo $lien_plus; ?>"><?php echo DETAILS; ?> »</a></td>
              </tr>
              <?php } ?>
            </table>
            <hr />
          </li>
          <?php }	
?>
          <?php
}
}?>
        </ul>
      </div>
      <?php }else{ ?>
      <div id="block_catalogue">
        <table width="100%" border="0" id="<?php echo $row_articles['id']; ?>">
          <tr>
            <td width="30%" valign="top"><?php 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$row_articles['id']."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ ?>
              <img src="<?php echo SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])); ?>" style="width:100%" class="default_picture_shop" />
              <?php }else{ ?>
              <img src="<?php echo SITEPATH; ?>images/no_image.png" style="width:100%" />
              <?php } ?></td>
            <td width="2%" rowspan="2" valign="top">&nbsp;</td>
            <td rowspan="2" valign="top"><h3 class="catalogue-title"><?php echo stripslashes($row_articles['Nom'.$lang_table]); ?></h3>
              <?php if($row_articles['ref'] != ''){?>
              <h4><strong><?php echo REF; ?> :</strong> <span><?php echo $row_articles['ref'];?></span></h4>
              <?php }?>
              <?php if($row_articles['show_prix']){?>
              <h4> <span class="signature"><?php echo $row_articles['Prix']; ?></span> <span class="devise"><?php echo $Devise; ?></span>
                <?php if($row_articles['prix_barre'] != '' && $row_articles['prix_barre'] != 0){?>
                <span class="signature_barre"><?php echo $row_articles['prix_barre'].' '.$Devise?></span>
                <?php } ?>
              </h4>
              <?php }?>
              <div class="blog-text">
                <?php  echo stripslashes($row_articles['short_desc'.$lang_table]);?>
              </div>
              <?php 
			 $catalogue_options = "SELECT ap.*,a.*,c.* FROM attributes_produit ap,attributes a,categorie_attributes c 
			  where ap.id_attribute = a.id AND a.id_cat = c.id AND  ap.id_produit='".$row_articles['id']."' GROUP BY a.id_cat";
			$req_catalogue_options = mysql_query($catalogue_options ,$connect);
			$row_catalogue_options = mysql_fetch_assoc($req_catalogue_options);
			$num_catalogue_options = mysql_num_rows($req_catalogue_options);
			  if($num_catalogue_options > 0){
				  do{
				
				$catalogue_options_attr = "SELECT ap.*,a.*,c.* FROM attributes_produit ap,attributes a,categorie_attributes c 
			  where ap.id_attribute = a.id AND a.id_cat = c.id AND  ap.id_produit='".$row_articles['id']."' AND  a.id_cat='".$row_catalogue_options['id_cat']."'";
			$req_catalogue_options_attr = mysql_query($catalogue_options_attr ,$connect);
			$row_catalogue_options_attr = mysql_fetch_assoc($req_catalogue_options_attr);
			$num_catalogue_options_attr = mysql_num_rows($req_catalogue_options_attr);
					  
			  ?>
              <div class="options_produit">
                <label> <?php echo $row_catalogue_options['categorie']; ?> :</label>
                <?php if($row_catalogue_options['type'] == 'select'){ ?>
                <select name="<?php echo $row_catalogue_options['categorie']; ?>" id="<?php echo $row_catalogue_options['categorie']; ?>" class="attribute_select">
                  <?php do{ ?>
                  <option value="<?php echo $row_catalogue_options_attr['id_attribute'].'_#_'.$row_catalogue_options_attr['valeur']; ?>"><?php echo $row_catalogue_options_attr['valeur']; ?></option>
                  <?php }while($row_catalogue_options_attr = mysql_fetch_assoc($req_catalogue_options_attr)); ?>
                </select>
                <?php  }else if($row_catalogue_options['type'] == 'radio'){ ?>
                <?php do{ ?>
                  <input class="attribute_option" name="<?php echo $row_catalogue_options['categorie']; ?>" type="radio" value="<?php echo $row_catalogue_options_attr['id_attribute'].'_#_'.$row_catalogue_options_attr['valeur']; ?>" />
                  <?php echo $row_catalogue_options_attr['valeur']; ?>
                  <?php }while($row_catalogue_options_attr = mysql_fetch_assoc($req_catalogue_options_attr)); ?>
                <?php  }else if($row_catalogue_options['type'] == 'color'){ ?>
                <ul id="color_to_pick_list" class="clearfix">
                  <?php do{ ?>
                    <li> <a onclick="colorPickerClick(this);" title="<?php echo $row_catalogue_options_attr['valeur']; ?>" style="background: <?php echo $row_catalogue_options_attr['couleur']; ?> ;" class="color_pick selected" id="color_<?php echo $row_catalogue_options_attr['id_attribute']; ?>">
                      <?php 
						if (file_exists($row_catalogue_options_attr['texture']) && $row_catalogue_options_attr['texture'] != 'images/empty_img.png') {
						
						 ?>
                      <img width="20" height="20" alt="<?php echo $row_catalogue_options_attr['valeur']; ?>" src="<?php echo $row_catalogue_options_attr['texture']; ?>">
                      <?php } ?>
                      </a> </li>
                    <?php }while($row_catalogue_options_attr = mysql_fetch_assoc($req_catalogue_options_attr)); ?>
                </ul>
                <input class="color_pick_hidden" type="hidden" value="" name="<?php echo $row_catalogue_options['categorie']; ?>" id="group_<?php echo $row_catalogue_options['id_cat']; ?>">
                <?php  }  ?>
              </div>
              <?php 
				  }while($row_catalogue_options = mysql_fetch_assoc($req_catalogue_options));
			  } ?>
              <br />
              <div id="added_panier">Produit ajouté</div>
               <?php
			   if($point_fidelite == 0 ){
				   
				   if($is_catalogue == 1){
				   ?>
               
               <input type="button" value="Ajouter au panier" class="addPanier" data-devise = "<?php echo $Devise; ?>">
               
               <?php }else if($idsite == 69){ ?>
               
               <input type="button" value="Bientôt disponible" class="addPanier" >
               
               <?php }
			   
			    }else if((isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != '') && $point_fidelite == 1){
				   
				  $point_cumule = "SELECT f.nombre_point FROM formulaire_inscription f, espace_securise e WHERE f.id = e.id_point AND e.id = '".$_SESSION['id_acces']."' ";
				  $query_point_cumule = mysql_query($point_cumule,$connect_m);
				  $total_point_cumule = mysql_fetch_array($query_point_cumule);
				  
				 if($row_articles['show_prix'] && intval(str_replace(' ','',$row_articles['Prix'])) > 0 && intval(str_replace(' ','',$row_articles['Prix']))+intval(str_replace(' ','',$_SESSION["cat_total_".$idsite])) <= intval(str_replace(' ','',$total_point_cumule['nombre_point']))){ ?>
              <?php include 'panier_cad.php'; 
			  
			  ?><input type="hidden" value="<?php echo $total_point_cumule['nombre_point']; ?>" name="nombre_point" id="nombre_point">
              <input type="button" value="Ajouter au panier" class="addPanierCad" data-devise = "Points">
				<?php }else if($row_articles['show_prix'] && $row_articles['Prix'] > 0 && intval(str_replace(' ','',$row_articles['Prix'])) + intval(str_replace(' ','',$_SESSION["cat_total_".$idsite])) > intval(str_replace(' ','',$total_point_cumule['nombre_point']))){?>
              <input type="button" value="Points insuffisants " class="send">
				<?php //( echo (intval($row_articles['Prix']) - $total_point_cumule['nombre_point']); )
                
                } ?>
              <?php }else{ ?>
              
               <script type="text/javascript">
$(document).ready(function(){
	
$('#signupp').click(function()
{
$('#option_acces').val('signup');
$('#password').value='';
$('.login_block').hide();
$('.signup_block').show();
$('#email').removeClass("log");
$('#password').removeClass("password");
$('#nom_prenom').addClass("required");
$('#tel').addClass("number required");
$('#date_naissance').addClass("date required");
});
$('#loginn').click(function(){
$('#option_acces').val('login');
$('#password').value='';
$('.signup_block').hide();
$('.login_block').show();
$('#email').addClass("log");
$('#password').addClass("password");
$('#nom_prenom').removeClass("required");
$('#tel').removeClass("number required");
$('#date_naissance').removeClass("date required");
});
$.validator.addMethod("email", function(value, element)
{
return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
}, "Please enter a valid email address.");



// Validate signup form
$("#formPoll").validate({
id:"#formPoll",
url_site:"<?php echo SITEPATH; ?>",
rules: {
email: "required email",

},
});


    $('#formPoll input.input').focus(function() {
        if($(this).val() == $(this).data('default_val') || !$(this).data('default_val')) {
            $(this).data('default_val', $(this).val());
            $(this).val('');
        }
    });

    $('#formPoll input.input').blur(function() {
        if ($(this).val() == '') $(this).val($(this).data('default_val'));
    });

$('#btn_Espace_Securise_Catalogue').click(function(){
	$("#Espace_Securise_Catalogue").dialog('open');
	});


	$("#Espace_Securise_Catalogue").dialog({
		autoOpen: false,
		height: 240,
		width: 300,
		modal: true,
		draggable:true,
		buttons: {		
			"<?php echo IDENTIF; ?>"	: function() {
				$("#formPoll label.error").remove();
				$("#formPoll").submit();
			}	
		},
		open: function(event, ui){},
		close: function() {
			return false;
		}
	});	


});
</script>
      <div id="Espace_Securise_Catalogue" style="display:none">
        <form method="post" action="" id="formPoll">
          <div class="signup_block">
            <input type="text" name="nom_prenom" class="input" id="nom_prenom" value="<?php echo NAME_PRENAME; ?>" />
          </div>
          <input type="text" name="email"  class="input required email log" id="email" value="<?php echo EMAIL; ?>"/>
          <input type="password" name="password" class="input required password" value="<?php echo PASSWORD; ?>" id="password"/>
          <div class="signup_block">
            <input type="text" name="tel" class="input" id="tel" value="<?php echo TEL; ?>" />
            <input type="text" name="date_naissance" class="input" id="date_naissance" value="<?php echo DATE_NAISSANCE; ?>" />
          </div>
          <div id="msg_error"></div>
          <input type="hidden" name="option_acces" id="option_acces" value="login" />
          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />
          <input type="radio" name="choose" id="loginn" checked="checked" class="radio"/>
          <?php echo HAVE_COUNT; ?> <br />
          <input type="radio" name="choose" id="signupp" class="radio"/>
          <?php echo HAVE_NOT_COUNT; ?><br />
        </form>
      </div>
              
              <input type="button" value="Se connecter" class="send" id="btn_Espace_Securise_Catalogue">
              <?php } ?>
              </td>
          </tr>
          <tr>
            <td valign="top"><?php 
			
			
			$articles_slider = "SELECT * FROM images_produit where id_produit='".$row_articles['id']."' ORDER BY couverture  DESC";
			$req_articles_slider = mysql_query($articles_slider ,$connect);
			$row_articles_slider = mysql_fetch_assoc($req_articles_slider);
			
			$req_articles_slider2 = mysql_query($articles_slider ,$connect);
			$row_articles_slider2 = mysql_fetch_assoc($req_articles_slider2);
			
			$num_articles_slider = mysql_num_rows($req_articles_slider);
			
			 if($num_articles_slider > 1){  ?>
              <script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel_<?php echo $row_articles['id']; ?>').jcarousel({
        visible: 8,
        auto: 0
    });
	$('.jcarousel-skin-tango .jcarousel-container-horizontal').hide();
	$('.jcarousel-skin-tango .jcarousel-container-horizontal').width($('.jcarousel-skin-tango .jcarousel-container-horizontal').parent().parent().width());
	$('.jcarousel-skin-tango .jcarousel-container-horizontal').show();
});

</script> 
              <?php echo '<ul id="mycarousel_'.$row_articles['id'].'" class="jcarousel-skin-tango">';
			  do{  ?>
              <li style="margin-right:4px; margin-bottom:0;"> <a href="<?php echo SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_articles_slider['image'])); ?>" id="<?php echo SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_articles_slider['image'])); ?>" title="<?php echo $row_articles_slider['description']; ?>"> <img src="<?php echo SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_articles_slider['image'])); ?>" style="width:100%;"  /></a></li>
              <?php }while($row_articles_slider = mysql_fetch_assoc($req_articles_slider));
			   
			  echo '</ul>';
			   } ?></td>
          </tr>
          <tr>
            <td colspan="3" valign="top"><h3><?php echo DETAILCAT; ?> :</h3>
              <div class="blog-detail">
                <?php  echo stripslashes($row_articles['Description'.$lang_table]);?>
              </div>
              <br />
              <a href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>"><< <?php echo BACK_CATALOGUE; ?></a></td>
          </tr>
        </table>
      </div>
      <?php } ?>