<?php 

session_start();
			//require_once("functions.php");
			//$query=new functions; 
			
			$destinataire ="i.ajana@lavoieexpress.ma"; 
		
			$objet = "RECLAMATION -  [ siteweb ] " ;
			
			
			$headers = 'From:<i.ajana@lavoieexpress.ma>'."\n";
			$headers .= 'Return-Path: <i.ajana@lavoieexpress.ma>'."\n";
			$headers .= 'MIME-Version: 1.0'."\n";
			$headers .='Content-Type: text/html; charset="utf-8"'."\n";
			$headers .='Content-Transfer-Encoding: 8bit';
			
			
			
			$client=(isset($_GET['client']) && $_GET['client'] != "")?$_GET['client']:"";
			$codeClient=(isset($_GET['codeClient']) && $_GET['codeClient'] != "" && $_GET['codeClient'] !='undefined')?$_GET['codeClient']:"0";
			$telFix=(isset($_GET['telFix']) && $_GET['telFix'] != "")?$_GET['telFix']:"";
			$telGSM=(isset($_GET['telGSM']) && $_GET['telGSM'] != "")?$_GET['telGSM']:"";
			$nDeclaration=(isset($_GET['nDeclaration']) && $_GET['nDeclaration'] != "")?$_GET['nDeclaration']:"";
			$expediteur=(isset($_GET['expediteur']) && $_GET['expediteur'] != "")?$_GET['expediteur']:"";
			$recObjet=(isset($_GET['recObjet']) && $_GET['recObjet'] != "")?$_GET['recObjet']:"";
			//$complement=(isset($_GET['complement']) && $_GET['complement'] != "")?$_GET['complement']:"";

			$chaine=urlencode($client)."/".urlencode($codeClient)."/".urlencode($telFix)."/".urlencode($telGSM)."/".urlencode($nDeclaration)."/".urlencode($expediteur)."/".urlencode($recObjet);
			//$insert=$query->insert_rec($client,$codeClient,$telFix,$telGSM,$nDeclaration,$expediteur,$recObjet);
			//echo $insert;
			
			
			$message="<html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\"><head><meta http-equiv=Content-Type content=\"text/html; charset=utf-8\"><meta name=Generator content=\"Microsoft Word 12 (filtered medium)\"><style><!-- /* Font Definitions */ @font-face	{font-family:\"Cambria Math\";	panose-1:2 4 5 3 5 4 6 3 2 4;}@font-face	{font-family:Calibri;	panose-1:2 15 5 2 2 2 4 3 2 4;}@font-face	{font-family:Tahoma;	panose-1:2 11 6 4 3 5 4 4 2 4;}@font-face	{font-family:Verdana;	panose-1:2 11 6 4 3 5 4 4 2 4;} /* Style Definitions */ p.MsoNormal, li.MsoNormal, div.MsoNormal	{margin:0cm;	margin-bottom:.0001pt;	font-size:11.0pt;	font-family:\"Calibri\",\"sans-serif\";}a:link, span.MsoHyperlink	{mso-style-priority:99;	color:blue;	text-decoration:underline;}a:visited, span.MsoHyperlinkFollowed	{mso-style-priority:99;	color:purple;	text-decoration:underline;}p.MsoAcetate, li.MsoAcetate, div.MsoAcetate	{mso-style-priority:99;	mso-style-link:\"Texte de bulles Car\";	margin:0cm;	margin-bottom:.0001pt;	font-size:8.0pt;	font-family:\"Tahoma\",\"sans-serif\";}span.TextedebullesCar	{mso-style-name:\"Texte de bulles Car\";	mso-style-priority:99;	mso-style-link:\"Texte de bulles\";	font-family:\"Tahoma\",\"sans-serif\";}span.EmailStyle19	{mso-style-type:personal;	font-family:\"Calibri\",\"sans-serif\";	color:windowtext;}span.apple-converted-space	{mso-style-name:apple-converted-space;}span.EmailStyle21	{mso-style-type:personal;	font-family:\"Calibri\",\"sans-serif\";	color:#1F497D;}span.EmailStyle22	{mso-style-type:personal-reply;	font-family:\"Calibri\",\"sans-serif\";	color:#1F497D;}.MsoChpDefault	{mso-style-type:export-only;	font-size:10.0pt;}@page Section1	{size:612.0pt 792.0pt;	margin:72.0pt 90.0pt 72.0pt 90.0pt;}div.Section1	{page:Section1;}--></style><!--[if gte mso 9]><xml> <o:shapedefaults v:ext=\"edit\" spidmax=\"1026\" /></xml><![endif]--><!--[if gte mso 9]><xml> <o:shapelayout v:ext=\"edit\">  <o:idmap v:ext=\"edit\" data=\"1\" /> </o:shapelayout></xml><![endif]--></head><body lang=FR link=blue vlink=purple><div class=Section1><p class=MsoNormal><o:p>&nbsp;</o:p></p><table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse'> <tr style='height:23.75pt'>  <td width=810 colspan=4 style='width:607.35pt;border:solid #A6A6A6 1.0pt;  border-bottom:none;background:red;padding:0cm 5.4pt 0cm 5.4pt;height:23.75pt'>  <p class=MsoNormal align=center style='text-align:center'><b><span  style='font-family:\"Verdana\",\"sans-serif\";color:white;background:red;  mso-highlight:red'>RECLAMATION DEPUIS SITE WEB</span></b><span  style='font-family:\"Verdana\",\"sans-serif\";color:white'><o:p></o:p></span></p>  </td> </tr> <tr style='height:13.55pt'>  <td width=249 valign=top style='width:187.05pt;border:none;border-left:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt'>  <p class=MsoNormal><b><span style='background:white'>Nom Client :</span><o:p></o:p></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;padding:0cm 5.4pt 0cm 5.4pt;  height:13.55pt'>  <p class=MsoNormal><span style='background:white'> $client <o:p></o:p></span></p>  </td>  <td width=187 valign=top style='width:140.1pt;padding:0cm 5.4pt 0cm 5.4pt;  height:13.55pt'>  <p class=MsoNormal><b><span style='background:white'>Code :<o:p></o:p></span></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;border:none;border-right:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt'>  <p class=MsoNormal><span style='color:black;background:white'> $codeClient<o:p></o:p></span></p>  </td> </tr> <tr style='height:13.55pt'>  <td width=249 valign=top style='width:187.05pt;border:none;border-left:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt'>  <p class=MsoNormal><b>Tél. FIX :<o:p></o:p></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;padding:0cm 5.4pt 0cm 5.4pt;  height:13.55pt'>  <p class=MsoNormal><span style='background:white'> $telFix<o:p></o:p></span></p>  </td>  <td width=187 valign=top style='width:140.1pt;padding:0cm 5.4pt 0cm 5.4pt;  height:13.55pt'>  <p class=MsoNormal><b><span style='background:white'>Tél. GSM&nbsp;:<o:p></o:p></span></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;border:none;border-right:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt'>  <p class=MsoNormal><span style='color:black;background:white'> $telGSM<o:p></o:p></span></p>  </td> </tr> <tr style='height:13.55pt'>  <td width=249 valign=top style='width:187.05pt;border:none;border-left:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt'>  <p class=MsoNormal><b>N° Déclaration :<o:p></o:p></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;padding:0cm 5.4pt 0cm 5.4pt;  height:13.55pt'>  <p class=MsoNormal><span style='background:white'> $nDeclaration<o:p></o:p></span></p>  </td>  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=374 colspan=2><p class='MsoNormal'>&nbsp;</td> </tr> <tr style='height:11.95pt'>  <td width=249 valign=top style='width:187.05pt;border:none;border-left:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:11.95pt'>  <p class=MsoNormal><b>Réclamation par :<o:p></o:p></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;padding:0cm 5.4pt 0cm 5.4pt;  height:11.95pt'>  <p class=MsoNormal><span style='background:white'> $expediteur<o:p></o:p></span></p>  </td>  <td style='border:none;padding:0cm 0cm 0cm 0cm' width=374 colspan=2><p class='MsoNormal'>&nbsp;</td> </tr> <tr style='height:13.55pt'>  <td width=249 valign=top style='width:187.05pt;border:none;border-left:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt'>  <p class=MsoNormal><b>Objet  : <o:p></o:p></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;padding:0cm 5.4pt 0cm 5.4pt;  height:13.55pt'>  <p class=MsoNormal><span style='background:white'> $recObjet<o:p></o:p></span></p>  </td>  <td width=187 valign=top style='width:140.1pt;padding:0cm 5.4pt 0cm 5.4pt;  height:13.55pt'>  <p class=MsoNormal><b><span style='background:white'><o:p>&nbsp;</o:p></span></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;border:none;border-right:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:13.55pt'>  <p class=MsoNormal><b><span style='color:black;background:white'><o:p>&nbsp;</o:p></span></b></p> </td> </tr> <tr style='height:6.0pt'>  <td width=249 valign=top style='width:187.05pt;border-top:none;border-left:  solid #A6A6A6 1.0pt;border-bottom:solid #A6A6A6 1.0pt;border-right:none;  padding:0cm 5.4pt 0cm 5.4pt;height:6.0pt'></td>  <td width=187 valign=top style='width:140.1pt;border:none;border-bottom:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:6.0pt'></td>  <td width=187 valign=top style='width:140.1pt;border:none;border-bottom:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:6.0pt'>  <p class=MsoNormal><b><span style='font-size:10.0pt;color:black;background:  white'><o:p>&nbsp;</o:p></span></b></p>  </td>  <td width=187 valign=top style='width:140.1pt;border-top:none;border-left:  none;border-bottom:solid #A6A6A6 1.0pt;border-right:solid #A6A6A6 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:6.0pt'>  <p class=MsoNormal><b><span style='font-size:10.0pt;color:black;background:  white'><o:p>&nbsp;</o:p></span></b></p>  </td> </tr></table><p class=MsoNormal><span style='font-size:12.0pt;font-family:\"Times New Roman\",\"serif\"'><o:p>&nbsp;</o:p></span></p></div></body></html>";
			

			
	if (isset($_REQUEST['userCaptchaCode']) && !empty($_REQUEST['userCaptchaCode']) && md5($$_REQUEST['userCaptchaCode']) == $_SESSION['sysCaptchaCode']) {
	    @mail($destinataire, $objet, $message, $headers);
		echo file_get_contents("http://46.18.132.236:8088/wsReclamation/lavoieexpress/saveRec/".$chaine);

	}else{
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
		$xml += "<lavoieexpress>";
		$xml += "<reclamation>-1</reclamation>";
		$xml += "</lavoieexpress>";
		echo $xml;
	}
			
		
	


?> 
