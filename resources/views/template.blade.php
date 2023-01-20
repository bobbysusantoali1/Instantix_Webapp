<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{url('../CSS/style.css') }}"> -->
    <link rel="stylesheet" href="../../public/CSS/style.css">
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('ViewHome') }}"><h2 class="fw-bold">InstanTix</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center text-dark fw-bold fs-5">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ViewBrowse') }}">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ViewMedia') }}">Media</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ViewAboutUs') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ViewContact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ViewPartner') }}">Partner</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="{{ route('ViewLogin') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content bg-lightgreen p-5">
        @yield('content')
    </div>

    @if ( (Route::is('index_login') || Route::is('index_register')) ? false:true)
        <footer class="bg-darkblue p-3 text-white">
            <div class="m-5">
                <h2 class="fw-bold">IntanTix</h2>
            </div>
            <div class="m-5 fs-5">
                Copyright bla bla. All Rights Reserved.
            </div>
        </footer>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>