$(document).ready(function() {
	

$(document).on("click", "#GlobalPanierResult a#print",function(){
	

            var mode = "popup";
            var close = false;
            var extraCss = "";
            var printBoth = "false";
            var keepAttr = ["class", "id", "style", "on"];
            var headElements = '<meta charset="utf-8" />,<meta http-equiv="X-UA-Compatible" content="IE=edge"/> ';
			console.log(headElements);	
            var options = { mode : mode, popClose : close, extraCss : extraCss, retainAttr : keepAttr, extraHead : headElements };

            var print = "div#print_to";

            $( print ).printArea( options );
        });	

 
 
 
 
 //
   
	
$(document).on("click", "#GlobalPanierResult .cad_quantity_up",function(){
	$id = $(this).attr('id');
	$idsite = $(this).attr('data-idsite');
	$('#quantity_'+$id).val(parseInt($('#quantity_'+$id).val())+1);
	$('#total_product_price_'+$id).html((parseInt($('#product_price_'+$id).html())*parseInt($('#quantity_'+$id).val())));
	
	$total = parseInt($('#total_product span').html())+parseInt($('#product_price_'+$id).html());
	$('#total_product span').html($total);
	$('.total_panier_last span.total_ttc').html($total);
	
	var transport = $("#GlobalPanierResult .total_panier_last span.total_transport").text();
	
	if(transport > 0){
		
		total_ttc = parseInt($total) + parseInt(transport);
	$("#GlobalPanierResult .total_panier_last span.total_ttc_transport").html(total_ttc);
		}else{
	$("#GlobalPanierResult .total_panier_last span.total_ttc_transport").html($total);
			}
	
	
	
	var order2 = "idsite="+$idsite;
	var order = 'action=add_nbr&quantity='+$('#quantity_'+$id).val()+'&produit_id='+$id+'&idsite='+$idsite+'&total='+$total;
	
	$.post("../detail_panier.php", order, function(theResponse){
$.post("../panier.php", order2, function(theResponse2){
if(theResponse2 != 0){
$('#globalPanier').html(theResponse2);

$('#left_bar').slideUp();
}

});
	});
	
	return false;
	
	});
$(document).on("click", "#GlobalPanierResult .cart_quantity_down",function(){
	
	$id = $(this).attr('id');
	$idsite = $(this).attr('data-idsite');
	
	
	if($('#quantity_'+$id).val() > 1){
	$('#quantity_'+$id).val(parseInt($('#quantity_'+$id).val())-1);
	
	$('#total_product_price_'+$id).html((parseInt($('#product_price_'+$id).html())*parseInt($('#quantity_'+$id).val())));
	
	$total = parseInt($('#total_product span').html())-parseInt($('#product_price_'+$id).html());
	$('#total_product span').html($total);
	$('.total_panier_last span.total_ttc').html($total);
	
	var transport = $("#GlobalPanierResult .total_panier_last span.total_transport").text();
	
	if(transport > 0){
		
		total_ttc = parseInt($total) + parseInt(transport);
	$("#GlobalPanierResult .total_panier_last span.total_ttc_transport").html(total_ttc);
		}else{
	$("#GlobalPanierResult .total_panier_last span.total_ttc_transport").html($total);
			}
	
	
	
	var order = 'action=add_nbr&quantity='+$('#quantity_'+$id).val()+'&produit_id='+$id+'&idsite='+$idsite+'&total='+$total;
	$.post("../detail_panier.php", order, function(theResponse){
		
		
		var order2 = "idsite="+$idsite;
$.post("../panier.php", order2, function(theResponse2){
	//alert(theResponse);
if(theResponse2 != 0){
$('#globalPanier').html(theResponse2);

$('#left_bar').slideUp();
}
});
		
	});
	}
	return false;
	});



			
			$(document).on("click", "#GlobalPanierResult .change_step",function(){
				var step = $(this).attr('data-step');
				var idsite = $(this).attr('data-idsite');
				if(step == 3){
					if($('input[name=transport]:checked', '#GlobalPanierResult').val() != undefined){
				var order = 'idsite='+idsite+'&transport='+$('input[name=transport]:checked', '#GlobalPanierResult').val()+'&step='+step;
					}else{
						alert('Choisissez un mode de livraison');
						return false
						}
					}else if(step == 2){
					if($('input[name=adresse_fac]:checked', '#GlobalPanierResult').val() != undefined){
						
				var order2 = 'action=adresseFacturation&iduser='+$('#GlobalPanierResult #adresse_fac').attr("data-iduser");
				
				$.get("../detail_panier.php", order2, function(theResponse2){
			
					
					});
				
						
				var order = 'idsite='+idsite+'&transport='+$('input[name=transport]:checked', '#GlobalPanierResult').val()+'&step='+step;
						
					}else{
						
				var order = 'idsite='+idsite+'&transport='+$('input[name=transport]:checked', '#GlobalPanierResult').val()+'&step='+step;
						}
					}else{
				var order = 'idsite='+idsite+'&step='+step;
						}
				
		$('#GlobalPanierResult').append("<img class='load_panier' src='../images/lightbox-ico-loading.gif' />");
			$.get("../detail_panier.php", order, function(theResponse){
				$('#GlobalPanierResult').html(theResponse);
				//alert(step);
		if(step == 5){		
				var order2 = "idsite="+idsite+"&action=panierVide";
$.post("../panier.php", order2, function(theResponse2){

if(theResponse2 != 0){
$('#globalPanier').html(theResponse2);

$('#left_bar').slideUp();
}
});
				
		}
			});
				return false;
				
				});
				


	
//Listé update adresse

$(document).on("click", "#GlobalPanierResult .updateAdresse", function(){
	var me = $(this);
	var id = $(this).attr('data-idAdresse');
	var idsite = $(this).attr('data-idsite');
	
	$('#GlobalPanierResult').append("<img class='load_panier' src='../images/lightbox-ico-loading.gif' />");
	
		var order = 'step=8&id='+id+'&idsite='+idsite;
			$.get("../detail_panier.php", order, function(theResponse){
				$('#GlobalPanierResult').html(theResponse);
			});
			return false;
});
//update adresse

//inscription panier
$(document).on("click", "#GlobalPanierResult #updateAdresse", function(){
	var me 				= $(this);
	var idsite 			= $(this).attr('data-idsite');
	var id    			= $(this).attr('data-idAdresse');
	
	
	var nom 			= $("#GlobalPanierResult #nom").val();
	var mobile 			= $("#GlobalPanierResult #mobile").val();
	
	var adresse 		= $("#GlobalPanierResult #adresse").val();
	
	var code_postale 	= $("#GlobalPanierResult #code_postale").val();
	var ville 			= $("#GlobalPanierResult #ville").val();
	var pays 			= $("#GlobalPanierResult #pays").val();
	
	
	var order = 'action=updateAdresse&idsite='+idsite+'&id='+id+'&nom='+nom+'&mobile='+mobile+'&adresse='+adresse+'&code_postale='+code_postale+'&ville='+ville+'&pays='+pays;
	
			$.get("../detail_panier.php", order, function(theResponse){
			
				if(theResponse == 1){
				
				$('#GlobalPanierResult').append("<img class='load_panier' src='../images/lightbox-ico-loading.gif' />");
		var order = 'step=1&idsite='+idsite;
			$.get("../detail_panier.php", order, function(theResponse){
				$('#GlobalPanierResult').html(theResponse);
			});
			
				}
			});
	
	//alert(idsite);
	return false;
	
	
	
});
//  payement
$(document).on("click", "#GlobalPanierResult .mode_payement", function(){
	var me = $(this);
	var idsite 			= $(this).attr('data-idsite');
	var idpaiement    	= $(this).attr('data-idpaiement');
	
	
	if($('input[name=Condition_general]:checked', '#GlobalPanierResult').val() != undefined){
				$('#GlobalPanierResult').append("<img class='load_panier' src='../images/lightbox-ico-loading.gif' />");
		var order = 'step=4&paiement='+idpaiement+'&idsite='+idsite;
			$.get("../detail_panier.php", order, function(theResponse){
				$('#GlobalPanierResult').html(theResponse);
			});
					}else{
						alert('Acceptez les conditions générales');
						return false
						}
	
	
	
	
	
	return false;
	
});

//  mot de passe perdu
$(document).on("click", "#GlobalPanierResult #lost_password", function(){
	var me = $(this);
	
	$("#GlobalPanierResult .registred").hide(400,function(){
		$("#GlobalPanierResult .password_forgotten").show(400);
		
		});
	
	return false;
	
	
	
});

$(document).on("click", "#GlobalPanierResult #recup_password", function(){
	var me = $(this);
	
	$("#GlobalPanierResult .password_forgotten").hide(400,function(){
		$("#GlobalPanierResult .registred").show(400);
		
		});
	
	return false;
	
	
	
});
//Adresse facture

$(document).on("click", "#GlobalPanierResult #adresse_fac", function(){
	if($('input[name=adresse_fac]:checked', '#GlobalPanierResult').val() != undefined){
	
	$('#address_invoice li.address_firstname').html($('#address_delivery li.address_firstname').html())	;
	$('#address_invoice li.address_address1').html($('#address_delivery li.address_address1').html())	;
	$('#address_invoice li.address_postcode').html($('#address_delivery li.address_postcode').html())	;
	$('#address_invoice li.address_Country').html($('#address_delivery li.address_Country').html())	;
	$('#address_invoice li.address_phone').html($('#address_delivery li.address_phone').html())	;
	}else{
	$('#address_invoice li.address_firstname').html($('#address_delivery li.address_firstname').html())	;
	$('#address_invoice li.address_address1').html('.....')	;
	$('#address_invoice li.address_postcode').html('.....')	;
	$('#address_invoice li.address_Country').html('.....')	;
	$('#address_invoice li.address_phone').html('.....')	;
		}
});

$(document).on("click", "#GlobalPanierResult #SubmitCreate", function(){
	var me = $(this);
	var idsite = $(this).attr('data-idsite');
	var email = $(this).parent().parent().find('#email_create').val();
	var error = false;
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');




	if(reg.test(email))
	{$(this).parent().parent().find('#email_create').css("border-color","#D7D6D5");
	 error = false;
	
	}
	else
	{$(this).parent().parent().find('#email_create').css("border-color","red");
	 error = true;
	
	}
	
	
	
	if(error == false){
		
		var order = 'action=testEmailAccountPanier&idsite='+idsite+'&email='+email;
		$.get("../detail_panier.php", order, function(theResponse){
			if(theResponse == 1){
				
 me.parent().parent().find('.msg_error').html('Compte existant!');
	 me.parent().parent().find('.msg_error').show();	
		
}else{
	

	$('#GlobalPanierResult').append("<img class='load_panier' src='../images/lightbox-ico-loading.gif' />");
		var order = 'step=7&idsite='+idsite+'&email='+email;
			$.get("../detail_panier.php", order, function(theResponse){
				$('#GlobalPanierResult').html(theResponse);
			});
	
	
	
	
	}
			});
		
		
		}
	
	return false;
	});	
	
	
//connexion panier
$(document).on("click", "#GlobalPanierResult #SubmitLogin", function(){
	var me = $(this);
	var idsite = $(this).attr('data-idsite');
	var email = $(this).parent().parent().find('#email').val();
	var mp = $(this).parent().parent().find('#passwd').val();
	var error = false;
	var error2 = false;
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');




	if(reg.test(email))
	{$(this).parent().parent().find('#email').css("border-color","#D7D6D5");
	 error = false;
	
	}
	else
	{$(this).parent().parent().find('#email').css("border-color","red");
	 error = true;
	
	}
	
	if(mp != "")
	{$(this).parent().parent().find('#passwd').css("border-color","#D7D6D5");
	 error2 = false;
		
	}
	else
	{$(this).parent().parent().find('#passwd').css("border-color","red");
	 error2 = true;
		
	}
	
	if(error == false && error2 == false){
		
		var order = 'action=loginPanier&idsite='+idsite+'&email='+email+'&mp='+mp;
			$.get("../detail_panier.php", order, function(theResponse){
			if(theResponse == 0){
				
 me.parent().parent().find('.msg_error').html('Vous devez valider d\'abord votre adresse e-mail!');
	 me.parent().parent().find('.msg_error').show();	
		
}else if(theResponse == 1){
	
 me.parent().parent().find('.msg_error').html('Login ou mot de passe incorrect!');
	 me.parent().parent().find('.msg_error').show();
}else{
	
				$('#Espace_Securise').html(theResponse);
	
	
	$('#GlobalPanierResult').append("<img class='load_panier' src='../images/lightbox-ico-loading.gif' />");
		var order = 'idsite='+idsite+'&step=1'
			$.get("../detail_panier.php", order, function(theResponse){
				$('#GlobalPanierResult').html(theResponse);
			});
	
	
	}
			});
		
		
		}
	
	return false;
	});	
	
	
$("div#globalPanier").hover(
    function() {
		 if ($('.shopp').length > 0 ) {
			$("div#globalPanier").css({'border-width':'1px'});
			$("div#globalPanier #littlePanier").css('margin','-1px -1px 0 0');
        $(this).find("div#left_bar").slideToggle("fast",function(){
			});
		 }
    },
    function() {
		 if ($('.shopp').length > 0 ) {
        $(this).find("div#left_bar").slideToggle("fast",function(){
			$("div#globalPanier").css('border-width','0px');
			$("div#globalPanier #littlePanier").css('margin','0px');
			});
		 }
    }
);
	
$('#left_bar').slideUp(function(){
	
	
			$("div#globalPanier").css('border-width','0px');
			$("div#globalPanier #littlePanier").css('margin','0px');
	});	
	
	
	$("#globalPanierCad").dialog({
		autoOpen: false,
		width: 310,
		modal: true,
		draggable:true,
		resizable:false,
		open: function(event, ui){
			},
		close: function() {}
	});	
	
	$('#show_gift').click(function(){
		
		$("#globalPanierCad .ui-dialog-content").css( "height", $("#globalPanierCad #left_bar_cad").height()+40);
		$("#globalPanierCad").dialog('open');
		
		return false;
		
		});
	
	//panier produits
    var Arrays=new Array();
	
   
	
$('.addPanier').click(function(){
var me = $(this);
idsite = $("#idsite_catalogue").val();
		
var order = "idsite="+idsite;
$.post("../panier.php", order, function(theResponse){
	//alert(theResponse);
if(theResponse != 0){
$('#globalPanier').html(theResponse);

$('#left_bar').slideUp();
}
		
		
        var thisID = me.parent('li').attr('class');
		var devise = me.attr('data-devise');
        if(thisID === undefined){
			
    var inputs = me.parent().find('input.color_pick_hidden');
    var query  = '';
    var id_query  = '';
	
		inputs.each(function(){
        var name  = $(this).attr('name');
        var value = $(this).val();
		if(value != ''){
		value = value.split('_#_');
		query += name+' : '+value[1]+'<br>';
		id_query += value[0]+'_';
		}
    });
	
	 var option = me.parent().find('input.attribute_option:checked');
	
		option.each(function(){
        var name  = $(this).attr('name');
        var value = $(this).val();
       if(value != ''){
		value = value.split('_#_');
		query += name+' : '+value[1]+'<br>';
		id_query += value[0]+'_';
		}
    });
	
	 var selects = me.parent().find('select.attribute_select');
	
			selects.each(function(){
        var name  = $(this).attr('name');
        var value = $(this).val();
		 if(value != ''){
		value = value.split('_#_');
		query += name+' : '+value[1]+'<br>';
		id_query += value[0]+'_';
		}
    });
			
            thisID = me.parent().parent().parent().parent().attr('id');
			thisID = id_query+thisID;
            var itemname  = $('.catalogue-title').html();
			
            var itemprice = $('.signature').text();
            var itempicture = $('.default_picture_shop').attr('src');
			itemprice = itemprice.replace(' ','');
			itemname += '<br>'+query;
			if (itemname.length > 50) {
    var ttext = itemname.substr(0, 50);
    ttext = ttext.substr(0, ttext.lastIndexOf(" "))  + '...';
  }
			
        }
        else{
            thisID = thisID.split(" ");
            thisID = thisID[2];
            thisID = thisID.split("p");
            thisID = thisID[1];
			thisID = id_query+thisID;
            var nodeType  = $(this).parent('li').find('.catalogue-title').children().get(0).nodeName;
            var itemname  = $(this).parent('li').find('.catalogue-title '+nodeType).html();
			
			
            var itemprice = $(this).parent('li').find('.signature').text();
            var itempicture = $('.default_picture_shop').attr('src');
			
			itemname += '<br>'+query;
			if (itemname.length > 50) {
    var ttext = itemname.substr(0, 50);
    ttext = ttext.substr(0, ttext.lastIndexOf(" "))  + '...';
  }
        }
        if($('#each-'+thisID).length !== 0)
        {
			
            var price    = $('#each-'+thisID).children(".shopp-price").find('em').html();
            var quantity = $('#each-'+thisID).children("#shopp-quantity").find('span.shopp-quantity').html();
            quantity     = parseInt(quantity)+parseInt(1);
            var total = parseInt(itemprice)*parseInt(quantity);
            $('#each-'+thisID).children(".shopp-price").find('em').html(price);
            $('#each-'+thisID).children("#shopp-quantity").find('span.shopp-quantity').html(quantity);
            var prev_charges = $('.cart-total span').html();
            prev_charges = parseInt(prev_charges)-parseInt(price);
            prev_charges = parseInt(prev_charges)+parseInt(total);
            $('.cart-total span').html(prev_charges);
           $('#total-hidden-charges').val(prev_charges);
        }
        else
        {
			
            Arrays.push(thisID);
			
            var prev_charges = $('.cart-total span').html();
            prev_charges = parseInt(prev_charges)+parseInt(itemprice);
            $('.cart-total span').html(prev_charges);
            $('#total-hidden-charges').val(prev_charges);
            $('#left_bar .cart-info').append('<div class="shopp" id="each-'+thisID+'"><div id="img_shop"><img width="50" src="'+itempicture+'"></div><div class="label">'+itemname+'</div> <div id="shopp-quantity">Quantité : <span class="shopp-quantity">1</span></div><div class="shopp-price"><em>'+itemprice+'</em>'+' '+devise+'</div><a rel="nofollow" class="cart_quantity_delete remove" href="#" style="float:right; margin-top:-4px"> X </a><br class="all" /></div>');
        }	
		
		
		

		
		
        var product;
        var products= new Array();
        var productsName = new Array();
        var prices = new Array();
        var itempicture = new Array();
        var qty = new Array();
        var i=0;
        $(".shopp").each(function(){
            product = $(this).attr('id');
            product = product.split("each-");
            products[i] = product[1];
			itempicture[i] = $(this).find("#img_shop img").attr('src');
            productsName[i]=$(this).find(".label").html();
            prices[i]= $(this).find("em").text();
            qty[i]= $(this).find(".shopp-quantity").text();
            i++;
        });
       total = $("#total-hidden-charges").val();
       idsite = $("#idsite_catalogue").val();
	  
	 // alert("products="+products+"&quantity="+qty+"&prices="+prices+"&productsName="+productsName+"&total="+total+"&idsite="+idsite);
	  
        $.ajax({
            type : 'post',
            url:'../panier.php',
            data: "products="+products+"&quantity="+qty+"&prices="+prices+"&productsName="+productsName+"&productsPic="+itempicture+"&total="+total+"&idsite="+idsite
        });
         $("#title_left_bar span.count_title").html('(' + i + ')');
		 $('#added_panier').delay(500).show().delay(1000).fadeOut();
	  });		
    });	
	
	
	
	//panier cadeaux
	 var Arrays_cadeaux=new Array();
	
   
	
    $('.addPanierCad').click(function(){
        var thisID = $(this).parent('li').attr('class');
		
		
		
        if(thisID === undefined){
			
    var inputs = $(this).parent().find('input.color_pick_hidden');
    var query  = '';
    var id_query  = '';
	
		inputs.each(function(){
        var name  = $(this).attr('name');
        var value = $(this).val();
		if(value != ''){
		value = value.split('_#_');
		query += name+' : '+value[1]+'<br>';
		id_query += value[0]+'_';
		}
    });
	
	 var option = $(this).parent().find('input.attribute_option:checked');
	
			option.each(function(){
        var name  = $(this).attr('name');
        var value = $(this).val();
       if(value != ''){
		value = value.split('_#_');
		query += name+' : '+value[1]+'<br>';
		id_query += value[0]+'_';
		}
    });
	
	 var selects = $(this).parent().find('select.attribute_select');
	
			selects.each(function(){
        var name  = $(this).attr('name');
        var value = $(this).val();
		 if(value != ''){
		value = value.split('_#_');
		query += name+' : '+value[1]+'<br>';
		id_query += value[0]+'_';
		}
    });
			
            thisID = $(this).parent().parent().parent().parent().attr('id');
			thisID = id_query+thisID;
            var itemname  = $('.catalogue-title').html();
            var itemprice = $('.signature').text();
            var itempicture = $('.default_picture_shop').attr('src');
            var devise = $('#devise_catalogue').val();
			itemprice = itemprice.replace(' ','');
			itemname += '<br>'+query;
			//alert(itemprice);
        }
        else{
            thisID = thisID.split(" ");
            thisID = thisID[2];
            thisID = thisID.split("p");
            thisID = thisID[1];
			thisID = id_query+thisID;
            var nodeType  = $(this).parent('li').find('.catalogue-title').children().get(0).nodeName;
            var itemname  = $(this).parent('li').find('.catalogue-title '+nodeType).html();
            var itemprice = $(this).parent('li').find('.signature').text();
            var itempicture = $('.default_picture_shop').attr('src');
			
			itemname += '<br>'+query;
        }
		//alert(thisID+' : '+$('#each-'+thisID).val());
        if($('#each-'+thisID).length !== 0)
        {
			
			//alert(thisID);
            var price    = $('#each-'+thisID).children(".shopp-price").find('em').text();
			//alert(price);
            var quantity = $('#each-'+thisID).find(".shopp-quantity").text();
			//alert(quantity);
			
			var total_moin = parseInt(price)*parseInt(quantity);
			//alert(total_moin);
            quantity     = parseInt(quantity)+parseInt(1);
			//alert(quantity);
            var total = parseInt(itemprice)*parseInt(quantity);
			//alert(total);
			
            $('#each-'+thisID).children(".shopp-price").find('em').html(price);
            $('#each-'+thisID).find(".shopp-quantity").html(quantity);
			
            var prev_charges = $('#cart_form_cad .cart-total span').text();
			//alert(prev_charges);
			
            prev_charges = parseInt(prev_charges)-parseInt(total_moin);
			//alert(prev_charges);
            prev_charges = parseInt(prev_charges)+parseInt(total);
			//alert(prev_charges);
			
           $('#globalPanierCad .cart-total span').html(prev_charges);
           $('#globalPanierCad .cart-total span').html(prev_charges);
           $('#globalPanierCad #total-hidden-charges').val(prev_charges);
        }
        else
        {
			
			//alert(thisID);
            Arrays_cadeaux.push(thisID);
			
            var prev_charges = $('#globalPanierCad .cart-total span').html();
            prev_charges = parseInt(prev_charges)+parseInt(itemprice);
           $('#globalPanierCad .cart-total span').html(prev_charges);
            $('#globalPanierCad #total-hidden-charges').val(prev_charges);
            $('#globalPanierCad #left_bar_cad .cart-info').append('<div class="shopp" id="each-'+thisID+'"><div id="img_shop"><img width="50" src="'+itempicture+'"></div><div class="label">'+itemname+'</div> <div id="shopp-quantity">Quantité : <span class="shopp-quantity">1</span></div><div class="shopp-price"><em>'+itemprice+'</em>'+' '+devise+'</div><a rel="nofollow" class="cart_quantity_delete remove_cad" href="#" style="float:right; margin-top:-4px"> X </a><br class="all" /></div>');
        }	
		
		
		

		
		
        var product;
        var products= new Array();
        var productsName = new Array();
        var prices = new Array();
        var qty = new Array();
        var itempicture = new Array();
        var i=0;
        $("#globalPanierCad .shopp").each(function(){
            product = $(this).attr('id');
            product = product.split("each-");
            products[i] = product[1];
            productsName[i]=$(this).find(".label").html();
            prices[i]= $(this).find("em").text();
			itempicture[i] = $(this).find("#img_shop img").attr('src');
            qty[i]= $(this).find(".shopp-quantity").text();
            i++;
        });
       total = $("#globalPanierCad #total-hidden-charges").val();
       idsite = $("#globalPanierCad #idsite_catalogue").val();
	   nombre_point = $('#nombre_point').val();
	   if(prev_charges > 0 && nombre_point >= prev_charges){
	   
	 // alert("products="+products+"&quantity="+qty+"&prices="+prices+"&productsName="+productsName+"&total="+total+"&idsite="+idsite);
       $.ajax({
            type : 'post',
            url:'../panier_cad.php',
            data: "products="+products+"&quantity="+qty+"&prices="+prices+"&productsName="+productsName+"&productsPic="+itempicture+"&total="+total+"&idsite="+idsite
        });
		//$("#panierText_cat").val('Total : ' + total + ' Points (nB PRoDuiT : ' + i + ')');
		
         $("#title_left_bar span.count_title").html('(' + i + ')');
		 
		$("#globalPanierCad .ui-dialog-content").css( "height", $("#globalPanierCad #left_bar_cad").height()+40);
		$("#globalPanierCad").dialog('open');
	   }else{
		   alert('Points insuffisants');
		   }
    });	
	
	
	//remove from panier
	$(document).on("click", "#GlobalPanierResult .cart_quantity_delete", function(){
		//$('.remove').click();
		var me = $(this);
		var elem = $(this).attr('id');
        var idsite = $(this).attr('data-idsite');
        var idproduct = $(this).attr('data-product');
    
		var order = "action=remove&elem="+elem+"&idsite="+idsite;
		
		$.post("../panier.php", order, function(theResponse){
			//alert(theResponse);
		var order2 = "idsite="+idsite;
$.post("../panier.php", order2, function(theResponse2){
	$("#GlobalPanierResult #total_product span").html(theResponse);
	$("#GlobalPanierResult .total_panier_last span.total_ttc").html(theResponse);
	
	
	var transport = $("#GlobalPanierResult .total_panier_last span.total_transport").text();
	
	if(transport > 0){
		
		total_ttc = parseInt(theResponse) + parseInt(transport);
	$("#GlobalPanierResult .total_panier_last span.total_ttc_transport").html(total_ttc);
		}else{
	$("#GlobalPanierResult .total_panier_last span.total_ttc_transport").html(theResponse);
			}
	
if(theResponse2 != 0){
$('#globalPanier').html(theResponse2);

$('#left_bar').slideUp();
}
})
			
		
		me.parent().parent().parent().hide(700,function(){
			me.remove();
		});
			
		 });
		//$(this).parent().parent().parent().slideUp('fast',function(){
			//$(this).remove();
		//});
		return false;
		
	});
	
	
	$(document).on("click", ".remove", function(){
        var deduct = $(this).parent().children(".shopp-price").find('em').html();
        var nbr = $(this).parent().children(".shopp-quantity").html();
        var prev_charges = $('.cart-total span').html();
		
        var thisID = $(this).parent().attr('id').replace('each-','');
		
        var pos = getpos(Arrays_cadeaux,thisID);
        Arrays_cadeaux.splice(pos,1,"0")
		
		//alert(prev_charges);
		
        prev_charges = parseInt(prev_charges)-(parseInt(deduct)*parseInt(nbr));
        $('.cart-total span').html(prev_charges);
        $('#total-hidden-charges').val(prev_charges);
        $(this).parent().slideUp('fast',function(){
			$(this).remove();
			
			
		
			
			
         var product;
        var products= new Array();
        var productsName = new Array();
        var prices = new Array();
        var quantity = new Array();
        var itempicture = new Array();
        var i=0;
        $(".shopp").each(function(){
            product = $(this).attr('id');
            product = product.split("each-");
            products[i] = product[1];
            productsName[i]=$(this).find(".label").html();
            prices[i]= $(this).find("em").text();
			itempicture[i] = $(this).find("#img_shop img").attr('src');
            quantity[i]= $(this).find(".shopp-quantity").text();
            i++;
        });
        var total = $("#total-hidden-charges").val();
        var idsite = $("#idsite_catalogue").val();
         var devise = $('#devise_catalogue').val();
        $.ajax({
            type : 'post',
            url:'../panier.php',
            data: "products="+products+"&quantity="+quantity+"&prices="+prices+"&productsName="+productsName+"&productsPic="+itempicture+"&total="+total+"&idsite="+idsite
        });
         $("#title_left_bar span.count_title").html('(' + i + ')');
		
	if ($('.shopp').length == 0 ) {
		$('#left_bar').slideUp(function(){
			
			$("div#globalPanier").css('border-width','0px');
			$("div#globalPanier #littlePanier").css('margin','0px');
			});	 
		 }
		
			});
		return false;
    });	
	//remove from cadeaux
	$(document).on("click", ".remove_cad", function(){
		
        var deduct = $(this).parent().children(".shopp-price").find('em').html();
        var nbr = $(this).parent().find(".shopp-quantity").html();
        var prev_charges = $('#globalPanierCad .cart-total span').html();
		
        var thisID = $(this).parent().attr('id').replace('each-','');
		
        var pos = getpos(Arrays_cadeaux,thisID);
        Arrays_cadeaux.splice(pos,1,"0")
		
		//alert(prev_charges);
		
        prev_charges = parseInt(prev_charges)-(parseInt(deduct)*parseInt(nbr));
        $('#globalPanierCad .cart-total span').html(prev_charges);
        $('#globalPanierCad #total-hidden-charges').val(prev_charges);
        $(this).parent().slideUp('fast',function(){
			$(this).remove();
         var product;
        var products= new Array();
        var productsName = new Array();
        var prices = new Array();
        var quantity = new Array();
        var i=0;
        $("#globalPanierCad .shopp").each(function(){
            product = $(this).attr('id');
            product = product.split("each-");
            products[i] = product[1];
            productsName[i]=$(this).find(".label").html();
            prices[i]= $(this).find("em").text();
            quantity[i]= $(this).find(".shopp-quantity").text();
            i++;
        });
        var total = $("#globalPanierCad #total-hidden-charges").val();
        var idsite = $("#globalPanierCad #idsite_catalogue").val();
            var devise = $('#globalPanierCad #devise_catalogue').val();
			
			if(total < 0){total = 0;}
		//alert("products="+products+"&quantity="+quantity+"&prices="+prices+"&productsName="+productsName+"&total="+total+"&idsite="+idsite);
        $.ajax({
            type : 'post',
            url:'../panier_cad.php',
            data: "products="+products+"&quantity="+quantity+"&prices="+prices+"&productsName="+productsName+"&total=0&idsite="+idsite
        });
         $("#title_left_bar span.count_title").html('(' + i + ')');
		
	if ($('#globalPanierCad .shopp').length == 0 ) {
		$('#globalPanierCad #left_bar_cad').slideUp();	 
		 }
		
			});
		return false;
    });	
        
    function include(arr, obj) {
        for(var i=0; i<arr.length; i++) {
            if (arr[i] == obj) return true;
        }
    }
    function getpos(arr, obj) {
        for(var i=0; i<arr.length; i++) {
            if (arr[i] == obj) return i;
        }
    }
    function angle(){
        $('#cart').css({
            '-webkit-transform' : 'rotate(0deg)',
            '-moz-transform' : 'rotate(0deg)'
        });
    }
   /* $("#globalPanier div").mouseover(function(){
        $("#left_bar").stop().slideDown();
   
    });
	 $("#globalPanier div").mouseout(function(){
        $("#left_bar").stop().slideUp();
   
    });*/
});

function colorPickerClick(elt)
{
	id_attribute = $(elt).attr('id').replace('color_', '');
	id_attribute = id_attribute+'_#_'+$(elt).attr('title');
	$(elt).parent().parent().children().removeClass('selected');
	$(elt).fadeTo('fast', 1, function(){
								$(this).fadeTo('fast', 0, function(){
									$(this).fadeTo('fast', 1, function(){
										$(this).parent().addClass('selected');
										});
									});
								});
	$(elt).parent().parent().parent().children('.color_pick_hidden').val(id_attribute);
	//findCombination(false);
}
 function ouvre_popup(page) {
       window.open(page,"Condition Géneral","menubar=no, status=no, scrollbars=no, menubar=no, width=500, height=400");
   }
 $(document).ready(function() {
	 $("#resultat_num_envoi").dialog({
		autoOpen: false,
		modal: true,
		draggable:false,
		resizable:false,
		open: function(event, ui){
			},
		close: function() {}
	});	
	 
	 
	 $("#envoi_num").click(function(){ 
		 $("#load_num_envoi").show(); 
	 $.ajax({
		 
		 url: "http://lavoieexpress.oneoweb.com/content_webservice.php",
		 data : "NUM="+$("#num_envoi").val()    
	 
	 }).then(function(data) {
		 if($(data).find("declaration").text() != ''){
		 $("#resultat_num_envoi").html('<strong>DECLARATION : </strong>'+$(data).find("declaration").text()+'<br><strong>STATUT :</strong> '+$(data).find("statut").text()+'<br><strong>DEPUIS : </strong> Depuis le '+$(data).find("depuis").text()+'<br><strong>LIEU :</strong> '+$(data).find("lieu").text()+'<br><strong>LIVREUR :</strong> '+$(data).find("livreur").text()+'<br><strong>TEL :</strong>'+$(data).find("tel").text()+'');
		 }else{
		 $("#resultat_num_envoi").html('Aucun résultat trouvé');
			 }
		 
		 
		 $("#resultat_num_envoi").dialog('open');
		 $("#load_num_envoi").hide();
		 
		 	});
		});
	});