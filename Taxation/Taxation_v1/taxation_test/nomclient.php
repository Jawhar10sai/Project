<?php
/*ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once("txheads.php");
$id = 'H';//$_GET['nom'];
$query="SELECT `NOM` FROM `client` WHERE `NOM` LIKE '%".$id."%' AND `CLIENT_ID_client_lve` =".$_SESSION['user_id'];
echo $query;
exit;
$client = $conn->query($query);
if ($client->num_rows>0) {
  while ($clien = $client->fetch_assoc()) {
    echo $clien['NOM']."\n";
}
}else {
   echo "0 results";
}
$conn->close();
 */?> 
 <?php
 require_once("txheads.php");
 if(isset($_POST["query"]))
 {
    $id = $_POST["query"];
      $output = '';
      $query = "SELECT * FROM `client` WHERE `NOM` LIKE '%".$id."%' AND `CLIENT_ID_client_lve` =".$_SESSION['user_id'];
      $result = $conn->query($query);
      $output = '<table style="background-color:#eee;cursor:pointer;">';
      if(mysqli_num_rows($result) > 0)
      {
           foreach ($result as $row) {
              $output .='<tr class="mtr">';
                $output .= '<td style="padding:12px;">'.$row["NOM"].'</td>';
                $output .= '<td style="padding:12px;">'.$row["PRENOM"].'</td>';
                $output .= '<td style="padding:12px;">'.$row["CLIENT_COD"].'</td>';
                $output .='</tr>';
           }
      }
      else
      {
           $output .= '<tr></tr>';
      }
      $output .= '</table>';
      echo $output;
 }
 ?>
