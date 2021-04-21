<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<style>
html, body {
	margin:0;
	padding:0;
}
body {
	background:#fff;
	font-family:helvetica, arial, sans-serif;
	font-size:14px;
	color:#666;
}
body.sent {
	text-align:center;
}
input,textarea{
	font-size:12px !important; 	}
.at3lb-dark {
	position:fixed;
	top:0;
	right:0;
	left:0;
	bottom:0;
	background:url(images/at3-lb-dark.png);
	background:rgba(0, 0, 0, .85);
	z-index:9998;
}
.at3lb-light {
	position:fixed;
	display:none;
	top:0;
	right:0;
	left:0;
	bottom:0;
	background:url(images/at3-lb-light.png);
	background:rgba(255, 255, 255, .85);
	z-index:9998;
}
.at3lb-light .at3-error {
	position:absolute;
	top:50%;
	left:50%;
	margin-top:-80px;
	margin-left:-171px;
	width:300px;
	background:#fff;
	border:1px solid #d2d2d1;
	box-shadow:0 0 5px #ccc;
	padding:20px;
	text-align:center;
	font-size:13px;
	color:#f35a43;
}
.at3lb-light .at3-error button {
	background:#ebebeb;
	background-image:linear-gradient(top, #fdfdfd, #d8d8d8);
	background-image:-webkit-linear-gradient(#fdfdfd, #d8d8d8);
	background-image:-moz-linear-gradient(#fdfdfd, #d8d8d8);
	background-image:-ms-linear-gradient(top, #fdfdfd, #d8d8d8);
	border:1px solid #a9a9a9;
	border:none\9;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	box-shadow:0 1px 1px #fff inset;
	padding:8px 20px;
	font-weight:400;
	font-size:14px;
	color:#000;
	cursor:pointer;
}
.atemail-form {
	background:#fff;
}
.atemail {
	position:relative;
	-webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.1);
	-moz-box-shadow:0 1px 2px rgba(0, 0, 0, 0.1);
	box-shadow:0 1px 2px rgba(0, 0, 0, 0.1);
}
.atemail .ate-head {
	background:#1b1b1b;
	background-image:-webkit-gradient(linear, left bottom, left top, color-stop(0.27, #1b1b1b), color-stop(0.82, #4d4d4d));
	background-image:-moz-linear-gradient(center bottom, #1b1b1b 27%, #4d4d4d 82%);
	border-bottom:1px solid #bebebe;
	padding:12px 20px;
	line-height:1em;
}
.atemail .ate-head h2 {
	display:inline;
	margin:0;
	padding:2px 0 2px 22px;
	line-height:16px;
	font-size:13px;
	color:#fff;
}
.atemail .ate-head.head-error {
	background:#922322;
	background-image:-webkit-gradient(linear, left bottom, left top, color-stop(0.3, #922422), color-stop(0.65, #ad3030));
	background-image:-moz-linear-gradient(center bottom, #922422 30%, #ad3030 65%);
}
.emailrow {
	position:relative;
	border-bottom:1px solid #e4e4e4;
	margin:0;
	padding:0;
	height:40px;
	line-height:40px;
	overflow:hidden;
	color:#666;
}
.emailrow.row-error, .emailrow.row-error input {
	color:RED;
}
.emailrow label {
	position:absolute;
	top:0;
	left:20px;
	width:85px;
	font-size:13px;
}
.emailrow p {
	margin:0;
	padding:0;
}
.emailrow p span {
	position:absolute;
	top:0;
	bottom:0;
	left:52px;
	right:20px;
}
.emailrow p span input {
	display:block;
	background:transparent;
	border:0;
	margin:8px 0;
	height:26px;
	line-height:20px;
	width:100%;
	outline:none;
	text-rendering:optimizelegibility;
	color:#000;
}
.emailrow p span input:focus {
	color:#000;
}
.emailrow .emailrow-input.atfrom {
	right:120px;
}
.emailrow .email-rem {
	position:absolute;
	top:11px;
	right:20px;
	left:auto;
	bottom:auto;
	width:115px;
	height:12px;
	line-height:18px;
	text-align:left;
	font-size:12px;
	color:#666;
	cursor:default;
	_line-height:20px;
}
.emailrow .email-rem input {
	display:inline-block;
	height:auto;
	width:auto;
	margin:2px 5px 0 0;
	float:left;
}
#em-f {
	_width:442px;
}
#em-e {
	_width:340px;
}
#ate-msg {
	position:relative;
	min-height:126px;
}
#ate-msg span {
	display:block;
	position:relative;
	padding-left:20px;
	bottom:4px;
	border:0;
}
#ate-msg span textarea {
	display:block;
	height:178px;
	height:120px;
	width:97%;
	border:0;
	margin:0;
	font-family:arial, helvetica, sans-serif;
	font-size:13px;
	outline:none;
	background:transparent;
	padding:15px 0 0 0;
}
#ate-msg span textarea:focus {
	color:#000;
}
#ate-sharelink {
	position:relative;
	border-top:1px solid #e4e4e4;
	padding:12px 20px;
	font-size:13px;
	color:#666;
	cursor:default;
}
#ate-sharelink label {
	display:block;
	width:40px;
	float:left;
}
#ate-sharelink p {
	width:90%;
	padding:0;
	margin:0;
	white-space:nowrap;
	overflow:hidden;
	text-overflow:ellipsis;
	_text-overflow:hidden;
	float:left;
}
#lengthlimit {
	position:absolute;
	bottom:0;
*bottom:133px;
	right:30px;
	background:rgba(255, 255, 255, .8);
	padding:10px;
	font-size:11px;
	color:#999;
	cursor:default;
	z-index:1000;
}
#ate-promo {
	margin-top:100px;
	text-align:center;
}
#ate-promo h3 {
	margin:0;
	padding:25px 0;
	font-family:"Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size:32px;
	font-weight:normal;
	letter-spacing:-1px;
}
#ate-promo .addthis_toolbox {
	margin:0 auto;
	width:240px;
	height:64px;
	overflow:hidden;
}
#ate-promo .addthis_toolbox a span {
	background:url(images/addthis_twitter_facebook_icons.jpg) no-repeat!important;
	width:64px;
	height:64px;
	line-height:64px;
	margin:0 6px;
	_margin:0 2px;
}
#ate-promo .addthis_toolbox .at15t_facebook {
	background-position:0 0!important;
}
#ate-promo .addthis_toolbox .at15t_twitter {
	background-position:0 -64px!important;
}
#ate-promo .addthis_toolbox .fake_addthis_button {
	background-position:0 -128px!important;
}
#ate-promo .promo-sent {
	background:url('images/checkmark-lg.jpg') no-repeat top center;
	padding-top:130px;
	margin-top:50px;
	text-align:center;
	width:100%;
}
#ate-send {
	position:relative;
	bottom:8px;
	left:0;
	right:0;
}
#ate-send .ate-send-inner {
	position:relative;
	border-top:1px solid #e4e4e4;
	height:75px;
*height:85px;
}
#ate-send .load-send-inner {
	position:relative;
	margin-top:20px;
}
#ate-send p {
	position:absolute;
	top:32px;
	left:20px;
	width:360px;
	padding:0;
	margin:0;
	font-size:11px;
	color:#666;
}
#ate-send p.msg-noicons small {
	width:400px;
}
#ate-send .btn-blue {
	position:absolute;
	top:22px;
	right:20px;
}
#ate-send small {
	display:block;
	width:232px;
	font-size:13px;
	float:left;
}
#ate-send a {
	display:block;
	width:16px;
	height:16px;
	line-height:16px;
	text-indent:-9999px;
	overflow:hidden;
	margin:0 4px;
	float:left;
}
.btn-blue {
	background:#098df4;
	background-image:linear-gradient(top, #0d98fb, #1a5db3);
	background-image:-webkit-linear-gradient(#0d98fb, #1a5db3);
	background-image:-moz-linear-gradient(#0d98fb, #1a5db3);
	background-image:-ms-linear-gradient(top, #0d98fb, #1a5db3);
	border:1px solid #125cb5;
	border:none\9;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	box-shadow:0 1px 1px #71c0fd inset;
	padding:8px 20px;
*padding:8px;
	font-weight:400;
	font-size:14px;
	color:#fff;
}
.btn-blue:hover {
	background:#098df4;
	background-image:linear-gradient(top, #0a85dd, #104c97);
	background-image:-webkit-linear-gradient(#0a85dd, #104c97);
	background-image:-moz-linear-gradient(#0a85dd, #104c97);
	background-image:-ms-linear-gradient(top, #0a85dd, #104c97);
	text-decoration:none;
	color:#fff;
	cursor:pointer;
}
.btn-blue:active {
	background:#125cb5;
	box-shadow:none;
}
#ate-send .btn-gry {
	position:absolute;
	top:20px;
	right:20px;
}
.btn-gry {
	background:#f5f5f5;
	background-image:-webkit-gradient(linear, left bottom, left top, color-stop(0.3, #eceded), color-stop(0.65, #fdfdfd));
	background-image:-moz-linear-gradient(center bottom, #eceded 30%, #fdfdfd 65%);
	border:1px solid #aaa;
	padding:10px 20px;
*padding:10px;
	font-weight:bold;
	line-height:1em;
	color:#000;
	cursor:pointer;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
}
.btn-gry:hover {
	background:e7e9e9;
	background-image:-webkit-gradient(linear, left bottom, left top, color-stop(0.3, #d3d5d5), color-stop(0.65, #f5f5f5));
	background-image:-moz-linear-gradient(center bottom, #d3d5d5 30%, #f5f5f5 65%);
}
.btn-gry:active {
	background:#cacaca;
}
#footer {
	position:fixed;
	_position:absolute;
	bottom:0;
	left:0;
	width:100%;
	background:#fff;
	border-top:1px solid #d4d4d4;
	padding:6px 0 6px 20px;
	font-size:11px;
	z-index:1;
}
#footer a {
	margin-right:10px;
	text-decoration:none;
	color:#666;
}
#footer a:hover {
	text-decoration:none;
	color:#07c;
}
#atlogo-sm {
	position:absolute;
	top:6px;
	right:30px;
	background:url(images/atlogo-sm.gif) no-repeat left;
	padding-left:10px;
}
.lgry, .lgry input {
	color:#c6c6c6!important;
	_width:100%;
}
.at-clear {
	clear:both;
}
#lb {
	position:fixed;
	_position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	z-index:10001;
	background:#000;
	background:rgba(0, 0, 0, .75);
	filter:alpha(opacity=75);
}
#captcha {
	position:absolute;
	top:50%;
	left:50%;
	width:315px;
	height:180px;
	margin:-120px 0 0 -172px;
	padding:20px;
	z-index:10002;
	background:#fff;
	border-radius:8px;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
}
#captcha button {
	margin-top:22px;
}
@media screen and/*!YUI Compressor */(min-width:200px) and/*!YUI Compressor */(max-width:560px) {
#ate-send .btn-blue {
position:absolute;
top:62px;
right:auto;
left:18px;
}
}
</style>
<script language="javascript">
function validEmail(b){
	b=b.replace(/^\s+|\s+$/g,"");
	if(b.split("@").length!=2||b.indexOf(".")==-1||b.length>256){
		
	
	}else{
		}
	var a=new RegExp("^[a-z0-9,!#$%&'*+/=?^_`{|}~-]+(.[a-z0-9,!#$%&'*+/=?^_`{|}~-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*.([a-z]{2,})$");
	return String(b.toLowerCase()).search(a)!=-1
	}
	var hadError;
function validate(){
	hadError=0;
	if(!validEmail($("#em-e").val())||$("#em-e").val().split(",").length>1){
		addError("Please enter a valid email address.","#em-e")
		}
	var b=$("#em-f").val().split(",");
	if(!b.length||$("#em-f").val().indexOf("@")==-1){
		
		addError("Please enter a valid email address.","#em-f")
	
	}else{
		
		if(b.length>5){
			
			addError("Please enter no more than five email addresses.","#em-f")
		
		}else{
			
			for(var a=0;a<b.length;a++){if(!validEmail(b[a])){addError("Please enter a valid email address.","#em-f")}}
			
			}
			
	}
	if($("#note").val()==defaultNote){$("#note").val("")}
	if(!hadError == true){
		var order = 'from='+$('#em-e').val()+'&to='+$('#em-f').val()+'&objet='+$('#em-s').val()+'&texte='+$('#note').val()+'&url='+$('#url').val();
		$('#load-send-inner').empty().html('Envoi en cours...');
			$.post("../envoi_social.php", order, function(theResponse){
			if(theResponse == '1'){
				$('#load-send-inner').empty().html('Email envoyer.');
				}else{
				$('#load-send-inner').empty().html("Une erreur s'est produite lors de l'envoi de l'e-mail.");
				}
			}); 
		}
	return false
	
	
	}function resetError(a){$(a).removeClass("error");$(a).parent().parent().parent().removeClass("row-error");error()}function addError(b,a){if(!hadError){hadError=1;error(b,a)}$(a).addClass("error");$(a).parent().parent().parent().addClass("row-error")}function error(b,a){if(!b){$("#ate-label").html("Email")}else{$(".at3lb-light").show();$("#ate-label").html(b)}}var defaultNote="";(function(){$(window).ready(function(){if($("#note").html()==""){$("#note").val(defaultNote)}$("input").focus(function(){$("#ate-label").html("Email");resetError($(this))});$("textarea").focus(function(){resetError($(this))});$("#email-cancel").click(function(){window.close()});$("#errButton").click(function(){$(".at3lb-light").hide()});var a=function(){if($("#note").val().length>=255){$("#note").val($("#note").val().substr(0,255))}$("#lengthlimit").html((255-$("#note").val().length));if(255-$("#note").val().length<10){$("#lengthlimit").css("color","#ff0000")}else{$("#lengthlimit").css("color","#666666")}};$("#note").keydown(a).change(a);if($("#recaptcha_response_field").length){$("#recaptcha_response_field").focus()}else{$("#em-f").focus().val($("#em-f").val())}if(window.nucaptchaData){mySiteTokenHandler(nucaptchaData)}})})();function mySiteRenderHandler(a){}function mySiteTokenHandler(b,a){ncaLoadPlayer("captcha-widget",b,a||"",mySiteRenderHandler)}function mySiteValidateHandler(a){ncReinitializePlayer(a)}function ncRenderErrorPlayer(a){window.console&&console.log(a)}function mySiteSendValidate(){}function emailsentMore(){if(_ate.xf.upm){_ate.xf.send(window.parent,"addthis.expanded.pane",{pane:"default"});return false}else{return true}};
$(function(){
<?php if($_POST["title"] != ''){?>
$('#em-s').val('<?php echo $_POST["title"]; ?>');
<?php	}else{?>
$('#em-s').val($(document).find('title').html());
<?php } ?>	
	
});
</script>
</head>

<body>
<form action="" method="post" onsubmit="return validate();">
  <input type="hidden" value="<?php echo $_POST["url"]; ?>" name="url" id="url">
  <div style="display:none;" id="captcha">
    <div style="width:315px;height:130px;background:#fff;">
      <div id="captcha-widget"></div>
    </div>
    <div align="center">
      <button type="submit" class="btn-gry">Send Email</button>
    </div>
  </div>
  <div class="atemail" id="atemail3">
    <div class="atemail-form"> 
      <!--<div class="ate-head"><h2 id="ate-label">Email</h2></div>-->
      <div class="ate-info">
        <div class="emailrow">
          <label for="em-f">A:</label>
          <p><span class="emailrow-input">
            <input type="text" value="" placeholder="" spellcheck="true" maxlength="255" name="tofriend" id="em-f">
            </span></p>
        </div>
        <div class="emailrow ">
          <label for="em-e">De:</label>
          <p> <span class="emailrow-input">
            <input type="text" value="" placeholder="" spellcheck="true" maxlength="255" name="fromemail" id="em-e">
            </span></p>
        </div>
        <div class="emailrow">
          <label for="em-s">Sujet:</label>
          <p><span class="emailrow-input" style="left:70px;">
            <input type="text" value="" readonly="readonly" placeholder="" spellcheck="true" maxlength="1024" name="cSubject" id="em-s">
            </span></p>
        </div>
      </div>
    </div>
  </div>
  <div id="ate-msg"> <span>
    <textarea name="note" id="note"><?php if($_POST["texte"] != ''){echo $_POST["texte"];}else{echo '';} ?></textarea>
    </span>
    <div id="lengthlimit" style="color: rgb(102, 102, 102);">255</div>
    </div>
  <div id="ate-sharelink">
    <label>URL:</label>
    <p><?php echo $_POST["url"]; ?></p>
    <div class="at-clear"></div>
  </div>
  <div id="ate-send">
    <div class="ate-send-inner">
     <div class="load-send-inner" id="load-send-inner"></div> <button title="Envoyez un Courriel" type="submit" class="btn-blue">Envoyez un Courriel</button>
    </div>
  </div>
</form>
</body>
</html>