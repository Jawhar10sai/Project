<?php



$parametres_logo = "SELECT * FROM parametres_logo where id_site = '".$idsite."'";

$req_arriere_logo  = mysql_query($parametres_logo ,$connect);

$query_arriere_logo  = mysql_fetch_array($req_arriere_logo);



?>
<script language="javascript">

$(document).ready(function() {

$('#logo').css({'paddingTop' : "<?php echo $query_arriere_logo['marge_top']; ?>px",'paddingBottom' : "<?php echo $query_arriere_logo['marge_bottom']; ?>px"});	



<?php if($query_arriere_logo["param"] == 1){?>

$('#logo').css('background' , "<?php echo $query_arriere_logo["couleur"]; ?>");	

<?php }else if($query_arriere_logo["param"] == 2){?>

$('#logo').css('background' , "<?php echo $query_arriere_logo["degrade"]; ?>");	

<?php }else{?>

$('#logo').css('background' , "Transparent");	

<?php }?>

});

</script>

<div id="logo" class="<?php if($session == 'ok'){ ?>propriete <?php } ?>">
  <?php if($query_arriere_logo['image'] != ''){ ?>
  <a href="/" alt ="<?php echo $query_arriere_logo['alt']; ?>"> <img src="<?php echo $query_arriere_logo['image']; ?>" alt="<?php echo $query_arriere_logo['alt']; ?>" /> </a>
  <?php }else{ ?>
  <a href="/" alt ="<?php echo $query_arriere_logo['texte']; ?>">
  <h1><?php echo $query_arriere_logo['texte']; ?></h1>
  </a>
  <?php } ?>
  <?php if($idsite == 42){ ?>
  <script>
	$(function() {
		jQuery.datepicker.setDefaults(jQuery.datepicker.regional['fr']);
		$( "#arrive" ).datepicker({ dateFormat: 'dd-mm-yy' });
    $( "#depart" ).datepicker({ dateFormat: 'dd-mm-yy' });
	});
	</script>
  
  
  
  <p style="margin: 0px 8px; width: 203px ! important; padding: 0px;"><span><a id="book-online" style="font-family: impact,chicago; color: rgb(255, 255, 255); font-size: 23px;" href="javascript:void(0)">
  <img onmouseover="this.src='http://tourhassan.oneoweb.com/uploads/site_42/images/reservation-en-ligne-hover.png';" onmouseout="this.src='http://tourhassan.oneoweb.com/uploads/site_42/images/reservation-en-ligne.png';" src="http://tourhassan.oneoweb.com/uploads/site_42/images/reservation-en-ligne.png" alt="Réservation en ligne"  />
  <img  src="http://tourhassan.oneoweb.com/uploads/site_42/images/reservation-en-ligne-hover.png" alt="Réservation en ligne" style="display:none !important;"  />
  
  </a></span></p>
  <div id="book-online-form" style="display: none; background: none repeat scroll 0% 0% black; opacity: 0.7; margin: 2px 8px; width: 241px;">
    <table width="100%">
      <tbody>
        <tr>
          <td style="color: #fff !important;">Arriv&eacute;e</td>
          <td colspan="2" align="right">
<input type="text" id="arrive"/></td>
        </tr>
        <tr>
          <td style="color: #fff !important;">Départ</td>
          <td colspan="2" align="right">
<input type="text" id="depart"/></td>
        </tr>
        <tr>
          <td><span style="color: #fff !important;">Adulte</span></td>
          <td>&nbsp;</td>
          <td align="right" ><select name="adulte" id="adulte" style="width: 65px;">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>
        </tr> 
        <tr>
          <td><span style="color: #fff !important;">Enfants</span></td>
          <td>&nbsp;</td>
          <td align="right" ><select name="enfants" id="enfants" style="width: 65px;">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>
        </tr>
        <tr>
          <td style="color: #fff !important;">&nbsp;</td>
          <td>&nbsp;</td>
          <td align="right"><input id="btnreservation" class="send" type="button" value="Confirmer" style="padding:0px;" /></td>
        </tr>
      </tbody>
    </table>
  </div>
  <script language="javascript">
  $(document).ready(function() {
	$('#btnreservation').click(function(){
	var start = $('#arrive').datepicker('getDate');
    var end   = $('#depart').datepicker('getDate');
	var adulte = $('#adulte').val();
	var enfants = $('#enfants').val();
    var days   = (end - start)/1000/60/60/24;

	var jour = $('#arrive').val().substring(0,2);
   var mois = $('#arrive').val().substring(3,5);
   var annee = $('#arrive').val().substring(6,10);
	
	if(days != 0){
		if(days < 0){
			
			alert('La date de départ est inférieur à la date d\'arrivée');
			
			}else{
				
			
				document.open('http://loire.book-secure.com/00000001/032/023112/dispopricev2.phtml?showPromotions=1&langue=fr&locale=fr_FR&Clusternames=MAPALTRALTHassan&cluster=MAPALTRALTHassan&Hotelnames=MAPALTRALTHassan&hname=MAPALTRALTHassan&arrivalDateValue='+annee+'-'+mois+'-'+jour+'&frommonth='+mois+'&fromday='+jour+'&fromyear='+annee+'&nbdays='+days+'&nbNightsValue='+days+'&adulteresa='+adulte+'&nbAdultsValue='+adulte+'&enfantresa='+enfants+'&nbChildrenValue='+enfants+'&AccessCode=&accessCode=&redir=BIZ-so5523q0o4&rt=1384433363',"_blank","toolbar=yes, scrollbars=yes, resizable=no");
				
				}
		
		}
		
		 
		
		//document.open('http://loire.book-secure.com/00000001/032/023112/dispopricev2.phtml?showPromotions=1&langue=fr&locale=fr_FR&Clusternames=MAPALTRALTHassan&cluster=MAPALTRALTHassan&Hotelnames=MAPALTRALTHassan&hname=MAPALTRALTHassan&arrivalDateValue=2013-12-01&frommonth=12&fromday=1&fromyear=2013&nbdays=10&nbNightsValue=10&adulteresa=1&nbAdultsValue='+$adulte+'&enfantresa=1&nbChildrenValue=1&AccessCode=&accessCode=&redir=BIZ-so5523q0o4&rt=1384433363')
		
		});
	  
  });
  
 </script>
  <?php } ?>
</div>
