<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset('assets/styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/lvestyle.css') }}">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"> <img src="{{ asset('assets/images/voielvej.png') }}" height="37.453" width="114" alt=""> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('consultation') }}">Consultation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('declaration') }}">Déclaration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('suivis-des-envois') }}">Suivis des envois</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('mes-sessions') }}">Mes sessions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('reclamation') }}">Réclamation</a>
        </li>
      </ul>
    </div>
</nav>
      @yield('content')
    <footer>
    </footer>
    <script src="{{ asset('assets/js/tax.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/js/vue.min.js') }}" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  </body>
</html>
