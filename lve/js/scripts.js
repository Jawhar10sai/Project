
$(document).ready(function(){
	var add=0;

	$("#create_field").click(function(){
		if($("#Libelle").val()==""){ 
			alert("Veuillez saisir le libell&eacute;");
		}else{

				var lib=$("#Libelle").val(), type=$("#Type").val(), Oblg=($("#Obligatoire").attr('checked')=='checked' ? 1 : 0 ), req="" , opt=$("#options").val();
				
				
				//alert(Oblg);
				if(Oblg==1){
					req="required";	
				}
				add+=1;
				var data_html="id="+add+"&type="+type+"&lib="+lib+"&opt="+opt+"&oblg="+Oblg+"&action=new";
				
			  $.ajax({
					  type: 'post',
					  url: 'functions/functions.php',
					  data: data_html,
					  success: function(res){
						$('#fields_list').append("<p class=\"field new\" id=\"add_"+add+"\">"+res+"</p>");
						$("#add_field_block").hide();
						$("#add").val($("#add").val()+add+",");
								$(".remove_field").click(function(){
									if(confirm("Voulez-vous vraiment supprimer ce champ? (il sera supprim&eacute; d&eacute;finitivement apr&egrave;s la validation du formulaire)")){
									$(this).parents(".field").remove();
									keep();
									}
								});
							
								$(".update_field").click(function(){
							
									$("#create_field").hide();
									$("#add_field_block").show();
									$("#edit_field").show();
							
									var lib=$(this).parents(".field").find(".lib").val();
									var type=$(this).parents(".field").find(".type").val();
									var oblg=($(this).parents(".field").find(".oblg").val()==1 ? true : false );
									var opt=$(this).parents(".field").find(".opt").val();
									
									$("#Libelle").val(lib);
									$("#Type").val(type);
									$("#Obligatoire").attr("checked",oblg);
									$("#options").val(opt);
									$("#edited_field").val($(this).parents(".field").attr("id"));
									$("#Type").change();
							
								});
					  },
					  error:function(err){
						 alert( "Erreur !: " + err );
					  }
				});
			
			}

	});
	
	
	$("#add_field").click(function(){
		$("#edit_field").hide();
		$("#add_field_block").show();
		$("#create_field").show();
		$("#Libelle").val("Nouveau champ");
		$("#Type").change();
		
	});
	$(".remove_field").click(function(){
		if(confirm("Voulez-vous vraiment supprimer ce champ? (il sera supprim&eacute; d&eacute;finitivement apr&egrave;s la validation du formulaire)")){
		$(this).parents(".field").remove();
		keep();
		}
	});

	$(".update_field").click(function(){

		$("#create_field").hide();
		$("#add_field_block").show();
		$("#edit_field").show();

		var lib=$(this).parents(".field").find(".lib").val();
		var type=$(this).parents(".field").find(".type").val();
		var oblg=($(this).parents(".field").find(".oblg").val()==1 ? true : false );
		var opt=$(this).parents(".field").find(".opt").val();
		
		$("#Libelle").val(lib);
		$("#Type").val(type);
		$("#Obligatoire").attr("checked",oblg);
		$("#options").val(opt);
		$("#edited_field").val($(this).parents(".field").attr("id"));
		$("#Type").change();

	});
	
	$("#edit_field").click(function(){
	
				var lib=$("#Libelle").val(), type=$("#Type").val(), Oblg=($("#Obligatoire").attr('checked')=='checked' ? 1 : 0 ), req="", opt=$("#options").val();
				var action="existant";
				var id=$("#edited_field").val();
				if($("#edited_field").val().charAt(3)=="_"){
				var action="new";
				var id=$("#edited_field").val().substr(4)
				}

				if(Oblg==1){
					req="required";	
				}
					var data_html="id="+id+"&type="+type+"&lib="+lib+"&opt="+opt+"&oblg="+Oblg+"&action="+action;
			  $.ajax({
					  type: 'post',
					  url: 'functions/functions.php',
					  data: data_html,
					  success: function(msg){
						$('#'+$("#edited_field").val()).html(msg);
						$("#add_field_block").hide();
						keep();
								$(".remove_field").click(function(){
									if(confirm("Voulez-vous vraiment supprimer ce champ? (il sera supprim&eacute; d&eacute;finitivement apr&egrave;s la validation du formulaire)")){
									$(this).parents(".field").remove();
									keep();
									}
								});
							
								$(".update_field").click(function(){
							
									$("#create_field").hide();
									$("#add_field_block").show();
									$("#edit_field").show();
							
									var lib=$(this).parents(".field").find(".lib").val();
									var type=$(this).parents(".field").find(".type").val();
									var oblg=($(this).parents(".field").find(".oblg").val()==1 ? true : false );
									var opt=$(this).parents(".field").find(".opt").val();
									
									$("#Libelle").val(lib);
									$("#Type").val(type);
									$("#Obligatoire").attr("checked",oblg);
									$("#options").val(opt);
									$("#edited_field").val($(this).parents(".field").attr("id"));
									$("#Type").change();
							
								});
						//alert(msg);
					  },
					  error:function(msg){
						 alert( "Erreur !: " + msg );
					  }
				});
			
	
	});
	
	
	$("#Type").change(function(){
		//alert($(this).val());
		if($(this).val()=='select' || $(this).val()=='checkbox' || $(this).val()=='radio'){
			$("#options_holder").show();
		}else{
			$("#options_holder").hide();
		}
	});
	
	});
	
	function keep(){
		var keep="";
		$(".existant").each(function(){
			keep+=$(this).attr("id")+",";
		});	
		$("#keep").val(keep);
	}
