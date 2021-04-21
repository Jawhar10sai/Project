<?php if(isset($_GET['compte']) && $_GET['compte'] > 0 && isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == "account_creation"){
	
	
	
	
	
	
}else{?>


		<!--[if IE 9]>
			 <style type="text/css">
				.form-panel .input, .form-panel input, .form-panel textarea {
					border-radius: 0;
				}
			 </style>
		<![endif]-->
<script language="javascript">

$(document).ready(function() {

$("#formID #email").focusout(function() {
	$("#formID #next").attr("disabled", "disabled");
var order = "action=verif_email&id_site=<?php echo $idsite; ?>&email="+$(this).val();
$.post("<?php echo SITEPATH; ?>modules/inscription/inscription.php", order, function(theResponse){
	if(theResponse > 0){
	$("#formID #response_email").html("Votre Email existe déja!");
	$("#formID #next").attr("disabled", "disabled");
	}else{
	$("#formID #response_email").html("");
	$("#formID #next").removeAttr("disabled");
	}
	
}); 



})



$('#formID .select_option').change(function(){
	
	if($(this).val() == 'Autres : Précisez' ||$(this).val() == 'Autres : Pr&eacute;cisez' ){
	$nom = "#div_autres_"+$(this).attr('name');
	$($nom).show();
	}else{
	$($nom).hide();
		}
	});
	
/*
*/
});
</script>
		<div class="ex-form ui-helper-clearfix ui-corner-all">
			<div id="les_etapes">
				<div id="etape_texte">
					<div id="et1" class="etdiv etdiv-active">Etape 1</div>
					<div id="et2" class="etdiv">Etape 2</div>
					<div id="et3" class="etdiv">Etape 3</div>
					<div id="et4" class="etdiv">Etape 4</div>
					<div id="et5" class="etdiv">Etape 5</div>
				</div>
				<div id="espace_etape"></div>
				<div id="etape_button">
					<div id="bt1" class="btdiv btdiv-active">
						<div id="pt2" class="bt_progress"></div>
					</div>
					<div id="bt2" class="btdiv">
						<div id="pt3" class="bt_progress"></div>
					</div>
					<div id="bt3" class="btdiv">
						<div id="pt4"class="bt_progress"></div>
					</div>
					<div id="bt4" class="btdiv">
					<div id="pt5" class="bt_progress"></div>
					</div>
					<div id="bt5" class="btdiv"></div>
				</div>
			</div>
			<h1>Formulaire inscription</h1>
		<form id="formID" class="formular" method="post" action="">
        <div id="panel1" class="form-panel">
					<fieldset class="ui-corner-all">
						<div id="panel1_1">	
							<h2 class="titreh2">INFORMATIONS PERSONNELLES</h2>
							<div>
								<div class="titre_input">
								Civilité<span>*</span> :
								</div>
									<div class="input_input">
										<div>
										<input type="radio" name="civilite" id="civilite" checked value="M." /> M
										</div>
										<div>
										<input type="radio" name="civilite" id="civilite" value="Mme" /> Mme
										</div>
										<div>
										<input type="radio" name="civilite" id="civilite" value="Mlle" /> Mlle
										</div>
									</div>
							</div><br><br>
							<div>
								<div class="titre_label">Prénom<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="prenom" id="prenom" /></div>
							</div>	
							<div>
								<div class="titre_label">Nom<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="nom" id="nom" /></div>
							</div>
							<div>
								<div class="titre_label">Téléphone<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,custom[telephone]] text-input" type="text" name="mobile" id="mobile" /></div>
							</div>
							<div style="width: auto !important;">
								<div class="titre_label">E-mail<span>*</span> :<div id="response_email"></div></div>
								<div class="input_label"><input class="validate[required,custom[email]] text-input" type="text" name="email" id="email" /></div>
								
							</div>
							<div>
								<div class="titre_label">Mot de passe<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,length[6,11]] text-input" type="password" name="mot_passe" id="mot_passe" /></div>
							</div>
							<div>
								<div class="titre_label">Date naissance<span>*</span> :</div>
								<div class="input_label">
									<select id="jours_naissance" name="jours_naissance" type="select" class="validate[required]">
										<option value="">JJ</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
										
									</select>
									<select id="mois_naissance" name="mois_naissance" type="select" class="validate[required]">
									<option value="">MM</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
									<select id="annee_naissance" name="annee_naissance" type="select" class="validate[required]">
										<option value="">AA</option>
										<?php 
										for($i=1920;$i<=2000;$i++){
										?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php
										}
										?>
									</select>
								
								</div>
							</div>
							<div>
								<div class="titre_label"><a href="#" onclick="window.open ('conditions_utilisation.html', 'Conditions Generales', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no')">J’accepte les conditions d’utilisation : </a><span>*</span> : <input class="validate[required] text-input" type="checkbox" name="Condition" id="Condition" /></div>
								<div class="input_input">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							</div>
						</div>
						<div id="panel1_2">
							<h2 class="titreh2">VOTRE ADRESSE</h2>
							<div style="height:47px">
								
							</div>
							<div>
								<div class="titre_label">Nom de l'adresse<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,length[0,500]] text-input" type="text" name="adresse2" id="adresse2" /></div>
							</div>
							<div>
								<div class="titre_label">Adresse<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,length[0,500]] text-input" type="text" name="adresse" id="adresse" /></div>
							</div>
							<div>
								<div class="titre_label">Code postal<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,custom[onlyNumber]] text-input" type="text" name="code_postale" id="code_postale" /></div>
							</div>
							<div>
								<div class="titre_label">Ville<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="ville" id="ville" /></div>
							</div>
							<div>
								<div class="titre_label">Pays<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,custom[onlyLetter],length[0,50]] text-input" type="text" name="pays" id="pays" /></div>
							</div>
							<div>
								<div class="titre_label">Fixe<span>*</span> :</div>
								<div class="input_label"><input class="validate[required,custom[telephone]] text-input" type="text" name="fixe" id="fixe" /></div>
							</div>
						</div>
						<div id="panel1_3">
						<div>
								<div class="titre_label">Mode de contact préféré<span>*</span> :</div>
								<div class="input_label">
									<select type="select"  name="mode_contact" id="mode_contact" class="validate[required]">
										<option value="">Sélectionner</option>
										  <option value="Téléphone">Téléphone</option>
										  <option value="E-mail">E-mail</option>
										  <option value="Fax">Fax</option>
										  <option value="Courrier postal">Courrier postal</option>
									</select>
								</div>
							</div>
						</div>
					<fieldset>	
				</div>
				<div id="panel2" class="form-panel ui-helper-hidden">
					<div id="panel1_1">	
						<h2 class="titreh2">INFORMATIONS COMPLÉMENTAIRES</h2>
						<div>
								<div class="titre_label">N° C.I.N.<span>*</span> :</div>
								<div class="input_label"><input class="validate[required] text-input" type="text" name="cin" id="cin" /></div>
						</div>
						<div>
								<div class="titre_label">Situation matrimoniale<span>*</span> :</div>
								<div class="input_label">
									<select type="select"  name="situation_matrimoniale" id="situation_matrimoniale" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Célibataire">Célibataire</option>
									  <option value="Marié(e)">Marié(e)</option>
									  <option value="Divorcé(e)">Divorcé(e)</option>
									  <option value="Veuf(ve)">Veuf(ve)</option>
									</select>
								</div>
						</div>
						<div>
								<div class="titre_label">Situation patrimoniale<span></span> :</div>
								<div class="input_label">
									<select type="select"  name="situation_patrimoniale" id="situation_patrimoniale" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Locataire">Locataire</option>
									  <option value="Propriétaire">Propriétaire</option>
									</select>
								</div>
						</div>
						<div>
								<div class="titre_label">Nombre d'enfants<span>*</span> :</div>
								<div class="input_label">
								<select type="select"  name="nombre_enfants" id="nombre_enfants" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="0">0</option>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									  <option value="5">5</option>
									  <option value="6">6</option>
									  <option value="7">7</option>
									  <option value="8">8</option>
									  <option value="9">9</option>
									  <option value="10">10</option>
								</select>
								</div>
						</div>
						<h2 class="titreh2">CRITÈRES SOCIOPROFESSIONNELS</h2>
						<div>
								<div class="titre_label">Niveau d'instruction<span>*</span> :</div>
								<div class="input_label">
								<select type="select"  name="niveau_instruction" id="niveau_instruction" class="validate[required]">
								  <option value="">Sélectionner</option>
								  <option value="Primaire">Primaire</option>
								  <option value="Secondaire">Secondaire</option>
								  <option value="Niveau Baccalauriéat">Niveau Baccalauriéat</option>
								  <option value="Baccalauriéat">Baccalauriéat</option>
								  <option value="Bac +1 ou Bac +2">Bac +1 ou Bac +2</option>
								  <option value="Bac +3 ou Bac +4">Bac +3 ou Bac +4</option>
								  <option value="Bac +5 ou plus">Bac +5 ou plus</option>
								  <option value="Sans">Sans</option>
								</select>
								</div>
						</div>
						<div>
								<div class="titre_label">Catégorie socioprofessionnelle<span>*</span> :</div>
								<div class="input_label">
								<select type="select"  name="categorie_socioprofessionnelle" id="categorie_socioprofessionnelle" class="validate[required]">
								  <option value="">Sélectionner</option>
								  <option value="Agriculture"><strong>Agriculture</strong></option>
								  <option value="Agriculteur exploitant">Agriculteur exploitant</option>
								  
								  <option value="Artisan">Artisan</option>
								  <option value="Commerçant et assimilés">Commerçant et assimilés</option>
								  <option value="Chef d'entreprise de 10 salariés ou plus">Chef d'entreprise de 10 salariés ou plus</option>
								  
								  <option value="Cadres, professions intellectuelles supérieures">Cadres, professions intellectuelles supérieures</option>
								  <option value="Profession libérale">Profession libérale</option>
								  <option value="Cadre de la fonction publique">Cadre de la fonction publique</option>
								  <option value="Officier et élève officier des armées">Officier et élève officier des armées</option>
								  <option value="Professeur et profession scientifique">Professeur et profession scientifique</option>
								  <option value="Médecins hospitaliers et internes des hôpitaux">Médecins hospitaliers et internes des hôpitaux</option>
								  <option value="Profession de l'information, des arts et du spectacle">Profession de l'information, des arts et du spectacle</option>
								  <option value="Cadre administratif et commercial d'entreprise">Cadre administratif et commercial d'entreprise</option>
								  <option value="Ingénieur et cadre technique d'entreprise">Ingénieur et cadre technique d'entreprise</option>
								  
								  <option value="Professions intermédiaires"><strong>Professions intermédiaires</strong></option>
								  <option value="Instituteur et assimiliés">Instituteur et assimiliés</option>
								  <option value="Conseiller d'éducation, maître auxiliare">Conseiller d'éducation, maître auxiliare</option>
								  <option value="Maître d'internat, surveillant d'externat">Maître d'internat, surveillant d'externat</option>
								  <option value="Professions de la santé et du travail social">Professions de la santé et du travail social</option>
								  <option value="Employés des lieux de culte religieux">Employés des lieux de culte religieux</option>
								  <option value="Professions intermédiaires administratives de la fonction publique">Professions intermédiaires administratives de la fonction publique</option>
								  <option value="Professions intermédiaires administratives et commerciales d'entreprise">Professions intermédiaires administratives et commerciales d'entreprise</option>
								  <option value="Technicien">Technicien</option>
								  <option value="Contremaitre, agent de maîtrise ">Contremaitre, agent de maîtrise </option>
								  
								  <option value="Employés"><strong>Employés</strong></option>
								  <option value="Employé civil, agent de service de la fonction publique, aide éducateur">Employé civil, agent de service de la fonction publique, aide éducateur</option>
								  <option value="Policier, militaire">Policier, militaire</option>
								  <option value="Employé administratif d'entreprise">Employé administratif d'entreprise</option>
								  <option value="Employé de commerce">Employé de commerce</option>
								  <option value="Personnel des services directs aux particuliers">Personnel des services directs aux particuliers</option>
								  
								  <option value="Ouvrier"><strong>Ouvrier</strong></option>
								  <option value="Ouvrier qualifié">Ouvrier qualifié</option>
								  <option value="Ouvrier non qualifié">Ouvrier non qualifié</option>
								  <option value="Ouvrier agricole">Ouvrier agricole</option>
								  
								  <option value="Retraités"><strong>Retraités</strong></option>
								  <option value="Ancien agriculteur exploitant">Ancien agriculteur exploitant</option>
								  <option value="Ancien artisan, commerçant ou chef d'entreprise">Ancien artisan, commerçant ou chef d'entreprise</option>
								  <option value="Ancien cadre et professions intermédiaires">Ancien cadre et professions intermédiaires</option>
								  <option value="Ancien employé et ouvrier">Ancien employé et ouvrier</option>
								  
								  <option value="Autres inactifs"><strong>Autres inactifs</strong></option>
								  <option value="Chômeur(se) n'ayant jamais travaillé">Chômeur(se) n'ayant jamais travaillé</option>
								  <option value="Chômeur(se) à la recherche d'emploi">Chômeur(se) à la recherche d'emploi</option>
								  <option value="Etudiant(e) ou lycéen(ne)">Etudiant(e) ou lycéen(ne)</option>
									</select>
								</div>
						</div>
						<div>
								<div class="titre_label">Secteur d'activité<span>*</span> :</div>
								<div class="input_label">
									<select type="select"  name="secteur_activite" id="secteur_activite" class="validate[required]">
									  <option value="">Sélectionner</option>	
									  <option value="Agricole">Agricole</option>
									  <option value="Industriel">Industriel</option>
									  <option value="Commercial">Commercial</option>
									  <option value="Services">Services</option>
									  </select>
								</div>
						</div>
						<div>
								<div class="titre_label">Statut Profession du conjoint<span>*</span> :</div>
								<div class="input_label">
									<select type="select"  name="statut_conjoint" id="statut_conjoint" class="validate[required]">
							  <option value="">Sélectionner</option>
							  <option value="Indépendant(e)">Indépendant(e)</option>
							  <option value="Libéral(e)">Libéral(e)</option>
							  <option value="Etudiant(e)">Etudiant(e)</option>
							  <option value="Employé(e)">Employé(e)</option>
							  <option value="Retraité(e)">Retraité(e)</option>
							  <option value="Fonctionnaire">Fonctionnaire</option>
							  <option value="Chef d'entreprise">Chef d'entreprise</option>
							  <option value="Femme au foyer">Femme au foyer</option>
							  <option value="Sans emploi">Sans emploi</option>
							  <option value="Autre">Autre</option>
						  </select>
								</div>
						</div>
						<div>
								<div class="titre_label">Voyagez-vous dans le cadre de votre travail ?<span>*</span></div>
								<div class="input_label">
									<select type="select"  name="cadre_travail" id="cadre_travail" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Oui">Oui</option>
									  <option value="Non">Non</option>
								  </select>
								</div>
						</div>
						<div>
								<div class="titre_label">Si oui, vous effectuez des voyages ?<span></span> </div>
								<div class="input_label">
									<select type="select"  name="voyage_travail" id="voyage_travail" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="A travers le Maroc">A travers le Maroc</option>
									  <option value="A l'étranger">A l'étranger</option>
								  </select>
								</div>
						</div>
					</div>
					<div style="clear:both"></div>
					</fieldset>
				</div>
                <div id="panel3" class="form-panel ui-helper-hidden">
				  <h2>Informations complémentaires</h2>
					<fieldset class="ui-corner-all">
							<div>
								<div class="titre_label">Vous habitez<span>*</span> :</div>
								<div class="input_label">
									<select type="select"  name="vous_habitez" id="vous_habitez" class="validate[required] select_option">
									  <option value="">Sélectionner</option>
									  <option value="Un appartement">Un appartement</option>
									  <option value="Un studio">Un studio</option>
									  <option value="Une villa">Une villa</option>
									  <option value="Une maison individuelle">Une maison individuelle</option>
									  <option value="Une maison de campagne">Une maison de campagne</option>
									  <option value="Autres : Précisez">Autres : Précisez</option>
								  </select>
								  <div class="label" id="div_autres_vous_habitez" style="display:none">
										<label class="title" for="text">Autres<span>*</span></label>
										<div class="input textarea">
											<textarea rows="3" cols="25" name="autres_vous_habitez" id="autres_vous_habitez"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div>
								<div class="titre_label">Vos revenus globaux du foyer<span>*</span> :</div>
								<div class="input_label">
									<select type="select"  name="Vos_revenus_globaux_du_foyer" id="Vos_revenus_globaux_du_foyer" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Entre 0 et 24.000 Dhs.">Entre 0 et 24.000 Dhs.</option>
									  <option value="Entre 24.001 et 42.000 Dhs.">Entre 24.001 et 42.000 Dhs.</option>
									  <option value="Entre 42.001 et 72.000 Dhs.">Entre 42.001 et 72.000 Dhs.</option>
									  <option value="Entre 72.001 et 120.000 Dhs.">Entre 72.001 et 120.000 Dhs.</option>
									  <option value="Supérieur à 120.000 Dhs.">Supérieur à 120.000 Dhs.</option>
								  </select>
								</div>
							</div>
							<div>
								<div class="titre_label">Possédez-vous un ou des véhicules automobiles ?<span>*</span> </div>
								<div class="input_label">
									<select type="select"  name="vehicules_automobiles" id="vehicules_automobiles" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Oui">Oui</option>
									  <option value="Non">Non</option>
								    </select>
								</div>
							</div>
							<div>
								<div class="titre_label">Etes-vous équipés en matériel informatique ?<span>*</span>  </div>
								<div class="input_label">
										<select type="select"  name="materiel_informatique" id="materiel_informatique" class="validate[required]">
										  <option value="">Sélectionner</option>
										  <option value="Oui">Oui</option>
										  <option value="Non">Non</option>
									  </select>
								</div>
							</div>
							<div>
								<div class="titre_label">Avez-vous une connexion Internet à domicile ?<span>*</span>  </div>
								<div class="input_label">
										<select type="select"  name="connexion_internet" id="connexion_internet" class="validate[required]">
										  <option value="">Sélectionner</option>
										  <option value="Oui">Oui</option>
										  <option value="Non">Non</option>
									  </select>
								</div>
							</div>
							<div>
								<div class="titre_label">Etes-vous bancarisés ?<span>*</span> </div>
								<div class="input_label">
										<select type="select"  name="bancarises" id="bancarises" class="validate[required]">
										  <option value="">Sélectionner</option>
										  <option value="Oui">Oui</option>
										  <option value="Non">Non</option>
										</select>
								</div>
							</div>
							<div>
								<div class="titre_label">Etes-vous couvert par des assurances ?<span>*</span> </div>
								<div class="input_label">
									<select type="select"  name="assurances" id="assurances" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Oui">Oui</option>
									  <option value="Non">Non</option>
								  </select>
								</div>
							</div>
							<div>
								<div class="titre_label">Quels sont vos centres d'intérêt ?<span>*</span> </div>
								<div class="input_label">
									<select type="select"  name="centres_interet" id="centres_interet" class="validate[required] select_option" multiple style="height:50px;">
									  <option value="">Sélectionner</option>
									  <option value="Architecture">Architecture</option>
									  <option value="Sport">Sport</option>
									  <option value="Lecture">Lecture</option>
									  <option value="Musique">Musique</option>
									  <option value="Cinéma">Cinéma</option>
									  <option value="Economie & Finance">Economie & Finance</option>
									  <option value="Arts">Arts</option>
									  <option value="Histoire">Histoire</option>
									  <option value="Voyages">Voyages</option>
									  <option value="Droits">Droits</option>
									  <option value="Jeux">Jeux</option>
									  <option value="Environnement">Environnement</option>
									  <option value="Autres : Précisez">Autres : Précisez</option>
								  </select>
								   <div class="label" id="div_autres_centres_interet" style="display:none">
										<label class="title" for="text">Autres</label>
										<div class="input textarea">
											<textarea rows="3" cols="25" name="autres_centres_interet" id="autres_centres_interet"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div>
								<div class="titre_label">Vous avez pris connaissance du site Marketstudies.ma à travers<span>*</span> :</div>
								<div class="input_label">
									<select type="select"  name="connaissance_site" id="connaissance_site" class="validate[required] select_option">
									  <option value="">Sélectionner</option>
									  <option value="La publicité">La publicité</option>
									  <option value="Les réseaux sociaux">Les réseaux sociaux</option>
									  <option value="La recherche sur les moteurs de recherche">La recherche sur les moteurs de recherche</option>
									  <option value="L'E-mailing">L'E-mailing</option>
									  <option value="Un ami ou collaborateur">Un ami ou collaborateur</option>
									  <option value="Un contact professionnel">Un contact professionnel</option>
									  <option value="Par hasard">Par hasard</option>
									  <option value="Autres : Précisez">Autres : Précisez</option>
								  </select>
								   <div class="label" id="div_autres_connaissance_site" style="display:none">
									<label class="title" for="text">Autres<span>*</span></label>
									<div class="input textarea">
										<textarea rows="3" cols="25" name="autres_connaissance_site" id="autres_connaissance_site"></textarea>
									</div>
								</div>
								</div>
							</div>
							<div>
								<div class="titre_label">Souhaitez-vous participer à  nos réunions de groupe ?<span>*</span> </div>
								<div class="input_label">
								<select type="select"  name="participer_reunions" id="participer_reunions" class="validate[required]">
								  <option value="">Sélectionner</option>
								  <option value="Oui">Oui</option>
								  <option value="Non">Non</option>
								</select>
						  </div>
							</div>
					</fieldset>
				</div>
				<div id="panel4" class="form-panel  ui-helper-hidden">
				  <h2>Vos projets professionnels</h2>
					<fieldset class="ui-corner-all">
							<div>
								<div class="titre_label">Avez-vous un projet de création d'entreprise dans un futur proche ?<span>*</span></div>
								<div class="input_label">
									<select type="select"  name="creation_entreprise" id="creation_entreprise" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Oui">Oui</option>
									  <option value="Non">Non</option>
								  </select>
								</div>
							</div>
							<div>
								<div class="titre_label">Si oui, dans quels secteurs d'activité, souhaitez-vous investir ?<span>*</span></div>
								<div class="input_label">
									<select type="select"  name="secteurs_activite_investir" id="secteurs_activite_investir" class="select_option validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Agriculture & Elevage">Agriculture & Elevage</option>
									  <option value="Artisanat">Artisanat</option>
									  <option value="Commerce">Commerce</option>
									  <option value="Communication">Communication</option>
									  <option value="Culture & Art">Culture & Art</option>
									  <option value="Energie">Energie</option>
									  <option value="Equipements & Transport">Equipements & Transport</option>
									  <option value="Education & Enseignement">Education & Enseignement</option>
									  <option value="Formation">Formation</option>
									  <option value="Industrie">Industrie</option>
									  <option value="Nouvelles technologies">Nouvelles technologies</option>
									  <option value="Pêches maritimes">Pêches maritimes</option>
									  <option value="Santé">Santé</option>
									  <option value="Sport">Sport</option>
									  <option value="Tourisme & Loisirs">Tourisme & Loisirs</option>
									  <option value="Services">Services</option>
									  <option value="Autres : Précisez">Autres : Précisez</option>
								  </select>
								<div class="label" id="div_autres_secteurs_activite_investir" style="display:none">
									<label class="title" for="text">Autres</label>
									<div class="input textarea">
										<textarea rows="3" cols="25" name="autres_secteurs_activite_investir" id="autres_secteurs_activite_investir"></textarea>
									</div>
								</div>
								</div>
							</div>
							<div>
								<div class="titre_label">Comptez-vous vous faire accompagner lors de la phase de réalisation et de lancement de votre projet ?<span>*</span></div>
								<div class="input_label">
									<select type="select"  name="accompagner" id="accompagner" class="validate[required]">
									  <option value="">Sélectionner</option>
									  <option value="Oui">Oui</option>
									  <option value="Non">Non</option>
								  </select>
								</div>
							</div>	
						
					</fieldset>
				</div>
				<div id="panel5" class="form-panel ui-helper-hidden">
				  <h2>Validation</h2>
					<fieldset class="ui-corner-all">
					
                    </fieldset>
                     
				</div><input type="button" value="&#9664; Précedent" id="back" class="btn_inscription" disabled data-site="<?php echo $idsite; ?>" style="display:none;" > 
				<input type="submit" value="Suivant &#9654;" id="next" class="btn_inscription" data-site="<?php echo $idsite; ?>" > 
			</form>
		</div>

<?php } ?>