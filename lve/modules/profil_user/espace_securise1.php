 <div id="Espace_Securise">
        <?php if(isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != ''){ 
		
    $page_profil = "SELECT c.id_page FROM pages p,contenu c where p.id_site = '".$idsite."' AND c.id_page = p.id AND c.type = 'Profil_user' LIMIT 1";
	$req_page_profil  = mysql_query($page_profil ,$connect);
	$row_page_profil = mysql_fetch_assoc($req_page_profil);
	$num_page_profil = mysql_num_rows($req_page_profil);
		
		?>
        <div id="profil">
        
        <?php if($num_page_profil > 0){ ?>
        <a href="<?php echo get_name_page($idsite,$row_page_profil['id_page']); ?>">
        
        Bonjour <strong><?php echo $_SESSION['nom_acces']; ?></strong>
        </a>
        
        <?php }else{?>
        Bonjour <strong><?php echo $_SESSION['nom_acces']; ?></strong>
		<?php	} ?>
       </div>
        <?php }else{ ?>
        <form method="post" action="" id="form_membre">
          <div class="signup_block">
            <input type="text" name="nom_prenom" class="input" id="nom_prenom" value="<?php echo NAME_PRENAME; ?>" />
          </div>
          <input type="text" name="email"  class="input required email log" id="email" value="<?php echo EMAIL; ?>"/>
          <input type="password" name="password" class="input required password" value="<?php echo PASSWORD; ?>" id="password"/>
          <div class="login_block">
            <input type="submit" value=" <?php echo IDENTIF; ?> " class="button send"/>
          </div>
          <div class="signup_block">
            <input type="text" name="tel" class="input" id="tel" value="<?php echo TEL; ?>" />
            <input type="text" name="date_naissance" class="input" id="date_naissance" value="<?php echo DATE_NAISSANCE; ?>" />
            <input type="submit" value=" <?php echo INSCRI_NEWSLETTER; ?> " class="button send"/>
          </div>
          <div id="msg_error"></div>
          <input type="hidden" name="option_acces" id="option_acces" value="login" />
          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />
          <?php if($idsite == 69){ ?>
			  
          <a href="#" id="signupp_user" class="radio"><?php echo HAVE_NOT_COUNT; ?>?</a><br />
			  <br />

			<?php  }else{ ?>
          <input type="radio" name="choose" id="loginn" checked="checked" class="radio"/>
          <?php echo HAVE_COUNT; ?> <br />
          <input type="radio" name="choose" id="signupp" class="radio"/>
          <?php echo HAVE_NOT_COUNT; ?><br />
          <?php } ?>
        </form>
        <?php } ?>
      </div>
 <script language="javascript">
 $(document).ready(function(){
 $('#signupp_user').click(function(){
	 document.location.href= "Inscription";
	}); 
	 });
 
 </script>