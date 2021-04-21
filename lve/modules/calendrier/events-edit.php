<?php 
require_once('header.php');
require_once('smoothcalendar.php');

$id = (isset($_GET["id"]) && is_numeric($_GET["id"])) ? (int)$_GET["id"] : "";
?>
<div class="main-content">
	<div class="header" >
		<div class="hdrl"></div>
		<div class="hdrr"></div>
		<h2>Modifier événement</h2>
	</div>
	<div class="block">
<?php

if (strcmp($id, "") != 0)
{
	$result = $calendar->getEventById($id);

	if (isset($result["error"]))
	{
?>
		<p class="message error">
			<?php echo $result["error"]; ?>
		</p>
<?php
	}
	else if (count($result) == 0)
	{
?>
		<p class="message error">
			Il y a un problème avec cette demande.		</p>
<?php
	}
	else
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (isset($_POST["event"]))
			{
				$description = $_POST["event"]["description"];
				$eventtime   = mktime($_POST["event"]["hour"  ], 
				                      $_POST["event"]["minute"], 0,
				                      $_POST["event"]["month" ], 
				                      $_POST["event"]["day"   ], 
				                      $_POST["event"]["year"  ]);
				$eventtime   = date('Y-m-d H:i:s', $eventtime); 

		
		$eventtime_end = mktime($_POST["event"]["hour1"], 
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
					$result = $calendar->editEvent(array("id" => $id, "date" => $eventtime,"date_fin" => $eventtime_end, "content" => $description));				
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
		exit();			}
					$result = $calendar->getEventById($id);
				}
			}	
		}
	
		$eventDate = strtotime($result["date"]);
		$info      = getdate($eventDate);
		$year      = (int)$info["year"   ];
		$month     = (int)$info["mon"    ];
		$day       = (int)$info["mday"   ];
		$hour      = (int)$info["hours"  ];
		$minute    = (int)$info["minutes"];
		
		$eventDate_fin = strtotime($result["date_fin"]);
		$info_fin      = getdate($eventDate_fin);
		$year_fin      = (int)$info_fin["year"   ];
		$month_fin     = (int)$info_fin["mon"    ];
		$day_fin       = (int)$info_fin["mday"   ];
		$hour_fin      = (int)$info_fin["hours"  ];
		$minute_fin   = (int)$info_fin["minutes"];
?>			
		<form method="POST" action="<?php echo $_SERVER["REQUEST_URI"]?>" >
			<div class="western">
				<p>
					<label>Description</label>
					<br/>
					<textarea id="setname" class="text" type="text"  name="event[description]" ><?php echo $result["content"]; ?></textarea>
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
							$selected = ($month == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
	
					<select name="event[year]">
<?php
						$currentYearInfo = getdate(time());
						$years           = (int)$currentYearInfo["year"];
						
						$lowDelta = ($years > $year) ? $years - ($years - $year) : $years;
						$hiDelta  = $years + 3;
						
						for($i = $lowDelta; $i <= $hiDelta; $i++)
						{
							$selected = ($year == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>						
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
							$value = ($i < 10) ? "0" . $i : $i;
							$selected = ($hour == $i) ? 'selected="selected"' : "";
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
							$selected = ($minute == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
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
							$selected = ($day_fin == $i) ? 'selected="selected"' : "";
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
							$selected = ($month_fin == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
<?php
						}
?>
					</select>
	
					<select name="event[year1]">
<?php
						$currentYearInfo = getdate(time());
						$years           = (int)$currentYearInfo["year"];
						
						$lowDelta = ($years > $year_fin) ? $years - ($years - $year_fin) : $years;
						$hiDelta  = $years + 3;
						
						for($i = $lowDelta; $i <= $hiDelta; $i++)
						{
							$selected = ($year_fin == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>						
<?php
						}
?>
					</select>
				</p>
				<p>
					<label>Heure fin <em>(hh:mm)</em></label>
					<br/>
					<select name="event[hour1]">
<?php
						for($i = 0; $i < 24; $i++)
						{
							$value = ($i < 10) ? "0" . $i : $i;
							$selected = ($hour_fin == $i) ? 'selected="selected"' : "";
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
							$selected = ($minute_fin == $i) ? 'selected="selected"' : "";
?>
							<option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>						
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
<?php
	}
}
else 
{
?>
		<p class="message error">
			Il y a un problème avec cette demande.
		</p>
<?php
}
?>
	</div>
	<div class="bdrl"></div>
	<div class="bdrr"></div>
</div>

<?php require_once('footer.php') ?>