<?php
$connection = new PDO('mysql:dbname=taxation;host=localhost', 'root', '');
#$result = $connection->query("SELECT * FROM declaration_v");
#echo json_encode($result->fetchAll()); 
$error = array('error' => 404, 'message' => "Id introuvable");
if (isset($_POST['id'])) {
    $result = $connection->prepare("SELECT * FROM declaration_v where client1_id=?");
    echo ($result->execute([$_POST['id']])) ? json_encode($result->fetchAll()) : json_encode($error);
} else {
    echo json_encode($error);
}
