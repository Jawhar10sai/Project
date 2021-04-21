
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">



<!-- Mirrored from lavoieexpress.oneoweb.com/Candidature_spontanee by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 26 Feb 2014 11:08:01 GMT -->
<head>





<title>Réclamation</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="Content-Style-Type" CONTENT="text/css" />
<meta name="description" content="Candidature spontanee" />
<META NAME="keywords" CONTENT="Candidature spontanee" />



<link rel="Stylesheet" type="text/css" href="css/jquery.ui.theme.css"/>
<link rel="Stylesheet" type="text/css" href="css/styles.css"/>
<link rel="Stylesheet" type="text/css" href="css/styles_lang.css"/>
<link rel="Stylesheet" type="text/css" href="css/tables.css"/>
<link rel="Stylesheet" type="text/css" href="tiny_mce/css/typography.css"/>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script language="javascript">

function EVRec(){
	
	 
		 //$("#load_num_envoi").show(); 
		 
		  if($("#client").val()==""  || $("#telFix").val()==""  || $("#telGSM").val()=="" || $("#nDeclaration").val()=="" || $("#expediteur").val()=="" || $("#recObjet").val()=="" ){
alert('Tout les champs sont obligatoires !');exit();
		 
		  }else{

			
			  
	 $.ajax({
		 
		 url: "reclamation_envoi.php",
		 data : "client="+$("#client").val()+"&codeClient="+$("#codeClient").val() +"&telFix="+$("#telFix").val() +"&telGSM="+$("#telGSM").val() +"&nDeclaration="+$("#nDeclaration").val() +"&expediteur="+$("#expediteur").val() +"&recObjet="+$("#recObjet").val() 
	
	 }).then(function(data) {
		  
		 if($(data).find("reclamation").text() != ''){
			 alert("votre réclamation a été enregistré et sera traité dans un delai maximum de 48 heures ! N° de demande  "+$(data).find("reclamation").text());
			 
		 }else{
			 alert('Une erreur est survenue lors de la création de votre demande ! Merci de réesseyer');
		 }
		 
		 
	 });
	//Fin else 
		} 
	}


</script>


<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/tytabs.jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/tango/skin.css" />
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>


<link rel="stylesheet" type="text/css" href="css/tango/skin.css" />
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>

<script type="text/javascript" src="js/sliding_effect.js"></script>

<link href="css/example_ticker.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.zrssfeed.min.js" type="text/javascript"></script>
<script src="js/jquery.vticker.js" type="text/javascript"></script>

<link type='text/css' href='css/osx.css' rel='stylesheet' media='screen' />
<link rel="stylesheet" type="text/css" href="modules/style_menu/menu0/css/menu1.css" media="screen">
<link rel="stylesheet" media="screen" href="css/superfish-vertical.css" /> 
<script type="text/javascript" src="js/hoverIntent.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>

<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/osx.js'></script>

<link rel="stylesheet" type="text/css" href="js/smoothness/jquery-ui-1.8.1.custom.css" />
<script type="text/javascript" src="js/smoothness/jquery-ui-1.8.1.custom.min.js"></script>

<script type="text/javascript" src="js/validation.js"></script>


<script src="js/modernizr.js"></script>
<script src="js/jquery.refineslide.js"></script>
<script src="js/ios-orientation-change-fix.js"></script>


<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/jquery.datePicker.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/datePicker.css" />

<link rel="stylesheet" type="text/css" href="css/styles_box.css" />

 	<link rel="stylesheet" href="modules/slider_bloc/css/reset.css" />
	<link rel="stylesheet" href="modules/slider_bloc/css/main.css" />
	<link rel="stylesheet" href="modules/slider_bloc/css/refineslide.css" />
	<link rel="stylesheet" href="modules/slider_bloc/css/refineslide-theme-dark.css" />
    

<style type="text/css">
body {
 font-family: Century Gothic, Century !important;
 font-size:12px !important;
 color:# !important;
  background:#ffffff !important;
  background-attachment:fixed;
 background-repeat:no-repeat;
 }
  
a img{ border:none\9;}
a {
 font-family: Century Gothic, Century;
 font-size: 12px;
 color: #000000;
 text-decoration: none;
}


#tout .formulaire input.send,#tout #form_recrute input.btn_envoi,#tout input.btn, input.send, input#next, input#back,input.addPanier,input.addPanierCad {
    background: #000000 !important;
	border:0;
}
 input#next, input#back{ padding:3px 7px;}
#tout .formulaire input.send:hover,#tout #form_recrute input.btn_envoi:hover,#tout input.btn:hover, input.send:hover, input#next:hover, input#back:hover,input.addPanier:hover,input.addPanierCad:hover{
    background: #ef3f33 !important; 
	cursor:pointer !important;
}
#GlobalPanierResult .step_panier .inactif{
    background: #ef3f33 !important; 
	}

#panierText{
 color: #000000;
	}
.cart-total {
 background: none repeat scroll 0 0 #000000 !important;
	}
a:link {
 color: #000000;
 text-decoration: none;
}
a:visited {
 text-decoration: none;
}
a:hover {
 text-decoration: none;
 	color: #ef3f33;
}
a:active {
 text-decoration: none;
}
body div#contenu {
 width:1000px;
  float:none;
 position:relative;
    
}
 
body div#contenu div#s_contenu div#tout {
	width:100%;
	float:left;
  background:Transparent;
 }
.fixed_container{
	border-color: # !important;}
</style>
  <script type="text/javascript" src="js/jquery.quick.pagination.min.js"></script> 
        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
        
        
      <link rel="stylesheet" type="text/css" href="css/style_blog.css"/>
      <link rel="stylesheet" type="text/css" href="css/style_catalogue.css"/>
      
      
<link rel="Stylesheet" type="text/css" href="css/espace_securise.css"/>
 <script src="js/jquery.validate.js" type="text/javascript"></script>
 <script language="javascript">
	$(document).ready(function(){
	$("#message_new_inscrit").dialog({
		autoOpen: false,
		height: 150,
		width: 300,
		modal: true,
		draggable:true,
		buttons: {		
			Fermer: function() {
				$(this).dialog('close');
			}	
		},
		open: function(event, ui){},
		close: function() {
			// clear agenda data
			//$("#display-event-form").html("");
		}
	});	
	$("#plus_partage").dialog({
		autoOpen: false,
		height: 265,
		width: 200,
		modal: true,
        resizable: false,
		draggable:false
	});	
	
	$("#email_partage").dialog({
		autoOpen: false,
		height: 420,
		width: 500,
		modal: true,
        resizable: false,
		draggable:false
	});	
	
			});	
			$(window).resize(function() {
    $("#plus_partage").dialog("option", "position", "center");
    $("#email_partage").dialog("option", "position", "center");
});
</script>

<div id="message_new_inscrit" title="Nouvelle inscription" style="display:none">
  <p>Merci pour votre inscription, verifiez votre boite Email pour confirmer votre inscription!</p>
</div>
 <div id="email_partage" title="Partager" style="display:none">   </div>
<div id="plus_partage" title="Partage" style="display:none">
  <p><img src="images/lightbox-ico-loading.gif" width="32" height="32" /></p>
</div>    
  
<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<script src="js/modernizr.custom.17475.html"></script>
        
               <script type="text/javascript" src="js/jquerypp.custom.html"></script>
		<script type="text/javascript" src="js/jquery.elastislide.html"></script>  
      
      
        <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="js/search.js"></script>
        <link rel="stylesheet" href="css/jquery.autocomplete.css" type="text/css" />
        
        
<script src="js/galleria-1.2.9.min.js"></script>



<script src="js/poll.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/poll.css" />



<link href="css/jquery.rollbar.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.rollbar.min.js"></script>
<script type="text/javascript">
	  $(window).load(function(){
	  	$('.Image').rollbar({zIndex:100});
		
		$('.Image').hover(function(){
		     $(this).find('.rollbar-path-vertical').css('visibility','visible');
		},function(){
		     $(this).find('.rollbar-path-vertical').css('visibility','hidden');
		});
		
	  	$('#pages div.scrollMenu').rollbar({zIndex:100});
		$("#pages div.scrollMenu").each(function(){
		$(this).html("<div class='innerText' style='height:300px;' >" + $(this).html() + "</div>");
		paddingRight = $(this).css("padding-right");
		$(this).find('.innerText').css("padding-right",paddingRight);
		});
		
		
		
		$('.Texte').each(function(){
		$(this).html("<div class='innerText' >" + $(this).html() + "</div>");
		paddingRight = $(this).css("padding-right");
		$(this).find('.innerText').css("padding-right",paddingRight);
		});
		
		
		$('.innerText').rollbar({zIndex:100});
		
		
		$('.innerText').hover(function(){
		     $(this).find('.rollbar-path-vertical').css('visibility','visible');
		},function(){
		     $(this).find('.rollbar-path-vertical').css('visibility','hidden');
		});
		
		
		
	  });
</script>
    <!--Panier-->
    <script type="text/javascript" src="js/jquery.livequery.html"></script>
    <script type="text/javascript" src="js/jquery.PrintArea.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
      
     <script src="jquery-1.7.2.js" type="text/javascript"></script>
<script src="jquery-maskedinput-1-3-min.js" type="text/javascript"></script>
<script language="javascript">
jQuery(function($){
  /*$("#date").mask("99/99/9999");
  $("#phone").mask("(999) 999-9999");
  $("#tin").mask("99-9999999");
  $("#ssn").mask("999-99-9999");*/
   $("#telFix").mask("0999999999");
   $("#telGSM").mask("0999999999");
   $("#nDeclaration").mask("a999999?9999");
   
});

</script>

  
        <link href="css/panier.css" rel="stylesheet" />
        
        
        <!-- inscription --> 
       
		<link rel="stylesheet" type="text/css" href="modules/inscription/custom.css">
        
		<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
        
        
		<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>  
		<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
        
        
 <!--Panier--> 
 
<style type="text/css">
#GlobalPanierResult .mode_payement{
	
	border-color: #000000 !important;}
#GlobalPanierResult table, #GlobalPanierResult th, #GlobalPanierResult td {
 font-family: Century Gothic, Century;
 font-size:12px;
 color:#;
}
#GlobalPanierResult h3,#GlobalPanierResult #total_product,#GlobalPanierResult table tr td.price,#GlobalPanierResult .cart_total_price_last  .total_panier_last,#GlobalPanierResult #livraisonPanier span,#GlobalPanierResult #livraisonPanier2 span,div.shopp div.shopp-price,#left_bar #title_left_bar span.count_title,#Espace_Securise .redRegular,#Espace_Securise .redBold,#GlobalPanierResult .titreh2,.blocRight h2,#blocLeftParams h2.redBold,.blocRight .redColor,.blocRight .price  {
 color: #000000;
}
 #GlobalPanierResult .cart_quantity_up, #GlobalPanierResult .cart_quantity_down,#GlobalPanierResult .step_panier li,#GlobalPanierResult form fieldset h3,#GlobalPanierResult ul.address .address_title,#GlobalPanierResult ul.addressPanier .address_title,#GlobalPanierResult .cart_total_price_last .total_panier_last div,#globalPanier #littlePanier,#left_bar #title_left_bar span.icone_title,#Espace_Securise .monCompteContent .bgRed,#Espace_Securise .deconnexion_compte input,.bgRed,.ligne_adresse,#defaultCountdown  {
 background:#000000;
}
#pollWrap li.pollChart span {
 background:#000000 !important;
}
.bggrid,.ligne_adresse{
 background:#ef3f33;
	}
#GlobalPanierResult .address_update a{
 color:#;
}
#globalPanier,#left_bar #title_left_bar {
	border-color:#000000;
	}
#GlobalPanierResult .next_step,#GlobalPanierResult .prev_step,#GlobalPanierResult .address_update a span{
background:#000000;
}

</style>


</head><body>
 
<div id="bg1"></div>

<div id="contenu">


  <div id="s_contenu">

    
    
    <div id="tout" class="">

        <style type="text/css">


 
	
	#tout div.column div.dragbox_5144 div.dragbox-content
           {
			   				float : left;
								
			  			  
			  			  
			    margin-top:20px;			   margin-bottom:20px;			 
			 
			 
			   
				 margin-left:auto;
float : none;
			  margin-right:auto;
float : none;
							 
			 
			 
			 
			 
			 
			

							  			  			  			  
			  
			  
			  
			  
			  border-radius: 0px 0px 0px 0px ;


			  			     
 				background:Transparent;
   opacity:10;
color: !important;
			  
		   }
		   
		   
		   
		#tout div.column div.dragbox_5144 div.dragbox-content div,#tout div.column div.dragbox_5144 div.dragbox-content div embed
           {
		/*float : left;*/
			  			  
			  		   }
		   
		   
		   
		   
         
   
    
    
 
	
	#tout div.column div.dragbox_5145 div.dragbox-content
           {
			   				float : left;
								
			    
			  width:930px;			  
			  			  
			 			   margin-bottom:20px;			 
			 
			 
			   
				 margin-left:auto;
float : none;
			  margin-right:auto;
float : none;
							 
			 
			 
			 
			 
			 
			

							  			    padding-left:70px;			  			  
			  
			  
			  
			  
			  border-radius: 0px 0px 0px 0px ;


			  			   				background:#ef3f33;
      -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
    box-shadow: 0px 1px 5px 0px #4a4a4a;

 opacity:10;
color: !important;
			  
		   }
		   
		   
		   
		#tout div.column div.dragbox_5145 div.dragbox-content div,#tout div.column div.dragbox_5145 div.dragbox-content div embed
           {
		/*float : left;*/
			    
			  width:930px;			  
			  		   }
		   
		   
		   
		   
         
   
    
    
 
	
	#tout div.column div.dragbox_5147 div.dragbox-content
           {
			   				float : left;
								
			  			  
			  			  
			 			 			 
			 
			 
			   
				 margin-left:auto;
float : none;
			  margin-right:auto;
float : none;
							 
			 
			 
			 
			 
			 
			

							  			  			  			  
			  
			  
			  
			  
			  border-radius: 0px 0px 0px 0px ;


			  			     
 				background:Transparent;
      -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
    box-shadow: 0px 1px 5px 0px #4a4a4a;

 opacity:10;
color: !important;
			  
		   }
		   
		   
		   
		#tout div.column div.dragbox_5147 div.dragbox-content div,#tout div.column div.dragbox_5147 div.dragbox-content div embed
           {
		/*float : left;*/
			  			  
			  		   }
		   
		   
		   
		   
         
   
    
    
 
	
	#tout div.column div.dragbox_5148 div.dragbox-content
           {
			   				float : left;
								
			  			  
			  			  
			    margin-top:15px;			 			 
			 
			 
			   
				 margin-left:auto;
float : none;
			  margin-right:auto;
float : none;
							 
			 
			 
			 
			 
			 
			

							  			  			  			  
			  
			  
			  
			  
			  border-radius: 0px 0px 0px 0px ;


			  			     
 				background:Transparent;
   opacity:10;
color: !important;
			  
		   }
		   
		   
		   
		#tout div.column div.dragbox_5148 div.dragbox-content div,#tout div.column div.dragbox_5148 div.dragbox-content div embed
           {
		/*float : left;*/
			  			  
			  		   }
		   
		   
		   
		   
         
   
    
    
 
	
	#tout div.column div.dragbox_5149 div.dragbox-content
           {
			   				float : left;
								
			  			  
			  			  
			    margin-top:15px;			 			 
			 
			 
			   
				 margin-left:auto;
float : none;
			  margin-right:auto;
float : none;
							 
			 
			 
			 
			 
			 
			

							  			  			  			  
			  
			  
			  
			  
			  border-radius: 0px 0px 0px 0px ;


			  			     
 				background:Transparent;
   opacity:10;
color:# !important;
			  
		   }
		   
		   
		   
		#tout div.column div.dragbox_5149 div.dragbox-content div,#tout div.column div.dragbox_5149 div.dragbox-content div embed
           {
		/*float : left;*/
			  			  
			  		   }
		   
		   
		   
		   
         
   
    
    	
	body #tout #column1{
		width:100%;
		}
		
	
	
	
</style>

       
      <div class="column column2" id="column1">
      <style type="text/css">

	

	#tout div.column div.dragbox_1856 div.dragbox-content

           {

		 				float : left;
				
			  
			  

			  
			  

			    margin-top:20px;
			    margin-bottom:20px; margin-left:auto;float : none;margin-right:auto;float : none;				


				
			  
			  
			  
			  

			  

			  border-radius: 0px 0px 0px 0px ;





			  
			     

 				background:Transparent;

 
 
opacity:10;

color:# !important;

			  

		   }

		#tout div.column div.dragbox_1856 div.dragbox-content div,#tout div.column div.dragbox_1856 div.dragbox-content div embed

           {

		/*float : left;*/

			  
			  

			  
		   }

		   

		   

		   

		   

         

    </style>

      <div class="dragbox  dragbox_1856" id="3" >	<div class="dragbox-content Texte"><table style="width: 100%;" border="0"><tbody><tr><td valign="bottom"><a href="Accueil.html"><img src="uploads/site_53/images/source/logo-lavoieexpress.png" alt="" width="286" height="94" /></a></td><td style="width: 540px;">&nbsp;</td><td valign="bottom">&nbsp;</td><td valign="bottom">&nbsp;</td><td valign="bottom"><img src="uploads/site_53/images/source/logo_certificat_iso_9001_afnor_nov_2012.png" alt="" width="90" height="83" /></td></tr></tbody></table>

			</div>

		</div>
      <style type="text/css">

	

	#tout div.column div.dragbox_1857 div.dragbox-content

           {

		 				float : left;
				
			    

			  width:955px;
			  

			  
			  

			 
			    margin-bottom:20px; margin-left:auto;float : none;margin-right:auto;float : none;				


				
			  
			    padding-left:45px;
			  
			  

			  

			  border-radius: 0px 0px 0px 0px ;





			  
			   
				background:#ef3f33;

 
 
    -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;

    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;

    box-shadow: 0px 1px 5px 0px #4a4a4a;




opacity:10;

color:# !important;

			  

		   }

		#tout div.column div.dragbox_1857 div.dragbox-content div,#tout div.column div.dragbox_1857 div.dragbox-content div embed

           {

		/*float : left;*/

			    

			  width:955px;
			  

			  
		   }

		   

		   

		   

		   

         

    </style>

      
      <div class="dragbox dragbox_1857" id="1" >

			<div class="dragbox-content Menu">
          		
    <style>
	#Menu_30 .sf-menu li{
		margin:0 7.5px !important ;
		
		}
		#Menu_30 .sf-menu li.first{
			margin-left:0 !important;}
		#Menu_30 .sf-menu li.last{
			margin-right:0 !important;}
	
	</style>
    		
    <script language="javascript">
	$(document).ready(function(){
   $('#Menu_30 .sf-menu a').css({'color' : "none",'background' : "transparent"});
		
		
	$('#Menu_30 .sf-menu, .sf-menu *').css({'margin' : '0', 'margin' : '0', 'list-style' : 'none'});
	
	$('#Menu_30 .sf-menu').css('line-height' , '1.0');
	
	$('#Menu_30 .sf-menu ul').css({'position' : 'absolute', 'top' : '100%', 'width' : 'auto','display':'none'});
	
	$('#Menu_30 .sf-menu ul li').css('width','100%');
	
	$('#Menu_30 .sf-menu ul li').hover(function(){
		$(this).css('visibility','inherit');
		});
		
	
	$('#Menu_30 .sf-menu li').css('margin' , "0 7.5px" );
	
	$('#Menu_30 .sf-menu li.first').css('marginLeft','0');
	
	$('#Menu_30 .sf-menu li.last').css('marginRight','0');
	
		
	
	$('#Menu_30 .sf-menu li').css('float','left');
		
	$('#Menu_30 .sf-menu a').css({ 'display' : "block", 'float' : "left" , 'padding' : "inherit" });
	
	
	$('#Menu_30 .sf-menu li').hover(function()
   {
      $(this).find('ul').css('z-index','99');
   },function()
   {
      $(this).find('ul').css('z-index','99');
   })
	
	
	
		$('#Menu_30 .sf-menu li').hover(function()
   {
      $(this).find('ul').css({'background':'none', 'top' : "100%", 'left' : "0"  });
	  //$(this).find('ul').slideDown();
	  $(this).find('ul').show();
   }, function()
   {
	  //$(this).find('ul').slideUp();
	  $(this).find('ul').hide();
      $(this).find('ul').css({ 'top' : "100%", 'left' : "0"  });
   })
		
		$('#Menu_30').css({ 'display' : "table", 'marginLeft' : "auto", 'marginRight' : "auto", 'width' : "auto" });
		
	
	$('#Menu_30 .sf-menu a').css({ 'width' : "100%", 'height' : "30px", 'line-height' : "30px", 'border' : "none", 'text-decoration' : "none" });
	
	$('#Menu_30 .sf-menu span').css({ 'paddingLeft' : "1em", 'paddingRight' : "1em",'height' : '100%' });
	
	$('#Menu_30 .sf-menu li a.no_image').css('background','#ef3f33');
	
		
	
	$('#Menu_30 .sf-menu li li').css({ 'marginLeft' : "0", 'marginRight' : "0" });
	
	
	$('#Menu_30 .sf-menu li a.no_image').css({ 'font-family' : "Century Gothic, Century", 'text-transform' : "uppercase",'font-size' : "14px",'color' : "#ffffff" ,'font-weight' : "bold"});
	
	
	$('#Menu_30 .sf-menu li a.no_image').hover(function()
   {
	   
      $(this).css({ 'color' : "#ef3f33",'background' : "#ffffff"});
	  
	  $(this).find('a').css({ 'font-size' : "13px",'color' : "#ffffff",'background' : "#ef3f33",'white-space' : "nowrap"});
	  
   }, function()
   {
      $(this).css({ 'color' : "#ffffff",'background' : "#ef3f33"});
   })
	
	
	
	
   
   $('#Menu_30 .sf-menu li li a.no_image').css({ 'font-size' : "13px",'color' : "#ffffff",'background' : "#ef3f33",'white-space' : "nowrap"});
   
   
   //
   
   $('#Menu_30 .sf-menu li li a.no_image').hover(function()
   {
      $(this).css({ 'color' : "#ef3f33",'background' : "#ffffff"});
   }, function()
   {
      $(this).css({ 'color' : "#ffffff",'background' : "#ef3f33"});
   })
   //
   
       $('#Menu_30 .sf-menu').css({ 'marginLeft' : "auto",'marginRight' : "auto",'width' : "auto",'width' : "-moz-max-content",'width' : "-webkit-max-content",'width' : "-o-max-content",'width' : "max-content",'width' : "-max-content",'width' : "-ms-max-content"});
      
   
    $('#Menu_30 div#arr_menu').css({ 'left' : "0",'position' : "absolute",'width' : "100%",'background' : "red",'height' : "100%"});
	
	
$('#tout div.column div.dragbox div.Menu').css('float','none');
	
	
	

	$('#Menu_30 .sf-menu li a.current.no_image').css({ 'color' : "#ef3f33",'background' : "#ffffff"});
	
	
	$('#Menu_30 .sf-menu li a.current.no_image').hover(function()
   {
	   
      $(this).css({ 'color' : "#ef3f33",'background' : "#ffffff"});
	  
	  $(this).find('a').css({ 'font-size' : "13px",'color' : "#ffffff",'background' : "#ef3f33",'white-space' : "nowrap"});
	  
   }, function()
   {
       $(this).css({ 'color' : "#ef3f33",'background' : "#ffffff"});
   });
   
   $('#Menu_30 .sf-menu li li a.current.no_image').css({ 'color' : "#ef3f33",'background' : "#ffffff"});
   
   $('#Menu_30 .sf-menu li li a.current.no_image').hover(function()
   {
      $(this).css({ 'color' : "#ef3f33",'background' : "#ffffff"});
   }, function()
   {
       $(this).css({ 'color' : "#ef3f33",'background' : "#ffffff"});
   });
   
   
   
      
	   
 
   
   
   	$('#Menu_30').show();
	});
	</script>
    

       
				<div class="table" id="Menu_30" style="display:none;"><ul class="sf-menu sf" id="horizontal-list"> <li class="first "><a href="Accueil.html" data-idPage =  "358" class="no_image"><span>Accueil</span></a></li><li class="separateur"></li><li class=""><a href="javascript:void(0)" class="no_image"><span class="s_menu">Qui sommes nous</span></a><ul><li><a href="Nos_moyens.html"  data-idPage =  "869"" class="no_image"><span>Nos moyens</span></a></li><li><a href="Nos_engagements.html"  data-idPage =  "870"" class="no_image"><span>Nos engagements</span></a></li><li><a href="Notre_reseau.html"  data-idPage =  "872"" class="no_image"><span>Notre rÃ©seau</span></a></li><li><a href="Services_Qualite.html"  data-idPage =  "874"" class="no_image"><span>Service qualitÃ©</span></a></li><li><a href="Enterprise_Citoyenne.html"  data-idPage =  "875"" class="no_image"><span>Entreprise citoyenne</span></a></li></ul></li><li class="separateur"></li><li class=""><a href="javascript:void(0)" class="no_image"><span class="s_menu">produits</span></a><ul><li><a href="Messagerie.html"  data-idPage =  "823"" class="no_image"><span>Messagerie</span></a></li><li><a href="Affretement.html"  data-idPage =  "876"" class="no_image"><span>AffrÃ©tement</span></a></li><li><a href="Logistique.html"  data-idPage =  "877"" class="no_image"><span>Logistique</span></a></li></ul></li><li class="separateur"></li><li class=""><a href="javascript:void(0)" class="no_image"><span class="s_menu">Conseils et pratiques</span></a><ul><li><a href="uploads/site_53/documents/delais-de-livraison.pdf" target="_blank" class="no_image"><span>DÃ©lais de livraison</span></a></li><li><a href="javascript:void(0)" class="no_image"><span>Simulations</span></a></li><li><a href="Astuces.html"  data-idPage =  "1022"" class="no_image"><span>Astuces</span></a></li></ul></li><li class="separateur"></li><li class=""><a href="javascript:void(0)" class="no_image"><span>RÃ©clamations</span></a></li><li class="separateur"></li><li class="current "><a href="javascript:void(0)" class="no_image"><span class="s_menu">carriÃ¨res</span></a><ul><li><a href="Offres_d_emploi.html"  data-idPage =  "879"" class="no_image"><span>Offres d'emploi</span></a></li><li class="current" ><a href="Candidature_spontanee.html"  data-idPage =  "880"" class="no_image current "><span>Candidature spontanÃ©e</span></a></li></ul></li><li class="separateur"></li><li class="last "><a href="Contact.html" data-idPage =  "881" class="no_image"><span>contact</span></a></li></ul></div>		
      </div>

		</div>
      <style type="text/css">

	

	#tout div.column div.dragbox_1858 div.dragbox-content

           {

		 				float : left;
				
			  
			  

			  
			  

			 
			   margin-left:auto;float : none;margin-right:auto;float : none;				


				
			  
			  
			  
			  

			  

			  border-radius: 0px 0px 0px 0px ;





			  
			     

 				background:Transparent;

 
 
    -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;

    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;

    box-shadow: 0px 1px 5px 0px #4a4a4a;




opacity:10;

color:# !important;

			  

		   }

		#tout div.column div.dragbox_1858 div.dragbox-content div,#tout div.column div.dragbox_1858 div.dragbox-content div embed

           {

		/*float : left;*/

			  
			  

			  
		   }

		   

		   

		   

		   

         

    </style>

      <div class="dragbox dragbox_1858" id="2" >

			<div class="dragbox-content Slider"><script language="javascript">

$(document).ready(function() {
    $('#images_2').refineSlide({
        transition : "fade",
		autoPlay              : true,    // Int (default false): Auto-cycle slider
		delay                 : 0,     // Int (default 5000) Time between slides in ms
		transitionDuration    : 0,
        onInit : function () {
            var slider = this.slider,
               $triggers = $('.translist').find('> li > a');

            $triggers.parent().find('a[href="#_'+ this.slider.settings['transition'] +'"]').addClass('active');

            $triggers.on('click', function (e) {
               e.preventDefault();

                if (!$(this).find('.unsupported').length) {
                    $triggers.removeClass('active');
                    $(this).addClass('active');
                    slider.settings['transition'] = $(this).attr('href').replace('#_', '');
					$('#transition').val($(this).attr('href').replace('#_', ''));
                }
            });

            function support(result, bobble) {
                var phrase = '';

                if (!result) {
                    phrase = ' not';
                    $('#upper').find('div.bobble-'+ bobble).addClass('unsupported');
                    $('#upper').find('div.bobble-js.bobble-css.unsupported').removeClass('bobble-css unsupported').text('JS');
                }
            }

            support(this.slider.cssTransforms3d, '3d');
            support(this.slider.cssTransitions, 'css');
        },
        controls : 'arrows'
    });
});

</script>

 <style type="text/css">
div.rs-arrows{ display:none; }
	
	</style>
		
		<script language="javascript">
$(document).ready(function(){
$('.wrap_2,.wrap_2 .section-2,.wrap_2 .section-2 .rs-wrap,.wrap_2 .section-2 .rs-wrap .rs-slider li,.wrap_2 .section-2 .rs-wrap .rs-slider li img').css({'width' : "1000px",'height' : "373px"});
$('.wrap_2').css({"marginLeft":"auto","marginRight":"auto"});
});
</script>

<div class="wrap_2 group">
    <div class="section-2 group">
    
                         <img src="uploads/site_53/slider_bloc/min/slide-2.jpg" alt="" />
                
       
  </div>
  <!-- /.section-2 -->
  
  </div>
<!-- /#upper --> 



			</div>

		</div><div class="dragbox  dragbox_5148" id="6" >	<div class="dragbox-content Image">
		  <div style="width:100%; text-align:center;" ><strong>Pour permettre un meilleur traitement et suivi de vos réclamations, nous vous remercions de renseigner les champs ci-dessous votre réclamation sera traitéé sous 48h, Merci de  noter le numéro de ticket ****** afin d'assurer le suivi de vote réclamation.</strong></div>

			</div>

		</div><div class="dragbox dragbox_5149" id="7" >

			<div class="dragbox-content RH">
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

<script type="text/javascript" src="modules/postule/js/validator.js"></script>


        <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm2();" class="appnitro" id="form_recrute">
        
        <table width="100%" border="0" cellspacing="0" id="table_postule">


  <tr>
    <td colspan="1"><label for="situation_actuelle" class="description">Nom Client / Société <span class="required">*</span> :</label>
    <input tabindex="2" value="" size="23" onFocus="clearText(this)" name="client" id="client" class="medium_input obligatoire">
    </td>
    <td colspan="3"><label for="situation_actuelle" class="description">Code Client / Société <span class="required"> ( optionnel )</span> :</label>
    <input tabindex="3" value="" size="23" onFocus="clearText(this)" name="codeClient" id="codeClient" class="medium_input"></td>
  </tr>
  <tr>
    <td colspan="1"><label for="situation_actuelle" class="description">Tél fixe <span class="required">*</span> :</label>
      <input tabindex="3" value="" size="23"  name="telFix" id="telFix" class="medium_input obligatoire"></td>
      
  <td colspan="2"><label for="experience" class="description">GSM <span class="required">*</span> :</label>
      <input tabindex="3" value="" size="23"  name="telGSM" id="telGSM" class="medium_input obligatoire">
      
      
  </tr>
  <tr>
    <td ><label for="nom" class="description">N° de la Déclaration <span class="required">*</span> :</label>
  <input tabindex="3" value="" size="23"  name="nDeclaration" id="nDeclaration" class="medium_input obligatoire">
  
   <td colspan="3">
   <label for="prenom" class="description">je suis un Client <span class="required">*</span> :</label>
   <input tabindex="3" value="Expéditeur" size="17" type="radio" name="expediteur" id="expediteur" > 
       Expéditeur
       
    <input tabindex="3" value="Déstinataire" size="17" type="radio" name="expediteur" id="expediteur"> 
    Déstinataire
      </td>
    
    
    
  </tr>


    
      <tr>
  	<td colspan="1" width="50%"><label for="prenom" class="description"><h3>Objet de la réclamation</h3></label>
 
  	<select name="objet" id="objet"> <option value="">Choisir un objet</option> <optgroup label="Livraison"> <option value="1">Ratée</option> <option value="2">Retard</option> <option value="3">Manque</option> <option value="4">Erreur</option> <option value="5">Endommagée</option> <option value="6">Autre</option> </optgroup> <optgroup label="Ramassage"> <option value="7">Raté</option> <option value="8">Retard</option> <option value="9">Injoignable</option> <option value="10">Endommagé</option> <option value="11">Erreur</option> <option value="12">Autre</option> </optgroup> <optgroup label="Retour de Fond"> <option value="13">Raté</option> <option value="14">Retard</option> <option value="15">Non conforme</option> <option value="16">Autre</option> </optgroup> <optgroup label="Véhicule"> <option value="17">Inadapté</option> <option value="18">Etat</option> <option value="19">Qualité de chargement</option> <option value="20">Retard</option> <option value="21">Autre</option> </optgroup> <optgroup label="Avarie"> <option value="22">Emballage défecteux</option> <option value="23">Contenu colis endommagé partiellement ou totalement</option> <option value="24">Marchandise mouillée</option> <option value="25">Marchandise cassée</option> <option value="26">Autre</option> </optgroup> <optgroup label="Aiguillage"> <option value="27">Erreur</option> <option value="28">Autre</option> </optgroup> <optgroup label="Manque"> <option value="29">Partiel</option> <option value="30">Total</option> <option value="31">Autre</option> </optgroup> <optgroup label="Taxation"> <option value="32">Erreur</option> <option value="33">Ratée</option> <option value="34">Autre</option> </optgroup> <optgroup label="Chauffeur"> <option value="35">Incivilité/ Comportement</option> <option value="36">Tenue/Présentation</option> <option value="37">Injoignable</option> <option value="38">Autre</option> </optgroup> <optgroup label="Facturation"> <option value="39">Facture non reçue</option> <option value="40">Erreur de tarification</option> <option value="41">Erreur poids</option> <option value="42">Paramétrage SI</option> <option value="43">Autre</option> </optgroup> <optgroup label="Logistique"> <option value="44">Erreur préparation</option> <option value="45">Gestion de stock</option> <option value="46">Avarie</option> <option value="47">Manque</option> <option value="48">Ecart d'inventaire</option> <option value="49">Autre</option> </optgroup> </select>
  	
  
  
  </td>
  
  
  </tr>
    

      
    </tr>
    
    
    
    
    
    
    
    
    
    
    
    


    </tr>
  <tr>
    <td colspan="5" align="right"><input id="envoie_Reclamation" name="envoie_Reclamation" type="button" value="Valider" onclick="javascript:EVRec();" /></td>
  </tr>
</table>

</form>
     


        </div>

		</div></div>
    </div>

    
    <div id="tout_footer">

      
   <style>
	
	#tout_footer div.column_footer div.dragbox_1859 div.dragbox-content
           {
		 				float : left;
							  			  
			  			  
			 			  			  
			  
			   				
			  margin-left:auto;
float : none;
			  margin-right:auto;
float : none;
				



							  			    padding-left:4px;			    padding-right:4px;

			  			   				background:#ef3f33;
      -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
    box-shadow: 0px 1px 5px 0px #4a4a4a;

 opacity:10;
color:# !important;
			  
		   }
		#tout_footer div.column_footer div.dragbox_1859 div.dragbox-content div,#tout_footer div.column_footer div.dragbox_1859 div.dragbox-content div embed
           {
		/*float : left;*/
			  			  
			  		   }
		   
		   
		   
		   
         
    </style>
    
    
   <style>
	
	#tout_footer div.column_footer div.dragbox_6855 div.dragbox-content
           {
		 				float : left;
							  			  
			  			  
			    margin-top:20px;			  			  
			  
			   				
			  margin-left:auto;
float : none;
			  margin-right:auto;
float : none;
				



							  			  			  

			  			     
 				background:Transparent;
   opacity:10;
color:# !important;
			  
		   }
		#tout_footer div.column_footer div.dragbox_6855 div.dragbox-content div,#tout_footer div.column_footer div.dragbox_6855 div.dragbox-content div embed
           {
		/*float : left;*/
			  			  
			  		   }
		   
		   
		   
		   
         
    </style>
    
        
   
      <div id="column_footer" class="column_footer">

        <div class="dragbox dragbox_6855" id="68" ><div class="dragbox-content"><p><img src="uploads/site_53/images/references/references.png" alt="" width="1000" height="29" /></p></div></div>
        <script language="javascript">

$(document).ready(function(){

$('.jcarousel-skin-tango .jcarousel-item').css('width'  ,'70px' );



	

});

</script>

        
        
        <script type="text/javascript">



function mycarousel_initCallback(carousel)

{

    // Disable autoscrolling if the user clicks the prev or next button.

    carousel.buttonNext.bind('click', function() {

        carousel.startAuto(1);

    });



    carousel.buttonPrev.bind('click', function() {

        carousel.startAuto(1);

    });



    // Pause autoscrolling if the user moves with the cursor over the clip.

    carousel.clip.hover(function() {

        carousel.stopAuto();

    }, function() {

        carousel.startAuto();

    });

};



jQuery(document).ready(function() {

    jQuery('#mycarousel_806').jcarousel({

        auto: 20,

        wrap: 'last',

		
		buttonNextHTML:'',

		buttonPrevHTML:'',

		
        initCallback: mycarousel_initCallback

    });

	

	
});



</script>

        
        <div class="dragbox dragbox_0" id="69" ><div class="dragbox-content Galerie"><div id="gallery_806"><ul id="webticker_806" > <li><img src="uploads/site_53/galerie/min/references-logo-1.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-10.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-11.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-12.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-13.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-14.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-15.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-16.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-17.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-18.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-19.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-2.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-20.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-21.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-22.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-23.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-24.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-25.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-26.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-27.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-28.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-29.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-3.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-30.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-31.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-32.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-33.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-34.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-35.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-36.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-37.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-38.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-39.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-4.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-40.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-41.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-42.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-43.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-44.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-45.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-46.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-5.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-6.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-7.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-8.jpg" width="70" alt="" /></li> <li><img src="uploads/site_53/galerie/min/references-logo-9.jpg" width="70" alt="" /></li></ul></div></div>

			

		</div>
        <script language="javascript">

$(document).ready(function(){

$('#pCarousel a').css({'height':'43px','position':'relative','float':'left','width':'auto','marginLeft':'23px','marginRight':'23px'});

$('.caroufredsel_wrapper').css('width','961px');



});

</script> 

        <script language="javascript">

		 

$(document).ready(function () {

	$('#gallery_806 .tickercontainer').css({'margin':'0','padding':'0','overflow':'hidden'});

	$('#gallery_806 .tickercontainer .mask').css({'position':'relative','overflow':'hidden'});

	$('#gallery_806 ul.newsticker').css({'position':'relative','marginLeft':'20px','list-style-type':'none','margin':'0','padding':'0'});

});

		 </script> 

        <script type="text/javascript" src="js/jquery.webticker.js"></script> 

        <script>

	$("#webticker_806").webTicker();

</script>

        <div class="dragbox dragbox_1859" id="39" ><div class="dragbox-content"><table style="width: 100%;" border="0"><tbody><tr><td style="width: 22px; height: 22px;"><a href="Plan_du_site.html"><img src="uploads/site_53/images/footer/site-map.png" alt="" width="25" height="25" /></a></td><td style="width: 22px; height: 22px;"><a href="https://twitter.com/lavoieexpress" target="_blank"><img src="uploads/site_53/images/footer/twitter.png" alt="" width="25" height="25" /></a></td><td style="width: 22px; height: 22px;"><span style="color: #ffffff;"><a href="https://www.facebook.com/lavoieexpress" target="_blank"><span style="color: #ffffff;"><img src="uploads/site_53/images/footer/facebook.png" alt="" width="25" height="25" /></span></a></span></td><td style="width: 22px; height: 22px;"><span style="color: #ffffff;"><a href="http://www.linkedin.com/profile/view?id=171560018&amp;trk=nav_responsive_tab_profile" target="_blank"><span style="color: #ffffff;"><img src="uploads/site_53/images/footer/linkedin.png" alt="" width="25" height="25" /></span></a></span></td><td style="width: 22px; height: 22px;"><span style="color: #ffffff;"><a href="http://www.viadeo.com/fr/company/la-voie-express" target="_blank"><span style="color: #ffffff;"><img src="uploads/site_53/images/footer/viadeo.png" alt="" width="25" height="25" /></span></a></span></td><td style="width: 22px; height: 22px;"><span style="color: #ffffff;"><a href="http://www.youtube.com/watch?v=xXSnoja3PFo&amp;app=desktop" target="_blank"><span style="color: #ffffff;"><img src="uploads/site_53/images/footer/youtube.png" alt="" width="25" height="25" /></span></a></span></td><td style="text-align: right;"><span style="color: #ffffff;">&copy; 2014 Copyright Oneo. Tous droits r&eacute;s&eacute;rv&eacute;s</span></td></tr></tbody></table></div></div>
      </div>

    </div>

  </div>

</div>


<script src="js/jquery.confirm.js"></script> 

<script src="js/socialShare.js"></script>

</body>


<!-- Mirrored from lavoieexpress.oneoweb.com/Candidature_spontanee by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 26 Feb 2014 11:08:03 GMT -->
</html>

									