@extends('layouts.eventOrganizerApp')
@section('title', 'Dashboard')

@section('content-css')
    <link rel="stylesheet" href="./../../css/eventOrganizer/eventDetail.css">
@endsection

@section('dashboard-content-title', 'My Events')

@section('dashboard-content')
    <div class="d-flex flex-row justify-content-start align-items-start mb-2" style="border: 1px solid rgba(0, 0, 0 , 0);">
        <div style="margin: 24px 40px 20px 20px">
            {{-- <img class="event-image" src="{{ URL::asset('images/' . $event->event_image) }}"
                    alt="{{ $event->event_image }}"> --}}
            <img class="event-image" src="{{ url('storage/app/public/' . $event->event_image) }}"
                alt="{{ $event->event_image }}">
        </div>
        <div class="d-flex flex-column justify-content-start align-items-start" style="gap: 12px; margin-top:24px">
            <h2>{{ $event->event_name }}</h2>
            <div>{{ $event->event_desc }}</div>
            <div>Location: {{ $event->event_location }}</div>
            <div>Date: {{ $event->event_date }}</div>
            <div>Time: {{ $event->event_start_time . ' - ' . $event->event_end_time }}</div>
        </div>
    </div>

    <h2 class="mb-2">Ticket Types</h2>
    <div class="d-flex flex-column" style="gap: 20px">
        @foreach ($tickets as $ticket)
            <div class="d-flex flex-column justify-content-start align-items-start ticket-card 
                @if ($ticket->category_curr_stock == 0) ticket-card-sold-out
                @elseif ($ticket->category_curr_stock < 10)
                ticket-card-low-stock @endif"
                style="gap: 12px">
                <h4>{{ $ticket->category_name }}</h4>
                {{-- <div style="height: 20px"><span class="badge bg-primary">{{ $ticket->category_name }}</span></div> --}}
                <div>Price : {{ $ticket->price }}</div>
                <div>Description : {{ $ticket->category_desc }}</div>
                <div>Stock : {{ $ticket->category_curr_stock }} / {{ $ticket->category_init_stock }}</div>
            </div>
        @endforeach

    </div>

@endsection
