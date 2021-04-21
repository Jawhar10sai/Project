	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("auto/rpc.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function lookup2(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions2').hide();
		} else {
			$.post("auto/rpc2.php", {queryString2: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions2').show();
					$('#autoSuggestionsList2').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
	function fill2(thisValue) {
		$('#inputString2').val(thisValue);
		setTimeout("$('#suggestions2').hide();", 200);
	}
	
	
	function lookup3(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions3').hide();
		} else {
			$.post("auto/rpc3.php", {queryString3: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions3').show();
					$('#autoSuggestionsList3').html(data);
				}
			});
		}
	} // lookup
	
	function lookup4(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions4').hide();
		} else {
			$.post("auto/rpc4.php", {queryString4: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions4').show();
					
					$('#autoSuggestionsList4').html(data);
				}
			});
		}
	} // lookup
	
	function fill3(thisValue) {
		$('#inputString3').val(thisValue);
		setTimeout("$('#suggestions3').hide();", 200);
	}
	function fill4(thisValue) {
		$('#inputString4').val(thisValue);
		setTimeout("$('#suggestions4').hide();", 200);
	}
	
function calculeOffsetLeft(r){
  return calculeOffset(r,"offsetLeft")
}
function calculeOffsetTop(r){
  return calculeOffset(r,"offsetTop")
}
function calculeOffset(element,attr){
  var offset=0;
  while(element){
    offset+=element[attr];
    element=element.offsetParent
  }
  return offset
}
function setpos(w,x,y){
	document.getElementById(w).style.top=y+"px";
	document.getElementById(w).style.left=x+"px";
}
function calcule(to){
//alert(to);
//f=document.getElementById('search_form');
f=document.getElementById('dev');
//f.action="<?=$_SERVER['PHP_SELF']?>?action=search";
f.submit();
}
function enabl(s){
f=document.getElementById('search_form');
//alert(s);
if(s=='aller_retour'){
	f.Jourr.disabled=false;
	f.Moisr.disabled=false;
	f.Anneer.disabled=false;
}
else{

	f.Jourr.disabled=true;
	f.Moisr.disabled=true;
	f.Anneer.disabled=true;
}

}
function enabl2(s){
/**///alert(s);
if(s=='exist'){
document.getElementById('exist').style.display='block';
document.getElementById('inexist').style.display='none';
}
else{
document.getElementById('inexist').style.display='block';
document.getElementById('exist').style.display='none';
}

}

function doSub(){
f=document.getElementById('search_form');
if(f.inputStringe.value){
	f.inputString.value=f.inputStringe.value;
	f.inputString2.value=f.inputStringe2.value;
}
else{
	f.inputString.value=f.inputStringo.value;
	f.inputString2.value=f.inputStringo2.value;
}
f.submit();

}
