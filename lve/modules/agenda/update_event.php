<?php include_once('../../config/connect.php'); 
	
	
	$event = "SELECT * FROM events WHERE ID = '".$_POST['id']."'";
	$req_event  = mysql_query($event ,$connect);
	$row_event  = mysql_fetch_assoc($req_event);
	$titre = $row_event["Description"];
	$date = substr($row_event['Date'],0,10);
	$date_fin = substr($row_event['Date_fin'],0,10);
	
	
	$heure = substr($row_event['Date'],11,2);
	
	$heure_fin = substr($row_event['Date_fin'],11,2);
	
	$min = substr($row_event['Date'],14,2);
	$min_fin = substr($row_event['Date_fin'],14,2);
	
	
	$color1 = $row_event["Color1"];
	$color2 = $row_event["Color2"];
?>

<form>
			<fieldset>
				<label for="name">Votre texte </label>
				<input type="text" name="what_up" id="what_up" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;" value="<?php echo $titre; ?>"/>
				<table style="width:100%; padding:5px;">
					<tr>
						<td>
							<label>Date Début</label>
							<input type="text" name="startDate_up" id="startDate_up" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;" value="<?php echo $date; ?>"/>				
						</td>
						<td>&nbsp;</td>
						<td>
							<label>Heure Début</label>
							<select id="startHour_up" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="1"  <?php if($heure == '01'){ echo 'SELECTED'; } ?>>1</option>
								<option value="2"  <?php if($heure == '02'){ echo 'SELECTED'; } ?>>2</option>
								<option value="3"  <?php if($heure == '03'){ echo 'SELECTED'; } ?>>3</option>
								<option value="4"  <?php if($heure == '04'){ echo 'SELECTED'; } ?>>4</option>
								<option value="5"  <?php if($heure == '05'){ echo 'SELECTED'; } ?>>5</option>
								<option value="6"  <?php if($heure == '06'){ echo 'SELECTED'; } ?>>6</option>
								<option value="7"  <?php if($heure == '07'){ echo 'SELECTED'; } ?>>7</option>
								<option value="8"  <?php if($heure == '08'){ echo 'SELECTED'; } ?>>8</option>
								<option value="9"  <?php if($heure == '09'){ echo 'SELECTED'; } ?>>9</option>
								<option value="10"  <?php if($heure == '10'){ echo 'SELECTED'; } ?>>10</option>
								<option value="11"  <?php if($heure == '11'){ echo 'SELECTED'; } ?>>11</option>
								<option value="12"  <?php if($heure == '12'){ echo 'SELECTED'; } ?>>12</option>
								<option value="13"  <?php if($heure == '13'){ echo 'SELECTED'; } ?>>13</option>
								<option value="14"  <?php if($heure == '14'){ echo 'SELECTED'; } ?>>14</option>
								<option value="15"  <?php if($heure == '15'){ echo 'SELECTED'; } ?>>15</option>
								<option value="16"  <?php if($heure == '16'){ echo 'SELECTED'; } ?>>16</option>
								<option value="17"  <?php if($heure == '17'){ echo 'SELECTED'; } ?>>17</option>
								<option value="18"  <?php if($heure == '18'){ echo 'SELECTED'; } ?>>18</option>
								<option value="19"  <?php if($heure == '19'){ echo 'SELECTED'; } ?>>19</option>
								<option value="20"  <?php if($heure == '20'){ echo 'SELECTED'; } ?>>20</option>
								<option value="21"  <?php if($heure == '21'){ echo 'SELECTED'; } ?>>21</option>
								<option value="22"  <?php if($heure == '22'){ echo 'SELECTED'; } ?>>22</option>
								<option value="23"  <?php if($heure == '23'){ echo 'SELECTED'; } ?>>23</option>
								<option value="00"  <?php if($heure == '00'){ echo 'SELECTED'; } ?>>00</option>
							</select>				
						<td>
						<td>
							<label>Minute Début</label>
							<select id="startMin_up" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="00"  <?php if($min == '00'){ echo 'SELECTED'; } ?>>00</option>
								<option value="10"  <?php if($min == '10'){ echo 'SELECTED'; } ?>>10</option>
								<option value="20"  <?php if($min == '20'){ echo 'SELECTED'; } ?>>20</option>
								<option value="30"  <?php if($min == '30'){ echo 'SELECTED'; } ?>>30</option>
								<option value="40"  <?php if($min == '40'){ echo 'SELECTED'; } ?>>40</option>
								<option value="50"  <?php if($min == '50'){ echo 'SELECTED'; } ?>>50</option>
							</select>				
						
						
					</tr>
					<tr>
						<td>
							<label>Date Fin</label>
							<input type="text" name="endDate_up" id="endDate_up" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;" value="<?php echo $date_fin; ?>"/>				
						</td>
						<td>&nbsp;</td>
						<td>
							<label>Heure Fin</label>
							<select id="endHour_up" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="1"  <?php if($heure_fin == '01'){ echo 'SELECTED'; } ?>>1</option>
								<option value="2"  <?php if($heure_fin == '02'){ echo 'SELECTED'; } ?>>2</option>
								<option value="3"  <?php if($heure_fin == '03'){ echo 'SELECTED'; } ?>>3</option>
								<option value="4"  <?php if($heure_fin == '04'){ echo 'SELECTED'; } ?>>4</option>
								<option value="5"  <?php if($heure_fin == '05'){ echo 'SELECTED'; } ?>>5</option>
								<option value="6"  <?php if($heure_fin == '06'){ echo 'SELECTED'; } ?>>6</option>
								<option value="7"  <?php if($heure_fin == '07'){ echo 'SELECTED'; } ?>>7</option>
								<option value="8"  <?php if($heure_fin == '08'){ echo 'SELECTED'; } ?>>8</option>
								<option value="9"  <?php if($heure_fin == '09'){ echo 'SELECTED'; } ?>>9</option>
								<option value="10"  <?php if($heure_fin == '10'){ echo 'SELECTED'; } ?>>10</option>
								<option value="11"  <?php if($heure_fin == '11'){ echo 'SELECTED'; } ?>>11</option>
								<option value="12"  <?php if($heure_fin == '12'){ echo 'SELECTED'; } ?>>12</option>
								<option value="13"  <?php if($heure_fin == '13'){ echo 'SELECTED'; } ?>>13</option>
								<option value="14"  <?php if($heure_fin == '14'){ echo 'SELECTED'; } ?>>14</option>
								<option value="15"  <?php if($heure_fin == '15'){ echo 'SELECTED'; } ?>>15</option>
								<option value="16"  <?php if($heure_fin == '16'){ echo 'SELECTED'; } ?>>16</option>
								<option value="17"  <?php if($heure_fin == '17'){ echo 'SELECTED'; } ?>>17</option>
								<option value="18"  <?php if($heure_fin == '18'){ echo 'SELECTED'; } ?>>18</option>
								<option value="19"  <?php if($heure_fin == '19'){ echo 'SELECTED'; } ?>>19</option>
								<option value="20"  <?php if($heure_fin == '20'){ echo 'SELECTED'; } ?>>20</option>
								<option value="21"  <?php if($heure_fin == '21'){ echo 'SELECTED'; } ?>>21</option>
								<option value="22"  <?php if($heure_fin == '22'){ echo 'SELECTED'; } ?>>22</option>
								<option value="23"  <?php if($heure_fin == '23'){ echo 'SELECTED'; } ?>>23</option>
								<option value="00"  <?php if($heure_fin == '00'){ echo 'SELECTED'; } ?>>00</option>
							</select>				
						<td>
						<td>
							<label>Minute Fin</label>
							<select id="endMin_up" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="00"  <?php if($min_fin == '00'){ echo 'SELECTED'; } ?>>00</option>
								<option value="10"  <?php if($min_fin == '10'){ echo 'SELECTED'; } ?>>10</option>
								<option value="20"  <?php if($min_fin == '20'){ echo 'SELECTED'; } ?>>20</option>
								<option value="30"  <?php if($min_fin == '30'){ echo 'SELECTED'; } ?>>30</option>
								<option value="40"  <?php if($min_fin == '40'){ echo 'SELECTED'; } ?>>40</option>
								<option value="50"  <?php if($min_fin == '50'){ echo 'SELECTED'; } ?>>50</option>
							</select>				
						
									
					</tr>			
				</table>
				<table>
					<tr>
						<td>
							<label>Couleur de fond</label>
						</td>
						<td>
							<div id="colorSelectorBackground_up"><div style="background-color: <?php echo $color1; ?>; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="colorBackground_up" value="<?php echo $color1; ?>">
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<label>Couleur du texte</label>
						</td>
						<td>
							<div id="colorSelectorForeground_up"><div style="background-color: <?php echo $color2; ?>; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="colorForeground_up" value="<?php echo $color2; ?>">
						</td>						
					</tr>				
				</table>
			</fieldset>
			</form>
     