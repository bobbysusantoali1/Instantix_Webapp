@extends('NavigationBar.NavBar')

@section('Body')
    <div class="content bg-lightgreen p-5">
        @yield('content')
    </div>

    @if ( (Route::is('login', 'index_register')) ? false:true)
        <footer class="bg-darkblue text-white p-3">
            <div class="m-5">
                <h2 class="fw-bold">IntanTix</h2>
            </div>
            <div class="m-5 fs-5">
                 Copyright &copy;2023. All Rights Reserved.
            </div>
        </footer>
    @endif
@endsection
