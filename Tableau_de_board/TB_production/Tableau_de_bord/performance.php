<?php
include_once "headers.php";
$donnees = file_get_contents("performance_stati.json");
$performances[] = json_decode($donnees,true);
$data1 = '';
foreach ($performances as $key) {
  $total = $key['total'];
  $CAS0800 = number_format($key['CAS0800']/$key['total']*100,0,',',' ');
  $CAS0830 = number_format($key['CAS0830']/$key['total']*100,0,',',' ');
  $CAS0900 = number_format($key['CAS0900']/$key['total']*100,0,',',' ');
  $CAS0930 = number_format($key['CAS0930']/$key['total']*100,0,',',' ');
  $CAS1000 = number_format($key['CAS1000']/$key['total']*100,0,',',' ');
  $CAS1030 = number_format($key['CAS1030']/$key['total']*100,0,',',' ');
  $CAS1100 = number_format($key['CAS1100']/$key['total']*100,0,',',' ');
  $CAS1130 = number_format($key['CAS1130']/$key['total']*100,0,',',' ');
  $CAS1200 = number_format($key['CAS1200']/$key['total']*100,0,',',' ');
  $CAS1230 = number_format($key['CAS1230']/$key['total']*100,0,',',' ');
  $CAS1300 = number_format($key['CAS1300']/$key['total']*100,0,',',' ');
  $CAS1330 = number_format($key['CAS1330']/$key['total']*100,0,',',' ');
  $CAS1400 = number_format($key['CAS1400']/$key['total']*100,0,',',' ');
  $CAS1430 = number_format($key['CAS1430']/$key['total']*100,0,',',' ');
  $CAS1500 = number_format($key['CAS1500']/$key['total']*100,0,',',' ');
  $CAS1530 = number_format($key['CAS1530']/$key['total']*100,0,',',' ');
  $CAS1600 = number_format($key['CAS1600']/$key['total']*100,0,',',' ');
  $CAS1630 = number_format($key['CAS1630']/$key['total']*100,0,',',' ');
  $CAS1700 = number_format($key['CAS1700']/$key['total']*100,0,',',' ');
  $CAS1730 = number_format($key['CAS1730']/$key['total']*100,0,',',' ');
  $CAS1800 = number_format($key['CAS1800']/$key['total']*100,0,',',' ');
  $CAS1830 = number_format($key['CAS1830']/$key['total']*100,0,',',' ');
  $CAS1900 = number_format($key['CAS1900']/$key['total']*100,0,',',' ');
  $CAS2000 = number_format($key['CAS2000']/$key['total']*100,0,',',' ');
  $CAS2200 = number_format($key['CAS2200']/$key['total']*100,0,',',' ');
  $CAS2300 = number_format($key['CAS2300']/$key['total']*100,0,',',' ');
  $CASAV10 = $total - $key['CAS1000'];
  $CASAV12 = $total - $key['CAS1200'];
  $CASAV14 = $total - $key['CAS1400'];
  $CASAV18 = $total - $key['CAS1800'];
  }
 ?>
      <img src="assets/images/voielvej.png" alt="" height="60">
    <label class="h3 text-center ml-15" style="width:80%;"> Performance <?=MoisActuel();?> jusqu'au <?=date('d',strtotime("-1 days"));?></label>
 <div class="container-fluid">
    <div class="row" style="max-height:130px;">

            <div class="card col-3">
                <h5 class="card-title text-center">Avant 10H</h5>
              <div class="card-body text-center">
                  <?php
                    if ($CAS1000<20) {
                       $color ="red";
                      $emoji ="fas fa-angry fa-2x";
                    }elseif ($CAS1000>20 && $CAS1000<=60) {
                      $color ="orange";
                      $emoji ="fas fa-frown fa-2x";                      
                    }else {
                      $color ="green";
                      $emoji ="fas fa-grin fa-2x";
                    }
                  ?>
                  <h2 style="color:<?=$color;?>;"><?=$CAS1000?>% <i class="<?=$emoji;?>"></i> </h2>
              </div>
            </div>
            <div class="card col-3">
                <h5 class="card-title text-center">Avant 12H</h5>
              <div class="card-body text-center">
                  <?php
                    if ($CAS1200<20) {
                       $color ="red";
                      $emoji ="fas fa-angry fa-2x";
                    }elseif ($CAS1200>20 && $CAS1200<=60) {
                      $color ="orange";
                      $emoji ="fas fa-frown fa-2x";                      
                    }else {
                      $color ="green";
                      $emoji ="fas fa-grin fa-2x";
                    }
                  ?>
                  <h2 style="color:<?=$color;?>;"><?=$CAS1200?>% <i class="<?=$emoji;?>"></i> </h2>
              </div>
            </div>
            <div class="card col-3">
                <h5 class="card-title text-center">Avant 14H</h5>
              <div class="card-body text-center">
                  <?php
                    if ($CAS1400<20) {
                       $color ="red";
                      $emoji ="fas fa-angry fa-2x";
                    }elseif ($CAS1400>20 && $CAS1400<=60) {
                      $color ="orange";
                      $emoji ="fas fa-frown fa-2x";                      
                    }else {
                      $color ="green";
                      $emoji ="fas fa-grin fa-2x";
                    }
                  ?>
                  <h2 style="color:<?=$color;?>;"><?=$CAS1400?>% <i class="<?=$emoji;?>"></i> </h2>
              </div>
            </div>
            <div class="card col-3">
                <h5 class="card-title text-center">Avant 18H</h5>
              <div class="card-body text-center">
                  <?php
                    if ($CAS1800<20) {
                       $color ="red";
                      $emoji ="fas fa-angry fa-2x";
                    }elseif ($CAS1800>20 && $CAS1800<=60) {
                      $color ="orange";
                      $emoji ="fas fa-frown fa-2x";                      
                    }elseif ($CAS1800<99) {
                      $color ="orange";
                      $emoji ="fas fa-meh fa-2x";
                    }else {
                      $color ="green";
                      $emoji ="fas fa-grin fa-2x";
                    }
                  ?>
                  <h2 style="color:<?=$color;?>;"><?=$CAS1800?>% <i class="<?=$emoji;?>"></i> </h2>
              </div>
            </div>
      </div>
	  <div class="row mt-5">
		<canvas id="chart" style="width: 100%; height: 40vh;"></canvas>
    <div class="container">
        <div class="row ">
        <canvas id="chartt" style="width: 100%; height: 25vh;"></canvas>
        </div>            
    </div>
	  </div>
 </div>
 <script>
  var ctx = document.getElementById("chart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['08H00','08H30','09H00','09H30','10H00','10H30','11H00','11H30','12H00','12H30','13H00','13H30','14H00','14H30','15H00','15H30','16H00','16H30','17H00','17H30','18H00','18H30','19H00','20H00','22H00','23H00'],
      datasets:
      [
      {
        label: 'Performance',
        
        data: [<?=$CAS0800;?>,<?=$CAS0830;?>,<?=$CAS0900;?>,<?=$CAS0930;?>,<?=$CAS1000;?>,<?=$CAS1030;?>,<?=$CAS1100;?>,<?=$CAS1130;?>,<?=$CAS1200;?>,<?=$CAS1230;?>,<?=$CAS1300;?>,<?=$CAS1330;?>,<?=$CAS1400;?>,<?=$CAS1430;?>,<?=$CAS1500;?>,<?=$CAS1530;?>,<?=$CAS1600;?>,<?=$CAS1630;?>,<?=$CAS1700;?>,<?=$CAS1730;?>,<?=$CAS1800;?>,<?=$CAS1830;?>,<?=$CAS1900;?>,<?=$CAS2000;?>,<?=$CAS2200;?>,<?=$CAS2300;?>],
        backgroundColor: '#ff6666',
      }]
    },
    options: {
      scales: {scales:{yAxes: [{
        ticks:{
          beginAtZero: true
        }
      }], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
      tooltips:{mode: 'index'},
      legend:{display: true, position: 'top', labels: {fontColor: '#ff6666', fontSize: 16}}
    }
  });
</script>
<script type="text/javascript">
//Script de chargement des données de la page de performance livreur
/*$(document).ready(function(){
  $.ajax({
    url:'chargement.php',
    method:'POST',
    data:{"performance_liv":'OK'},
    success:function(res){
            $('#loading').modal('show');
	          setTimeout(function(){
						$(location).attr('href', 'index.php');
					}, 5000);
      //console.log(res);      
    },
	error:function(){
		    setTimeout(function(){
      $(location).attr('href', 'performance.php');
    }, 50000);
	}
  })
});*/
							setTimeout(function(){
							  $(location).attr('href', 'index.php');
							}, 20000);
							setTimeout(function(){
							  $(location).attr('href', 'performance.php');
							}, 500000);
</script>
<script>
  var ctx2 = document.getElementById("chartt").getContext('2d');
    var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
      labels: ['10H00','12H00','14H00','18H00'],
      datasets:
      [
      {
        label: 'Performance livraison',
        fill: true,
        data: [<?=$CASAV10;?>,<?=$CASAV12;?>,<?=$CASAV14;?>,<?=$CASAV18;?>],
        backgroundColor: 'lightblue',
      }]
    },
    options: {
      scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
      tooltips:{mode: 'index'},
      legend:{display: true, position: 'top', labels: {fontColor: 'lightblue', fontSize: 16}}
    }
  });
</script>