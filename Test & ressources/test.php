<?php
$connection = new PDO('mysql:dbname=taxation;host=localhost', 'root', '');
#$result = $connection->query("SELECT * FROM declaration_v");
#echo json_encode($result->fetchAll()); 
$error = array('error' => 404, 'message' => "Id introuvable");
/*if (isset($_GET['id'])) {
    $result = $connection->prepare("SELECT * FROM declaration_v where client1_id=?");
    echo ($result->execute([$_GET['id']])) ? json_encode($result->fetchAll()) : json_encode($error);
} else {
    echo json_encode($error);
}
*/
$recieved_data = json_decode(file_get_contents("php://input"));
if (isset($recieved_data->id)) {
    $result = $connection->prepare("SELECT * FROM declaration_v where client1_id=?");
    echo ($result->execute([$recieved_data->id])) ? json_encode($result->fetchAll()) : json_encode($error);
} else {
    echo json_encode($error);
}
