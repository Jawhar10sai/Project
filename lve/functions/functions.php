<?php
function get_field_type($id ,$type , $name, $options , $required , $action="existant",$type_champ){
	
	if($action == 'show'){
$name = stripslashes(($name));
$opt=stripslashes(($options));
		
		}else if($action == 'existant'){
$name = stripslashes($name);
$opt=stripslashes($options);
		
		}else{
$name = stripslashes(utf8_decode(utf8_encode($name)));
$opt=stripslashes(utf8_decode(utf8_encode($options)));
		}
		

$options=split(",",$opt);


$class="";	
$field_id="field_".$id;
$the_id="the_".$id;
$field_lib="field_lib_".$id;
$field_type="field_type_".$id;
$field_olg="field_olg_".$id;
$field_opt="field_opt_".$id;
$field_by_type="";

if( $action=="new"){
	$field_id="add_field_".$id;
	$the_id="add_the_".$id;
	$field_lib="add_field_lib_".$id;
	$field_type="add_field_type_".$id;
	$field_olg="add_field_olg_".$id;
	$field_opt="add_field_opt_".$id;
}

	if($required==1){
		$class="required";	
	}
	switch ($type){
		
		
	 case "text":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn $class\" value=\"$name\">";
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"$class\">";
	 }
			break;
			
			
	 case "email":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn Email $class\" value=\"$name\">";
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"Email $class\">";
	 }
			break;
			
			
	 case "numerique":
	 
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn numerique $class\" value=\"$name\">";
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn numerique $class\">";
	 }
			break;
			
			
	 case "date":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn date $class\" value=\"$name\">";
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"date $class\">";
	 }
			break;
			
			
	 case "url":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn url $class\" value=\"$name\">";
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"url $class\">";
	 }
			break;


	 case "textarea":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<textarea name=\"$field_id\" title=\"$name\" id=\"$field_id\" class=\"textIn textarea $class\">$name</textarea>";
	 }else{
			$field_by_type= "<label>$name</label><br /><textarea name=\"$field_id\" title=\"$name\" id=\"$field_id\" class=\"textarea $class\"></textarea>";
	 }
			break;
			
			
			
	 case "select":
			$field_by_type= "<label>$name</label><br /><select name=\"$field_id\" title=\"$name\" id=\"$field_id\" class=\"$class\">";
			if(!empty($options)){
			foreach($options as $option){
			$field_by_type.="<option value='$option'>".$option."</option>";
			}
			}
			$field_by_type.="</select>";
			break;
			
			
			
	 case "checkbox":
			$field_by_type= "<label>$name</label><br />";
			if(!empty($options)){
			foreach($options as $option){
			$field_by_type.="<label><input type=\"checkbox\" name=\"$field_id\" value=\"$option\" id=\"field_id\" />$option</label> ";
			}
			}
			$field_by_type.="</select>";
			break;
			
			
			
	 case "radio":
			$field_by_type= "<label>$name</label><br />";
			if(!empty($options)){
			foreach($options as $option){
			$field_by_type.="<label class=\"radio\"><input type=\"radio\" name=\"$field_id\" value=\"$option\" id=\"field_id\" />$option</label> ";
			}
			}
			$field_by_type.="<div class=\"\"></div>";
			break;
			
	}
	
if($action!="show")	{
	$field_by_type="<a class=\"remove_field\" href=\"javascript:void(0);\">X</a> <a class=\"update_field\" href=\"javascript:void(0);\">Editer</a> ".$field_by_type;
}
$field_by_type.="<input type=\"hidden\" name=\"$the_id\" value=\"$id\" class=\"the_id\" />
				<input type=\"hidden\" name=\"$field_lib\" value=\"$name\" class=\"lib\" />
				<input type=\"hidden\" name=\"$field_type\" value=\"$type\" class=\"type\" />
				<input type=\"hidden\" name=\"$field_olg\" value=\"$required\" class=\"oblg\" />
				<input type=\"hidden\" name=\"$field_opt\" value=\"$opt\" class=\"opt\" />
				";
echo  $field_by_type;
}

function get_field_type_ar($id ,$type , $name, $options , $required , $action="existant",$type_champ){
	
	if($action == 'show'){
$name = $name;
		
		}else if($action == 'existant'){
$name = $name;
		
		}else{
$name = $name;
		}
$opt=$options;
$options=split(",",$options);

$class="";	
$field_id="field_".$id;
$the_id="the_".$id;
$field_lib="field_lib_".$id;
$field_type="field_type_".$id;
$field_olg="field_olg_".$id;
$field_opt="field_opt_".$id;
$field_by_type="";

if( $action=="new"){
	$field_id="add_field_".$id;
	$the_id="add_the_".$id;
	$field_lib="add_field_lib_".$id;
	$field_type="add_field_type_".$id;
	$field_olg="add_field_olg_".$id;
	$field_opt="add_field_opt_".$id;
}

	if($required==1){
		$class="required";	
	}
	switch ($type){
		
		
	 case "text":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn $class\" value=\"$name\">";
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"$class\">";
	 }
			break;
			
			
	 case "email":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn Email $class\" value=\"$name\">";
		 
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"Email $class\">";
	 }
			break;
			
			
	 case "numerique":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn numerique $class\" value=\"$name\">";
	 }else{	 
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"numerique $class\">";
	 }
			break;
			
			
	 case "date":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn date $class\" value=\"$name\">";
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"date $class\">";
	 }
			break;
			
			
	 case "url":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"textIn url $class\" value=\"$name\">";
	 }else{
			$field_by_type= "<label>$name</label><br /><input type=\"text\" title=\"$name\" name=\"$field_id\" id=\"$field_id\" class=\"url $class\">";
	 }
			break;


	 case "textarea":
	 if($type_champ == 1 && $action=="show"){
			$field_by_type= "<textarea name=\"$field_id\" title=\"$name\" id=\"$field_id\" class=\"textIn textarea $class\">$name</textarea>";
	 }else{
			$field_by_type= "<label>$name</label><br /><textarea name=\"$field_id\" title=\"$name\" id=\"$field_id\" class=\"textarea $class\"></textarea>";
	 }
			break;
			
			
			
	 case "select":
			$field_by_type= "<label>$name</label><br /><select name=\"$field_id\" title=\"$name\" id=\"$field_id\" class=\"$class\">";
			if(!empty($options)){
			foreach($options as $option){
			$field_by_type.="<option>$option</option>";
			}
			}
			$field_by_type.="</select>";
			break;
			
			
			
	 case "checkbox":
			$field_by_type= "<label>$name</label><br />";
			if(!empty($options)){
			foreach($options as $option){
			$field_by_type.="<label><input type=\"checkbox\" name=\"$field_id\" value=\"$option\" id=\"field_id\" />$option</label> ";
			}
			}
			$field_by_type.="</select>";
			break;
			
			
			
	 case "radio":
			$field_by_type= "<label>$name</label><br />";
			if(!empty($options)){
			foreach($options as $option){
			$field_by_type.="<label class=\"radio\"><input type=\"radio\" name=\"$field_id\" value=\"$option\" id=\"field_id\" />$option</label> ";
			}
			}
			$field_by_type.="</select>";
			break;
			
	}
	
if($action!="show")	{
	$field_by_type="<a class=\"remove_field\" href=\"javascript:void(0);\">X</a> <a class=\"update_field\" href=\"javascript:void(0);\">Editer</a> ".$field_by_type;
}
$field_by_type.="<input type=\"hidden\" name=\"$the_id\" value=\"$id\" class=\"the_id\" />
				<input type=\"hidden\" name=\"$field_lib\" value=\"$name\" class=\"lib\" />
				<input type=\"hidden\" name=\"$field_type\" value=\"$type\" class=\"type\" />
				<input type=\"hidden\" name=\"$field_olg\" value=\"$required\" class=\"oblg\" />
				<input type=\"hidden\" name=\"$field_opt\" value=\"$opt\" class=\"opt\" />
				";
echo  $field_by_type;
}

if(isset($_POST['id']) && isset($_POST['lib']) && isset($_POST['type']) && isset($_POST['oblg']) && isset($_POST['action']) ){
	get_field_type($_POST['id'] , $_POST['type'] , $_POST['lib'] , $_POST['opt'] , $_POST['oblg'] , $_POST['action'],'0');	
}
function get_option($field_id){	


}


function insert_field($field_id){	


}

//Générer une chaine de caractère unique et aléatoire

function random($car) {
$string = "";
$chaine = "0123456789";
srand((double)microtime()*1000000);
for($i=0; $i<$car; $i++) {
$string .= $chaine[rand()%strlen($chaine)];
}
return '2013'.$string;
}


?>

