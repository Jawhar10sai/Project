<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body class="bg-gradient-primary" style="background-image:url(' {{asset('customAuth/images/lavoieexp.jpg')}} ') ">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="background-color:rgba(220, 220, 220, 0.3);color:white">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img src="{{asset('customAuth/images/RAMEXLOGO.png')}}" class="rounded mx-auto d-block" style="margin-top:18%" alt="ramexlogo">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 text-gray-900 mb-4">Bienvenue</h1>

                                        <!---->

                                        <body class="antialiased">
                                            <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
                                                @if (Route::has('login'))
                                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                                        @auth
                                                            <a class="btn btn-primary btn-lg btn-user btn-block" href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Accueil</a>
                                                        @else
                                                            <a class="btn btn-primary btn-lg btn-user btn-block" href="{{ route('login') }}" class="text-sm text-gray-700 underline">Connexion</a>
                                    
                                                        <!--    @if (Route::has('register'))
                                                                <a class="btn btn-primary btn-lg" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                                            @endif -->
                                                        @endauth
                                                    </div>
                                                @endif
                                    
                                               
                                            </div>
                                        <!---->
                                    </div>
                                   
                                   
                                </div>
                            </div>
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

</body>

</html>




