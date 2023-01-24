@extends('MainBody')
@section('title', $title)
@section('content')
    <div class="container justify-content-center">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ URL::asset('images/'.$event->event_image) }}" alt="Card image cap">
            <div class="card-body d-flex">
                <div class="left" style="width: calc(100% / 3) !important">
                    <h5 class="card-title">{{ $event->event_name }}</h5>
                    <p class="card-text">artist: {{ $event->event_artist }}</p>
                    <p class="card-text">penyelenggara: {{ $event->user->full_name }}</p>
                    <p class="card-text">lokasi: {{ $event->event_location }}</p>
                    <p class="card-text">tanggal: {{ $event->event_date }}</p>
                    <p class="card-text">jam: {{ $event->event_start_time }} - {{ $event->event_end_time }}</p>
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
                        <h3>{{ $ticket['category_name'] }}</h3>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="w-50">
                        <h3>Price</h3>
                    </div>
                    <div class="w-50 text-center">
                        <h3>{{ $ticket['price'] }}</h3>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="w-50">
                        <h3>Quantity</h3>
                    </div>
                    <div class="w-50 text-center">
                        <h3>{{ $ticket['quantity'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h1>Total Price</h1>
                <h2>{{ $ticket['quantity']*$ticket['price'] }}</h2>
            </div>
            <form class="d-flex justify-content-between" action="/EventBooking" method="POST">
                @csrf
                <div style="display: none">
                    <input type="text" name="user_id" value={{ Auth::user()->id }}>
                    <input type="text" name="ticket_id" value={{ $ticket['id'] }}>
                    <input type="text" name="quantity" value={{ $ticket['quantity'] }}>
                </div>
                <a onclick="location.href='{{ url()->previous() }}'" type="submit" class="btn btn-danger w-50 m-3 fs-3">Cancel</a>
                <button type="submit" class="btn bg-darkblue text-white w-50 m-3 fs-3">Purchase</button>
            </form>
        </div>
    </div>
@endsection
