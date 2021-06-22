<?php
/*
function getProd($jr){
$connection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
$result = $connection->query("select  * from table_image1  where jj =$jr");
if($result->num_rows>0)
{
	foreach($result as $key){
		return $key['pos'];
	}
}
else
return 0;
}
*/

$connection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
$date = date('Y-m-d');
$jour = date('d');
$mois = date('m');
$annee = date('Y');
$donnees = array();
if (isset($_POST['performance_liv'])){
  #Extraction de la perfrormance des livreurs et l' insérée dans un fichier JSON.
  $i = 1;
 $result = $connection->query("SELECT  * from tdb_performance_liv where 1=1 AND agence =100 AND  dateedition ='$date'");
foreach ($result as $key) {
  $cas10 = $key['CAS10']* 100/$key['total'] ;
  $cas12 = $key['CAS12']* 100/$key['total'] ;
  $cas14 = $key['CAS14']* 100/$key['total'] ;
  $cas16 = $key['CAS16']* 100/$key['total'] ;
  $cas18 = $key['CAS18']* 100/$key['total'] ;
  $global = $key['CAS23']* 100/$key['total'];
  $note = ((($key['CAS10']/$key['total'])*10)+(($key['CAS12']/$key['total'])*10)+(($key['CAS14']/$key['total'])*10)+(($key['CAS18']/$key['total'])*10))/4;
  $donnees[] = array(
                                          'Livreur' =>'L'.$i ,
                                          'mat' => $key['mat'],
                                          'nom' => $key['nom'],
                                          'total' => $key['total'],
										                      'nonlivre' => $key['nonlivre'],
                                          'nonlivrelivreur' => $key['nonlivrelivreur'],
                                          'nbrpos' => $key['nbrpos'],
                                          'nbrcolis' => $key['nbrcolis'],
                                          'CAS10' => $cas10,
                                          'CAS12' => $cas12,
                                          'CAS14' => $cas14,
                                          'CAS16' => $cas16,
                                          'CAS18' => $cas18,
                                          'global' =>$global ,
                                          'note' =>$note
                                         );
                                           $i += 1;
}
$donnees = json_encode($donnees);
if (file_put_contents("performance_livreur.json",$donnees)) {
echo "OK";
}
}
if (isset($_POST['performance_jour'])) {
    #Extraction de la production journalière et l' insérée dans un fichier JSON.
  $result = $connection->query("SELECT distinctdate.jj AS j, tdb_performance_jour. *
  FROM distinctdate
  JOIN tdb_performance_jour ON distinctdate.dateedition = tdb_performance_jour.dateedition
  WHERE tdb_performance_jour.dateedition <= '$date'
  AND agence =100
  ORDER BY j ASC
  LIMIT 0 , 31");
 foreach ($result as $key) {
  $donnees[] = array(
                                          'j' =>$key['j'] ,
                                          'nbval' =>$key['nbval'] ,
                                          'agence' =>$key['agence'] ,
                                          'lib_ville' =>$key['lib_ville'] ,
                                          'dateedition' =>$key['dateedition'] ,
                                          'aaaa' =>$key['aaaa'] ,
                                          'mm' =>$key['mm'] ,
                                          'jj' =>$key['jj'] ,
                                          'nbrcolis' =>$key['nbrcolis'] ,
                                          'nbrpos' =>$key['nbrpos'],
                                          'total' =>$key['total'] ,
                                          'nonlivre' =>$key['nonlivre'] ,
                                          'nonlivrelivreur' =>$key['nonlivrelivreur'],
                                          'CAS10' =>$key['CAS10'],
                                          'CAS12' =>$key['CAS12'] ,
                                          'CAS14' =>$key['CAS14'],
                                          'CAS16' =>$key['CAS16'] ,
                                          'CAS18' =>$key['CAS18'],
                                          'CAS20' =>$key['CAS20'] ,
                                          'CAS22' =>$key['CAS22'],       
                                          'CAS23' =>$key['CAS23']                                  
                                       );
 }
 $donnees = json_encode($donnees);
 if (file_put_contents("production_jour.json",$donnees)) {
  echo "OK";
  }
}
if (isset($_POST['performance_stati'])) {
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
  echo "OK";
  }
}
 ?>
