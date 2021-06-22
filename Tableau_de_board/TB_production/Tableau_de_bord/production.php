<?php
/*
*deuxieme interface
 */
include_once "headers.php";
#tester si le jour est le premier du mois ou pas (si j==1 on force que la variable données soit une liste)
#if(date('d')==1)
#$donnees[] = file_get_contents("production_jour.json");
#else
$donnees = file_get_contents("production_jour.json");
$result = json_decode($donnees,true);
$data1 = '';
$data2 = '';
$data3 = '';
$data4 = '';
 ?>
 <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <img src="assets/images/voielvej.png" alt="" height="60">
          <label class="h3 mt-2 text-center" style="width:80%;">Production journalière</label>
        </div>
        <table border="1" style="width:100%;" class="prod text-center">
          <tr>
            <td style="background-color:black;color:#fff;"><?=MoisActuel(); ?></td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
              ?>
              <td style="background-color:black;color:#fff;"><?=$i;?></td>
              <?php
            } ?>
          </tr>
          <tr>
            <td style="background-color:black;color:#fff;">Productivité</td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
            				foreach ($result as $key) {
                				  if ($i==$key['j']) {
                				  $nbrpos = $key['nbrpos'];
                					break;
                				  }else {
                					$nbrpos = 0;
                				  }
                   }
  			      ?>
        			 <td><?=$nbrpos;?></td>
        			<?php
             $data1 .= '"'.$i.'",';
			 if($nbrpos==0)
				$nbrpos=5;
             $data2 .= '"'.$nbrpos.'",';
                    }
                    $data1 = trim($data1,",");
                    $data2 = trim($data2,",");
              ?>
          </tr>
          <tr>
            <td style="background-color:black;color:#fff;">Colis</td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
            				foreach ($result as $key) {
                				  if ($i==$key['j']) {
                				  $nbrcolis = $key['nbrcolis'];
                					break;
                				  }else {
                					$nbrcolis = 0;
                				  }
                   }
  			      ?>
        			 <td><?=$nbrcolis;?></td>
        			<?php
                    }
              ?>
          </tr>
          <tr>
            <td style="background-color:black;color:#fff;">Taux <br>  Av 10H</td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
            				foreach ($result as $key) {
                				  if ($i==$key['j']) {
                				  $CAS10 = number_format($key['CAS10']/$key['total']*100,0,',','');
                					break;
                				  }else {
                					$CAS10 = 0;
                				  }
                   }
  			      ?>
        			 <td><?=$CAS10;?></td>
        			<?php
                    }
              ?>
          </tr>
          <tr>
            <td style="background-color:black;color:#fff;">Taux <br>  Av 12H</td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
            				foreach ($result as $key) {
                				  if ($i==$key['j']) {
                				  $CAS12 = number_format($key['CAS12']/$key['total']*100,0,',','');
                					break;
                				  }else {
                					$CAS12 = 0;
                				  }
                   }
  			      ?>
        			 <td><?=$CAS12;?></td>
        			<?php
                    }
              ?>
          </tr>
          <tr>
            <td style="background-color:black;color:#fff;">Taux <br>  Av 14H</td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
            				foreach ($result as $key) {
                				  if ($i==$key['j']) {
                				  $CAS14 = number_format($key['CAS14']/$key['total']*100,0,',','');
                					break;
                				  }else {
                					$CAS14 = 0;
                				  }
                   }
  			      ?>
        			 <td><?=$CAS14;?></td>
        			<?php
					if($CAS14 <= 5)
						$CAS14=100;
               $data3 .= '"'.$CAS14.'",';
                    }
                    $data3 = trim($data3,",");
              ?>
          </tr>
          <tr>
            <td style="background-color:black;color:#fff;">Taux <br> Av 16H</td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
            				foreach ($result as $key) {
                				  if ($i==$key['j']) {
                				  $CAS16 = number_format($key['CAS16']/$key['total']*100,0,',','');
                					break;
                				  }else {
                					$CAS16 = 0;
                				  }
                   }
  			      ?>
        			 <td><?=$CAS16;?></td>
        			<?php
                    }
              ?>
          </tr>
          <tr>
            <td style="background-color:black;color:#fff;">Taux <br> Av 18H</td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
            				foreach ($result as $key) {
                				  if ($i==$key['j']) {
                				  $CAS18 = number_format($key['CAS18']/$key['total']*100,0,',','');
                					break;
                				  }else {
                					$CAS18 = 0;
                				  }
                   }
  			      ?>
        			 <td><?=$CAS18;?></td>
              <?php
                     }
              ?>
          </tr>
          <tr>
            <td style="background-color:black;color:#fff;">Taux <br>  global</td>
            <?php for ($i=1; $i <=date('t',strtotime("-1 days")) ; $i++) {
                    foreach ($result as $key) {
                          if ($i==$key['j']) {
                          $global = number_format($key['CAS23']/$key['total']*100,0,',','');
                          break;
                          }else {
                          $global = 0;
                          }
                   }
                   if ($global<20) {
                     $color = "red";
                   }elseif ($global>20 && $global <=50) {
                     $color = "orange";
                   }else {
                     $color = "green";
                   }
              ?>
               <td style="color:<?=$color;?>"><?=$global;?></td>
              <?php
			  if($global <= 5)
				$data4 .= '"'. 100 .'",';
			  else 
				$data4 .= '"'.$global.'",';
                    }
                    $data4 = trim($data4,",");
              ?>
          </tr>
        </table>
      </div>
    </div>
    <div class="row mt-5" style="max-height:40vh;position:relative;bottom:0;">
      <div class="col-6">
        <canvas id="prod" width="100%" height="45vh"></canvas>
      </div>
      <div class="col-6">
        <canvas id="efficace" width="100%" height="45vh"></canvas>
      </div>
    </div>
  </div>
  <script>
    var ctx = document.getElementById("prod").getContext('2d');
      var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [<?=$data1; ?>],
        datasets:
        [
        {
          label: 'Productivité',
          fill:false,
          data: [<?php echo $data2; ?>],
          borderColor: 'green',
        }]
      },
      options: {
        scales: {yAxes: [{ticks:{beginAtZero: true}}]},
        tooltips:{mode: 'index'},
        legend:{display: true, position: 'top', labels: {fontColor: '#000', fontSize: 16}}
      }
    });
    /************************************************************************* */
    var ctxx = document.getElementById("efficace").getContext('2d');
      var myChartt = new Chart(ctxx, {
      type: 'line',
      data: {
        labels: [<?=$data1; ?>],
        datasets:
        [
        {
          label: '16H',
 		      fill:false,
          data: [<?=$data3 ?>],
          borderColor: '#4d4dff',
        },
        {
          label: 'Global',
 		      fill:false,
          data: [<?=$data4 ?>],
          borderColor: '#339933',
        }
        ]
      },
      options: {
        scales: {yAxes: [{ticks:{beginAtZero: true}}]},
        tooltips:{mode: 'index'},
        legend:{display: true, position: 'top', labels: {fontColor: '#000', fontSize: 16}}
      }
    });
							setTimeout(function(){
							  $(location).attr('href', 'performance.php');
							}, 20000);
	
	
	
	
	/*
  //Script de chargement des données de la page de performance globale du mois
  $(document).ready(function(){
    $.ajax({
      url:'chargement.php',
      method:'POST',
      data:{"performance_stati":'OK'},
      success:function(res){
        //console.log(res);
            $('#loading').modal('show');
	          setTimeout(function(){
						$(location).attr('href', 'performance.php');
					}, 5000);        
      },
	error:function(){
		    setTimeout(function(){
      $(location).attr('href', 'production.php');
    }, 500000);
	}
    })
  });*/
  </script>
