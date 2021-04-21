 <?php
  require_once('txheads.php');
  include_once "gestion/control_utilisateur.php";
  #$donnees = file_get_contents("excel_declaration.json");
  #$list_dec = json_decode($donnees,true);
  $consultation = 'active';
  ?>
 <style media="screen">
   .btn {
     padding: 8px 4px 8px 1px;
   }

   #btnExport {
     padding: 10px 40px;
     font-size: 0.9em;
   }
 </style>
 <title>LVE - Consultation</title>
 <?php include_once "includes/lve_navbar.php"; ?>
 <!--###################################################################################-->
 <div class="container-fluid" style="margin-top:80px;">
   <div class="row">
     <div class="col-12">
       <div class="card">
         <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
           <h4><b>Recherche multicritère</b></h4>
         </div>
         <div class="card-body">
           <form id="consult-form" action="" method="post" autocomplete="off">
             <div class="form-row">
               <div class="form-group col-md-4">
                 <label for="">Numéro de declaration:</label>
                 <input type="text" class="form-control" name="num" value="<?php if (isset($_POST['num'])) {
                                                                              echo $_POST['num'];
                                                                            } ?>">
               </div>
               <div class="form-group col-md-4">
                 <label for="">De:</label>
                 <input type="date" class="form-control" name="dat" value="<?php if (isset($_POST['dat'])) {
                                                                              echo $_POST['dat'];
                                                                            } ?>">
               </div>
               <div class="form-group col-md-4">
                 <label for="">À:</label>
                 <input type="date" class="form-control" name="datt" value="<?php if (isset($_POST['datt'])) {
                                                                              echo $_POST['datt'];
                                                                            } ?>">
               </div>
             </div>
             <div class="form-row">
               <div class="form-group col-md-4">
                 <label for="">Ville :</label>
                 <input type="text" class="form-control" name="vil" id="villerech" value="<?php if (isset($_POST['vil'])) {
                                                                                            echo $_POST['vil'];
                                                                                          } ?>">
               </div>
               <div class="form-group col-md-4">
                 <label for="">Client Code/Nom:</label>
                 <input type="text" class="form-control" name="cod" value="<?php if (isset($_POST['cod'])) {
                                                                              echo $_POST['cod'];
                                                                            } ?>">
               </div>
               <div class="form-group col-md-4">
                 <label for="">Numéro de BL :</label>
                 <input type="text" class="form-control" name="bl" value="<?php if (isset($_POST['bl'])) {
                                                                            echo $_POST['bl'];
                                                                          } ?>">
               </div>
             </div>
             <div class="text-center">
               <input type="hidden" name="chercher" value="">
               <button class="btn btn-success col-4 btn-lve" id="btn-chercher" type="submit"> <span class="fa fa-search"></span> Chercher</button>
             </div>
           </form>
         </div>
       </div>
       <div class="card">
         <div class="card-header" style="border-radius:  0.5rem 0.5rem 0 0;">
           <h4> <b>Liste des déclarations</b> </h4>
         </div>
         <div class="card-body">
           <table class="table col-xs-2 table-bordered" id="liste_declarations">
             <thead class="table-secondary">
               <tr>
                 <td class="text-center">En savoir plus</td>
                 <td class="text-center">Numéro</td>
                 <td>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td class="text-center">Colis</td>
                 <td>Valeur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <?php
                  if ($nom_d_utilisateur == 'Sisal Maroc') {
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
             <tbody id="consult">

             </tbody>
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
           <form action="Exportation_Excel" method="post">
             <button type="submit" id="btnExport" name='export_declaration' value="Export to Excel" class="btn btn-success btn-lve"><i class="fas fa-file-excel"></i> Exporter vers Excel</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
 <?php include_once "includes/lve_footer.php"; ?>

 <script type="text/javascript">
   $('#consult-form').on('submit', function(event) {
     event.preventDefault();
     $.ajax({
       url: 'gestion/prep_declaration.php',
       method: 'POST',
       data: $('#consult-form').serialize(),
       beforeSend: function() {
         $('#btn-chercher').prop('disabled', true);
         $('#btn-chercher').html('<img src="images/lightbox-ico-loading.gif"/>');
       },
       success: function(res) {
         $('#consult').html(res);
         $('#btn-chercher').prop('disabled', false);
         $('#btn-chercher').html('<span class="fa fa-search"></span> Chercher');
         try {
           console.log(res);
         } catch (e) {
           $('#liste_declarations').DataTable({
             "language": {
               "lengthMenu": "Affichage _MENU_ pages",
               "zeroRecords": "Pas d'elements",
               "info": "Affichage de _PAGE_ of _PAGES_",
               "infoEmpty": "Pas d'elements",
               "infoFiltered": "(filtered from _MAX_ total records)",
               "search": "Recherche",
               "paginate": {
                 "previous": "Précédent",
                 "next": "Suivant"
               }
             }
           });
         }
       }
     });
   });
   $.ajax({
     url: 'gestion/prep_declaration.php',
     success: function(res) {
       $('#consult').html(res);
       $('#liste_declarations').DataTable({
         "language": {
           "lengthMenu": "Affichage _MENU_ pages",
           "zeroRecords": "Pas d'elements",
           "info": "Affichage de _PAGE_ of _PAGES_",
           "infoEmpty": "Pas d'elements",
           "infoFiltered": "(filtered from _MAX_ total records)",
           "search": "Recherche",
           "paginate": {
             "previous": "Précédent",
             "next": "Suivant"
           }
         }
       });
     }
   });


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
     source: liste
   });
 </script>