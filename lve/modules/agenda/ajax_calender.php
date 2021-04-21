<?php include_once('../../config/connect.php');
include_once('../../functions/function.php'); 

if(isset($_POST['action']) && $_POST['action'] == 'get_page'){
	
	$event = "SELECT * FROM events WHERE ID = '".$_POST['id']."'";
	$req_event  = mysql_query($event ,$connect);
	$row_event  = mysql_fetch_assoc($req_event);
	
	echo get_name_page($row_event['id_site'],$row_event['id_page']).'&detail='.$row_event['id_article'];

}else if(isset($_POST['action']) && $_POST['action'] == 'add'){
	$query_events = "INSERT INTO events (id_calendrier,Description,Date,Date_fin,Color1,Color2)
				VALUES(
				'".$_POST['id_cal']."',
				'".$_POST['what']."',
				'".$_POST['startDate']."',
				'".$_POST['endDate']."',
				'".$_POST['color1']."',
				'".$_POST['color2']."')";
			mysql_query($query_events);
	
}else if(isset($_POST['action']) && $_POST['action'] == 'delete'){
	
	
	$query = "DELETE FROM events WHERE ID = '".$_POST['id']."'";
	mysql_query($query) or die('Error, insert query failed');
	
}else if(isset($_POST['action']) && $_POST['action'] == 'update'){
	
	$event = "SELECT * FROM events WHERE ID = '".$_POST['id']."'";
	$req_event  = mysql_query($event ,$connect);
	$row_event  = mysql_fetch_assoc($req_event);
	
	$date = substr($row_event['Date'],11,8);
	$date_fin = substr($row_event['Date_fin'],11,8);
	
	$query = "UPDATE events SET Date = '".$_POST['startDate'].' '.$date ."',Date_fin = '".$_POST['endDate'].' '.$date_fin."' WHERE ID = '".$_POST['id']."'";
	mysql_query($query) or die('Error, insert query failed');	
	
}else if(isset($_POST['action']) && $_POST['action'] == 'edit_event'){
	
	$query = "UPDATE events SET Description = '".$_POST['what']."' ,Date = '".$_POST['startDate']."',Date_fin = '".$_POST['endDate']."',Color1 = '".$_POST['color1']."',Color2 = '".$_POST['color2']."' WHERE ID = '".$_POST['id']."'";
	mysql_query($query) or die('Error, insert query failed');
	
	
	
}





?>