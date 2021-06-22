<?php 
$dateH = date('Y-m-d',strtotime("-1 days"));
$connection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
$date = date('Y-m-d');
$jour = date('d');
$mois = date('m');
$annee = date('Y');
$donnees = array();

  #Extraction de la perfrormance des livreurs et l' insérée dans un fichier JSON.
  $i = 1;
   #$result = $connection->query("SELECT  * from tdb_performance_liv where 1=1 AND agence =100 AND  dateedition ='$dateH'");
   $result = $connection->query("SELECT  * from tdb_performance_liv where 1=1 AND agence =100 AND  dateedition ='$dateH'");
	if($result){
		if($result->num_rows>0){
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
header('location: performancestati.php');
#echo "OK";
}
		}
	}

?>