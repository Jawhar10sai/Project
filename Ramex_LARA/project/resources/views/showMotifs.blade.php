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

    <!--toastr cdn-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

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
    <a class="nav-link" href="{{route('showUsers')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
   <span style="font-size:15px">Gestion des utilisateurs</span>   
    </a>
 </li>

 <li class="nav-item active" >
    <a class="nav-link"  href="{{route('showMotifs')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
       <span style="font-size:17px">Gestion des motifs</span>
    </a>
 </li>


 <li class="nav-item" >
    <a class="nav-link" href="{{route('showClientsHistory')}}">
       <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
   <span style="font-size:16px">Historique des clients</span>   
    </a>
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
                <div class="container" style="min-height:79%">
                <!--my table begin-->
                <button type="submit" class="btn btn-primary"  href="#" data-toggle="modal" data-target="#addMotif"><i class="fas fa-plus" style="margin-right:5px"></i>Nouveau motif</button>
            
                <div class="row" style="margin-top:80px">
            <div class="col-md-12">
                
                <div class="form-content" >    

           <h3 class="text-center">Liste des motifs</h3>

             <!--searchbar-->
             <div class="container input-group rounded" style="margin-bottom:7px;padding-left:80px;padding-right:80px">
                <input type="search" id="secsearchbar" class="form-control rounded" placeholder="Que cherchez-vous ? " aria-label="Search" aria-describedby="search-addon"/>
                <button class="btn btn-primary" style="border-top-right-radius:20px;border-bottom-right-radius:20px;border-top-left-radius:0px;border-bottom-left-radius:0px"  disabled>
                  <i class="fas fa-search"></i>
                </button>
              </div>
        
    
           <table class="table" >
           <thead class="thead thead-dark ">
             <tr>
             <th hidden>ID-Motif</th>
             <th>Motif</th>
             <th>ACTION</th>
             </tr>
             </thead>
             <tbody id="tabmotifs">
           
             </tbody>
           </table>
           <span class="pag"></span>
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

    


       <!--delete motif modal-->
    <div class="modal fade" id="deleteMotif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color:#ff0f0f;border-radius:20px;color:white;height:250px"> 

            <form id="deleteFormID">
             <div class="modal-body"> 
             {{csrf_field()}}
             {{method_field('delete')}}
             <input type="hidden" name="iddelmotif" id="iddelmotif" value="">
             <div class="row">
                <div class="col-md-4"> <img src="{{ asset('customAuth/images/warning.gif') }}" alt="" style="width:150px;height:150px"></div>
                <div class="col-md-8" style="padding-top:50px;padding-left:50px"><center><h3>Voulez vous vraiment supprimer ce motif?</h3></center></div>
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




 <!--add Motif modal begin-->
    
<!-- Modal -->
<div class="modal fade" id="addMotif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df;color:white">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau motif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--begin of my form-->
        <div class="col-lg-12">
    
                    <form id="addform" class="motif" enctype="multipart/form-data">
                     @csrf


                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input id="motif" type="text" class="form-control"
                                 name="motif" value="{{ old('motif') }}" placeholder="Veuillez entrer un motif" autocomplete="motif">
                                <small id="motif_error" class="form-text text-danger"></small>
                            </div>
                        </div>
                      <center> 
                          <button type="submit" id="save" class="btn btn-primary">Ajouter </button>
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


    <!--edit motif modal begin-->
<!-- Modal -->
<div class="modal fade" id="editMotif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e73df; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Modifier un motif</h5>
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
                            <input id="modmotif" type="text" class="form-control"
                             name="modmotif" autocomplete="modmotif" required>
                            <small id="modmotif_error" class="form-text text-danger"></small>
                        </div>
                    </div>             
        
                      <center>
                        <button type="submit" class="btn btn-primary">Modifier </button>
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
    
    <!--script toastr-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<!--Affichage dans la table-->
<script>
$(document).ready(function(){
    $.get("{{ route('AllMotifs') }}", function(data, response){
                
                for (var i = 0; i < data.length; i++) {

                    var line='<tr class="'+data[i].id+'"><td hidden>'+data[i].id+'</td><td>'+data[i].motif+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                    $('#tabmotifs').append(line);
                }
              //  var pagination= data.links;
              //  $('.pag').append(pagination);
            });
});
</script>
<!--addmotif ajax code-->
<script>
        $(document).ready( function(){

            //submit
            $('#save').on('click',function(e){
              e.preventDefault();

              var mydata={
                  motif:$("#motif").val(),
              }
              $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url:"{{route('storemotif')}}",
                data:mydata,
                //data:new FormData($('#addform').serialize()),
                success:function(data,response){
                    //console.log(response);
                    $('#addMotif').modal('hide');
                    $("#motif").val("");
                    $('#tabmotifs').html('');
                    //alert(data.id);
                    for (var i = 0; i < data.length; i++) {
                      var line='<tr class="'+data[i].id+'"><td hidden>'+data[i].id+'</td><td>'+data[i].motif+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                      $('#tabmotifs').append(line);
                    }
                   $('#success_modal').modal('show');

                   setTimeout(function() {
                       $('#success_modal').modal('hide');
                   }, 2000);
                 
                },
                error:function(error){
                    $("#motif_error").text("");
                    var response=$.parseJSON(error.responseText);
                    //alert(response.errors);
                    $.each(response.errors,function(key,val){
                       $("#"+key+"_error").text(val[0]);
                    });
                //  alert("erreur");
                }
              });
            });

          //  public ActionResult IndexAjax() { var data=AddToastMessage("Congratulations", "You made it all the way here!", ToastType.Success); 
        //return Json(data, JsonRequestBehavior.AllowGet);
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

     <!--modmotif ajax code-->       
     <script>
           $(document).ready(function(){
            
            $(document).on("click", "a.editbtn" , function() {
            $('#editMotif').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#id').val(data[0]);

            $('#modmotif').val(data[1]);

              });
              $('#editform').on('submit',function(e){
                  e.preventDefault();
                  var mydata={
                      id:$('#id').val(),
                      newMotif: $('#modmotif').val(),
                  }
               //   alert($('#modmotif').val());
                 $.ajax({
                     type:"PUT",
                     url:"{{route('updatemotif')}}",
                     data:mydata,
                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    // data:$(this).serialize(),
                     success:function(data,response){
                      //   $('#modmotif').val('');
                        
                        $('#editMotif').modal('hide');
                        $("#tabmotifs").html(""); 
                        for (var i = 0; i < data.length; i++) {
                           var line='<tr class="'+data[i].id+'"><td hidden>'+data[i].id+'</td><td>'+data[i].motif+'</td><td> <a class="btn btn-primary editbtn" href="#" style="margin-right:3px"><i class="fas fa-pen"></i>Modifier</a></button><a class="btn btn-danger delbtn" href="#"  ><i class="fas fa-trash"></i>Supprimer</a></td><tr/>';
                           $('#tabmotifs').append(line);
                        }

                        $('#success_modal').modal('show');

                         setTimeout(function() {
                             $('#success_modal').modal('hide');
                         }, 2000);
                      
                     },
                     error:function(error){
                        $("#modmotif_error").text("");
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

            <!--delmotif ajax code-->       
     <script>
           $(document).ready(function(){
            $(document).on("click", "a.delbtn" , function() {
            $('#deleteMotif').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#iddelmotif').val(data[0]);
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
               var id=$('#iddelmotif').val();

               $.ajax({
                     type:"delete",
                     url:"{{route('deleteMotif')}}",
                     data:$(this).serialize(),
                     success:function(data,response){
                        $('#deleteMotif').modal('hide'); 
                        //alert("Utilisateur a été modifié avec succes");
                        //location.reload();
                        //$("#tabusers").children().remove();
                        $("."+data.id).remove();


                        $('#success_modal').modal('show');
                         setTimeout(function() {
                             $('#success_modal').modal('hide');
                         }, 2000);
                     },
                     error:function(error){
                       alert(error);
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
            $("#tabclients tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
             });
             });
             </script>
</body>

</html>