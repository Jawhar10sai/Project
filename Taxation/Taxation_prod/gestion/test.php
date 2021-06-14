<?php
include_once "classes/fetchclas.php";

echo sha1("admin");
exit;

if (isset($_GET['code'])) {
    $code = ClientLve::TrouverClientParCode($_GET['code'])->CLIENT_ID;
    $result = Connection::getConnection()->prepare("select * from declaration_v where client1_id=?");
    if ($result->execute([$code])) {
        echo json_encode($result->fetchAll());
        exit;
    }
}
/*
?>
<form method="post" id="import_excel_form" action="ajout.php" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <td width="25%" align="right">Select Excel File</td>
            <td width="50%"><input type="file" name="import_excel" /></td>
            <td width="25%"><input type="submit" name="importer_declaration" id="import" class="btn btn-primary" value="Import" /></td>
        </tr>
    </table>
</form>
<?php 
*/
foreach (Consigne::CongisnesEtat('en service') as $consigne) {
    echo $consigne->num_serie_consigne . " - " . $consigne->etat . "<br>";
}
#$result = $client_lve->AjouterMonClient($_POST['codecli'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['adresse'], $_POST['ville']);
#print_r($result);
/*
if ($result) {
$declarations->client2_id = $result['id_sous_client'];
$declarations->id_adres = $result['id_adress'];
}*/