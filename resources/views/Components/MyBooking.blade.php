@extends('MainBody')
@section('title', $title)
@section('content')
<div class="row p-5 d-flex justify-content-center">
    @for ($i = 0; $i < $bookings->count(); $i++)
        <div class="card m-2 col-md-3">
            <img class="card-img-top" src="{{asset('storage/images/'.$events[$i]->event_image)}}" alt="{{ $events[$i]->event_image }}">
            {{-- <img class="card-img-top" src="{{ URL::asset('images/'.$events[$i]->event_image) }}" alt="{{ $events[$i]->event_image }}"> --}}
            <div class="card-body">
                <h5 class="card-title">{{ $events[$i]->event_name }}</h5>
                <p class="card-text">Ticket Category: {{ $tickets[$i]->category_name }}</p>
                <p class="card-text">Ticket Description: {{ $tickets[$i]->category_desc }}</p>
                <p class="card-text">Date: {{ $events[$i]->event_date }} </p>
                <p class="card-text">Time: {{ date("H:i", strtotime($events[$i]->event_start_time)).' - '.date("H:i", strtotime($events[$i]->event_end_time)) }} </p>
                <p class="card-text">Quantity: {{ $bookings[$i]->quantity }} </p>
                <a href="{{ route('view-event', ['id' => $events[$i]->id]) }}" class="btn btn-danger">Detail Event</a>
            </div>
        </div>
    @endfor
</div>
@endsection
