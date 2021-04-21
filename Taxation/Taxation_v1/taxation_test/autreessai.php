<script type="text/javascript">
/*obj = JSON.parse(res);
for (var i = 0; i < obj.length; i++) {
  $('#nom').autocomplete({
    source:obj[i]
  });
  //console.log(obj[i].NOM+" "+obj[i].PRENOM+" "+obj[i].CLIENT_COD);
  $('.segg').fadeIn();
  var outp ='<div style="background-color:#eee;cursor:pointer;"><div class="mtr" style="padding:12px;">'+obj[i].NOM+" "+obj[i].PRENOM+" "+obj[i].CLIENT_COD+'</div></div>';
  $('.segg').html(outp);
}*/
</script>
<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once("txheads.php");
/*if(isset($_POST["query"]))
{*/
  /*#header('Content-type: application/json');
   $id = $_POST["query"];
     //$output = '';
     $resultarr = array();
     $query = "SELECT * FROM `client` WHERE `NOM` LIKE '%".$id."%' AND `CLIENT_ID_client_lve` =".$_SESSION['user_id'];
     $result = $conn->query($query);*/
     //$output = '<div style="background-color:#eee;cursor:pointer;">';
#     if(mysqli_num_rows($result) > 0)
#     {
?>
<script type="text/javascript">
function isNumberKey(evt, obj) {

   var charCode = (evt.which) ? evt.which : event.keyCode
   var value = obj.value;
   var dotcontains = value.indexOf(".") != -1;
   if (dotcontains)
       if (charCode == 46) return false;
   if (charCode == 46) return true;
   if (charCode > 31 && (charCode < 48 || charCode > 57))
       return false;
   return true;
}

</script>
<table class="table table-bordered">
<tr class="thead-dark">
  <td><b>Ville</b> </td>
</tr>
<tr>
  <td>RICH</td>
</tr>
<tr>
  <td>RISSANI</td>
</tr>
<tr>
  <td>ROMMANI</td>
</tr>
<tr>
  <td>SAFI</td>
</tr>
<tr>
  <td>SAIDIA</td>
</tr>
<tr>
  <td>SALE</td>
</tr>
<tr>
  <td>SEBT GZOULA</td>
</tr>
<tr>
  <td>SEBT NEMMA</td>
</tr>
<tr>
  <td>SEFROU</td>
</tr>
<tr>
  <td>SELOUANE</td>
</tr>
<tr>
  <td>SETTAT</td>
</tr>
<tr>
  <td>SIDI ALLAL BAHRAOUI</td>
</tr>
<tr>
  <td>SIDI BENNOUR</td>
</tr>
<tr>
  <td>SIDI IFNI</td>
</tr>
<tr>
  <td>SIDI KACEM</td>
</tr>
<tr>
  <td>SIDI SLIMANE</td>
</tr>
<tr>
  <td>SIDI SMAIL</td>
</tr>
<tr>
  <td>SIDI YAHIA GHARB</td>
</tr>
<tr>
  <td>SIDI YAHYA ZAER</td>
</tr>
<tr>
  <td>SKHIRAT</td>
</tr>
<tr>
  <td>SMARA</td>
</tr>
<tr>
  <td>SMIMOU</td>
</tr>
<tr>
  <td>SOUK LARBAA</td>
</tr>
<tr>
  <td>SOUK SEBT</td>
</tr>
<tr>
  <td>SOUK TLET GHARB</td>
</tr>
<tr>
  <td>Station Shell OumRrbii</td>
</tr>
<tr>
  <td>Tafilalt</td>
</tr>
<tr>
  <td>Tafraout</td>
</tr>
<tr>
  <td>TAHLA</td>
</tr>
<tr>
  <td>TALIOUINE</td>
</tr>
<tr>
  <td>TAMANAR</td>
</tr>
<tr>
  <td>TAMELLALTE</td>
</tr>
</table>
