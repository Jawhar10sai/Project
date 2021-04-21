<?

$q = "SELECT * FROM `admin` WHERE id = {$_GET["id"]}";

$r = mysql_query($q);



$row = mysql_fetch_array($r);
//echo $row['acces']." - > ".(strpos($row['acces'],"admin;"));
?>

		<div align="center">
		<div class="div_main">
			<br/>
			<div class="txt_1"><b>Creer nouveaux compte administrateur:</b></div>
			<div id="general_icon" style="background-image:url(img_icons/icon-admin-add.gif);"></div>
			
			<div class="div_form">
				<form name="form12" id="form12" action="process-users.php" method="post">
				<input name="action" value="modify" type="hidden">
				<input name="id" value="<?=$row['ID']?>" type="hidden">
				<table width="55%" cellpadding="2" cellspacing="2" border="0" align="center">
				<tr>
					<td width="45%" class="txt_small">&nbsp;</td>
					<td width="55%" class="txt_small">&nbsp;</td>
				</tr>
				<tr>
					<td class="txt_black" align="left"><b>Identifiant Administrateur : </b></td>
					<td class="txt_black" align="left"><input name="user" type="text" size="21" maxlength="99" value="<?=$row['Login']?>"></td>
				</tr>
				<tr>
					<td class="txt_black" align="left" valign="top"><b>Mot de passe : </b></td>
					<td class="txt_black" align="left"><input name="password" type="text" size="21" maxlength="99" value="<?=$row['password']?>"><br /></td>
				</tr>
				
<!--				<tr>
					<td class="txt_black" align="left" valign="top"><b>Accés: </b><br /><font style="color:#999999; font-size:10px; ">Utiliser le bouton Ctrl pour<br />
						selectionner plusieurs emplacements</font></td>
					<td class="txt_black" align="left">
                    <select name="sous_menu[]" multiple="multiple" size="8">
                              <option value="admin" <?= is_numeric(strpos($row['acces'],"admin;"))?'selected':''?> >Gestion administrateurs</option>
                              <option value="news" <?= is_numeric(strpos($row['acces'],"news;"))?'selected':''?>>Actualiés</option>
                              <option value="events" <?= is_numeric(strpos($row['acces'],"events;"))?'selected':''?>>Conseils parent</option>
                              <option value="sondages" <?= is_numeric(strpos($row['acces'],"sondages;"))?'selected':''?> >Sondages</option>
                              <option value="membres" <?= is_numeric(strpos($row['acces'],"membres;"))?'selected':''?> >Membres</option>
                              <option value="liens" <?= is_numeric(strpos($row['acces'],"liens;"))?'selected':''?>>Liens</option>
                              <option value="produits" <?= is_numeric(strpos($row['acces'],"produits;"))?'selected':''?> >Produits</option>
                              <option value="catalogue" <?= is_numeric(strpos($row['acces'],"catalogue;"))?'selected':''?> >Catalogues</option>
                   </select>                    
                    
                    </td>
				</tr>
-->				<tr><td colspan="3" class="txt_black" align="center"><br />
				<input type="submit" name="SubmitAll" class="button_1" value="Sauver le compte" onmouseover="this.style.backgroundColor='#1E90FF'" onmouseout="this.style.backgroundColor='#1874CD'" onClick="send('form12');" />
				</td></tr>			  
				</table>
				</form>
			</div>
			<br/>
		</div>
		<br/>
