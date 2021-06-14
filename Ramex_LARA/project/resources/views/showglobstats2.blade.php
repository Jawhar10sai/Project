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

 <li class="nav-item active" >
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

 <li class="nav-item" >
    <a class="nav-link"  href="{{route('showRespRDVCommands')}}">
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
                    </form> -->

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

              <!--multi step progress bar begin-->


              <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-9 col-md-7 
                        col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                        <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                            <div id="form">
                                <ul id="progressbar" style="margin-left:35px">
                                    <li class="active" id="step1">
                                        <strong>Etape 1</strong>
                                    </li>
                                    <li id="step2" class="active" ><strong>Etape 2</strong></li>
                                    <li id="step3" ><strong>Etape 3</strong></li>
                               <!--     <li id="step4" class="fn"><strong>Etape 4</strong></li>  -->
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar" style="width:67%;"></div>
                                </div> <br>
                               
                                <fieldset>
                                    <h2>Importer le fichier global </h2>
                                </fieldset>
                               
                                <form action="{{route('importExcel10')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <label for="">Incrementer l'age réel avec:</label>
                                    <input type="number" id="inc_age_reel" class="form-control" name="inc_age_reel" value="" style="margin-bottom: 3px" required>
                                    <input type="file" name="file" accept=".xls, .xlsx">
                                    <button type="submit" id="send_age" class="btn btn-success" >Valider</button>
                                    </form>
                            </div><!--end div id=form-->
                          {{-- <div style="margin-top:10px">
                            <a href="{{route('zeroram3view')}}" class="btn btn-success">Passer à l'étape 3 >></a>
                        </div>   --}}
                        </div>
                    </div>
                </div>
            </div>




              <!--multi step progress bar end-->

                 <!--my table begin-->

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

                   

                   
                   <div class="row justify-content-between">
                      <div class="col-md-3">
                        <a id="exportfile" href="#" class="btn btn-success" style="margin-bottom:5px"><img src="{{asset('customAuth/images/excel.ico')}}" alt="" style="width:35px;height:35px">Exporter</a>
                    </div>


                      <div class="col-md-6">
                        <center> <h3><b><span id="All_fram_clients"></span></b> clients trouvés</h3></center>
                         </div>

                    
                      <div class="ml-auto mr-3" >
                        <a href="#" class="btn btn-primary" id="delete_table_btn" ><i class="fa fa-refresh fa-spin" aria-hidden="true" style="margin-right:5px" ></i>Recommencer à nouveau</a>
                    </div>
                   </div>


                
                   <table id="statisticsTab" class="table table-striped table-bordered">
                   <thead class="thead thead-dark">
                     <tr>
                     <th >Commercial</th>
                     <th >Client</th>
                     <th>Âge réel (En semaine)</th>
                     <th>Âge avec 0 ramassage (En semaine)</th>
                     <th>Âge avec 3*5 ramassage (En semaine)</th>
                     </tr>
                     </thead>
                     <tbody id="tabstatistics" >
                  
                     </tbody>
                   </table>
                

                   {{-- <div class="pagination"></div> --}}
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



     
     <!--delete html table modal-->
     <div class="modal fade" id="deleteStatistics" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content" style="background-color:#0fa7ff;border-radius:20px;color:white;height:267px"> 
 
             <form id="deleteFormID">
              <div class="modal-body"> 
              {{csrf_field()}}
              {{method_field('delete')}}
              <div class="row">
                 <div class="col-md-4"> <img src="{{ asset('customAuth/images/warning.gif') }}" alt="" style="width:150px;height:150px"></div>
                 <div class="col-md-8" style="padding-top:50px;padding-left:50px"><center><h3>Voulez vous vraiment recommencer à nouveau ?</h3></center></div>
             </div>
         <!--     <i class="fas fa-exclamation-triangle" style="font-size:30px; color:#ffcc00"></i> Voulez vous vraiment supprimer cet utilisateur? -->
         <center>
             <button type="submit" id="delete" class="btn btn-danger btn-lg" >Recommencer</button>
             <button class="btn btn-secondary btn-lg" type="button" data-dismiss="modal">Quitter</button>
             </center>   
     </div>
            
             
             </form>
             
         </div>
     </div>
 </div>



 <!--delete html table modal end -->


 
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


       <!--export excel file Modal -->
       <div class="modal fade" id="exportexcelfile_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color:rgb(75, 181, 67);color:white">
              <h3 ><i class="fa fa-file-excel-o"></i> Choisir un nom au fichier</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('exportFglobal')}}" method="get" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control form-control-lg" name="nom_fichier_excel" value="FICHIER GLOBAL S" placeholder="Exemple: FICHIER GLOBAL S15">
                    <div style="margin-top:10px">
                        <center>
                            <button type="submit" class="btn btn-success" style="margin-right:3px"><i class="fas fa-download"></i> Exporter</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>  
                        </center>  
                    </div>  
                    </form>
            </div>
          </div>
        </div>
      </div>
      <!--end export excel file Modal -->



         <!--update null age Modal -->
<div class="modal fade" id="updatenullage_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:rgb(75, 181, 67);color:white">
          <h3 >Client <b><span class="nom_client"></span></b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="get" enctype="multipart/form-data">
                @csrf
               <h5>Veuillez entrer l'age réel du client par semaine :</h5>
               <input type="text" id="id_client" hidden>
                <input type="number" id="age_reel_client" class="form-control form-control-lg" name="age_reel_client" placeholder="Exemple: 9">
                <div style="margin-top:10px">
                    <center>
                        <button id="update_age_client" type="submit" class="btn btn-success" style="margin-right:3px"><i class="fas fa-check"></i> Valider</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>  
                    </center>  
                </div>  
                </form>
        </div>
      </div>
    </div>
  </div>
  <!--end export excel file Modal -->
   



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


<!--show zero ram modal-->
<script>
    $(document).ready(function() {
      $("#zero_ram_modal").click(function(){
          alert("uyqhs");
      })
    });
    </script>



<!--importer le fichier de l'age reel-->
<script>
/*
$(document).ready(function() {
    $('#import_real_age_file').on('click',function(e){
        
        e.preventDefault();
    
        var totalFormData=new FormData($('#add_real_age_file')[0]);
       // alert(totalFormData.file);

        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url:"/importExcel",
                processData: false,
                contentType: false,
                data:totalFormData,
               // data:$('#add_real_age_file').serialize(),
                success:function(data,response){
                   alert("success");

                },
                error:function(error){
                  alert("error");
                }
              }); 
      })
    });
*/
</script>


<!--show content table -->
<script>
    $(document).ready(function() {

        
        $.get("{{ route('AllStatistics1') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {
                   var line='';
                 //  if(data[i].age_reel == null){
                      // line='<tr class="'+data[i].id+' clickabletr" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].commercial+'</td><td>'+data[i].client+'</td><td>'+data[i].age_reel+'</td><td>'+data[i].age_avec_0ramassage+'</td><tr/>';
                   //}else{
                       line='<tr class="'+data[i].id+'"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].commercial+'</td><td>'+data[i].client+'</td><td>'+data[i].age_reel+'</td><td>'+data[i].age_avec_0ramassage+'</td><td>'+data[i].age_avec_3_5ramassage+'</td><tr/>';
                 //  }
                       
                    $('#tabstatistics').append(line);
                }
              
            });


            

            
    });
    </script>

    <!--select count clients-->
<script>
    $(document).ready(function() {
        $.get("{{ route('AllFramClients') }}", function(data, response){
                
               $("#All_fram_clients").text(data);
              
            });
    });
    </script>



<!--Search bar-->
<script>
    $(document).ready(function(){
       $("#searchbar").on("keyup", function() {
         var value = $(this).val().toLowerCase();
      $("#tabstatistics tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
       });
      });
</script>



<!--secSearch bar-->
<script>
    $(document).ready(function(){
       $("#secsearchbar").on("keyup", function() {
         var value = $(this).val().toLowerCase();
      $("#tabstatistics tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
       });
      });
</script>


<!--vider la table-->
<script>
    $(document).ready(function(){
        $('#delete_table_btn').click(function(e){
        
        e.preventDefault();
        $("#deleteStatistics").modal("show");
/*
        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"delete",
                url:"{{route('deleteAllTable')}}",
                success:function(data,response){
                   $('#tabstatistics').html('');
                   alert("success");

                },
                error:function(error){
                  alert("error");
                }
              });  */
      })

      $('#delete').click(function(e){
        
        e.preventDefault();
       

        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"delete",
                url:"{{route('deleteAllTable')}}",
                success:function(data,response){
                   $('#tabstatistics').html('');
                   $(".modal").modal('hide');
                 //  alert("success");
      /*           $('#success_modal').modal('show');

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
           
<!--ajouter les nom des fichier dans la balise ul-->
<script>
$(document).ready(function(){
   /* $("#filenamescontent")css('visibility','hidden');
    if ($('#filenames li').length > 1){
       alert("test");
    } */

    $.get("{{ route('importedfiles') }}", function(data, response){
                //alert(data[0].nom_fichier);
                for (var i = 0; i < data.length; i++) {
                    if(data[i].type_fichier == "age_reel"){
                        var line=' <li class="list-group-item list-group-item-success">'+data[i].nom_fichier+'</li>';
                    $('#filenames').append(line);
                    }       
                }
              
            });



//delete2 
$('#zero_ram').click(function(e){
        
        e.preventDefault();
       

        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"delete",
                url:"{{route('deleteAllTable')}}",
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
                url:"{{route('deleteAllTable')}}",
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
                url:"{{route('deleteAllTable')}}",
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
                url:"{{route('deleteAllTable')}}",
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



<!--Afficher le modal exportexcel-->
<script>
    $(document).ready(function(){
      $("#exportfile").click(function(){
        $("#exportexcelfile_modal").modal("show");
      })
      });
</script>


<!--declencher un evenement apres le clique sur la ligne-->
<script>
    $(document).ready(function(){
    
      $(document).on("click", ".clickabletr" , function() {
          $tr=$(this).closest('tr');
          var data=$tr.children("td").map(function(){
          return $(this).text();
          }).get();

          $("#id_client").val(data[0]);
          $(".nom_client").text(data[2]);
          
          $("#updatenullage_modal").modal("show");
         
    })


    /////////////////
    $('#update_age_client').click(function(e){
                  e.preventDefault();
                  var id=$('#id_client').val();
                  var age=$('#age_reel_client').val();
                // alert(age);
                  var newDate={
                      id_client:id,
                      age_client:age,
                  }                
                 $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     type:"PUT",
                     url:"/updateClientAgeReel",
                     data:newDate,
                     success:function(data,response){
                        $('#tabstatistics').html("");
                       $(".modal").modal('hide');
                       $('#success_modal').modal('show');

                     setTimeout(function() {
                     $('#success_modal').modal('hide');
                     }, 2000);

                     for (var i = 0; i < data.length; i++) {
                        var line='';
                        if(data[i].age_reel == null){
                            line='<tr class="'+data[i].id+' clickabletr" style="background-color:rgb(231, 161, 176)"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].commercial+'</td><td>'+data[i].client+'</td><td>'+data[i].age_reel+'</td><td>'+data[i].age_avec_0ramassage+'</td><tr/>';
                        }else{
                            line='<tr class="'+data[i].id+'"><td style="display:none;">'+data[i].id+'</td><td>'+data[i].commercial+'</td><td>'+data[i].client+'</td><td>'+data[i].age_reel+'</td><td>'+data[i].age_avec_0ramassage+'</td><tr/>';
                        }
                       
                        $('#tabstatistics').append(line);
                     }
                         $('#id_client').val("")
                         $('#age_reel_client').val("");
                     },
                     error:function(error){
                         alert("echec de modification");
                     }
                 }); 
              }); 
    ////////////////

    });

    </script>


{{-- <!--Envoyer l'age reel-->
<script>
    $(document).ready(function(){
      $("#send_age").on("click",function(){
        var age=$("#inc_age_reel").val();
       // alert(age)
         $.get("{{ route('AllStatistics5') }}",age,function(data, response){
                
               
              
            });
      })
      });
</script> --}}


</body>

</html>