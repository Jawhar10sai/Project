<html>
<head>
<title>VEX | ETAT DECLARATION TEST</title>
<script language="javascript">

function loadXMLDoc(value)
{

url="http://46.18.132.236:8088/wsdeclaration/etatExpedition/etat/"+value;

var xmlhttp;
var txt,x,xx,i;
if (window.XMLHttpRequest){
  // code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	
  }else{
  // code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }


xmlhttp.onreadystatechange=function(){
txt="<table border='1'><tr><th>declaration</th><th>statut</th><th>depuis le</th><th>lieu</th><th>livreur</th><th>Tel</th></tr>";
 if (xmlhttp.readyState==4 && xmlhttp.status==200){
	xmlDoc=xmlhttp.responseXML;
	txt+="<tr>";
	
    txt+="<td>" + xmlDoc.getElementsByTagName("DECLARATION")[0].childNodes[0].nodeValue + "</td>";
	txt+="<td>" + xmlDoc.getElementsByTagName("STATUT")[0].childNodes[0].nodeValue + "</td>";
	txt+="<td>" + xmlDoc.getElementsByTagName("DEPUIS")[0].childNodes[0].nodeValue + "</td>";
	txt+="<td>" + xmlDoc.getElementsByTagName("LIEU")[0].childNodes[0].nodeValue + "</td>";
	txt+="<td>" + xmlDoc.getElementsByTagName("LIVREUR")[0].childNodes[0].nodeValue + "</td>";
	//txt+="<td>" + xmlDoc.getElementsByTagName("TEL")[0].childNodes[0].nodeValue + "</td>";
	
     
	
	
	
	
	
	txt+="</tr>"
  }
  else{
	txt=txt+"<td>Error making Ajax request:" + 
        "\n\nServer status:\n" + xmlhttp.readyState + " |" + xmlhttp.status + 
        "\n\nServer response XML:\n" + xmlhttp.responseXML+"</td>";

  }
  txt=txt + "</table>";
  document.getElementById('resultat').innerHTML=txt;
 // alert(xmlhttp.status);
 }
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
//alert(url);
}
</script>
</head>
<body>
A0277859
<?php
$srv="46.18.132.236";
if(@fsockopen($srv, 8088, $errno, $errstr, 30)) {
    echo("connexion vers $srv ok");
} else {
    echo("connexion vers $srv impossible");
}
?>


<form name="maform" id="maform" action="" method="GET">
	<label> DECLARATION <label>
	
	<input type="text" name="mndeclaration" id="ndeclaration" />
	
	<input type="button" value="valider" onclick="javascript:loadXMLDoc(document.getElementById('ndeclaration').value);" id="btValider"/>



<div id="resultat"></div>

</form>
</body>
</html>