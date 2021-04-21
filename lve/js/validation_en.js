	$(document).ready(function () {	
		$("#frm").submit(function(){
		var error="* Please enter the following fields : <br />", e=0;
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
		  error+=" <br />* The field "+$(this).attr("title")+" must contain only numbers";
			$(".numerique").addClass("req");
			e++;
		  }
		});
		
		
		$(".Email").each(function(){
			var reg = /^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$/;
			if((!reg.test($(this).val())) && $(this).val()!=""){
			  error+="<br />* Field format "+$(this).attr("title")+" is invalid ";
				$("#Email").addClass("req");
				e++;
			}
		});

		$(".url").each(function(){
			var reg = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
			if((!reg.test($(this).val())) && $(this).val()!=""){
			  error+="<br />* Field format "+$(this).attr("title")+" is invalid ";
				$("#Email").addClass("req");
				e++;
			}
		});

		if(e!=0){
		$(".error").html(error);
		$(".error").show('slow');
		return false;
		}
	});
	
	
					//$('.date').datePicker({startDate:'01/01/1900'});
});
