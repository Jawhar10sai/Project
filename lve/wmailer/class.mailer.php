<?php
/*******************************************************************
 *			
 * 			Fichier         :	class.mailer.php 
 * 			Cr&eacute;&eacute; le         :	29 juin 2002 
 * 			Derni&egrave;re modif  :	12 juillet 2003 
 * 			Email           :	wascripts@phpcodeur.net 
 * 
 * 				Copyright © 2002-2003 phpCodeur - WAmailer 2.0
 * 
 *******************************************************************/

/*******************************************************************
 *  This program is free software; you can redistribute it and/or 
 * 	modify it under the terms of the GNU General Public License as 
 * 	published by the Free Software Foundation; either version 2 of 
 *  the License, or (at your option) any later version. 
 *******************************************************************/

if( !defined('CLASS_MAILER_INC') )
{

define('CLASS_MAILER_INC', true); 
define('WM_HOST_OTHER'   , 1); 
define('WM_HOST_ONLINE'  , 2); 

//
// Version de php sous forme d'entier 
// Vu dans defines_php.lib.php de phpMyAdmin 2.5.0
//
$num = 0; 

if( preg_match('/^([0-9]{1,2})\.([0-9]{1,2})(?:\.([0-9]{1,2}))?/', phpversion(), $match) )
{
	if( !isset($match[3]) )
	{
		$match[3] = 0; 
	}
	
	$num = (int) sprintf('%d%02d%02d', $match[1], $match[2], $match[3]); 
}

define('WM_PHP_VERSION', $num); 
unset($num); 

/*
 * Classe d'envois d'emails
 * 
 * Fonctionne &eacute;galement sur Online
 * G&egrave;re l'attachement de pi&egrave;ces jointes et l'envoi d'emails au format html, ainsi que les emails multi-formats. 
 * G&eacute;re aussi les pi&egrave;ces jointes dites "embarqu&eacute;es" 
 * (incorpor&eacute;es et utilis&eacute;es dans l'email html, ex: images, sons ..) 
 * 
 * Se r&eacute;f&eacute;rer aux RFC 822, 2045, 2046, 2047 et 2822
 * 
 * Les sources qui m'ont bien aid&eacute;es : 
 * 
 * @link : http://abcdrfc.free.fr/ (français)
 * @link : http://www.rfc-editor.org/ (anglais)
 * @link : http://cvs.php.net/co.php/php4/ext/standard/mail.c?login=2&r=1.73
 * 
 * @author  Bobe <wascripts@phpcodeur.net>
 * @version 2.0
 * @access  public
 * 
 * @todo cc et bcc non personnalisables si utilisation fonction mail()
 */
class Mailer {
	
	/************************ REGLAGES SMTP ************************/
	
	/*
     * Activation du mode smtp
	 * 
     * @var	booleen
	 * 
	 * @access public
     */
	var $smtp_mode 				= FALSE; 
	
	/*
     * Chemin vers la classe smtp
	 * 
	 * Si laiss&eacute;e vide, le script tentera de reconstituer le chemin vers la classe smtp
	 * (la classe smtp doit alors être dans le même dossier que la pr&eacute;sente classe)
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $smtp_path				= ''; 
	
	/*
     * Variable qui contiendra l'objet smtp
     * 
     * @var	object
	 * 
	 * @access public
     */
	var $smtp					= NULL; 
	
	/*
     * Si plac&eacute; à TRUE, la connexion au serveur SMTP ne sera pas ferm&eacute;e apr&egrave;s l'envoi, et sera r&eacute;utilis&eacute;e 
	 * pour un envoi ult&eacute;rieur. 
	 * Ce sera alors au programmeur de refermer lui même la connexion apr&egrave;s la fin des envois en faisant 
	 * appel à la m&eacute;thode quit() de la classe smtp : $mailer->smtp->quit(); 
     * 
     * @var	boolean
	 * 
	 * @access public
     */
	var $persistent_connection	= FALSE; 
	
	/***************************************************************/
	
	/********************** REGLAGES SENDMAIL **********************/
	
	/*
     * Activation du mode sendmail
	 * 
     * @var	booleen
	 * 
	 * @access public
     */
	var $sendmail_mode 			= FALSE; 
	
	/*
     * Chemin d'acc&eacute;s à sendmail
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $sendmail_path 			= '/usr/sbin/sendmail'; 
	
	/*
     * Param&egrave;tres de commandes compl&eacute;mentaires
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $sendmail_cmd 			= ''; 
	
	/***************************************************************/
	
	/*
     * Chemins par d&eacute;faut pour les mod&egrave;les d'emails 
     *
     * @var	string
	 * 
	 * @access public
     */
	var $root					= './'; 
	
	/*
     * Extensions des mod&egrave;les au format texte
     *
     * @var	string
	 * 
	 * @access public
     */
	var $text_tpl_ext			= 'txt'; 
	
	/*
     * Extensions des mod&egrave;les au format html
     *
     * @var	string
	 * 
	 * @access public
     */
	var $html_tpl_ext			= 'html'; 
	
	/*
     * Vous devez d&eacute;finir la fonction mail qu'utilise votre h&eacute;bergeur 
	 * 
	 * 1 ou WM_HOST_OTHER pour la fonction mail() classique
	 * 2 ou WM_HOST_ONLINE pour la fonction email() de online
     *
     * @var	integer
	 * 
	 * @access public
     */
	var $hebergeur 				= WM_HOST_OTHER; 
	
	/*
     * Format de l'email 
	 * 
	 * 1 - pour format texte brut
	 * 2 - pour format html
	 * 3 - Multi-format (html affich&eacute;, et texte si html pas support&eacute;)
	 * 
     * @var	integer
	 * 
	 * @access public
     */
	var $format					= 1; 
	
	/*
     * Adresse de l'exp&eacute;diteur 
	 * 
     * @var	array
	 * 
	 * @access public
     */
	var $from 					= array('email' => '', 'name' => ''); 
	
	/*
     * Adresse de l'exp&eacute;diteur (sp&eacute;cifique à Online)
	 * 
	 * @var	string
	 * 
	 * @access public
     */
	var $from_online			= ''; 
	
	/*
     * Adresse de r&eacute;ponse (sp&eacute;cifique à Online)
	 * 
	 * @var	string
	 * 
	 * @access public
     */
	var $reply_online			= ''; 
	
	/*
     * Adresses des destinataires
	 * 
	 * @var	array
	 * 
	 * @access private
     */
	var $address 				= array(); 
	
	/*
     * Sujet de l'email
	 * 
     * @var	string
	 * 
	 * @access public
     */
	var $subject 				= ''; 
	
	/*
     * Messages non compil&eacute;s, selon le format
	 * 
     * @var	array
	 * 
	 * @access private
     */
	var $uncompiled_message		= array(); 
	
	/*
     * Messages alternatifs non compil&eacute;s, selon le format
	 * 
     * @var	array
	 * 
	 * @access private
     */
	var $uncompiled_altmessage	= array(); 
	
	/*
     * Messages compil&eacute;s, selon le format
	 * 
     * @var	array
	 * 
	 * @access private
     */
	var $compiled_message		= array(); 
	
	/*
     * Tableau des tags à remplacer dans le message
	 * 
     * @var	array
	 * 
	 * @access private
     */
	var $tags					= array(); 
	
	/*
     * Tableau des blocks à remplacer dans le message, ainsi que les tags qui leur sont associ&eacute;s
	 * 
     * @var	array
	 * 
	 * @access private
     */
	var $block_tags				= array(); 
	
	/*
     * "Fronti&egrave;res" utilis&eacute;es pour s&eacute;parer les diff&eacute;rentes parties de l'email
	 * 
     * @var	array
	 * 
	 * @access private
     */
	var $boundary				= array('part0' => array(), 'part1' => array(), 'part2' => array()); 
	
	/*
     * Tableau des fichiers attach&eacute;s
	 * 
     * @var	array
	 * 
	 * @access private
     */	
	var $attachfile 			= array(
			'path'		  => array(),
			'name'		  => array(),
			'mimetype'	  => array(),
			'disposition' => array()
		); 
	
	/*
     * Tableau des fichiers incorpor&eacute;s (sp&eacute;cifique aux emails au format html)
	 * 
	 * @var	array
	 * 
	 * @access private
     */
	var $embeddedfile 			= array(
			'path'		  => array(),
			'name'		  => array(),
			'mimetype'	  => array()
		); 
	
	/*
     * Tableau des entêtes de l'email
	 * 
     * @var	array
	 * 
	 * @access private
     */
	var $headers 				= array(); 
	
	/*
     * Jeu de caract&egrave;re utilis&eacute; pour l'email
	 * 
     * @var	string
	 * 
	 * @access public
     */
	var $charset 				= 'iso-8859-1'; 
	
	/*
     * Encodage à utiliser 
	 * (7bit, 8bit, quoted-printable, base64 ou binary)
	 * 
     * @var	string
	 * 
	 * @access public
     */
	var $encoding				= 'quoted-printable'; 
	
	/*
     * IP de l'exp&eacute;diteur
	 * 
     * @var	string $sender_ip
	 * 
	 * @access public
     */
	var $sender_ip				= '127.0.0.1'; 
	
	/*
     * Nom du serveur &eacute;metteur
	 * 
     * @var	string)	$server
	 * 
	 * @access public
     */
	var $server_from			= 'localhost'; 
	
	/*
     * Activer/d&eacute;sactiver le validateur d'adresse email
	 * 
     * @var	booleen
	 * 
	 * @access public
     */
	var $valid_syntax 			= FALSE; 
	
	/*
     * Activer/d&eacute;sactiver le mode de d&eacute;bogguage
	 * S'il est activ&eacute;, les messages d'erreur s'afficheront directement à l'&eacute;cran et l'&eacute;x&eacute;cution du script 
	 * sera interrompu
	 * 
     * @var	booleen
	 * 
	 * @access public
     */
	var $debug 					= TRUE; 
	
	/*
     * Statut du traitement de l'envoi
	 * Cette variable ne doit pas être modifi&eacute;e, si elle est à false, 
	 * l'email n'est tout simplement pas envoy&eacute;
	 * 
     * @var	booleen
	 * 
	 * @access private
     */
	var $statut					= TRUE; // ne pas modifier ! 
	
	/*
     * Variable contenant le dernier message d'erreur
	 * 
     * @var	string
	 * 
	 * @access private
     */
	var $msg_error				= ''; 
	
	/*
     * Pour comprendre l'utilit&eacute; de cette variable, r&eacute;f&eacute;rez vous à la m&eacute;thode recipients_list()
	 * 
	 * Si votre serveur utilise sendmail, mettez à 1, s'il utilise un serveur smtp, mettez à -1.
	 * Si vous ne savez pas, laissez comme c'est..
	 * 
     * @var	mixed
	 * 
	 * @access public
     */
	var $fix_bug_mail			= NULL; 
	
	/*
     * Version actuelle de la classe
	 * 
     * @var	string
	 * 
	 * @access private
     */
	var $version				= '2.0'; 	
	
	/*
	 * Mailer::Mailer()
	 * 
	 * @param string $template_path	: Chemin vers les mod&egrave;les d'emails 
	 * 
	 * @return void
	 */
	function Mailer($template_path = '')
	{
		if( $template_path != '' )
		{
			$this->set_root($template_path); 
		}
		
		if( $this->server_from == 'localhost' )
		{
			if( !empty($_SERVER['SERVER_NAME']) )
			{
				$server = $_SERVER['SERVER_NAME']; 
			}
			else
			{
				$server = ''; 
			}
			
			$this->server_from = ( $server != '' ) ? $server : $this->server_from; 
		}
		
		$this->sender_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : $this->sender_ip; 
		
		if( preg_match('/^(\d+\.\d+\.\d+\.\d+)/', getenv('HTTP_X_FORWARDED_FOR'), $match) ) 
		{ 
			$private_ip = trim($match[1]); 
			
			/* 
			 * Liens utiles sur les diff&eacute;rentes plages d'ip : 
			 * 
			 * @link http://www.commentcamarche.net/internet/ip.php3 
			 * @link http://www.usenet-fr.net/fur/comp/reseaux/masques.html 
			 */ 
			
			// 
			// Liste d'ip non valides 
			// 
			$pattern_ip   = array(); 
			$pattern_ip[] = '/^0\..*/'; // R&eacute;seau 0 n'existe pas 
			$pattern_ip[] = '/^127\.0\.0\.1/'; // ip locale 
			
			// Plages d'ip sp&eacute;cifiques à l'intranet 
			$pattern_ip[] = '/^10\..*/'; 
			$pattern_ip[] = '/^172\.1[6-9]\..*/'; 
			$pattern_ip[] = '/^172\.2[0-9]\..*/'; 
			$pattern_ip[] = '/^172\.30\..*/'; 
			$pattern_ip[] = '/^172\.31\..*/'; 
			$pattern_ip[] = '/^192\.168\..*/'; 
			
			// Plage d'adresse de classe D r&eacute;serv&eacute;e pour les flux multicast et de classe E, non utilis&eacute;e 
			$pattern_ip[] = '/^22[4-9]\..*/'; 
			$pattern_ip[] = '/^2[3-5][0-9]\..*/'; 
			
			$this->sender_ip = preg_replace($pattern_ip, $this->sender_ip, $private_ip); 
		}
	}
	
	/*
	 * Mailer::use_smtp()
	 * 
	 * @param string  $smtp_server	: Nom du serveur SMTP
	 * @param integer $smtp_port	: Port de connexion ( 25 dans la grande majorit&eacute; des cas )
	 * @param string  $smtp_user	: Login d'authentification ( si AUTH est support&eacute; par le serveur )
	 * @param string  $smtp_pass	: Password d'authentification ( si AUTH est support&eacute; par le serveur )
	 * @param string  $server_from  : Serveur &eacute;metteur
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function use_smtp($smtp_server = '', $smtp_port = 25, $smtp_user = '', $smtp_pass = '', $server_from = '')
	{
		$this->smtp_mode = true; 
		
		$smtp = $this->init_smtp($this->debug); 
		
		if( $server_from != '' )
		{
			$this->server_from = $smtp->server_from = $server_from; 
		}
		
		$vararray = array('smtp_server', 'smtp_port', 'smtp_user', 'smtp_pass'); 
		foreach( $vararray AS $varname )
		{
			$smtp->{$varname} = ( !empty(${$varname}) ) ? ${$varname} : $smtp->{$varname}; 
		}
		
		$this->smtp = $smtp; 
	}
	
	/*
	 * Mailer::init_smtp()
	 * 
	 * Initialise la classe smtp et cr&eacute;&eacute; une nouvelle instance de la classe
	 * 
	 * @param boolean $debug
	 * 
	 * @access private
	 * 
	 * @return object
	 */
	function init_smtp($debug = false)
	{
		if( !class_exists('Smtp') )
		{
			if( empty($this->smtp_path) )
			{
				$this->smtp_path = str_replace('\\', '/', __FILE__); 
				$this->smtp_path = substr($this->smtp_path, 0, (strrpos($this->smtp_path, '/') + 1)); 
			}
			
			@include($this->smtp_path . 'class.smtp.php'); 
		}
		
		$smtp = new Smtp(); 
		$smtp->debug = $debug; 
		
		return $smtp; 
	}
	
	/*
	 * Mailer::use_sendmail()
	 * 
	 * Param&eacute;trages des variables concernant sendmail
	 * 
	 * @param string $sendmail_cmd
	 * @param string $sendmail_path
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function use_sendmail($sendmail_cmd = '', $sendmail_path = '')
	{
		$this->sendmail_mode = true; 
		
		$this->sendmail_path = ( $sendmail_path != '' ) ? $sendmail_path : $this->sendmail_path; 
		$this->sendmail_cmd  = ( $sendmail_cmd != '' ) ? $sendmail_cmd : $this->sendmail_cmd; 
		
		if( !@is_executable($this->sendmail_path) )
		{
			$this->error('use_sendmail() :: ' . $this->sendmail_path . ' n\'est pas ex&eacute;cutable'); 
			return false; 
		}
		
		return true; 
	}
	
	/*
	 * Mailer::set_root()
	 * 
	 * @param string $template_path	: Chemin vers les mod&egrave;les
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function set_root($template_path)
	{
		$template_path = preg_replace('/^(.*?)\/?$/', '\\1', $template_path); 
		
		if( !file_exists($template_path) || !is_dir($template_path) )
		{
			$this->error("set_root() :: Le chemin \"$template_path/\" est incorrect."); 
			return false; 
		}
		
		$this->root = $template_path . '/'; 
		
		return true; 
	}
	
	/*
	 * Mailer::set_file()
	 * 
	 * @param string $path			: Chemin vers le fichier
	 * 
	 * @access private
	 * 
	 * @return boolean
	 */
	function set_file($path)
	{
		if( !file_exists($path) )
		{
			$this->error('set_file() :: Le fichier "' . basename($path) . '" est introuvable'); 
			return false; 
		}
		else if( !is_readable($path) )
		{
			$this->error('set_file() :: Le fichier "' . basename($path) . '" n\'est pas accessible en lecture'); 
			return false; 
		}
		
		return true; 
	}
	
	/*
	 * Mailer::loadfile()
	 * 
	 * @param string  $path 		: Chemin vers le fichier
	 * @param boolean $binary_file	: On sp&eacute;cifie si on charge un fichier binaire (pour windows)
	 * 
	 * @access public
	 * 
	 * @return mixed
	 */
	function loadfile($path, $binary_file = false)
	{
		$mode = ( $binary_file ) ? 'rb' : 'r'; 
		
		if( !($fp = @fopen($path, $mode)) )
		{
			$this->error('loadfile() :: Lecture du fichier "' . basename($path) . '" impossible'); 
			return false;
		}
		
		$contents = fread($fp, filesize($path)); 
		fclose($fp); 
		
		return $contents; 
	}
	
	/*
	 * Mailer::set_format()
	 * 
	 * @param mixed $format 		: Format de l'email
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function set_format($format)
	{
		if( !is_numeric($format) )
		{
			$format = strtolower($format); 
		}		
		
		switch( $format )
		{
			case 'alt':
			case 3:
				$this->format = 3; 
				break;
			
			case 'html':
			case 'htm':
			case 2:
				$this->format = 2;
				break;
			
			case 'texte':
			case 'txt':
			case 'text':
			case 1:
			default:
				$this->format = 1;
				break;
		}
	}
	
	/*
	 * Mailer::validate_email()
	 * 
	 * V&eacute;rifie la validit&eacute; syntaxique d'un email
	 * 
	 * @param string $email
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function validate_email($email)
	{
		if( !ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.
			  	  '@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.
			  	  '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $email) )
		{
			return false; 
		}
		
		return true; 
	}
	
	/*
	 * Mailer::validate_email_mx()
	 * 
	 * V&eacute;rifie l'existence r&eacute;elle d'une adresse email (domaine et compte)
	 * Ne fonctionne pas sous Windows, les fonctions checkdnsrr() et getmxrr() n'y sont pas implant&eacute;es
	 * 
	 * @param string $email
	 * 
	 * @access public
	 * 
	 * @link http://www.sitepoint.com/article/1051
	 * @link http://www.zend.com/codex.php?id=449&single=1
	 * @link http://fr.php.net/getmxrr (troisi&egrave;me User contributed note)
	 * 
	 * @return boolean
	 */
	function validate_email_mx($email)
	{
		$result_check_mx = false; 
		
		list($account, $domaine) = explode('@', $email); 
		
		$mx = array(); 
		if( !function_exists('getmxrr') )
		{
			exec("nslookup -type=mx $domaine", $lines); 
			
			$i = 0; 
			foreach( $lines AS $value )
			{
				if( preg_match('/preference[ ]*=[ ]*([0-9]+),[ ]*mail[ ]*exchanger[ ]*=[ ]*([^ ]+)/', $value, $match) )
				{
					$mx[$i][0] = $match[1]; 
					$mx[$i][1] = $match[2]; 
					
					$i++; 
				}
			}
			
			$result = ( count($mx) > 0 ) ? true : false; 
		}
		else
		{
			$result = getmxrr($domaine, $hosts, $weight); 
			
			$total_hosts = count($hosts); 
			for( $i = 0; $i < $total_hosts; $i++ )
			{
				$mx[$i][0] = $weight[$i]; 
				$mx[$i][1] = $hosts[$i]; 
			}
		}
		
		if( !$result )
		{
			$mx[0][0] = 0; 
			$mx[0][1] = gethostbyname($domaine); 
		}
		
		array_multisort($mx); 
		
		// DEBUG
//		echo '<pre>'; print_r($mx); echo '</pre>'; exit;
		
		$smtp = $this->init_smtp(false); 
		
		foreach( $mx AS $record )
		{//echo $record[1] . '<br>'; flush();
			if( $smtp->connect($record[1]) )
			{
				if( $smtp->mail_from($email) )
				{
					if( $smtp->rcpt_to($email, true) )
					{
						$result_check_mx = true; 
					}
				}
				
				$smtp->quit(); 
				break;
			}
		}
		
		return $result_check_mx; 
	}
	
	/*
	 * Mailer::set_from()
	 * 
	 * @param string $email_from	: Email de l'exp&eacute;diteur
	 * @param string $name_from		: Personnalisation du nom de l'exp&eacute;diteur
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function set_from($email_from, $name_from = '')
	{
		if( $this->valid_syntax && !$this->validate_email($email_from) )
		{
			$this->error('set_from() :: "' . $email_from . '", cette adresse email n\'est pas valide'); 
			return false; 
		}
		
		$this->from['email'] = trim($email_from); 
		$this->from['name']  = trim($name_from); 
		
		return true; 
	}
	
	/*
	 * Mailer::set_address()
	 * 
	 * Ancienne m&eacute;thode set_to()
	 * 
	 * @param mixed  $email_mixed	: Email du destinataire ou tableau contenant la liste des destinataires 
	 * @param string $type			: Type de destinataire : to, cc, ou bcc
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function set_address($email_mixed, $type = '')
	{
		$type = ucfirst(strtolower($type)); 
		if( $type != 'Cc' && $type != 'Bcc' )
		{
			$type = 'To'; 
		}
		
		if( !is_array($email_mixed) )
		{
			$email_mixed = array($email_mixed); 
		}
		
		foreach( $email_mixed AS $name_to => $email )
		{
			if( $this->valid_syntax && !$this->validate_email(trim($email)) )
			{
				$this->error('set_address() :: "' . $email . '", cette adresse email n\'est pas valide'); 
				return false; 
			}
			
			$name_to = ( !is_numeric($name_to) ) ? trim($name_to) : ''; 
			
			if( !empty($this->headers[$type]) )
			{
				$this->headers[$type] .= ', '; 
			}
			else
			{
				$this->headers[$type] = ''; 
			}
			
			$this->headers[$type] .= ( ( $name_to != '' ) ? $this->encode_mime_header('"' . $name_to . '"') . ' ' : '' ) . '<' . trim($email) . '>'; 
			
			if( $type == 'To' )
			{
				$this->address[] = trim($email); 
			}
		}
		
		return true; 
	}
	
	/*
	 * Mailer::set_to()
	 * 
	 * Ancienne m&eacute;thode d'ajout de destinataires, pr&eacute;sent pour assurer la compatibilit&eacute; 
	 * 
	 * @param $arg1	: Voir set_address()
	 * @param $arg2	: Voir set_address()
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function set_to($arg1, $arg2 = '')
	{
		return $this->set_address($arg1, $arg2); 
	}
	
	/*
	 * Mailer::set_subject()
	 * 
	 * @param string $subject 		: Le sujet de l'email
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function set_subject($subject)
	{
		$this->subject = trim($subject); 
	}
	
	/*
	 * Mailer::set_message()
	 * 
	 * @param string $message		: contient le message à envoyer
	 * @param array	 $tags_ary		: Variables à remplacer dans le texte
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function set_message($message, $tags_ary = '')
	{
		$this->compiled_message[$this->format]	 = ''; 
		$this->uncompiled_message[$this->format] = trim($message); 
		
		$this->assign_tags($tags_ary); 
	}
	
	/*
	 * Mailer::set_altmessage()
	 * 
	 * @param string $message 		: contient le message alternatif
	 * @param array	 $tags_ary		: Variables à remplacer dans le texte
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function set_altmessage($message, $tags_ary = '')
	{
		$this->uncompiled_altmessage[$this->format] = trim($message); 
		
		$this->assign_tags($tags_ary); 
	}
	
	/*
	 * Mailer::use_template()
	 * 
	 * @param string $file			: Nom du mod&egrave;le (sans l'extension)
	 * @param array	 $tags_ary		: Variables à remplacer dans le texte
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function use_template($file, $tags_ary = '')
	{
		$this->compiled_message[$this->format] = ''; 
		
		if( !$this->set_root($this->root) )
		{
			return false; 
		}
		
		if( ( $this->format == 3 || $this->format == 1 ) && $this->set_file($this->root . $file . '.' . $this->text_tpl_ext) )
		{
			$eval  = '$this->uncompiled_' . ( ( $this->format == 3 ) ? 'altmessage' : 'message' ); 
			$eval .= '[$this->format] = $this->loadfile($this->root . $file . \'.' . $this->text_tpl_ext . '\');'; 
			
			eval($eval); 
		}
		
		if( ( $this->format == 3 || $this->format == 2 ) && $this->set_file($this->root . $file . '.' . $this->html_tpl_ext) )
		{
			$this->uncompiled_message[$this->format] = $this->loadfile($this->root . $file . '.' . $this->html_tpl_ext); 
		}
		
		$this->assign_tags($tags_ary); 
		
		return true; 
	}
	
	/*
	 * Mailer::assign_tags()
	 * 
	 * @param array	$tags_ary		: tableau des tags à remplacer dans le message
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function assign_tags($tags_ary)
	{
		if( is_array($tags_ary) )
		{
			foreach( $tags_ary AS $key => $val )
			{
				if( preg_match('/^[[:alnum:]_-]+$/i', $key) )
				{
					$this->tags[$key] = $val; 
				}
			}
		}
	}
	
	/*
	 * Mailer::assign_block_tags()
	 * 
	 * @param array	$block_name		: Nom du block et des &eacute;ventuels sous blocks
	 * @param array	$tags_ary		: tableau des tags à remplacer dans le message
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function assign_block_tags($block_name, $tags_ary = '')
	{
		$this->block_tags[$block_name] = array(); 
		
		if( is_array($tags_ary) )
		{
			foreach( $tags_ary AS $key => $val )
			{
				if( preg_match('/^[[:alnum:]_-]+$/i', $key) )
				{
					$this->block_tags[$block_name][$key] = $val; 
				}
			}
		}
	}
	
	/*
	 * Mailer::attachment()
	 * 
	 * @param string $path			: Chemin vers le fichier
	 * @param string $filename		: Nom du fichier
	 * @param string $disposition	: Disposition
	 * @param string $mime_type		: Mime-type
	 * @param bool	 $embedded		: true si fichier incorpor&eacute; dans l'email html
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function attachment($path, $filename = '', $disposition = '', $mime_type = '', $embedded = false)
	{
		$this->compiled_message[$this->format] = ''; 
		
		if( !$this->set_file($path) )
		{
			return false;
		}
		
		if( $embedded )
		{
			$offset = count($this->embeddedfile['path']); 
			
			$this->embeddedfile['path'][$offset] 		= $path; 
			$this->embeddedfile['name'][$offset] 		= ( $filename != '' ) ? trim($filename) : basename($path); 
			$this->embeddedfile['mimetype'][$offset] 	= $mime_type; 
		}
		else
		{
			$offset = count($this->attachfile['path']); 
			
			$this->attachfile['path'][$offset] 			= $path; 
			$this->attachfile['name'][$offset] 			= ( $filename != '' ) ? trim($filename) : basename($path); 
			$this->attachfile['mimetype'][$offset] 		= $mime_type; 
			$this->attachfile['disposition'][$offset] 	= ( $disposition == 'inline' ) ? 'inline' : 'attachment'; 				
		}
		
		return true; 
	}
	
	/*
	 * Mailer::generate_rand_str()
	 * 
	 * @access private
	 * 
	 * @return string
	 */
	function generate_rand_str()
	{
		$chars = array(
			'A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i', 'J', 'j', 
			'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r', 'S', 's', 'T', 't', 
			'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z', '2', '3', '4', '5', '6', '7', '8', '9', '0'
		); 
		
		$max_chars = (count($chars) - 1); 
		srand( (double) microtime()*1000000); 
		
		$rand_str = ''; 
		for( $i = 0; $i < 30; $i++ )
		{
			$rand_str .= $chars[rand(0, $max_chars)]; 
		}
		
		return $rand_str; 
	}
	
	/*
	 * Mailer::mime_type()
	 * 
	 * @param string $ext 			: Extension de fichier
	 * 
	 * @access public
	 * 
	 * @return string
	 */
	function mime_type($ext)
	{
		//
		// Tableau des extensions et de leur Mime-Type
		// Rien ne vous interdit d'en rajouter si besoin est.
		//
		$mime_type_ary = array(
			'txt'  => 'text/plain',
			'rtx'  => 'text/richtext',
			'html' => 'text/html',
			'htm'  => 'text/html',
			'xml'  => 'text/xml',
			'xls'  => 'text/xml',
			'tsv'  => 'text/tab-separated-value',
			'etx'  => 'text/x-setext',
			
			'eml'  => 'message/rfc822',
			'nws'  => 'message/rfc822',
			
			'bmp'  => 'image/bmp',
			'pcx'  => 'image/bmp',
			'gif'  => 'image/gif',
			'ief'  => 'image/ief',
			'jpeg' => 'image/jpeg',
			'jpg'  => 'image/jpeg',
			'jpe'  => 'image/jpeg',
			'png'  => 'image/png',
			'tiff' => 'image/tiff',
			'tif'  => 'image/tiff',
			'cmu'  => 'image/x-cmu-raster',
			'pnm'  => 'image/x-portable-anymap',
			'pbm'  => 'image/x-portable-bitmap',
			'pgm'  => 'image/x-portable-graymap',
			'ppm'  => 'image/x-portable-pixmap',
			'rgb'  => 'image/x-rgb',
			'xbm'  => 'image/x-xbitmap',
			'xpm'  => 'image/x-xpixmap',
			'xwd'  => 'image/x-xwindowdump',
			
			'dwg'  => 'application/acad',
			'ccad' => 'application/clariscad',
			'drw'  => 'application/drafting',
			'dxf'  => 'application/dxf',
			'xls'  => 'application/excel',
			'hdf'  => 'application/hdf',
			'unv'  => 'application/i-deas',
			'igs'  => 'application/iges',
			'iges' => 'application/iges',
			'doc'  => 'application/msword',
			'dot'  => 'application/msword',
			'wrd'  => 'application/msword',
			'oda'  => 'application/oda',
			'pdf'  => 'application/pdf',
			'ppt'  => 'application/powerpoint',
			'ai'   => 'application/postscript',
			'eps'  => 'application/postscript',
			'ps'   => 'application/postscript',
			'rtf'  => 'application/rtf',
			'rm'   => 'application/vnd.rn-realmedia',
			'dvi'  => 'application/x-dvi',
			'gtar' => 'application/x-gtar',
			'tgz'  => 'application/x-gtar',
			'swf'  => 'application/x-shockwave-flash',
			'tar'  => 'application/x-tar',
			'gz'   => 'application/x-gzip-compressed',
			'zip'  => 'application/x-zip-compressed',
			
			'au'   => 'audio/basic',
			'snd'  => 'audio/basic',
			'aif'  => 'audio/x-aiff',
			'aiff' => 'audio/x-aiff',
			'aifc' => 'audio/x-aiff',
			'wma'  => 'audio/x-ms-wma',
			
			'mpeg' => 'video/mpeg',
			'mpg'  => 'video/mpeg',
			'mpe'  => 'video/mpeg',
			'mov'  => 'video/quicktime',
			'avi'  => 'video/msvideo',
			'movie'=> 'video/x-sgi-movie',
			
		  	'unknow' => 'application/octet-stream',
//			'unknow' => 'application/x-unknown-content-type'
		); 
		
		return ( !empty($mime_type_ary[$ext]) ) ? $mime_type_ary[$ext] : $mime_type_ary['unknow']; 
	}
	
	/*
	 * Mailer::set_reply_to()
	 * 
	 * @param string $email_reply	: email de r&eacute;ponse
	 * @param string $name_reply	: Personnalisation
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function set_reply_to($email_reply = '', $name_reply = '')
	{
		if( $email_reply == '' )
		{
			$email_reply = $this->from['email']; 
			$name_reply  = $this->from['name']; 
		}
		else
		{
			$email_reply = trim($email_reply); 
			$name_reply  = trim($name_reply); 
			
			if( $this->valid_syntax && !$this->validate_email($email_reply) )
			{
				$this->error('set_reply_to() :: "' . $email_reply . '", cette adresse email n\'est pas valide'); 
				return false; 
			}
		}
		
		$this->headers['Reply-To'] = ( ( $name_reply != '' ) ? $this->encode_mime_header('"' . $name_reply . '"') . ' ' : '' ) . '<' . $email_reply . '>'; 
		
		return true; 
	}
	
	/*
	 * Mailer::set_return_path()
	 * 
	 * @param string $email_return	: email de retour d'erreur
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function set_return_path($email_return = '')
	{
		if( $email_return == '' )
		{
			$email_return = $this->from['email']; 
		}
		else
		{
			$email_return = trim($email_return); 
			
			if( $this->valid_syntax && !$this->validate_email($email_return) )
			{
				$this->error('set_return_path() :: "' . $email_return . '", cette adresse email n\'est pas valide'); 
				return false; 
			}
		}
		
		$this->headers['Return-Path'] = $email_return; 
		
		return true; 
	}
	
	/*
	 * Mailer::set_notify()
	 * 
	 * @param string $email_notify	: email pour le retour de notification de lecture 
	 * 						  		  (par d&eacute;faut, l'adresse d'envoi est utilis&eacute;e)
	 * 
	 * @access public
	 * 
	 * @return boolean
	 * 
	 */
	function set_notify($email_notify = '')
	{
		if( $email_notify == '' )
		{
			$email_notify = $this->from['email']; 
		}
		else
		{
			$email_notify = trim($email_notify); 
			
			if( $this->valid_syntax && !$this->validate_email($email_notify) )
			{
				$this->error('set_notify() :: "' . $email_notify . '", cette adresse email n\'est pas valide'); 
				return false; 
			}
		}
		
		$this->headers['Disposition-Notification-To'] = '<' . $email_notify . '>'; 
		
		return true; 
	}
	
	/*
	 * Mailer::organization()
	 * 
	 * @param string $soc
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function organization($soc)
	{
		$this->headers['Organization'] = trim($soc); 
	}
	
	/*
	 * Mailer::set_priority()
	 * 
	 * @param mixed $level 			: Niveau de priorit&eacute; de l'email
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function set_priority($level)
	{
		if( is_numeric($level) )
		{
			if( $level > 0 && $level <= 5 )
			{
				$this->headers['X-Priority'] = $level; 
			}
		}
		else
		{
			$level = strtolower($level); 
			
			switch( $level )
			{
				case 'highest':
					$this->headers['X-MSMail-Priority'] = 'Highest'; 
					break;
				
				case 'hight':
					$this->headers['X-MSMail-Priority'] = 'High'; 
					break;
				
				case 'low':
					$this->headers['X-MSMail-Priority'] = 'Low'; 
					break;
				
				case 'lowest':
					$this->headers['X-MSMail-Priority'] = 'Lowest'; 
					break;
				
				case 'normal':
				default:
					$this->headers['X-MSMail-Priority'] = 'Normal'; 
					break;
			}
		}
	}
	
	/*
	 * Mailer::additionnal_header()
	 * 
	 * @param string $name 			: Nom de l'entête 
	 * @param string $body	 		: Contenu de l'entête
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function additionnal_header($name, $body)
	{
		if( $name != '' && $body != '' )
		{
			$name = trim(strtolower($name)); 
			$body = trim($body); 
			
			//
			// Le nom de l'entête ne doit contenir que des caract&egrave;res us-ascii, 
			// et ne doit pas contenir le caract&egrave;re deux points (:)
			//
			if( preg_match("/([\001-\032\072\177-\377])/", $name) )
			{
				return false; 
			}
			
			//
			// Le contenu de l'entête ne doit contenir aucun retour chariot ou 
			// saut de ligne
			//
			$body = preg_replace("/[\015\012]/", '', $body); 
			
			if( strpos($name, '-') )
			{
				$elt = explode('-', $name); 
				
				$item = array(); 
				foreach( $elt AS $val )
				{
					$item[] = ucfirst($val); 
				}
				
				$name = implode('-', $item); 
			}
			else
			{
				$name = ucfirst($name); 
			}
			
			$this->headers[$name] = $body; 
			
			return true; 
		}
		
		return false; 
	}
	
	/* 
	 * Mailer::make_encoding()
	 * 
	 * @param string $encoding		: Type d'encodage d&eacute;sir&eacute;
	 * @param string $str			: Chaîne à encoder
	 * 
	 * @access public
	 * 
	 * @return string
	 */
	function make_encoding($encoding, $str)
	{
		switch( $encoding )
		{
			case '7bit':
			case '8bit':
				$str = preg_replace("/\r\n?/", "\n", $str); 
				$str = $this->word_wrap('message', $str); 
				break;
			
			case 'quoted-printable':
				$str = $this->quoted_printable_encode($str); 
				break;
			
			case 'base64':
				$str = chunk_split(base64_encode($str), 76, "\n"); 
				break;
			
			default:
				$this->error('make_encoding() :: Aucun encodage valide sp&eacute;cifi&eacute; !'); 
				break;
		}
		
		return $str; 
	}
	
	/*
	 * Mailer::quoted_printable_encode()
	 * 
	 * Encode le texte au format quoted-printable
	 * 
	 * @param $str				: Texte à encoder
	 * @param $charlist			: Caract&egrave;res additionnels à encoder
	 * 
	 * @access private
	 * 
	 * @return string
	 */
	function quoted_printable_encode($str, $charlist = '')
	{
		/*
		 * @see http://www.asciitable.com/
		 * @see http://jlr31130.free.fr/rfc2045.html (paragraphe 6.7)
		 */
		
		$str = preg_replace("/\r\n?/", "\n", $str); 
		$str = preg_replace("/([\001-\010\013\014\016-\037\075\177-\377$charlist])/e", 'sprintf(\'=%02X\', ord("\\1"));', $str); 
		$str = preg_replace("/([\011\040])(?=\n)/e", 'sprintf(\'=%02X\', ord("\\1"));', $str); 
		$str = $this->word_wrap('message', $str); 
		
		return $str; 
	}
	
	/*
	 * Mailer::encode_mime_header()
	 * 
	 * @param string $body			: Contenu de l'entête
	 * 
	 * @access public
	 * 
	 * @return string
	 */
	function encode_mime_header($body)
	{
		if( $this->encoding == 'quoted-printable' && preg_match("/([\001-\032\072\177-\377])/", $body) )
		{
			//
			// On encode le sujet au format quoted-printable (?, " et _ en plus)
			//
			$body = '=?' . $this->charset . '?Q?' . $this->quoted_printable_encode($body, "\042\077\137") . '?='; 
			$body = str_replace("=\n", '', $body); 
			$body = str_replace("=20", ' ', $body); 
			$body = str_replace(' ', '_', $body); 
		}
		
		return $body; 
	}
	
	/*
	 * Mailer::word_wrap()
	 * 
	 * @param string  $str_type
	 * @param string  $str
	 * @param integer $len
	 * 
	 * @return string
	 */
	function word_wrap($str_type, $str, $len = 76)
	{
		if( $str_type == 'header' )
		{
			$is_encoded = false; 
			if( $this->encoding == 'quoted-printable' && strstr($str, '=?' . $this->charset . '?Q?') )
			{
				$is_encoded = true; 
				$len -= (strlen($this->charset) - 7); 
				$str = str_replace('\'', '\\\'', $str); 
				$str = preg_replace(
					'/=\?' . preg_quote($this->charset) . '\?Q\?(.+?)\?=/se',
					'\'=?' . $this->charset . '?Q?\' . str_replace(\'_\', \' \', \'\\1\') . \'?=\'',
					$str
				); 
			}
			
			/*
			 * A la base, \n<LWS> mais la fonction mail() ne laisse passer les long entêtes 
			 * que si on s&eacute;pare avec \r\n<LWS>
			 * 
			 * LWS : Linear-White-Space (espace ou tabulation)
			 * 
			 * @link : http://cvs.php.net/co.php/php4/ext/standard/mail.c?login=2&r=1.73
			 */
			$str = trim(wordwrap($str, $len, " \r\n\t")); 
			
			if( $is_encoded )
			{
				$str = preg_replace(
					'/=\?' . preg_quote($this->charset) . '\?Q\?(.+?)\?=/se',
					'\'=?' . $this->charset . '?Q?\' . str_replace(\' \', \'_\', \'\\1\') . \'?=\'',
					$str
				); 
				$str = str_replace('\\\'', '\'', $str); 
			}
		}
		else if( $str_type == 'message' )
		{
			if( strlen($str) > $len )
			{
				$lines = explode("\n", $str); 
				$total_lines = count($lines); 
				
				if( $this->encoding == 'quoted-printable' )
				{
					$crlf  = "=\n"; 
					$char  = '='; 
					$limit = 72; 
				}
				else
				{
					$crlf  = "\n"; 
					$char  = ' '; 
					$limit = 0; 
				}
				
				$charlen = strlen(trim($char)); 
				
				for( $i = 0; $i < $total_lines; $i++ )
				{
					if( ($strlen = strlen($lines[$i])) > $len )
					{
						$new_line = ''; 
						
						do
						{
							$tmp = substr($lines[$i], 0, ($len - $charlen)); 
							
							if( ($pos = strrpos($tmp, $char)) && $pos > $limit )
							{
								$tmp       = substr($tmp, 0, $pos); 
								$lines[$i] = trim($char) . substr($lines[$i], ($pos + 1)); 
								$strlen    = ($strlen - strlen($tmp)); 
							}
							else
							{
								$lines[$i] = substr($lines[$i], ($len - $charlen)); 
								$strlen    = ($strlen - ($len - $charlen)); 
							}
							
							$new_line .= $tmp; 
							if( $strlen > 0 )
							{
								$new_line .= $crlf; 
								
								if( $strlen <= $len )
								{
									$new_line .= $lines[$i]; 
									break;
								}
							}
						}
						while( $strlen > 0 ); 
						
						$lines[$i] = $new_line; 
					}
				}
				
				$str = implode("\n", $lines); 
			}
		}
		
		return $str; 
	}
	
	/*
	 * Mailer::send()
	 * 
	 * @param boolean $do_not_send	: true -> affiche l'entête et le corps du message au lieu de l'envoyer 
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function send($do_not_send = false)
	{
		if( empty($this->headers['To']) && empty($this->headers['Cc']) )
		{
			$this->headers['To'] = 'Undisclosed-recipients:;'; 
		}
		
		if( $this->subject == '' )
		{
			$this->subject = 'No subject specified'; 
		}
		
		if( $this->format == 3 && empty($this->uncompiled_altmessage[3]) )
		{
			$this->format = 2; 
			$this->uncompiled_message[2] = $this->uncompiled_message[3]; 
		}
		
		$address = $this->recipients_list(); 
		$headers = $this->compile_headers(); 
		$message = $this->compile_message(); 
		
		if( $this->statut )
		{
			if( $do_not_send )
			{
				echo nl2br(htmlentities($headers)) . '<br /><br />' . nl2br(htmlentities($message)); 
				exit; 
			}
			
			$result = false; 
			
			if( $this->smtp_mode )
			{
				$result = $this->smtpmail($address, $message, $headers); 
			}
			else if( $this->sendmail_mode )
			{
				$result = $this->sendmail($address, $message, $headers); 
			}
			else
			{
				$old_return_path = @ini_get('sendmail_from'); 
				@ini_set('sendmail_from', $this->headers['Return-Path']); 
				
				//
				// On encode le sujet de l'email si n&eacute;cessaire. 
				//
				$subject = $this->word_wrap('header', $this->encode_mime_header($this->subject), 70); 
				
				switch( $this->hebergeur )
				{
					case WM_HOST_OTHER:
						$safe_mode = @ini_get('safe_mode'); 
						
						if( WM_PHP_VERSION >= 40005 && empty($safe_mode) )
						{
							$result = @mail($address, $subject, $message, $headers, '-f' . $this->headers['Return-Path']); 
						}
						else
						{
							$result = @mail($address, $subject, $message, $headers); 
						}
						break;
					
					case WM_HOST_ONLINE:
						$result = @email($this->from_online, $address, $subject, $message, $this->reply_online, $headers); 
						break;
					
					default:
						$this->error('send() :: Aucune fonction d\'envoi n\'est d&eacute;finie'); 
						break;
				}
				
				@ini_set('sendmail_from', $old_return_path); 
				
				if( !$result && !empty($php_errormsg) )
				{
					$this->error('send() :: ' . $php_errormsg); 
				}
			}
			
			return $result; 
		}
		
		return false; 
	}
	
	/*
	 * Mailer::smtpmail()
	 * 
	 * Envoi via la classe smtp
	 * 
	 * @param array  $address		: Tableau des adresses des destinataires
	 * @param string $message		: Corps de l'email
	 * @param string $headers		: Entêtes de l'email
	 * 
	 * @access private
	 * 
	 * @return boolean
	 */
	function smtpmail($address, $message, $headers)
	{
		if( !is_resource($this->smtp->connect_id) || !$this->smtp->noop() )
		{
			if( !$this->smtp->connect() )
			{
				$this->error($this->smtp->msg_error); 
				return false; 
			}
		}
		
		//
		// Le serveur SMTP utilise l'adresse email fournie avec MAIL FROM: pour cr&eacute;er 
		// l'entête Return-Path. Nous utiliserons l'adresse email fournie pour le return-path, 
		// si cet entête n'est pas vide. 
		// S'il est vide, nous utiliserons l'adresse d'exp&eacute;diteur fournie. 
		// Enfin, si celle ci n'a pas &eacute;t&eacute; fournie non plus, on utilise la valeur de sendmail_from
		//
		if( !empty($this->headers['Return-Path']) )
		{
			$from = $this->headers['Return-Path']; 
		}
		else if( !empty($this->from['email']) )
		{
			$from = $this->from['email']; 
		}
		else
		{
			$sendmail_from = @ini_get('sendmail_from'); 
			
			if( !empty($sendmail_from) )
			{
				$from = $sendmail_from; 
			}
			else
			{
				//
				// Pas moyen d'obtenir une adresse à utiliser. 
				// En dernier ressort, nous utilisons une adresse factice
				//
				$from = 'wamailer@localhost.org'; 
			}
		}
		
		if( !$this->smtp->mail_from($from) )
		{
			$this->error($this->smtp->msg_error); 
			return false; 
		}
		
		foreach( $address AS $email_to )
		{
			if( !$this->smtp->rcpt_to($email_to) )
			{
				$this->error($this->smtp->msg_error); 
				return false; 
			}
		}
		
		if( !$this->smtp->send($headers, $message) )
		{
			$this->error($this->smtp->msg_error); 
			return false; 
		}
		
		//
		// Apparamment, les commandes ne sont r&eacute;ellement effectu&eacute;es qu'apr&egrave;s la fermeture proprement 
		// de la connexion au serveur SMTP. On quitte donc la connexion courante si l'option de connexion 
		// persistante n'est pas activ&eacute;e.
		//
		if( !$this->persistent_connection )
		{
			$this->smtp->quit(); 
		}
		
		return true; 
	}
	
	/*
	 * Mailer::sendmail()
	 * 
	 * Envoi via sendmail
	 * (Je me suis beaucoup inspir&eacute; ici de la classe de PEAR concernant l'envoi via sendmail)
	 * 
	 * @param array  $address		: Tableau des adresses des destinataires
	 * @param string $message		: Corps de l'email
	 * @param string $headers		: Entêtes de l'email
	 * 
	 * @access private
	 * 
	 * @return boolean
	 */
	function sendmail($address, $message, $headers)
	{
		if( @is_executable($this->sendmail_path) )
		{
			$headers = preg_replace("/\r\n?/", "\n", $headers); 
			$message = preg_replace("/\r\n?/", "\n", $message); 
			
			//
			// Sendmail utilise l'adresse email fournie avec la commande -f pour forger 
			// l'entête Return-Path. Nous utiliserons l'adresse email fournie pour le return-path, 
			// si cet entête n'est pas vide. 
			// S'il est vide, nous utiliserons l'adresse d'exp&eacute;diteur fournie. 
			// Enfin, si celle ci n'a pas &eacute;t&eacute; fournie non plus, on utilise la valeur de sendmail_from
			//
			if( !empty($this->headers['Return-Path']) )
			{
				$from = $this->headers['Return-Path']; 
			}
			else if( !empty($this->from['email']) )
			{
				$from = $this->from['email']; 
			}
			else
			{
				if( ($sendmail_from = @ini_get('sendmail_from')) != '' )
				{
					$from = $sendmail_from; 
				}
				else
				{
					//
					// Pas moyen d'obtenir une adresse à utiliser. 
					// En dernier ressort, nous utilisons une adresse factice
					//
					$from = 'wamailer@localhost.org'; 
				}
			}
			
			$this->sendmail_cmd  = ( $this->sendmail_cmd != '' ) ? ' ' . $this->sendmail_cmd : ''; 
			$this->sendmail_cmd .= ' -f' . escapeshellcmd($from); 
			
			if( count($address) > 0 )
			{
				$address = escapeshellcmd(implode(' ', $address)); 
				$this->sendmail_cmd .= ' -- ' . $address; 
			}
			
			$mode = ( stristr(PHP_OS, 'WIN') ) ? 'wb' : 'w'; 
			$code = 0; 
			
			if( !($sm = popen($this->sendmail_path . $this->sendmail_cmd, $mode)) )
			{
				$this->error('sendmail() :: Impossible d\'ex&eacute;cuter sendmail'); 
				return false; 
			}
			
			//
			// On envoie les entêtes 
			//
			fputs($sm, $headers . "\n"); 
			
			//
			// Et maintenant le message 
			//
			fputs($sm, "\n" . $message . "\n"); 
			
            $code = pclose($sm) >> 8 & 0xFF; 
			
			if( $code != 0 )
			{
				$this->error('sendmail() :: Sendmail a retourn&eacute; le code d\'erreur suivant -> ' . $code); 
				return false; 
			}
		}
		else
		{
			$this->error('sendmail() :: ' . $this->sendmail_path . ' n\'est pas ex&eacute;cutable'); 
			return false; 
		}
		
		return true; 
	}
	
	/*
	 * Mailer::recipients_list()
	 * 
	 * Si on est en mode smtp, on r&eacute;cup&egrave;re toutes les adresses des Cc et Bcc 
	 * qu'on ajoute au tableau address, et on renvoie le tableau. 
	 * Si on est en mode sendmail, on renvoie un tableau vide. 
	 * Si la fonction mail() ou email() est utilis&eacute;e, on renvoie une chaine avec 
	 * toutes les adresses To s&eacute;par&eacute;es par une virgule. 
	 * 
	 * @access private
	 * 
	 * @return mixed
	 */
	function recipients_list()
	{
		//
		// Sendmail se charge d&eacute;ja de parser les entêtes To, Cc et Bcc &eacute;ventuels
		// On renvoie un tableau vide
		//
		if( $this->sendmail_mode )
		{
			return array(); 
		}
		
		//
		// Mode smtp, nous r&eacute;cup&eacute;rons les adresses de tous les destinataires pour les 
		// passer ult&eacute;rieurement dans la commande RCPT TO
		//
		else if( $this->smtp_mode )
		{
			$address = $this->address; 
			
			if( !empty($this->headers['Cc']) )
			{
				$total_email = preg_match_all('/<([^@]+@[^>]+)>/', $this->headers['Cc'], $matches); 
				
				for( $i = 0; $i < $total_email; $i++ )
				{
					$address[] = $matches[1][$i]; 
				}
			}
			
			if( !empty($this->headers['Bcc']) )
			{
				$total_email = preg_match_all('/<([^@]+@[^>]+)>/', $this->headers['Bcc'], $matches); 
				
				for( $i = 0; $i < $total_email; $i++ )
				{
					$address[] = $matches[1][$i]; 
				}
			}
			
			return $address; 
		}
		else
		{
			//
			// FIX
			// 
			// Si la fonction mail() utilise sendmail, elle rajoute automatiquement un entête To, 
			// or, nous avons d&eacute;ja rajout&eacute; un entête To (pour pouvoir personnaliser les adresses), 
			// et sendmail va parser les deux entête To sans distinction. 
			// R&eacute;sultat, les emails vont être reçus en double ...
			// 
			// On renvoie le contenu de l'entête To et on supprime l'entête
			//
			if( !isset($this->fix_bug_mail) )
			{
				$this->fix_bug_mail = -1; 
				
				if( @ini_get('sendmail_path') != '' )
				{
					$this->fix_bug_mail = 1; 
				}
				
				//
				// Certains h&eacute;bergeurs d&eacute;sactivent la fonction ini_get() (sont cons quand même nan ?)
				// Pas grave, on r&eacute;cup&egrave;re le contenu du phpinfo et on le parse (Bwaahahaa ..)
				//
				else
				{
					ob_start(); 
					@phpinfo(INFO_CONFIGURATION); 
					$phpinfo = strtolower(strip_tags(ob_get_contents())); 
					ob_end_clean(); 
					
					if( $phpinfo != '' )
					{
						if( !preg_match('/^sendmail_pathno valueno value$/im', $phpinfo) )
						{
							$this->fix_bug_mail = 1; 
						}
					}
					else
					{
						//
						// Bon, pas moyen de r&eacute;cup&eacute;rer la valeur de sendmail_path :/
						// Pour que l'envoi se passe tout de même sans probl&egrave;me, on supprime l'entête To
						// Tant pis pour la personnalisation.
						//
						$this->fix_bug_mail = 0; 
					}
				}
			}
			
			if( $this->fix_bug_mail == 1 )
			{
				$address = ''; 
				
				if( !empty($this->headers['To']) )
				{
					$address = $this->headers['To']; 
					$this->headers['To'] = ''; 
				}
				
				return $address;
			}
			else
			{
				if( $this->fix_bug_mail == 0 )
				{
					$this->headers['To'] = ''; 
				}
				
				//
				// FIX
				// 
				// La personnalisation telle que "name" <user@domaine.com> ne marche pas 
				// pour les entêtes Cc et Bcc si on utilise la fonction mail() et que le serveur 
				// utilise un serveur smtp. On supprime donc la personnalisation des entêtes Cc et Bcc
				//
				if( !empty($this->headers['Cc']) )
				{
					$total_email = preg_match_all('/<([^@]+@[^>]+)>/', $this->headers['Cc'], $matches); 
					
					$this->headers['Cc'] = ''; 
					for( $i = 0; $i < $total_email; $i++ )
					{
						$this->headers['Cc'] .= ', ' . $matches[1][$i]; 
					}
					
					$this->headers['Cc'] = substr($this->headers['Cc'], 2); 
				}
				
				if( !empty($this->headers['Bcc']) )
				{
					$total_email = preg_match_all('/<([^@]+@[^>]+)>/', $this->headers['Bcc'], $matches); 
					
					$this->headers['Bcc'] = ''; 
					for( $i = 0; $i < $total_email; $i++ )
					{
						$this->headers['Bcc'] .= ', ' . $matches[1][$i]; 
					}
					
					$this->headers['Bcc'] = substr($this->headers['Bcc'], 2); 
				}
				
				return ( count($this->address) > 0 ) ? implode(', ', $this->address) : ''; 
			}
		}
	}
	
	/*
	 * Mailer::make_content_info()
	 * 
	 * Renvoie les entêtes correspondant au type demand&eacute;
	 * 
	 * @param $type
	 * 
	 * @return string
	 */
	function make_content_info($type)
	{
		switch( $type )
		{
			case 'mixed':
				$content_info = "Content-Type: multipart/mixed;\n\tboundary=\"" . $this->boundary['part0'][$this->format] . '"'; 
				break;
			
			case 'related':
				$content_info = "Content-Type: multipart/related;\n\t"; 
				
				if( $this->format == 3 )
				{
					$content_info .= "type=\"multipart/alternative\";\n\t"; 
				}
				
				$content_info .= 'boundary="' . $this->boundary['part1'][$this->format] . '"'; 
			break;
			
			case 3:
				$content_info = "Content-Type: multipart/alternative;\n\tboundary=\"" . $this->boundary['part2'][$this->format] . '"'; 
				break;
			
			case 2:
				$content_info  = 'Content-Type: text/html; charset="' . $this->charset . "\"\n"; 
				$content_info .= 'Content-Transfer-Encoding: ' . $this->encoding; 
				break;
			
			case 1:
				$content_info  = 'Content-Type: text/plain; charset=' . $this->charset . "\n"; 
				$content_info .= 'Content-Transfer-Encoding: ' . $this->encoding; 
				break;
			
			default:
				$this->error('make_content_info() :: Type inconnu'); 
				break;
		}
		
		return $content_info; 
	}
	
	/*
	 * Mailer::compile_headers()
	 * 
	 * @access private
	 * 
	 * @return string
	 */
	function compile_headers()
	{
		if( $this->smtp_mode || $this->sendmail_mode )
		{
			$this->headers['Subject'] = $this->encode_mime_header($this->subject); 
		}
		else
		{
			$this->headers['Subject'] = ''; 
		}
		
		//
		// Si la fonction email() est utilis&eacute;e, les 
		// modifications sp&eacute;cifiques à Online doivent être effectu&eacute;es.
		//
		if( !$this->smtp_mode && !$this->sendmail_mode && $this->hebergeur == WM_HOST_ONLINE )
		{
			list($account) = explode('@', $this->from['email']); 
			$this->from_online = $this->reply_online = $account; 
		}
		else if( !empty($this->from['email']) )
		{
			if( empty($this->headers['Return-Path']) )
			{
				$this->set_return_path($this->from['email']); 
			}
			else
			{
				$this->headers['Return-Path'] = preg_replace('/<?([^@]+@[^>]+)>?/', '\\1', $this->headers['Return-Path']); 
			}
			
			$this->headers['From'] = ''; 
			if( $this->from['name'] != '' )
			{
				$this->headers['From'] .= $this->encode_mime_header('"' . $this->from['name'] . '"') . ' '; 
			}
			$this->headers['From'] .= '<' . $this->from['email'] . '>'; 
			
//			if( empty($this->headers['X-Sender']) )
//			{
//				$this->headers['X-Sender'] = '<' . $this->from['email'] . '>'; 
//			}
		}
		
		$server_software = ( !empty($_SERVER['SERVER_SOFTWARE']) ) ? $_SERVER['SERVER_SOFTWARE'] . ' ' : ''; 
		
		$this->headers['Date']			= date('D, d M Y H:i:s O', time()); 
		$this->headers['X-Mailer']		= 'WAmailer/' . $this->version; 
		$this->headers['X-Env']			= PHP_OS . ' - ' . $server_software . ( ( !stristr($server_software, 'PHP') ) ? 'PHP/' . phpversion() : '' ); 
		$this->headers['X-AntiAbuse']	= 'Sender IP - ' . $this->sender_ip . '/Server Name - <' . $this->server_from . '>'; 
		$this->headers['MIME-Version']	= '1.0'; 
		$this->headers['Message-ID']	= '<' . $this->generate_rand_str() . '@' . $this->server_from . '>'; 
		
		//
		// La rfc2822 conseille de placer certains entêtes dans un certain ordre
		//
		$header_rank = array('Return-Path', 'Date', 'From', 'Subject', 'X-Sender', 'To', 'Cc', 'Bcc', 'Reply-To'); 
		
		$headers = ''; 
		foreach( $header_rank AS $name )
		{
			if( empty($this->headers[$name]) || ( $this->smtp_mode && $name == 'Bcc' ) )
			{
				continue;
			}
			
			$header = $name . ': ' . $this->headers[$name]; 
			
			$headers .= $this->word_wrap('header', $header) . "\n"; 
		}
		
		foreach( $this->headers AS $name => $body )
		{
			if( in_array($name, $header_rank) || $body == '' )
			{
				continue;
			}
			
			$header = $name . ': ' . $body; 
			
			$headers .= $this->word_wrap('header', $header) . "\n"; 
		}
		
		if( empty($this->compiled_message[$this->format]) )
		{
			$this->boundary['part0'][$this->format] = '-----=_Part0_' . $this->generate_rand_str() . '--'; 
			$this->boundary['part1'][$this->format] = '-----=_Part1_' . $this->generate_rand_str() . '--'; 
			$this->boundary['part2'][$this->format] = '-----=_Part2_' . $this->generate_rand_str() . '--'; 
		}
		
		$total_attach	= count($this->attachfile['path']); 
		$total_embedded	= count($this->embeddedfile['path']); 
		
		//
		// Si des fichiers joints sont pr&eacute;sents, ou si des fichiers incorpor&eacute;s sont 
		// pr&eacute;sents et que l'email est au format texte brut
		//
		if( $total_attach > 0 || ( $total_embedded > 0 && $this->format == 1 ) )
		{
			$content_info = $this->make_content_info('mixed'); 
		}
		
		//
		// On ne peut incorporer des fichiers que dans un email html
		//
		else if( $total_embedded > 0 && $this->format > 1 )
		{
			$content_info = $this->make_content_info('related'); 
		}
		
		//
		// L'email est au format texte brut ou ne contient pas de fichiers joints ou incorpor&eacute;s
		//
		else
		{
			$content_info = $this->make_content_info($this->format); 
		}
		
		return $headers . $content_info; 
	}
	
	/*
	 * Mailer::compile_message()
	 * 
	 * @access private
	 * 
	 * @return string
	 */
	function compile_message()
	{
		if( empty($this->compiled_message[$this->format]) )
		{
			$attach_ary   = $this->attachfile; 
			$embedded_ary = $this->embeddedfile; 
			
			$total_attach	= count($attach_ary['path']); 
			$total_embedded	= count($embedded_ary['path']); 
			
			if( $total_embedded > 0 && $this->format == 1 )
			{
				for( $i = 0; $i < $total_embedded; $i++ )
				{
					$attach_ary['path'][] 		 = $embedded_ary['path'][$i]; 
					$attach_ary['name'][]		 = $embedded_ary['name'][$i]; 
					$attach_ary['mimetype'][] 	 = $embedded_ary['mimetype'][$i]; 
					$attach_ary['disposition'][] = 'attachment'; 
					
					$total_attach++; 
				}
				
				$total_embedded = 0; 
			}
			
			$message = '{WAMAILER_MSG}'; 
			
			if( $total_embedded > 0 )
			{
				$tmp_msg = $message; 
				
				$message  = '--' . $this->boundary['part1'][$this->format] . "\n"; 
				$message .= $this->make_content_info($this->format); 
				$message .= "\n\n"; 
				$message .= $tmp_msg; 
				$message .= "\n\n"; 
				
				for( $i = 0; $i < $total_embedded; $i++ )
				{
					$message .= $this->insert_attach(
						$embedded_ary['path'][$i],
						$embedded_ary['name'][$i],
						$embedded_ary['mimetype'][$i],
						'',
						$this->boundary['part1'][$this->format],
						TRUE
					); 
				}
				
				$message .= '--' . $this->boundary['part1'][$this->format] . "--\n"; 
			}
			
			if( $total_attach > 0 )
			{
				$tmp_msg = $message; 
				
				if( $total_embedded > 0 )
				{
					$content_info = $this->make_content_info('related'); 
				}
				else
				{
					$content_info = $this->make_content_info($this->format); 
				}
				
				$message  = '--' . $this->boundary['part0'][$this->format] . "\n"; 
				$message .= $content_info; 
				$message .= "\n\n"; 
				$message .= $tmp_msg; 
				$message .= "\n\n"; 
				
				for( $i = 0; $i < $total_attach; $i++ )
				{
					$message .= $this->insert_attach(
						$attach_ary['path'][$i],
						$attach_ary['name'][$i],
						$attach_ary['mimetype'][$i],
						$attach_ary['disposition'][$i],
						$this->boundary['part0'][$this->format],
						FALSE
					); 
				}
				
				$message .= '--' . $this->boundary['part0'][$this->format] . "--\n"; 
			}
			
			if( $this->format == 3 || $total_attach > 0 || $total_embedded > 0 )
			{
				$message = "This is a multi-part message in MIME format.\n\n" . $message; 
			}
			
			$this->compiled_message[$this->format] = $message; 
		}
		
		if( $this->format == 3 )
		{
			$altbody = $this->replace_tags($this->uncompiled_altmessage[$this->format]); 
			$body    = $this->replace_tags($this->uncompiled_message[$this->format]); 
			
			$message  = '--' . $this->boundary['part2'][$this->format] . "\n"; 
			$message .= $this->make_content_info(1); 
			$message .= "\n\n"; 
			$message .= $this->make_encoding($this->encoding, $altbody); 
			$message .= "\n\n"; 
			$message .= '--' . $this->boundary['part2'][$this->format] . "\n"; 
			$message .= $this->make_content_info(2); 
			$message .= "\n\n"; 
			$message .= $this->make_encoding($this->encoding, $body); 
			$message .= "\n\n"; 
			$message .= '--' . $this->boundary['part2'][$this->format] . "--\n"; 
		}
		else
		{
			$message = $this->make_encoding($this->encoding, $this->replace_tags($this->uncompiled_message[$this->format])); 
		}
		
		return str_replace('{WAMAILER_MSG}', $message, $this->compiled_message[$this->format]); 
	}
	
	/*
	 * Mailer::replace_tags()
	 * 
	 * @param string $texte	
	 * 
	 * @access private
	 * 
	 * @return string
	 */
	function replace_tags($texte)
	{
		$keys = $values = array(); 
		foreach( $this->tags AS $key => $val )
		{
			$keys[]	  = '/(?:(%)|(\{))'.$key.'(?(1)%|\})/i'; 
			$values[] = $val; 
		}
		
		$texte = preg_replace($keys, $values, $texte); 
		
		return $this->replace_block_tags($texte); 
	}
	
	/*
	 * Mailer::replace_block_tags()
	 * 
	 * @param string $texte	
	 * 
	 * @access private
	 * 
	 * @return string
	 */
	function replace_block_tags($texte)
	{
		$total_blocks = preg_match_all(
			"/<!-- start_block ([[:alnum:]_-]+) -->(?:\r)?\n(.*?)(?:\r)?\n<!-- end_block \\1 -->(?:(?:\r)?\n)?/is",
			$texte,
			$matches
		); 
		
		for( $i = 0; $i < $total_blocks; $i++ )
		{
			$block_name = $matches[1][$i]; 
			$tmp = ''; 
			
			if( isset($this->block_tags[$block_name]) && count($this->block_tags[$block_name]) )
			{
				$keys = $values = array(); 
				foreach( $this->block_tags[$block_name] AS $key => $val )
				{
					$keys[]	  = '/(?:(%)|(\{))' . $block_name . '\.' . $key . '(?(1)%|\})/i'; 
					$values[] = $val; 
				}
				
				$tmp = preg_replace($keys, $values, $matches[2][$i]); 
			}
			
			$texte = str_replace($matches[0][$i], $tmp, $texte); 
		}
		
		return $texte; 
	}
	
	/*
	 * Mailer::insert_attach()
	 * 
	 * @param string  $path 		: Chemin vers le fichier
	 * @param string  $filename		: Nom du fichier
	 * @param string  $mime_type	: Type mime du fichier
	 * @param string  $disposition	: Disposition
	 * @param string  $boundary		: Fronti&egrave;re à utiliser
	 * @param boolean $embedded		: Si fichier incorpor&eacute;, true
	 * 
	 * @access private
	 * 
	 * @return string
	 */
	function insert_attach($path, $filename, $mime_type, $disposition, $boundary, $embedded)
	{
		if( $mime_type == '' )
		{
			$extension = 'wa'; 
			if( $pos = strrpos($filename, '.') )
			{
				$extension = strtolower(substr($filename, ($pos + 1))); 
			}
			
			$mime_type = $this->mime_type($extension); 
		}
		
		$attach  = '--' . $boundary . "\n"; 
		$attach .= "Content-Type: $mime_type;\n\tname=\"$filename\"\n"; 
		$attach .= "Content-Transfer-Encoding: base64\n"; 
		
		if( $embedded )
		{
			$cid = $this->generate_rand_str(); 
			
			$attach .= 'Content-ID: <' . $cid . '@Wamailer>'; 
			
			$this->uncompiled_message[$this->format] = preg_replace(
				'/<(.+?)"cid:' . preg_quote($filename, '/') . '"([^>]*)?>/i',
				'<\\1"cid:' . $cid . '@Wamailer"\\2>',
				$this->uncompiled_message[$this->format]
			); 
		}
		else
		{
			$attach .= 'Content-Disposition: ' . $disposition . ";\n\tfilename=\"" . $filename . '"'; 
		}
		
		$attach .= "\n\n"; 
		$attach .= $this->make_encoding('base64', $this->loadfile($path, true)); 
		$attach .= "\n"; 
		
		return $attach; 
	}
	
	/*
	 * Mailer::clear_all()
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function clear_all()
	{
		$this->clear_from(); 
		$this->clear_address(); 
		$this->clear_subject(); 
		$this->clear_message(); 
		$this->clear_attach(); 
		
		$this->format				= 1; 
		$this->headers 				= array(); 
		$this->msg_error 			= ''; 
		$this->statut 				= true; 
	}
	
	/*
	 * Mailer::clear_from()
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function clear_from()
	{
		$this->from_online			= ''; 
		$this->reply_online			= ''; 
		$this->from					= array('email' => '', 'name' => ''); 
		$this->msg_error 			= ''; 
		$this->statut 				= true; 
	}
	
	/*
	 * Mailer::clear_address()
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function clear_address()
	{
		$this->address				= array(); 
		$this->msg_error 			= ''; 
		$this->statut 				= true; 
		
		unset($this->headers['To'], $this->headers['Cc'], $this->headers['Bcc']); 
	}
	
	/*
	 * Mailer::clear_subject()
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function clear_subject()
	{
		$this->subject 				= ''; 
		$this->msg_error 			= ''; 
		$this->statut 				= true; 
	}
	
	/*
	 * Mailer::clear_message()
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function clear_message()
	{
		$this->uncompiled_message	= array(); 
		$this->uncompiled_altmessage= array(); 
		$this->compiled_message		= array(); 
		$this->tags					= array(); 
		$this->block_tags			= array(); 
		$this->boundary				= array('part0' => array(), 'part1' => array(), 'part2' => array()); 
		$this->msg_error 			= ''; 
		$this->statut 				= true; 
	}
	
	/*
	 * Mailer::clear_attach()
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function clear_attach()
	{
		$this->attachfile 			= array('path' => array(), 'name' => array(), 'mimetype' => array(), 'disposition' => array());
		$this->embeddedfile 		= array('path' => array(), 'name' => array(), 'mimetype' => array());
		$this->msg_error 			= ''; 
		$this->statut 				= true; 
	}
	
	/*
	 * Mailer::error()
	 * 
	 * @param string $msg_error 	: Le message d'erreur à afficher si mode debug
	 * 
	 * @access private
	 * 
	 * @return void
	 */
	function error($msg_error)
	{
		if( $this->debug )
		{
			exit($msg_error); 
		}
		
		if( $this->msg_error == '' )
		{
			$this->msg_error = $msg_error; 
		}
		
		$this->statut = false; 
	}
}// fin de la classe

}
?>