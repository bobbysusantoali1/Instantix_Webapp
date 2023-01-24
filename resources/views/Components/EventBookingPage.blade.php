@extends('MainBody')
@section('title', $title)
@section('content')
    <div class="container justify-content-center">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ asset('event.png') }}" alt="Card image cap">
            <div class="card-body d-flex">
                <div class="left" style="width: calc(100% / 3) !important">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">artist: </p>
                    <p class="card-text">penyelenggara: </p>
                    <p class="card-text">lokasi: </p>
                    <p class="card-text">tanggal: </p>
                    <p class="card-text">jam: </p>
                </div>
            </div>
        </div>
        <div class="card p-5 w-50 mx-auto d-flex justify-content-center">
            <div class="mdl text-center">
                <h1 class="card-title">Ticket</h1>
            </div>
            <div class="px-5 m-3">
                <div class="d-flex">
                    <div class="w-50">
                        <h3>Type</h3>
                    </div>
                    <div class="w-50 text-center">
                        <h3>Regular</h3>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="w-50">
                        <h3>Price</h3>
                    </div>
                    <div class="w-50 text-center">
                        <h3>Rp100.000,-</h3>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="w-50">
                        <h3>Quantity</h3>
                    </div>
                    <div class="w-50 text-center">
                        <h3>1</h3>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h1>Total Price</h1>
                <h2>Rp100.000,-</h2>
            </div>
            <form class="d-flex justify-content-between" action="#" method="POST">
                <a href="/HomePage" type="submit" class="btn btn-danger w-50 m-3 fs-3">Cancel</a>
                <button type="submit" class="btn bg-darkblue text-white w-50 m-3 fs-3">Purchase</button>
            </form>
        </div>
    </div>
@endsection
