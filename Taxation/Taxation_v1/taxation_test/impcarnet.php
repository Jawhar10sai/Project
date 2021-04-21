<?php require_once('txheads.php'); ?>
<?php
if (isset($_GET['numero'])) {
  $colname_declaration = $_GET['numero'];
}
$query_declaration = "SELECT * FROM impcarnet where etat='Valide' AND numeroCarnet=".$colname_declaration;
$declaration = $conn->query($query_declaration) or die(mysqli_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMP</title>
</head>
<style type="text/css">
  @page {size: landscape;  }
  .footdiv{
    position: fixed;
    bottom: 0;
  }
  .footsignature{
    border-radius: 5px;
    border: 1px solid black;
    margin-left: 30px;
    width: 300px;
    height: 150px;
  }
</style>
<body class="mbody">
  <div class="text-center">
    <h1>Carnet de ramassage</h1>
    <h2>N°: <?=$colname_declaration; ?></h2>
  </div>
<div class="row">
  <div class="col-12">
    <h6>chauffeur</h6>
    <h6>Véhicule</h6>
    <h6><?=$_SESSION['usernom'];?></h6>
    <h6><?=date('d/m/Y');?></h6>
  </div>
</div>

<table width="100%"  height="733" border="1">
  <thead>
    <td class="h6 text-center">Numero</td>
    <td class="h6 text-center">Colis</td>
    <td class="h6 text-center">Ville</td>
    <td class="h6 text-center">Code</td>
    <td class="h6 text-center">Destinataire</td>
    <td class="h6 text-center">Date de déclaration</td>
  </thead>
  <tbody>
    <?php $total=0;
     foreach ($declaration as $key): ?>
      <tr>
        <td><?=$key['numero']; ?></td>
        <td class="text-right"><?=$key['colis'];?></td>
        <td><?=$villes->IDVille($key['villeDest']); ?></td>
        <td class="text-center"><?=$clients->IDtoCOD($key['client2_id']); ?></td>
        <td><?=$key['NomDest']; ?></td>
        <td><?php
        $newDate = date("d/m/Y", strtotime($key['date']));
        echo $newDate; ?></td>
      </tr>
      <?php $total+=$key['colis']; ?>
    <?php endforeach; ?>
    <tr >
      <td border="0"><label class="h6">Total:</label></td>
    </tr>
    <tr>
      <td class="text-center"><b><?=$declaration->num_rows; ?></b></td>
      <td class="text-center"> <b><?=$total; ?></b> </td>
    </tr>
  </tbody>
</table>
<div class="footdiv">
  <div class="row">
    <div class="footsignature text-center">
      <h6>Visa client</h6>
    </div>
    <div class="footsignature text-center">
      <h6>Visa pointeur</h6>
    </div>
    <div class="footsignature text-center">
      <h6>Visa ramasseur</h6>
    </div>
  </div>

</div>
<script>
window.print();
window.onafterprint = function(event) {
    window.location.href = 'declaration.php'
};
</script>
</body>
</html>
<?php
mysqli_free_result($declaration);
?>
