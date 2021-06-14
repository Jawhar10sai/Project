<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ramex</title>

     <!-- Custom fonts for this template-->
     <link href="{{asset('/customAuth/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('customAuth/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeopcallcenter')}}">
    <div class="sidebar-brand-icon" style="margin-top:30px">
        <i class="fas fa-user-tie"></i>
    </div>
    <div class="sidebar-brand-text mx-3" style="margin-top:30px">{{ Auth::user()->profil }}</div>
</a>


  
 



   <!-- Nav Item - Dashboard -->
   <li class="nav-item " style="margin-top:70px">
    <a class="nav-link" href="{{route('homeopcallcenter')}}">
       <i class="fas fa-home" style="font-size:20px"></i>
       <span style="font-size:17px">Accueil</span>
    </a>
 </li>

 <li class="nav-item active" >
    <a class="nav-link" href="{{route('showClientsCallCenter')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
   <span style="font-size:15px">Gestion des clients</span>   
    </a>
 </li>

 <li class="nav-item" >
    <a class="nav-link"  href="{{route('showCommandsCallCenter')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
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
                <button type="submit" class="btn btn-primary addclient"  href="#" data-toggle="modal" ><i class="fas fa-plus" style="margin-right:5px"></i>Nouveau client</button>
                
                <div class="row">
            <div class="col-md-12">
                <div class="form-content">    

           <h3 class="text-center">Liste des clients</h3>


            <!--searchbar-->
            <div class="container input-group rounded" style="margin-bottom:7px;padding-left:80px;padding-right:80px">
                <input type="search" id="secsearchbar" class="form-control rounded" placeholder="Que cherchez-vous ? " aria-label="Search" aria-describedby="search-addon"/>
                <button class="btn btn-primary" style="border-top-right-radius:20px;border-bottom-right-radius:20px;border-top-left-radius:0px;border-bottom-left-radius:0px"  disabled>
                  <i class="fas fa-search"></i>
                </button>
              </div>
                    

    
           <table class="table">
           <thead class="thead thead-dark ">
             <tr>
             <th>CODE</th>
             <th>NOM</th>
             <th>AGENCE</th>
             <th>SECTEUR</th>
         <!--    <th>COMMERCIAL</th> -->
             <th>NUM TEL</th>
             <th>ADRESSE</th>
             <th>ACTION</th>
             </tr>
             </thead>
             <tbody id="tabclients">
           
             </tbody>
           </table>
        </div>
        </div>
<!--my table end-->
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




       <!--delete user modal-->
    <div class="modal fade" id="deleteClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color:#ff0f0f;border-radius:20px;color:white;height:250px"> 

            <form id="deleteFormID">
             <div class="modal-body"> 
             {{csrf_field()}}
             {{method_field('delete')}}
             <input type="hidden" name="iddelclient" id="iddelclient" value="">
             <div class="row">
                <div class="col-md-4"> <img src="{{ asset('customAuth/images/warning.gif') }}" alt="" style="width:150px;height:150px"></div>
                <div class="col-md-8" style="padding-top:50px;padding-left:50px"><center><h3>Voulez vous vraiment supprimer ce client?</h3></center></div>
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
                                <input id="code_client" type="hidden" class="form-control form-control-user @error('code_client') is-invalid @enderror"
                                 name="code_client" value="{{ old('code_client') }}" placeholder="Code Client">
                                <small id="code_client_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input id="nom_client" type="text" class="form-control form-control-user @error('nom_client') is-invalid @enderror"
                                 name="nom_client" value="{{ old('nom_client') }}" placeholder="Nom Client" autocomplete="nom_client">
                                <small id="nom_client_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('agence_client') is-invalid @enderror" id="agence_client"
                                name="agence_client" value="{{ old('agence_client') }}" style="border-radius:10rem;font-size:.9rem;"  >
                                {{-- <option value="" selected disabled>--Select AGENCE--</option> --}}
                              </select>
                              <small id="agence_client_error" class="form-text text-danger"></small>
                            </div>
                      </div>
        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <select class="form-control @error('secteur_client') is-invalid @enderror" id="secteur_client"
                                  name="secteur_client" value="{{ old('secteur_client') }}" style="border-radius:10rem;font-size:.9rem;"  >
                                <option value="" selected disabled>--Select SECTEUR--</option>
                                </select>
                                <small id="secteur_client_error" class="form-text text-danger"></small>
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
                                <input id="num_tel_client" type="tel"  pattern="[0-9]"  maxlength="14" class="form-control form-control-user @error('num_tel_client') is-invalid @enderror"
                                 name="num_tel_client" value="{{ old('num_tel_client') }}" placeholder="Exemple: 06-36-36-36-36">
                                <small id="num_tel_client_error" class="form-text text-danger"></small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <textarea id="adresse_client" rows="3" class="form-control form-control-user @error('adresse_client') is-invalid @enderror"
                                 name="adresse_client" value="{{ old('adresse_client') }}" placeholder="Adresse" autocomplete="adresse_client"></textarea>
                                <small id="adresse_client_error" class="form-text text-danger"></small>
                            </div>
                        </div>
                        
                      <center>  
                        <button type="submit" id="save" class="btn btn-primary">Enregistrer </button>
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


    <!--edit client modal begin-->
<!-- Modal -->
<div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Modifier un client</h5>
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
                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input id="modnom_client" type="text" class="form-control form-control-user @error('nom_client') is-invalid @enderror"
                                 name="modnom_client" value="{{ old('nom_client') }}" style="border-radius:10rem;font-size:.9rem;" placeholder="Nom Client" autocomplete="nom_client" required>
                                <small id="modnom_client_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('agence_client') is-invalid @enderror" id="modagence_client"
                                name="modagence_client" value="{{ old('agence_client') }}" style="border-radius:10rem;font-size:.9rem;"  >
                                <option value="" disabled>--Select AGENCE--</option>
                              </select>
                              <small id="modagence_client_error" class="form-text text-danger"></small>
                            </div>
                      </div>
        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <select class="form-control @error('secteur_client') is-invalid @enderror" id="modsecteur_client"
                                  name="modsecteur_client" value="{{ old('secteur_client') }}" style="border-radius:10rem;font-size:.9rem;"  >
                                <option value="" disabled>--Select SECTEUR--</option>
                                </select>
                                <small id="modsecteur_client_error" class="form-text text-danger"></small>
                            </div>
                        </div>
          
                        <!--
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('commercial_client') is-invalid @enderror" id="modcommercial_client"
                               name="modcommercial_client" value="{{ old('commercial_client') }}" style="border-radius:10rem;font-size:.9rem;">
                                <option value="" selected disabled>--Select COMMERCIAL--</option>
                              </select>
                              <small id="modcommercial_client_error" class="form-text text-danger"></small>
                            </div>
                        </div> -->


                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <input type="text" id="modnum_tel_client" class="form-control form-control-user @error('num_tel_client') is-invalid @enderror"
                               name="modnum_tel_client" value="{{ old('num_tel_client') }}" style="border-radius:10rem;font-size:.9rem;">
                               
                              </select>
                              <small id="modcommercial_client_error" class="form-text text-danger"></small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <textarea id="modadresse_client" rows="3" class="form-control form-control-user @error('adresse_client') is-invalid @enderror"
                                 name="modadresse_client" value="{{ old('adresse_client') }}" placeholder="Adresse" autocomplete="adresse_client" required ></textarea>
                                <small id="modadresse_client_error" class="form-text text-danger"></small>
                            </div>
                        </div>
        
                      <center>
                        <button type="submit" class="btn btn-primary">Enregistrer </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
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


<!--Affichage dans la table-->
<script>
$(document).ready(function(){
    $.get("{{ route('clients') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {

                    var line='<tr class="'+data[i].id+'"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].code_client+'</td><td>'+data[i].nom_client+'</td><td>'+data[i].agence_client+'</td><td>'+data[i].secteur_client+'</td><td>'+data[i].num_tel+'</td><td>'+data[i].adresse_client+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                    $('#tabclients').append(line);
                }
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





<!--addclient ajax code-->
<script>
        $(document).ready( function(){



            //show add modal
            $(document).on("click", ".addclient" , function() {
            
                $('#addClient').modal('show');

            //code client
            url_code_client="{{route('codeClient')}}";
            $.get( url_code_client , function(data, response){
               $("#code_client").val(data);
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
                    $('#agence_client').append('<option value="'+data[i].nom_agence+'">'+data[i].nom_agence+'</option>');
                    $('#modagence_client').append('<option value="'+data[i].nom_agence+'">'+data[i].nom_agence+'</option>');
                }
            })
            //select sectors
          //  $('#agence_client').change( function(){
            
            var url_ = "{{ route('AllSectors') }}";
            var agence=$('#agence_client').val();
            //alert(agence);
            $('#secteur_client').html('');
            $('#commercial_client').html('');
            $('#commercial_client').append('<option value="" disabled selected>--SELECT COMMERCIAL--</option>');
            $.get( url_ , {ag:agence} , function(data, response){
            var options=''; 
            var default_option='<option value="" disabled selected>--SELECT SECTEUR--</option>';   
            for (var i = 0; i < data.length; i++) {
            options= options +'<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>';
            //$('#secteur_client').append('<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
             }
             var secteurs=default_option+options;
             $('#secteur_client').append(secteurs);
            })
         //   });


            //select commercial (useless in this view)
            $('#secteur_client').change( function(){
            
            var url_ = "{{ route('AllCommercials') }}";
            var secteur=$(this).val();
           // alert(secteur);
            $('#commercial_client').html('');
            $.get( url_ , {sec:secteur} , function(data, response){
              //var name= data[0].nom_commercial;
             // alert(name);
             var options='';
             var default_option='<option value="" disabled selected>--SELECT COMMERCIAL--</option>';
            for (var i = 0; i < data.length; i++) {
                options = options + '<option value="'+data[i].nom_commercial+'">'+data[i].nom_commercial+'</option>';
           // $('#commercial_client').append('<option value="'+data[i].nom_commercial+'">'+data[i].nom_commercial+'</option>');
             }
             var commerciaux = default_option + options;
             $('#commercial_client').append(commerciaux);
            }) 

            });



            //select mod sectors for mod modal
            $('#modagence_client').change( function(){
            
            var url_ = "{{ route('AllSectors') }}";
            var agence=$('#modagence_client').val();
            //alert(agence);
            $('#modsecteur_client').html('');
            $('#commercial_client').append('<option value="" disabled selected>--SELECT COMMERCIAL--</option>');
            $.get( url_ , {ag:agence} , function(data, response){
            for (var i = 0; i < data.length; i++) {
            $('#modsecteur_client').append('<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
             }
            })
            }); 


                //select mod commercial
            $('#modsecteur_client').change( function(){
            
            var url_ = "{{ route('AllCommercials') }}";
            var secteur=$(this).val();
           // alert(secteur);
            $('#modcommercial_client').html('');
            $.get( url_ , {sec:secteur} , function(data, response){
              //var name= data[0].nom_commercial;
             // alert(name);
             var options='';
             var default_option='<option value="" disabled selected>--SELECT COMMERCIAL--</option>';
            for (var i = 0; i < data.length; i++) {
                options = options + '<option value="'+data[i].nom_commercial+'">'+data[i].nom_commercial+'</option>';
           // $('#commercial_client').append('<option value="'+data[i].nom_commercial+'">'+data[i].nom_commercial+'</option>');
             }
             var commerciaux = default_option + options;
             $('#modcommercial_client').append(commerciaux);
            }) 

            });
  

            //submit
            $('#save').on('click',function(e){
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

                    $('#code_client').val('');
                    $('#nom_client').val('');
                    $('#agence_client').val('');
                    $('#secteur_client').val('');
                    $('#commercial_client').val('');
                    $('#num_tel_client').val('');
                    $('#adresse_client').val('');
                    $('#date_de_creation').val('');

                    $("#tabclients").html('');

                    //console.log(response);
                    //$('#addUser').modal('hide');
                     //alert(data.code_client);
                     for (var i = 0; i < data.length; i++) {
                        var line='<tr class="'+data[i].id+'"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].code_client+'</td><td>'+data[i].nom_client+'</td><td>'+data[i].agence_client+'</td><td>'+data[i].secteur_client+'</td><td>'+data[i].num_tel+'</td><td>'+data[i].adresse_client+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                        $('#tabclients').append(line);
                     }
                     /*add one line*/
                 //   var newline='<tr class="'+data.id+'"><td style="display:none;">'+data.id+'</td><td>'+data.code_client+'</td><td>'+data.nom_client+'</td><td>'+data.agence_client+'</td><td>'+data.secteur_client+'</td><td>'+data.commercial_client+'</td><td>'+data.adresse_client+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                 //   $('#tabclients').append(newline);  
                   // alert('Utilisateur a été ajouté avec succes');
                    //location.reload();
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

    <!--Search bar-->
           <script>
           $(document).ready(function(){
           $("#searchbar").on("keyup", function() {
             var value = $(this).val().toLowerCase();
           $("#tabclients tr").filter(function() {
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
            $("#tabclients tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
             });
             });
             </script>

     <!--modCLIENT ajax code-->       
     <script>
           $(document).ready(function(){
           
            $(document).on("click", "a.editbtn" , function() {
            $('#editClient').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();
           // alert(data);

            $('#id').val(data[0]);
            //$('#code_client').val(data[1]);
            $('#modnom_client').val(data[2]);
            $('#modagence_client option').attr('selected', false);
            $('#modagence_client option[value="'+data[3]+'"]').attr('selected', true);

            //code secteur
                  var url_ = "{{ route('AllSectors') }}";
                  var agence=data[3];
                  //alert(agence);
                  $('#modsecteur_client').html('');
                  var selected='';
                  var sec=data[4];
                  $.get( url_ , {ag:agence} , function(data, response){
                  for (var i = 0; i < data.length; i++) {
                    //alert(data[i].nom_secteur+' '+ sec); 
                    if(data[i].nom_secteur == sec){
                        selected='<option value="'+data[i].nom_secteur+'" selected>'+data[i].nom_secteur+'</option>';
                      }
                      else{
                          selected='<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>';
                      }
                      $('#modsecteur_client').append(selected);
                    //if(data[i].nom_secteur == data[4]){'selected="selected"'}
                 // $('#modsecteur_client').append('<option '++' value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
                  }
                  }) 
                 //code commercial
                 var url_2 = "{{ route('AllCommercials') }}";
                  var secteur=data[4];
                  //alert(agence);
                  $('#modcommercial_client').html('');
                  var selected2='';
                  var com=data[5];
                  $.get( url_2 , {sec:secteur} , function(data, response){
                  for (var i = 0; i < data.length; i++) {
                    //alert(data[i].nom_secteur+' '+ sec); 
                    if(data[i].nom_commercial == com){
                        selected2='<option value="'+data[i].nom_commercial+'" selected>'+data[i].nom_commercial+'</option>';
                      }
                      else{
                          selected2='<option value="'+data[i].nom_commercial+'">'+data[i].nom_commercial+'</option>';
                      }
                      $('#modcommercial_client').append(selected2);
                    //if(data[i].nom_secteur == data[4]){'selected="selected"'}
                 // $('#modsecteur_client').append('<option '++' value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
                  }
                  }) 

                  $('#modnum_tel_client').val(data[5]);
                  $('#modadresse_client').val(data[6]);
                   

              });
              
              $('#editform').on('submit',function(e){
                  e.preventDefault();

                 $.ajax({
                     type:"POST",
                     url:"{{route('updateClient')}}",
                     data:$(this).serialize(),
                     success:function(data,response){
                        $('#editClient').modal('hide'); 

                        $('#success_modal').modal('show');

                          setTimeout(function() {
                              $('#success_modal').modal('hide');
                          }, 2000);
                       // alert("Utilisateur a été modifié avec succes");
                        //location.reload();
                       // $("."+data.id).remove();
                      //  var line='<tr class="'+data.id+'"><td style="display:none;">'+data.id+'</td><td>'+data.code_client+'</td><td>'+data.nom_client+'</td><td>'+data.agence_client+'</td><td>'+data.secteur_client+'</td><td>'+data.commercial_client+'</td><td>'+data.adresse_client+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                      //  $('#tabclients').append(line);
                      $("#tabclients").html('');
                       for (var i = 0; i < data.length; i++) {
                          var line='<tr class="'+data[i].id+'"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].code_client+'</td><td>'+data[i].nom_client+'</td><td>'+data[i].agence_client+'</td><td>'+data[i].secteur_client+'</td><td>'+data[i].num_tel+'</td><td>'+data[i].adresse_client+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                          $('#tabclients').append(line);
                       }
                     },
                     error:function(error){
                         alert("echec de modification");
                     }
                 });
              }); 
             

            });
            </script>

            <!--deluser ajax code-->       
     <script>
           $(document).ready(function(){
            $(document).on("click", "a.delbtn" , function() {
            $('#deleteClient').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#iddelclient').val(data[0]);
              });

              $('#deleteFormID').on('submit',function(e){
               e.preventDefault();
               var id=$('#iddelclient').val();

               $.ajax({
                     type:"delete",
                     url:"{{route('deleteClient')}}",
                     data:$(this).serialize(),
                     success:function(data,response){
                        $('#deleteClient').modal('hide');
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
                        alert(error);
                     }
                 });

              })

            });
            </script>
</body>

</html>