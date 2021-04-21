<?php
 session_start();
include ("../txheads.php");
#$conn = new mysqli('localhost','root','','taxation');
	$iduser = $_SESSION['user_id'];
if (isset($_POST['envoie_Reclamation'])) {
	//$client = $_POST['client'];
	  if (empty($_POST['codeClient'])) {
		  $codeClient ="";
		}else {
		  $codeClient = $clients->CODID($_POST['codeClient']);
		}
	$telFix = $_POST['telFix'];
	$telGSM = $_POST['telGSM'];
	$nDeclaration = $_POST['nDeclaration'];
	$expediteur = $_POST['expediteur'];
	$recTypeObjet = $_POST['recTypeObjet'];
	$recObjet = $_POST['recObjet'];
	$date =  date('Y-m-d');
      #echo $nDeclaration;
      #exit;
	$conn->query("INSERT INTO `reclamation`(`date_reclamation`, `idclient`, `objet_reclamation`, `num_declar`, `id_user`, `tpy_reclam`) VALUES('$date' ,$codeClient,'$recObjet','$nDeclaration',$iduser,'$recTypeObjet')");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<!--************************************************ HEAD *********************************************************-->


	<link rel="shortcut icon" type="image/x-icon" href="../images/LOGOSANS.jpg" />
	<link rel="stylesheet" href="../assets/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/mstyle.css">
	<script type="text/javascript" src="../assets/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../assets/popper.min.js"></script>
	<script type="text/javascript" src="../assets/tether.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/tax.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
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
							 data : "client="+$("#client").val()+"&codeClient="+$("#codeClient").val() +"&telFix="+$("#telFix").val() +"&telGSM="+$("#telGSM").val() +"&nDeclaration="+$("#nDeclaration").val() +"&expediteur="+$("#expediteur").val() +"&recObjet="+$("#recObjet").val()+"&complement="+$("#complement").val()

						 }).then(function(data) {
					 if($(data).find("reclamation").text() != ''){
						 alert("votre réclamation a été enregistré et sera traité dans un delai maximum de 48 heures ! N° de demande  "+$(data).find("reclamation").text());
					 }else{
						 alert('Une erreur est survenue lors de la création de votre demande ! Merci de réesseyer');
					 }
				 });
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
					 /*font-family: Century Gothic, Century !important;
					 font-size:12px !important;*/
					 color:# !important;
					margin-top: 80px;
					  /*background:#ffffff !important;*/
					background-attachment:fixed;
					background-image: url('../images/LOGOSANS150.jpg');
					background-size: 150px 104px;
					background-repeat: repeat;
					zoom: 90%;
					 }

					a img{ border:none\9;}
					a {
					 /*font-family: Century Gothic, Century;
					 font-size: 12px;*/
					 color: #000000;
					 text-decoration: none;
					}
					#foot{
						background-color: #ffffff;
						border-radius: 5px;
						border: 1px solid;
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
					 $("#telFix").mask("09 99 99 99 99");
					 $("#telGSM").mask("09 99 99 99 99");
					 $("#nDeclaration").mask("a 99 99 99 ?99 99");
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
			<!--************************************************ END HEAD *********************************************************-->
</head>

<body>

	<!--######################################**************************************************************************************************************#############################################-->

						<nav class="navbar navbar-expand-lg navbar-inverse fixed-top navbar-dark" style="background-color:#a8a8a8;">
									 <a class="navbar-brand" href="../"> <img src="../images/voielvej.png" height="37.453" width="114" alt=""> </a>
									 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									 <span class="navbar-toggler-icon"></span>
									 </button>
									 <div class="collapse navbar-collapse" id="navbarSupportedContent">
											<ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="../consultation.php" style="font-size:18px;">Consultaion</a>
                        </li>
												 <li class="nav-item">
														<a class="nav-link" href="../declaration.php" style="font-size:18px;">Déclaration</a>
												 </li>
                         <li class="nav-item">
                            <a class="nav-link " href="../track.php" style="font-size:18px;">Suivi colis</a>
                         </li>
                         <?php if ($_SESSION['typuser']=="clientlve"): ?>
                           <li class="nav-item">
                              <a class="nav-link " href="../agences.php" style="font-size:18px;">Mes sessions</a>
                           </li>
                         <?php endif; ?>
                         <!--<li class="nav-item">
                            <a class="nav-link" href="" style="font-size:18px;">Facturation</a>
                         </li>-->
						 				 <li class="nav-item">
											<a class="nav-link " href="../tracking.php" style="font-size:18px;">Suivis des envois</a>
										 </li>
												 <li class="nav-item active">
														<a class="nav-link" href="#" style="font-size:18px;">Réclamations <span class="sr-only">(current)</span></a>
												 </li>
											</ul>
                      <ul class="nav navbar-nav navbar-right" style=" padding: 5px;border-radius:15px;background-color: #CCCCCC;">
                        <li class="nav-item">
                          <a href="../panierramass.php" style="color:red;"><img src="../images/cart.png" width="25" height="25" alt=""><span style="padding-left: 15px;color:#545454;font-size:25px;"><?=$_SESSION['countcart'];?></span></a>
                        </li>
                      </ul>
											<ul class="nav navbar-nav navbar-right col-1">
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;">
														<?=$_SESSION['usernom'];?>
													</a>
													<div class="dropdown-menu" aria-labelledby="navbarDropdown">
														<a class="dropdown-item" href="../profile.php"><span><i class="fas fa-user"></i></span>Profile</a>
														<a class="dropdown-item" href="../deco.php"><span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>Deconnecter</a>
													</div>
												</li>
											</ul>
									 </div>
								</nav>

			<div class="container-fluid" style="padding:30px;">

                <div class="card">
                  <div class="card-header">
                    <h4><b>Réclamation</b></h4>
                  </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="dragbox dragbox_1858" id="2" >
                        <div class="dragbox-content Slider">
                          <script language="javascript">
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

                            <img class="img-fluid col-12" src="uploads/site_53/slider_bloc/min/slide-3.jpg" alt="" />

                        <div class="dragbox  dragbox_5148" id="6" >
                          <div class="dragbox-content Image">
                              <div class="col-11" style="padding-left:20px;">
                                <p style="  font-size: 22px;font-family: SF Pro Text,SF Pro Icons,Helvetica Neue,Helvetica,Arial,sans-serif;">
                                  Pour permettre un meilleur traitement et suivi de vos réclamations,
                                   nous vous remercions de renseigner les champs ci-dessous votre réclamation sera traitéé sous 48h,
                                  Merci de  noter le numéro de ticket ****** afin d'assurer le suivi de votre réclamation.
                                </p>
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
          <!--*********************************************************************************************************-->
                    <div class="col-md-4 col-xs-12">
                          <div class="dragbox dragbox_5149" id="7" >

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
                              <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" id="form_recrute">

                                  <div class="form-group">
                                    <label for="situation_actuelle" class="description">Nom Client / Société <span style="color:red;">*</span> :</label>
                                    <input tabindex="2" value="<?=$_SESSION['usernom'];?>" size="55" onFocus="clearText(this)" name="client" id="client" disabled class="form-control form-control-sm">
                                  </div>

                                  <div class="form-group">
                                    <label for="situation_actuelle" class="description" >Code Client / Société <span class="required"> (optionnel)</span> :</label>
                                      <input tabindex="3" value="" size="55" onFocus="clearText(this)"  name="codeClient" id="codeClient" class="form-control form-control-sm">
                                  </div>


                                  <div class="form-group">
                                    <label for="situation_actuelle" class="description">Tél fixe <span style="color:red;">*</span>:</label>(format : 09 99 99 99 99)
                                    <input tabindex="3" value="<?=$clients->TELUSER($_SESSION['user_id']); ?>" size="10" maxlength="10"  name="telFix" class="obligatoire form-control form-control-sm">
                                </div>
                                  <div class="form-group">
                                    <label for="experience" class="description" >GSM <span style="color:red;">*</span>:</label>(format : 09 99 99 99 99)
                                    <input tabindex="3" size="10" placeholder="05XXXXXXXX" maxlength="10"  name="telGSM" class="form-control form-control-sm obligatoire">
                                  </div>

                                  <div class="form-group">
                                    <label for="nom" class="description">N° de la Déclaration <span style="color:red;">*</span>:</label>(format : X 99 99 99)
                                    <input tabindex="3" value="" size="55"  name="nDeclaration" class="form-control form-control-sm obligatoire">
                                  </div>
                                  <div class="form-group">
                                    <label for="prenom" class="description">je suis un Client <span style="color:red;">*</span> :</label>
                                    <div class="form-group" style="font-size:16px;">
                                      <input tabindex="3" value="Expéditeur" type="radio" name="expediteur" id="expediteur"  class=" form-control-xs">		Expéditeur
                                       <input tabindex="3" value="Déstinataire" type="radio" name="expediteur" id="expediteur" class=" form-control-xs"> Déstinataire
                                    </div>
                                  </div>


                              <label for="prenom" class="description"><h3>Objet de la réclamation</h3></label>
                                  <script language="javascript">
                                  function typeObjet(val){
                                  if(val==1){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="1">Ratée</option> <option value="2">Retard</option> <option value="3">Manque</option> <option value="4">Erreur</option> <option value="5">Endommagée</option> <option value="6">Autre</option>'); }
                                  else if(val==2){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="7">Raté</option> <option value="8">Retard</option> <option value="9">Injoignable</option> <option value="10">Endommagé</option> <option value="11">Erreur</option> <option value="12">Autre</option>'); }
                                  else if(val==3){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="13">Raté</option> <option value="14">Retard</option> <option value="15">Non conforme</option> <option value="16">Autre</option>'); }
                                  else if(val==4){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="17">Inadapté</option> <option value="18">Etat</option> <option value="19">Qualité de chargement</option> <option value="20">Retard</option> <option value="21">Autre</option>'); }
                                  else if(val==5){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="22">Emballage défecteux</option> <option value="23">Contenu colis endommagé partiellement ou totalement</option> <option value="24">Marchandise mouillée</option> <option value="25">Marchandise cassée</option> <option value="26">Autre</option>'); }
                                  else if(val==6){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="27">Erreur</option> <option value="28">Autre</option>'); }
                                  else if(val==7){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="29">Partiel</option> <option value="30">Total</option> <option value="31">Autre</option>'); }
                                  else if(val==8){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="32">Erreur</option> <option value="33">Ratée</option> <option value="34">Autre</option>'); }
                                  else if(val==9){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="35">Incivilité/ Comportement</option> <option value="36">Tenue/Présentation</option> <option value="37">Injoignable</option> <option value="38">Autre</option>'); }
                                  else if(val==10){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="39">Facture non reçue</option> <option value="40">Erreur de tarification</option> <option value="41">Erreur poids</option> <option value="42">Paramétrage SI</option> <option value="43">Autre</option>'); }
                                  else if(val==11){$("#recObjet").empty().append('<option value="">Choisir un objet</option><option value="44">Erreur préparation</option> <option value="45">Gestion de stock</option> <option value="46">Avarie</option> <option value="47">Manque</option> <option value="48">Ecart d\'inventaire</option> <option value="49">Autre</option>'); }
                                  else{$("#recObjet").empty()}


                                }

                                  </script>
									<div class="col-12">
										<div class="form-row">
											<div class="form-group col-12" style="margin:10px;">
												<label for="nom" class="description">Votre réclamation est liée à <span style="color:red;">*</span> :</label>
												<select name="recTypeObjet" id="recTypeObjet" onchange="javascript:typeObjet(this.value);" class="form-control form-control-sm">
													<option value="">Choisir un Type</option>
													<option value="1">Livraison</option>
													<option value="2">Ramassage</option>
													<option value="3">Retour de Fond</option>
													<option value="4">Véhicule</option>
													<option value="5">Avarie</option>
													<option value="6">Aiguillage</option>
													<option value="7">Manque</option>
													<option value="8">Taxation</option>
													<option value="9">Chauffeur</option>
													<option value="10">Facturation</option>
													<option value="11">Logistique</option>
												</select>
												<select class="form-control form-control-sm" name="recObjet" id="recObjet">
													<option value="">Choisir un objet</option>
												</select>
											</div>
										</div>
									</div>
                                      <input class="btn btn-success col-12" name="envoie_Reclamation" type="submit" value="Valider" />
                                  </form>
                                </div>
                              </div>
                        </div>
                  </div>
                </div>

								</div>
					    </div>

							<hr>
							<div class="container" id="foot">
								<div class="row">
									 <div class="text-center ">
											<p><span style="font-size: 8pt;">LA VOIE EXPRESS 2 S.A au Capital 23.077.000,00 Dhs - 19, Rue Abou Bkr Ibnou Koutia, A&icirc;n Seba&acirc; &ndash; Casablanca</span><br /><span style="font-size: 8pt;">RC 95457 &ndash; IF 01601949 &ndash; Patente 37951124 &ndash; CNSS 2640961 &ndash; ICE 001526339000073</span><br /><span style="font-size: 8pt;">T&eacute;l : 05 22 34 43 16 / Fax : 0522344264 </span><br /><span style="font-size: 8pt;">Site : <a href="http://www.lavoieexpress.com">www.lavoieexpress.com</a> &ndash; E-mail ; client@lavoieexpress.ma </span><br /><span style="font-size: 8pt;">La valeur d&eacute;clar&eacute;e est de cent (100 Dhs) en cas de non d&eacute;claration de valeur. Les Clauses et conditions g&eacute;n&eacute;rales de transport Marchandise et Messagerie sont consultables aupr&egrave;s de LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet. </span></p>
									 </div>
								</div>
							</div>
				<script src="js/jquery.confirm.js"></script>
				<script src="js/socialShare.js"></script>

</body>


<!-- Mirrored from lavoieexpress.oneoweb.com/Candidature_spontanee by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 26 Feb 2014 11:08:03 GMT -->
</html>
