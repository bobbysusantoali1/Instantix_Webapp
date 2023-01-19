<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('../CSS/style.css') }}">
</head>
<body>
    <nav class="nav d-flex justify-content-between">
        <div class="logo">
            <img src="" alt="">
        </div>
        <div class="nav-bar">
            <a href="">Browse</a>
            <a href="">Media</a>
            <a href="">About Us</a>
            <a href="">Contact</a>
            <a href="">Partner</a>
            <a href="">Login</a>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
    @if ( (Route::is('index_login') || Route::is('index_register')) ? false:true)
        <footer>
            <div>
                untitle
            </div>
            <div>
                Copyright bla bla. All Rights Reserved.
            </div>
        </footer>
    @endif
</body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>
