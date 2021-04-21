 <?php
require_once('txheads.php');
if (isset($_SESSION['user_id'])){
  $cllves = $clients->CurrentUser($_SESSION['user_id']);
  if (isset($_POST['chercher'])) {
    if (!empty($_POST['vil']) || !empty($_POST['num']) || !empty($_POST['cod']) || !empty($_POST['dat']) || !empty($_POST['bl'])) {
     $munr =  $_POST['num'];
      $datt = $_POST['dat'];
      $ddat =  $_POST['datt'];
      $blll =  $_POST['bl'];
      $user = $_SESSION['user_id'];
      if (isset($_POST['vil'])) {
          $vil = $_POST['vil'];
          $vill = $adresses->AdresseVille($villes->VilleID($vil));
      }else{
        $vill="";
      }
  $where = "WHERE 1=1 ";
   if (!empty($munr)) {
      $where .= " and `numero` LIKE '%$munr%'";
    }
    if (!empty($datt) ) {

      $where .= " and `date` between '$datt' and '$ddat'";
    }

    if (!empty($_POST['cod'])) {
      $codd =  $_POST['cod'];
      $where .= " AND (`NOM` LIKE '$codd%' OR `CLIENT_COD` LIKE '$codd')";
    }

    if(!empty($blll)  ){
      $where .= " and `BL` LIKE '%$blll%'";
    }
    if (!empty($vil)  ) {
      $where .=" and `ville`='$vil'";
    }
    $where .=" AND `client1_id`=".$user;
    echo ("SELECT DISTINCT * FROM `vdeclaration` $where ORDER BY `date`");
    exit;
    $list_dec = $conn->query("SELECT DISTINCT * FROM `vdeclaration` $where ORDER BY `date`");
  }else
    $list_dec = $declarations->mesDeclars($_SESSION['user_id']);
  }
  else {
    $list_dec = $declarations->mesDeclars($_SESSION['user_id']);
  }

}else {
  header('location: index.php');
}
  ?>

  <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <style media="screen">
     #foot{
       background-color: #ffffff;
       border-radius: 5px;
       border: 1px solid;
     }
     .btn {
         padding: 8px 4px 8px 1px;
     }
     #btnExport {
         padding: 10px 40px;
         background: #499a49;
         border: #499249 1px solid;
         color: #ffffff;
         font-size: 0.9em;
         cursor: pointer;
     }
     </style>
   </head>
   <body style="  background-image: url('images/LOGOSANS150.jpg');
    background-size: 150px 104px;
    background-repeat: repeat;
	/*zoom: 90%;*/">
     <!--###################################################################################-->

     <nav class="navbar navbar-expand-lg navbar-inverse fixed-top navbar-dark" style="background-color:#a8a8a8;">
            <a class="navbar-brand" href="#"> <img src="images/voielvej.png" height="37.453" width="114" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                    <a class="nav-link" href="#" style="font-size:18px;">Consultaion</a>
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="declaration.php" style="font-size:18px;">Déclaration <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="track.php" style="font-size:18px;">Suivi colis</a>
                  </li>
                  <?php if ($_SESSION['typuser']=="clientlve"): ?>
                    <li class="nav-item">
                       <a class="nav-link " href="agences.php" style="font-size:18px;">Mes sessions</a>
                    </li>
                  <?php endif; ?>
                  <!--<li class="nav-item">
                     <a class="nav-link" href="" style="font-size:18px;">Facturation</a>
                  </li>-->
				 <li class="nav-item">
                    <a class="nav-link " href="tracking.php" style="font-size:18px;">Suivis des envois</a>
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="Reclamation/" style="font-size:18px;">Réclamations</a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right" style=" padding: 5px;border-radius:15px;background-color: #CCCCCC;">
                 <li class="nav-item">
                   <a href="panierramass.php" style="color:red;"><img src="images/cart.png" width="25" height="25" alt=""><span style="padding-left: 15px;color:#545454;font-size:25px;"><?=$_SESSION['countcart'];?></span></a>
                 </li>
               </ul>
               <ul class="nav navbar-nav navbar-right col-1">
                 <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?=$_SESSION['usernom'];?>
                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="profile.php"><span><i class="fas fa-user"></i></span>Profile</a>
                     <a class="dropdown-item" href="deco.php"><span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>Deconnecter</a>
                   </div>
                 </li>
               </ul>
            </div>
         </nav>
         <div class="container-fluid" style="margin-top:80px;">
           <div class="row">
             <div class="col-12">
               <div class="card">
                 <div class="card-header">
                   <h4><b>Recherche multicritère</b></h4>
                 </div>
                 <div class="card-body">
                   <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" autocomplete="off">
                     <div class="form-row">
                       <div class="form-group col-md-4">
                         <label for="">Numéro de declaration:</label>
                         <input type="text" class="form-control" name="num" value="<?php if (isset($_POST['num'])) {
                           echo $_POST['num'];
                         }?>">
                       </div>
                         <div class="form-group col-md-4">
                           <label for="">De:</label>
                           <input type="date" class="form-control" name="dat" value="<?php if (isset($_POST['dat'])){
                           echo $_POST['dat']; } ?>">
                         </div>
                         <div class="form-group col-md-4">
                           <label for="">À:</label>
                           <input type="date" class="form-control" name="datt" value="<?php if (isset($_POST['datt'])){
                           echo $_POST['datt']; } ?>">
                         </div>
                     </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="">Ville :</label>
                          <input type="text" class="form-control" name="vil" id="villerech" value="<?php if (isset($_POST['vil'])){
                          echo $_POST['vil']; }?>">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="">Code client:</label>
                          <input type="text" class="form-control" name="cod" value="<?php if (isset($_POST['cod'])){
                          echo $_POST['cod']; }?>">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="">Numéro de BL :</label>
                          <input type="text" class="form-control" name="bl" value="<?php if (isset($_POST['bl'])){
                          echo $_POST['bl']; }?>">
                        </div>
                       </div>
                       <div class="text-center">
                         <button class="btn btn-success col-4" name="chercher" type="submit"> <span class="fa fa-search"></span> Chercher</button>
                       </div>
                   </form>
                 </div>
               </div>
               <div class="card" >
                 <div class="card-header">
                    <h4> <b>Liste des déclarations</b> </h4>
                 </div>
                 <div class="card-body">
                   <table class="table col-xs-2 table-bordered" id="liste_declarations">
                     <thead class="table-secondary">
                     <tr>
                       <td class="text-center">Visualiser</td>
                       <td class="text-center">Impression</td>
                       <td class="text-center">Numéro</td>
                       <td>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                       <td class="text-center">Colis</td>
                       <td>Valeur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					   <?php
					   if( $_SESSION['usernom']=='Sisal Maroc'){
					   ?>
					   <td>Code MR</td>
					   <?php
					   }
					   ?>
                       <td class="text-center">Destinataire</td>
                       <td>Livraison&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                       <td class="text-center">Express</td>
                       <td class="text-center">Port</td>
                       <td class="text-center">Courrier</td>
                       <td>Nature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                     </tr>

                     </thead>
                   <?php if (!empty($list_dec)) {
                   foreach ($list_dec as $row_list_dec) {
                     if ($declarations->etatDeclarEncours($row_list_dec['numero'])=='En cours') {
                       $color = 'table-warning';
                     }elseif ($declarations->etatDeclarValide($row_list_dec['numero'])=='Valide') {
                       $color = 'table-success';
                     }else {
                       $color = '';
                     }
                     if ($row_list_dec['express']=="X") {
                       $expr = "Oui";
                     }else {
                       $expr = "Non";
                     }
                     if ($row_list_dec['livraison'] == "D") {
                       $livr = "À domicile";
                     }elseif ($row_list_dec['livraison'] == "p") {
                       $livr = "Points relais";
                     }else {
                       $livr = "En gare";
                     }
                     if ($row_list_dec['courrier_typ'] == "M") {
                       $typcr = "Messagerie";
                     }elseif ($row_list_dec['courrier_typ'] == "25") {
                       // code...
                       $typcr = "Affrêtement 25T";
                     }elseif ($row_list_dec['courrier_typ'] == "14") {
                         $typcr = "Affrêtement 14T";
                     }elseif ($row_list_dec['courrier_typ'] == "5") {
                         $typcr = "Affrêtement 5T";
                     }elseif ($row_list_dec['courrier_typ'] == "U") {
                         $typcr = "Affrêtement utilitaires";
                     }
                     if ($row_list_dec['port'] == "P") {
                       $prt = "Payé";
                     }else{
                       $prt = "Du";
                     }
                     ?>
                     <tr class="<?php echo $color; ?>">
                       <td>
                         <button class="btn btn-info btn-sm" id="visuali"  data-toggle="modal" data-target="#supmod-<?= $row_list_dec['numero']; ?>">Consulter</button>

                       <!--#######################################################################################################-->
                         <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?= $row_list_dec['numero']; ?>">
                         <div class="modal-dialog modal-lg" role="document">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title">Consultation</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="modal-body">
                                 <div class="row">
                                   <label for=""class="col-5">Numéro de déclaration</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= $row_list_dec['numero']; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Date</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?=date('d/m/Y',strtotime($row_list_dec['date'])); ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Colis</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?=$row_list_dec['colis']; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Poids</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?=$row_list_dec['poids']; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Valeur</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= number_format($row_list_dec['valeur'], 2, ',', ' '); ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Destinataire</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= strtoupper($clients->clientID($row_list_dec['client2_id'])); ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Livraison</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= $livr;?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Express</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?=$expr;?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Port</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= $prt; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Courrier</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= $typcr; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Nature</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= $row_list_dec['nature']; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Espèces</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= number_format($row_list_dec['Espece'], 2, ',', ' '); ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Chèque</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= number_format($row_list_dec['Cheque'], 2, ',', ' '); ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Traite</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= number_format($row_list_dec['Traite'], 2, ',', ' '); ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">BL</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= $row_list_dec['BL']; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Statut</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= $row_list_dec['statut']; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Commentaire</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?= $row_list_dec['commentaire']; ?></label>
                                 </div>
                                 <div class="row">
                                   <label for=""class="col-5">Adresse</label>
                                   <label for=""class="col-1">:</label>
                                   <label for=""class="col-6"><?=ucfirst($adresses->IDAdresse($row_list_dec['id_adres']));?></label>
                                 </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                       </td>
                       <td>
                          <button type="button" class="btn btn-sm" style="color:white; background-color: #0053ad;" name="button" onClick="javascript:window.open('impetq.php?numero=<?= $row_list_dec['numero']; ?>','_blank','status=yes,resizable=yes,top=0,left=0,width=240,height=130');">Etiquettes</button>
                           <button type="button" class="btn btn-sm" style="color:white; background-color: #0053ad;" name="button" onClick="javascript:window.open('imp.php?numero=<?= $row_list_dec['numero']; ?>','_blank','status=yes,resizable=yes,top=0,left=0');">Déclarations</button>
                       </td>
                       <td><?= $row_list_dec['numero']; ?></td>
                       <td><?=date('d/m/Y',strtotime($row_list_dec['date'])); ?></td>
                       <td class="text-center"><?= $row_list_dec['colis']; ?></td>
                       <td class="text-right"><?= number_format($row_list_dec['valeur'], 2, ',', ' '); ?></td>
					   <?php
					   if( $_SESSION['usernom']=='Sisal Maroc'){
					   ?>
					   <td class="text-right"><?= $clients->IDtoCOD($row_list_dec['client2_id']); ?></td>
					   <?php
					   }
					   ?>
                       <td><?= strtoupper($clients->clientID($row_list_dec['client2_id'])); ?></td>
                       <td><?= $livr; ?></td>
                       <td><?= $expr;?></td>
                       <td><?= $prt; ?></td>
                       <td><?= $typcr; ?></td>
                       <td><?= $row_list_dec['nature']; ?></td>
                     </tr>
                     <?php
                   }
                 }if ($list_dec->num_rows==0) {
                   ?>
                   <tr>
                     <td colspan="12" class="text-center">Pas de resultat!</td>
                   </tr>
                   <?php
                 } ?>
               </table>
               <div class="row" style="position:relative;">
                 <div style="padding:3px;height:50px;" class="table-success col-1">
                 </div><label class="h5" style="position: relative;  top: 16px;margin-left:5px;">Déclarations validées</label>
               </div>
               <div class="row" style="position:relative;">
                 <div style="padding:3px;height:50px;" class="table-warning col-1">
                 </div><label class="h5" style="position: relative;  top: 16px;margin-left:5px;">Déclarations En cours</label>
               </div>


           </div>

                   <div class="btn">
                       <form action="exportationdec.php" method="post">
                           <button type="submit" id="btnExport"
                               name='export' value="Export to Excel"
                               class="btn btn-info">Exporter vers Excel</button>
                       </form>
                   </div>
         </div>
       </div>
     </div>
   </div>
   <hr>
   <div class="container" id="foot">
     <div class="row">
        <div class="text-center ">
           <p><span style="font-size: 8pt;">LA VOIE EXPRESS 2 S.A au Capital 23.077.000,00 Dhs - 19, Rue Abou Bkr Ibnou Koutia, A&icirc;n Seba&acirc; &ndash; Casablanca</span><br /><span style="font-size: 8pt;">RC 95457 &ndash; IF 01601949 &ndash; Patente 37951124 &ndash; CNSS 2640961 &ndash; ICE 001526339000073</span><br /><span style="font-size: 8pt;">T&eacute;l : 05 22 34 43 16 / Fax : 0522344264 </span><br /><span style="font-size: 8pt;">Site : <a href="http://www.lavoieexpress.com">www.lavoieexpress.com</a> &ndash; E-mail ; client@lavoieexpress.ma </span><br /><span style="font-size: 8pt;">La valeur d&eacute;clar&eacute;e est de cent (100 Dhs) en cas de non d&eacute;claration de valeur. Les Clauses et conditions g&eacute;n&eacute;rales de transport Marchandise et Messagerie sont consultables aupr&egrave;s de LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet. </span></p>
        </div>
     </div>
   </div>
<script type="text/javascript">
var liste = [
  "AFOURAR",
  "AGADIR",
  "AGDZ",
  "AHFIR",
  "AIN ATIQ",
  "Ain Atiq",
  "Ain Derrij",
  "AIN HARROUDA",
  "AIN SEBAA",
  "AIN TAOUJTATE",
  "Ain Zaura",
  "AIT BAHA",
  "AIT ISHAQ",
  "AIT MELLOUL",
  "AIT MILK",
  "AIT MILK",
  "AIT OURIR",
  "AL GHARB",
  "AMZMIZ",
  "ANZA",
  "AOUFOUS",
  "AOURIR",
  "ARBAOUA",
  "ARFOUD",
  "ASILAH",
  "ATTAOUIA",
  "AZEMMOUR",
  "AZILAL",
  "AZROU",
  "AZROU SUD",
  "BAB BERRED",
  "BEJAAD",
  "BELKSIRI",
  "BEN GUERIR",
  "BEN HMAD",
  "BEN SERGAO",
  "BEN SLIMANE",
  "BEN TAYEB",
  "BENI BOUAYACH",
  "BENI HDIFA",
  "BENI MELLAL",
  "BENI NSAR",
  "BERKANE",
  "BERRECHID",
  "BIOUGRA",
  "BIR JDID",
  "BOUARFA",
  "BOUFEKRANE",
  "BOUIZAKARNE",
  "BOUJDOUR",
  "BOUJNIBA",
  "BOULMANE",
  "BOUMALNE DADES",
  "BOUMIA",
  "BOUSKOURA",
  "BOUZNIKA",
  "CASABLANCA",
  "CHAOUEN",
  "CHEFCHAOUEN",
  "CHEMAIA",
  "CHICHAOUA",
  "DAKHLA",
  "DAR EL GUEDDARI",
  "DCHEIRA",
  "DEMNATE",
  "DEPOT BENI MELLAL",
  "DEPOT TANGER",
  "DERB GHALEF",
  "DRIOUCH",
  "EL AIOUN",
  "EL GARA",
  "EL HAJEB",
  "EL HOCEIMA",
  "EL JADIDA",
  "El Mudzine",
  "ERRACHIDIA",
  "ESSAOUIRA",
  "ESSMARA",
  "FES",
  "FIGUIG",
  "FKIH BEN SALEH",
  "FNIDEQ",
  "GHAFSAI",
  "GUELMIM",
  "GUERCIF",
  "GUISSER",
  "GUOULMIMA",
  "HAD BENI RZINE",
  "HAD KOURT",
  "HAD SOUALEM",
  "IFRANE",
  "IGHREM",
  "IMINTANOUTE",
  "IMMOUZER",
  "IMZOUREN",
  "INZEGANE",
  "ITZER",
  "JEMAA SHAIM",
  "JERADA",
  "JORF EL MELHA",
  "KARIAT AREKMAN",
  "KARIAT BA MHAMED",
  "KASBAT TADLA",
  "KELAAT MEGOUNA",
  "KELAAT SRAGHNA",
  "KENITRA",
  "KETAMA",
  "KHEMIS AIT AMIRA",
  "KHEMISS ZEMAMRA",
  "KHEMISSET",
  "KHENIFRA",
  "KHMISS OULAD AYAD",
  "KHOURIBGA",
  "KLEAA",
  "KSAR EL KEBIR",
  "KSIBIA",
  "KSSIBA",
  "LAAYOUNE",
  "LABHALIL",
  "LAKHYAYTA",
  "LALLA MAYMOUNA",
  "LAOUAMRA",
  "LARACHE",
  "LAYOUN",
  "Lissasfa IAM",
  "Logiprod",
  "MARRAKECH",
  "MARTIL",
  "MASSA",
  "MECHRAA BEL KSIRI",
  "MEDIAQ",
  "MEKNES",
  "MIDAR",
  "MIDELT",
  "MISSOUR",
  "MOHAMMADIA BIS",
  "MOHAMMEDIA",
  "MONT AROUI",
  "MRIRT",
  "NADOR",
  "NOUASSER",
  "OUALIDIA",
  "OUAOUIZERTH",
  "OUARZAZATE",
  "OUAZZANE",
  "OUED AMLIL",
  "OUED ZEM",
  "OUISLANE",
  "OUJDA",
  "OULAD MBAREK",
  "OULAD ZMAM",
  "OULED AYAD",
  "OULED BERHIL",
  "OULED LAMRAH",
  "OULED TEIMA",
  "OULED ZIDOUH",
  "OULED ZMAM",
  "OULMES",
  "OURIKA",
  "OUTAT EL HAJ",
  "RABAT",
  "Rabat Centre",
  "Rabat océan",
  "RIBAT EL KHEIR",
  "RICH",
  "RISSANI",
  "ROMMANI",
  "SAFI",
  "SAIDIA",
  "SALE",
  "SEBT GZOULA",
  "SEBT NEMMA",
  "SEFROU",
  "SELOUANE",
  "SETTAT",
  "SIDI ALLAL BAHRAOUI",
  "SIDI BENNOUR",
  "SIDI IFNI",
  "SIDI KACEM",
  "SIDI SLIMANE",
  "SIDI SMAIL",
  "SIDI YAHIA GHARB",
  "SIDI YAHYA ZAER",
  "SKHIRAT",
  "SMARA",
  "SMIMOU",
  "SOUK LARBAA",
  "SOUK SEBT",
  "SOUK TLET GHARB",
  "Station Shell OumRrbii",
  "Tafilalt",
  "Tafraout",
  "TAHLA",
  "TALIOUINE",
  "TAMANAR",
  "TAMELLALTE",
  "TANGER",
  "TANGER MED",
  "TANTAN",
  "TAOUNATE",
  "TAOURIRT",
  "TARFAYA",
  "TARGUIST",
  "TAROUDANTE",
  "TATA",
  "TAZA",
  "TEMARA",
  "TETOUAN",
  "TIFELT",
  "TIGHSSALINE",
  "TIKIOUINE",
  "TINGHIR",
  "TINJDAD",
  "TISSA",
  "TIT MELLIL",
  "TIZNIT",
  "TLAT OULAD",
  "TNINE LAGHYAT",
  "YOUSSOUFIA",
  "ZAGOURA",
  "ZAIDA",
  "ZAIO"

];

$('#villerech').autocomplete({
  source : liste
});

$(document).ready(function() {
    $('#liste_declarations').DataTable( {
        "language": {
            "lengthMenu": "Affichage _MENU_ pages",
            "zeroRecords": "Pas d'elements",
            "info": "Affichage de _PAGE_ of _PAGES_",
            "infoEmpty": "Pas d'elements",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":"Recherche",
            "paginate": {
                "previous": "Précédent",
                "next": "Suivant"
                }
        }
    } );
} );
</script>

   </body>
 </html>
