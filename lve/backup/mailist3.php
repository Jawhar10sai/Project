<style>
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #716767;
	line-height:18px;
}
a{
color:#716767;
text-decoration:none;
}
.zonetxt{
border:solid 1px;
 border-color:#dbdbdb;
}

.btn{
border:solid 1px; 
border-color:#999999; 
color:#716767; 
background-color:#edeae7;
font-size:11px;
}


</style>   
    <?php
include("mysql.php");
if($_REQUEST['email']==""){
?>
<div style="background:url(img/bg_paragraphe.png) no-repeat; width:231px; padding-top:5px; height:151px;  ">
<div>&nbsp;&nbsp;<img src="img/newsletter.jpg" style="margin-top:px;" width="213" height="61" /> 
  </div> 
  <div style=" padding-left:10px;">  <img src="img/puce_fleche.jpg" />&nbsp;<span class="titre1">Newsletter</span><br />
    <a href="#">R&eacute;stez inform&eacute; </a><a href="#"></a>en vous inscrivant &agrave; notre newsletter 
    <br />
  <form id="contacts_mail" name="contacts_mail" action="<?= $_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" value="1" name="trait" />
    <input name="email" type="text" id="email"  style="width:116px;"  class="zonetxt">&nbsp;<input name="button2" type="button" id="button2"   class="btn"  onclick="send('contacts_mail');return false;" value="Envoyer" />
    </form>
&nbsp;</div>
		  
 <br />
</div>
<script type="text/javascript" language="javascript">
			function send(form){
				var form=document.getElementById(form);
				var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				var max_size = 1000;
				for (i = 0; i < form.elements.length; i++) {

					if ( (form.elements[i].type == "text"  || form.elements[i].type=='textarea') && (form.elements[i].name=='pays' || form.elements[i].name=='cp' || form.elements[i].name=='gsm' || form.elements[i].name=='nom' || form.elements[i].name=='email' || form.elements[i].name=='prenom'))
					{
						if (form.elements[i].value=='')
						{
							//alert(form.elements[i].name);
							alert('Veuillez remplir les champs obligatoires.');
							form.elements[i].style.border = 'solid red 1px';
							return form.elements[i].focus();
						}
						else
							{
								if (form.elements[i].name=='email')
								{
									if (filter.test(form.elements[i].value)==false)
									{
										alert("L\47adresse e-mail n'est pas valide.");
										form.elements[i].style.border = 'solid red 1px';
										return form.elements[i].focus();
									}
								}
								form.elements[i].style.border = 'solid green 1px';
							}
						}

					}
//					if (form.message.value !='' && form.message.value.length>max_size)
//					{
//						form.message.value = form.message.value.slice(0,max_size);
//						alert('Message limit\351 \340 '+ max_size +' caract\350res.');
//						return form.message.focus();
//					}
					form.submit();;
				}
			          </script><?

}else{
		$r = mysql_query("SELECT * FROM `mailling` WHERE email = '". $_POST["email"] . "'") or die(mysql_error());
		if (mysql_num_rows($r) == 0) {
		mysql_query("INSERT INTO `mailling` (email) VALUES ('". $_POST["email"] . "')");
		$msg='<center>
<span style=\"color:green\">
Votre adresse a bien été enregistrée. 
</span>
</center>';
$headers  =  "From: lavoieexpress.com <".$_POST['email'].">\n";
$headers .= "Reply-To: ".$_POST['email']."\n";
$headers .= "MIME-VERSION: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8;\n";
$headers .= "Content-Transfer-Encoding: 8bit;\n";
$emaill = 'najib.fadil@gmail.com';
$objet = "Newsletter ...";

$mail='
            <table cellspacing="5" cellpadding="0" border="0" style="font-family:verdana; font-size:12px">
              <tbody>
                <tr>
                  <td width="127" align="left"><b>E-mail :</b></td>
                  <td width="274" align="left">
                    '.$_POST['email'].' 
                  </td>
                </tr>
                </table>
                ';
mail($emaill, $objet, $mail, $headers) or die ("ca va pas");		  
}
		else
		$msg = "<center>
<span style=\"color:red\">Adresse E-mail déjà existante !!!</span><br />
&nbsp;<br /></center>";

echo $msg;

}
	?>
