<?php
include_once "clients.class.php";
$clients = new ClientLve;
$serverName = "100.64.10.29";
$connectionInfo = array( "Database"=>"VEXINITIAL", "UID"=>"j.hassou", "PWD"=>"H@$$$$$1542");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
$sql = "select * from client where client_cod in (?,?,?,?,?,?,?,?)";
#$sql = "SELECT * from intervient where COURRIER_ID in (SELECT COURRIER_ID from courrier where COURRIER_NUM =?) --order by SAISIE_DAT DESC";
$params = array('10512','14914','14449','12703','5233','15436','14946','9233');
$stmt = sqlsrv_query( $conn, $sql,$params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
   }else {
     echo "INSERT INTO `client_lve`( `CLIENT_COD`, `NOM`, `PRENOM`, `CIVILITE_COD`, `CLIENT_TYP`, `IDENTITE_TYP`, `IDENTITE_VAL`, `CREATION_DAT`, `CLIENT_ETA`, `SAISIE_DAT`, `AGENCE_COD`, `commentaire`, `mail`, `ICE`, `adresse`, `ville`, `telephone`, `login`) VALUES";
           while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
             $clients->TrouverClient($row['CLIENT_ID']);
             $clients->AjouterClient();
          }
   }
/*################################ FIN SELECTION ##################################*/
/*################################ INSERTION ##################################*/
  /*  $sql = "INSERT INTO test (id, nom,prenom,age) VALUES (?, ?, ?, ?)";
    $params = array(4, "some data","some data",25);
    $stmt = sqlsrv_query( $conn, $sql, $params);
    if( $stmt === false ) {
         die( print_r( sqlsrv_errors(), true));
       }else {
         echo "inserted";
       }*/
/*################################ FIN D'INSERTION ##################################*/
/*################################ MODIFICATION ##################################*/
/*$sql = "UPDATE test set nom=? where id=?";
$params = array("Messi", 3);
$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
   }else {
     echo "Updated";
   }*/
/*################################ FIN MODIFICATION ##################################*/
/*################################ SUPPRESSION ##################################*/
/*$sql = "DELETE FROM test WHERE id=?";
$params = array(4);
$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
  }else {
    echo "deleted";
  }*/
/*################################ FIN SUPPRESSION ##################################*/
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
#exit;
?>
<script src="jquery.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#id_courrier').on('change',function(){
      $.ajax({
        url:'getdata.php',
        method:'post',
        data:{'id_c':$(this).val()},
        success:function(res){
          $('.result').html(res);
        }
      });
    });
  });
</script>
<?php
/*
$now = time(); // or your date as well
$your_date = strtotime("2020-08-10");
$datediff = $now - $your_date;

echo round($datediff / (60 * 60 * 24)); */
 ?>
<!--
<img id='myimg' src="http://lorempixel.com/400/200/" alt="" />
<button class="btn" onclick="rotateit();">
click it!
</button>
<button class="btn" onclick="derotateit();">
des
</button>
<script src="jquery.min.js" charset="utf-8"></script>
<script type="text/javascript">
function rotateit(){
$('#myimg').css({'transform': 'rotate(90deg)'});
}
function derotateit(){
$('#myimg').css({'transform': 'rotate(90deg)'});
}
</script>
-->
