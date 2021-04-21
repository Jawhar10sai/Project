<?php include_once('../../config/connect.php'); 
include_once('../../functions/function.php'); 
$id_cal   = $_GET["id_cal"];
$idsite = $_GET["id_site"];

    $param_page = "SELECT * FROM parametres_page where id_site = '".$idsite."'";
	$req_param_page  = mysql_query($param_page ,$connect);
	$row_param_page = mysql_fetch_assoc($req_param_page);
	
	$categories = "SELECT c.*,a.*,e.*,c.id as id_categorie FROM cat_article c,article a,events e where e.id_site = '".$idsite."' AND e.id_page = a.id_page AND c.id=a.id_cat  GROUP by c.id";
	$param_categories  = mysql_query($categories ,$connect);
	$row_categories  = mysql_fetch_assoc($param_categories);
	$num_categories  = mysql_num_rows($param_categories);
	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Calendrier</title>

<!-- Include CSS for JQuery Frontier Calendar plugin (Required for calendar plugin) -->
<link rel="stylesheet" type="text/css" href="css/frontierCalendar/jquery-frontier-cal-1.3.2.css" />

<!-- Include CSS for color picker plugin (Not required for calendar plugin. Used for example.) -->
<link rel="stylesheet" type="text/css" href="css/colorpicker/colorpicker.css" />

<!-- Include CSS for JQuery UI (Required for calendar plugin.) -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui/smoothness/jquery-ui-1.8.1.custom.css" />

<!--
Include JQuery Core (Required for calendar plugin)
** This is our IE fix version which enables drag-and-drop to work correctly in IE. See README file in js/jquery-core folder. **
-->
<script type="text/javascript" src="js/jquery-core/jquery-1.4.2-ie-fix.min.js"></script>
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>

<!-- Include JQuery UI (Required for calendar plugin.) -->
<script type="text/javascript" src="js/jquery-ui/smoothness/jquery-ui-1.8.1.custom.min.js"></script>

<!-- Include color picker plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="js/colorpicker/colorpicker.js"></script>

<!-- Include jquery tooltip plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="js/jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js"></script>

<!--
	(Required for plugin)
	Dependancies for JQuery Frontier Calendar plugin.
    ** THESE MUST BE INCLUDED BEFORE THE FRONTIER CALENDAR PLUGIN. **
-->
<script type="text/javascript" src="js/lib/jshashtable-2.1.js"></script>

<!-- Include JQuery Frontier Calendar plugin -->
<script type="text/javascript" src="js/frontierCalendar/jquery-frontier-cal-1.3.2.js"></script>


<style type="text/css">
*{
 font-family: <?php $police = "SELECT texte FROM police WHERE id = '".$row_param_page["police"]."'";
 $req_police = mysql_query($police, $connect);
 $row_police = mysql_fetch_assoc($req_police);
 echo $row_police["texte"];
?> !important;
 font-size:<?php echo $row_param_page["taille"]; ?>px !important;
}
.qtip-content,#current_mounth{
 font-size:<?php echo $row_param_page["taille"]; ?>px !important;
}
body { padding:0; margin:0; }
.shadow {
	-moz-box-shadow: 3px 3px 4px #aaaaaa;
	-webkit-box-shadow: 3px 3px 4px #aaaaaa;
	box-shadow: 3px 3px 4px #aaaaaa;
	/* For IE 8 */
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#aaaaaa')";
	/* For IE 5.5 - 7 */
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#aaaaaa');
}
.JFrontierCal-Modal-Agenda-Item, .JFrontierCal .JFrontierCal-Day-Cell .JFrontierCal-Agenda-Item{
	margin-top:10px;}
</style>

<script type="text/javascript">

$(document).ready(function(){	

	var clickDate = "";
	var clickAgendaItem = "";
	var jfcalplugin = $("#mycal").jFrontierCal({
		date: new Date(),
		dayClickCallback: myDayClickHandler,
		agendaClickCallback: myAgendaClickHandler,
		agendaDropCallback: myAgendaDropHandler,
		agendaMouseoverCallback: myAgendaMouseoverHandler,
		applyAgendaTooltipCallback: myApplyTooltip,
		agendaDragStartCallback : myAgendaDragStart,
		agendaDragStopCallback : myAgendaDragStop,
		dragAndDropEnabled: false
	}).data("plugin");
	
	


	
	
	<?php 
	
	if(isset($_POST['categorie']) && $_POST['categorie'] != "" && $_POST['categorie'] != "0"){
	$events = "SELECT a.id_cat,a.id_page,e.* FROM article a,events e where a.id_cat = '".$_POST['categorie']."' AND a.id = e.id_article group by e.ID";	
	}else{
	$events = "SELECT * FROM events where (id_site = '".$idsite."' OR id_calendrier = '".$id_cal."')";
	}
	
	$req_events  = mysql_query($events ,$connect);
	$row_events  = mysql_fetch_assoc($req_events);
	$num_events  = mysql_num_rows($req_events);
	
	
	
	
	
	if($num_events > 0){ 
	do{
	?>
	// Dates use integers
	
	
					
					var startDateObj<?php echo $row_events['ID']; ?> = new Date(parseInt("<?php echo substr($row_events['Date'],0,4); ?>"),parseInt("<?php echo substr($row_events['Date'],5,2); ?>")-1,parseInt("<?php echo substr($row_events['Date'],8,2); ?>"),<?php echo substr($row_events['Date'],11,2); ?>,<?php echo substr($row_events['Date'],14,2); ?>,0,0);
					var endDateObj<?php echo $row_events['ID']; ?> =  new Date(parseInt("<?php echo substr($row_events['Date_fin'],0,4); ?>"),parseInt("<?php echo substr($row_events['Date_fin'],5,2); ?>")-1,parseInt("<?php echo substr($row_events['Date_fin'],8,2); ?>"),<?php echo substr($row_events['Date_fin'],11,2); ?>,<?php echo substr($row_events['Date_fin'],14,2); ?>,0,0);
	
	 jfcalplugin.addAgendaItem(
                "#mycal",
                        "<?php  echo cleanCut($row_events['Description'],300); ?>",
                        startDateObj<?php echo $row_events['ID']; ?>,
                        endDateObj<?php echo $row_events['ID']; ?>,
                        false,
                        {
                                myNum: <?php echo $row_events['ID']; ?>
                        },
                        {
                                backgroundColor: "<?php echo $row_events['Color1']; ?>",
                                foregroundColor: "<?php echo $row_events['Color2']; ?>"
                        }      
        );

					
					<?php 
	}while($row_events  = mysql_fetch_assoc($req_events));
					}
					
					 ?>
	
	/**
	 * Do something when dragging starts on agenda div
	 */
	function myAgendaDragStart(eventObj,divElm,agendaItem){
		// destroy our qtip tooltip
		if(divElm.data("qtip")){
			divElm.qtip("destroy");
		}	
	};
	
	/**
	 * Do something when dragging stops on agenda div
	 */
	function myAgendaDragStop(eventObj,divElm,agendaItem){
		//alert("drag stop");
	};
	
	function myApplyTooltip(divElm,agendaItem){

		// Destroy currrent tooltip if present
		if(divElm.data("qtip")){
			divElm.qtip("destroy");
		}
		
		var displayData = "";
		
		var title = agendaItem.title;
		var startDate = agendaItem.startDate;
		var endDate = agendaItem.endDate;
		var allDay = agendaItem.allDay;
		var data = agendaItem.data;
		
						
var today = startDate;
var dd = today.getDate();
var mm = today.getMonth()+1;//January is 0!
var yyyy = today.getFullYear();
var hh = today.getHours();
var mi = today.getMinutes();
if(dd<10){dd='0'+dd}
if(mm<10){mm='0'+mm}
if(hh<10){hh='0'+hh}  
if(mi<10){mi='0'+mi} 
startDate = dd+'/'+mm+'/'+yyyy+' '+hh+':'+mi;
var today1 = endDate;
var dd1 = today1.getDate();
var mm1 = today1.getMonth()+1;//January is 0!
var yyyy1 = today1.getFullYear();
var hh1 = today1.getHours();
var mi1 = today1.getMinutes();
if(dd1<10){dd1='0'+dd1}
if(mm1<10){mm1='0'+mm1}
if(hh1<10){hh1='0'+hh1}  
if(mi1<10){mi1='0'+mi1} 
endDate = dd1+'/'+mm1+'/'+yyyy1+' '+hh1+':'+mi1;
		
		
		
		displayData += "<br><b>" + title+ "</b><br><br>";
		if(allDay){
			displayData += "(Toutes les évènements de la journée)<br><br>";
		}else{
			displayData += "<b>Date Début :</b> " + startDate + "<br>" + "<b>Date Fin :</b> " + endDate + "<br><br>";
		}
		for (var propertyName in data) {
			//displayData += "<b>" + propertyName + ":</b> " + data[propertyName] + "<br>"
		}
		// use the user specified colors from the agenda item.
		var backgroundColor = agendaItem.displayProp.backgroundColor;
		var foregroundColor = agendaItem.displayProp.foregroundColor;
		var myStyle = {
			border: {
				width: 0.5,
				radius: 3
			},
			padding: 10, 
			textAlign: "left",
			tip: true,
			name: "dark" // other style properties are inherited from dark theme		
		};
		if(backgroundColor != null && backgroundColor != ""){
			myStyle["backgroundColor"] = backgroundColor;
		}
		if(foregroundColor != null && foregroundColor != ""){
			myStyle["color"] = foregroundColor;
		}
		// apply tooltip
		divElm.qtip({
			content: displayData,
			position: {
				corner: {
					tooltip: "bottomMiddle",
					target: "topMiddle"			
				},
				adjust: { 
				screen: true,
					mouse: true,
					x: 0,
					y: -5
				},
				target: "mouse"
			},
			show: { 
				when: { 
					event: 'mouseover'
				}
			},
			style: myStyle
		});

	};

	/**
	 * Make the day cells roughly 3/4th as tall as they are wide. this makes our calendar wider than it is tall. 
	 */
	jfcalplugin.setAspectRatio("#mycal",0.75);

	/**
	 * Called when user clicks day cell
	 * use reference to plugin object to add agenda item
	 */
	function myDayClickHandler(eventObj){
		// Get the Date of the day that was clicked from the event object
		var date = eventObj.data.calDayDate;
		// store date in our global js variable for access later
		clickDate = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();
		// open our add event dialog
		//$('#add-event-form').dialog('open');
	};
	
	/**
	 * Called when user clicks and agenda item
	 * use reference to plugin object to edit agenda item
	 */
	function myAgendaClickHandler(eventObj){
		// Get ID of the agenda item from the event object
		var agendaId = eventObj.data.agendaId;		
		// pull agenda item from calendar
		var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);
		clickAgendaItem = agendaItem;
		var order = 'action=get_page&id='+clickAgendaItem.data.myNum;
				//alert(order);
			$.post("ajax_calender.php", order, function(theResponse){
				//alert(theResponse);
				window.parent.document.location.href="../../"+theResponse;
				
			});
		// pull agenda item from calendar
		var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);
		clickAgendaItem = agendaItem;
		
	};
	
	
	/**
	 * Called when user drops an agenda item into a day cell.
	 */
	function myAgendaDropHandler(eventObj){
		// Get ID of the agenda item from the event object
		var agendaId = eventObj.data.agendaId;
		// date agenda item was dropped onto
		var date = eventObj.data.calDayDate;
		var date_end = eventObj.data.endDayDate;
		
		// Pull agenda item from calendar
		var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);	
		
		
		 
		 
	};
	
	/**
	 * Called when a user mouses over an agenda item	
	 */
	function myAgendaMouseoverHandler(eventObj){
		var agendaId = eventObj.data.agendaId;
		var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);
		//alert("You moused over agenda item " + agendaItem.title + " at location (X=" + eventObj.pageX + ", Y=" + eventObj.pageY + ")");
	};
	
	var calDate = new Date();
	var cmonth = calDate.getMonth();
	var cyear = calDate.getFullYear();
		if(cmonth == 0){
			$("#current_mounth").html('Janvier '+cyear);
			}else if(cmonth == 1){
			$("#current_mounth").html('Février '+cyear);
			}else if(cmonth == 2){
			$("#current_mounth").html('Mars '+cyear);
			}else if(cmonth == 3){
			$("#current_mounth").html('Avril '+cyear);
			}else if(cmonth == 4){
			$("#current_mounth").html('Mai '+cyear);
			}else if(cmonth == 5){
			$("#current_mounth").html('Juin '+cyear);
			}else if(cmonth == 6){
			$("#current_mounth").html('Juillet '+cyear);
			}else if(cmonth == 7){
			$("#current_mounth").html('Août '+cyear);
			}else if(cmonth == 8){
			$("#current_mounth").html('Septembre '+cyear);
			}else if(cmonth == 9){
			$("#current_mounth").html('Octobre '+cyear);
			}else if(cmonth == 10){
			$("#current_mounth").html('Novembre '+cyear);
			}else if(cmonth == 11){
			$("#current_mounth").html('Decembre '+cyear);
			}
			

	
/**
	 * Initialize next month button
	 */
	$("#BtnNextMonth").click(function() {
		
		jfcalplugin.showNextMonth("#mycal");
		// update the jqeury datepicker value
		var calDate = jfcalplugin.getCurrentDate("#mycal"); // returns Date object
		var cyear = calDate.getFullYear();
		// Date month 0-based (0=January)
		var cmonth = calDate.getMonth();
		var cday = calDate.getDate();
		if(cmonth == 0){
			$("#current_mounth").html('Janvier '+cyear);
			}else if(cmonth == 1){
			$("#current_mounth").html('Février '+cyear);
			}else if(cmonth == 2){
			$("#current_mounth").html('Mars '+cyear);
			}else if(cmonth == 3){
			$("#current_mounth").html('Avril '+cyear);
			}else if(cmonth == 4){
			$("#current_mounth").html('Mai '+cyear);
			}else if(cmonth == 5){
			$("#current_mounth").html('Juin '+cyear);
			}else if(cmonth == 6){
			$("#current_mounth").html('Juillet '+cyear);
			}else if(cmonth == 7){
			$("#current_mounth").html('Août '+cyear);
			}else if(cmonth == 8){
			$("#current_mounth").html('Septembre '+cyear);
			}else if(cmonth == 9){
			$("#current_mounth").html('Octobre '+cyear);
			}else if(cmonth == 10){
			$("#current_mounth").html('Novembre '+cyear);
			}else if(cmonth == 11){
			$("#current_mounth").html('Decembre '+cyear);
			}
		// jquery datepicker month starts at 1 (1=January) so we add 1
		//$("#dateSelect").datepicker("setDate",cyear+"-"+(cmonth+1)+"-"+cday);		
		return false;
	});
	
	/**
	 * Initialize previous month button
	 */
	$("#BtnPreviousMonth").click(function() {
		jfcalplugin.showPreviousMonth("#mycal");
		// update the jqeury datepicker value
		var calDate = jfcalplugin.getCurrentDate("#mycal"); // returns Date object
		var cyear = calDate.getFullYear();
		// Date month 0-based (0=January)
		var cmonth = calDate.getMonth();
		var cday = calDate.getDate();
		if(cmonth == 0){
			$("#current_mounth").html('Janvier '+cyear);
			}else if(cmonth == 1){
			$("#current_mounth").html('Février '+cyear);
			}else if(cmonth == 2){
			$("#current_mounth").html('Mars '+cyear);
			}else if(cmonth == 3){
			$("#current_mounth").html('Avril '+cyear);
			}else if(cmonth == 4){
			$("#current_mounth").html('Mai '+cyear);
			}else if(cmonth == 5){
			$("#current_mounth").html('Juin '+cyear);
			}else if(cmonth == 6){
			$("#current_mounth").html('Juillet '+cyear);
			}else if(cmonth == 7){
			$("#current_mounth").html('Août '+cyear);
			}else if(cmonth == 8){
			$("#current_mounth").html('Septembre '+cyear);
			}else if(cmonth == 9){
			$("#current_mounth").html('Octobre '+cyear);
			}else if(cmonth == 10){
			$("#current_mounth").html('Novembre '+cyear);
			}else if(cmonth == 11){
			$("#current_mounth").html('Decembre '+cyear);
			}
		// jquery datepicker month starts at 1 (1=January) so we add 1
		//$("#dateSelect").datepicker("setDate",cyear+"-"+(cmonth+1)+"-"+cday);
		return false;
	});
	
	/**
	 * Initialize delete all agenda items button
	 */
	$("#BtnDeleteAll").button();
	$("#BtnDeleteAll").click(function() {	
		jfcalplugin.deleteAllAgendaItems("#mycal");	
		return false;
	});		
	
	
});
</script>


</head>
<body>
<?php 
if($num_categories > 0){ ?>
        <form id="frm2" method="post">
          <?php echo 'Catégorie'; ?> :
          <select id="categorie" name="categorie" onchange="frm2.submit();">
          <option value="0">Sélectionnez une catégorie</option>
          <?php do{ ?>
            <option value="<?php echo $row_categories['id_categorie']; ?>" <?php if($_POST['categorie']==$row_categories['id_categorie']) {echo ' selected="selected"';} ?>><?php echo $row_categories['categorie']; ?></option>
          <?php }while($row_categories  = mysql_fetch_assoc($param_categories)); ?>
          </select>
        </form>
        <br />
        <?php } ?>

		<div id="example" style="margin: 0; width:100%;">
		


		<div id="toolbar" class="ui-widget-header ui-corner-all" style="padding:3px; vertical-align: middle; white-space:nowrap; overflow: hidden;">
			<button id="BtnPreviousMonth" style="float: left; position: relative; z-index: 10;">&laquo; Précédent</button><div id="current_mounth"></div>
			<button id="BtnNextMonth" style="float:right; margin-top:-22px">Suivant &raquo;</button>
			
		</div>
		<div id="mycal"></div>

		</div>

		<!-- debugging-->
		<div id="calDebug"></div>
		




</body>
</html>
