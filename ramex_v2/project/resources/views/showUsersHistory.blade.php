
<?php
use App\Models\Users_historique;
$historiques = Users_historique::get();
?>


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

    {{-- datatable cdn --}}
    <link rel="stylesheet" href="css/jquery.dataTables.min.css" type="text/css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeadmin')}}">
    <div class="sidebar-brand-icon" style="margin-top:30px">
        <i class="fas fa-user-tie"></i>
    </div>
    <div class="sidebar-brand-text mx-3" style="margin-top:30px">{{ Auth::user()->profil }}</div>
</a>


  <!-- Divider -->
 
  

  <!-- Nav Item - Dashboard -->
  <li class="nav-item " style="margin-top:70px">
    <a class="nav-link" href="{{route('homeadmin')}}">
       <i class="fas fa-home" style="font-size:20px"></i>
       <span style="font-size:17px">Accueil</span>
    </a>
 </li>


 <li class="nav-item" >
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="false" aria-controls="collapseTwo">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
       <span style="font-size:18px">Gestion :</span>   
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('showUsers')}}">Gestion des utilisateurs</a> 
             <a class="collapse-item" href="{{route('showMotifs')}}">Gestion des motifs</a>
             <a class="collapse-item" href="{{route('showagencesview')}}">Gestion des agences</a>
                         <a class="collapse-item" href="{{route('showsectorsview')}}">Gestion des secteurs</a>
                         <a class="collapse-item" href="{{route('showCommercialsView')}}">Gestion des commerciaux</a>
        </div>
    </div>
 </li>



 <li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
    aria-expanded="false" aria-controls="collapseThree">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
       <span style="font-size:18px">Historique :</span>   
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('showClientsHistory')}}">Historique des clients</a> 
             <a class="collapse-item" href="{{route('showCommandsHistory')}}">Historique des demandes</a>
        </div>
    </div>
 </li>
 {{-- <li class="nav-item" >
    <a class="nav-link" href="{{route('showUsers')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
   <span style="font-size:14px">Gestion des utilisateurs</span>   
    </a>
 </li>

 <li class="nav-item" >
    <a class="nav-link"  href="{{route('showMotifs')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
       <span style="font-size:17px">Gestion des motifs</span>
    </a>
 </li>

 <li class="nav-item" >
    <a class="nav-link" href="{{route('showClientsHistory')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
   <span style="font-size:15px">Historique des clients</span>   
    </a>
 </li>


 <li class="nav-item active" >
    <a class="nav-link" href="{{route('showCommandsHistory')}}">
       <i class="fas fa-fw fa-cog" style="font-size:17px"></i>
   <span style="font-size:13px">Historique des demandes</span>   
    </a>
 </li> --}}


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

                    <!-- Topbar Search -->
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="search" id="searchbar" class="form-control bg-light border-0 small" placeholder="Barre de recherche..." 
                                aria-label="Search" aria-describedby="basic-addon2" autofocus style="border: solid 1px">
                        </div>
                    </form> --}}

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
                <div class="container-fluid" style="min-height:79%">
                <!--my table begin-->
                
                <div class="row" style="margin-top:80px">
            <div class="col-md-12">
                <div class="form-content">    

           <h3 class="text-center">Liste des utilisateurs</h3>

           {{-- <!--searchbar-->
           <div class="container input-group rounded" style="margin-bottom:7px;padding-left:80px;padding-right:80px">
            <input type="search" id="secsearchbar" class="form-control rounded" placeholder="Que cherchez-vous ? " aria-label="Search" aria-describedby="search-addon"/>
            <button class="btn btn-primary" style="border-top-right-radius:20px;border-bottom-right-radius:20px;border-top-left-radius:0px;border-bottom-left-radius:0px"  disabled>
              <i class="fas fa-search"></i>
            </button>
          </div> --}}
    
           <table id="myTable" class="table">
           <thead class="thead thead-dark ">
             <tr>
             <th>ID</th>
             <th>NOM</th>
             <th>ACTION</th>
             <th>DATE ACTION</th>
             <th>UTILISATEUR</th>
             </tr>
             </thead>
             <tbody id="tabusershistory1">
                 @foreach ($historiques as $item)
                 <tr>
                    <td>{{$item->id_user}}</td>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->action}}</td>
                    <td>{{$item->date_action}}</td>
                    <td>{{$item->nom_user}}</td>
                </tr>
                 @endforeach
                 
           
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


    <!--delete user modal-->
    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color:#ff0f0f;border-radius:20px;color:white;height:250px"> 

                <form id="deleteFormID">
                 <div class="modal-body"> 
                 {{csrf_field()}}
                 {{method_field('delete')}}
                 <input type="hidden" name="iddeluser" id="iddeluser" value="">
                 <div class="row">
                    <div class="col-md-4"> <img src="{{ asset('customAuth/images/warning.gif') }}" alt="" style="width:150px;height:150px"></div>
                    <div class="col-md-8" style="padding-top:50px;padding-left:50px"><center><h3>Voulez vous vraiment supprimer cet utilisateur?</h3></center></div>
                </div>
            <!--     <i class="fas fa-exclamation-triangle" style="font-size:30px; color:#ffcc00"></i> Voulez vous vraiment supprimer cet utilisateur? -->
            <center>
                <button type="submit" id="delete" class="btn btn-danger btn-lg" >Supprimer</button>
                <button class="btn btn-secondary btn-lg" type="button" data-dismiss="modal">Annuler</button>
                </center>   
        </div>
               
                
                </form>
                
            </div>
        </div>
    </div>


 <!--add user modal begin-->
    
<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--begin of my form-->
        <div class="col-lg-12">
    
                    <form id="addform" class="user" enctype="multipart/form-data">
                     @csrf

                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('profil') is-invalid @enderror" id="profil"
                               name="profil" value="{{ old('profil') }}" style="border-radius:10rem;font-size:.9rem;" autofocus>
                                <option value="" selected disabled>--Select PROFIL--</option>
                              </select>
                              <small id="profil_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('agence') is-invalid @enderror" id="agence"
                                name="agence" value="{{ old('agence') }}" style="border-radius:10rem;font-size:.9rem;"  >
                                <option value="" selected disabled>--Select AGENCE--</option>
                              </select>
                              <small id="agence_error" class="form-text text-danger"></small>
                      </div>
                      </div>
        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <select class="form-control @error('secteur') is-invalid @enderror" id="secteur"
                                  name="secteur" value="{{ old('secteur') }}" style="border-radius:10rem;font-size:.9rem;"  >
                                <option value="" selected disabled>--Select SECTEUR--</option>
                                </select>
                                <small id="secteur_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                 name="name" value="{{ old('name') }}" placeholder="Name" autocomplete="name" >
                                <small id="name_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="">Image</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                 name="image" value="{{ old('image') }}" style="border-radius:10rem;font-size:.9rem;" autocomplete="image">
                                 <small id="image_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group">
                                <input id="email" type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                                 name="email" value="{{ old('email') }}" placeholder="Email Address" autocomplete="email">
                                 <small id="email_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                 <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                  name="password" placeholder="Password" autocomplete="new-password">
                                  <small id="password_error" class="form-text text-danger"></small>
                            </div>

                            <div class="col-sm-6">
                                <input id="password-confirm" type="password" class="form-control form-control-user"
                                name="password_confirmation" placeholder="Repeat Password" autocomplete="new-password">
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
    <!--add user modal end-->


    <!--edit user modal begin-->
<!-- Modal -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Modifier un utilisateur</h5>
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
                              <select class="form-control @error('modprofil') is-invalid @enderror" id="modprofil"
                               name="modprofil" style="border-radius:10rem;font-size:.9rem;" required autofocus>
                                <option value="def_profil" disabled>--Select PROFIL--</option>
                              </select>
                            </div>
                        </div>

                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('modagence') is-invalid @enderror" id="modagence"
                                name="modagence" style="border-radius:10rem;font-size:.9rem;"  required>
                                <option value="" selected disabled>--Select AGENCE--</option>
                              </select>
                      </div>
                      </div>
        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <select class="form-control @error('modsecteur') is-invalid @enderror" id="modsecteur"
                                  name="modsecteur" style="border-radius:10rem;font-size:.9rem;" required >
                                <option value="" selected disabled>--Select SECTEUR--</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input id="modname" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                 name="modname" placeholder=" Name" autocomplete="name" required>
                                 <small id="modname_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="">Image</label>
                                <input id="modimage" type="file" class="form-control"
                                 name="modimage" style="border-radius:10rem;font-size:.9rem;">
                        </div>

                        <div class="form-group">
                                <input id="modemail" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                 name="modemail" placeholder="Email Address" autocomplete="email">
                                 <small id="modemail_error" class="form-text text-danger"></small>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                 <input id="modpassword" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                  name="modpassword" placeholder="New Password" autocomplete="new-password">
                                  <small id="modpassword_error" class="form-text text-danger"></small>
                            </div>

                            <div class="col-sm-6">
                                <input id="modpassword-confirm" type="password" class="form-control form-control-user"
                                name="modpassword_confirmation" placeholder="Repeat Password" autocomplete="new-password" >
                                <small id="modpasswordconfirm_error" class="form-text text-danger"></small>
                            </div>
                        </div>
                      <center><button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer </button></center>
                    </form>
                
            </div>
        <!--end of my form-->
      </div>
    </div>
  </div>
</div>
    <!--edit user modal end-->



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


<!--Affichage dans la table-->
{{-- <script>
$(document).ready(function(){
    $.get("{{ route('AllClientsHistory') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {

                    var line='<tr class="'+data[i].id+'"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].code_client+'</td><td>'+data[i].nom_client+'</td><td>'+data[i].agence_client+'</td><td>'+data[i].secteur_client+'</td><td>'+data[i].action+'</td><td>'+data[i].date_action+'</td><td>'+data[i].nom_user+'</td><tr/>';
                    $('#tabclientshistory').append(line);
                }
            });
});
</script> --}}
<!--adduser ajax code-->
<script>
        $(document).ready( function(){
            //select profils
            $.get("{{ route('AllProfils') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {
                    $('#profil').append('<option value="'+data[i].nom_profil+'">'+data[i].nom_profil+'</option>');
                    $('#modprofil').append('<option value="'+data[i].nom_profil+'">'+data[i].nom_profil+'</option>');
                }
            })
            //select agences
            $.get("{{ route('AllAgences') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {
                    $('#agence').append('<option value="'+data[i].nom_agence+'">'+data[i].nom_agence+'</option>');
                    $('#modagence').append('<option value="'+data[i].nom_agence+'">'+data[i].nom_agence+'</option>');
                }
            })
            //select sectors
            $('#agence').change( function(){
            
            var url_ = "{{ route('AllSectors') }}";
            var agence=$('#agence').val();
            //alert(agence);
            $('#secteur').html('');
            $.get( url_ , {ag:agence} , function(data, response){
            for (var i = 0; i < data.length; i++) {
            $('#secteur').append('<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
             }
            })

            });
            //select mod sectors for mod modal
            $('#modagence').change( function(){
            
            var url_ = "{{ route('AllSectors') }}";
            var agence=$('#modagence').val();
            //alert(agence);
            $('#modsecteur').html('');
            $.get( url_ , {ag:agence} , function(data, response){
            for (var i = 0; i < data.length; i++) {
            $('#modsecteur').append('<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
             }
            })
            });

            //submit
            $('#save').on('click',function(e){
              e.preventDefault();
              var totalFormData=new FormData($('#addform')[0]);
              $.ajax({
                type:"POST",
                url:"/adduser",
                processData: false,
                contentType: false,
                data:totalFormData,
                //data:new FormData($('#addform').serialize()),
                success:function(data,response){
                    //console.log(response);
                    $('#addUser').modal('hide');

                    $('#success_modal').modal('show');

                     setTimeout(function() {
                         $('#success_modal').modal('hide');
                     }, 2000);
                     $('#tabusers').html('');

                     for (var i = 0; i < data.length; i++) {
                       var line='<tr class="'+data[i].id+'"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].profil+'</td><td>'+data[i].agence+'</td><td>'+data[i].secteur+'</td><td>'+data[i].name+'</td><td style="display:none">'+data[i].image+'</td><td>'+data[i].email+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                       $('#tabusers').append(line);
                     }

                    //alert(data.id);
                //    var line='<tr class="'+data.id+'"><td style="display:none;">'+data.id+'</td><td>'+data.profil+'</td><td>'+data.agence+'</td><td>'+data.secteur+'</td><td>'+data.name+'</td><td style="display:none">'+data.image+'</td><td>'+data.email+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                 //   $('#tabusers').append(line);
                   // alert('Utilisateur a été ajouté avec succes');
                    //location.reload();
                },
                error:function(error){
                    $("#profil_error").text("");
                    $("#agence_error").text("");
                    $("#secteur_error").text("");
                    $("#name_error").text("");
                    $("#email_error").text("");
                    $("#password_error").text("");
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
           $("#tabusers tr").filter(function() {
           $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
            });
            </script>

     <!--moduser ajax code-->       
     <script>
           $(document).ready(function(){
            
            $(document).on("click", "a.editbtn" , function() {
            $('#editUser').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#id').val(data[0]);

            $('#modprofil option').attr('selected', false);
            $('#modprofil option[value="'+data[1]+'"]').attr('selected', true);

            $('#modagence option').attr('selected', false);
            $('#modagence option[value="'+data[2]+'"]').attr('selected', true);

           // $('#modprofil option[value="'+data[1]+'"]').attr('selected', false);
           // $('#modagence option[value="'+data[2]+'"]').attr('selected', false);
           // $('#modprofil option[value="'+data[1]+'"]').attr('selected', true);
            //$('#modagence option[value="'+data[2]+'"]').attr('selected', true);

            //code secteur
                  var url_ = "{{ route('AllSectors') }}";
                  var agence=data[2];
                  //alert(agence);
                  $('#modsecteur').html('');
                  var selected='';
                  var sec=data[3];
                  $.get( url_ , {ag:agence} , function(data, response){
                  for (var i = 0; i < data.length; i++) {
                      if(data[i].nom_secteur == sec){
                          selected='<option value="'+data[i].nom_secteur+'" selected>'+data[i].nom_secteur+'</option>';
                      }
                      else{
                        selected='<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>';
                      }
                        $('#modsecteur').append(selected);
                  //$('#modsecteur').append('<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
                  }
                  })
                  $('#modsecteur option[value="'+data[3]+'"]').attr('selected', true);

                  $('#modname').val(data[4]);
                  //$('#modimage').val(data[5]);
                  $('#modemail').val(data[6]);

              });
              $('#editform').on('submit',function(e){
                  e.preventDefault();
                  var totalFormData=new FormData($('#editform')[0]);
                  totalFormData.append('_method', 'put');
                  //alert(totalFormData.);

                 $.ajax({
                     type:"POST",
                     url:"/update",
                     processData: false,
                     contentType: false,
                     data:totalFormData,
                    // data:$(this).serialize(),
                     success:function(data,response){
                         $('#modpassword').val('');
                         $('#modpassword-confirm').val('');
                        $('#editUser').modal('hide'); 

                        $('#success_modal').modal('show');

                         setTimeout(function() {
                             $('#success_modal').modal('hide');
                         }, 2000);

                        //alert("Utilisateur a été modifié avec succes");
                        //location.reload();
                        $("."+data.id).remove();
                        var line='<tr class="'+data.id+'"><td style="display:none;">'+data.id+'</td><td>'+data.profil+'</td><td>'+data.agence+'</td><td>'+data.secteur+'</td><td>'+data.name+'</td><td style="display:none">'+data.image+'</td><td>'+data.email+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash">Supprimer</i></a></td><tr/>';
                        $('#tabusers').append(line);
                     },
                     error:function(error){
                      
                        
                        $("#modemail_error").text("");
                        $("#modpassword_error").text("");
                        $("#modpasswordconfirm_error").text("");
                        //console.log(error);
                        var response=$.parseJSON(error.responseText);
                        //alert(response.errors);
                        $.each(response.errors,function(key,val){
                           $("#"+key+"_error").text(val[0]);
                        });
                       //  alert("echec de modification");
                     }
                 });
              });
             

            });
            </script>

            <!--deluser ajax code-->       
     <script>
           $(document).ready(function(){
            $(document).on("click", "a.delbtn" , function() {
            $('#deleteUser').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#iddeluser').val(data[0]);
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
               var id=$('#iddeluser').val();

               $.ajax({
                     type:"delete",
                     url:"/delete",
                     data:$(this).serialize(),
                     success:function(data,response){
                        $('#deleteUser').modal('hide'); 

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

                <!-- Second Search bar-->
           <script>
            $(document).ready(function(){
            $("#secsearchbar").on("keyup", function() {
              var value = $(this).val().toLowerCase();
            $("#tabusers tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
             });
             });
             </script>

             <!-- datatable -->
             {{-- <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js" type="text/javascript"></script>     --}}
             <script src="{{asset('/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
             <script>
               $(document).ready( function () {
                
            $('#myTable').DataTable({
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
               });
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