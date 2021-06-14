<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/styles/lve-style.css') }}">
</head>

<body>
    @yield('navb')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/scripts/jquery.js') }}"></script>
    <script src="{{ asset('assets/scripts/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/vue.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/jquery.dataTables.min.js') }}"></script>
</body>

</html>