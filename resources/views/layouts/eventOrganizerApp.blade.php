@extends('NavigationBar.NavBar')

@section('css')
    <link rel="stylesheet" href="./../../css/layouts/eventOrganizerApp.css">
@endsection

@section('Body')
    <div class="d-flex flex-row justify-content-start w-100">
        <div class="sidebar">
            <div class="sidebar--title">
                Dashboard
            </div>
            <ul class="menu">
                <li class="menu-item">Menu 1</li>
                <li class="menu-item">Menu 2</li>
                <li class="menu-item">Menu 3</li>
                <li class="menu-item">Menu 4</li>
                <li class="menu-item">Menu 5</li>
            </ul>
        </div>
        <div class="dashboard-content">
            <h1 class="dashboard-content--title">@yield('dashboard-content-title')</h1>
            @yield('dashboard-content')
        </div>
    </div>

    @if (Route::is('login', 'index_register') ? false : true)
        <footer class="bg-darkblue text-white p-3">
            <div class="m-5">
                <h2 class="fw-bold">InstanTix</h2>
            </div>
            <div class="m-5 fs-5">
                Copyright &copy;2023. All Rights Reserved.
            </div>
        </footer>
    @endif
@endsection
