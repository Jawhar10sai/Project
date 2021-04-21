	var etapePoll = 0;
	var globalPollID = '';
	
	function showPoll(pollID,divID,ordre,show,idsite,filtre,theme){
		globalPollID = pollID;
		globalDivID = divID;
		
		
		
			$("div#"+divID+" .pollAjaxLoader").show(); //show the ajax loader
			$.ajax({  
				type: "POST",  
				url: "../functions/functions_sondage.php",  
				data: {pollID : pollID,show:show,ordre:ordre,idsite:idsite,filtre:filtre,theme:theme,action: "show" },
				success: function(theResponse) {
					if(theResponse == 'voted'){
						
						$("#voted").dialog('open');
						$("div#"+divID+" .pollAjaxLoader").hide(); 
						}else{
				$("div#"+divID+" .pollAjaxLoader").hide(); //hide the ajax loader again
				
				
					if(filtre > 0){
				$('div#'+divID+' div.SondageFiltre').html(theResponse);
					}else{
				$('div#'+divID+' div.Sondage').html(theResponse);
						}	
						
				etapePoll++;	
					
			$("div#"+divID+" .pollAjaxLoader").hide(); //show the ajax loader
				}  }  
			});  

	
		}
		
		
		function showPollResult(pollID){

			$.ajax({  
				type: "POST",  
				url: "../functions/functions_sondage.php",  
				data: { pollID : pollID, action: "showVote" },
				success: function(theResponse) {
						var numberOfAnswers 		= (theResponse).split("-").length-2;//calculate the number of answers
						var splittedResponse 		= (theResponse).split("-");
						var pollAnswerTotalPoints 	= splittedResponse[numberOfAnswers+1];
	
						for (i=0;i<=numberOfAnswers;i++)
						{
							var splittedAnswer 		= (splittedResponse[i]).split("|");
							var pollAnswerID 		= (splittedAnswer[0]);
							var pollAnswerPoints 	= (splittedAnswer[1]);
							var pollAnswerColor 	= (splittedAnswer[2]);
							var pollPercentage		= (100 * pollAnswerPoints / pollAnswerTotalPoints);
							$(".pollChart" + pollAnswerID).css("border-color","#ccc");
							$(".pollChart" + pollAnswerID + " span").css("background-color",pollAnswerColor);
							$(".pollChart" + pollAnswerID + " span").width('0');
							$(".pollChart" + pollAnswerID + " span").animate({width:pollPercentage + "%"});
							if(pollAnswerPoints > 1){
							$("#pollAnswer" + pollAnswerID).html(" (" + Math.round(pollPercentage) + "% - " + pollAnswerPoints + " votes)");
							}else{
							$("#pollAnswer" + pollAnswerID).html(" (" + Math.round(pollPercentage) + "% - " + pollAnswerPoints + " vote)");
								}
							$("#pollRadioButton" + pollAnswerID).attr("disabled", "disabled"); //disable the radio buttons
						}
						$(".pollAjaxLoader").hide(); //hide the ajax loader again
						$("#pollSubmit").attr("disabled", "disabled"); //disable the submit button
					
				}  
			});  
			return false; 
	
	
		
		
	
	
			}
		
		
	


$(document).ready(function() {   

	$(".pollAjaxLoader").hide(); //hide the ajax loader
	$("#pollMessage").hide(); //hide the ajax loader
	
	//show
	$(document).on("click", "#pollConnect", function(){ 
	$("#Espace_Securise_Sondage").dialog('open');
			return false; 
	});

		$(document).on("click", "#pollSubmit", function(){ 
		var pollAnswerVal = $('input:radio[name=pollAnswerID]:checked').val();//Getting the value of a selected radio element.
		var pollID =  $(this).parent().attr('id').replace('Question_','');
		var type =  $(this).attr('data-type');
		var secure =  $(this).attr('data-secure');
		var me = $(this);
		
		
		
		if ($('input:radio[name=pollAnswerID]:checked').length) {
			me.parent().find(".pollAjaxLoader").show(); //show the ajax loader
			$.ajax({  
				type: "POST",  
				url: "../functions/functions_sondage.php",  
				data: { pollAnswerID: pollAnswerVal,pollID : pollID, action: "vote",type:type,secure:secure,idQuestion:pollID },
				success: function(theResponse) { 
				
				
					if (theResponse == "voted") { 
						me.parent().find(".pollAjaxLoader").hide(); //hide the ajax loader
						$("#pollMessage").html("Désolé, vous avez déjà voté.").fadeTo("slow", 1);
						
					} else {
						var numberOfAnswers 		= (theResponse).split("-").length-2;//calculate the number of answers
						var splittedResponse 		= (theResponse).split("-");
						var pollAnswerTotalPoints 	= splittedResponse[numberOfAnswers+1];
	
						for (i=0;i<=numberOfAnswers;i++)
						{
							var splittedAnswer 		= (splittedResponse[i]).split("|");
							var pollAnswerID 		= (splittedAnswer[0]);
							var pollAnswerPoints 	= (splittedAnswer[1]);
							var pollAnswerColor 	= (splittedAnswer[2]);
							var pollPercentage		= (100 * pollAnswerPoints / pollAnswerTotalPoints);
							$(".pollChart" + pollAnswerID).css("border-color","#ccc");
							$(".pollChart" + pollAnswerID + " span").css("background-color",pollAnswerColor);
							$(".pollChart" + pollAnswerID + " span").width('0');
							$(".pollChart" + pollAnswerID + " span").animate({width:pollPercentage + "%"});
							if(pollAnswerPoints > 1){
							$("#pollAnswer" + pollAnswerID).html(" (" + Math.round(pollPercentage) + "% - " + pollAnswerPoints + " votes)");
							}else{
							$("#pollAnswer" + pollAnswerID).html(" (" + Math.round(pollPercentage) + "% - " + pollAnswerPoints + " vote)");
								}
							$("#pollRadioButton" + pollAnswerID).attr("disabled", "disabled"); //disable the radio buttons
						}
						me.parent().find(".pollAjaxLoader").hide(); //hide the ajax loader again
						$("#pollSubmit").attr("disabled", "disabled"); //disable the submit button
					}
				}  
			});  
			return false; 
	
	
		
		} else {
			$("#pollMessage").html("Veuillez sélectionner une réponse").fadeTo("slow", 1, function(){
				setTimeout(function() {
					$("#pollMessage").fadeOut("slow");
				}, 3000);																		 
			});
			return false;
		}
	
	});
	
	$(document).on("click", ".send", function(){ 

	var me =$(this);
	var pollID =  $(this).attr('id').replace('pollSubmitMultiple','');
		
		
	$(this).parent().find( "ul#Question_"+pollID ).each(function() {
		
		var me2 = $(this);
		
		 if(me.attr('data-option') == "checkbox"){
			 
		var pollAnswerVal = ""; 
		var pollAnswerValText = "";
		$(this).find("input[type='checkbox']:checked").each(
          function() {
           pollAnswerVal = pollAnswerVal + $(this).val() + ",";
		   pollAnswerValText = pollAnswerValText + $(this).parent().find('textarea').val() + ",";
          });   
		  
			 }else{
		var pollAnswerVal = $(this).find("input:radio:checked").val();//Getting the value of a selected radio element.
		//var pollID =  $(this).attr('id').replace('Question_','');
		var pollAnswerValText = $(this).find("input:radio:checked").parent().find('textarea').val();
		
		
			 }   
		
		
	
		if ($(this).find('input:radio:checked').length || $(this).find("input[type='checkbox']:checked").length>0) {
			$("#pollAjaxLoader"+pollID).show(); //show the ajax loader
			
			$.ajax({  
				type: "POST",  
				url: "../functions/functions_sondage.php",  
				data: { pollAnswerID: pollAnswerVal,pollID : pollID, action: "vote",idQuestion:pollID,pollAnswerValText:pollAnswerValText,pollOption:me.attr('data-option') },
				success: function(theResponse) { 
					if (theResponse == "voted") { 
						$("#pollAjaxLoader"+pollID).hide(); //hide the ajax loader
						$("#pollMessage"+pollID).html("Désolé, vous avez déjà voté.").fadeTo("slow", 1);
						
					} else {
						var numberOfAnswers 		= (theResponse).split("-").length-2;//calculate the number of answers
						var splittedResponse 		= (theResponse).split("-");
						var pollAnswerTotalPoints 	= splittedResponse[numberOfAnswers+1];
	
						for (i=0;i<=numberOfAnswers;i++)
						{
							var splittedAnswer 		= (splittedResponse[i]).split("|");
							var pollAnswerID 		= (splittedAnswer[0]);
							var pollAnswerPoints 	= (splittedAnswer[1]);
							var pollAnswerColor 	= (splittedAnswer[2]);
							var pollPercentage		= (100 * pollAnswerPoints / pollAnswerTotalPoints);
							$(".pollChart" + pollAnswerID).css("border-color","#ccc");
							$(".pollChart" + pollAnswerID + " span").css("background-color",pollAnswerColor);
							$(".pollChart" + pollAnswerID + " span").width('0');
							$(".pollChart" + pollAnswerID + " span").animate({width:pollPercentage + "%"});
							if(pollAnswerPoints > 1){
							$("#pollAnswer" + pollAnswerID).html(" (" + Math.round(pollPercentage) + "% - " + pollAnswerPoints + " votes)");
							}else{
							$("#pollAnswer" + pollAnswerID).html(" (" + Math.round(pollPercentage) + "% - " + pollAnswerPoints + " vote)");
								}
							$("#pollRadioButton" + pollAnswerID).attr("disabled", "disabled"); //disable the radio buttons
						}
						$("#pollAjaxLoader"+pollID).hide(); //hide the ajax loader again
						$("#pollSubmitMultiple"+pollID).attr("disabled", "disabled"); //disable the submit button
					}
			return false;
				}  
			});  
	
		
		} else {
			$(this).parent().find("#pollMessage"+pollID).html("Veuillez sélectionner une réponse").fadeTo("slow", 1, function(){
				setTimeout(function() {
			$("#pollMessage"+pollID).fadeOut("slow");
				}, 3000);																		 
			});
			return false;
		}
	
	
});

			return false;
	});
	
	
	$(document).on("click", "#pollSubmitEtap", function(){
		
		var idsite = $(this).attr('data-idsite');
		var filtre = $(this).attr('data-filtre');
		var type =  $(this).attr('data-type');
		var secure =  $(this).attr('data-secure');
		var idDiv =  $(this).parent().parent().parent().parent().attr('id');
		
		var me = $(this);
		 
		var pollAnswerVal = $('input:radio[name=pollAnswerID]:checked').val();//Getting the value of a selected radio element.
		var pollID =  $(this).parent().attr('data-idSondage');
		var pollIDquestion =  $(this).parent().attr('id').replace('Question_','');
		
		
		
		if ($('input:radio[name=pollAnswerID]:checked').length) {
			me.parent().find(".pollAjaxLoader").show(); //show the ajax loader
			$.ajax({  
				type: "POST",  
				url: "../functions/functions_sondage.php",  
				data: { pollAnswerID: pollAnswerVal,pollID : pollID, action: "vote",type:type,secure:secure,idQuestion:pollIDquestion  },
				success: function(theResponse) { 
				//alert(pollIDquestion);
					if (theResponse == "voted") { 
						me.parent().find(".pollAjaxLoader").hide(); //hide the ajax loader
						$("#pollMessage").html("Désolé, vous avez déjà voté.").fadeTo("slow", 1);
					//showPoll(globalPollID,globalDivID,etapePoll,'1',idsite,filtre)
					} else {
					
				//alert(pollID);
					showPoll(pollID,idDiv,etapePoll,'1',idsite,filtre)
					
					}
				}  
			});  
			return false; 
	
	
		
		} else {
			$("#pollMessage").html("Veuillez sélectionner une réponse").fadeTo("slow", 1, function(){
				setTimeout(function() {
					$("#pollMessage").fadeOut("slow");
				}, 3000);																		 
			});
			return false;
		}
	
	
		
		});
	
$("#voted").dialog({
		autoOpen: false,
		height: 100,
		width: 300,
		modal: true,
		draggable:false,
		buttons: {		
			"Retour"	: function() {window.history.back();
			}	
		},
		open: function(event, ui){},
		close: function() {window.history.back();
		}
	});	
	
	$(document).on("click", "#pollWrap input[type:radio]", function(){
		if($(this).attr('class') == "show_other"){
				$('#pollWrap').find('textarea').hide();
			$(this).parent().find('textarea').show();
			}else{
				$('#pollWrap').find('textarea').hide();
				}
		
		
	});
//#pollWrap .show_other
});