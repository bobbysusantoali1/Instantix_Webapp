@yield('css')
<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{url('../CSS/style.css') }}">
<nav id="member_navbar" class="navbar navbar-expand-lg navbar-light bg-white p-2">
    <div class="container-fluid">
            <a class="navbar-brand" href="/"><h2 class="fw-bold">InstanTix</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNav" class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav align-items-center text-dark fw-bold fs-5">
                    <li class="nav-item">
                        <a class="nav-link @yield('active_browse')" href="{{Route('view-browse')}}">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('active_about')" href="{{Route('view-about-us')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('active_contact')" href="{{Route('contact-form')}}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('view-book')}}">View Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('view-profile')}}">Profile</a>
                    </li>
                    @if (Auth::check())
                        <form action="/Logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger"><span>Log Out From {{ auth()->user()->full_name}}</span></button>
                        </form>
                    @else
                    <li class="nav-item">
                            <a class="btn btn-danger" href="{{Route('login')}}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
    </div>  
</nav>
@yield('Body')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
