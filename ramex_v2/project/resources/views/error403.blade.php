<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!-- Custom styles for this template (bootstrap cdn)-->
   <link href="{{asset('customAuth/css/sb-admin-2.min.css')}}" rel="stylesheet">
   <link href="{{asset('css/style.css')}}" rel="stylesheet">
   
    <title>Erreur 403</title>
</head>
<body>
    <center>
    <img src="{{ asset('customAuth/images/interdit.png') }}" alt="" style="width:350px;height:350px;margin-top:70px">
    <h1 style="font-size: 100px;color:red"><div class="error mx-auto" data-text="403">403</div></h1>
    <H1 style="color: black;font-weight:bold;margin-bottom:20px"><i>Vous n'avez pas le droit d'accéder à cette page</i></H1>
    <a href="{{route('home')}}" class="btn btn-primary btn-lg"><b><<</b> Veuillez retourner à la page d'accueil</a></center>
</body>
</html>