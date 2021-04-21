<?php session_start(); 
	
	// config and includes
   	$config = dirname(__FILE__) . '/../../hybridauth/config.php';
    require_once( "../../hybridauth/Hybrid/Auth.php" );

	try{
		// hybridauth EP
		$hybridauth = new Hybrid_Auth( $config );

		// automatically try to login with google
		$google = $hybridauth->authenticate( "Google" );

		// return TRUE or False <= generally will be used to check if the user is connected to google before getting user profile, posting stuffs, etc..
		$is_user_logged_in = $google->isUserConnected();

		// get the user profile 
		$user_profile = $google->getUserProfile();

		// access user profile data
		//echo "Ohai there! U are connected with: <b>{$google->id}</b><br />";
		//echo "As: <b>{$user_profile->displayName}</b><br />";
		//echo "And your provider user identifier is: <b>{$user_profile->identifier}</b><br />";  

		// or even inspect it
		echo '<h3>Bonjour '.$user_profile->firstName." ".$user_profile->lastName.'</h3><div id="content"> <input type="button" value="Envoyer" class="Send" \><br /><br /><input type="checkbox" class="checkboxAll" value="0" name="email_all"> <strong>Sélectionner tout</strong>';
		
		$account_totals = $google->getUserContacts();


		
		foreach($account_totals as $item){
			if($item->email != ''){
			$arrays[] = sprintf('<input type="checkbox" class="checkbox" value="%s" name="email">%s', $item->email, $item->email);
			}
		}

		echo '<pre>' . print_r( join('<br/>', $arrays), true ) . '</pre><input type="button" value="Envoyer" class="Send" \></div>';

		$google->logout(); 
	}
	catch( Exception $e ){  
		// In case we have errors 6 or 7, then we have to use Hybrid_Provider_Adapter::logout() to 
		// let hybridauth forget all about the user so we can try to authenticate again.

		// Display the recived error, 
		// to know more please refer to Exceptions handling section on the userguide
		switch( $e->getCode() ){ 
			case 0 : echo "Unspecified error."; break;
			case 1 : echo "Hybridauth configuration error."; break;
			case 2 : echo "Provider not properly configured."; break;
			case 3 : echo "Unknown or disabled provider."; break;
			case 4 : echo "Missing provider application credentials."; break;
			case 5 : echo "Authentication failed. " 
					  . "The user has canceled the authentication or the provider refused the connection."; 
				   break;
			case 6 : echo "User profile request failed. Most likely the user is not connected "
					  . "to the provider and he should to authenticate again."; 
				   $google->logout();
				   break;
			case 7 : echo "User not connected to the provider."; 
				   $google->logout();
				   break;
			case 8 : echo "Provider does not support this feature."; break;
		} 

		// well, basically your should not display this to the end user, just give him a hint and move on..
		echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();

		echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>"; 

		/*
			// If you want to get the previous exception - PHP 5.3.0+ 
			// http://www.php.net/manual/en/language.exceptions.extending.php
			if ( $e->getPrevious() ) {
				echo "<h4>Previous exception</h4> " . $e->getPrevious()->getMessage() . "<pre>" . $e->getPrevious()->getTraceAsString() . "</pre>";
			}
		*/
	}
?>
  <style>  
    body {
    background-attachment: fixed;
    background-repeat: no-repeat;
    color: #7C7C7C !important;
    font-family: Trebuchet MS,Arial,Helvetica,sans-serif !important;
    font-size: 12px !important;
}
   </style> 
<script type="text/javascript" src="../../../../js/jquery-1.7.2.js"></script>

<script>
$(document).ready(function () {
$("input.Send").click(function() {
 var val = [];
        $('input.checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
		
		var order = "action=parrainage&id_site=<?php echo $_GET["idsite"]; ?>&id=<?php echo $_GET["id"]; ?>&emails="+val;
		
		$.post("parrainage.php", order, function(theResponse){
				$('#content').html(theResponse);

			}); 
		

});
$("input.checkboxAll").click(function() {
    if($("input.checkboxAll:checked").length == 1) {
        $("input.checkbox").attr("checked", "true");
    }else{
        $("input.checkbox").removeAttr("checked");
		}
});	
$("input.checkbox").click(function() {
	
   /* if($("input.checkbox:checked").length >= 10) {
        $("input.checkbox").not(":checked").attr("disabled", "true");
    }else{
        $("input.checkbox").removeAttr("disabled");
		}*/
});
})
</script>