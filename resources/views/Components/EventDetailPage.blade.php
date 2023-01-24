@extends('MainBody')
@section('title', $title)
@section('content')
    <div class="container">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ asset('event.png') }}" alt="Card image cap">
            <form action="/EventBooking" method="post">
                @csrf
                <div class="card-body d-flex">
                    <div class="left" style="width: calc(100% / 3) !important">
                        <h5 class="card-title">{{ $data_event->event_name }}</h5>
                        <p class="card-text">artist: {{ $data_event->event_artist }}</p>
                        <p class="card-text">penyelenggara: {{$data_event->user->full_name}}</p>
                        <p class="card-text">lokasi: {{ $data_event->event_address }}</p>
                        <p class="card-text">tanggal: {{ $data_event->event_date }}</p>
                        <p class="card-text">jam: {{ $data_event->event_start_time.' - '.$data_event->event_end_time }} </p>
                        <p class="card-text"><small class="text-muted">create at: {{ $data_event->created_at }}</small></p>
                    </div>
                    <div class="middle" style="width: calc(100% / 3) !important">
                        <div class="mdl text-center">
                            <h5 class="card-title">Ticket</h5>
                        </div>
                        <div class="center d-flex justify-content-center">
                            <p style="margin-top: auto; margin-bottom: auto" class="card-text">Type: </p>
                            <div class="selecttype">
                                <div class="radio">
                                    <input type="radio" value="Regular" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                                    <label style="width: 150px; margin-right: 5px;margin-left: 7px;" class="btn btn-outline-success" for="success-outlined">Regular</label>

                                    <input type="radio" value="VIP" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                                    <label style="width: 150px" class="btn btn-outline-danger" for="danger-outlined">VIP</label>
                                </div>
                                <div class="price d-flex">
                                    @foreach ($ticket as $item)
                                        @if ($item->category_name == 'Regular')
                                            <p style="margin-left: 7px;" class="card-text">{{ $item->price }}</p>
                                        @else
                                            <p style="margin-left: 107px" class="card-text">{{ $item->price }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="quantity">
                            <label style="width: 150px; margin-bottom: 3px"  for="q">Quantity</label>
                            <input type="number" name="quant" id="q" class="form-control input-number" value="1" min="1" max="30">
                        </div>
                    </div>
                    <div class="right" style="width: calc(100% / 3) !important">
                        <div class="mdl text-center">
                            <h5>Total Price: 100.000</h5>
                        </div>
                        <div class="buttons d-flex mt-4" style="justify-content: center">
                            <button type="submit" style="width: 150px" class="btn btn-danger">Book Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
