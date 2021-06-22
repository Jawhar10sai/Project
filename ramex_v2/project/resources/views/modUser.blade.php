
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
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15" style="margin-top:30px">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="margin-top:30px">Admin</div>
            </a>

            
           

            <!-- Heading -->
            <div class="sidebar-heading" style="margin-top:50px" >
                Users config
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Users config</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">utilisateurs:</h6>
                        <a class="collapse-item" href="buttons.html"><i class="fas fa-plus" style="margin-right:5px"></i>Ajouter un utilisateur</a>
                        <a class="collapse-item" href="buttons.html"><i class="fas fa-pen" style="margin-right:5px"></i>Modifier un utilisateur</a>
                        <a class="collapse-item" href="buttons.html"><i class="fas fa-trash" style="margin-right:5px"></i>Supprimer un utilisateur</a>
                        <a class="collapse-item" href="buttons.html"><i class="fas fa-trash" style="margin-right:5px"></i>Chercher un utilisateur</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Drivers confi</span>
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
            </li>

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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
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
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->


            </div>
            <!-- End of Main Content -->

            <!-- Begin of my form -->


            <div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        @section('content')
<div class="container">

        <div class="row">

      <!--  <div class="col-lg-5 d-none d-lg-block bg-login-image">
                    <img src="{{asset('customAuth/images/RAMEXLOGO.jpg')}}" class="rounded mx-auto d-block" style="margin-top:55px" alt="ramexlogo">
                    </div> -->
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Modifier un utilisateur</h1>
                    </div>
                    <form id="editForm" class="user" method="POST" action="{{ route('update') }}"  enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    
                     @csrf

                     <input type="hidden" id="user_id" name="user_id" value="5">
                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <select id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                 name="name" value="{{ old('name') }}" style="border-radius:10rem;font-size:.9rem;"  required autofocus>
                                 <option value="" selected disabled>--Select NAME--</option>
                                 </select>
                            </div>
                        </div>


                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control" id="profil"
                               name="profil" style="border-radius:10rem;font-size:.9rem;" >
                                <option value="" disabled selected>--Select PROFIL--</option>
                              </select>
                            </div>
                        </div>
                      <!--  <input type="hidden" name="id" value="{{ old('id') }}">-->
                     <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                              <select class="form-control @error('agence') is-invalid @enderror" id="agence"
                                name="agence" value="{{ old('agence') }}" style="border-radius:10rem;font-size:.9rem;" required >
                                <option value="" selected disabled>--Select AGENCE--</option>
                              </select>
                      </div>
                      </div>
        
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <select class="form-control @error('secteur') is-invalid @enderror" id="secteur"
                                  name="secteur" value="{{ old('secteur') }}" style="border-radius:10rem;font-size:.9rem;" required >
                                <option value="" selected disabled>--Select SECTEUR--</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                                <label for="">Image</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                 name="image" value="{{ old('image') }}" style="border-radius:10rem;font-size:.9rem;"  required autocomplete="image">
                                 @error('image')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                 name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                                 @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                 <input id="password" type="text" class="form-control form-control-user @error('password') is-invalid @enderror"
                                  name="password" placeholder="Password" required autocomplete="new-password">
                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                            </div>

                            <div class="col-sm-6">
                                <input id="password-confirm" type="password" class="form-control form-control-user"
                                name="password_confirmation" placeholder="Repeat Password" required autocomplete="new-password">
                            </div>
                        </div>
                        <button id="register" type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>





            <!-- End of my form -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lavoieexpress 2021</span>
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

    <!-- Page level plugins -->
    <script src="{{asset('customAuth/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('customAuth/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('customAuth/js/demo/chart-pie-demo.js')}}"></script>
<!--my ajax code-->
<script>
        $(document).ready( function(){
            //select profils
            $.get("{{ route('AllProfils') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {
                    $('#profil').append('<option value="'+data[i].nom_profil+'">'+data[i].nom_profil+'</option>');
                }
            })
            //select agences
            $.get("{{ route('AllAgences') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {
                    $('#agence').append('<option value="'+data[i].nom_agence+'">'+data[i].nom_agence+'</option>');
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
       

            //modify user
             //select names
             $.get("{{ route('AllNames') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {
                    $('#name').append('<option value="'+data[i].name+'">'+data[i].name+'</option>');
                }
            })

            $('#name').change( function(){
               
            var url = "{{ route('SelectedProfil') }}";
            var name=$('#name').val();
            //alert(name);
           // $('#profil option[value="'+profils+'"]').attr('selected', 'selected');
                $.get( url, {nm:name} , function(data, response){
                $('#profil option').attr('selected', false);
                $('#agence option').attr('selected', false);
                $('#secteur option').attr('selected', false);

                $('#profil option[value="'+data[0].profil+'"]').attr('selected', true);
                $('#agence option[value="'+data[0].agence+'"]').attr('selected', true);
                $('#user_id').val(data[0].id);
               // $('#secteur option[value="'+data[0].secteur+'"]').attr('selected', true);

                  var url_ = "{{ route('AllSectors') }}";
                  var agence=data[0].agence;
                  //alert(agence);
                  $('#secteur').html('');
                  $.get( url_ , {ag:agence} , function(data, response){
                  for (var i = 0; i < data.length; i++) {
                  $('#secteur').append('<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
                  }
                  })
                
                  $('#secteur option[value="'+data[0].secteur+'"]').attr('selected', true);
                  $('#email').val(data[0].email);
                  
                  
            //$('#profil option[value="'+data[0].profil+'"]').attr('selected', 'selected');
            //$('#secteur').append('<option value="'+data[i].nom_secteur+'">'+data[i].nom_secteur+'</option>');
            })
            
            
            }); 

        });
        
    </script>
    <!--edit  form-->
    <script>
    $(document).ready(function(){
        
       ('#register').on('click',function(e){
           e.preventDefault();
           var id=$('#user_id').val();
           var name=$('#name').val();
           var profil=$('#profil').val();
           var email=$('#email').val();
           var url="{{route('update')}}";
           //var url="/update/"+id;
           var user_data={
              param_id:id, 
              param_name:name,  
              param_profil: profil,
              param_email:email,
           }
           alert(user_data);
           $.get( url , {updata:user_data} , function(data, response){
                  alert(data[0].profil);
                  })
          // alert(data);
         /*  $.ajax({
            type:"post",
            url:"{{route('update')}}",
            data:{
              param_name:name,  
              param_profil: profil,
              param_email:email,
            },
            data:$('#editForm').serialize(),
            //alert(data);
            success:function(response){
                alert(response);
            },
            error:function(error){
                alert(error);
            }
           });*/
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

