<?php
require_once "../assets/TCPDF-master/tcpdf.php";
require_once "../gestion/control_utilisateur.php";
#require_once "../gestion/classes/conftaxDB.php";
if (isset($_GET['numero'])) {
  $declarations = $client_lve->MaDeclaration($_GET['numero']);
  if ($declarations) {
    $sous_client = $client_lve->MonClientParID($declarations->client2_id);
    $adresses = Adresses::TrouverAdresse($declarations->id_adres);
    $villes = Villes::TrouverVille($adresses->id_ville);
    for ($i = 1; $i <= $declarations->colis; $i++) {
?>
      <div id="impr">
        INPUT OFF<br>
        VERB OFF<br>
        INPUT ON<br>
        OPTIMIZE "BATCH" ON<br>
        PP234,190:AN7<br>
        BARSET "CODE128B" ,2,1,2,102<br>
        PB CHR$(128);"<?= ($declarations->numero . '0' . ($i) . '0' . $declarations->colis); ?>"<br>
        PP234,93:NASC 8<br>
        FT "CG Times Bold"<br>
        FONTSIZE 26<br>
        FONTSLANT 0<br>
        PT "<?= $declarations->numero; ?>"<br>
        PP15,440:AN1<br>
        PL743,3<br>
        PP15,200:PL743,3<br>
        PP15,319:PL743,3<br>
        PP10,403:AN7<br>
        FT "Andale Mono Bold",14,0,82<br>
        PT "<?= $sous_client->NOM; ?>"<br>
        PP10,291:AN7<br>
        FT "Andale Mono Bold" ,18,0,73<br>
        PT "<?= $villes->VILLE_LIB; ?>"<br>
        PP490,470:FT "Univers" ,7,0,158<br>
        PT "Date :"<br>
        PP580,475:FT "Univers"<br>
        FONTSIZE 10<br>
        FONTSLANT 0<br>
        PT "<?= $declarations->date; ?>"<br>
        PP490,291:FT "Andale Mono Bold" ,16,0,200<br>
        PT "0<?= $i; ?>/0<?= $declarations->colis; ?>"<br>
        PP480,320:AN1<br>
        DIR2<br>
        PL120,3<br>
        LAYOUT RUN<br>
        PF<br>
        PRINT KEY OFF<br>
      </div>
      <script type="text/javascript">
        window.print();
        setTimeout(function() {
          window.close();
        }, 1000);
        //window.onfocus=function(){ window.close();}
      </script>
<?php
    }
  }
} else {
  echo "ERREUR";
}
?>