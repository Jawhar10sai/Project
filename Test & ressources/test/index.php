<?php
$app = "test";
if (!$app)
  echo "null";
else
  echo "not null";
exit;
?>
<?php
$arrayName = array();
while (count($arrayName) <= 599) {
  $number =  rand(12000000, 14000000);
  if (in_array($number, $arrayName)) {
    continue;
  } else {
    $arrayName[] = $number;
  }
}
foreach ($arrayName as $key => $value) {
  echo $value . '<br>';
}

echo count($arrayName);
exit;


#echo date('2020-1-15','d');
#echo strtotime('2020-1-15','d');
#echo strtotime('d','2020-1-15');
$timestamp = strtotime('2009-10-22');

$day = date('d', $timestamp);
echo $day . '<br>';
var_dump($day);
$delais = 2;

$stop_date = '2019-12-31';
echo 'date before day adding: ' . $stop_date;
$stop_date = date('d/m/Y', strtotime($stop_date . ' +' . $delais . ' day'));
echo 'date after adding 1 day: ' . $stop_date;
exit;
?>
<img class="north" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSGPgQ8k88yaWVPRytT957hKLV-89QmZtkZc44q45TEDdqe9sKwqg">
<input type="button" value="click me">
<style media="screen">
  .north {
    transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    /* IE 9 */
    -webkit-transform: rotate(0deg);
    /* Safari and Chrome */
  }

  .west {
    transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    /* IE 9 */
    -webkit-transform: rotate(90deg);
    /* Safari and Chrome */
  }

  .south {
    transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    /* IE 9 */
    -webkit-transform: rotate(180deg);
    /* Safari and Chrome */
  }

  .east {
    transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    /* IE 9 */
    -webkit-transform: rotate(270deg);
    /* Safari and Chrome */
  }
</style>
<script src="jquery.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $('input').click(function() {
    var img = $('img');
    if (img.hasClass('north')) {
      img.attr('class', 'west');
    } else if (img.hasClass('west')) {
      img.attr('class', 'south');
    } else if (img.hasClass('south')) {
      img.attr('class', 'east');
    } else if (img.hasClass('east')) {
      img.attr('class', 'north');
    }
  });
</script>

<?php
exit;
/*----------------------------------------------------------- Local ----------------------------------------------------------------*/
#$serverName = "SG-SI-CPSI-03";
#$connectionInfo = array( "Database"=>"testDB");
/*----------------------------------------------------------- 29 ----------------------------------------------------------------*/
$serverName = "100.64.10.29";
$connectionInfo = array("Database" => "VEXINITIALRecette", "UID" => "j.hassou", "PWD" => "H@$$$$$1542");
/*----------------------------------------------------------- PRA ----------------------------------------------------------------*/
#$serverName = "10.110.1.10";
#$connectionInfo = array( "Database"=>"VEXINITIAL", "UID"=>"J.HASSOU", "PWD"=>"H@$$$$$1542");

$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn) {
  #echo "Connection established.<br />";
  /*################################ SELECTION ##################################*/
  #$sql = "SELECT * from test";
  $sql = "SELECT TOP 10 * from courrier order by SAISIE_DAT DESC";
  #$sql = "SELECT * from intervient where COURRIER_ID in (SELECT COURRIER_ID from courrier where COURRIER_NUM =?) --order by SAISIE_DAT DESC";
  #$params = array('E00003478');
  #$stmt = sqlsrv_query( $conn, $sql,$params);
  $stmt = sqlsrv_query($conn, $sql);
  if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
  } else {
?>
    <select name="id_courrier" id="id_courrier">
      <option value=""></option>
      <?php
      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      ?>
        <!--<option value="<?php#$row['nom'];?>"><?php#$row['nom'];?></option>-->
        <option value="<?= $row['COURRIER_ID']; ?>"><?= $row['COURRIER_NUM']; ?></option>
      <?php
      }
      ?>
    </select>
    <div class="result">

    </div>
<?php
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
} else {
  echo "Connection could not be established.<br />";
  die(print_r(sqlsrv_errors(), true));
}
#exit;
?>
<script src="jquery.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#id_courrier').on('change', function() {
      $.ajax({
        url: 'getdata.php',
        method: 'post',
        data: {
          'id_c': $(this).val()
        },
        success: function(res) {
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