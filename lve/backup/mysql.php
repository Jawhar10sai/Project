<?
@session_start() ;
error_reporting(E_WARNING);
//$user=root  ;// Le nom d'utilisateur 
//$passwd ="";// Le mot de passe 
//$host =localhost ;// L'hôte (ordinateur sur lequel le SGBD est installé) 
//$bdd ="annonces test" ;// Le nom de la base de données 
/*$connect = mysql_connect($host,$user,$passwd) or die("erreur de connexion au serveur $host");
mysql_select_db($bdd) or  die("erreur de connexion a la base de donnees");*/

//$dbh=mysql_connect ("localhost", "saisiocc_user", "marocmaroc7") or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ("saisiocc_data"); 
//$s = mysql_connect("localhost","web42-tuv","maroc"); 
//$d = mysql_select_db("web42-tuv", $s);
//
//$s = mysql_connect("localhost","root",""); 
//$d = mysql_select_db("lavoie", $s);

//$s = mysql_connect("localhost","root",""); 
//$d = mysql_select_db("forconseil", $s);

 
//$s = mysql_connect("localhost","idoinema_user","zt]Zf[#mtf6d"); 
//$d = mysql_select_db("idoinema_data", $s);

function htmlent($str){
$r=str_replace('é','&eacute;',$str);
$r=str_replace('è','&egrave;',$r);
$r=str_replace('à','&agrave;',$r);
$r=str_replace('ê','&ecirc;',$r);
$r=str_replace('ç','&ccedil;',$r);
$r=str_replace('ô','&ocirc;',$r);
$r=str_replace("'","'",$r);
$r=str_replace("","'",$r);
return $r;
}

//$s = mysql_connect("mysql5-19.bdb","fineofordata","fineofor123"); 
//$d = mysql_select_db("fineofordata", $s);

$s = mysql_connect("mysql51-37.bdb","lavoieexdata","L08v11xp12"); 
$d = mysql_select_db("lavoieexdata", $s);


//$s = mysql_connect("localhost","tuv_roottuv","maroc"); 
//$d = mysql_select_db("tuv_tuv", $s);

mysql_query("SET NAMES utf8");

$dir='C:\Program Files\EasyPHP\www\casa hebdo test\\';
//$dir='/home/httpd/vhosts/casahebdo.com/httpdocs/';
define("sub_folder", "idoine/"); // For example userfiles/

function Titre_sous_menu($text,$sizetitle,$filename="",$maxwidth="",$align="",$couleur=""){
include "filtres_images.php";
$colour=$couleur?$couleur:"000000";
//$sizetitle="12";//-3;
$font='OPTAN.TTF';
//$font='TrajanPro-Regular.otf';
$filename=$filename?$filename:$text;
$outfile="images/".str_replace(" ","",$filename).".png";
//if(!file_exists($outfile))
produire_image_typo($text,$sizetitle,$colour,$font,$align,$maxwidth,"",5,$outfile);

return $outfile;
}

function uploadfile($name_file,$upload_dir,$newname){
    $content_dir = $upload_dir; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES[$name_file]['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }
	$taille_maxi = 3000000;
	$taille = filesize($tmp_file);
	
	if($_FILES[$name_file]['error']==2)
	{
	exit('Le fichier est trop gros...');
	}	
	
    // on vérifie maintenant l'extension
    $type_file = $_FILES[$name_file]['type'];
	//echo $type_file;

    if( !strstr($type_file, 'pdf') && !strstr($type_file, 'msword') && !strstr($type_file, 'ms-excel') && $name_file=='attache' && !strstr($type_file, 'officedocument'))
    {
        exit("Le fichier n'est pas un pdf.");
    }

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && $name_file=='image')
    {
        exit("Le fichier n'est pas une image");
    }
    // on copie le fichier dans le dossier de destination
    $name_file = $newname . $_FILES[$name_file]['name'];

	if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file) )
	{
		exit("Nom de fichier non valide");
	}
	else if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
	{
		exit("Impossible de copier le fichier dans $content_dir");
	}


    //echo "Le fichier a bien été uploadé";

}

function inserer_point($str)
{ 
		$str=strrev($str);
		if(!function_exists('str_split')){
			   function str_split($str,$split_lengt=1){
			
				   $cnt = strlen($str);
			
				   for ($i=0;$i<$cnt;$i+=$split_lengt)
					   $rslt[]= substr($str,$i,$split_lengt);    
			   
				   return $rslt;
			   }
		} 
		
		$str=str_split($str,3);
		
		//print_r($str);exit();
		$i=0;
		while($str[$i])
		{
		
			if($i==0)
			{$fin.=$str[$i];$i++;}
			else{
			$fin.=".".$str[$i];
			$i++;}
		
		//echo $str[$i]."<br>";
		}
		
		$fin=strrev($fin);
		return $fin;
}
function to_table($s){
return strtolower(str_replace("'","8",str_replace(" ","_",$s)));
}
function to_texte($s){
return ucfirst(strtolower(str_replace("8","'",str_replace("_"," ",$s))));
}

function dd($date0) {
// 15/03/2004
   return date("d/m/Y",$date0);
}

function getIcon($f){

	$type=explode(".",$f);
	$type_file = $type[1];
	switch( $type_file){
		case 'pdf':$img="pdf.png";break;
		case 'xls':$img="icon_xls.gif";break;
		case 'xlsx':$img="icon_xls.gif";break;
		case 'doc':$img="doc.jpg";break;
		case 'docx':$img="doc.jpg";break;
		case 'ppt':$img="icon-ppt.png";break;
		case 'pptx':$img="icon-ppt.png";break;
		
		}
	return $img;
}


?>