	$(document).ready(function () {	
		$("#frm").submit(function(){
		var error="* Veuillez saisir les champs suivants : ", e=0;
		$(".required").removeClass("req");
		$(".required").each(function(){
			if($(this).val()==""){
				error+=$(this).attr("title")+" ,";
				$(this).addClass("req");
				e++;
			}
		});
		
		$(".numerique").each(function(){
		var reg = /^[0-9][0-9]*$/;
		if((!reg.test($(this).val())) && $(this).val()!=""){
		  error+="* Le champ "+$(this).attr("title")+" ne doit contenir que des chiffres";
			$(".numerique").addClass("req");
			e++;
		  }
		});
		
		
		$(".Email").each(function(){
			var reg = /^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$/;
			if((!reg.test($(this).val())) && $(this).val()!=""){
			  error+="* Format du champ "+$(this).attr("title")+" invalide ";
				$("#Email").addClass("req");
				e++;
			}
		});

		$(".url").each(function(){
			var reg = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
			if((!reg.test($(this).val())) && $(this).val()!=""){
			  error+="* Format du champ "+$(this).attr("title")+" invalide ";
				$("#Email").addClass("req");
				e++;
			}
		});

		if(e!=0){
		alert(error);
		//$(".error").show('slow');
		return false;
		}
	});
	
	
					//$('.date').datePicker({startDate:'01/01/1900'});
});
