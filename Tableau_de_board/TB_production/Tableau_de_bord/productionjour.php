<?php 
/*function getProd($jr){
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
}*/
$connection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
$date = date('Y-m-d');
$jour = date('d');
$mois = date('m');
$annee = date('Y');
#$date ='2020-05-29';
$donnees = array();
/*echo ("SELECT distinctdate.jj AS j, tdb_performance_jour. *
  FROM distinctdate
  JOIN tdb_performance_jour ON distinctdate.dateedition = tdb_performance_jour.dateedition
  WHERE tdb_performance_jour.dateedition <= '$date'
  AND agence =100
  ORDER BY j ASC
  LIMIT 0 , 31");
  exit;*/
    #Extraction de la production journalière et l' insérée dans un fichier JSON.
  $result = $connection->query("SELECT distinctdate.jj AS j, tdb_performance_jour. *
  FROM distinctdate
  JOIN tdb_performance_jour ON distinctdate.dateedition = tdb_performance_jour.dateedition
  WHERE tdb_performance_jour.dateedition <= '$date'
  AND agence =100
  ORDER BY j ASC
  LIMIT 0 , 31");
  
  		if($result){
		if($result->num_rows>0){
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
                                          'nbrpos' =>$key['nbrpos'] ,
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
  header('location: fermer.php');
  }
  }
  }
  ?>