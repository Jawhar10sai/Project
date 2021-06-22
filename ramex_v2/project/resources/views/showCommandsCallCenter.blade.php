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
    <link href="{{asset('css/maxcdn.css')}}" rel="stylesheet">


    <!--cdn datatable-->
     <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
     
    <style type="text/css">
    .focusedInput {
    border-color: rgba(82,168,236,.8);
    outline: 0;
    outline: thin dotted \9;
    -moz-box-shadow: 0 0 8px rgba(82,168,236,.6);
    box-shadow: 0 0 8px rgba(82,168,236,.6) !important;
}
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar  <<fixed-top>>-->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeopcallcenter')}}">
    <div class="sidebar-brand-icon" style="margin-top:30px">
        <i class="fas fa-user-tie"></i>
    </div>
    <div class="sidebar-brand-text mx-3" style="margin-top:30px">{{ Auth::user()->profil }}</div>
</a>

  <!-- Divider -->
 
  

  <!-- Nav Item - Dashboard -->
  <li class="nav-item " style="margin-top:70px">
    <a class="nav-link" href="{{route('homeopcallcenter')}}">
       <i class="fas fa-home" style="font-size:20px"></i>
       <span style="font-size:17px">Accueil</span>
    </a>
 </li>

 <li class="nav-item " >
    <a class="nav-link" href="{{route('showClientsCallCenter')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
   <span style="font-size:15px">Gestion des clients</span>   
    </a>
 </li>

 <li class="nav-item active" >
    <a class="nav-link"  href="{{route('showCommandsCallCenter')}}">
       <i class="fas fa-fw fa-cog" style="font-size:18px"></i>
       <span style="font-size:14px">Gestion des demandes</span>
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

                <!-- Topbar <<fixed-top>>-->
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
                             
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changesettingsModal">
                                  <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Identification
                              </a>
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
                <div class="container-fluid" style="min-height:79%;">
<div class="container">
                  <div class="row">

                       <!-- Earnings (Monthly) Card Example -->
            <div class=" col-md-6">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div id="nv_dem_title" class="text-lg font-weight-bold text-uppercase mb-1 nouvelle-demande">
                                  Demandes en attente d'affectation</div>
                             <center><div id="nv_dem" class="h3 mb-0 font-weight-bold text-gray-800"></div></center>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-tasks fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class=" col-md-6 ">
              <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div id="af_dem_title" class="text-lg font-weight-bold text-uppercase mb-1 nouvelle-demande">
                                  Demandes en attente de confirmation</div>
                              <center><div id="af_dem" class="h3 mb-0 font-weight-bold text-gray-800"></div></center>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-check fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        </div><!--container end-->
                  </div><!--row end-->

                <!--my table begin-->
                <button type="submit" id="addCommandbtn" class="btn btn-primary"  href="#" data-toggle="modal" style="margin-top: 5px"><i class="fas fa-plus" style="margin-right:5px;"></i>Nouvelle demande</button>

           <div style="margin-top: 10px;margin-bottom:25px">    
             <a class="filtrer-par" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><h5><i id="down-icon" class="fas fa-angle-down fa-2x" style="display:none;float:right"></i><i id="up-icon" class="fas fa-angle-up fa-2x" style="float:right"></i></h5></a>
           </div> 

           <hr style="margin-right: 40px">

<div id="filter" class="container-fluid " >               

<div class="row collapse show" id="collapseExample">

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
        {{-- <option selected disabled>--SELECT AGENCE--</option>  --}}
       
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
                 


           <form id="frm" action='' method="" enctype="multipart/form-data">
            @csrf

              <!--  <input type="hidden" name="today_export" id="today_export" val="" >
                 <input type="hidden" name="threedaysago_export" id="threedaysago_export" val="" >--> 

                 <div class="row justify-content-between">
                 <div class="col-md-2">
                    <button type="button" id="export_btn" class="btn btn-success" style="margin-bottom:5px"><img src="{{asset('customAuth/images/excel.ico')}}" alt="" style="width:35px;height:35px">Exporter</button>
                 </div>
                 
                 
                    <div class="ml-auto mr-3" >
                        <a href="#" class="btn btn-primary" id="refresh_btn" ><i class="fas fa-refresh fa-spin" aria-hidden="true" style="margin-right:5px" ></i>Actualiser</a>
                     </div>
               

                 </div>
               
                
           
           <table id="commandsTab" class="table table-striped table-bordered" style="width:100%">
           <thead class="thead thead-dark">
             <tr>
             <th >N&deg; Ramassage</th>
             <th >Date Saisie</th>
             <th>Date demande</th>
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
    



     <!--delete command modal-->
     <div class="modal fade" id="deleteCommand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content" style="background-color:#ff0f0f;border-radius:20px;color:white;height:250px"> 
 
             <form id="deleteFormID">
              <div class="modal-body"> 
              {{csrf_field()}}
              {{method_field('delete')}}
              <input type="hidden" name="iddelcommand" id="iddelcommand" value="">
              <div class="row">
                 <div class="col-md-4"> <img src="{{ asset('customAuth/images/warning.gif') }}" alt="" style="width:150px;height:150px"></div>
                 <div class="col-md-8" style="padding-top:50px;padding-left:50px"><center><h3>Voulez vous vraiment supprimer cette demande?</h3></center></div>
             </div>
         <!--     <i class="fas fa-exclamation-triangle" style="font-size:30px; color:#ffcc00"></i> Voulez vous vraiment supprimer cet utilisateur? -->
         <center>
             <button type="submit" id="delete" class="btn btn-danger btn-lg" >Supprimer</button>
             <button class="btn btn-secondary btn-lg" type="button" data-dismiss="modal">Quitter</button>
             </center>   
     </div>
            
             
             </form>
             
         </div>
     </div>
 </div>
  


 <!--add command modal begin-->
    
<!-- Modal -->
<div class="modal fade " id="addCommand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"  style="width:1200px;" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle demande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--begin of my form-->
    <form id="addCommandForm"  enctype="multipart/form-data">
        @csrf
        <input id="num_ramasse" name="num_ramasse" type="hidden" value="">
        <input id="date_saisie" name="date_saisie" type="hidden" value="">
        <input id="nom_saisisseur" name="nom_saisisseur" type="hidden" value="{{ Auth::user()->name }}">
        <input id="etat" name="etat" type="hidden" value="Nouvelle Demande">
        <div class="row" style="margin-bottom:8px">
            <div class="col-md 4">
                <select class="form-control" id="canal_appel" name="canal_appel">
                    <option value="" selected disabled>--Select Canal d'appel--</option>
                    <option>CLIENT</option>
                    <option>COMMERCIAL</option>
                    <option>AGENCE</option>
                  </select>
                  <small id="canal_appel_error" class="form-text text-danger"></small>
            </div>
        <div class="col-md-4">
                <select class="form-control" id="type" name="type">
                    <option value="" selected disabled>--Select Type--</option>
                    <option>EXPEDITEUR</option>
                    <option>DESTINATAIRE</option>
                  </select>
                  <small id="type_error" class="form-text text-danger"></small>
        </div>
        <div class="col-md-4">
                <select class="form-control" id="source" name="source">
                    <option value="" selected disabled>--Select Source--</option>
                    <option>EMISSION</option>
                    <option>RECEPTION</option>
                    <option>E-MAIL</option>
                  </select>
                  <small id="source_error" class="form-text text-danger"></small>
            </div>
       </div>


       <div class="row">
            <div class="col-md-6">
                    <h5 class="text-center">PRESCRIPTEUR</h5>
                <div class="form-group">
                    <input type="text" id="code_client" name="code_client" class="form-control" placeholder="Code client *" value="" autocomplete="off" />
                    <small id="code_client_error" class="form-text text-danger"></small>
                </div>
                <div class="form-group">

                  <div class="row">
                    <div class="col-md-10">
                      <input type="text" id="nom_client" name="nom_client" class="form-control" placeholder="Nom client *" value="" autocomplete="off" />
                    </div>
                    <div  class="col-md-2">                 
                      <button type="button" class="btn addclient"><i class="fas fa-plus"></i></button>
                    </div>
                  </div>

                  <div id="clients_list"></div>
                  <small id="nom_client_error" class="form-text text-danger"></small>
                </div>
    
            </div>

        <div class="col-md-6">
                <h5 class="text-center">BENIFICIAIRE</h5>
            <div class="form-group">
                <input id="code_benificiaire" name="code_benificiaire" type="text" class="form-control" placeholder="Code benificiaire *" value="" autocomplete="off" />
                <small id="code_benificiaire_error" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
              <input id="nom_benificiaire" name="nom_benificiaire" type="text" class="form-control" placeholder="Nom benificiaire *" value="" autocomplete="off" />
              <div id="benificiaires_list"></div> 
              <small id="nom_benificiaire_error" class="form-text text-danger"></small>
            </div>
          </div>

     </div><!--end line2-->


          <!--ligne 3-->
          <div class="row">
              
            <div class="col-md-6">
                <div class="form-content-add-form">
                    <h5 class="text-center">LIEU D'ENLEVEMENT</h5>
                <div class="form-group">
                  <input type="text" id="agence_client" name="agence_client" class="form-control" placeholder="Agence client"/> 
                  {{-- <select class="form-control" id="agence_client" name="agence_client">
                    <option value="" selected disabled>--Select Agence client--</option>
                  </select> --}}
                  <small id="agence_client_error" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                   {{-- <input type="text" id="secteur_client" name="secteur_client" class="form-control" placeholder="Secteur client" value=""/> --}}
                   <input type="hidden" id="secteur_client" name="secteur_client" value=""/>
                   <select class="form-control" id="secteur_client2" name="secteur_client2">
                    <option value="" disabled selected>--Secteur client--</option>
                  </select>
                   <small id="secteur_client_error" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <textarea name="adresse_client" id="adresse_client" cols="30" rows="3" class="form-control" placeholder="Adresse"></textarea>
                    <small id="adresse_client_error" class="form-text text-danger"></small>
                </div>

               <div class="form-group">
               <div class="form-check form-check-inline">
               <label class="form-check-label" for="" style="margin-right:10px">ACCESSIBILITE POIDS LOURDS:</label>
                <input class="form-check-input" type="radio" name="a_poids_lourds" id="accessibilite" value="oui">
                <label class="form-check-label" for="accessibilite">Oui</label>
              </div>
                 <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="a_poids_lourds" id="non_accessibilite" value="non">
                  <label class="form-check-label" for="non_accessibilite">Non</label>
                 </div>
                 <small id="a_poids_lourds_error" class="form-text text-danger"></small>
               </div> 
            </div>
        </div>

        <div class="col-md-6">

            <div class="form-content-add-form">
                <h5 class="text-center">MARCHANDISE</h5>
            <div class="row">
                <div class="col-md-6">
                    <input id="num_colis" name="num_colis" type="number" class="form-control" placeholder="Nombre de colis" min="1" value=""/>
                    <small id="num_colis_error" class="form-text text-danger"></small>
                  </div>
                <div class="col-md-6">
                    <select class="form-control" id="nature_colis" name="nature_colis">
                        <option value="" selected disabled>--SELECT NATURE--</option>
                        <option>NAT1</option>
                        <option>NAT2</option>
                        <option>NAT3</option>
                        <option>NAT4</option>
                        <option>NAT5</option>
                      </select>
                      <small id="nature_colis_error" class="form-text text-danger"></small>
                  </div>
                </div>
            </div>

            <div class="form-content-add-form">
                 <div class="row">
                     <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="" style="margin-right:8px">MESURES:</label>
                            <input class="form-check-input" type="radio" name="mesure" id="longueur" value="longueur">
                            <label class="form-check-label" for="longueur">Longueur</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mesure" id="poid" value="poid">
                            <label class="form-check-label" for="poid">Poid</label>
                          </div>
                          <div class="form-check form-check-inline" style="margin-left:86px">
                            <input class="form-check-input" type="radio" name="mesure" id="volume" value="volume">
                            <label class="form-check-label" for="volume">Volume</label>
                          </div>
                     </div>
                     <div class="col-md-5"><input type="number" id="num_mesure" name="num_mesure" class="form-control" placeholder="Valeur" min="1" value=""/></div>
                     <div class="col-md-1"><label for="num_mesure" id="mesureunite"></label></div>
                 </div> 
            </div>

                <div class="form-content-add-form">
                    <h5 class="text-center">DATE ET HEURE DE RAMASSAGE</h5>
                    <div class="row">
                       <!--<div class="col-md-1"><label for="">Date:</label></div>--> 
                        <div class="col-md-6"> 
                            <label for="sysdate">Date:</label> 
                            <input type="date" id="sysdate" name="sysdate" class="form-control" value="" required />
                            <small id="sysdate_error" class="form-text text-danger"></small>
                        </div>

                        <div class="col-md-6"> 
                            <label for="systime">Heure:</label>  
                            <input type="time" id="systime" name="systime" class="form-control" value="" required/>
                            <small id="systime_error" class="form-text text-danger"></small>
                        </div>

                    </div> 
                   </div>

                <div class="form-content-add-form">
                    <h5 class="text-center">CAMION</h5>
                    <div class="row">
                        <div class="col-md-6"> <select class="form-control" id="type_camion" name="type_camion">
                            <option value="" selected disabled>--SELECT TYPE--</option>
                            <option>TYPE1</option>
                            <option>TYPE2</option>
                            <option>TYPE3</option>
                          </select></div>
                        <div class="col-md-6">
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="hayon" id="avec" value="avec">
                               <label class="form-check-label" for="avec">Avec Hayon</label>
                             </div>
                             <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="hayon" id="sans" value="sans" >
                               <label class="form-check-label" for="sans">Sans Hayon</label>
                             </div>
                        </div>
                    </div> 
                </div>


           </div><!--end line 3 col 2-->
        </div><!--end line 3-->

         <!--Commentaire-->
         <div class="form-content-add-form">
             <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="commentaire" id="commentaire" rows="3" class="form-control" placeholder="Commentaire"></textarea>
                    </div>
                </div>
            </div>
        </div>

                    <center>
                    <button type="submit" id="save" class="btn btn-primary btn-lg ">Enregistrer</button>
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Quitter</button> 
                    </center>
    </form>
        <!--end of my form-->

      </div>
    </div>
  </div>
</div>
    <!--add modal end-->



         <!--add client modal begin-->
    
<!-- Modal -->
<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--begin of my form-->
        <div class="col-lg-12">
    
                    <form id="addClientForm" class="user" enctype="multipart/form-data">
                     @csrf
                     <input id="date_de_creation" name="date_de_creation" type="hidden" value="">
                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input id="code_client_ajout" type="hidden" class="form-control form-control-user @error('code_client') is-invalid @enderror"
                                 name="code_client" value="{{ old('code_client') }}" placeholder="Code Client">
                                <small id="code_client_ajout_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input id="nom_client_ajout" type="text" class="form-control form-control-user @error('nom_client') is-invalid @enderror"
                                 name="nom_client" value="{{ old('nom_client') }}" placeholder="Nom Client" autocomplete="nom_client">
                                <small id="nom_client_ajout_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('agence_client') is-invalid @enderror" id="agence_client_ajout"
                                name="agence_client" value="{{ old('agence_client') }}" style="border-radius:10rem;font-size:.9rem;"  >
                                {{-- <option value="" selected disabled>--Select AGENCE--</option> --}}
                              </select>
                              <small id="agence_client_ajout_error" class="form-text text-danger"></small>
                            </div>
                      </div>
        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <select class="form-control @error('secteur_client') is-invalid @enderror" id="secteur_client_ajout"
                                  name="secteur_client" value="{{ old('secteur_client') }}" style="border-radius:10rem;font-size:.9rem;"  >
                                {{-- <option value="" selected disabled>--Select SECTEUR--</option> --}}
                                </select>
                                <small id="secteur_client_ajout_error" class="form-text text-danger"></small>
                            </div>
                        </div>
          <!--
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('commercial_client') is-invalid @enderror" id="commercial_client"
                               name="commercial_client" value="{{ old('commercial_client') }}" style="border-radius:10rem;font-size:.9rem;">
                                <option value="" selected disabled>--Select COMMERCIAL--</option>
                              </select>
                              <small id="commercial_client_error" class="form-text text-danger"></small>
                            </div>
                        </div> -->


                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input id="num_tel_client_ajout" type="tel"  pattern="[0-9]"  maxlength="10" class="form-control form-control-user @error('num_tel_client') is-invalid @enderror"
                                 name="num_tel_client" value="{{ old('num_tel_client') }}" placeholder="Exemple: 06-36-36-36-36">
                                <small id="num_tel_client_ajout_error" class="form-text text-danger"></small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <textarea id="adresse_client_ajout" rows="3" class="form-control form-control-user @error('adresse_client') is-invalid @enderror"
                                 name="adresse_client" value="{{ old('adresse_client') }}" placeholder="Adresse" autocomplete="adresse_client"></textarea>
                                <small id="adresse_client_ajout_error" class="form-text text-danger"></small>
                            </div>
                        </div>
                        
                      <center>  
                        <button type="submit" id="save2" class="btn btn-primary">Enregistrer </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                     </center>
                    </form>
                
            </div>
        <!--end of my form-->
      </div>
    </div>
  </div>
</div>
    <!--add modal end-->




    <!--edit command modal begin-->
<!-- Modal -->
<div class="modal fade" id="editCommand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Modifier la date du ramassage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--begin of my form-->
        <div class="col-lg-12">
    
                    <form id="editform" enctype="multipart/form-data">
                     @csrf
                     {{method_field('PUT')}}
                     <input type="hidden" name="id" id="id">

                   <center> <h4>Demande N&deg; <span id="mod_num_ramasse"></span></h4> </center>
                     
          <div class="row">
             <div class="col-md-12">     
                <div class="form-group">
                    <label for="old_date_ramasse">Date et heure de ramassage</label>
                    <input type="text" id="old_date_ramasse" name="old_date_ramasse" class="form-control" value="" disabled/>
                </div>
          </div>
</div>
          <div class="row">

             <div class="col-md-6">
                <div class="form-group">
                <label for="new_date_ramasse">Nouvelle date</label>
                 <input type="date" id="new_date_ramasse" name="new_date_ramasse" class="form-control" value=""/>
                </div>
            </div>

        <div class="col-md-6">
            <div class="form-group">
            <label for="new_date_ramasse">Nouvelle heure</label>
              <input id="new_houre_ramasse" name="new_houre_ramasse" type="time" class="form-control" value=""/>    
            </div>
          </div>

     </div><!--end-->
                     <center> <button type="submit" class="btn btn-primary">Enregistrer </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button></center>
                       
                    
                </form>
                
            </div>
        <!--end of my form-->
      </div>
    </div>
  </div>
</div>
    <!--edit user modal end-->



    <!--affecter modal begin-->
        <!-- Modal -->
        <div class="modal fade" id="affecter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #4e73df;color:white">
                <h5 class="modal-title" id="exampleModalLabel">Demande N&deg; <span class="num-demande"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <input class="id-demande" type="hidden" value="">
                <h3>Voulez-vous vraiment affecter cette demande à un chauffeur ? </h3>
              </div>
              <div style="margin-top:5px;margin-bottom:10px;">
            <center> <button type="button" id="affecter-btn" class="btn btn-primary">Affecter</button>
                <button type="button"  class="btn btn-danger annuler_modal" >Annuler la demande</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button> </center>
             </div>
            </div>
          </div>
        </div>
    <!--affecter modal end-->

    <!--confirmer modal begin-->
        <!-- Modal -->
        <div class="modal fade" id="confirmer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #4e73df;color:white">
                <h5 class="modal-title" id="exampleModalLabel">Demande N&deg; <span class="num-demande"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <input class="id-demande" type="hidden" value="">
                <h3>Voulez-vous vraiment confirmer cette demande ? </h3>
              </div>
              <div style="margin-top:5px;margin-bottom:10px;">
             <center><button type="button" id="confirmer-btn" class="btn btn-primary">Confirmer</button>
                <button type="button" class="btn btn-danger annuler_modal">Annuler cette demande</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                </center>
              </div>
            </div>
          </div>
        </div>
    <!--confirmer modal end-->


    <!--annuler modal begin-->
        <!-- Modal -->
        <div class="modal fade" id="annuler" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #4e73df;color:white">
                <h5 class="modal-title" id="exampleModalLabel">Demande N&deg; <span class="num-demande"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             
                <h3>Veuillez saisir le motif de l'annulation de cette demande  </h3>


                <form id="annuler_demande">
                <input class="id-demande" type="hidden" value="">
                    <div class="form-group">
                      <select class="form-control" id="motif" name="motif">
                         </select>
                    </div>    
              </form>

              </div>
              <div style="margin-top:5px;margin-bottom:10px;">
             <center><button type="button" id="annuler-btn" class="btn btn-primary">Confirmer</button>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button> </center>
              </div>
            </div>
          </div>
        </div>
    <!--annuler modal end-->


    <!--affecter2 modal begin-->
    
<!-- Modal -->
<div class="modal fade " id="affecte-ramasseur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"  style="width:1200px;" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Affectation du Ramassage N&deg; <span id="num_ramasse_af">RADEM</span> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--begin of my form-->
    <form id="affecteRamasseurForm"  enctype="multipart/form-data">
        @csrf

        <input id="id_dem" name="id_dem" type="hidden" value="">

        <div class="row" style="margin-bottom:10px;">

            <div class="col-md-4" >
                <label for="">Date Saisie du Ramassage :</label>
                <input id="date-saisie-af" name="date-saisie-af" type="text" class="form-control"  value="" disabled/>
            </div>

        <div class="col-md-4">
           <label for="">Par :</label>
           <input id="nom-saisisseur-af" name="nom-saisisseur-af" type="text" class="form-control"  value="" readonly/>
        </div>

        <div class="col-md-4">
          <label for="">Source :</label>
          <input id="source-af" name="source-af" type="text" class="form-control"  value="" readonly/>
        </div>

    </div>


    <div class="row" style="margin-bottom:10px;">

        <div class="col-md-3" >
            <label for="">Canal d'appel :</label>
            <input id="canal-af" name="canal-af" type="text" class="form-control"  value="" readonly/>
        </div>

        <div class="col-md-3">
          <label for="">Type :</label>
          <input id="type-af" name="type-af" type="text" class="form-control"  value="" readonly/>
        </div>

        <div class="col-md-3">
           <label for="">Préscripteur :</label>
           <input id="client-af" name="client-af" type="text" class="form-control"  value="" readonly/>
        </div>

        <div class="col-md-3">
           <label for="">Bénificiaire :</label>
           <input id="benif-af" name="benif-af" type="text" class="form-control"  value="" readonly/>
        </div>

   </div>


    <div class="row" style="margin-bottom:10px;">
           
       <div class="col-md-8" >
           <h4>Lieu d'enlévement</h4>
           <div class="row" style="margin-bottom:10px;">
               <label for="" class="col-md-2 col-form-label">Agence : </label>
               <div class="col-md-4">
               <input id="agence-af" name="agence-af" type="text" class="form-control"  value="" readonly/>
               </div>
               
               <label for="" class="col-md-2 col-form-label">Secteur : </label> 
               <div class="col-md-4">
               <input id="secteur-af" name="secteur-af" type="text" class="form-control"  value="DERB SULTAN - madina" readonly/>
               </div>
           </div>

          <div class="row" style="margin-bottom:10px;">
            <label for="" class="col-md-2">Adresse : </label>
            <div class="col-md-10">
            <textarea name="adresse-af" id="adresse-af" rows="3" class="form-control" readonly></textarea>
            </div>
          </div>
         
         <div class="row"><label class="col-md-4 col-form-label" for="">Accéssibilité Poids Lourds : </label><label id="access-af" class="col-md-6 col-form-label" for="" style="font-weight:bold;"></label></div>

       </div><!--end col-md-8-->

       <div class="col-md-4">
       <h4>Marchandise/Camion</h4>
           <div class="row">
             <label for="">Colis : <span id="num-colis-af"  style="font-weight:bold"></span></label>
           </div>
           <div class="row">
             <label for="">Nature : <span id="nature-colis-af" style="font-weight:bold"></span></label>
           </div>
           <div class="row">  
               <label for="">Mesure : <span id="mesure-af" style="font-weight:bold"></span></label>
           </div>
           <div class="row">  
               <label for="">Type Camion : <span id="type-camion-af" style="font-weight:bold"></span></label>
           </div>
           <div class="row">  
               <label for="">Hayon : <span id="hayon-af" style="font-weight:bold"></span></label>
           </div>

       </div>
   

    </div><!--end ligne2-->

    <div class="row" ">

       <div class="col-md-8">
          <h4>Ramassage</h4>
          <div class="row">
              <label for="" class="col-md-4 col-form-label">Date Ramassage Demandée : </label> 
              <div class="col-md-8">
                  <input id="date-ramasse-af" name="date-ramasse-af" type="text" class="form-control"  value="" readonly/>
              </div>
          </div>
       </div>
       
       <div class="col-md-4">
          <h4>Commentaire</h4>      
          <textarea id="commentaire-af"  class="form-control" rows=3 readonly></textarea>      
       </div>

    </div><!--end ligne3-->

<div class="row" style="margin-bottom:10px">
      
    <div class="col-md-8">
      <h4>Affectation du Ramassage</h4>
        <div class="row">
            <label for="matricule-ramasseur" class="col-md-5 col-form-label">Matricule du Ramasseur : </label>
            <div class="col-md-7">
              <input id="matricule-ramasseur" name="matricule-ramasseur" type="text" class="form-control focusedInput" placeholder="Veuillez saisir un matricule***"  value="" autocomplete="off" />
            </div>
            </div>
        <div class="row" style="margin-top:3px;">    
            <label for="nom-ramasseur-af" class="col-md-5 col-form-label">Nom du Ramasseur : </label>
            <div class="col-md-7">
              <input id="nom-ramasseur-af" name="nom-ramasseur-af" type="text" class="form-control focusedInput" placeholder="Veuillez saisir un nom***"  value="" autocomplete="off" />
              <div id="ramasseurs_list"></div>
            </div>
       </div>    
    </div>
      
</div>

                    <center>
                    <button type="submit" id="save-aff" class="btn btn-primary btn-lg">Valider l'affectation</button>
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Quitter</button> 
                    </center>
    </form>
        <!--end of my form-->

      </div>
    </div>
  </div>
</div>
    <!--affecter2 modal end-->





    <!--afficher les infos d'une demande modal begin-->
<!-- Modal -->
<div class="modal fade " id="show_dem_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"  style="width:1200px;" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Ramassage N&deg; <span id="num_ramasse_sh"></span> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--begin of my form-->
    <form enctype="multipart/form-data">
        @csrf

        {{-- <input id="id_dem" name="id_dem" type="hidden" value=""> --}}

        <div class="row" style="margin-bottom:10px;">

            <div class="col-md-4" >
                <label for="">Date Saisie du Ramassage :</label>
                <input id="date-saisie-sh" name="date-saisie-sh" type="text" class="form-control"  value="" disabled/>
            </div>

        <div class="col-md-4">
           <label for="">Par :</label>
           <input id="nom-saisisseur-sh" name="nom-saisisseur-sh" type="text" class="form-control"  value="" readonly/>
        </div>

        <div class="col-md-4">
          <label for="">Source :</label>
          <input id="source-sh" name="source-sh" type="text" class="form-control"  value="" readonly/>
        </div>

    </div>


    <div class="row" style="margin-bottom:10px;">

        <div class="col-md-3" >
            <label for="">Canal d'appel :</label>
            <input id="canal-sh" name="canal-sh" type="text" class="form-control"  value="" readonly/>
        </div>

        <div class="col-md-3">
          <label for="">Type :</label>
          <input id="type-sh" name="type-sh" type="text" class="form-control"  value="" readonly/>
        </div>

        <div class="col-md-3">
           <label for="">Préscripteur :</label>
           <input id="client-sh" name="client-sh" type="text" class="form-control"  value="" readonly/>
        </div>

        <div class="col-md-3">
           <label for="">Bénificiaire :</label>
           <input id="benif-sh" name="benif-sh" type="text" class="form-control"  value="" readonly/>
        </div>

   </div>


    <div class="row" style="margin-bottom:10px;">
           
       <div class="col-md-8" >
           <h4>Lieu d'enlévement</h4>
           <div class="row" style="margin-bottom:10px;">
               <label for="" class="col-md-2 col-form-label">Agence : </label>
               <div class="col-md-4">
               <input id="agence-sh" name="agence-sh" type="text" class="form-control"  value="" readonly/>
               </div>
               
               <label for="" class="col-md-2 col-form-label">Secteur : </label> 
               <div class="col-md-4">
               <input id="secteur-sh" name="secteur-sh" type="text" class="form-control"  value="DERB SULTAN - madina" readonly/>
               </div>
           </div>

          <div class="row" style="margin-bottom:10px;">
            <label for="" class="col-md-2">Adresse : </label>
            <div class="col-md-10">
            <textarea name="adresse-sh" id="adresse-sh" rows="3" class="form-control" readonly></textarea>
            </div>
          </div>
         
         <div class="row"><label class="col-md-4 col-form-label" for="">Accéssibilité Poids Lourds : </label><label id="access-af" class="col-md-6 col-form-label" for="" style="font-weight:bold;"></label></div>

       </div><!--end col-md-8-->

       <div class="col-md-4">
       <h4>Marchandise/Camion</h4>
           <div class="row">
             <label for="">Colis : <span id="num-colis-sh"  style="font-weight:bold"></span></label>
           </div>
           <div class="row">
             <label for="">Nature : <span id="nature-colis-sh" style="font-weight:bold"></span></label>
           </div>
           <div class="row">  
               <label for="">Mesure : <span id="mesure-sh" style="font-weight:bold"></span></label>
           </div>
           <div class="row">  
               <label for="">Type Camion : <span id="type-camion-sh" style="font-weight:bold"></span></label>
           </div>
           <div class="row">  
               <label for="">Hayon : <span id="hayon-sh" style="font-weight:bold"></span></label>
           </div>

       </div>
   

    </div><!--end ligne2-->

    <div class="row" ">

       <div class="col-md-8">
          <h4>Ramassage</h4>
          <div class="row">
              <label for="" class="col-md-4 col-form-label">Date Ramassage Demandée : </label> 
              <div class="col-md-8">
                  <input id="date-ramasse-sh" name="date-ramasse-sh" type="text" class="form-control"  value="" readonly/>
              </div>
          </div>
       </div>
       
       <div class="col-md-4">
          <h4>Commentaire</h4>      
          <textarea id="commentaire-sh"  class="form-control" rows=3 readonly></textarea>      
       </div>

    </div><!--end ligne3-->

<div class="row" style="margin-bottom:10px">
      
    <div class="col-md-8">
      <h4>Affectation du Ramassage</h4>
        {{-- <div class="row">
            <label for="matricule-ramasseur-sh" class="col-md-5 col-form-label">Matricule du Ramasseur : </label>
            <div class="col-md-7">
              <input id="matricule-ramasseur-sh" name="matricule-ramasseur-sh" type="text" class="form-control"  value="" readonly/>
            </div>
            </div> --}}
        <div class="row" style="margin-top:3px;">    
            <label for="nom-ramasseur-sh" class="col-md-5 col-form-label">Nom du Ramasseur : </label>
            <div class="col-md-7">
              <input id="nom-ramasseur-sh" name="nom-ramasseur-sh" type="text" class="form-control" value="" readonly/>
             
            </div>
       </div>    
    </div>
      
</div>

                    <center>
                    {{-- <button type="submit" id="save-aff" class="btn btn-primary btn-lg">Valider l'affectation</button> --}}
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="fas fa-close"></i> Quitter</button> 
                    </center>
    </form>
        <!--end of my form-->

      </div>
    </div>
  </div>
</div>
    <!--afficher les infos d'une demande modal end-->





       <!--success modal begin-->
        <!-- Modal -->
        <div class="modal fade" id="success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" >
              <div class="modal-content" style="background-color:rgb(35, 220, 61);border-radius:40px;color:white">
                <div class="modal-body" >
               
                  <div class="row">
                      <div class="col-md-4"> <img src="{{ asset('customAuth/images/check.gif') }}" alt=""></div>
                      <div class="col-md-8" style="padding-top:50px;padding-left:50px"><center><h3>Cette opération est terminée avec succès</h3></center></div>
                  </div>
                
                </div>
    
              </div>
            </div>
          </div>
      <!--susccess modal end-->



     <!--edit user modal begin-->
<!-- Modal -->
<div class="modal fade" id="changesettingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Modifier votre paramètres</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--begin of my form-->
        <div class="col-lg-12">
    
                    <form id="editform2" enctype="multipart/form-data">
                     @csrf
                     {{method_field('PUT')}}
                     
                        <div class="form-group">
                                <label for="">Changer votre image de profil</label>
                                <input id="modimage2" type="file" class="form-control"
                                 name="modimage2">
                        </div>

                       

                        <div class="form-group">
                          <label for="">Changer votre mot de passe</label>
                                 <input id="modpassword2" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                  name="modpassword2" placeholder="Nouveau mot de passe" autocomplete="Nouveau mot de passe">
                                  <small id="modpassword_error" class="form-text text-danger"></small>
                        </div>

                      <center>
                        <button type="submit" class="btn btn-primary">Enregistrer </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      </center>
                    </form>
                
            </div>
        <!--end of my form-->
      </div>
    </div>
  </div>
</div>
    <!--edit user modal end-->



    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('customAuth/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('customAuth/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('customAuth/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('customAuth/js/sb-admin-2.min.js')}}"></script>

    
<!--affecter fields focus jquery-->
<script>
  $(document).ready(function() {
      $("#matricule-ramasseur").focus();
  });
  </script>

<!--tooltip jquery-->
<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>


{{-- canal d'APPEL ONCAHNGE --}}
<script>
  $(document).ready(function() {
    
           $('#canal_appel').change( function(){
            var canal=$('#canal_appel').val();
if(canal == "COMMERCIAL"){
  var url_ = "{{ route('selectAllCommercials') }}";
           
           $('#type').html('');
           $.get( url_ , function(data, response){
               var commercials='<option value="" disabled selected>-- SELECT COMMERCIAL --</option>'
           for (var i = 0; i < data.length; i++) {
            commercials  = commercials + '<option value="'+data[i].nom_commercial+'">'+data[i].nom_commercial+'</option>';
            }
            $('#type').append(commercials);
           })
}else{
  $('#type').html('');

var type='<option value="" disabled selected>-- SELECT TYPE --</option>'
type = type+"<option>EXPEDITEUR</option>";
type=type+"<option>DESTINATAIRE</option>";
$('#type').append(type);
}

           

             });
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
     /*   $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     type:"get",
                     url:"{{route('exportExcel')}}",
                    // data:mydata,
                     success:function(data,response){
                    
                     },
                     error:function(error){
                       alert("error");
                     }
                 }); */
       // alert("test");
        //{{route('exportExcel')}}
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
                        var line='<tr class="'+data[i].id+'" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events" >'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                    } else{
                        var line='<tr class="'+data[i].id+'" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events" >'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                    }
                    $('#tabcommands').append(line);
                }
              
            });

            //Pour l'exportation excel
            $("#today_export").val(today);
            $("#threedaysago_export").val(threedaysago);

});
</script>


<!--Affichage dans la table apres le filtrage-->
<script>   
$(document).ready(function(){ 
/*
    $(".etat_checkbox").change(function(event){

        var val="";
    if (this.checked){  
        $('.etat_checkbox:checked').each(function(et){
            val = val + ',' + $(this).val();
        });
    }
    if (this.unchecked){
        $('.etat_checkbox:checked').each(function(et){
            val = val + ',' + $(this).val();
        });
    }  
        alert(val);
    });
    */
/*
    $('#apply_filter').click(function(){

        var du=$('#threedaysago').val();
        var au=$('#currentdate').val();
        var agence=$('#agence').val();
        var secteur=$('#secteur').val();

        var etat = 'initial';

        $('.etat_checkbox:checked').each(function(et){
            etat = etat + ',' + $(this).val();
        });

        etat = etat.replace('initial,','');
        etat = etat.replace('initial','');

       // var etat = $('.etat_checkbox').val();

        var get_data={
            param_du:du,
            param_au:au,
            param_agence : agence,
            param_secteur : secteur,
            param_etat : etat
        }

        var url_ = "{{ route('AllCommandsAfterFilters') }}";
        $.get(url_, get_data, function(data, response){
            $('#tabcommands').html("");
            
            for (var i = 0; i < data.length; i++) {
                var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].num_ramasse+'</td><td>'+data[i].date_saisie+'</td><td>'+data[i].date_ramasse+'</td><td>'+data[i].nom_saisisseur+'</td><td>'+data[i].code_client+'</td><td>'+data[i].nom_client+'</td><td>'+data[i].nom_client+'</td><td>'+data[i].adresse_client+'</td><td>'+data[i].etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i></a></button><a class="btn btn-primary delbtn" href="#"  ><i class="fas fa-trash"></i></a></td><tr/>';
                $('#tabcommands').append(line);
                // var pagination="<span data-x='"+i+"'>"+i+"</span>";
                // $(".pagination").append(pagination);
                
            }
            
        });
        
        //load_data(get_data);

    }); */


  //  load_data(null);
/*
    function load_data( datafilter ){
   
        var url_ = "{{ route('AllCommandsAfterFilters') }}";
        $.get(url_, datafilter, function(data, response){
            $('#tabcommands').html("");
            
            for (var i = 0; i < data.length; i++) {
                var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].num_ramasse+'</td><td>'+data[i].date_saisie+'</td><td>'+data[i].date_ramasse+'</td><td>'+data[i].nom_saisisseur+'</td><td>'+data[i].code_client+'</td><td>'+data[i].nom_client+'</td><td>'+data[i].nom_client+'</td><td>'+data[i].adresse_client+'</td><td>'+data[i].etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i></a></button><a class="btn btn-primary delbtn" href="#"  ><i class="fas fa-trash"></i></a></td><tr/>';
                $('#tabcommands').append(line);
                // var pagination="<span data-x='"+i+"'>"+i+"</span>";
                // $(".pagination").append(pagination);
                
            }
            
        });
    } */
}); 

</script>

<script>   
$(document).ready(function(){ 
/*
    $(".etat_checkbox").change(function(event){

        var val="";
    if (this.checked){  
        $('.etat_checkbox:checked').each(function(et){
            val = val + ',' + $(this).val();
        });
    }
    if (this.unchecked){
        $('.etat_checkbox:checked').each(function(et){
            val = val + ',' + $(this).val();
        });
    }  
        alert(val);
    });
    */

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
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)" ><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
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
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
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
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
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
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
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
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                } else{
                    var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                }
                $('#tabcommands').append(line);
                
            }
          });
          });      



 
}); 

</script>



<!--sort table elements-->
<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function(){

    /*$('#commandsTab').DataTable( {
        "ajax": '/AllCommands'
    } );*/
   // $('#commandsTab').DataTable();

 /*$('th').on('click',function(){
     var column=$(this).data('column');
     var order=$(this).data('order');
     console.log("this col was clicked",column,order);
     if(order=='desc'){
        $(this).data('order',"asc");
     }else{
        $(this).data('order',"desc");
     }
 }) */
});
</script>

<!--addcommand ajax code-->
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
                    $('#agence').append('<option value="'+data[i].nom_agence+'">'+data[i].nom_agence+'</option>')
                }
            })
            /*select sectors*/
           // $('#agence').change( function(){
            
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

          //  });


            //show addCommand modal and add some input values
            $(document).on("click", "#addCommandbtn" , function() {
            $('#addCommand').modal('show');

            //code commande
            url_code_commande="{{route('codeCom')}}";
            $.get( url_code_commande , function(data, response){
               $("#num_ramasse").val(data);
            })

                
            //date systeme
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var hh=today.getHours();
            var mn=today.getMinutes();
            var ss=today.getSeconds();

            if(dd<10) {
               dd = '0'+dd
             } 

            if(mm<10) {
               mm = '0'+mm
             } 
             if(mn<10) {
               mn = '0'+mn
             }
             if(ss<0) {
                 ss='0'+ss
             }
             

            today = yyyy + '-' + mm + '-' + dd;
             time = hh +':' + mn  ;
             time2 = hh +':' + mn +':'+ss  ;

             var complete_date=today+" "+time;
             var complete_date2=today+" "+time2;

             $("#sysdate").val(today);
             $("#systime").val(time);
             $("#date_saisie").val(complete_date2);



            });
          
            //select client with code_client
            $('#code_client').on('keyup', function(){
            
            var url_ = "{{ route('SelectedClient') }}";
            var code_client=$(this).val();
            if(code_client !=''){
                $.get( url_ , {cd:code_client} , function(data, response){
                for (var i = 0; i < data.length; i++) {
                $('#nom_client').val(data[i].nom_client);
                $('#agence_client').val(data[i].agence_client);
                $('#secteur_client').val(data[i].secteur_client);
                $('#adresse_client').val(data[i].adresse_client);

                $('#code_benificiaire').val(data[i].code_client);
                $('#nom_benificiaire').val(data[i].nom_client);
             }
            })
            } else {
                $('#nom_client').val('');
                $('#agence_client').val('');
                $('#secteur_client').val('');
                $('#adresse_client').val('');

                $('#code_benificiaire').val('');
                $('#nom_benificiaire').val('');
            }

            });
            //select client with nom_client
            $('#nom_client').on('keyup', function(){
         
              var url_="{{route('fetch')}}";
              var nom_client=$(this).val();
              if(nom_client !=''){
                $.get( url_ , {nm:nom_client} , function(data, response){
              //$('#clients_list').fadeIn();
              $('#clients_list').html(data);
             //alert(data);
              }) 
              }
              else{
                $('#clients_list').html('');
              }
            });

            //clickable li for autocomplete-search
            $(document).on("click", "a.autocomplete-search" , function() {
                var nom_client=$(this).text();
                $("#nom_client").val(nom_client);
                var url_="{{route('SelectedClientByName')}}";
                $.get( url_ , {nm:nom_client} , function(data, response){
                 //alert(data[0].code_client);
                 $('#code_client').val(data[0].code_client);
                 $('#agence_client').val(data[0].agence_client);
                 $('#secteur_client').val(data[0].secteur_client);
                 $('#adresse_client').val(data[0].adresse_client);

                 $('#code_benificiaire').val(data[0].code_client);
                 $('#nom_benificiaire').val(data[0].nom_client);
                 $('#clients_list').html(''); 
               })
             }); 

         //select benificiaire with code_benificiaire
         $('#code_benificiaire').on('keyup', function(){
            
            var url_ = "{{ route('SelectedClient') }}";
            var code_benificiaire=$(this).val();
            if(code_benificiaire !=''){
                $.get( url_ , {cd:code_benificiaire} , function(data, response){
                for (var i = 0; i < data.length; i++) {
                $('#nom_benificiaire').val(data[i].nom_client);
             }
            })
            } else{
                $('#nom_benificiaire').val('');
                  }
          });

            //select benificiaire with nom_beneficiaire
            $('#nom_benificiaire').on('keyup', function(){
              var url_="{{route('fetch2')}}";
              var nom_benificiaire=$(this).val();
              if(nom_benificiaire !=''){
                $.get( url_ , {nm:nom_benificiaire} , function(data, response){
                $('#benificiaires_list').html(data);
              }) 
              }
              else{
                $('#benificiaires_list').html('');
              } 
            });

             //clickable li for autocomplete-search-ben
             $(document).on("click", "a.autocomplete-search-ben" , function() {
                var nom_benificiaire=$(this).text();
                $("#nom_benificiaire").val(nom_benificiaire);
                var url_="{{route('SelectedClientByName')}}";
                $.get( url_ , {nm:nom_benificiaire} , function(data, response){
                 //alert(data[0].code_client);
                 $('#code_benificiaire').val(data[0].code_client);
                 $('#benificiaires_list').html(''); 
               })
             }); 




             //ability to change sectors
             $('#code_client').on('keyup', function(){
            
            var url_ = "{{ route('SelectedClient') }}";
            var code_client=$(this).val();
            if(code_client !=''){
                $.get( url_ , {cd:code_client} , function(data, response){
                for (var i = 0; i < data.length; i++) {
                $('#nom_client').val(data[i].nom_client);
                $('#agence_client').val(data[i].agence_client);
                $('#secteur_client').val(data[i].secteur_client);
                $('#adresse_client').val(data[i].adresse_client);
                $('#code_benificiaire').val(data[i].code_client);
                $('#nom_benificiaire').val(data[i].nom_client);

            /*select sectors*/     
            var url_2 = "{{ route('AllSectors') }}";
            var agence=data[i].agence_client;
            var sec2=data[i].secteur_client;
            //alert(agence);
            $('#secteur_client2').html('');

            $.get( url_2 , {ag:agence} , function(data, response){
                 var secteurs='<option value="" disabled>-- SELECT SECTEUR --</option>';
            for (var i = 0; i < data.length; i++) {
              var sec='';
              if(data[i].nom_secteur == sec2){
                sec = '<option value="'+data[i].nom_secteur+'" selected>'+data[i].nom_secteur+'</option>';
              } else{
                sec='<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>';
              }
              secteurs=secteurs + sec;
             }
             $('#secteur_client2').append(secteurs);
            })

             }

            })
            } else {
                $('#nom_client').val('');
                $('#agence_client').val('');
                $('#secteur_client').val('');
                $('#adresse_client').val('');

                $('#code_benificiaire').val('');
                $('#nom_benificiaire').val('');
            }

            });


          $(document).on("click", "a.autocomplete-search" , function() {
            var nom_client=$(this).text();
            $("#nom_client").val(nom_client);
            var url_="{{route('SelectedClientByName')}}";
           $.get( url_ , {nm:nom_client} , function(data, response){
            //alert(data[0].code_client);
            $('#code_client').val(data[0].code_client);
            $('#agence_client').val(data[0].agence_client);
            $('#secteur_client').val(data[0].secteur_client);
            $('#adresse_client').val(data[0].adresse_client);

            $('#code_benificiaire').val(data[0].code_client);
            $('#nom_benificiaire').val(data[0].nom_client);
            $('#clients_list').html(''); 
            /*select sectors*/     
            var url_2 = "{{ route('AllSectors') }}";
            var agence=data[0].agence_client;
            var sec2=data[0].secteur_client;
            //alert(agence);
            $('#secteur_client2').html('');

            $.get( url_2 , {ag:agence} , function(data, response){
                 var secteurs='<option value="" disabled>-- SELECT SECTEUR --</option>';
            for (var i = 0; i < data.length; i++) {
              var sec='';
              if(data[i].nom_secteur == sec2){
                sec = '<option value="'+data[i].nom_secteur+'" selected>'+data[i].nom_secteur+'</option>';
              } else{
                sec='<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>';
              }
              secteurs=secteurs + sec;
             }
             $('#secteur_client2').append(secteurs);
            })
         })
       }); 

        /*ability to change sector end*/



          //   //select client with code_client
          // $('#code_client').on('keyup', function(){
                
          //   /*select sectors*/     
          //   var url_ = "{{ route('AllSectors') }}";
          //   var agence=$('#agence_client').val();
          //   //alert(agence);
          //   $('#secteur_client2').html('');
          //   $.get( url_ , {ag:agence} , function(data, response){
          //        var secteurs='<option value="" disabled>-- SELECT SECTEUR --</option>';
          //   for (var i = 0; i < data.length; i++) {
          //     var sec='';
          //     if(data[i].nom_secteur == $('#secteur_client').val()){
          //       sec = '<option value="'+data[i].nom_secteur+'" selected>'+data[i].nom_secteur+'</option>';
          //     } else{
          //       sec='<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>';
          //     }
          //     secteurs=secteurs + sec;
          //    }
          //    $('#secteur_client2').append(secteurs);
          //   })
          // });

            //////




            //mesure fonction
            $('input[name="mesure"]').click(function(){
               // alert("it works fine");
                
                if($('#longueur').prop('checked')){
               // $('#poid').attr('checked',false);
                $('#mesureunite').text('m');
                $('#mesureunite').val('m');
            }
             else if($('#poid').prop('checked')){
                  //$('#longueur').attr('checked',false);
                $('#mesureunite').text('kg');
                $('#mesureunite').val('kg');
            }
            else if($('#volume').prop('checked')){
                  //$('#longueur').attr('checked',false);
                $('#mesureunite').text('㎥');
                $('#mesureunite').val('㎥');
            }
            
            });

            
            

            //submit
            $('#save').on('click',function(e){
              e.preventDefault();
              var num_ramasse=$("#num_ramasse").val();
              var date_saisie=$("#date_saisie").val();
              var nom_saisisseur=$("#nom_saisisseur").val();
              var etat=$("#etat").val();
              var canal_appel=$("#canal_appel").val();
              var type=$("#type").val();
              var source=$("#source").val();
              var code_client=$("#code_client").val();
              var nom_client=$("#nom_client").val();
              var agence_client=$("#agence_client").val();
              var secteur_client=$("#secteur_client2").val();
              var adresse_client=$("#adresse_client").val();
              var code_benificiaire=$("#code_benificiaire").val();
              var nom_benificiaire=$("#nom_benificiaire").val();
              var accessibilite=$("input[name='a_poids_lourds']:checked").val();
              var num_colis=$("#num_colis").val();
              var nature_colis=$("#nature_colis").val();
              var mesure=$("#num_mesure").val()+" "+$("#mesureunite").val();
              var date_ramasse=$("#sysdate").val()+" "+$("#systime").val();
              var type_camion=$("#type_camion").val();
              var hayon=$("input[name='hayon']:checked").val();
              var commentaire=$("#commentaire").val();

              //selected filters
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
                num_ramasse:num_ramasse,
                date_saisie:date_saisie,
                nom_saisisseur:nom_saisisseur,
                etat:etat,
                canal_appel:canal_appel,
                type:type,
                source:source,
                code_client:code_client,
                nom_client:nom_client,
                agence_client:agence_client,
                secteur_client:secteur_client,
                adresse_client:adresse_client,
                code_benificiaire:code_benificiaire,
                nom_benificiaire:nom_benificiaire,
                accessibilite:accessibilite,
                num_colis:num_colis,
                nature_colis:nature_colis,
                mesure:mesure,
                date_ramasse:date_ramasse,
                type_camion:type_camion,
                hayon:hayon,
                commentaire:commentaire,
                //filters
                param_du_filter:du_filter,
                param_au_filter:audate,
                param_agence_filter : agence_filter,
                param_secteur_filter : secteur_filter,
                param_etat_filter : etat_filter
                  };
           /*  alert(
                mydata.num_ramasse+" "
                +mydata.date_saisie+" "
                +mydata.nom_saisisseur+" "
                +mydata.etat+" "
                +mydata.canal_appel+" "
                +mydata.type+" "
                +mydata.source+" "
                +mydata.code_client+" "
                +mydata.nom_client+" "
                +mydata.agence_client+" "
                +mydata.secteur_client+" "
                +mydata.adresse_client+" "
                +mydata.code_benificiaire+" "
                +mydata.nom_benificiaire+" "
                +mydata.accessibilite+" "
                +mydata.num_colis+" "
                +mydata.nature_colis+" "
                +mydata.mesure+" "
                +mydata.date_ramasse+" "
                +mydata.type_camion+" "
                +mydata.hayon+" "
                +mydata.commentaire+" "
                +mydata.param_du+" "
                +mydata.param_au+" "
                +mydata.param_agence+" "
                +mydata.param_secteur+" "
                +mydata.param_etat+" "
             ); */

              $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url:"{{route('storeCommand')}}",
                data:mydata,
                success:function(data,response){
                   // $('#addCommand').modal('hide');
                   $(".modal").modal('hide');
                    $('#success_modal').modal('show');

                     setTimeout(function() {
                     $('#success_modal').modal('hide');
                     }, 2000);
                   // $('#succes').modal('show'); 
                   // alert("success");
                    //alert(data.id);
                   //  add line with the appropriate filters 
                      $('#tabcommands').html("");

                      for (var i = 0; i < data.length; i++) {
                        if(data[i].etat == "Annulées"){
                            var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                        } else{
                            var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                        }
                        $('#tabcommands').append(line);
  
                      } 
                    

                   /* add one line
                    var line='<tr class="'+data.id+'"><td style="display:none;">'+data.id+'</td><td class="events">'+data.num_ramasse+'</td><td class="events">'+data.date_saisie+'</td><td class="events">'+data.date_ramasse+'</td><td class="events">'+data.nom_saisisseur+'</td><td class="events">'+data.code_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.adresse_client+'</td><td class="events">'+data.etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                    $('#tabcommands').append(line); */

                   // $("#num_ramasse").val();
                    $("#date_saisie").val('');
                 //   $("#nom_saisisseur").val('');
                //    $("#etat").val('');
                    $("#canal_appel").val('');
                    $("#type").val('');
                    $("#source").val('');
                    $("#code_client").val('');
                    $("#nom_client").val('');
                    $("#agence_client").val('');
                    $("#secteur_client").val('');
                    $("#adresse_client").val('');
                    $("#code_benificiaire").val('');
                    $("#nom_benificiaire").val('');
                   // $("input[name='a_poids_lourds']:unchecked").val();
                    $("#accessibilite").prop("checked", false);
                    $("#non_asseccibilite").prop("checked", false);
                    $("#poid").prop("checked", false);
                    $("#longueur").prop("checked", false);
                    $("#volume").prop("checked", false);
                    $("#num_colis").val('');
                    $("#nature_colis").val('');
                    $("#num_mesure").val('');
                    $("#mesureunite").val('');
                    $("#sysdate").val('');
                    $("#systime").val('');
                    $("#type_camion").val('');
                    //$("input[name='hayon']:checked").val();
                    $("#avec").prop("checked", false);
                    $("#sans").prop("checked", false);
                    $("#commentaire").val('');
                   // alert('Utilisateur a été ajouté avec succes');
                    //location.reload();
                },
                error:function(error){
                 // alert("error");
                 $("#canal_appel_error").text('');
                 $("#type_error").text('');
                 $("#source_error").text('');
                 $("#code_client_error").text('');
                 $("#nom_client_error").text('');
                 $("#agence_client_error").text('');
                 $("#secteur_client_error").text('');
                 $("#adresse_client_error").text('');
                 $("#code_benificiaire_error").text('');
                 $("#nom_benificiaire_error").text('');
                 $("#a_poids_lourds_error").text('');
                 $("#num_colis_error").text('');
                 $("#nature_colis_error").text('');
                 $("#sysdate_error").text('');
                 $("#systime_error").text('');



                    var response=$.parseJSON(error.responseText);
                    //alert(response.errors);
                    $.each(response.errors,function(key,val){
                       $("#"+key+"_error").text(val[0]);
                    });
                }
              });  

            }); 


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

     <!--modcommand ajax code(useless for this view)-->       
     <script>
           $(document).ready(function(){
            $(document).on("click", "a.editbtn" , function() {
            $('#editCommand').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#id').val(data[0]);
            $('#mod_num_ramasse').text(data[1]);
            $('#old_date_ramasse').val(data[3]);
         
              $('#editform').on('submit',function(e){
                  e.preventDefault();
                  var id=$('#id').val();
                  var date= $('#new_date_ramasse').val()
                  var heure=$('#new_houre_ramasse').val();

                  //selected filters
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




                  var newDate={
                      id:id,
                      date:date,
                      heure:heure,
                       //filters
                      param_du_filter:du_filter,
                      param_au_filter:audate,
                      param_agence_filter : agence_filter,
                      param_secteur_filter : secteur_filter,
                      param_etat_filter : etat_filter
                  }
                   // alert(id);                
                 $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     type:"PUT",
                     url:"/updateCommand",
                     data:newDate,
                     success:function(data,response){
                       // $('#editCommand').modal('hide');
                       $(".modal").modal('hide');
                    $('#success_modal').modal('show');

                     setTimeout(function() {
                     $('#success_modal').modal('hide');
                     }, 2000);
                       // $('#succes').modal('show');  
                        //alert("Utilisateur a été modifié avec succes");

                        $('#tabcommands').html("");

                        for (var i = 0; i < data.length; i++) {
                          if(data[i].etat == "Annulées"){
                              var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                          } else{
                              var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                          }
                          $('#tabcommands').append(line);

                        } 

                        //location.reload();
                       // $("."+data.id).remove();
                       // var line='<tr class="'+data.id+'"><td style="display:none;">'+data.id+'</td><td class="events">'+data.num_ramasse+'</td><td class="events">'+data.date_saisie+'</td><td class="events">'+data.date_ramasse+'</td><td class="events">'+data.nom_saisisseur+'</td><td class="events">'+data.code_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.adresse_client+'</td><td class="events">'+data.etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                      //   $('#tabcommands').append(line);
                         $('#new_date_ramasse').val("")
                         $('#new_houre_ramasse').val("");
                     },
                     error:function(error){
                       //  alert("echec de modification");
                     }
                 }); 
              }); 

            });
             

            });
            </script>

            <!--delcommand ajax code (useless for this view)-->       
     <script>
           $(document).ready(function(){
            $(document).on("click", "a.delbtn" , function() {
            $('#deleteCommand').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#iddelcommand').val(data[0]);
        /*    $(document).on("click","#delete",function(e){
                e.preventDefault();
                var id=$('#iddeluser').val();
                //alert(id);

                   $.ajax({
                     type:"delete",
                     url:"/delete",
                     data:id,
                    // data:$(this).serialize(),
                     success:function(response){
                        $('#deleteUser').modal('hide'); 
                        alert("Utilisateur a été modifié avec succes");
                        location.reload();
                     },
                     error:function(error){
                         alert("echec de modification");
                     }
                 });

            });*/
              });

              $('#deleteFormID').on('submit',function(e){
               e.preventDefault();
               var id=$('#iddelcommand').val();
               var mydata={
                   id:id,
               }
                 //alert(mydata.id);
               $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     type:"delete",
                     url:"/deleteCommand",
                     data:mydata,
                     success:function(data,response){
                       // $('#deleteCommand').modal('hide'); 
                       $(".modal").modal('hide');
                    $('#success_modal').modal('show');

                     setTimeout(function() {
                     $('#success_modal').modal('hide');
                     }, 2000);
                        //alert("Utilisateur a été modifié avec succes");
                        //location.reload();
                        //$("#tabusers").children().remove();
                        $("."+data.id).remove();
                     },
                     error:function(error){
                        console.log(error);
                     }
                 }); 

              })

            });
            </script>
          
        <!--display the appropriate Modal after click on events class (useless for this view)
          <script>
          $(document).ready(function(){
          
            $(document).on("click", ".events" , function() {
                $tr=$(this).closest('tr');
                var data=$tr.children("td").map(function(){
                return $(this).text();
                }).get();
              //  $('#affecter').modal('show');
               var etat= data[9];
               $(".num-demande").text(data[1]);
               $(".id-demande").val(data[0]);
               // $('#mod_num_ramasse').text(data[1]);
               // $('#old_date_ramasse').val(data[3]);
               // alert("hello state "+ etat);
               if(etat=="Nouvelle Demande"){
                $('#affecter').modal('show');
                
               }
               else if(etat=="affectées"){
                $('#confirmer').modal('show');
               }
               
          })

          });

          </script>-->

          <!--assignment part (useless for this view)
          <script>
          $(document).ready(function(){
          
          $("#affecter-btn").click(function(){
               var id_dem=$(".id-demande").val();
              //alert('id demande: '+id); //selected filters
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
              var data={
                id:id_dem,
                 //filters
                 param_du_filter:du_filter,
                      param_au_filter:audate,
                      param_agence_filter : agence_filter,
                      param_secteur_filter : secteur_filter,
                      param_etat_filter : etat_filter
              }
              var url_="{{route('SelectedCommandById')}}";
                $.get( url_ , data , function(data, response){
                 //alert(data[0].code_client);
                 //$('#code_benificiaire').val(data[0].code_client);
                 //$('#benificiaires_list').html('');
                 $("#id_dem").val(data[0].id);
                 $("#num_ramasse_af").val(data[0].num_ramasse);
                 $("#date-saisie-af").val(data[0].date_ramasse);
                 $("#nom-saisisseur-af").val(data[0].nom_saisisseur);
                 $("#source-af").val(data[0].source);
                 $("#canal-af").val(data[0].canal_d_appel);
                 $("#type-af").val(data[0].type);
                 $("#client-af").val(data[0].nom_client);
                 $("#benif-af").val(data[0].nom_benificiaire);
                 $("#agence-af").val(data[0].agence_client);
                 $("#secteur-af").val(data[0].secteur_client);
                 $("#adresse-af").val(data[0].adresse_client);
                 $("#access-af").text(data[0].acces_poids_lourds);
                 $("#num-colis-af").text(data[0].nbr_colis);
                 $("#nature-colis-af").text(data[0].nature_colis);
                 $("#mesure-af").text(data[0].mesure);
                 $("#type-camion-af").text(data[0].type_camion);
                 $("#hayon-af").text(data[0].hayon);
                 $("#date-ramasse-af").val(data[0].date_ramasse);
                 $("#commentaire-af").val(data[0].commentaire);

                  $("#affecte-ramasseur").modal("show");
                 // alert("success");
                  

               })
             
          })

          });

          </script> -->

          <!--(useless for this view)-->
          <script>
          $(document).ready(function (){

              //select driver with matricule

              $('#matricule-ramasseur').on('keyup', function(){
                
                 var url_ = "{{ route('SelectedRamasseurByMatricule') }}";
                 var mat_ramasseur=$(this).val().toUpperCase();
                 var agence_af=$("#agence-af").val();
                 my_data={
                    matricule:mat_ramasseur,
                    agence:agence_af
                 }
                 if(mat_ramasseur !=''){
                     $.get( url_ , my_data , function(data, response){      
                     $('#nom-ramasseur-af').val(data[0].nom);      
                  })
                   } else {
                     $('#nom-ramasseur-af').val("");
                      } 
                  });



            //select ramasseur with nom_ramasseur
            $('#nom-ramasseur-af').on('keyup', function(){
         
             var url_="{{route('fetchram')}}";
             var nom_ramasseur=$(this).val();
             var agence_af=$("#agence-af").val();
             var mydata={
                 nm:nom_ramasseur,
                 agence:agence_af
             };
             if(nom_ramasseur !=''){
             $.get( url_ , mydata , function(data, response){
             //$('#clients_list').fadeIn();
             $('#ramasseurs_list').html(data);
             //alert(data);
              }) 
             }
            else{
             $('#ramasseurs_list').html('');
             }
         });

          //clickable li for autocomplete-search-ram
          $(document).on("click", "a.autocomplete-search-ram" , function() {
                var nom_ramasseur=$(this).text();
                $("#nom-ramasseur-af").val(nom_ramasseur);
                var url_="{{route('SelectedRamasseurByName')}}";
                $.get( url_ , {nm:nom_ramasseur} , function(data, response){
                 //alert(data[0].code_client);
                 $('#matricule-ramasseur').val(data[0].matricule);
                 $('#ramasseurs_list').html(''); 
               })
             }); 


              //valider l'affectation
             $('#affecteRamasseurForm').on('submit',function(e){
                  e.preventDefault();
                  var id=$('#id_dem').val();
                  var ramasseur_af= $('#nom-ramasseur-af').val()



                   //selected filters
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
                      id:id,
                      ramasseur:ramasseur_af,
                       //filters
                       param_du_filter:du_filter,
                      param_au_filter:audate,
                      param_agence_filter : agence_filter,
                      param_secteur_filter : secteur_filter,
                      param_etat_filter : etat_filter
                  }
                                 
                 $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     type:"PUT",
                     url:"/assigncommand",
                     data:mydata,
                     success:function(data,response){
                       // $('#affecte-ramasseur').modal('hide'); 
                       // $('#succes').modal('show'); 
                       $(".modal").modal('hide');
                       $('#success_modal').modal('show');

                        setTimeout(function() {
                        $('#success_modal').modal('hide');
                        }, 2000);
                        //alert("Utilisateur a été modifié avec succes");
                        //location.reload();
                        $('#tabcommands').html("");

                        for (var i = 0; i < data.length; i++) {
                          if(data[i].etat == "Annulées"){
                              var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px" hidden><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                          } else{
                              var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                          }
                          $('#tabcommands').append(line);

                        } 

                        /*
                        $("."+data.id).remove();
                        var line='<tr class="'+data.id+'"><td style="display:none;">'+data.id+'</td><td class="events">'+data.num_ramasse+'</td><td class="events">'+data.date_saisie+'</td><td class="events">'+data.date_ramasse+'</td><td class="events">'+data.nom_saisisseur+'</td><td class="events">'+data.code_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.adresse_client+'</td><td class="events">'+data.etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                         $('#tabcommands').append(line); */
                         $('#matricule-ramasseur').val("")
                         $('#nom-ramasseur-af').val("");
                     },
                     error:function(error){
                         alert("echec");
                     }
                 }); 
              }); 

        
        })
        </script>

        <!--confirmer une demande (useless for this view)-->
        <script>
            $(document).ready(function(){
                $("#confirmer-btn").click(function(){
                    var id=$(".id-demande").val();
                   // alert(id);



                    //selected filters
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
                      id:id,
                       //filters
                       param_du_filter:du_filter,
                      param_au_filter:audate,
                      param_agence_filter : agence_filter,
                      param_secteur_filter : secteur_filter,
                      param_etat_filter : etat_filter    
                  }
                                 
                 $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     type:"PUT",
                     url:"/confirm",
                     data:mydata,
                     success:function(data,response){
                       // $('#confirmer').modal('hide'); 
                       // $('#succes').modal('show'); 
                       $(".modal").modal('hide');
                       $('#success_modal').modal('show');

                        setTimeout(function() {
                        $('#success_modal').modal('hide');
                        }, 2000);
                        //alert("Utilisateur a été modifié avec succes");
                        //location.reload();
                        $('#tabcommands').html("");

                        for (var i = 0; i < data.length; i++) {
                          if(data[i].etat == "Annulées"){
                              var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px" hidden><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                          } else{
                              var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                          }
                          $('#tabcommands').append(line);

                        } 
                    /*    $("."+data.id).remove();
                        var line='<tr class="'+data.id+'"><td style="display:none;">'+data.id+'</td><td class="events">'+data.num_ramasse+'</td><td class="events">'+data.date_saisie+'</td><td class="events">'+data.date_ramasse+'</td><td class="events">'+data.nom_saisisseur+'</td><td class="events">'+data.code_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.adresse_client+'</td><td class="events">'+data.etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                         $('#tabcommands').append(line);*/
                       // $('#refresh').load(window.location.href+('#refresh'));
                     },
                     error:function(error){
                         alert("echec");
                     }
                 }); 


                })
            })
        </script>

</script>

<!--annuler une demande (useless for this view)-->
<script>
    $(document).ready(function(){
       
          $(".annuler_modal").click(function(){
              $("#motif").html("");
             //select motifs
             $.get("{{ route('AllMotifs') }}", function(data, response){
                  var motifs="<option value='' selected disabled>--Select Motif--</option>";
                for (var i = 0; i < data.length; i++) {
                   motifs=motifs+ '<option value="'+data[i].motif+'">'+data[i].motif+'</option>';
                }
                $("#motif").append(motifs);
            })
           $("#annuler").modal('show');

          })
        $("#annuler-btn").click(function(){
            var id=$(".id-demande").val();
            var motif=$("#motif").val();
            //alert(id+" " +motif);


             //selected filters
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
              id:id,
              motif:motif,
               //filters
               param_du_filter:du_filter,
               param_au_filter:audate,
               param_agence_filter : agence_filter,
               param_secteur_filter : secteur_filter,
               param_etat_filter : etat_filter    
          }              
         $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             type:"PUT",
             url:"/cancel",
             data:mydata,
             success:function(data,response){
                $("#motif").val("");
               // $('#annuler').modal('hide'); 
               // $('#succes').modal('show'); 
               $(".modal").modal('hide');
                    $('#success_modal').modal('show');

                     setTimeout(function() {
                     $('#success_modal').modal('hide');
                     }, 2000);

                     $('#tabcommands').html("");

                     for (var i = 0; i < data.length; i++) {
                       if(data[i].etat == "Annulées"){
                           var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px" hidden><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                       } else{
                           var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                       }
                       $('#tabcommands').append(line);

                     } 

              /*  $("."+data.id).remove();
                
                var line='<tr class="'+data.id+'" data-toggle="tooltip" title="'+data[i].motif+'" ><td style="display:none;">'+data.id+'</td><td class="events">'+data.num_ramasse+'</td><td class="events">'+data.date_saisie+'</td><td class="events">'+data.date_ramasse+'</td><td class="events">'+data.nom_saisisseur+'</td><td class="events">'+data.code_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.nom_client+'</td><td class="events">'+data.adresse_client+'</td><td class="events">'+data.etat+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px; margin-bottom:3px" hidden><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                 $('#tabcommands').append(line); */

               // $('#refresh').load(window.location.href+('#refresh'));
             },
             error:function(error){
                 alert("echec");
             }
         }); 


        })
    })
</script>

<!--refresh button -->
<script>
$(document).ready(function(){

//succes modal events
$("#refresh_btn").click(function(){
  // alert("test");
   //selected filters
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
                    var line='<tr class="'+data[i].id+' tr_click" data-toggle="tooltip" title="'+data[i].motif+'" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                } else{
                    var line='<tr class="'+data[i].id+' tr_click"><td style="display:none;">'+data[i].id+'</td><td class="events">'+data[i].num_ramasse+'</td><td class="events">'+data[i].date_saisie+'</td><td class="events">'+data[i].date_ramasse+'</td><td class="events">'+data[i].nom_saisisseur+'</td><td class="events">'+data[i].code_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].nom_client+'</td><td class="events">'+data[i].adresse_client+'</td><td class="events">'+data[i].etat+'</td><tr/>';
                }
                $('#tabcommands').append(line);
                
            }
          });

})


})

</script>


<!--dashboard-->
<script>
  $(document).ready(function(){
    $.ajax({
          url: "{{ route('dashboard') }}",
          success: 
            function(data){
              $("#dem").text(data[0]);
              $("#nv_dem").text(data[1]);
              $("#af_dem").text(data[2]);
              $("#an_dem").text(data[3]);

              if(data[1] != 0){
                // $("#nv_dem_title").addClass("nouvelle-demande");
                 $("#nv_dem_title").removeClass("text-info");
               // alert("test");
               //  $("#nv_dem").addClass("nouvelle-demande");
              } else{
                  $("#nv_dem_title").addClass("text-info");  
               //   $("#nv_dem_title").removeClass("nouvelle-demande");  
              }
  
              if(data[2] != 0){
               //  $("#af_dem_title").addClass("nouvelle-demande");
                 $("#af_dem_title").removeClass("text-info");
               // alert("test");
               //  $("#nv_dem").addClass("nouvelle-demande");
              } else{
                  $("#af_dem_title").addClass("text-warning");
               //   $("#af_dem_title").removeClass("nouvelle-demande");  
    
              }
              // if(data[1] != 0){
              //    $("#nv_dem_title").addClass("nouvelle-demande");
              //  // alert("test");
              //  //  $("#nv_dem").addClass("nouvelle-demande");
              // } else{
              //     $("#nv_dem_title").addClass("text-info");    
              // }
  
              // if(data[2] != 0){
              //    $("#af_dem_title").addClass("nouvelle-demande");
              //  // alert("test");
              //  //  $("#nv_dem").addClass("nouvelle-demande");
              // } else{
              //     $("#af_dem_title").addClass("text-warning");    
              // }
             // setInterval(sendRequest, 10000);
          },
          complete: function() {
         // Schedule the next request when the current one's complete
       //  setInterval(sendRequest, 10000); // The interval set to 5 seconds
       }
      });
    setInterval(sendRequest,10000);
    function sendRequest(){
        $.ajax({
          url: "{{ route('dashboard') }}",
          success: 
            function(data){
              $("#dem").text(data[0]);
              $("#nv_dem").text(data[1]);
              $("#af_dem").text(data[2]);
              $("#an_dem").text(data[3]);

              if(data[1] != 0){
                 $("#nv_dem_title").removeClass("text-info");
              //   $("#nv_dem_title").addClass("nouvelle-demande");
               // alert("test");
               //  $("#nv_dem").addClass("nouvelle-demande");
              } else{
              //    $("#nv_dem_title").removeClass("nouvelle-demande"); 
                  $("#nv_dem_title").addClass("text-info");   
              }
  
              if(data[2] != 0){
              //   $("#af_dem_title").addClass("nouvelle-demande");
                 $("#af_dem_title").removeClass("text-info");
               // alert("test");
               //  $("#nv_dem").addClass("nouvelle-demande");
              } else{
                  $("#af_dem_title").addClass("text-warning");
               //   $("#af_dem_title").removeClass("nouvelle-demande");  
    
              }
              // if(data[1] != 0){
              //    $("#nv_dem_title").addClass("nouvelle-demande");
              //  // alert("test");
              //  //  $("#nv_dem").addClass("nouvelle-demande");
              // } else{
              //     $("#nv_dem_title").addClass("text-info");    
              // }
  
              // if(data[2] != 0){
              //    $("#af_dem_title").addClass("nouvelle-demande");
              //  // alert("test");
              //  //  $("#nv_dem").addClass("nouvelle-demande");
              // } else{
              //     $("#af_dem_title").addClass("text-warning");    
              // }
             // setInterval(sendRequest, 10000);
          },
          complete: function() {
         // Schedule the next request when the current one's complete
       //  setInterval(sendRequest, 10000); // The interval set to 5 seconds
       }
      });
    };
              });
  </script>





<!--addclient ajax code-->
<script>
  $(document).ready( function(){



      //show add modal
      $(document).on("click", ".addclient" , function() {
      
          $('#addClient').modal('show');

      //code client
      url_code_client="{{route('codeClient')}}";
      $.get( url_code_client , function(data, response){
         $("#code_client_ajout").val(data);
      })
      
      //current date
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      var hh=today.getHours();
      var mn=today.getMinutes();

       if(dd<10) {
       dd = '0'+dd
        } 

       if(mm<10) {
       mm = '0'+mm
        } 

       today = dd + '/' + mm + '/' + yyyy;
       var time = hh +':' + mn;
       $('#date_de_creation').val(today);
       });


             //select agences
             $.get("{{ route('AllAgences') }}", function(data, response){
          
          for (var i = 0; i < data.length; i++) {
              $('#agence_client_ajout').append('<option value="'+data[i].nom_agence+'">'+data[i].nom_agence+'</option>');
          }
      })

      //select sectors
      var url_ = "{{ route('AllSectors') }}";
      var agence=$('#agence_client_ajout').val();
      //alert(agence);
      $('#secteur_client_ajout').html('');
      // $('#commercial_client').html('');
      // $('#commercial_client').append('<option value="" disabled selected>--SELECT COMMERCIAL--</option>');
      $.get( url_ , {ag:agence} , function(data, response){
      var options=''; 
      var default_option='<option value="" disabled selected>--SELECT SECTEUR--</option>';   
      for (var i = 0; i < data.length; i++) {
      options= options +'<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>';
      //$('#secteur_client').append('<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
       }
       var secteurs=default_option+options;
       $('#secteur_client_ajout').append(secteurs);
      })
      


    //   //select commercial (useless in this view)
    //   $('#secteur_client').change( function(){
      
    //   var url_ = "{{ route('AllCommercials') }}";
    //   var secteur=$(this).val();
    //  // alert(secteur);
    //   $('#commercial_client').html('');
    //   $.get( url_ , {sec:secteur} , function(data, response){
    //     //var name= data[0].nom_commercial;
    //    // alert(name);
    //    var options='';
    //    var default_option='<option value="" disabled selected>--SELECT COMMERCIAL--</option>';
    //   for (var i = 0; i < data.length; i++) {
    //       options = options + '<option value="'+data[i].nom_commercial+'">'+data[i].nom_commercial+'</option>';
    //  // $('#commercial_client').append('<option value="'+data[i].nom_commercial+'">'+data[i].nom_commercial+'</option>');
    //    }
    //    var commerciaux = default_option + options;
    //    $('#commercial_client').append(commerciaux);
    //   }) 

    //   });



      


      //submit
      $('#save2').on('click',function(e){
        e.preventDefault();
        //var totalFormData=new FormData($('#addform')[0]);
        $.ajax({
          type:"POST",
          url:"{{route('storeclient')}}",
          data:$('#addClientForm').serialize(),
          success:function(data,response){
             // alert('Client a été ajouté avec succes');
              $('#addClient').modal('hide');

              $('#success_modal').modal('show');

                setTimeout(function() {
                    $('#success_modal').modal('hide');
                }, 2000);

              $('#code_client_ajout').val('');
              $('#nom_client_ajout').val('');
              $('#agence_client_ajout').val('');
              $('#secteur_client_ajout').val('');
           //   $('#commercial_client_ajout').val('');
              $('#num_tel_client_ajout').val('');
              $('#adresse_client_ajout').val('');
              $('#date_de_creation_ajout').val('');
          },
          error:function(error){
            //  alert('erreur');
              $("#code_client_error").text("");
              $("#nom_client_error").text("");
              $("#agence_client_error").text("");
              $("#secteur_client_error").text("");
              $("#commercial_client_error").text("");
              $("#adresse_client_error").text("");
          
              //console.log(error);
              var response=$.parseJSON(error.responseText);
              //alert(response.errors);
              $.each(response.errors,function(key,val){
                 $("#"+key+"_error").text(val[0]);
              }); 
          }
        });
      });


  });
</script>


<!--num tel field-->
<script>
  $(document).ready(function(){
  $("#num_tel_client").on("keyup",function(){
      var num=$("#num_tel_client").val();
      if(num.length == 2 || num.length == 5 || num.length == 8 || num.length == 11){
          num=num+"-";
          $("#num_tel_client").val(num);
      }
  })
  
  
  })
  
  </script>



 <!--showing dem informations part-->
 <script>
  $(document).ready(function(){


    $(document).on("click", ".events" , function() {

                $tr=$(this).closest('tr');
                var data=$tr.children("td").map(function(){
                return $(this).text();
                }).get();
        
              var id_dem=data[0];
      var data2={
        id:id_dem,
      }
      var url_="{{route('SelectedCommandById')}}";
        $.get( url_ , data2 , function(data, response){
         $("#num_ramasse_sh").text(data[0].num_ramasse);
         $("#date-saisie-sh").val(data[0].date_ramasse);
         $("#nom-saisisseur-sh").val(data[0].nom_saisisseur);
         $("#source-sh").val(data[0].source);
         $("#canal-sh").val(data[0].canal_d_appel);
         $("#type-sh").val(data[0].type);
         $("#client-sh").val(data[0].nom_client);
         $("#benif-sh").val(data[0].nom_benificiaire);
         $("#agence-sh").val(data[0].agence_client);
         $("#secteur-sh").val(data[0].secteur_client);
         $("#adresse-sh").val(data[0].adresse_client);
         $("#access-sh").text(data[0].acces_poids_lourds);
         $("#num-colis-sh").text(data[0].nbr_colis);
         $("#nature-colis-sh").text(data[0].nature_colis);
         $("#mesure-sh").text(data[0].mesure);
         $("#type-camion-sh").text(data[0].type_camion);
         $("#hayon-sh").text(data[0].hayon);
         $("#date-ramasse-sh").val(data[0].date_ramasse);
         $("#commentaire-sh").val(data[0].commentaire);
        // $("#matricule-ramasseur-sh").val(data[0].date_ramasse);
         $("#nom-ramasseur-sh").val(data[0].ramasseur);
         $("#show_dem_info").modal("show");
         // alert("success");
       })
              /////
             
              
               
          })

  });

  </script>


<!--button filtrer par-->
<script>
  $(document).ready(function(){
   // $("#up-icon").hide();
  $(".filtrer-par").on("click",function(){
      // $("#down-icon").addClass("hide");
      // $("#up-icon").removeClass("hide");
      $("#down-icon").toggle();
      $("#up-icon").toggle();
  })
  })
  </script>

<!--disabling enter key-->
<script>
  $(document).keypress(
    function(event){
      if (event.which == '13') {
        event.preventDefault();
      }
  });
</script>


{{-- zoom out my web page --}}
<script type="text/javascript">
  function zoom() {
      document.body.style.zoom = "90%" 
  }
</script>

{{-- modifier les informations de l'utilisateur --}}
<script>
  $(document).ready(function(){
      $('#editform2').on('submit',function(e){
            e.preventDefault();
            var totalFormData=new FormData($('#editform2')[0]);
            totalFormData.append('_method', 'put');
           // alert(totalFormData.modpassword);

           $.ajax({
               type:"POST",
               url:"{{ route('updateuser2') }}",
               processData: false,
               contentType: false,
               data:totalFormData,
              // data:$(this).serialize(),
               success:function(data,response){
                   $('#modpassword2').val('');
                   $('#modimage2').val('');
                  $('#changesettingsModal').modal('hide'); 

                  $('#success_modal').modal('show');

                   setTimeout(function() {
                       $('#success_modal').modal('hide');
                   }, 2000);
                   location.reload();
                   //window.location = "{{route('globstats3view')}}";
               },
               error:function(error){
                alert("Erreur");
               }
           });
        });
  });
  </script>


</body>

</html>