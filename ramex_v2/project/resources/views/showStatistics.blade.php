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


<!--style of progress bar-->
 <style type="text/css">
h2{
    color: #2F8D46;
}
#form {
    text-align: center;
    position: relative;
    margin-top: 20px
}
  
#form fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
} 
  
.finish {
    text-align: center
}
  
#form fieldset:not(:first-of-type) {
    display: none
}

 /* 
#form .previous-step, .next-step {
    width: 100px;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right 
} */
  
.form, .previous-step {
    background: #616161;
}
  

.form, .next-step {
    background: #2F8D46;
}
  
  
.text {
    color: #2F8D46;
    font-weight: normal
}
  
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}
  
#progressbar .active {
    color: #2F8D46
}
  
#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}
  
#progressbar #step1:before {
    content: "1"
}
  
#progressbar #step2:before {
    content: "2"
}
  
#progressbar #step3:before {
    content: "3"
}
  
  
#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}
  
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}
  
#progressbar li.active:before,
#progressbar li.active:after {
    background: #2F8D46
}
  
.progress {
    height: 20px
}
  
.progress-bar {
    background-color: #2F8D46
}
 </style>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<div id="profilname">
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon" style="margin-top:30px">
        <i class="fas fa-user-tie"></i>
    </div>
    <div class="sidebar-brand-text mx-3" style="margin-top:30px">{{ Auth::user()->profil }}</div>
</a>
</div>
  <!-- Divider -->
 
  

  <!-- Nav Item - Dashboard -->
  <li class="nav-item " style="margin-top:70px">
    <a class="nav-link" href="{{route('homerespramassage')}}">
       <i class="fas fa-home" style="font-size:20px"></i>
       <span style="font-size:17px">Accueil</span>
    </a>
 </li>

 <li class="nav-item " >
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="false" aria-controls="collapseTwo">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
   <span style="font-size:15px">L'ge des clients avec </span>   
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a id="zero_ram_view" class="collapse-item" href="{{route('zeroramview')}}">Zéro ramassage</a> 
             <a class="collapse-item" href="cards.html">3 à 5 ramassage</a>
        </div>
    </div>
 </li>

 <li class="nav-item active" >
    <a class="nav-link"  href="{{route('showCommands')}}">
       <i class="fas fa-fw fa-cog" style="font-size:18px"></i>
       <span style="font-size:14px">Gestion des commandes</span>
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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="search" id="searchbar" class="form-control bg-light border-0 small" placeholder="Barre de recherche..." 
                                aria-label="Search" aria-describedby="basic-addon2" autofocus style="border: solid 1px">
                        </div>
                    </form>

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

              <!--multi step progress bar begin-->

              <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-9 col-md-7 
                        col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                        <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                            <form id="form">
                                <ul id="progressbar" style="margin-left:35px">
                                    <li class="active" id="step1">
                                        <strong>Etape 1</strong>
                                    </li>
                                    <li id="step2" class="ar"><strong>Etape 2</strong></li>
                                    <li id="step3" class="az"><strong>Etape 3</strong></li>
                               <!--     <li id="step4" class="fn"><strong>Etape 4</strong></li>  -->
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div> <br>
                                <fieldset>
                                    <h2>Importer le fichier de l'age reel des clients</h2>
                                    
                                        <input type="file" name="file">                                       
                                        <input type="button" name="next-step" 
                                        class="btn btn-success next-step" value="Importer" />
                                </fieldset>
                                <fieldset>
                                    <h2>Importer le fichier de l'age des clients avec 0 ramassage</h2>
                                    <input type="file" name="file">   
                                    <input type="button" name="next-step" 
                                        class="btn btn-success next-step" value="Importer" />
                                </fieldset>
                                <fieldset>
                                    <h2>Votre fichier est prêt à exporter</h2>
                                </fieldset>
                       <!--         <fieldset>
                                    <div class="finish">
                                        <h2 class="text text-center">
                                            <strong>FINISHED</strong>
                                        </h2>
                                    </div>
                                    <input type="button" name="previous-step" 
                                        class="previous-step" 
                                        value="Previous Step" />
                                </fieldset> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>




              <!--multi step progress bar end-->








                <!--my table begin-->


                <form action="{{route('importExcel')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                <button type="submit" class="btn btn-primary">submit</button>
                </form>

                <form action="{{route('importExcel2')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file2">
                    <button type="submit" class="btn btn-primary">submit2</button>
                    </form>




                <div class="row">
            <div class="col-md-12">
                <div class="form-content">    

           <h3 class="text-center">Liste des commandes</h3>

           <!--searchbar-->
           <div class="container input-group rounded" style="margin-bottom:7px;padding-left:80px;padding-right:80px">
             <input type="search" id="secsearchbar" class="form-control rounded" placeholder="Que cherchez-vous ? " aria-label="Search" aria-describedby="search-addon"/>
             <button class="btn btn-primary" style="border-top-right-radius:20px;border-bottom-right-radius:20px;border-top-left-radius:0px;border-bottom-left-radius:0px"  disabled>
               <i class="fas fa-search"></i>
             </button>
           </div>
           <a href="{{route('exportExcel')}}" class="btn btn-success" style="margin-bottom:5px"><img src="{{asset('customAuth/images/excel.ico')}}" alt="" style="width:35px;height:35px">Exporter</a>
           <table id="commandsTab" class="table table-striped table-bordered" style="width:100%">
           <thead class="thead thead-dark">
             <tr>
             <th >Commercial</th>
             <th >Client</th>
             <th>Âge réel</th>
             <th>Âge avec 0 ramassage</th>
             </tr>
             </thead>
             <tbody id="tabcommands">
          
             </tbody>
           </table>

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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--delete user modal-->
    <div class="modal fade" id="deleteCommand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Suppression d'une commande :</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form id="deleteFormID">
                 <div class="modal-body"> 
                 {{csrf_field()}}
                 {{method_field('delete')}}
                 <input type="hidden" name="iddelcommand" id="iddelcommand" value="">
                 <i class="fas fa-exclamation-triangle" style="font-size:30px; color:#ffcc00"></i> Voulez vous vraiment supprimer cette commande?
                </div>
                <div class="modal-footer">
                    <button type="submit" id="delete" class="btn btn-primary" >Supprimer</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Quitter</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>





     <!--success modal begin-->
        <!-- Modal -->
        <div class="modal fade" id="succes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    


<!--tooltip jquery-->
<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>


<!--export button-->
<script>
			
    $(document).ready(function() {
        $("#export_btn").click(function () {

           alert("test");

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

<!--jquery of my progress bar-->
<script>

$(document).ready(function () {
    var currentGfgStep, nextGfgStep, previousGfgStep;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
  
    setProgressBar(current);
  
    $(".next-step").click(function () {
  
        currentGfgStep = $(this).parent();
        nextGfgStep = $(this).parent().next();
  
        $("#progressbar li").eq($("fieldset")
            .index(nextGfgStep)).addClass("active");
  
        nextGfgStep.show();
        currentGfgStep.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;
  
                currentGfgStep.css({
                    'display': 'none',
                    'position': 'relative'
                });
                nextGfgStep.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(++current); 
    });
  
  
    function setProgressBar(currentStep) {
        var percent = parseFloat(100 / steps) * current;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }
  
    $(".submit").click(function () {
        return false;
    })
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