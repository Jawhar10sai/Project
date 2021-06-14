<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>Ramex</title>

     <!-- Custom fonts for this template-->
     <link href="{{asset('/customAuth/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('customAuth/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!--my css-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!--cdn datatable-->
     <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeresprdv')}}">
    <div class="sidebar-brand-icon" style="margin-top:30px">
        <i class="fas fa-user-tie"></i>
    </div>
    <div class="sidebar-brand-text mx-3" style="margin-top:30px">{{ Auth::user()->profil }}</div>
</a>

  <!-- Divider -->
 
  

  <!-- Nav Item - Dashboard -->
  <li class="nav-item " style="margin-top:70px">
    <a class="nav-link" href="{{route('homeresprdv')}}">
       <i class="fas fa-home" style="font-size:20px"></i>
       <span style="font-size:17px">Accueil</span>
    </a>
 </li>

 <li class="nav-item " >
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="false" aria-controls="collapseTwo">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
       <span style="font-size:15px">Générer la feuille</span>   
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a id="zero_ram" class="collapse-item" href="#">Zéro ramassage</a> 
             <a id="tac_ram" class="collapse-item" href="{{route('tacramview')}}">3 à 5 ramassage</a>
             <a id="f_passage" class="collapse-item" href="{{route('passageview')}}">Passage</a>
             <a id="f_globale" class="collapse-item" href="{{route('globstatsview')}}">Globale</a>
        </div>
    </div>
 </li>

 <li class="nav-item active " >
    <a class="nav-link"  href="{{route('showRespRDVCommands')}}">
       <i class="fas fa-fw fa-cog" style="font-size:18px"></i>
       <span style="font-size:14px">Liste des demandes</span>
    </a>

 </li>

<!-- Nav Item - Utilities Collapse Menu 
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <span>Chauffeurs Livreurs</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chauffeurs:</h6>
            <a class="collapse-item" href="utilities-color.html"><i class="fas fa-plus" style="margin-right:5px"></i>Ajouter un chauffeur</a>
            <a class="collapse-item" href="utilities-border.html"><i class="fas fa-pen" style="margin-right:5px"></i>Modifier un chauffeur</a>
            <a class="collapse-item" href="utilities-animation.html"><i class="fas fa-trash" style="margin-right:5px"></i>Supprimer un chauffeur </a>
            <a class="collapse-item" href="utilities-other.html"><i class="fas fa-search" style="margin-right:5px"></i>Chercher un chauffeur</a>
        </div>
    </div>
</li> -->

</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-blue topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search 
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="search" id="searchbar" class="form-control bg-light border-0 small" placeholder="Barre de recherche..." 
                                aria-label="Search" aria-describedby="basic-addon2" autofocus style="border: solid 1px">
                        </div>
                    </form>-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('project/public/photos/'.Auth::user()->image) }}" >

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="min-height:79%">
                <!--my table begin-->

<div id="filter" class="container-fluid " >               

<h5>Filtrer par:</h5>
<div class="row">


 
    <div class="col-md-4">
        <h7 class="font-weight-bold">Date</h7>
        <div class="form-group row">
           <label for="threedaysago" class="col-sm-2 col-form-label">Du:</label>
        <div class="col-sm-10">
        <input type="date" id="threedaysago" class="form-control"  value="">
        </div>
        </div>
        <div class="form-group row">
           <label for="currentdate" class="col-sm-2 col-form-label">Au: </label>
        <div class="col-sm-10">
        <input type="date" id="currentdate" class="form-control" value="">
        </div>
        </div>
    </div>

    <div class="col-md-4" style="padding-left:200px; font-size:17px" >
        <h7 class="font-weight-bold">Etat</h7>
        <div class="form-check">
        <input class="form-check-input etat_checkbox" name="etat" type="checkbox" id="Non-affectees" value="Nouvelle Demande">
        <label class="form-check-label" for="Non-affectees">
        Non affectées
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input etat_checkbox" name="etat" type="checkbox" id="affectees" value="affectées">
        <label class="form-check-label" for="affectees">
        affectées
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input etat_checkbox" name="etat" type="checkbox" id="Annulees" value="Annulées">
        <label class="form-check-label" for="Annulees">
        Annulées
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input etat_checkbox" name="etat" type="checkbox" id="Demandees" value="Demandées">
        <label class="form-check-label" for="Demandees">
        Demandées
        </label>
        </div>  

     <!--   <button id="apply_filter"> Filtrer </button> -->
    </div>


    <div class="col-md-4">
        <h7 class="font-weight-bold">Agence/secteur</h7>
        <div class="form-group row">
           <label for="" class="col-md-4 col-form-label">Agence:</label>
        <div class="col-md-8">
        <select class="form-control" id="agence">
        <option selected disabled>--SELECT AGENCE--</option> 
       
      </select>
        </div>
        </div>
        <div class="form-group row">
           <label for="" class="col-md-4 col-form-label">Secteur:</label>
        <div class="col-md-8">
        <select class="form-control" id="secteur">
        <option selected disabled>--SELECT SECTEUR--</option>
       
      </select>
        </div>
        </div>
    </div>


    
 </div>
</div><!--end container-->


                <div class="row">
            <div class="col-md-12">
                <div class="form-content">    

           <h3 class="text-center">Liste des demandes</h3>

           <!--searchbar-->
           <div class="container input-group rounded" style="margin-bottom:7px;padding-left:80px;padding-right:80px">
             <input type="search" id="secsearchbar" class="form-control rounded" placeholder="Que cherchez-vous ? " aria-label="Search" aria-describedby="search-addon"/>
             <button class="btn btn-primary" style="border-top-right-radius:20px;border-bottom-right-radius:20px;border-top-left-radius:0px;border-bottom-left-radius:0px"  disabled>
               <i class="fas fa-search"></i>
             </button>
           </div>
                 


           <form id="frm" action='' method="GET" enctype="multipart/form-data">
            @csrf
                 <div class="row justify-content-between">
                 <div class="col-md-2">
                    <button type="button" id="export_btn" class="btn btn-success" style="margin-bottom:5px"><img src="{{asset('customAuth/images/excel.ico')}}" alt="" style="width:35px;height:35px">Exporter</button>
                 </div>
                 
                 
                    <div class="ml-auto mr-3" >
                        <a href="#" class="btn btn-primary" id="refresh_btn" ><i class="fa fa-refresh fa-spin" aria-hidden="true" style="margin-right:5px" ></i>Actualiser</a>
                     </div>
               

                 </div>
               
                
           
           <table id="commandTab" class="table table-striped table-bordered" style="width:100%">
           <thead class="thead thead-dark">
             <tr>
             <th >N&deg; Ramassage</th>
             <th >Date Saisie</th>
             <th>Date Demande</th>
             <th>Nom Saisisseur</th>
             <th>Code Client</th>
             <th >Client</th>
             <th>Prescripteur</th>
             <th>Adresse Ramassage</th>
             <th>Etat</th>
             </tr>
             </thead>
             <tbody id="tabcommands">
          
             </tbody>
           </table>

           </form><!--end form-->

           <div class="pagination"></div>
        </div>
        </div>
<!--end of my table-->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ramex 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4"> <img src="{{ asset('customAuth/images/logout.jpg') }}" alt="" style="width:130px;height:130px"></div>
                        <div class="col-md-8" style="padding-top:50px;padding-left:50px"><center><h5>voulez-vous vraiment vous déconnecter ?</h5></center></div>
                    </div>

                    
                     <center>  
                        <a class="btn btn-primary " href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Se Déconnecter') }}</a>
                                            <button class="btn btn-secondary " type="button" data-dismiss="modal">Quitter</button>
                                        </center>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    
                </div>
                
            </div>
        </div>
    </div>
    <!--logout modal end-->





    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('customAuth/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('customAuth/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('customAuth/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('customAuth/js/sb-admin-2.min.js')}}"></script>

    


<!--tooltip jquery-->
<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>


<!--export excel-->
<script>
    $(document).ready(function() {
        $("#export_btn").click(function(){
          var du=$('#threedaysago').val();
          var au=$('#currentdate').val();
          var agence=$('#agence').val();
          var secteur=$('#secteur').val();
  
          var audate=new Date(au);
        audate.setDate( audate.getDate() + 1)
        var dd = audate.getDate();
        var mm = audate.getMonth()+1; //January is 0!
        var yyyy = audate.getFullYear();
  
              if(dd<10) {
                 dd = '0'+dd
               } 
             
              if(mm<10) {
                 mm = '0'+mm
               } 
               
              audate = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
              
        //alert(audate);
  
        var etat = 'initial';
  
        $('.etat_checkbox:checked').each(function(et){
            etat = etat + ',' + $(this).val();
        });
  
        etat = etat.replace('initial,','');
        etat = etat.replace('initial','');
  
  
        var query={
            param_du:du,
            param_au:audate,
            param_agence : agence,
            param_secteur : secteur,
            param_etat : etat
        }
          var url = "{{route('exportExcel')}}?" + $.param(query);
          window.location = url;
       
        });
    });
    </script>

<!--Affichage dans la table-->
<script>
$(document).ready(function(){
    //date range for filtering
            //date systeme
            var today = new Date();
            var threedaysago = new Date(today);
            threedaysago.setDate( threedaysago.getDate() - 3)
            var dd = today.getDate()+1;
            var dd2 = threedaysago.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var mm2 = threedaysago.getMonth()+1; //January is 0!
            var yyyy2 = threedaysago.getFullYear();
          

            if(dd<10) {
               dd = '0'+dd
             } 
             if(dd2<10) {
               dd2 = '0'+dd2
             } 

            if(mm<10) {
               mm = '0'+mm
             } 
             if(mm2<10) {
               mm2 = '0'+mm2
             } 
            

            today = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
            threedaysago = yyyy2 + '-' + mm2 + '-' + dd2; //+ ' 00:00:00';
            var date_range={
                du:threedaysago,
                au:today
            }
    $.get("{{ route('AllCommands') }}",date_range, function(data, response){
                
                for (var i = 0; i < data.length; i++) {
                    if(data[i].etat == "Annulées"){
                        var line='<tr class="'+data[i].id+'" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events" >'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                    } else{
                        var line='<tr class="'+data[i].id+'" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events" >'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                    }
                    $('#tabcommands').append(line);
                }
              
            });
});
</script>


<!--Affichage dans la table apres le filtrage-->
<script>   
$(document).ready(function(){ 

    $('#threedaysago').on('keyup',function(){

        var du=$('#threedaysago').val();
        var au=$('#currentdate').val();
        var agence=$('#agence').val();
        var secteur=$('#secteur').val();

        var audate=new Date(au);
      audate.setDate( audate.getDate() + 1)
      var dd = audate.getDate();
      var mm = audate.getMonth()+1; //January is 0!
      var yyyy = audate.getFullYear();

            if(dd<10) {
               dd = '0'+dd
             } 
           
            if(mm<10) {
               mm = '0'+mm
             } 
             
            audate = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
            
      //alert(audate);

      var etat = 'initial';

      $('.etat_checkbox:checked').each(function(et){
          etat = etat + ',' + $(this).val();
      });

      etat = etat.replace('initial,','');
      etat = etat.replace('initial','');


      var get_data={
          param_du:du,
          param_au:audate,
          param_agence : agence,
          param_secteur : secteur,
          param_etat : etat
      }

        var url_ = "{{ route('AllCommandsAfterFilters') }}";
        $.get(url_, get_data, function(data, response){
            $('#tabcommands').html("");
            
            for (var i = 0; i < data.length; i++) {
                if(data[i].etat == "Annulées"){
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                } else{
                    var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                }
                $('#tabcommands').append(line);
                
            }
            
        });
        
        

    });


    $('#currentdate').on('keyup',function(){

      var du=$('#threedaysago').val();
      var au=$('#currentdate').val();
      var agence=$('#agence').val();
      var secteur=$('#secteur').val();

      var audate=new Date(au);
      audate.setDate( audate.getDate() + 1)
      var dd = audate.getDate();
      var mm = audate.getMonth()+1; //January is 0!
      var yyyy = audate.getFullYear();

            if(dd<10) {
               dd = '0'+dd
             } 
           
            if(mm<10) {
               mm = '0'+mm
             } 
             
            audate = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
            
      //alert(audate);

      var etat = 'initial';

      $('.etat_checkbox:checked').each(function(et){
          etat = etat + ',' + $(this).val();
      });

      etat = etat.replace('initial,','');
      etat = etat.replace('initial','');


      var get_data={
          param_du:du,
          param_au:audate,
          param_agence : agence,
          param_secteur : secteur,
          param_etat : etat
      }

      var url_ = "{{ route('AllCommandsAfterFilters') }}";
      $.get(url_, get_data, function(data, response){
          $('#tabcommands').html("");
    
          for (var i = 0; i < data.length; i++) {
                if(data[i].etat == "Annulées"){
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                } else{
                    var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                }
                $('#tabcommands').append(line);
                
            }
      }); 
    });   


     $('.etat_checkbox').change(function(){

      var du=$('#threedaysago').val();
      var au=$('#currentdate').val();
      var agence=$('#agence').val();
      var secteur=$('#secteur').val();

      var audate=new Date(au);
      audate.setDate( audate.getDate() + 1)
      var dd = audate.getDate();
      var mm = audate.getMonth()+1; //January is 0!
      var yyyy = audate.getFullYear();

            if(dd<10) {
               dd = '0'+dd
             } 
           
            if(mm<10) {
               mm = '0'+mm
             } 
             
            audate = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
            
      //alert(audate);

      var etat = 'initial';

      $('.etat_checkbox:checked').each(function(et){
          etat = etat + ',' + $(this).val();
      });

      etat = etat.replace('initial,','');
      etat = etat.replace('initial','');


      var get_data={
          param_du:du,
          param_au:audate,
          param_agence : agence,
          param_secteur : secteur,
          param_etat : etat
      }

      var url_ = "{{ route('AllCommandsAfterFilters') }}";
      $.get(url_, get_data, function(data, response){
          $('#tabcommands').html("");
    
          for (var i = 0; i < data.length; i++) {
                if(data[i].etat == "Annulées"){
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                } else{
                    var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                }
                $('#tabcommands').append(line);
                
            }
      });
    });  


    $('#agence').change(function(){

       var du=$('#threedaysago').val();
       var au=$('#currentdate').val();
       var agence=$('#agence').val();
       var secteur=$('#secteur').val();

       var audate=new Date(au);
      audate.setDate( audate.getDate() + 1)
      var dd = audate.getDate();
      var mm = audate.getMonth()+1; //January is 0!
      var yyyy = audate.getFullYear();

            if(dd<10) {
               dd = '0'+dd
             } 
           
            if(mm<10) {
               mm = '0'+mm
             } 
             
            audate = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
            
      //alert(audate);

      var etat = 'initial';

      $('.etat_checkbox:checked').each(function(et){
          etat = etat + ',' + $(this).val();
      });

      etat = etat.replace('initial,','');
      etat = etat.replace('initial','');


      var get_data={
          param_du:du,
          param_au:audate,
          param_agence : agence,
          param_secteur : secteur,
          param_etat : etat
      }

       var url_ = "{{ route('AllCommandsAfterFilters') }}";
       $.get(url_, get_data, function(data, response){
           $('#tabcommands').html("");

           for (var i = 0; i < data.length; i++) {
                if(data[i].etat == "Annulées"){
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                } else{
                    var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                }
                $('#tabcommands').append(line);
                
            }
       });
       });      
       


       $('#secteur').change(function(){

          var du=$('#threedaysago').val();
          var au=$('#currentdate').val();
          var agence=$('#agence').val();
          var secteur=$('#secteur').val();

          var audate=new Date(au);
      audate.setDate( audate.getDate() + 1)
      var dd = audate.getDate();
      var mm = audate.getMonth()+1; //January is 0!
      var yyyy = audate.getFullYear();

            if(dd<10) {
               dd = '0'+dd
             } 
           
            if(mm<10) {
               mm = '0'+mm
             } 
             
            audate = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
            
      //alert(audate);

      var etat = 'initial';

      $('.etat_checkbox:checked').each(function(et){
          etat = etat + ',' + $(this).val();
      });

      etat = etat.replace('initial,','');
      etat = etat.replace('initial','');


      var get_data={
          param_du:du,
          param_au:audate,
          param_agence : agence,
          param_secteur : secteur,
          param_etat : etat
      }

          var url_ = "{{ route('AllCommandsAfterFilters') }}";
          $.get(url_, get_data, function(data, response){
              $('#tabcommands').html("");

              for (var i = 0; i < data.length; i++) {
                if(data[i].etat == "Annulées"){
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                } else{
                    var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                }
                $('#tabcommands').append(line);
                
            }
          });
          });      



 
}); 

</script>



<!--filtering by date ajax code-->
<script>
        $(document).ready( function(){

            //date range for filtering
            //date systeme
            var today = new Date();
            var threedaysago = new Date(today);
            threedaysago.setDate( threedaysago.getDate() - 3)
            var dd = today.getDate();
            var dd2 = threedaysago.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var mm2 = threedaysago.getMonth()+1; //January is 0!
            var yyyy2 = threedaysago.getFullYear();
          

            if(dd<10) {
               dd = '0'+dd
             } 
             if(dd2<10) {
               dd2 = '0'+dd2
             } 

            if(mm<10) {
               mm = '0'+mm
             } 
             if(mm2<10) {
               mm2 = '0'+mm2
             } 
            

            today = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
            threedaysago = yyyy2 + '-' + mm2 + '-' + dd2; //+ ' 00:00:00';

             $("#currentdate").val(today);
             $("#threedaysago").val(threedaysago);

            //select agences
            $.get("{{ route('AllAgences') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {
                    $('#agence').append('<option value="'+data[i].nom_agence+'" selected>'+data[i].nom_agence+'</option>')
                }
            })
            //select sectors
            var url_ = "{{ route('AllSectors') }}";
            var agence=$('#agence').val();
            //alert(agence);
            $('#secteur').html('');
            $.get( url_ , {ag:agence} , function(data, response){
                var secteurs='<option value="" disabled selected>-- SELECT SECTEUR --</option>'
            for (var i = 0; i < data.length; i++) {
                secteurs = secteurs + '<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>';
             }
             $('#secteur').append(secteurs);
            })

           



        });
    </script>

    <!--Search bar-->
           <script>
           $(document).ready(function(){
           $("#searchbar").on("keyup", function() {
             var value = $(this).val().toLowerCase();
           $("#tabcommands tr").filter(function() {
           $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
            });
            </script>

            <!-- Second Search bar-->
           <script>
           $(document).ready(function(){
           $("#secsearchbar").on("keyup", function() {
             var value = $(this).val().toLowerCase();
           $("#tabcommands tr").filter(function() {
           $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
            });
            </script>


<!--refresh button -->
<script>
$(document).ready(function(){


$("#refresh_btn").click(function(){
  
          var du_filter=$('#threedaysago').val();
          var au_filter=$('#currentdate').val();
          var agence_filter=$('#agence').val();
          var secteur_filter=$('#secteur').val();

          var audate=new Date(au_filter);
          audate.setDate( audate.getDate() + 1)
          var dd = audate.getDate();
          var mm = audate.getMonth()+1; //January is 0!
          var yyyy = audate.getFullYear();

              if(dd<10) {
                 dd = '0'+dd
               } 
   
              if(mm<10) {
                 mm = '0'+mm
               } 
     
              audate = yyyy + '-' + mm + '-' + dd ; //+ ' 00:00:00';
    
          //alert(audate);

          var etat_filter = 'initial';

          $('.etat_checkbox:checked').each(function(et){
            etat_filter = etat_filter + ',' + $(this).val();
          });

          etat_filter = etat_filter.replace('initial,','');
          etat_filter = etat_filter.replace('initial','');

              //selected filters end

          var mydata={
                //filters
                param_du : du_filter,
                param_au : audate,
                param_agence : agence_filter,
                param_secteur : secteur_filter,
                param_etat : etat_filter
          };

           //alert(mydata.param_du_filter +""+mydata.param_au_filter);
          var url_ = "{{ route('AllCommandsAfterFilters') }}";
          $.get(url_, mydata, function(data, response){
              $('#tabcommands').html("");

              for (var i = 0; i < data.length; i++) {
                if(data[i].etat == "Annulées"){
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                } else{
                    var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                }
                $('#tabcommands').append(line);
                
            }
          });

})


})

</script>


<!--vider la table-->
<script>
    $(document).ready(function(){
    
//delete2 
$('#zero_ram').click(function(e){
        
        e.preventDefault();
       

        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"delete",
                url:"/deleteAllTable",
                success:function(data,response){
                   $('#tabstatistics').html('');
                   $(".modal").modal('hide');
                 //  alert("success");
           /*      $('#success_modal').modal('show');

                 setTimeout(function() {
                 $('#success_modal').modal('hide');
                 }, 2000); */
                 window.location = "{{route('zeroramview')}}";

                },
                error:function(error){
                  alert("error");
                }
              });  
      })


      $('#tac_ram').click(function(e){
        
        e.preventDefault();
       

        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"delete",
                url:"/deleteAllTable",
                success:function(data,response){
                   $('#tabstatistics').html('');
                   $(".modal").modal('hide');
                 //  alert("success");
           /*      $('#success_modal').modal('show');

                 setTimeout(function() {
                 $('#success_modal').modal('hide');
                 }, 2000); */
                 window.location = "{{route('tacramview')}}";

                },
                error:function(error){
                  alert("error");
                }
              });  
      })



      $('#f_passage').click(function(e){
        
        e.preventDefault();
       

        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"delete",
                url:"/deleteAllTable",
                success:function(data,response){
                   $('#tabstatistics').html('');
                   $(".modal").modal('hide');
                 //  alert("success");
           /*      $('#success_modal').modal('show');

                 setTimeout(function() {
                 $('#success_modal').modal('hide');
                 }, 2000); */
                 window.location = "{{route('passageview')}}";
                },
                error:function(error){
                  alert("error");
                }
              });  
      })


      $('#f_globale').click(function(e){
        
        e.preventDefault();
       
        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"delete",
                url:"/deleteAllTable",
                success:function(data,response){
                   $('#tabstatistics').html('');
                   $(".modal").modal('hide');
                 //  alert("success");
           /*      $('#success_modal').modal('show');

                 setTimeout(function() {
                 $('#success_modal').modal('hide');
                 }, 2000); */
                 window.location = "{{route('globstatsview')}}";

                },
                error:function(error){
                  alert("error");
                }
              });  
      })


      });
</script>



</body>

</html>