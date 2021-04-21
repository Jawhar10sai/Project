<?php
$server   = "localhost";
$username = "root"; 
$password = "";
$dbname   = "bdd";

class SmoothCalendar {

    private $options = null,
            $get,
            $post;

    private $connection;

    function __construct($options) 
    {
        $this->connection = mysql_connect($GLOBALS["server"  ],
                                          $GLOBALS["username"],
                                          $GLOBALS["password"]);

        mysql_select_db($GLOBALS["dbname"],$this->connection);

        $this->options = array_merge(array(
            'dateFormat' => "%a %b %d %Y %H:%M:%S",
            'safe'       => true,
            'view'       => true,
            'destroy'    => false,
            'edit'       => false,
            'create'     => false
        ), $options);
        
        $this->post = $_POST;
        $this->get  = $_GET;
    }
    
    function __destruct() 
    {
		mysql_close($this->connection);
        unset($this->connection);
    }

    public function throw_server_exception($message) 
    {
        return array("error" => $message);
    }

    public function listEvents($from, $to, $id_cal) 
    {
        if (!$this->options["view"]) 
            return $this->throw_server_exception("Affichage des événements est désactivée");

        if (!isset($from) || $from == null) 
        {
			$dateInfo = getdate();
			$from     = mktime(0, 0, 0, $dateInfo["mon"], 1, $dateInfo["year"]);
        }

        if (isset($to))
        {
           $sql = "SELECT * FROM `events` WHERE id_calendrier = '".$id_cal."' AND `Date` >= '" . date('Y-m-d', $from) . "' AND `Date` <= '" . date('Y-m-d', $to) . "' ORDER BY `Date` ASC";
        }
        else
        {
           $sql = "SELECT * FROM `events` WHERE id_calendrier = '".$id_cal."' AND `Date` >= '" . date('Y-m-d', $from) . "' ORDER BY `Date` ASC";
        }
        
        $data   = array();
        $result = $this->query($sql);

        while ($row = mysql_fetch_assoc($result)) 
        {
            $data[sizeof($data)] = array(
                "id" => $row["ID"],
                "content" => $row["Description"],
                "date" => strftime($this->options["dateFormat"] ,strtotime($row["Date"]))
            );            
        }

  		return $data;
    }
    
    public function removeEvent($id) 
    {
        if (!$this->options["remove"]) 
            return $this->throw_server_exception("Suppression d'événements est désactivé");

        if (!$id)
            return $this->throw_server_exception("Request had a problem");
        
        $sql    = "DELETE FROM `events` WHERE `ID` = $id";
        $result = $this->query($sql);

        return array(
            "message" => "Supprimé avec succès",
            "removed" => $id
        );
    }
    
    public function getEventById($id)
    {
        if (!$this->options["view"]) 
            return $this->throw_server_exception("Affichage des événements est désactivée");
    
        $sql    = "SELECT * FROM `events` WHERE `ID` = $id";
        $result = $this->query($sql);
        
        if ($result)
        {
        	$row = mysql_fetch_assoc($result);
            return array(
                "id"      => $row["ID"],
                "content" => $row["Description"],
                "date"    => strftime($this->options["dateFormat"] ,strtotime($row["Date"])),
                "date_fin"    => strftime($this->options["dateFormat"] ,strtotime($row["Date_fin"]))
            );            
        }

		return array();
    }
    
    public function editEvent($event) 
    {
       
        
        $id      = $event["id"  ];
        $date    = $event["date"];
        $date_fin    = $event["date_fin"];
        $content = mysql_real_escape_string($event["content"]);
        
        if (!$id || !$date) 
            return $this->throw_server_exception("Request had a problem");

        if ($this->options["safe"])
            $content = $this->strip_html_tags($content);

        $sql    = "UPDATE `events` SET `Description` = '$content', `Date` = '$date', `Date_fin` = '$date_fin' WHERE `ID` = $id";  
        $result = $this->query($sql);

        return array("message" => "Modifié avec succès");
    }
    
    public function createEvent($event)
    {
        if (!$this->options["create"])
            return $this->throw_server_exception("Création d'événements sont désactivés");

        $content = stripslashes($event["content"]);
        $content = mysql_real_escape_string($content);
        $date    = $event["date"];
        $date_fin  = $event["date_fin"];
		$id_cal = $event["id_cal"];
      
        if (!$content || !$date) 
            return $this->throw_server_exception("Request had a problem");
        
        if ($this->options["safe"])
            $content = $this->strip_html_tags($content);
        
        $sql    = "INSERT INTO `events` (id_calendrier,`Description`, `Date`, `Date_fin`) VALUES('$id_cal','$content','$date','$date_fin')";  
        $result = $this->query($sql);
        return array("message" => "Créer un nouvel évènement");
    }
    
    private function strip_html_tags($text)
    {
        $text = preg_replace(
            array(
              // Remove invisible content
                '@<head[^>]*?>.*?</head>@siu',
                '@<style[^>]*?>.*?</style>@siu',
                '@<script[^>]*?.*?</script>@siu',
                '@<object[^>]*?.*?</object>@siu',
                '@<embed[^>]*?.*?</embed>@siu',
                '@<applet[^>]*?.*?</applet>@siu',
                '@<noframes[^>]*?.*?</noframes>@siu',
                '@<noscript[^>]*?.*?</noscript>@siu',
                '@<noembed[^>]*?.*?</noembed>@siu',
              // Add line breaks before and after blocks
                '@</?((address)|(blockquote)|(center)|(del))@iu',
                '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
                '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
                '@</?((table)|(th)|(td)|(caption))@iu',
                '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
                '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
                '@</?((frameset)|(frame)|(iframe))@iu',
            ),
            array(
                ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
                "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
                "\n\$0", "\n\$0",
            ),
            $text );
        return strip_tags($text);
    }

    private function query($query) 
    {
        $result = mysql_query($query, $this->connection);
        if (!$result) 
        {
            echo 'Impossible d\'exécuter la requête: ' . mysql_error();
            exit;
        }
        return $result;
    }
}

$calendar = new SmoothCalendar(array(
    'view'   => true,
    'remove' => true,
    'edit'   => false,
    'create' => true,
    'safe'   => false
));

?>