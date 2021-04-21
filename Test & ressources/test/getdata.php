<?php

$courrierid = $_POST['id_c'];
$serverName = "100.64.10.29";
$connectionInfo = array( "Database"=>"VEXINITIALRecette", "UID"=>"j.hassou", "PWD"=>"H@$$$$$1542");
/*----------------------------------------------------------- PRA ----------------------------------------------------------------*/
#$serverName = "10.110.1.10";
#$connectionInfo = array( "Database"=>"VEXINITIAL", "UID"=>"J.HASSOU", "PWD"=>"H@$$$$$1542");

$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
$sql = "SELECT * from courrier where COURRIER_ID=?";
/*$sql = "SELECT NOM,CLIENT_COD

,ISNULL ((
select sum(p.MONTANT_HT) as somme
from declaration_v d
inner join courrier_agence ca
on d.courrier_id=ca.courrier_id
inner join produit p on d.courrier_id=p.courrier_id
where (d.date between cast('01/08/2020' as date) and cast('31/10/2020' as date)) and d.payeur_id=c.CLIENT_ID
--(d.client1_id = c.CLIENT_ID or d.client2_id = c.CLIENT_ID)
--and ca.agence_cod='100'
and ca.INTER_TYP='D'
),0) ca

from client c ";*/
$params = array($courrierid);
$stmt = sqlsrv_query( $conn, $sql,$params);
#$stmt = sqlsrv_query( $conn, $sql);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
   }else {
     ?>
     <table border="1">
       <tr>
         <td>courrier id</td>
         <td>Numero</td>
         <td>BU</td>
       </tr>
       <?php            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                 echo "
                 <tr>
                 <td>".$row['COURRIER_ID']."</td>
                 <td>".$row['COURRIER_NUM']."</td>
                 <td>".$row['COURRIER_TYP']."</td>
                 </tr>";
               }
        ?>
     </table>
     <?php

     /*
     echo "<table border='1'>
             <tr>
             <td>Courrier id</td>
             <td>Numero</td>
             <td>courrier type</td>
             <td>Date de saisie</td>
             </tr>";
           while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          echo "
          <tr>
          <td>".$row['COURRIER_ID']."</td>
          <td>".$row['COURRIER_NUM']."</td>
          <td>".$row['COURRIER_TYP']."</td>
          <td>".$row['SAISIE_DAT']->format('Y-m-d')."</td>
          </tr>
          </table>";
        }*/
   }
}
