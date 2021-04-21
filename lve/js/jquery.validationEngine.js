/*
 * Inline Form Validation Engine, jQuery plugin
 * 
 * Copyright(c) 2009, Cedric Dugas
 * http://www.position-relative.net
 *	
 * Form validation engine witch allow custom regex rules to be added.
 * Licenced under the MIT Licence
 */

$(document).ready(function() {
	$("#back").hide();
	
	// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
	$("[class^=validate]").validationEngine({
		success :  false,
		failure : function() {}
	});
						var arrays = new Array();
						arrays[0]="cin";
						arrays[1]="situation_patrimoniale";
						arrays[2]="nombre_enfants";
						arrays[3]="niveau_instruction";
						arrays[4]="categorie_socioprofessionnelle";
						arrays[5]="secteur_activite";
						arrays[6]="statut_conjoint";
						arrays[7]="cadre_travail";
						arrays[8]="voyage_travail";
						arrays[9]="vous_habitez";
						arrays[10]="Vos_revenus_globaux_du_foyer";
						arrays[11]="vehicules_automobiles";
						arrays[12]="materiel_informatique";
						arrays[13]="connexion_internet";
						arrays[14]="bancarises";
						arrays[15]="assurances";
						arrays[16]="centres_interet";
						arrays[17]="connaissance_site";
						arrays[18]="participer_reunions";
						arrays[19]="creation_entreprise";
						arrays[20]="secteurs_activite_investir";
						arrays[21]="accompagner";
						arrays[22]="situation_matrimoniale";
						for (i=0;i<arrays.length;i++)
						{
							$("#"+arrays[i]).removeClass("validate[required]");
							//console.log($("#"+array[i]));
							
						}
	$("#situation_matrimoniale").change(function(){
				var valeur=$("#situation_matrimoniale").val();
				console.log(valeur);
				$("#situation_patrimoniale").removeClass("validate[required]");
				if(valeur=="Marié(e)")
				$("#situation_patrimoniale").addClass("validate[required]");
			});
			$("#cadre_travail").change(function(){
				var valeur=$("#cadre_travail").val();
				console.log(valeur);
				$("#voyage_travail").removeClass("validate[required]");
				if(valeur=="Oui")
				$("#voyage_travail").addClass("validate[required]");
			});					
	
});
	

			
//caching stuff
				$progress = $("#progress"), $amount = $("#amount"), panels = [], panels[1] = "panel1", panels[2] = "panel2",panels[3] = "panel3", panels[4] = "panel4", panels[5] = "thanks", y = 1, $formPanel = $(".form-panel");
				//call progress bar constructor
				$progress.progressbar({
					change: function() {
						//update amount label when value changes
						$amount.text($progress.progressbar("option", "value") + "%");
					}
				});
				//same function to reuse code
				function changepanel(n,id_site) {
					/*
						reinitialisation
						
					*/
					var arrays = new Array();
						arrays[0]="cin";
						arrays[1]="situation_patrimoniale";
						arrays[2]="nombre_enfants";
						arrays[3]="niveau_instruction";
						arrays[4]="categorie_socioprofessionnelle";
						arrays[5]="secteur_activite";
						arrays[6]="statut_conjoint";
						arrays[7]="cadre_travail";
						arrays[8]="voyage_travail";
						arrays[9]="vous_habitez";
						arrays[10]="Vos_revenus_globaux_du_foyer";
						arrays[11]="vehicules_automobiles";
						arrays[12]="materiel_informatique";
						arrays[13]="connexion_internet";
						arrays[14]="bancarises";
						arrays[15]="assurances";
						arrays[16]="centres_interet";
						arrays[17]="connaissance_site";
						arrays[18]="participer_reunions";
						arrays[19]="creation_entreprise";
						arrays[20]="secteurs_activite_investir";
						arrays[21]="accompagner";
						arrays[22]="situation_matrimoniale";
						for (i=0;i<arrays.length;i++)
						{
							$("#"+arrays[i]).removeClass("validate[required]");
							//console.log($("#"+array[i]));
							
						}
					
					//hide current item
					$panel_default = '#panel'+y;
					$($panel_default).fadeOut(500);
					//selects next item
					y = y + n;
					//$('#number_etape').html(y);
					$(".etdiv").removeClass("etdiv-active");
					$(".btdiv").removeClass("btdiv-active");
					$(".bt_progress").removeClass("bt_progress_active");
					for(j=1;j<=y;j++){
						$("#et"+j).addClass("etdiv-active");
						$("#bt"+j).addClass("btdiv-active");
						if(j>1){
						num=1;
						num=j+num;
						$("#pt"+j).addClass("bt_progress_active");
						}
					}
					$panel_default = '#panel'+y;
					
					
					
					//hide next item
					var array= new Array();
					
					if(y == 2){
						array[0]="cin";
						array[1]="";
						array[2]="nombre_enfants";
						array[3]="niveau_instruction";
						array[4]="categorie_socioprofessionnelle";
						array[5]="secteur_activite";
						array[6]="statut_conjoint";
						array[7]="cadre_travail";
						array[8]="";
						array[9]="situation_matrimoniale";
					}
					if(y == 3){
						array[0]="vous_habitez";
						array[1]="Vos_revenus_globaux_du_foyer";
						array[2]="vehicules_automobiles";
						array[3]="materiel_informatique";
						array[4]="connexion_internet";
						array[5]="bancarises";
						array[6]="assurances";
						array[7]="centres_interet";
						array[8]="connaissance_site";
						array[9]="participer_reunions";
					}
					if(y == 4){
						array[0]="creation_entreprise";
						array[1]="secteurs_activite_investir";
						array[2]="accompagner";
					}
						for (i=0;i<array.length;i++)
						{
							$("#"+array[i]).addClass("validate[required]");
							//console.log($("#"+array[i]));
							
						}
					if(y < 5){
					$($panel_default).delay(505).fadeIn().addClass('ui-helper-selected');
					}
					
					if(y != 1) {$("#back").attr("disabled", null);$("#back").show();}else{ $("#back").attr("disabled", "disabled"); $("#back").hide();}
					if(y == 5){
						$("#panel5 fieldset").html("<img src='img/progress.gif' >");
			$("#panel5").delay(505).fadeIn().addClass('ui-helper-selected');
			$("#back").attr("disabled", "disabled").hide();
			$("#next").attr("disabled", "disabled").hide();						
						var order = $('#formID').serialize()+"&id_site="+id_site;
			$.post("modules/inscription/inscription.php", order, function(theResponse){
				$("#panel5 fieldset").html(theResponse);

			}); 
						
						} 
					
					//$progress.progressbar("option", "value", (y * 25) );					
				}


jQuery.fn.validationEngine = function(settings) {
	if($.validationEngineLanguage){					// IS THERE A LANGUAGE LOCALISATION ?
		allRules = $.validationEngineLanguage.allRules
	}else{
		allRules = {"required":{    
						"regex":"none",
						"alertText":"* Ce champs est requis",
						"alertTextCheckboxMultiple":"*Choisir un option",
						"alertTextCheckboxe":"* Ce checkbox est requis"},
					"length":{
						"regex":"none",
						"alertText":"* Entre ",
						"alertText2":" et ",
						"alertText3":" caract&egrave;res requis"},
					"minCheckbox":{
						"regex":"none",
						"alertText":"* Nombre max the boite exceder"},	
					"confirm":{
						"regex":"none",
						"alertText":"* Votre mot de passe n'est pas identique"},		
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"* Num&eacute;ro de t&eacute;l&eacute;phone invalide"},	
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"* Adresse email invalide"},	
					"date":{
                         "regex":"/^\[0-9]{1,2}\-\[0-9]{1,2}\-[0-9]{4}$/",
                         "alertText":"* Date invalide, format DD-MM-YYYY requis"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* Chiffres seulement accept&eacute;"},	
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$/",
						"alertText":"* Aucune caract&egrave;re sp&eacute;cial accept&eacute;"},	
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* Lettres seulement accept&eacute;"},	
					"begin_with":{
						"regex":"/^0[0-9\ ]+$/",
						"alertText":"* Doit commencer par 0 et ne contenir que des chiffres"}
					}	
	}

 	settings = jQuery.extend({
		allrules:allRules,
		inlineValidation: true,
		success : false,
		failure : function() {}
	}, settings);	

	$(".btn_inscription").bind("click", function(){   // ON FORM SUBMIT, CONTROL AJAX FUNCTION IF SPECIFIED ON DOCUMENT READY

			var n = ($(this).attr("id") != "back") ? 1 : -1;
			var id_site = $(this).attr("data-site");
			
				
			
				if(submitValidation('form',$(this).attr("id")) == false){
				settings.failure && settings.failure(); 
				
			
			changepanel(n,id_site);
			return false;
		}else{
			
			settings.failure && settings.failure(); 
			return false;
		}
				
		
	})
	if(settings.inlineValidation == true){ 		// Validating Inline ?
		
		$(this).not("[type=checkbox]").bind("blur", function(caller){loadValidation(this)})
		$(this+"[type=checkbox]").bind("click", function(caller){loadValidation(this)})
	}
	var buildPrompt = function(caller,promptText,showTriangle) {			// ERROR PROMPT CREATION AND DISPLAY WHEN AN ERROR OCCUR
		var divFormError = document.createElement('div')
		var formErrorContent = document.createElement('div')
		var arrow = document.createElement('div')
		
		
		$(divFormError).addClass("formError")
		$(divFormError).addClass($(caller).attr("id"))
		$(formErrorContent).addClass("formErrorContent")
		$(arrow).addClass("formErrorArrow")

		$("body").append(divFormError)
		$(divFormError).append(arrow)
		$(divFormError).append(formErrorContent)
		
		if(showTriangle == true){		// NO TRIANGLE ON MAX CHECKBOX AND RADIO
			$(arrow).html('<div class="line10"></div><div class="line9"></div><div class="line8"></div><div class="line7"></div><div class="line6"></div><div class="line5"></div><div class="line4"></div><div class="line3"></div><div class="line2"></div><div class="line1"></div>');
		}
		$(formErrorContent).html(promptText)
	
		callerTopPosition = $(caller).offset().top;
		callerleftPosition = $(caller).offset().left;
		callerWidth =  $(caller).width()
		callerHeight =  $(caller).height()
		inputHeight = $(divFormError).height()

		callerleftPosition = callerleftPosition + callerWidth -30
		callerTopPosition = callerTopPosition  -inputHeight -10
	
		$(divFormError).css({
			top:callerTopPosition,
			left:callerleftPosition,
			opacity:0
		})
		$(divFormError).fadeTo("fast",0.8);
	};
	var updatePromptText = function(caller,promptText) {	// UPDATE TEXT ERROR IF AN ERROR IS ALREADY DISPLAYED
		updateThisPrompt =  $(caller).attr("id")
		$("."+updateThisPrompt).find(".formErrorContent").html(promptText)
		
		callerTopPosition  = $(caller).offset().top;
		inputHeight = $("."+updateThisPrompt).height()
		
		callerTopPosition = callerTopPosition  -inputHeight -10
		$("."+updateThisPrompt).animate({
			top:callerTopPosition
		});
	}
	var loadValidation = function(caller) {		// GET VALIDATIONS TO BE EXECUTED
		
		rulesParsing = $(caller).attr('class');
		rulesRegExp = /\[(.*)\]/;
		getRules = rulesRegExp.exec(rulesParsing);
		str = getRules[1]
		pattern = /\W+/;
		result= str.split(pattern);	
		
		var validateCalll = validateCall(caller,result)
		return validateCalll
		
	};
	var validateCall = function(caller,rules) {	// EXECUTE VALIDATION REQUIRED BY THE USER FOR THIS FIELD
		var promptText =""	
		var prompt = $(caller).attr("id");
		var caller = caller;
		var callerName = $(caller).attr("name");
		isError = false;
		callerType = $(caller).attr("type");
		
		for (i=0; i<rules.length;i++){
			switch (rules[i]){
			case "optional": 
				if(!$(caller).val()){
					closePrompt(caller)
					return isError
				}
			break;
			case "required": 
				_required(caller,rules);
			break;
			case "custom": 
				 _customRegex(caller,rules,i);
			break;
			case "length": 
				 _length(caller,rules,i);
			break;
			case "minCheckbox": 
				 _minCheckbox(caller,rules,i);
			break;
			case "confirm": 
				 _confirm(caller,rules,i);
			break;
			default :;
			};
		};
		if (isError == true){
			var showTriangle = true
			if($("input[name="+callerName+"]").size()> 1 && callerType == "radio") {		// Hack for radio group button, the validation go the first radio
				caller = $("input[name="+callerName+"]:first")
				showTriangle = false
				var callerId ="."+ $(caller).attr("id")
				if($(callerId).size()==0){ isError = true }else{ isError = false}
			}
			if($("input[name="+callerName+"]").size()> 1 && callerType == "checkbox") {		// Hack for radio group button, the validation go the first radio
				caller = $("input[name="+callerName+"]:first")
				showTriangle = false
				var callerId ="div."+ $(caller).attr("id")
				if($(callerId).size()==0){ isError = true }else{ isError = false}
			}
			if (isError == true){ // show only one
				($("div."+prompt).size() ==0) ? buildPrompt(caller,promptText,showTriangle)	: updatePromptText(caller,promptText)
			}
		}else{
			if($("input[name="+callerName+"]").size()> 1 && callerType == "radio") {		// Hack for radio group button, the validation go the first radio
				caller = $("input[name="+callerName+"]:first")
			}
			if($("input[name="+callerName+"]").size()> 1 && callerType == "checkbox") {		// Hack for radio group button, the validation go the first radio
				caller = $("input[name="+callerName+"]:first")
			}
			closePrompt(caller)
		}		
		
		/* VALIDATION FUNCTIONS */
		function _required(caller,rules){   // VALIDATE BLANK FIELD
			callerType = $(caller).attr("type")
			
			if (callerType == "text" || callerType == "password" || callerType == "textarea" || callerType == "select"){
				
				if(!$(caller).val()){
					isError = true
					promptText += settings.allrules[rules[i]].alertText+"<br />"
				}	
			}
			if (callerType == "radio" || callerType == "checkbox" ){
				callerName = $(caller).attr("name")
		
				if($("input[name="+callerName+"]:checked").size() == 0) {
					isError = true
					if($("input[name="+callerName+"]").size() ==1) {
						promptText += settings.allrules[rules[i]].alertTextCheckboxe+"<br />" 
					}else{
						 promptText += settings.allrules[rules[i]].alertTextCheckboxMultiple+"<br />"
					}	
				}
			}	
			if (callerType == "select-one") { // added by paul@kinetek.net for select boxes, Thank you
					callerName = $(caller).attr("id");
				
				if(!$("select[name="+callerName+"]").val()) {
					isError = true;
					promptText += settings.allrules[rules[i]].alertText+"<br />";
				}
			}
			if (callerType == "select-multiple") { // added by paul@kinetek.net for select boxes, Thank you
					callerName = $(caller).attr("id");
				
				if(!$("#"+callerName).val()) {
					isError = true;
					promptText += settings.allrules[rules[i]].alertText+"<br />";
				}
			}
		}
		function _customRegex(caller,rules,position){		 // VALIDATE REGEX RULES
			customRule = rules[position+1]
			pattern = eval(settings.allrules[customRule].regex)
			
			if(!pattern.test($(caller).attr('value'))){
				isError = true
				promptText += settings.allrules[customRule].alertText+"<br />"
			}
		}
		function _confirm(caller,rules,position){		 // VALIDATE FIELD MATCH
			confirmField = rules[position+1]
			
			if($(caller).attr('value') != $("#"+confirmField).attr('value')){
				isError = true
				promptText += settings.allrules["confirm"].alertText+"<br />"
			}
		}
		function _length(caller,rules,position){    // VALIDATE LENGTH
		
			startLength = eval(rules[position+1])
			endLength = eval(rules[position+2])
			feildLength = $(caller).attr('value').length

			if(feildLength<startLength || feildLength>endLength){
				isError = true
				promptText += settings.allrules["length"].alertText+startLength+settings.allrules["length"].alertText2+endLength+settings.allrules["length"].alertText3+"<br />"
			}
		}
		function _minCheckbox(caller,rules,position){    // VALIDATE CHECKBOX NUMBER
		
			nbCheck = eval(rules[position+1])
			groupname = $(caller).attr("name")
			groupSize = $("input[name="+groupname+"]:checked").size()
			
			if(groupSize > nbCheck){	
				isError = true
				promptText += settings.allrules["minCheckbox"].alertText+"<br />"
			}
		}
		return(isError) ? isError : false;
	};
	var closePrompt = function(caller) {	// CLOSE PROMPT WHEN ERROR CORRECTED
		closingPrompt = $(caller).attr("id")

		$("."+closingPrompt).fadeTo("fast",0,function(){
			$("."+closingPrompt).remove()
		});
	};
	var submitValidation = function(caller,action) {	// FORM SUBMIT VALIDATION LOOPING INLINE VALIDATION
	if(action != "back"){
		var stopForm = false
		$(caller).find(".formError").remove()
		var toValidateSize = $(caller).find("[class^=validate]").size()
		
		$(caller).find("[class^=validate]").each(function(){
			var validationPass = loadValidation(this)
			return(validationPass) ? stopForm = true : "";	
		});
		if(stopForm){							// GET IF THERE IS AN ERROR OR NOT FROM THIS VALIDATION FUNCTIONS
			destination = $(".formError:first").offset().top;
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 1100)
			return true;
		}else{
			return false
		}
	}
	else
	{
		// desactivation de la verification
						var arrays = new Array();
						arrays[0]="cin";
						arrays[1]="situation_patrimoniale";
						arrays[2]="nombre_enfants";
						arrays[3]="niveau_instruction";
						arrays[4]="categorie_socioprofessionnelle";
						arrays[5]="secteur_activite";
						arrays[6]="statut_conjoint";
						arrays[7]="cadre_travail";
						arrays[8]="voyage_travail";
						arrays[9]="vous_habitez";
						arrays[10]="Vos_revenus_globaux_du_foyer";
						arrays[11]="vehicules_automobiles";
						arrays[12]="materiel_informatique";
						arrays[13]="connexion_internet";
						arrays[14]="bancarises";
						arrays[15]="assurances";
						arrays[16]="centres_interet";
						arrays[17]="connaissance_site";
						arrays[18]="participer_reunions";
						arrays[19]="creation_entreprise";
						arrays[20]="secteurs_activite_investir";
						arrays[21]="accompagner";
						arrays[22]="situation_matrimoniale";
						for (i=0;i<arrays.length;i++)
						{
							$("#"+arrays[i]).removeClass("validate[required]");
							//console.log($("#"+array[i]));
							
						}
						$(".formError").remove();
						return false;
	}	
	};
};