// JavaScript Document
function stripslashes (str) {
  return (str + '').replace(/\\(.?)/g, function (s, n1) {
    switch (n1) {
    case '\\':
      return '\\';
    case '0':
      return '\u0000';
    case '':
      return '';
    default:
      return n1;
    }
  });
}



function filterBloc(data,scriptsToDelete,id_bloc) {
			    elements = $(data);
				for(i=0;i < scriptsToDelete.length;i++) {
				elements = elements.not("script[src='" + scriptsToDelete[i] + "']");
				}
			    $('#'+id_bloc+' div.HTML').html(elements);
				
			}


function filterJquery(data,id_bloc){
					    scriptsToDelete = new Array();
						nbre=0;
						nbreFinal=$(data).filter("script").length * 3;
		if(nbreFinal > 0){
                        $(data).filter("script").each(function(){
		
			                
			                    //Detect if script is jQuery Framework
			                    myframe = $("<iframe />").attr("src",'../detect_jquery/detectjquery.php?src=' + encodeURIComponent($(this).attr("src"))).attr("url_to_delete",$(this).attr("src")).load(function(){
			                        if($(this).contents().find("#result").html()==1)
			                            scriptsToDelete.push($(this).attr("url_to_delete"));
			                            $(this).remove();
			                            nbre=nbre+1;
										if(nbre==nbreFinal)
										filterBloc(data,scriptsToDelete,id_bloc);
			                    });
			
			                    $("body").append(myframe);
								
								//Detect if script is jQuery ui Framework
			                    myframe = $("<iframe />").attr("src",'../detect_jquery/detectjqueryui.php?src=' + encodeURIComponent($(this).attr("src"))).attr("url_to_delete",$(this).attr("src")).load(function(){
			                        if($(this).contents().find("#result").html()==1)
			                            scriptsToDelete.push($(this).attr("url_to_delete"));
			                            $(this).remove();
			                            nbre=nbre+1;
										if(nbre==nbreFinal)
										filterBloc(data,scriptsToDelete,id_bloc);
			                    });
			
			                    $("body").append(myframe);
								
								//Detect if script is jQuery mobile Framework
			                    myframe = $("<iframe />").attr("src",'../detect_jquery/detectjquerymobile.php?src=' + encodeURIComponent($(this).attr("src"))).attr("url_to_delete",$(this).attr("src")).load(function(){
			                        if($(this).contents().find("#result").html()==1)
			                            scriptsToDelete.push($(this).attr("url_to_delete"));
			                            $(this).remove();
			                            nbre=nbre+1;
										if(nbre==nbreFinal)
										filterBloc(data,scriptsToDelete,id_bloc);
			                    });
			
			                    $("body").append(myframe);
			
			               
			
			            });
						
}else{
	filterBloc(data,'',id_bloc);
	}
	}


jQuery.fn.center = function(parent) {

    if (parent) {

        parent = this.parent();

    } else {

        parent = window;

    }

    this.css({

        "position": "absolute",

        "left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")

    });

return this;

}

function positionner(ordre,direction,id,id_site,url_site){

	//alert("direction="+direction+"&ordre="+ordre+"&id="+id+"&id_site="+id_site);

	

$("#tout_footer #column_footer").html('Chragement...');

		 

			
			
			var order = "direction="+direction+"&ord="+ordre+"&id="+id+"&id_site="+id_site;
			$.post(url_site+"ordres.php", order, function(theResponse){

				if(theResponse == 1){

				window.location.reload();				

				}

			});





		 

		

	

	

	}

function positionner_header(ordre,direction,id,id_site,url_site){

	//alert("direction="+direction+"&ordre="+ordre+"&id="+id+"&id_site="+id_site);

	

$("#tout_header #column_header").html('Chragement...');

		 

var order = "direction="+direction+"&ord="+ordre+"&id="+id+"&id_site="+id_site;



			$.post(url_site+"ordres_header.php", order, function(theResponse){

				if(theResponse == 1){

				window.location.reload();				

				}

			});





		 

		

	

	

	}

function get_indicatif(idpays){

	newid = $.ajax({

          url: "functions/get_indicatif.php",

		  data:"idpays="+idpays,

          async: false

         }).responseText;

		 

		 

		

		$("#indicatif").val(newid);

		

}



function set_degrade(color1,color2){

	$('#deg').css('background-image','gradient(top , #'+color1+' 0%, #'+color2+' 100%)');

	$('#result').css('background-image','gradient(top , #'+color1+' 0%, #'+color2+' 100%)');

	

	}

function set_degrade_c(color1,color2){

	$('#deg_c').css('background-image','gradient(top , #'+color1+' 0%, #'+color2+' 100%)')

	$('#result #r_corp').css('background-image','gradient(top , #'+color1+' 0%, #'+color2+' 100%)')

	

	}

function set_degrade_f(color1,color2){

	$('#deg_f').css('background-image','gradient(top , #'+color1+' 0%, #'+color2+' 100%)')

	$('#result #r_corp #r_footer').css('background-image','gradient(top , #'+color1+' 0%, #'+color2+' 100%)')

	

	}

function change_option_bg(opt){

	for(var i=1;i<7;i++){

		$('#bg_'+i).hide();

		}

	

		$('#bg_'+opt).show();

	}	

function change_option_c(opt){

	if(opt == 4){

		$('#r_corp').css("backgroundColor","transparent");

		$('#r_corp').css("background","transparent");

		for(var i=1;i<4;i++){

		$('#bgc_'+i).hide();

		}

		}else{

	for(var i=1;i<4;i++){

		$('#bgc_'+i).hide();

		}

	

		$('#bgc_'+opt).show();

		}

	}

function change_option_f(opt){if(opt == 4){

		$('#r_footer').css("backgroundColor","transparent");

		$('#r_footer').css("background","transparent");

		for(var i=1;i<4;i++){

		$('#bgf_'+i).hide();

		}

		}else{

	for(var i=1;i<4;i++){

		$('#bgf_'+i).hide();

		}

	

		$('#bgf_'+opt).show();

		}

	}

	

	$(document).ready(function() {

	

$("#police").change(function() {

    $('#result').css("font-family", $('#police option:selected').text());



});	

$("#taille").change(function() {

    $('#result').css("font-size", $('#taille option:selected').text());



});





	

$("#police_lien").change(function() {

    $('#result a').css("font-family", $('#police_lien option:selected').text());



});	

$("#taille_lien").change(function() {

    $('#result a').css("font-size", $('#taille_lien option:selected').text());



});



$("#style_lien").change(function() {

    $('#result a').css("text-decoration", $('#style_lien option:selected').val());



});





$("#book-online").click(function(){	if($("#book-online-form").css('display') == 'none'){$("#book-online-form").slideDown('');}else{$("#book-online-form").slideUp('');}});

$("div#globalLangue").hover(
    function() {
         
        $(this).find("div#left_langue").slideToggle("fast");
         
    },
    function() {
         
        $(this).find("div#left_langue").slideToggle("fast");
         
    }
);

$("div.menuGauche,#Espace_Securise").hover(
    function() {
         
        $(this).find("div#account_client").slideToggle("fast");
         
    },
    function() {
         
        $(this).find("div#account_client").slideToggle("fast");
         
    }
);


$('#frm .textIn').each(function() {
$(this).data('default', this.value);
}).focusin(function() {
if ( this.value == $(this).data('default') ) {
this.value = '';
}
}).focusout(function() {
if ( this.value == '' ) {
this.value = $(this).data('default');
}
});

});


function centerBloc(){
half_window_height = $(window).height()/2;
half_bloc_height = parseInt($("#contenu #s_contenu #tout").css("height"))/2;
if (parseInt($("#contenu #s_contenu #tout").css("height"))+parseInt($("#contenu #s_contenu #header").css("height"))>$(window).height())
$("#contenu #s_contenu #tout").css("top",parseInt($("#contenu #s_contenu #header").css("height"))+"px");
else {
top_bloc = half_window_height - half_bloc_height;
$("#contenu #s_contenu #tout").css("top", top_bloc + "px");
}
}



function fixMenu(){
$("#header").css("width","1000000%");
$("#tout_header").css("width","100%");
$("body").css("overflow-x","hidden");
leftBloc = $("#tout_header p").position().left;
widthOfMenu = $("#header .menu li").last().position().left + $("#header .menu li").last().width();
if(leftBloc < widthOfMenu) {
$("#header").css({
"position" : "absolute",
"width" : (widthOfMenu + 200) + "px"
});
$("#tout_header").attr("style","position : absolute !important; width : " + (widthOfMenu + 200) + "px");
$("#tout_header p").css({
"position" : "absolute"
});
$("body").css("overflow-x","scroll");
}
}
$(document).ready(function()
{
  $("#keywords").keyup(function()
  {
	  $("#loader_ensigne").show();
    var kw = $("#keywords").val();
	
	if(kw != '')  
	 {


var order = "kw="+ kw;
			$.post("http://www.megamall.ma/modules/enseignes/search.php", order, function(theResponse){

		
		   $("#results").html(theResponse);
		   $("#loader_ensigne").fadeOut();

			});



	
	 }
	 else
	 {
	   $("#results").html("");
		   $("#loader_ensigne").fadeOut();
	 }
	return false;
  });
  
   $(".overlay").click(function()
   {
     $(".overlay").css('display','none');
	 $("#results").css('display','none');
   });
   $("#keywords").focus(function()
   {
     $(".overlay").css('display','block');
     $("#results").css('display','block');
   });
});

