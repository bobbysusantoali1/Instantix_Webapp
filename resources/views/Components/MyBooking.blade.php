@extends('MainBody')
@section('title', $title)
@section('content')
<div class="row p-5 d-flex justify-content-center">
    @foreach ($data as $booking)
    <div class="card m-2 col-md-3">
        <img class="card-img-top" src="{{ URL::asset('images/'.$booking->event_image) }}" alt="{{ $booking->event_image }}">
        <div class="card-body">
          <h5 class="card-title">{{ $booking->event_name }}</h5>
          <p class="card-text">Artist: {{ $booking->event_artist }}</p>
          <p class="card-text">Location: {{ $booking->event_location }}</p>
          <p class="card-text">Date: {{ $booking->event_date }} </p>
          <p class="card-text">Time: {{ date("H:i", strtotime($booking->event_start_time)).' - '.date("H:i", strtotime($booking->event_end_time)) }} </p>
          <a href="{{ route('view-event', ['id' => $booking->id]) }}" class="btn btn-danger">Detail Event</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
