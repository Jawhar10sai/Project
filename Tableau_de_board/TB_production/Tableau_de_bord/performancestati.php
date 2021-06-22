<?php 
$connection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
$date = date('Y-m-d');
$jour = date('d');
$mois = date('m');
$annee = date('Y');
$donnees = array();
/*$date ='2020-05-29';
$mois =05;
$jour =29;*/
$result = $connection->query("SELECT
SUM(total) as total,
SUM(CAS0800) as CAS0800,
SUM(CAS0830) as CAS0830,
SUM(CAS0900) as CAS0900,
SUM(CAS0930) as CAS0930,
SUM(CAS1000) as CAS1000,
SUM(CAS1030) as CAS1030,
SUM(CAS1100) as CAS1100,
SUM(CAS1130) as CAS1130,
SUM(CAS1200) as CAS1200,
SUM(CAS1230) as CAS1230,
SUM(CAS1300) as CAS1300,
SUM(CAS1330) as CAS1330,
SUM(CAS1400) as CAS1400,
SUM(CAS1430) as CAS1430,
SUM(CAS1500) as CAS1500,
SUM(CAS1530) as CAS1530,
SUM(CAS1600) as CAS1600,
SUM(CAS1630) as CAS1630,
SUM(CAS1700) as CAS1700,
SUM(CAS1730) as CAS1730,
SUM(CAS1800) as CAS1800,
SUM(CAS1830) as CAS1830,
SUM(CAS1900) as CAS1900,
SUM(CAS2000) as CAS2000,
SUM(CAS2200) as CAS2200,
SUM(CAS2300) as CAS2300
FROM
tdb_performance_tranche_agence
WHERE aaaa=$annee AND mm=$mois AND jj <=$jour
AND agence=100");
	if($result){
		if($result->num_rows>0){
 foreach ($result as $key) {
  $donnees['total'] = $key['total'];
  $donnees['CAS0800'] = $key['CAS0800'];
  $donnees['CAS0830'] = $key['CAS0830'];
  $donnees['CAS0900'] = $key['CAS0900'];
  $donnees['CAS0930'] = $key['CAS0930'];
  $donnees['CAS1000'] = $key['CAS1000'];
  $donnees['CAS1030'] = $key['CAS1030'];
  $donnees['CAS1100'] = $key['CAS1100'];
  $donnees['CAS1130'] = $key['CAS1130'];
  $donnees['CAS1200'] = $key['CAS1200'];
  $donnees['CAS1230'] = $key['CAS1230'];
  $donnees['CAS1300'] = $key['CAS1300'];
  $donnees['CAS1330'] = $key['CAS1330'];
  $donnees['CAS1400'] = $key['CAS1400'];
  $donnees['CAS1430'] = $key['CAS1430'];
  $donnees['CAS1500'] = $key['CAS1500'];
  $donnees['CAS1530'] = $key['CAS1530'];
  $donnees['CAS1600'] = $key['CAS1600'];
  $donnees['CAS1630'] = $key['CAS1630'];
  $donnees['CAS1700'] = $key['CAS1700'];
  $donnees['CAS1730'] = $key['CAS1730'];
  $donnees['CAS1800'] = $key['CAS1800'];
  $donnees['CAS1830'] = $key['CAS1830'];
  $donnees['CAS1900'] = $key['CAS1900'];
  $donnees['CAS2000'] = $key['CAS2000'];
  $donnees['CAS2200'] = $key['CAS2200'];
  $donnees['CAS2300'] = $key['CAS2300'];
 }
 $donnees = json_encode($donnees);
 if (file_put_contents("performance_stati.json",$donnees)) {
  header('location: productionjour.php');
  }
  }
  }