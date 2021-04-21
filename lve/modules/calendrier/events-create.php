<?php 
require_once('header.php');
require_once('smoothcalendar.php');
?>
<div class="main-content">
	<div class="header" >
		<div class="hdrl"></div>
		<div class="hdrr"></div>
		<h2>Crée événement</h2>
	</div>
	<div class="block">

<?php
	if (isset($_POST["event"]))
	{
		$description = $_POST["event"]["description"];
		$eventtime    = mktime($_POST["event"]["hour"  ], 
							  $_POST["event"]["minute"], 0,
							  $_POST["event"]["month" ], 
							  $_POST["event"]["day"   ], 
							  $_POST["event"]["year"  ]);
		$eventtime   = date('Y-m-d H:i:s', $eventtime); 
		
		
		$eventtime_end = mktime($_POST["event"]["hour1"  ], 
							  $_POST["event"]["minute1"], 0,
							  $_POST["event"]["month1" ], 
							  $_POST["event"]["day1"   ], 
							  $_POST["event"]["year1"  ]);
		$eventtime_end   = date('Y-m-d H:i:s', $eventtime_end); 

		if (strcmp($description, "") == 0)
		{
?>				
	<p class="message error">
		Vous avez oublié d'ajouter une description
	</p>
<?php
		}
		else if (strcmp($eventtime, "") == 0)
		{
?>				
	<p class="message error">
		Heure de l'événement ou la date ne sont pas valides
	</p>
<?php
		}
		else
		{
			$result = $calendar->createEvent(array("date" => $eventtime,"date_fin" => $eventtime_end, "content" => $description,"id_cal" => $id_cal));				
			
			if (isset($result["error"]))
			{
?>				
	<p class="message error">
		<?php echo $result["error"]; ?>
	</p>
		
<?php
			}
			else
			{
?>				
	<script language="javascript">	
		
window.parent.document.location.reload();
</script>  
		
<?php
		
		exit();	}
		}
	}	

		$currentYearInfo = getdate(time());
?>			
		<form method="POST" action="<?php echo $_SERVER["REQUEST_URI"]?>" >
			<div class="western">
				<p>
					<label>Description</label>
					<br/>
					<textarea id="setname" class="text" type="text"  name="event[description]" ></textarea>
				</p>
			</div>
			<div class="eastern">
				<p>
					<label>Date debut <em>(jj-mm-aaaa)</em></label>
					<br/>
					<select name="event[day]">
<?php
						for($i = 1; $i < 32; $i++)
						{
							$value    = ($i < 10) ? "0" . $i : $i;
							$day      = (int)$currentYearInfo["mday"];
							$selected = ($day == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
	
					<select name="event[month]">
<?php
						for($i = 1; $i < 13; $i++)
						{
							$value = ($i < 10) ? "0" . $i : $i;
							$month    = (int)$currentYearInfo["mon"];
							$selected = ($month == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
	
					<select name="event[year]">
<?php
						$years = (int)$currentYearInfo["year"];
						
						for($i = $years; $i <= $years + 3; $i++)
						{
?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>						
<?php
						}
?>
					</select>
				</p>
				<p>
					<label>Heure debut <em>(hh:mm)</em></label>
					<br/>
					<select name="event[hour]">
<?php
						for($i = 0; $i < 24; $i++)
						{
							$value    = ($i < 10) ? "0" . $i : $i;
							$hours    = (int)$currentYearInfo["hours"];
							$selected = ($hours == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
	
					<select name="event[minute]">
<?php
						for($i = 0; $i < 60; $i = $i + 5)
						{
							$value = ($i < 10) ? "0" . $i : $i;
?>
							<option value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
				</p>
			</div>
            <div class="eastern">
				<p>
					<label>Date fin <em>(jj-mm-aaaa)</em></label>
					<br/>
					<select name="event[day1]">
<?php
						for($i = 1; $i < 32; $i++)
						{
							$value    = ($i < 10) ? "0" . $i : $i;
							$day      = (int)$currentYearInfo["mday"];
							$selected = ($day == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
	
					<select name="event[month1]">
<?php
						for($i = 1; $i < 13; $i++)
						{
							$value = ($i < 10) ? "0" . $i : $i;
							$month    = (int)$currentYearInfo["mon"];
							$selected = ($month == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
	
					<select name="event[year1]">
<?php
						$years = (int)$currentYearInfo["year"];
						
						for($i = $years; $i <= $years + 3; $i++)
						{
?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>						
<?php
						}
?>
					</select>
				</p>
				<p>
					<label>Heure Fin <em>(hh:mm)</em></label>
					<br/>
					<select name="event[hour1]">
<?php
						for($i = 0; $i < 24; $i++)
						{
							$value    = ($i < 10) ? "0" . $i : $i;
							$hours    = (int)$currentYearInfo["hours"];
							$selected = ($hours == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
	
					<select name="event[minute1]">
<?php
						for($i = 0; $i < 60; $i = $i + 5)
						{
							$value = ($i < 10) ? "0" . $i : $i;
?>
							<option value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
				</p>
			</div>
			<div class="clearfix"></div>
			<p class="rightalign">
				<input type="submit" class="submit" value="Enregistrer" />
			</p>
		</form>
	</div>
	<div class="bdrl"></div>
	<div class="bdrr"></div>
</div>

<?php require_once('footer.php') ?>