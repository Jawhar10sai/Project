<? 

if($_GET['a']=='d'){
setcookie("CarteVisite_Username");
setcookie("CarteVisite_password");
session_start() ;
$_SESSION[]="";
session_unset();
session_destroy();
}
session_start() ;

if($_GET['lang']==""){
?>
<script type="text/javascript" language="JavaScript1.2">
<!-- Begin
if (navigator.appName == 'Netscape')
var language = navigator.language;
else
var language = navigator.browserLanguage;

// Modify the .html pages, can be either file.html or, http://www.domain

if (language.indexOf('fr') > -1) document.location.href = '<?=$_SERVER['PHP_SELF']?>?lang=fr&start=<?=$_GET['start']?>';
else if (language.indexOf('de') > -1) document.location.href = '<?=$_SERVER['PHP_SELF']?>?lang=de&start=<?=$_GET['start']?>';
else if (language.indexOf('es') > -1) document.location.href = '<?=$_SERVER['PHP_SELF']?>?lang=es&start=<?=$_GET['start']?>';
else if (language.indexOf('it') > -1) document.location.href = '<?=$_SERVER['PHP_SELF']?>?lang=it&start=<?=$_GET['start']?>';
/*else if (language.indexOf('fr') > -1) document.location.href = 'french.html';
else if (language.indexOf('nl') > -1) document.location.href = 'dutch.html';
else if (language.indexOf('ja') > -1) document.location.href = 'japanese.html';
else if (language.indexOf('pt') > -1) document.location.href = 'portuguese.html';
else if (language.indexOf('sv') > -1) document.location.href = 'swedish.html';
else if (language.indexOf('zh') > -1) document.location.href = 'chinese.html';
*/else
document.location.href = '<?=$_SERVER['PHP_SELF']?>?lang=en&start=<?=$_GET['start']?>';
// End -->
</script>
<? }

$_SESSION['lang']=$_GET['lang'];

$_SESSION['lang'] ? $lg=$_SESSION['lang']:$lg="fr";

include('lang'.$lg.'.inc');
include('compteur.php');
include('connect.php');
include "compt2.php";

include("class_visitor/count_visitors_class.php"); //classes is the map where the class file is stored

 //create a new instance of the count_visitors class.
$my_visitors = new Count_visitors; 

$my_visitors->delay = 24; // how often (in hours) a visitor is registered in the database (default = 1 hour)
$my_visitors->insert_new_visit(); // That's all, the validation is with this method, too.

//error_reporting(E_ALL);
//include('scompteur.php');
function noRepeat( $str, $maxRepeat = 3) 
{
    $alpha = 'abcdefghijklmnopqrstuvwxyz';
    $search = array();
    $replace = array();

    for($i=0,$len=strlen($alpha);$i<$len;++$i) 
    {
        $search[] = '~'.$alpha[$i].'{'.$maxRepeat.',}~i';
        $replace[] = $alpha[$i];
    }

    return preg_replace( $search, $replace, $str);
} 


$d = dir("miniatures"); 
//echo "Pointeur: ".$d->handle."<br>\n"; 
//echo "Chemin: ".$d->path."<br>\n"; 
$_POST['start'] == '' ? $start=$_GET['start'] : $start=$_POST['start'];
$cpt=0;
if ($start == '') $start=0 ;
$nbrlng=2;
$imgParLng=2;
	while($entry = $d->read()) { 
		if ($entry!='.' && $entry!='..' && $entry!='Thumbs.db') {
		$imgTab[]  = filemtime("miniatures/".$entry)."___".$entry;
		}
	} 
	 
	       //$nav = "<table><tr>";
		   $nav = '<DIV class=navigation style="MARGIN-TOP: 10px; MARGIN-BOTTOM: 10px" align=center>';
		   $numPages=intval(count($imgTab)/($imgParLng*$nbrlng));
      // Can we have a link to the previous page?

      for($i = 1; $i < $numPages+1; $i++)
      {
        if($start == ($i-1)*($imgParLng*$nbrlng))
        {
          // Bold the page and dont make it a link
          //$nav .= " <td class='unlinked'>$i</td><td class='space'></td>";
           $nav .= " <span>$i</span>&nbsp;";
       }
        else if ( ($i%50==0) || ( ( $i < ($start/($imgParLng*$nbrlng))+5 ) && ($i>($start/($imgParLng*$nbrlng))) ) || $i==1|| $i==$numPages )
        {
          // Link the page
		  $p=($i-1)*($imgParLng*$nbrlng);
//		  $nav .= "<td class='linked' onmouseover=\"this.className='unlinked';\" onmouseout=\"this.className='linked';\"><a id='page' href=".$_SERVER['PHP_SELF']."?start=$p&lang=$lg>$i</a></td><td class='space'></td>";
		  		  $nav .= "<a href=".$_SERVER['PHP_SELF']."?start=$p&lang=$lg>$i</a>&nbsp;";
          // " <a href='$PHP_SELF?".$charpass."=".$passparam."&".$charpass1."=".$passparam1."&".$charpass2."=".$passparam2."&".$charpass3."=".$passparam3."&".$charpass4."=".$passparam4."&".$charpass5."=".$passparam5."&".$charpass6."=".$passparam6."&".$charpass7."=".$passparam7."&page=$i'>$i</a> |";
        }
      }
//$nav.="</tr></table>";
$nav.="</div>";
      
      
	 
	 array_multisort($imgTab,SORT_DESC);
	 //print_r($imgTab);
	  
					$random = rand(0,10);
					$img=split('___',$imgTab[$random]);
					$_SESSION['default'] = $img[1];
					$def=$_SESSION['default'];
$d->close(); 

//include('ccompteur.php');
//error_reporting(E_WARNING);
?>
<html>
<head>
<LINK REL="SHORTCUT ICON" HREF="http://www.cartevisite.org/favicon.ico";>
<meta name="verify-v1" content="2Cmv1GBP3lNZgCXBvBDXS226O1wMW4EjacY7+lQQOMU=" /> 
<meta name="google-site-verification" content="EYlSkZvR8chPMiuFpk3TMgTf5m7DM7hDlpEDsX6Dvt8" />
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta name="Classification" content="internet,image,logiciel, creation">
<meta name="author" content="http://www.softsevenart.com">
<meta http-equiv="Reply-to" content="info@softsevenart.com">
<meta http-equiv="expires" content="wed, 30 sept 1999 12:00:00 gmt">
<meta http-equiv="content-language" content="FR, EN, DE, JP, RU, IT, ES, CN ">
<meta name="language" content="fr,en, de, jp, ru">
<meta name="robots" content="index, follow, all">
<meta name="revisit-after" content="3 days">
<meta name="distribution" content="global">
<meta name="robots" content="all">
<meta name="coverage" content="worldwide">
<meta name="identifier-URL" content="http://www.cartevisite.org">
<meta name="abstract" content="Notre studio vous permettra de disposer facilement,  la souris, texte, images, couleur, police, etc... Il dispose d'une base de modeles et d'images a votre disposition et permet aussi de telecharger vos logos, Gratuitement.">
<meta name="keywords" content="carte visite,business card, Biglietti da visita ,tarjeta de visita,Visitenkarten , gratis, gratuit,gratuitamente,  publicite, communication, internet, agence communication, informatiques, reseaux, realisation de logo, informatique , communication , informatique, referencement, etude de marche, flyers, impression, mailing, plaquette commerciales, agence de communication, informatique ,creation logiciel, logiciel, industrie, decolletage, impression, imprimerie, offset, carte de visite, papier en tete, papier enetete, flyer publicitaire, flyers, carte de membre, cartes de membres, impression document"> 
<meta name="category" content="internet,image,logiciel, creation">
<meta name="date-creation-yyyymmdd" content="20061225">
<meta name="distribution" content="global">
<!-- Web Sites Submitted: AltaVista, Excite, Yahoo, HotBot, Infoseek, Lycos, Webcrawler, ComFind, Netscape Search, Northern Light, Planet Search, Pronet, The Yellowpages, AOL NetFind, Wanadoo, Voila, Google -->
<base target="_top">
<title>Cartevisite.org - cr&eacute;er sa carte de visite gratuit, business card, Biglietti da visita ,tarjeta de visita, Visitenkarten , Geschäftskarte</title>
<meta name="author" content="softsevenart.com">
<meta name="description" content="Notre studio vous permettra de disposer facilement,  la souris, texte, images, couleur, police, etc... Il dispose d'une base de modeles et d'images a votre disposition et permet aussi de telecharger vos logos, Gratuitement.">
<meta name="keywords" content="cartes de visitebusiness card,,Biglietti da visita ,tarjeta de visita,Visitenkarten , gratis, gratuit,gratuitamente,  publicite, communication, internet, agence communication, informatiques, reseaux, realisation de logo, informatique , communication , informatique, referencement, etude de marche, flyers, impression, mailing, plaquette commerciales, agence de communication, informatique ,creation logiciel, logiciel, industrie, decolletage, impression, imprimerie, offset, carte de visite, papier en tete, papier enetete, flyer publicitaire, flyers, carte de membre, cartes de membres, impression document">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--<script language="JavaScript" type="text/JavaScript" src="../jscript/test.js"></script>
<script language="JavaScript" src="jscript/input.js"></script>
<script language="JavaScript" src="jscript/galerie.js"></script>
-->
<!--<script language="JavaScript" src="jscript/popupimg.js" type="text/JavaScript"></script>
<script language="JavaScript" src="jscript/top.js" type="text/JavaScript"></script>
-->
<SCRIPT LANGUAGE="Javascript" SRC="jscript/ColorPicker2.js"></SCRIPT>
<SCRIPT LANGUAGE="Javascript" SRC="jscript/AnchorPosition.js"></SCRIPT>
<SCRIPT LANGUAGE="Javascript" SRC="jscript/PopupWindow.js"></SCRIPT>
<!--<script type="text/javascript" src="jscript/ajax.js"></script>
-->
<script type="text/javascript" src="switchcontent.js" ></script>
<SCRIPT LANGUAGE="JavaScript">
var cp = new ColorPicker('window'); // Popup window
var cp2 = new ColorPicker(); // DIV style
</SCRIPT>
<script language="javascript">
/*function Send()
{
	if (src!=''){
	document.getElementById(pre).style.src = 'modeles/'+src+'';
	document.getElementById(preview).style.display='';
	}
	else{	
	document.getElementById(preview).style.display='none';
	}
//alert(src);

}
*/
var rep;
var rep2;

function handleHttpResponse() {
  if (xmlhttp.readyState == 4) {	
  	rep=xmlhttp.responseText;
	//alert(rep);
  	if(rep)
  		{eval(rep);}
  	else{//document.getElementById('text').innerHTML=xmlhttp.responseText;
	}
    }
 else
   {
	//document.getElementById('text').innerHTML=
        //"En cours...";
   }
}


function sendData(method, url, data)
 {//alert("ok");
  if(window.XMLHttpRequest) // Firefox
      xmlhttp = new XMLHttpRequest();
   else if(window.ActiveXObject) // Internet Explorer
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   else { // XMLHttpRequest non support par le navigateur
      alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
      return;
   }

    if(method == "GET")
     {
     if(data == 'null')
     {
            xmlhttp.open("GET", url, true); //ouverture asynchrone
     }
     else
     {
 xmlhttp.open("GET", url+"?"+data, true);
     }
        xmlhttp.send(null);
     }

     else if(method == "POST")
     {
        xmlhttp.open("POST", url, true); //ouverture asynchrone
        xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
     xmlhttp.send(data);
     }
	  xmlhttp.onreadystatechange = handleHttpResponse;
    return true;
 }
 
function handleHttpResponse2() {
  if (xmlhttp.readyState == 4) {	
  	rep2=xmlhttp.responseText;
	//alert(rep);
  	if(rep2)
  		{eval(rep2);}
  	else{//document.getElementById('text').innerHTML=xmlhttp.responseText;
	}
    }
 else
   {
	//document.getElementById('text').innerHTML=
        //"En cours...";
   }
}

 function sendData2(method, url, data)
 {//alert("ok");
  if(window.XMLHttpRequest) // Firefox
      xmlhttp = new XMLHttpRequest();
   else if(window.ActiveXObject) // Internet Explorer
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   else { // XMLHttpRequest non support par le navigateur
      alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
      return;
   }

    if(method == "GET")
     {
     if(data == 'null')
     {
            xmlhttp.open("GET", url, true); //ouverture asynchrone
     }
     else
     {
 xmlhttp.open("GET", url+"?"+data, true);
     }
        xmlhttp.send(null);
     }

     else if(method == "POST")
     {
        xmlhttp.open("POST", url, true); //ouverture asynchrone
        xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
     xmlhttp.send(data);
     }
	  xmlhttp.onreadystatechange = handleHttpResponse2;
    return true;
 }


function verif_formulaire(src,start,type)

{
var valid;
var valideFaceBook;
if (type=='valide')
valid="ok";
if (type=='valideFaceBook')
valideFaceBook='ok'
  
 /*   if(document.form2.adress.value == "")  {
   alert("Veuillez entrer votre adresse!");
   document.form2.adress.focus();
   return false; 
  }
  
  
   if(document.form2.ville.value == "")  {
   alert("Veuillez entrer votre ville!");
   document.form2.ville.focus();
   return false; 
  }
  
 
 if(document.form2.tel.value == "")  {
   alert("Veuillez entrer votre numero de telephone!");
   document.form2.tel.focus();
   return false; 
  }
  
   if(document.form2.gsm.value == "")  {
   alert("Veuillez entrer votre numero de mobile!");
   document.form2.mobile.focus();
   return false; 
  }
  
   if(document.form2.email.value == "")  {
   alert("Veuillez entrer votre adresse email!");
   document.form2.email.focus();
   return false; 
  }
  
*/
var form=document.getElementById("form2");
var ali="";
for (i = 0; i < form.elements.length; i++) {
			
		if (form.elements[i].type == "radio") {
				
			if (form.elements[i].checked)  
			{
			   ali+="&"+form.elements[i].name+"="+form.elements[i].value
				//alert(ali);
				//form.elements[i].style.border = 'solid red 2px';				
	  			//return form.elements[i].focus();
			}				
		}
	}		


		//alert(document.getElementById("Ralign1").value);
		//document.getElementById("pre").width="180px";
		//document.getElementById("pre").height="180px";
		document.getElementById("pre").src='images/loading1.gif';
		//document.getElementById(pre).style.src = 'modeles/'+src+'';
		document.getElementById("ok").style.display='none';
		document.getElementById("no").style.display='none';
		document.getElementById("form2").start.value=start;
		
		if(src!=''){document.getElementById("form2").modele.value=src;}else{document.getElementById("form2").modele.value='<?=$def?>'}
		document.getElementById("form2").method="post"
		document.getElementById("form2").action="ajax.php";
		//document.getElementById("form2").submit();
	    
		return !sendData(
       'POST',
       'ajax.php',
       'xmlhttp=1&'+'modele='+document.getElementById('modele').value+'&'+'raison='+document.getElementById('raison').value+'&'+'color2='+document.getElementById("color2").value+'&'+'font='+document.getElementById('font').value+'&'+'titre='+document.getElementById('titre').value+'&'+'nom='+document.getElementById('nom').value+'&'+'prenom='+document.getElementById('prenom').value+'&'+'gsm='+document.getElementById('gsm').value+'&'+'email='+document.getElementById('email').value+'&'+'adress='+document.getElementById('adress').value+'&'+'tel='+document.getElementById('tel').value+'&'+'lang='+document.getElementById('lang').value+'&'+'site='+document.getElementById('site').value+'&'+'ville='+document.getElementById('ville').value+'&'+'valid='+valid+'&'+'valideFaceBook='+valideFaceBook+ali);
}
function sendmod(){
	//	document.getElementById("modform").target="UploadTarget1"
   var photo=document.getElementById("modform").modelep.value;
   var ext=(photo.substr(photo.indexOf(".")+1,photo.indexOf(".")+3)).toLowerCase();
   if(photo!="" && ext!="jpg"){
	    alert("Desolé, mais le format *."+ext+" de l'image n'est pas pris en charge.\nSeul le format *.jpg est supporté.")
   } 
	else
	{
		document.getElementById("modform").subt.disabled=true;
        document.getElementById("modform").subt.value='Veuillez patientez...';
	
		document.getElementById("modform").action="ajax.php";
		//document.getElementById("modform").action="ajax.php";
		document.getElementById("modform").submit();
	}
}


function refresh_counter(){
sendData2('POST','refresh.php','xmlhttp=1');
setTimeout("refresh_counter()",5000);

}
	function init() {
    var elts = Form.getElements('formulaire_1');
   	     
  	elts.each(function(node){
		    switch (node.type) {
          /*case 'checkbox': 
              Event.observe(node, 'click', VerifAndWriteCheckBoxPrototype);
              break;
          case 'text': 
              Event.observe(node, 'keyup', VerifAndWriteTextePrototype);
              Event.observe(node, 'focus', VerifAndWriteTextePrototype);
              break;
          case 'textarea':
              Event.observe(node, 'keyup', VerifAndWriteTextePrototype);
              Event.observe(node, 'focus', VerifAndWriteTextePrototype); 
              break;
          case 'button':
              Event.observe(node, 'click', SubmitFormulaire);
              break; 
          case 'select-one':
              Event.observe(node, 'blur', VerifAndWriteSelectPrototype);
              break;*/
          case 'radio': 
              Event.observe(node, 'click', VerifAndWriteRadioPrototype);
              break;
          default:
              //alert('type de champ de formulaire inconnu'+node.name+'|'+node.type);
              break;
        }
			});
	}
function posdiv(){
	if(screen.width == '1024'){
	document.getElementById("Layer1").style.left='0%';
	document.getElementById("Layer2").style.left='88%';
	}
	else if(screen.width < '1024'){
	document.getElementById("Layer1").style.display='none';
	document.getElementById("Layer2").style.display='none';
	}
}
</script>
<script language="javascript" type="text/javascript">
function goto(url) {
	window.open(url, "_blank");
}
function popupi(f) {
  var width = 600;
  var height = 600;
  var x = (screen.width-width) / 2;
  var y = (screen.height-height) / 2;
  p=window.open(f,"","left="+x+",top="+y+",width="+width+",height="+height);
  if(!p)
  alert('Votre navigateur a bloqué la fenêtre de facebook !!!\nDésactiver le bloqueur de popup et réessayer.');
}

</script>

<style type="text/css">
<!--
.Style1 {color: #FFFFFF}
.Style2 {font-size: 10px}
#Layer1 {
	position:absolute;
	width:120;
	height:650;
	z-index:1;
	left: 5%;
	top: 5%;
	background-color: #FFFFFF;
}
#Layer2 {
	position:absolute;
	width:120;
	height:650;
	z-index:2;
	left: 84%;
	top: 5%;
	background-color: #FFFFFF;
}
.style3 {	font-size: 14px;
	font-weight: bold;
}
.style4 {
	font-size: 14px;
	font-weight: bold;
	color: #AB1255;
}
-->
</style>
<script type="text/javascript">

/******************************************
* Popup Box- By Jim Silver @ jimsilver47@yahoo.com
* Visit http://www.dynamicdrive.com/ for full source code
* This notice must stay intact for use
******************************************/

var ns4=document.layers
var ie4=document.all
var ns6=document.getElementById&&!document.all

//drag drop function for NS 4////
/////////////////////////////////

var dragswitch=0
var nsx
var nsy
var nstemp

function drag_dropns(name){
if (!ns4)
return
temp=eval(name)
temp.captureEvents(Event.MOUSEDOWN | Event.MOUSEUP)
temp.onmousedown=gons
temp.onmousemove=dragns
temp.onmouseup=stopns
}

function gons(e){
temp.captureEvents(Event.MOUSEMOVE)
nsx=e.x
nsy=e.y
}
function dragns(e){
if (dragswitch==1){
temp.moveBy(e.x-nsx,e.y-nsy)
return false
}
}

function stopns(){
temp.releaseEvents(Event.MOUSEMOVE)
}

//drag drop function for ie4+ and NS6////
/////////////////////////////////


function drag_drop(e){
if (ie4&&dragapproved){
crossobj.style.left=tempx+event.clientX-offsetx
crossobj.style.top=tempy+event.clientY-offsety
return false
}
else if (ns6&&dragapproved){
crossobj.style.left=tempx+e.clientX-offsetx+"px"
crossobj.style.top=tempy+e.clientY-offsety+"px"
return false
}
}

function initializedrag(e){
crossobj=ns6? document.getElementById("showimage") : document.all.showimage
var firedobj=ns6? e.target : event.srcElement
var topelement=ns6? "html" : document.compatMode && document.compatMode!="BackCompat"? "documentElement" : "body"
while (firedobj.tagName!=topelement.toUpperCase() && firedobj.id!="dragbar"){
firedobj=ns6? firedobj.parentNode : firedobj.parentElement
}

if (firedobj.id=="dragbar"){
offsetx=ie4? event.clientX : e.clientX
offsety=ie4? event.clientY : e.clientY

tempx=parseInt(crossobj.style.left)
tempy=parseInt(crossobj.style.top)

dragapproved=true
document.onmousemove=drag_drop
}
}
document.onmouseup=new Function("dragapproved=false")

////drag drop functions end here//////

function hidebox(){
crossobj=ns6? document.getElementById("showimage") : document.all.showimage
if (ie4||ns6)
crossobj.style.visibility="hidden"
else if (ns4)
document.showimage.visibility="hide"
}

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
body {
	background-image: url(image_cartevisite_2/bg_cartevisite.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Style1 {
	font-size: 13px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.Style4 {font-size: 13px}
.Style5 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.Style6 {font-size: 12}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.navigation2 {
	BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; COLOR: #666; BORDER-RIGHT-WIDTH: 0px;	font-family: Arial, Helvetica, sans-serif;
	vertical-align:middle;

}
.navigation2 A:link {
	 PADDING-RIGHT: 6px;  PADDING-LEFT: 6px; FONT-SIZE: 12px; BACKGROUND: transparent; PADDING-BOTTOM: 6px;  COLOR: #2C222D; PADDING-TOP: 6px;font-weight: bold;  TEXT-DECORATION: none;	font-family: Arial, Helvetica, sans-serif;
}
.navigation2 A:visited {
	 PADDING-RIGHT: 6px;  PADDING-LEFT: 6px; FONT-SIZE: 12px; BACKGROUND: transparent; PADDING-BOTTOM: 6px;  COLOR: #2C222D; PADDING-TOP: 6px;font-weight: bold;  TEXT-DECORATION: none;	font-family: Arial, Helvetica, sans-serif;
}

.navigation2 A:active {
	 PADDING-RIGHT: 6px;  PADDING-LEFT: 6px; FONT-SIZE: 12px; BACKGROUND: transparent; PADDING-BOTTOM: 6px;  COLOR: #2C222D; PADDING-TOP: 6px;font-weight: bold;  TEXT-DECORATION: none;	font-family: Arial, Helvetica, sans-serif;
}
.navigation2 A:hover {
	 PADDING-RIGHT: 6px;  PADDING-LEFT: 6px; FONT-SIZE: 12px; BACKGROUND-color:#D20D65; PADDING-BOTTOM: 6px;  COLOR: #ffffff; PADDING-TOP: 6px;font-weight: bold;  TEXT-DECORATION: none;	font-family: Arial, Helvetica, sans-serif;
}

-->
</style>
</head>

<body onLoad="document.getElementById('webo_pub').style.display='none';" >
  <script language="javascript">
  function verif_ext(){
}

function swch(){
if(document.getElementById("mPre").style.display=='block'){
document.getElementById("mPre").style.display='none';
document.getElementById("pred").style.display='none';
document.getElementById("mSimp").style.display='block';
document.getElementById("simp").style.display='block';
initImageIn('simp');

}
else{
document.getElementById("mPre").style.display='block';
document.getElementById("pred").style.display='block';
document.getElementById("mSimp").style.display='none';
document.getElementById("simp").style.display='none';
initImageIn('pred');
}
}

function initImageIn(id) {
  imageId = id;
  image = document.getElementById(id);
  setOpacity(image, 0);
  image.style.visibility = 'visible';
  fadeIn(imageId,0);
}

function initImageOut() {
  imageId = 'tababout';
  image = document.getElementById("tababout");
  setOpacity(image, 0);
  image.style.visibility = 'visible';
  fadeOut(imageId, 0);
}



function setOpacity(obj, opacity) {
  opacity = (opacity == 100)?99.999:opacity;
 
  // IE/Win
  obj.style.filter="alpha(opacity="+ parseInt(opacity) + ");";
 
  // Safari<1.2, Konqueror
  obj.style.KHTMLOpacity = opacity/100;

  // Older Mozilla and Firefox
  obj.style.MozOpacity = opacity/100;

  // Safari 1.2, newer Firefox and Mozilla, CSS3
  obj.style.opacity = opacity/100;

}





function fadeIn(objId,opacity) {

  if (document.getElementById) {

    obj = document.getElementById(objId);

    if (opacity <= 100) {

      setOpacity(obj, opacity);

      opacity += 10;

      window.setTimeout("fadeIn('"+objId+"',"+opacity+")", 100);

    }

  }

}

function fadeOut(objId,opacity) {

  if (document.getElementById) {

//  alert(opacity);

    obj = document.getElementById(objId);

    if (opacity <= 100) {

      setOpacity(obj, opacity);

      opacity += 10;

      window.setTimeout("fadeOut('"+objId+"',"+opacity+")", 100);

    }

  }

}
function show()

	{

		if (document.getElementById("tabform").style.display=="block")

		{

			document.getElementById("tabform").style.display="none";

			document.getElementById("tablogin").style.display="block";



		}	

		else

		{

			document.getElementById("tablogin").style.display="none";

			document.getElementById("tabform").style.display="block";

			//initImageIn();

		}

	}

//posdiv();
</script>

<table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="267" valign="top" style="background:url(image_cartevisite_2/bg_tableu_cartevisite.jpg) repeat-x"><table width="970" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="255" height="150" align="center"><img src="image_cartevisite_2/logo_cartevisite.png" width="214" height="47" /></td>
        <td width="715" align="center"><table width="572" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="15"><img src="image_cartevisite_2/publicite.jpg" alt="" width="68" height="15" /></td>
          </tr>
          <tr>
            <td height="91" bgcolor="#E4E4E4">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>      
      <table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="710" height="93">

          <table width="698" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="27" style="background:url(image_cartevisite_2/menu_cartevisite.jpg) no-repeat center center">
                <table align="center" width="60%">
                <tr>
                <td width="100%" align="center">
                <DIV class=navigation2 style="MARGIN-TOP: 10px; MARGIN-BOTTOM: 10px" align=center>
                <a href="<?=$_SERVER['PHP_SELF']?>"><?=$langue[38]?></a>&nbsp;&nbsp;<a href="#"><?=$langue[39]?></a>&nbsp;&nbsp;<a href="#"><?=$langue[40]?></a>&nbsp;&nbsp;<a href="contact.php"><?=$langue[2]?></a>&nbsp;&nbsp;<a href="don.php"><?=$langue[37]?></a>
                </DIV>
                
                </td>
              </tr>
          </table>
          </td>
        </tr>
        </table>
          </td>
        </tr>
 
 
 <tr>
	  <td width="747" style="padding-right:40px" align="right">
	  <div style="display:inline; position:relative; right:10px" align="right" >
	  <a href="<?=$_SERVER['PHP_SELF']?>?lang=de&start=<?=$_GET['start']?>"><img border="0" src="images/de.gif" width="20" height="13" alt="deutsch"></a>&nbsp;<a href="<?=$_SERVER['PHP_SELF']?>?lang=es&start=<?=$_GET['start']?>"><img border="0" src="images/es.gif" width="20" height="13" alt="Espa&ntilde;ol"></a>&nbsp;<a href="<?=$_SERVER['PHP_SELF']?>?lang=en&start=<?=$_GET['start']?>"><img border="0" src="images/gb.gif" width="20" height="13" alt="English"></a>&nbsp;<a href="<?=$_SERVER['PHP_SELF']?>?lang=fr&start=<?=$_GET['start']?>"><img border="0" src="images/fr.gif" width="20" height="13" alt="Francais"></a>&nbsp;<a href="<?=$_SERVER['PHP_SELF']?>?lang=it&start=<?=$_GET['start']?>"><img border="0" src="images/it.gif" width="20" height="13" alt="Italiano"></a>  
	  </div></td>
	 </tr>
	 
	 <tr>
	  <td width="747" style="padding-right:40px" align="center"><?=$langue[34]?> : <div align="left" style="display:inline; font-size:16px; color:#C94093; font-weight:bold; width:"  id="NbrCarteCreer"><?=NbrCarteCreer();?></div>&nbsp;&nbsp;
	  
	  </td>
	  <td></td>
  </tr>
	  <tr height="10px"> <td></td></tr>
        
  <tr>
    <td>
	
	
	<table align="center"  cellpadding="3"  border="0" cellspacing="3">
        <tr id="mPre" style="display:block;font-size:14px">
          <td style="font-size:12px"><img src="images/fleche.jpg">&nbsp;&nbsp;<strong><?=$langue[0]?></strong></td>
          <td>&nbsp;|&nbsp;</td>
          <td><a style="font-size:12px; color:#C94093" href="javascript:void(0);" onClick="swch();"><?=$langue[1]?></a></td>
        </tr>
        <tr id="mSimp" style="display:none;font-size:14px">
          <td><a style="font-size:12px;color:#C94093" href="javascript:void(0);" onClick="swch();"><?=$langue[0]?></a></td>
          <td>&nbsp;|&nbsp;</td>
          <td style="font-size:12px"><img src="images/fleche.jpg">&nbsp;&nbsp;<strong><?=$langue[1]?></strong></td>
        </tr>
      </table>
	  <table align="center" >
	  		<tr  bgcolor="whitesmoke"><td height="40px" width="280px" align="right" style="border:1px solid #cccccc" colspan="3"><? 
if($_GET['a']=='d'){
$_SESSION[]="";
/*setcookie("CarteVisite_Username");
setcookie("CarteVisite_password");
*/

echo '<center><strong>Vous tes bien dconnect</strong></center>
<table border="0" style="display:block" bgcolor="whitesmoke" width="500" id="tablogin" border="0" align="center" bordercolor="black" valign="middle" cellpadding="0"  cellspacing="3">
 <form    action="login.php" name="form01" method="post"> 
 
 <tr  align="center" height="20px"><td colspan=7 align="right"><strong><img src="images/fleche.jpg">&nbsp;&nbsp;'.$langue[25].'</strong>&nbsp;&nbsp;|&nbsp;&nbsp;<a style="font-size:12px; color:#C94093" href="javascript:void(0);" onclick="show();">'.$langue[26].'</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a style="font-size:12px; color:#C94093" href="lostpass.php" >'.$langue[35].'</a></td></tr>
                <tr align="">
                  <td width="30px" align="right" valign=top>Email</td>
                  <td align="left" width="80px" valign=top><input class=search size="20" name="Us_login" onFocus="style.backgroundColor=\'#FFFFFF\';"  onBlur="style.backgroundColor=\'#EEF2F3\';"  ></td>
                  <td align="right" width="70px" valign=top>'.$langue[29].'</td>
                  <td align="left" width="80px" valign=top><input class=search size="20" name="Us_password" onFocus="style.backgroundColor=\'#FFFFFF\';" type="password" onBlur="style.backgroundColor=\'#EEF2F3\';"  ></td>
                  <td align="center" width="20px" valign=top >&nbsp;</td><td width="100px" align="left"><input class=search  type="submit" name="submit" value="Connexion"></td>
                  <td width="80px" valign=top></td>
                </tr>
              <tr><td align="right" width="30px" valign=top ><input type=checkbox name="mem" id="mem" class="btn-search"></td><td colspan=6 width="340px" align="left">'.$langue[28].'</td></tr>
            </form></table>
			
 <table border="0" align="right" bgcolor="whitesmoke" style="display:none" width="500" id="tabform" valign="middle" cellpadding="0"  cellspacing="3">
 			<form  action="reg.php" name="form02" method="post">
 <tr  align="center" height="20px"><td align="right" colspan="3"><a style="font-size:12px; color:#C94093" href="javascript:void(0);" onclick="show();">'.$langue[25].'</a>&nbsp;&nbsp;|&nbsp;&nbsp;<strong><img src="images/fleche.jpg" border=0>&nbsp;&nbsp;'.$langue[26].'</strong></td></tr>
                <tr align="">
                  <td width="30px" align="left" valign=top>Email</td>
                  <td align="left" width="140px" valign=top><input class=search2 size="20" name="Us_login" onFocus="style.backgroundColor=\'#FFFFFF\';"  onBlur="style.backgroundColor=\'#EEF2F3\';"  ></td><td rowspan=4>&nbsp;&nbsp;'.$langue[27].'</td></tr><tr>
                  <td align="left" width="70px" valign=top>'.$langue[29].'</td>
                  <td align="left" width="140px" valign=top><input class=search2 size="20" name="Us_password" onFocus="style.backgroundColor=\'#FFFFFF\';" type="password" onBlur="style.backgroundColor=\'#EEF2F3\';"  ></td></tr><tr>
                  <td align="left" width="120px" valign=top >'.$langue[30].'</td><td width="140px" align="left"><input type=password name="pass2" class=search2 id="pass2" onBlur="style.backgroundColor=\'#EEF2F3\';" onFocus="style.backgroundColor=\'#FFFFFF\';"></td></tr><tr>
                  <td width="280px" valign=top colspan="2"><input class=search  type="submit" name="submit" value="'.$langue[26].'">&nbsp;&nbsp;<input type=checkbox name="mem2" id="mem2" class="btn-search">&nbsp;Auto login&nbsp;&nbsp;<input type=checkbox name="news" id="news" class="btn-search">&nbsp;&nbsp;Newsletter</td>
                </tr>
              
         </form>   </table>
';
}
else 
{
if($_SESSION['login']=='') include("autologin.php");
else echo '<center><strong>'.$langue[3].' '.$_SESSION['login'].'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:9px; color:#C94093" href="'.$_SERVER['PHP_SELF'].'?a=d">'.$langue[4].'</a></center>';
}
?>
</td></tr></table>
<br>
	  
	  </td>
	  
  </tr>      
        
        <tr align="center" >
    <td align="center">
	
		<form name="form2"  id="form2" enctype="multipart/form-data">
              <input type="hidden" name="start" id="start">
              <input type="hidden" name="lang" id="lang" value="<?=$lg?>">
			  
              <input type="hidden" name="Valid" value="">
<table id="pred" width="747" border="0"  align="center" cellpadding="0" cellspacing="0">
        
		<tr>
          <td valign="top"  align="center">
             <table><tr><td>
			 
			  <table  border="0"  align="center"  cellpadding="0" cellspacing="0">
                <tr>
                  <td height="3" width="3" style="background:url(images/gauche_haut.jpg) ; width:3px; height:3px;" ></td>
                  <td width="350" height="3" style="background:url(images/haut.jpg); width:350px; height:3px;"></td>
                  <td height="3" width="3" style="background:url(images/droit_haut.jpg); width:3px; height:3px;"></td>
                </tr>
                <tr >
                  <td width="3" style="background:url(images/gauche.jpg) repeat-y; width:3px; "></td>
                  <td valign="top" width="350" align="center">
				  
				  
				 
				  <table  width="350"  border="0"  cellpadding="2" align="center" cellspacing="2">
                      <tr>
                        <td width="200px" colspan="4"><img src="images/fleche.jpg">&nbsp;&nbsp;<font color="#D30C65" face="tahoma" size="2"><?=$langue[5]?> :</font></td>
                      </tr>
                      <tr align="center">
                        <td>&nbsp;</td>
                        <td width="180px" colspan="3">Alignement</td>
                      </tr>
                      <tr align="center">
                        <td width="200px">&nbsp;</td>
                        <td width="60px" align="right"><img src="images/align_gauche.jpg"></td>
                        <td width="60px" align="center"><img src="images/align_center.jpg"></td>
                        <td width="60px" align="left"><img src="images/align_droit.jpg"></td>
                      </tr>
                      <tr align="left">
                        <td width="200px" align="center"><input tabindex="0" name="raison" type="text"  value="<?=$_SESSION['raison']=='' ? $langue[6]:$_SESSION['raison']; ?>"   onKeyUp="" id="raison" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';">                        </td>
                        <td width="60px" align="right"><input type="radio"  onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" name="Ralign" class="btn-search"  value="gauche" <? if ($_SESSION['Ralign']=='gauche') echo 'checked'; ?>>                        </td>
                        <td width="60px" align="center"><input type="radio"  name="Ralign" class="btn-search" onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" value="centre" <? if ($_SESSION['Ralign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input type="radio"  name="Ralign" class="btn-search" value="droite" onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" <? if ($_SESSION['Ralign']=='droite') echo 'checked'; ?>></td>
                      </tr>
                      <tr align="left">
                        <td width="200px" align="center"><input tabindex="1" name="site" type="text"  value="<?=$_SESSION['site']=='' ? 'www.cartevisite.org':$_SESSION['site']; ?>"   onKeyUp="" id="site" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';" /></td>
                        <td width="60px" align="right"><input type="radio" name="Salign" onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" class="btn-search" value="gauche" <? if ($_SESSION['Salign']=='gauche') echo 'checked'; ?>></td>
                        <td width="60px" align="center"><input type="radio" name="Salign" onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" class="btn-search" value="centre" <? if ($_SESSION['Salign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input type="radio" name="Salign" class="btn-search" onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" value="droite" <? if ($_SESSION['Salign']=='droite') echo 'checked'; ?>></td>
                      </tr>
                      <tr align="left">
                        <td width="200px" align="center"><input tabindex="3" name="prenom" type="text" value="<?=$_SESSION['prenom']=='' ? "" :$_SESSION['prenom']; ?>"   onKeyUp="" id="prenom" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';" /></td>
                        <td width="60px" align="right"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="PreNalign" class="btn-search" value="gauche" <? if ($_SESSION['PreNalign']=='gauche') echo 'checked'; ?>>                        </td>
                        <td width="60px" align="center"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="PreNalign" class="btn-search" value="centre" <? if ($_SESSION['PreNalign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="PreNalign" class="btn-search" value="droite" <? if ($_SESSION['PreNalign']=='droite') echo 'checked'; ?>></td>
                      </tr>
                      <tr align="left">
                        <td width="200px" align="center"><input tabindex="2" name="nom" type="text" value="<?=$_SESSION['nom']=='' ? $langue[7]:$_SESSION['nom']; ?>"  onKeyUp=""  id="nom" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';"></td>
                        <td width="60px" align="right"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Nalign" class="btn-search" value="gauche" <? if ($_SESSION['Nalign']=='gauche') echo 'checked'; ?>>                        </td>
                        <td width="60px" align="center"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Nalign" class="btn-search" value="centre" <? if ($_SESSION['Nalign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Nalign" class="btn-search" value="droite" <? if ($_SESSION['Nalign']=='droite') echo 'checked'; ?>></td>
                      </tr>
                      <tr align="left">
                        <td width="200px" align="center"><input tabindex="4" name="titre" type="text" value="<?=$_SESSION['titre']=='' ? $langue[9]:$_SESSION['titre']; ?>"   onKeyUp=""  id="titre" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';"></td>
                        <td width="60px" align="right"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="TIalign" class="btn-search" value="gauche" <? if ($_SESSION['TIalign']=='gauche') echo 'checked'; ?>></td>
                        <td width="60px" align="center"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="TIalign" class="btn-search" value="centre" <? if ($_SESSION['TIalign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="TIalign" class="btn-search" value="droite" <? if ($_SESSION['TIalign']=='droite') echo 'checked'; ?>></td>
                      </tr>
						<tr align="left">
                        <td width="200px" align="center"><input tabindex="7" name="ville" type="text" value="<?=$_SESSION['ville']=='' ? "":$_SESSION['ville']; ?>"   onKeyUp=""  id="ville" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';" /></td>
                        <td width="60px" align="right"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Villealign" class="btn-search" value="gauche" <? if ($_SESSION['Villealign']=='gauche') echo 'checked'; ?>>                        </td>
                        <td width="60px" align="center"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Villealign" class="btn-search" value="centre" <? if ($_SESSION['Villealign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Villealign" class="btn-search" value="droite" <? if ($_SESSION['Villealign']=='droite') echo 'checked'; ?>></td>
                      </tr>
                      <tr align="left">
                        <td width="200px" align="center"><input tabindex="8" name="gsm" type="text" value="<?=$_SESSION['gsm']=='' ? 'Gsm':$_SESSION['gsm']; ?>"   onKeyUp=""  id="gsm" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';" />                        </td>
                        <td width="60px" align="right"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Malign" class="btn-search" value="gauche" <? if ($_SESSION['Malign']=='gauche') echo 'checked'; ?>></td>
                        <td width="60px" align="center"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Malign" class="btn-search" value="centre" <? if ($_SESSION['Malign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Malign" class="btn-search" value="droite" <? if ($_SESSION['Malign']=='droite') echo 'checked'; ?>></td>
                      </tr>                      <tr align="left">
                        <td width="200px" align="center"><input tabindex="5" name="email" type="text" value="<?=$_SESSION['email']=='' ? $langue[10]:$_SESSION['email']; ?>"   onKeyUp=""  id="email" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';" />                        </td>
                        <td width="60px" align="right"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Ealign" class="btn-search" value="gauche" <? if ($_SESSION['Ealign']=='gauche') echo 'checked'; ?>></td>
                        <td width="60px" align="center"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Ealign" class="btn-search" value="centre" <? if ($_SESSION['Ealign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Ealign" class="btn-search" value="droite" <? if ($_SESSION['Ealign']=='droite') echo 'checked'; ?>></td>
                      </tr>
                      <tr align="left">
                        <td width="200px" align="center"><textarea tabindex="6" name="adress" id="adress" onKeyUp="" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';"><?=$_SESSION['adresse']=='' ? $langue[11]:$_SESSION['adresse']; ?>
</textarea></td>
                        <td width="60px" align="right"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Aalign" class="btn-search" value="gauche" <? if ($_SESSION['Aalign']=='gauche') echo 'checked'; ?>></td>
                        <td width="60px" align="center"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Aalign" class="btn-search" value="centre" <? if ($_SESSION['Aalign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input  onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');"type="radio" name="Aalign" class="btn-search" value="droite" <? if ($_SESSION['Aalign']=='droite') echo 'checked'; ?>></td>
                      </tr>
                      
                      <tr align="left">
                        <td width="200px" align="center"><input tabindex="9" name="tel" type="text" value="<?=$_SESSION['tel']=='' ? 'Tel':$_SESSION['tel']; ?>"   onKeyUp=""  id="tel" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';" />                        </td>
                        <td width="60px" align="right"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Talign" class="btn-search" value="gauche" <? if ($_SESSION['Talign']=='gauche') echo 'checked'; ?>></td>
                        <td width="60px" align="center"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');"type="radio" name="Talign" class="btn-search" value="centre" <? if ($_SESSION['Talign']=='centre') echo 'checked'; ?>></td>
                        <td width="60px"><input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="Talign" class="btn-search" value="droite" <? if ($_SESSION['Talign']=='droite') echo 'checked'; ?>></td>
                      </tr>
                      <!--<tr align="left">
                        <td width="200px" align="center"><input tabindex="10" name="Fax" type="text" value="<?=$_SESSION['Fax']=='' ? 'Fax':$_SESSION['Fax']; ?>"   onKeyUp=""  id="Fax" onBlur="style.backgroundColor='#EEF2F3';javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" onFocus="style.backgroundColor='#FFFFFF';" />                        </td>
                        <td width="60px" align="right">&nbsp;</td>
                        <td width="60px">&nbsp;</td>
                        <td width="60px">&nbsp;</td>
                      </tr>-->
                      <tr align="left">
                        <td width="200px" align="center"><?=$langue[31]?> :<br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <INPUT TYPE="text" NAME="color2" tabindex="11" id="color2" SIZE="20" value="<?=$_SESSION['color2']=='' ? '#000000':$_SESSION['color2']; ?>"  onFocus="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');">
                          <A HREF="#" onClick="cp2.select(document.getElementById('form2').color2,'pick2');return false;" NAME="pick2" ID="pick2"><img src="images/sel.gif" border="0"></A></td>
                        <td width="60px">&nbsp;</td>
                        <td width="60px">&nbsp;</td>
                        <td width="60px">&nbsp;</td>
                      </tr>
                      <tr align="left">
                        <td  width="200px" align="center" rel><?=$langue[32]?> :<br>
                          <select tabindex="12" rel="nofollow"  class="sel" name="font" id="font" onChange="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');">
                            <?php 
$d = dir("fonts"); 
//echo "Pointeur: ".$d->handle."<br>\n"; 
//echo "Chemin: ".$d->path."<br>\n"; 
while($entry = $d->read()) { 
if ($entry!='.' && $entry!='..') {
	$f=substr($entry,0,strpos($entry,'.'));
    if ($entry==$_SESSION['font']) 
	{$c='selected';}
	else {$c='';}
	echo "<option value='".$entry."' $c >".$f."</option>"; 
	unset($f);
	}
} 
$d->close(); 
?>
                          </select>                        </td>
                        <td width="60px">&nbsp;</td>
                        <td width="60px">&nbsp;</td>
                        <td width="60px">&nbsp;</td>
                      </tr>
  <tr>
                        <td width="270px" colspan="4" align="left"><br><div style="position:relative; left:20px"><?=$langue[13]?> :<br><br>
						<input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="filter" class="btn-search" value="100" <? if ($_SESSION['filter']=='100') echo 'checked'; ?>>&nbsp;&nbsp;&nbsp;Fond blanc<br>
						<input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="filter" class="btn-search" value="80" <? if ($_SESSION['filter']=='80') echo 'checked'; ?>>&nbsp;&nbsp;&nbsp;80%&nbsp;&nbsp;&nbsp;&nbsp;
                        <input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="filter" class="btn-search" value="60" <? if ($_SESSION['filter']=='60') echo 'checked'; ?>>&nbsp;&nbsp;&nbsp;60%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="filter" class="btn-search" value="40" <? if ($_SESSION['filter']=='40') echo 'checked'; ?>>&nbsp;&nbsp;&nbsp;40%&nbsp;&nbsp;&nbsp;&nbsp;
                        <input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="filter" class="btn-search" value="20" <? if ($_SESSION['filter']=='20') echo 'checked'; ?>>&nbsp;&nbsp;&nbsp;20%<br>
						<input onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','test');" type="radio" name="filter" class="btn-search" value="0" <? if ($_SESSION['filter']=='0' || $_SESSION['filter']=='') echo 'checked'; ?>>&nbsp;&nbsp;&nbsp;<?=$langue[33]?>&nbsp;&nbsp;&nbsp;&nbsp;
						</div></td>

                </tr>      
					  <tr>
                        <td width="200px">&nbsp;</td>
                        <td width="60px"><input name="modele"  id="modele" type="hidden" ></td>
                        <td width="60px">&nbsp;</td>
                        <td width="60px">&nbsp;</td>
                        <!--      <td height="40"> <input name="Submit" type="button" class="boton-espace3" value="Valider" onClick="return verif_formulaire()"></td>
-->
                      </tr>
                    </table>
					
					</td>
                  <td width="3"   align="left" style="background:url(images/droit.jpg) repeat-y; width:3px;  "></td>
                </tr>
                <tr height="3px">
                  <td width="3" height="3" style="background:url(images/gauche_bas.jpg); width:3px; height:3px;"></td>
                  <td height="3" width="350" style="background:url(images/bas.jpg); width:350px; height:3px;"></td>
                  <td height="3" width="3" style="background:url(images/droit_bas.jpg); width:3px; height:3px;"></td>
                </tr>
              </table>
			  
<!--  -->   <table  width="350"  border="0"  cellpadding="2" align="center" cellspacing="2">
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
<!--              <tr>
                <td>&nbsp;</td>
                <td colspan="2" >Pour recevoir votre carte sans signature 'SOFTSEVENART' veuillez remplir les champs suivant : </td>
                <td>&nbsp;</td>
              </tr>
-->              <tr id="ok" style="display:none">
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;<div style="text-align:justify; border:1px solid #cccccc; padding:10 10 10 10; background-color:whitesmoke;"><font color="<?=$_SESSION['color2']?>"><?=$langue[23]?> :&nbsp;<strong><?=$_SESSION['login']?></strong>.</font></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr id="no" style="display:none">
                <td>&nbsp;</td>
                <td colspan="2">;<div style="text-align:justify; border:1px solid #cccccc; padding:10 10 10 10; background-color:whitesmoke;"><?=$langue[24]?></div></td>
                <td>&nbsp;</td>
              </tr>
                   <tr>
                      <td>&nbsp;</td>
                      <td colspan="2" align="center" ><? if($_SESSION['login']!=''){?><input name="BtnVal" type="button" style="cursor:pointer;width:300px; height:20px; font-size:11px; font-weight:bold; border:2px solid #cccccc"   value="<?=$langue[15]?> <?=$_SESSION['login']?>" onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','valide');"><br><br>
<input name="BtnValFaceBook" type="button" style="cursor:pointer;width:300px; height:20px; font-size:11px; font-weight:bold; border:2px solid #cccccc"   value="<?=$langue[36]?>" onClick="javascript:verif_formulaire(document.getElementById('modele').value,'<?=$_POST['start']?>','valideFaceBook');">

<br><br><div style="text-align:justify; border:1px solid #cccccc; padding:10 10 10 10; background-color:whitesmoke;"><?=$langue[16]?></div><? } else echo'<font color=red><strong>'.$langue[14].'</font>';?></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
      </form>
<!--	</td></tr></table>
-->			
			</td>
        
		
		  <td valign="top">
            <table width="321" border="0" align="center" >
              <tr>
                <td><img src="images/fleche.jpg">&nbsp;&nbsp;<font color="#D30C65" face="tahoma" size="2"><?=$langue[17]?> :</font></td>
              </tr>
              <tr>
                <td><table   border="0" align="center" cellspacing="3" cellpadding="3" >
                    <script language="javascript">
function navigateS(page){
page1=new Number(page)-2;
document.getElementById(page1).style.display='none';
page0=new Number(page)-1;
document.getElementById(page0).style.display='none';
document.getElementById(page).style.display='none';

page3=new Number(page)+1;
document.getElementById(page3).style.display='block';
page4=new Number(page)+2;
document.getElementById(page4).style.display='block';
page5=new Number(page)+3;
document.getElementById(page5).style.display='block';
}
function navigateP(page){

page3=new Number(page)-5;
document.getElementById(page3).style.display='block';
page4=new Number(page)-4;
document.getElementById(page4).style.display='block';
page5=new Number(page)-3;
document.getElementById(page5).style.display='block';

document.getElementById(page).style.display='none';
page0=new Number(page)-1;
document.getElementById(page0).style.display='none';
page1=new Number(page)-2;
document.getElementById(page1).style.display='none';

}
</script>
                    <?php 

	 
	for ($i=0;$i<$nbrlng;$i++){
		if ( ($cpt+$start) >= count($imgTab)) break;
		echo '<tr>';
		for ($j=0;$j<$imgParLng;$j++){
			if ($cpt+$start >= count($imgTab)) break;		
			//echo strlen($imgTab);
			$image=split('___',$imgTab[$cpt+$start]);
			echo "<td><table width='155'  border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td height='3' width='3' style='background:url(images/gauche_haut.jpg); width:3px; height:3px;' ></td>
    <td  height='3' width='150' style='background:url(images/haut.jpg); width:150px; height:3px;'></td>
    <td height='3' width='3' style='background:url(images/droit_haut.jpg); width:3px; height:3px;'></td>
  </tr>
  <tr >
    <td width='3'   style='background:url(images/gauche.jpg); width:3px;'> </td>
    <td><img src='miniatures/".$image[1]."' class='img' id='".$image[1]."' onClick=verif_formulaire(this.id,$start,'test');></td>
    <td width='3'    style='background:url(images/droit.jpg); width:3px; '> </td>
  </tr>
  <tr height='3px'>
    <td width='3' height='3' style='background:url(images/gauche_bas.jpg); width:3px; height:3px;'></td>
    <td height='3' width='150'  style='background:url(images/bas.jpg); width:150px; height:3px;'> </td>
    <td height='3' width='3' style='background:url(images/droit_bas.jpg); width:3px; height:3px;'></td>
  </tr>
</table></td>";
			$cpt++;								         
		}
		echo '</tr>';
	}
	$start=$cpt+$start;
	if ($start < 0) $start=0;
	$prev=$start-$imgParLng*$nbrlng*2;
	//$page=" | ";
	if ($start <= $nbrlng+$imgParLng) echo "<tr align=center ><td colspan=$imgParLng>$nav<br><a href='".$_SERVER['PHP_SELF']."?start=$start&lang=$lg'><img border=0 src=images/suivant.jpg></a></td></tr>";	 
	else if ( ($start) >= count($imgTab)) echo "<tr align=center><td colspan=$imgParLng>$nav<br><a href='".$_SERVER['PHP_SELF']."?start=$prev&lang=$lg'><img border=0 src=images/precedent.jpg></a></td></tr>";	 
	else echo "<tr align=center><td colspan=$imgParLng>$nav<br><a href='".$_SERVER['PHP_SELF']."?start=$prev&lang=$lg'><img border=0 src=images/precedent.jpg></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='".$_SERVER['PHP_SELF']."?start=$start&lang=$lg'><img border=0 src=images/suivant.jpg></a></td></tr>";	 

?>
                    <?php 

/* fast
$d = dir("miniatures"); 
//echo "Pointeur: ".$d->handle."<br>\n"; 
//echo "Chemin: ".$d->path."<br>\n"; 
$_POST['start'] == '' ? $startpage=0 : $startpage=$_POST['start'];
//if ($startpage == '') $startpage=0 ;
if($startpage%3!=0) $startpage=$startpage-1;
$page=0 ;
$nbrlng=2;
$imgParLng=3;
$cpt=0;
	while($entry = $d->read()) { 
		if ($entry!='.' && $entry!='..' && $entry!='Thumbs.db') {
		$imgTab[]=$entry;
		}
	} $d->close(); 

	for($cpt=0;$cpt<=count($imgTab);){
			if ( ($cpt) >= count($imgTab)) break;

	for ($i=0;$i<$nbrlng;$i++){
		if ( ($cpt) >= count($imgTab)) break;
		if ($page==$startpage || $page==$startpage+1) $display='block';
		else $display='none';
		echo '<tr id='.$page.'  style="display:'.$display.';">';
		for ($j=0;$j<$imgParLng;$j++){
			if ($cpt >= count($imgTab)) break;		
			echo "<td><div class='img' id='".$imgTab[$cpt]."' onClick=verif_formulaire(this.id,$page,'test');><img src='miniatures/".$imgTab[$cpt]."'></div></td>";
			$cpt++;								         
		}
		echo '</tr>';$page++;
	}
	if ($page <= 2) echo "<tr align=right id=".$page."  style='display:".$display.";' ><td colspan=3><a href='javascript:navigateS($page);'>Suivant</a></td></tr>";	 
	else if ( ($page) >= (count($imgTab)/2)-2) echo "<tr align=right id=".$page."  style='display:".$display.";' ><td colspan=3><a href='javascript:navigateP($page);'>Pr&eacute;cedent</a></td></tr>";	 
	else echo "<tr align=right id=".$page."  style='display:".$display.";' ><td colspan=3><a href='javascript:navigateP($page);'>Pr&eacute;cedent</a>&nbsp;&nbsp;<a href='javascript:navigateS($page);'>Suivant</a></td></tr>";	 
$page++;
}*/
?>
                  </table></td>
              </tr>
            </table>
            <table align="center" width="331" border="0" cellspacing="0" cellpadding="0">
              
              <form name="modform" id="modform" method="post" enctype="multipart/form-data">
                <input type="hidden" name="mod" value="yes">
                <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                <tr>
                  <td colspan="2"><img src="images/fleche.jpg">&nbsp;&nbsp;<font color="#D30C65" face="tahoma" size="2"><?=$langue[18]?> (300 Ko Max)</font></td>
                </tr>
                <tr>
                  <td colspan="2" height="5px"></td>
                </tr>
                <tr >
                  <td align="center" style="width:251px"><input name="modelep"  id="modelep" type="file" style="width:200px" >
                    <!--	<iframe id="UploadTarget1" name="UploadTarget1" src="" style="width:0px;height:0px;border:0"></iframe>
--></td>
                  <td align="left">&nbsp;&nbsp;&nbsp;
                    <input type="button" value="envoyer" name="subt" id="subt" onClick="sendmod();" style="width:80px" ></td>
                </tr>
                <tr>
                  <td colspan="2" height="10px"></td>
                </tr>
                <tr>
                  <td colspan="2" height="15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="btn-search" name="public" id="public">&nbsp;&nbsp;<?=$langue[19]?> </td>
                </tr>
                <tr>
                  <td colspan="2" height="15px"></td>
                </tr>
              </form>
            </table>
            <table bgcolor="#ffffff" id="carte"  width="321"  border="0" align="center">
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><img src="images/fleche.jpg">&nbsp;&nbsp;<font color="#D30C65" face="tahoma" size="2"><?=$langue[20]?> :</font></td>
                <td>&nbsp;</td>
              </tr>
              <tr align="center">
                <td>&nbsp;</td>
                <td width="321" align="center" colspan="2" height="188"><div id="tr" style="display:none;width:321; height:188;" align="center"><img align="middle" src="images/loading1.gif">
                    <center>
                      <br>
                      <!--<table cellspacing=0 cellpadding=0><tr><td style='width:321px;border:solid 1px black;background-color:whitesmoke;'><table width=321px cellspacing=0 cellpadding=0><tr><td align=left style='height:20px;background-color:#0066FF;'><font color=white>&nbsp;Creation de la carte</font></td></tr><tr><td>&nbsp;</td></tr>
<tr><td align="center">Traitement en cours, veuillez patientez... </td></tr><tr><td>&nbsp;</td></tr></table></td></tr></table>-->
                    </center>
                  </div>
                  <div align="center" style="display:;width:326; height:188; " id="preview">
                    <table width='326'  border='0' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td height='3' width='3' style='background:url(images/gauche_haut.jpg); width:3px; height:3px;' ></td>
                        <td  height='3' width='321' style='background:url(images/haut.jpg); width:321; height:3px;'></td>
                        <td height='3' width='3' style='background:url(images/droit_haut.jpg); width:3px; height:3px;'></td>
                      </tr>
                      <tr >
                        <td width='3'   style='background:url(images/gauche.jpg); width:3px;'></td>
<td align="center" valign="middle"><img align="middle" src="<?=$_SESSION['file']=='' ? 'vierges/'.$def : 'images/Create/'.$_SESSION['file']; ?>" id="pre" border="0" /></td>
                        <td width='3'    style='background:url(images/droit.jpg); width:3px; height:3px;'></td>
                      </tr>
                      <tr height='3px'>
                        <td width='3' height='3' style='background:url(images/gauche_bas.jpg); width:3px; height:3px;'></td>
                        <td height='3' width='321'  style='background:url(images/bas.jpg); width:321; height:3px;'></td>
                        <td height='3' width='3' style='background:url(images/droit_bas.jpg); width:3px; height:3px;'></td>
                      </tr>
                    </table>
                  </div></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <SCRIPT LANGUAGE="JavaScript">cp.writeDiv()</SCRIPT>
    </td>
  </tr>
</table>
</td>
</tr>

<tr  bgcolor="#FFFFFF" >
  <td align="center"><table align="center" id="simp" cellpadding="0" width="747" bgcolor="#ffffff" style="display:none;" cellspacing="0">
      <tr>
        <td><SCRIPT LANGUAGE="JavaScript">
<!--
function okclick(){
  document.f.butt.disabled=false;
  document.f.butt.value='Crer ma carte visite!';
}
function doclick(){
   var photo=document.getElementById("f").logo.value;
		var ok = true;
   if(photo){
   var ext=(photo.substr(photo.indexOf(".")+1,photo.indexOf(".")+3)).toLowerCase();
   if(photo!="" && ext!="jpg"){
	    alert("Desolé, mais le format *."+ext+" de l'image n'est pas pris en charge.\nSeul le format *.jpg est supporté.")
		ok = false;
   } 
   }
if(ok){
	document.f.butt.disabled=true;
        document.f.butt.value='Veuillez patientez...';
	document.f.submit();
	}
}
-->
</SCRIPT>
          <form action="simple.php?lang=<?=$lg?>" method="POST" name="f" id="f" ENCTYPE="multipart/form-data">
            <br>
            <br>
            <div style="border-left: solid 5px #fff; padding:0 0 0 10px; margin:0 0 0 0;">
              <table border=0 cellpadding=2 cellspacing=2>
                <tr>
                  <td valign="top">L'image du logo : </td>
                  <td><input type="file" name="logo" size="35" value="<?=$_SESSION['logo']?>" onChange="JavaScript:okclick();"></td>
                </tr>
                <tr>
                  <tD colspan="2">Doit tre imprativement au format jpg <br>
                    avec comme dimension 79x79.<br>
                    s'il est plus grand il sera redimensionn.</tD>
                </tr>
                <tr>
                  <tD colspan="2"></tD>
                </tr>
                <tr>
                  <td>Selectionner la police:</td>
                  <td><select name="font" onChange="JavaScript:okclick();">
                      <option value="SEGOEUI"  <?=($_SESSION['font']=='' || $_SESSION['font']=='SEGOEUI') ? 'SELECTED':''?>>Segoe UI</option>
                      <option value="trebuc" <?=$_SESSION['font']=='trebuc' ? 'SELECTED':''?>>Trebuchet MS</option>
                      <option value="ARIAL" <?=$_SESSION['font']=='ARIAL' ? 'SELECTED':''?>>Arial</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Alignement du text :</td>
                  <td><select name="align" onChange="JavaScript:okclick();">
                      <option value="gauche" <?=($_SESSION['align']=='' || $_SESSION['align']=='gauche') ? 'SELECTED':''?>>gauche</option>
                      <option value="droite" <?=$_SESSION['align']=='droite' ? 'SELECTED':''?>>droite</option>
                    </select></td>
                </tr>
              </table>
              <p>Entrez les information de votre carte visite:
              <table border=0 cellpadding=2 cellspacing=2>
                <tr>
                  <td></td>
                  <td></td>
                  <td width="380" align="center" valign="middle" rowspan="11"><table  border="0"  align="center"  cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="3" width="3" style="background:url(images/gauche_haut.jpg) ; width:3px; height:3px;" ></td>
                        <td width="280" height="3" style="background:url(images/haut.jpg); width:280px; height:3px;"></td>
                        <td height="3" width="3" style="background:url(images/droit_haut.jpg); width:3px; height:3px;"></td>
                      </tr>
                      <tr >
                        <td width="3"    style="background:url(images/gauche.jpg) repeat-y; width:3px; "></td>
                        <td valign="top" width="280" align="center"><img src="<? echo ($_SESSION['carte']) ? $_SESSION['carte']:"images/example.jpg"?>" width="270" height="157" border="0"> </td>
                        <td width="3"   align="left" style="background:url(images/droit.jpg) repeat-y; width:3px;  "></td>
                      </tr>
                      <tr height="3px">
                        <td width="3" height="3" style="background:url(images/gauche_bas.jpg); width:3px; height:3px;"></td>
                        <td height="3" width="280" style="background:url(images/bas.jpg); width:280px; height:3px;"></td>
                        <td height="3" width="3" style="background:url(images/droit_bas.jpg); width:3px; height:3px;"></td>
                      </tr>
                  </table>
                    
                             

                    </td>
                </tr>
                <tr>
                  <td align=center>Ligne 1
                    <input type="text" name="t0" value="<?=$_SESSION['t0']!='' ? $_SESSION['t0']:'Prnom NOM'?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t0style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t0style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t0style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t0style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t0style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t0size" onChange="JavaScript:okclick();">
                      <option value="10" <?=($_SESSION['t0size']=='' || $_SESSION['t0size']=='10') ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t0size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=$_SESSION['t0size']=='8' ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 2
                    <input type="text" name="t1" value="<?=$_SESSION['t1']!='' ? $_SESSION['t1']:'Project Manager'?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t1style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t1style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t1style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t1style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t1style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t1size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t1size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t1size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t1size']=='' || $_SESSION['t1size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 3
                    <input type="text" name="t2" value="<?=$_SESSION['t2']!='' ? $_SESSION['t2']:''?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t2style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t2style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t2style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t2style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t2style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t2size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t2size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t2size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t2size']=='' || $_SESSION['t2size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 4
                    <input type="text" name="t3" value="<?=$_SESSION['t3']!='' ? $_SESSION['t3']:''?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t3style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t3style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t3style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t3style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t3style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t3size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t3size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t3size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t3size']=='' || $_SESSION['t3size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 5
                    <input type="text" name="t4" value="<?=$_SESSION['t4']!='' ? $_SESSION['t4']:$langue[6]?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t4style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t4style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t4style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t4style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t4style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t4size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t4size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t4size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t4size']=='' || $_SESSION['t4size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 6
                    <input type="text" name="t5" value="<?=$_SESSION['t5']!='' ? $_SESSION['t5']:'Casablanca, Maroc.'?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t5style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t5style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t5style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t5style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t5style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t5size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t5size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t5size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t5size']=='' || $_SESSION['t5size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 7
                    <input type="text" name="t6" value="<?=$_SESSION['t6']!='' ? $_SESSION['t6']:'(+212) 22 27 14 79'?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t6style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t6style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t6style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t6style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t6style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t6size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t6size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t6size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t6size']=='' || $_SESSION['t6size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 8
                    <input type="text" name="t7" value="<?=$_SESSION['t7']!='' ? $_SESSION['t7']:'info@softsevenart.com'?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t7style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t7style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t7style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t7style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t7style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t7size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t7size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t7size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t7size']=='' || $_SESSION['t7size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 9
                    <input type="text" name="t8" value="<?=$_SESSION['t8']!='' ? $_SESSION['t8']:'softsevenart.com'?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t8style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t8style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t8style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t8style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t8style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t8size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t8size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t8size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t8size']=='' || $_SESSION['t8size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align=center>Ligne 10
                    <input type="text" name="t9" value="<?=$_SESSION['t9']!='' ? $_SESSION['t9']:''?>" size="30" maxlength="30" onChange="JavaScript:okclick();"></td>
                  <td align=center><select name="t9style" onChange="JavaScript:okclick();">
                      <option value="" <?=$_SESSION['t9style']=='' ? 'SELECTED':''?> >Normale</option>
                      <option value="-Bold" <?=$_SESSION['t9style']=='-Bold' ? 'SELECTED':''?>>Gras</option>
                      <option value="-Oblique" <?=$_SESSION['t9style']=='-Oblique' ? 'SELECTED':''?>>italic</option>
                      <option value="-BoldOblique" <?=$_SESSION['t9style']=='-BoldOblique' ? 'SELECTED':''?>>Gras italic</option>
                    </select>
                    <select name="t9size" onChange="JavaScript:okclick();">
                      <option value="10" <?=$_SESSION['t9size']=='10' ? 'SELECTED':''?> >Grande</option>
                      <option value="9" <?=$_SESSION['t9size']=='9' ? 'SELECTED':''?> >Moyenne</option>
                      <option value="8" <?=($_SESSION['t9size']=='' || $_SESSION['t9size']=='8') ? 'SELECTED':''?> >Petite</option>
                    </select>
                  </td>
                </tr>
              </table>
              </p>
              <!--<p><input type=checkbox name="showgrid" value="y" CHECKED onchange="JavaScript:okclick();">Show Grid Lines <i>(Good for proofing, but turn them off when you are going to print the business cards so the lines don't show up after they are cut.)</i></p>
-->
              <p>
                <input  type="button" value="Crer ma carte visite !" name="butt" onClick="javascript:doclick();">
            </div>
          </form></td>
      </tr>
    </table>

    
    </td>
</tr>
        <tr>
	  <td width="710" style="padding-right:50px" align="right"><?=$langue[21]?> : <div  style="display:inline;color:#C94093; font-weight:bold;"  id="TotVisit"><?=visitjour2('ip');?></div>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$langue[22]?> : <div  style="display:inline;color:#C94093; font-weight:bold;"  id="visitor"><?=nb_visiteurs_connecte('3000','red');?></div>
	  </td>
	  </tr>
        
            </table>
    
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="222" align="center" valign="top" style="background:url(image_cartevisite_2/footer_cartevisite.jpg) repeat-x #2c212c"><h3 id="bobcontent2-title" class="handcursor"><em> &nbsp; </em><span class="Style3"><a href="javascript:void();" class="smallText">Statistiques</a></span></h3>
<div>
<iframe id="ad2" src="http://fl01.ct2.comclick.com/aff_frame.ct2?id_regie=1&num_editeur=14730&num_site=1&num_emplacement=1" WIDTH="468" HEIGHT="60" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" bordercolor="#000000">
</iframe>

</div>
&nbsp;<div id="bobcontent2" style="display:none" class="switchgroup1">

<script type="text/javascript">
var bobexample=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
bobexample.setColor('darkred', 'black')
bobexample.setPersist(true)
bobexample.collapsePrevious(true) //Only one content open at any given time
bobexample.init()
</script>

<script type="text/javascript">
<!--
var _UJS=0;
//-->
</script>
    <!-- eStat v3.3.0 -->
<script type="text/javascript" src="http://perso.estat.com/js/493093205891.js"></script>
<script type="text/javascript">
<!--
if(_UJS) _estat('493093205891','PAGE_MARQUEE','GROUPE_PAGES_MARQUEES');
//-->
</script>
<noscript>
<a href="http://persos.estat.com/"><img src="http://perso.estat.com/m/00/493093205891?p=PAGE_MARQUEE&c=GROUPE_PAGES_MARQUEES" border="0" alt="marqueur eStat'Perso"></a>
</noscript>
<!-- /eStat -->
<script type="text/javascript" src="http://geoloc7.geovisite.com:82/private/geocounter.js?compte=283332175881"></script>
<noscript>
<a href="http://www.geovisite.com/zoom.php?compte=283332175881"  target="_blank"><img src="http://geoloc7.geovisite.com:82/private/geocounter.php?compte=283332175881" border="0" alt="compteur"></a><br>
<a href="http://www.geovisite.com/fr/">compteur</a>
</noscript>

    </div>
</td>
  </tr>
<!--  <tr>
    <td height="44" align="center" valign="top" bgcolor="#2D212D">
    <center>
    </td>
  </tr>
--></table>
<div id="showimage" style="position:absolute; width:400px; left:705px; top:60px">

<table border="0" width="396" bgcolor="#D20E64" cellspacing="0" cellpadding="2">
  <tr>
    <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0"
    height="36px">
      <tr>
        <td id="dragbar" style="cursor:hand; cursor:pointer" width="100%" onMousedown="initializedrag(event)"><ilayer width="100%" onSelectStart="return false"><layer width="100%" onMouseover="dragswitch=1;if (ns4) drag_dropns(showimage)" onMouseout="dragswitch=0" class="Style1 Style4"><font
        color="#FFFFFF">&nbsp;Donation</font></layer></ilayer></td>
        <td style="cursor:hand"><a href="#" onClick="hidebox();return false"><img src="close.gif" width="10px"
        height="10px" border=0></a></td>
      </tr>
      <tr>
        <td width="100%" colspan="2" valign="top" bgcolor="#FFFFFF" style="padding:4px">          
          <!-- PUT YOUR CONTENT BETWEEN HERE -->
          <span class="Style5"><a href="don.php" style="color:#666666" >Le site cartevisite.org est un site d’échange et de personnalisation  100% gratuit, au service du monde entier, à tout internaute intéressé  par la personnalisation de sa carte visite.<br />
            Contribuez avec vos dons  au développement de ce site ... </a></span>          <!-- END YOUR CONTENT HERE -->        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</div>
<?
if($_GET['c']=='o'){
?>
<script language="javascript">swch();</script>
<? }?>
<? 
/*$apache_version = apache_get_version();
$php_version = phpversion();
$mysql_version = mysql_get_client_info();
$gd_enabled = gd_info();
*/
if ($_SESSION['modele']!=""){
?>
<script language="javascript">
document.getElementById('modele').value='<?=$_SESSION['modele']?>';
//verif_formulaire('A1.jpg',0,'test');
//alert(document.getElementById('modele').value)
</script>
<?
}
?>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1438196-1";
urchinTracker();
</script>
</body>
</html>
