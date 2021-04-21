<?php
require_once('txheads.php');
  if (isset($_GET['numero'])) {
    $numero = $_GET['numero'];
  }
  $decsimp = $conn->query("SELECT * FROM `vImpression` WHERE `numero`='$numero'");
   foreach ($decsimp as $decimp){
    for ($i=1; $i <= (int)$decimp['colis']; $i++) {
 ?>
 <div id="impr">
   INPUT OFF<br>
   VERB OFF<br>
   INPUT ON<br>
   OPTIMIZE "BATCH"   ON<br>
   PP234,190:AN7<br>
   BARSET "CODE128B" ,2,1,2,102<br>
   PB CHR$(128);"<?=($decimp['numero'].'0'.($i).'0'.$decimp['colis']);?>"<br>
   PP234,93:NASC 8<br>
   FT "CG Times Bold"<br>
   FONTSIZE 26<br>
   FONTSLANT 0<br>
   PT "<?=$decimp['numero']?>"<br>
   PP15,440:AN1<br>
   PL743,3<br>
   PP15,200:PL743,3<br>
   PP15,319:PL743,3<br>
   PP10,403:AN7<br>
   FT "Andale Mono Bold",14,0,82<br>
   PT "<?php echo $decimp['NomDest'];?>"<br>
   PP10,291:AN7<br>
   FT  "Andale Mono Bold" ,18,0,73<br>
   PT "<?php echo $villes->IDVille($decimp['villeDest']);?>"<br>
   PP490,470:FT "Univers" ,7,0,158<br>
   PT  "Date :"<br>
   PP580,475:FT  "Univers"<br>
   FONTSIZE 10<br>
   FONTSLANT 0<br>
   PT "<?=$decimp['date'];?>"<br>
   PP490,291:FT "Andale Mono Bold"  ,16,0,200<br>
   PT  "0<?=$i;?>/0<?=$decimp['colis'];?>"<br>
   PP480,320:AN1<br>
   DIR2<br>
   PL120,3<br>
   LAYOUT RUN<br>
   PF<br>
   PRINT KEY OFF<br>
 </div>
 <script type="text/javascript">
/* $(document).ready(function(){
   var myPrintContent = document.getElementById('impr');
   var myPrintWindow = window.open('window.html', 'imprimer', 'left=300,top=100,width=400,height=400');
   myPrintWindow.document.write(myPrintContent.innerHTML);
   myPrintWindow.document.getElementById('impr').style.display='none';
   myPrintWindow.document.close();
   myPrintWindow.focus();
   myPrintWindow.print();
   myPrintWindow.close();
   return false;
 });*/
 window.print();
</script>
<?php
}
}
?>

  </body>
</html>
<?php
mysqli_free_result($decsimp);
?>
