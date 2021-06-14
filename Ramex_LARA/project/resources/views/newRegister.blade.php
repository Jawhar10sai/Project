<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

     <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Custom fonts for this template-->
    <link href="{{asset('customAuth/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/customAuth/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!--ajax cdn-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

              <!--  <div class="col-lg-5 d-none d-lg-block bg-login-image">
                            <img src="{{asset('customAuth/images/RAMEXLOGO.jpg')}}" class="rounded mx-auto d-block" style="margin-top:55px" alt="ramexlogo">
                            </div> -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ajouter un nouveau utilisateur</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                             @csrf

                             <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                      <select class="form-control @error('profil') is-invalid @enderror" id="profil"
                                       name="profil" value="{{ old('profil') }}" style="border-radius:10rem;font-size:.9rem;" required autofocus>
                                        <option value="" selected disabled>--Select PROFIL--</option>
                                      </select>
                                    </div>
                                </div>

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

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                         name="name" value="{{ old('name') }}" placeholder="First Name" required autocomplete="name" >
                                          @error('name')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
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
                                         <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
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
                                <button type="submit" class="btn btn-primary btn-user btn-block">
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
                    $('#secteur').append('<option value="'+data[i].id+'">'+data[i].nom_secteur+'</option>');
                     }
                    })

                    });


                });
            </script>

</body>

</html>