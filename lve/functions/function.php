<?php
function cleanCut($string,$length,$cutString = '...')
{
	$string = strip_tags($string, '<p><a><strong><li><ul>');  
	if(strlen($string) <= $length)
	{
		return $string;
	}
	$str = substr($string,0,$length-strlen($cutString)+1);
	return substr($str,0,strrpos($str,' ')).$cutString;
}

function filter($in) {
	$search = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_]@');
	$replace = array ('e','a','i','u','o','c','_','');
	return preg_replace($search, $replace, $in);
}

function string2url($chaine) {
	$chaine = trim($chaine);
	$chaine = str_replace('(','_',$chaine); 
	$chaine = str_replace(')','_',$chaine); 
	$chaine = str_replace('*','_',$chaine); 
	$chaine = str_replace('!','_',$chaine); 
	$chaine = str_replace(':','_',$chaine); 
	$chaine = str_replace(';','_',$chaine); 
	$chaine = str_replace(',','_',$chaine); 
	$chaine = str_replace('&','_',$chaine); 
	$chaine = str_replace('"','_',$chaine); 
	$chaine = str_replace('\'','_',$chaine); 
	$chaine = str_replace('}','_',$chaine); 
	$chaine = str_replace('{','_',$chaine); 
	$chaine = str_replace('=','_',$chaine); 
	$chaine = str_replace('/','_',$chaine); 
	$chaine = str_replace('\\','_',$chaine); 
	$chaine = str_replace('`','_',$chaine); 
	$chaine = str_replace('.','_',$chaine); 
	return $chaine;
}
function namefile($chaine) {
	$chaine=(filter(string2url($chaine)));
	return $chaine;
}

function get_name_page($idsite,$idpage){
	
	$titre_lien = "SELECT titre FROM pages WHERE id_site='".$idsite."' AND id='".$idpage."'";
	$req_titre_lien  = mysql_query($titre_lien);
	$row_titre_lien = mysql_fetch_assoc($req_titre_lien);
					
	return str_replace(" ", "_",$row_titre_lien['titre']);
					
					
	}
	
function get_name_site($idsite){
	
	$titre_lien = "SELECT Nom FROM site WHERE id_site='".$idsite."'";
	$req_titre_lien  = mysql_query($titre_lien);
	$row_titre_lien = mysql_fetch_assoc($req_titre_lien);
					
	return utf8_encode(str_replace(" ", "_",$row_titre_lien['Nom']));
					
					
	}
	
function copy_dir ($dir2copy,$dir_paste)
{
// On vérifie si $dir2copy est un dossier
if (is_dir($dir2copy))
{

// Si oui, on l'ouvre
if ($dh = opendir($dir2copy))
{

// On liste les dossiers et fichiers de $dir2copy
while (($file = readdir($dh)) !== false)
{
// Si le dossier dans lequel on veut coller n'existe pas, on le créé
if (!is_dir($dir_paste)) mkdir ($dir_paste, 0777);

// S'il s'agit d'un dossier, on relance la fonction rÃ©cursive
if(is_dir($dir2copy.$file) && $file != '..' && $file != '.') copy_dir ( $dir2copy.$file.'/' , $dir_paste.$file.'/' );

// S'il sagit d'un fichier, on le copue simplement
elseif($file != '..' && $file != '.') copy ( $dir2copy.$file , $dir_paste.$file );
}

// On ferme $dir2copy
closedir($dh);
}
}
}



// cpanel user
define('CPANELUSER','oneoweb');

// cpanel password
define('CPANELPASS','platforme567%');

// name of the subdomains list file.
// file format may be 1 column or 2 columns divided with semicilon (;)
// Example for two columns:
//   rootdomain1;subdomain1
//   rootdomain1;subdomain2
// Example for one columns:
//   subdomain1
//   subdomain2
define('INPUT_FILE','domains.txt');

// cPanel skin (mainly "x")
// Check http://www.zubrag.com/articles/determine-cpanel-skin.php
// to know it for sure
define('CPANEL_SKIN','x3');

// Default domain (subdomains will be created for this domain)
// Will be used if not passed via parameter and not set in subdomains file
define('DOMAIN','oneoweb.com');


/////////////// END OF INITIAL SETTINGS ////////////////////////
////////////////////////////////////////////////////////////////

function getVar($name, $def = '') {
  if (isset($_REQUEST[$name]) && ($_REQUEST[$name] != ''))
    return $_REQUEST[$name];
  else 
    return $def;
}

$cpaneluser=getVar('cpaneluser', CPANELUSER);
$cpanelpass=getVar('cpanelpass', CPANELPASS);
$cpanel_skin = getVar('cpanelskin', CPANEL_SKIN);


// create subdomain
function subd($host,$port,$ownername,$passw,$request) {

  $sock = fsockopen('localhost',2082);
  if(!$sock) {
    print('Socket error');
    exit();
  }

  $authstr = "$ownername:$passw";
  $pass = base64_encode($authstr);
  $in = "GET $request\r\n";
  $in .= "HTTP/1.0\r\n";
  $in .= "Host:$host\r\n";
  $in .= "Authorization: Basic $pass\r\n";
  $in .= "\r\n";
 
  fputs($sock, $in);
  while (!feof($sock)) {
    $result .= fgets ($sock,128);
  }
  fclose( $sock );

  return $result;
}



function rgb2hex($rgb) {
   $hex = "#";
   $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

   return $hex; // returns the hex value including the number sign (#)
}

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = $r.','.$g.','.$b;
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

?>

