<?php
$date = date("Y-m-d H:i:s");
//GETTING VARIABLES START
if (isset($_POST['action'])) {
require("../config/connect.php");
require("../config/connect_m.php");
require("../functions/reglages.php");
require("../functions/lang/fr.php");
include("../wmailer/class.mailer.php");


	$action = mysql_real_escape_string($_POST['action']);
}
if (isset($_POST['pollAnswerID'])) {
	$pollAnswerID	= mysql_real_escape_string($_POST['pollAnswerID']); 
}
if (isset($_POST['pollID'])) {
	$pollID	= mysql_real_escape_string($_POST['pollID']); 
}

if (isset($_POST['idsite'])) {
	$idsite	= mysql_real_escape_string($_POST['idsite']); 
}
//if (isset($_POST['filtre']) && $_POST['filtre'] > 0) {
	$filtre	= mysql_real_escape_string($_POST['filtre']); 

	$queryTheme  = "SELECT * FROM themes_sondage  WHERE id_site = '" . $idsite . "'";
	$resultTheme = mysql_query($queryTheme,$connect);
	$donneTheme = mysql_fetch_array($resultTheme);
	$numTheme = mysql_num_rows($resultTheme);
//}
//GETTING VARIABLES END



//show START
if ($action == "show"){
	
	
	if (isset($_POST['theme']) && $_POST['theme'] == 1) {
	$queryPoll  = "SELECT * FROM question_sondage  WHERE id_theme = " . $pollID . " ORDER BY ordre ASC";
	}else{
		if($filtre == 1){
	$queryPoll  = "SELECT * FROM question_sondage  WHERE id = " . $pollID . " ORDER BY ordre ASC";
			}else{
	$queryPoll  = "SELECT * FROM question_sondage  WHERE id_sondage = " . $pollID . " ORDER BY ordre ASC";
			}
		}
	
	$resultPoll = mysql_query($queryPoll,$connect);
	$donnePoll = mysql_fetch_array($resultPoll);
	
	//echo $queryPoll;
	
	$queryParam  = "SELECT * FROM parametres_sondage  WHERE id = ". $donnePoll['id_sondage'];
	$resultParam = mysql_query($queryParam,$connect);
	$donneParam = mysql_fetch_array($resultParam);
	

	 $secure = $donneParam['securise'];
	
	
	if($numTheme > 0 && $filtre != 1 && $donneTheme['type'] == 1){
	$filtrePoll = '
	<form id="frm_sondage" method="post"> <strong>Thèmes : </strong>
	<select id="filtrePoll" name="filtrePoll" onchange="frm_sondage.submit();">';
	do{
	$filtrePoll .= '<option value="'.$donneTheme['id'].'"';
	if($donneTheme['id'] == $pollID){
		$filtrePoll .= 'selected="selected"';
		}
	
	$filtrePoll .= '>'.$donneTheme['theme'].'</option>';	
		
	}while($donneTheme = mysql_fetch_array($resultTheme));
	
       $filtrePoll .=   '</select></form><br />';
		
	}else{
		$filtrePoll = '';
		}
	
	
	if($donneParam['type'] == 2){
		$typePoll = 'Enquete';
		}else{
		$typePoll = 'Sondage';
			}
			
			
	if($typePoll == 'Sondage'){
		if (isset($_POST['theme']) && $_POST['theme'] == 1) {
	$queryPoll  = "SELECT * FROM question_sondage  WHERE id_theme = " . $pollID . " ORDER BY ordre ASC";	
		}else{
			if($filtre == 1){
	$queryPoll  = "SELECT * FROM question_sondage  WHERE id = " . $pollID . " ORDER BY ordre ASC";	
			}else{
	$queryPoll  = "SELECT * FROM question_sondage  WHERE id_sondage = " . $pollID . " ORDER BY ordre ASC";	
			}
			}
		
	}else{
	$queryPoll  = "SELECT * FROM question_sondage  WHERE id_sondage = " . $pollID . " and ordre = ".$_POST['ordre']." order by ordre ASC LIMIT 1";
	}
	
	
	$resultPoll = mysql_query($queryPoll,$connect);
	$donnePoll = mysql_fetch_array($resultPoll);
	$numDonnePoll = mysql_num_rows($resultPoll);
	
	
	
	
	if($secure == 1){
	
	$query_voted  = "SELECT adresse_ip FROM rep_user_ques WHERE id_question = '".$donnePoll['id']."' AND id_user = '".$_SESSION['id_acces']."'";
	$result_voted = mysql_query($query_voted,$connect_m);
	$num_voted = mysql_num_rows($result_voted);
		
		
		}else{
	
	$query_voted  = "SELECT adresse_ip FROM rep_user_ques WHERE id_question = '".$donnePoll['id']."' AND adresse_ip = '".$_SERVER["REMOTE_ADDR"]."'";
	$result_voted = mysql_query($query_voted,$connect_m);
	$num_voted = mysql_num_rows($result_voted);
			
			}
	
	
	
		

	
	if($numDonnePoll > 0){
	
	if($typePoll == 'Sondage'){
		
		
		if($num_voted > 0){ ?>
			
			<script language="javascript">
			$(document).ready(function() {  
			showPollResult("<?php echo $donnePoll['id']; ?>");
			});
			</script>
		<?php 
		}
		
		
		
	$pollStartHtml = '';
	$pollAnswersHtml = '';
	$pollEndHtml = '';
	
	
	 if(isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != ''){ 
      // $pollStartHtml 	.= 'Bonjour <strong>'.$_SESSION['nom_acces'].'</strong><br /><a href="'.SITEPATH.'logout_acces.php">'.LOGOUT.'</a><br /><br />';
			 }
		$pollStartHtml 	.= '<div id="pollWrap"><form name="pollForm" method="post" >';
			
		do{
		
		
	$query  = "SELECT * FROM question_sondage q LEFT JOIN reponse_sondage r ON q.id = r.id_question WHERE q.id = " . $donnePoll['id'] . "";
	$result = mysql_query($query,$connect);
	$row = mysql_fetch_array($result);
	//echo $query;jquery
		$pollQuestion 		= $row['question'];	
	
	$date1 = date("Y-m-d H:i:s");
$date2 = $row['date_fin'];

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);
if($ts2 > 0){
$seconds_diff = $ts2 - $ts1;
}else{
$seconds_diff = 1;
	}
	
			$pollAnswersHtml .= '<div class="sondage"><h3>' . stripslashes($pollQuestion) .'</h3>';
			if($donnePoll['show_image'] == 1 && $donnePoll['image'] != ''){
				
			$pollAnswersHtml .= '<img width="27%" src="'.$donnePoll['image'].'" style="float:left;margin-right:3%">';
			$pollAnswersHtml .= '<ul style="width:70% !important" id="Question_'.$donnePoll['id'].'" data-idSondage="'.$donnePoll['id_sondage'].'">';
				}else{
					
			$pollAnswersHtml .= '<ul id="Question_'.$donnePoll['id'].'" data-idSondage="'.$donnePoll['id_sondage'].'">';
					}
			
			
	
	
	do
	{
		$pollAnswerID 		= $row['id'];	
		$pollAnswerValue	= $row['reponse'];
		if($row['type'] == 1){
			$type	=   'radio';
		}else{
			$type	=   'radio';//'checkbox';
			}
		
		
		$pollAnswersHtml	= $pollAnswersHtml . '<li><input';
		if($num_voted > 0){$pollAnswersHtml	= $pollAnswersHtml .' disabled="disabled"';}
		$pollAnswersHtml	= $pollAnswersHtml .' name="pollAnswerID'.$donnePoll['id'].'" id="pollRadioButton' . $pollAnswerID . '" type="'.$type.'" value="' . $pollAnswerID . '" /> ' . $pollAnswerValue .'<span id="pollAnswer' . $pollAnswerID . '"></span></li>';
		if($num_voted == 0){
		$pollAnswersHtml	= $pollAnswersHtml . '<li class="pollChart pollChart' . $pollAnswerID . '"><span></span></li>';
		}else{
		$pollAnswersHtml	= $pollAnswersHtml . '<li class="pollChartVoted pollChart' . $pollAnswerID . '"><span></span></li>';
		}
		
		
		
		
		
	}while($row = mysql_fetch_array($result));
	
	
			$pollAnswersHtml 	.= '</ul>';
			if($num_voted == 0){
			if($seconds_diff > 0){
			
			if($_POST['show'] == 1){
			$pollAnswersHtml 	.= '<input type="submit" name="pollSubmit'.$donnePoll['id'].'" id="pollSubmitMultiple'.$donnePoll['id'].'" data-type="'.$typePoll.'" data-secure="'.$secure.'" value="Voter" class="send" /> <span class="pollMessage" id="pollMessage'.$donnePoll['id'].'"></span><img src="'.SITEPATH.'img/progress.gif" alt="Chargement"  class="pollAjaxLoader" id="pollAjaxLoader'.$donnePoll['id'].'" width="16" /></div>';	
					}else{
			$pollAnswersHtml 	.= '<input type="submit" name="pollConnect" id="pollConnect" value="Connexion" class="send" /> <span class="pollMessage" id="pollMessage'.$donnePoll['id'].'"></span><img src="'.SITEPATH.'img/progress.gif" alt="Chargement" class="pollAjaxLoader" id="pollAjaxLoader'.$donnePoll['id'].'" width="16" /></div>';	
			}
			}else{
				$pollAnswersHtml 	.= ' <span class="pollMessage" id="pollMessage'.$donnePoll['id'].'"><input type="button" name="pollConnect" value="Dsl. sondage expirée" class="send" /></div>';	
				}
			}else{
				$pollAnswersHtml 	.= "</div>";
				}
	}while($donnePoll = mysql_fetch_array($resultPoll));
	
		$pollEndHtml .= '</form></div>';
	
	echo $filtrePoll.$pollStartHtml . $pollAnswersHtml . $pollEndHtml;
		
	} else{
		if($num_voted > 0){
		
		echo "voted";
		exit();
		}else{
$date1 = date("Y-m-d H:i:s");
$date2 = $donneParam['date_fin'];
	
		$ts1 = strtotime($date1);
$ts2 = strtotime($date2);
if($ts2 > 0){
$seconds_diff = $ts2 - $ts1;
}else{
$seconds_diff = 1;
	}
		
		
		
	$query  = "SELECT * FROM question_sondage q LEFT JOIN reponse_sondage r ON q.id = r.id_question WHERE q.id = " . $donnePoll['id'] . "";
	$result = mysql_query($query,$connect);
	//echo $query;jquery
	
	$pollStartHtml = '';
	$pollAnswersHtml = '';
	
	
	while($row = mysql_fetch_array($result))
	{
		$pollQuestion 		= $row['question'];	
		$pollAnswerID 		= $row['id'];	
		$pollAnswerValue	= $row['reponse'];
		if($row['type'] == 1){
			$type	=   'radio';
		}else{
			$type	=   'radio';//'checkbox';
			}
		
		if ($pollStartHtml == '') {
			 if(isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != ''){ 
       //$pollStartHtml 	= 'Bonjour <strong>'.$_SESSION['nom_acces'].'</strong><br /><a href="'.SITEPATH.'logout_acces.php">'.LOGOUT.'</a>';
			 }
			
			
			$pollStartHtml 	.= '<div id="pollWrap">';
			
			if($ts2 > 0){
	$pollStartHtml .= '
		<div style="float: left; margin-bottom: 10px; text-align: left;width:100% !important;"><div style="float:left; margin-right:10px;width:auto !important;">Cette enquête se terminera dans : </div><div id="defaultCountdown"></div></div><br />
	
	<script type="text/javascript">
$(function () {
	austDay = new Date('.substr($date2,0,4).', '.substr($date2,5,2).' - 1, '.substr($date2,8,2).' );
	$("#defaultCountdown").countdown({until: austDay});
});
</script>
	
	';}
			
			
			
			$pollStartHtml .= '<form name="pollForm" method="post" action="inc/functions.php?action=vote" id="Question_'.$donnePoll['id'].'" data-idSondage="'.$donnePoll['id_sondage'].'"><h3>' . stripslashes($pollQuestion) .'</h3>';
			if($donnePoll['show_image'] == 1 && $donnePoll['image'] != ''){
				
			$pollAnswersHtml .= '<img width="30%" src="'.$donnePoll['image'].'" style="float:left;">';
			$pollAnswersHtml .= '<ul style="width:70% !important">';
				}else{
					
			$pollAnswersHtml .= '<ul>';
					}
			
			
			$pollEndHtml 	= '</ul>';
			if($seconds_diff > 0){
			
			
				if($_POST['show'] == 1){
			$pollEndHtml 	.= '<input type="submit" name="pollSubmit" id="pollSubmitEtap" data-idsite = "'.$idsite.'" data-filtre = "'.$filtre.'" data-type="'.$typePoll.'"  data-secure="'.$secure.'" value="Etape Suivante &raquo;" class="send" /> <span id="pollMessage"  class="pollMessage"></span><img src="'.SITEPATH.'img/progress.gif" alt="Chargement" class="pollAjaxLoader" width="16" /></form></div>';	
			}else{
			$pollEndHtml 	.= '<input type="submit" name="pollConnect" id="pollConnect" value="Connexion" class="send" /> <span id="pollMessage" class="pollMessage"></span><img src="'.SITEPATH.'img/progress.gif" alt="Chargement" class="pollAjaxLoader" width="16" /></form></div>';	
			}
			}else{
				$pollEndHtml 	.= '<input type="button" name="pollConnect" value="Dsl. enquête expiré" class="send" /></form></div>';	
				}	
		}
		$pollAnswersHtml	= $pollAnswersHtml . '<li><input name="pollAnswerID" id="pollRadioButton' . $pollAnswerID . '" type="'.$type.'" value="' . $pollAnswerID . '" /> ' . $pollAnswerValue .'<span id="pollAnswer' . $pollAnswerID . '"></span></li>';
		$pollAnswersHtml	= $pollAnswersHtml . '<li class="pollChart pollChart' . $pollAnswerID . '"><span></span></li>';
	}
	echo $filtrePoll.$pollStartHtml . $pollAnswersHtml . $pollEndHtml;
	}
	}
	
	}else{
		
		echo $filtrePoll.'<p>Nous vous remercions pour votre participation à notre enquête. Nous vous confirmerons - par mail, l\'attribution de vos points, une fois, le questionnaire validé par notre comité.</p>';
		
/*$user = "SELECT nombre_point,email,nom,prenom FROM formulaire_inscription WHERE  id = '".$_SESSION['id_acces']."' ";
$req_user = mysql_query($user ,$connect);
$tab_user = mysql_fetch_assoc($req_user);
		
		
		$to = $tab_user["email"];
$subject = "Mes cadeaux";


$message = "";
		
		
		
		$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from('info@marketstudies.ma');
			$mailer->set_address($to);
			$mailer->set_format('html');
			$mailer->set_subject($subject);
			$mailer->set_message(utf8_decode($message), array('TAG1' => ''));
			$mailer->send();*/
		
		}
}

function getPollID($pollAnswerID){
	$query  = "SELECT id FROM reponse_sondage WHERE id_question = ".$pollAnswerID." LIMIT 1";
	$result = mysql_query($query,$connect);
	$row = mysql_fetch_array($result);
	
	return $row['id'];	
}


function getPollResults($pollID){
	$sum_toral = 0;
	
	$colorArray = array(1 => "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717");
	$colorCounter = 1;
	$query  = "SELECT id FROM reponse_sondage WHERE id_question = ".$pollID."";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		
	$query_rep  = "SELECT * FROM rep_user_ques WHERE id_reponse = ".$row['id']."";
	$result_rep = mysql_query($query_rep);
	$num_rep = mysql_num_rows($result_rep);
	
	$sum_toral = $sum_toral + $num_rep;
		
		if ($pollResults == "") {
			$pollResults = $row['id'] . "|" . $num_rep . "|" . $colorArray[$colorCounter];
		} else {
			$pollResults = $pollResults . "-" . $row['id'] . "|" . $num_rep . "|" . $colorArray[$colorCounter];
		}
		$colorCounter = $colorCounter + 1;
	}

	
	$pollResults = $pollResults . "-" . $sum_toral;
	echo $pollResults;	
}
//VOTE RESULT

if($action == "showVote"){
	
	$sum_toral = 0;
	
	$colorArray = array(1 => "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717", "#C81717");
	$colorCounter = 1;
	$query  = "SELECT id FROM reponse_sondage WHERE id_question = ".$pollID."";
	$result = mysql_query($query,$connect);
	while($row = mysql_fetch_array($result))
	{
		
	$query_rep  = "SELECT * FROM rep_user_ques WHERE id_reponse = ".$row['id']."";
	$result_rep = mysql_query($query_rep,$connect_m);
	$num_rep = mysql_num_rows($result_rep);
	
	$sum_toral = $sum_toral + $num_rep;
		
		if ($pollResults == "") {
			$pollResults = $row['id'] . "|" . $num_rep . "|" . $colorArray[$colorCounter];
		} else {
			$pollResults = $pollResults . "-" . $row['id'] . "|" . $num_rep . "|" . $colorArray[$colorCounter];
		}
		$colorCounter = $colorCounter + 1;
	}

	
	$pollResults = $pollResults . "-" . $sum_toral;
	echo $pollResults;	

	}

//VOTE START
if ($action == "vote"){
	
	$type = $_POST['type'];
	$secure = $_POST['secure'];
	$idQuestion = $_POST['idQuestion'];
	
	
	$query_point  = "SELECT nbr_pts FROM question_sondage WHERE id = '".$idQuestion."'";
	$result_point = mysql_query($query_point);
	$array_point = mysql_fetch_array($result_point);
	
	if($secure == 1){
	
	$query_voted  = "SELECT adresse_ip FROM rep_user_ques WHERE id_question = '".$idQuestion."' AND id_user = '".$_SESSION['id_acces']."'";
	$result_voted = mysql_query($query_voted,$connect_m);
	$num_voted = mysql_num_rows($result_voted);
		
		
		}else{
	
	$query_voted  = "SELECT adresse_ip FROM rep_user_ques WHERE id_question = '".$idQuestion."' AND adresse_ip = '".$_SERVER["REMOTE_ADDR"]."'";
	$result_voted = mysql_query($query_voted,$connect_m);
	$num_voted = mysql_num_rows($result_voted);
			
			}
	
	
	if ($num_voted != 0) {
		echo "voted";
	} else {
		if($array_point['nbr_pts'] > 0 && isset($_SESSION['id_acces']) && $_SESSION['id_acces'] != ''){
			
			$req_point = "SELECT f.nombre_point FROM formulaire_inscription f,espace_securise e where e.id_point = f.id AND e.id = '".$_SESSION['id_acces']."'";
			$query_point  = mysql_query($req_point);
			$raw_point = mysql_fetch_array($query_point);
			
			$point_final = $raw_point['nombre_point']+$array_point['nbr_pts'];
			
			
			$update_point = "update formulaire_inscription set nombre_point = '".$point_final."' WHERE id = ".$_SESSION['id_acces']."";
			$query_update_point  = mysql_query($update_point);
			
			}
		
		
		$query  = "INSERT INTO rep_user_ques (id_user,id_question,id_reponse,adresse_ip,date) value('".$_SESSION['id_acces']."','".$idQuestion."','".$pollAnswerID."','".$_SERVER["REMOTE_ADDR"]."','".$date."')";
		mysql_query($query,$connect_m) or die('Error, insert query failed');
		
		//setcookie("poll" . getPollID($pollAnswerID), 1, time()+259200, "/", ".webresourcesdepot.com");
		getPollResults($idQuestion);
	}
}
//VOTE END

?>