<?php
/*
*Premiere interface
 */
include_once "headers.php";
$donnees = file_get_contents("performance_livreur.json");

$performances = json_decode($donnees,true);
$data1 = '';
$data2 = '';
$totalglobal=0;
$total =0;
$nonlivre = 0;
$i=0;
?>
<div class="container-fluid">
<div class="row row-div">
  <div class="col-md-3">
    <div class="row">
      <img src="assets/images/voielvej.png" alt="" height="60">
    </div>
    <div class="row">
        <div class="form-group col-12">
          <input type="text" name="date" disabled value="<?=date("d/m/Y");?>" style="width:100%;">
        </div>
        <div class="form-group col-12">
          <input type="text" name="" disabled value="CASABLANCA" style="width:100%;">
        </div>
    </div>
    <div class="row">
      <div class="card card-etat">
        <h6 class="card-title text-center">Performances globale livreurs</h6>
        <div class="card-body">
          <div class="row" >
            <div class="col-8 text-center situation">

            </div>
            <div class="col-4 mt-2">
              <h3 id="perfo"></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="card card-etat">
        <h6 class="card-title text-center">Taux de livraison livreurs</h6>
        <div class="card-body">
          <canvas id="reste" width="250" height="150"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <table class="livrr" border="1" style="width:100%;border:1px solid #dc1e2d;">
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Matricule</th>
        <th class="text-center">Livreur</th>
        <th class="text-center">Positions</th>
        <th class="text-center">Colis</th>
        <th class="text-center">10H</th>
        <th class="text-center">12H</th>
        <th class="text-center">14H</th>
        <th class="text-center">16H</th>
        <th class="text-center">18H</th>
        <th class="text-center">Golbal</th>
        <th class="text-center">Note</th>
      </tr>
      <?php foreach ($performances as $key): ?>
        <tr>
          <td class="text-center"><?=$key['Livreur']; ?></td>
          <td class="text-center"><?=$key['mat']; ?></td>
          <?php
          #creatoion des elements du label du graph
           $data1 .= '"'.$key['Livreur']." - ".$key['mat'].'",';
           ?>
          <td><?=$key['nom']; ?></td>
          <td class="text-center"><?=$key['nbrpos']; ?></td>
          <td class="text-center"><?=$key['nbrcolis']; ?></td>
          <td class="text-center"><?=number_format($key['CAS10'], 2, ',', ' ').'%'; ?></td>
          <td class="text-center"><?=number_format($key['CAS12'], 2, ',', ' ').'%'; ?></td>
          <td class="text-center"><?=number_format($key['CAS14'], 2, ',', ' ').'%'; ?></td>
          <td class="text-center"><?=number_format($key['CAS16'], 2, ',', ' ').'%'; ?></td>
          <td class="text-center"><?=number_format($key['CAS18'], 2, ',', ' ').'%'; ?></td>
          <td class="text-center"><?=number_format($key['global'], 2, ',', ' ').'%'; ?></td>
          <?php
          #creatoion des statistiques du graph
          $total +=$key['total'];
          $nonlivre +=$key['nonlivre'];
           $data2 .= '"'.$key['global'].'",';
            $i += 1;
           ?>
          <td class="text-center"><?php
           echo number_format($key['note'], 1, ',', ' ') ;
           $totalglobal +=$key['note'];
           ?></td>
        </tr>
      <?php endforeach; ?>
      <?php
            $totalglobal = number_format($totalglobal/$i*10, 0, ',', ' ') ;
      	     $data1 = trim($data1,",");
      				$data2 = trim($data2,",");
               ?>
    </table>
  </div>
</div>
<div class="row row-div">
<div class="container">
  <div class="col-md-8 offset-md-3">
    <canvas id="chart" style="width: 100%; height: 45vh;"></canvas>
  </div>
</div>
</div>
</div>
<script>
var perf = <?=$totalglobal;?>;
var perfo = <?=$totalglobal;?>+"%";
if (perf<=20) {
  $('.situation').html('<i class="fas fa-angry fa-3x" style="color:red;"></i>');
}
if (perf>20 && perf<=50) {
  $('.situation').html('<i class="fas fa-frown fa-3x" style="color:orange;"></i>');
}
if (perf>50) {
  $('.situation').html('<i class="fas fa-grin fa-3x" style="color:green;"></i>');
}
$('#perfo').html(perfo);
  var ctx = document.getElementById("chart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php echo $data1; ?>],
      datasets:
      [
      {
        label: 'Performance',
        data: [<?php echo $data2; ?>],
        backgroundColor: 'green',
      }]
    },
    options: {
      scales: {yAxes: [{ticks:{beginAtZero: true}}]},
      tooltips:{mode: 'index'},
      legend:{display: true, position: 'top', labels: {fontColor: 'green', fontSize: 16}}
    }
  });
  /************************************************************************* */
  var ctx2 = document.getElementById("reste").getContext('2d');
    var myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: ['Livrés - '+<?= $total-$nonlivre; ?>,'non-livrés - '+<?=$nonlivre; ?>],
      datasets:
      [
      {
        label: 'livrés',
        data: [<?=$total-$nonlivre; ?>,<?=$nonlivre; ?>],
        backgroundColor: ['green','red']
      }
      ]
    },
    options: {
      responsive:true,
      legend:{display: true, position: 'bottom', labels: {fontColor: '#000', fontSize: 16}}
    }
  });
</script>
<script type="text/javascript">
/*
//Script de chargement des données de la page de la production journalière
$(document).ready(function(){
  $.ajax({
    url:'chargement.php',
    method:'POST',
    data:{"performance_jour":'OK'},
    success:function(res){
		            $('#loading').modal('show');
	          setTimeout(function(){
						$(location).attr('href', 'production.php');
					}, 5000);
      //console.log(res);      
    },
	error:function(){
		    setTimeout(function(){
      $(location).attr('href', 'index.php');
    }, 50000);
	}
  })
});*/
							setTimeout(function(){
							  $(location).attr('href', 'production.php');
							}, 20000);
</script>