@extends('layouts.eventOrganizerApp')
@section('title', 'Dashboard')

@section('content-css')
    <link rel="stylesheet" href="./../../css/eventOrganizer/myEvents.css">
@endsection

@section('dashboard-content-title', 'My Events')

@section('dashboard-content')
    @foreach ($events as $event)
        <div class="d-flex flex-row justify-content-start align-items-start mb-2 event-item"
            style="border: 1px solid rgba(0, 0, 0 , 0);">
            <div style="width: 80px; font-weight: bold; font-size: 4rem; color: #444">
                {{ sprintf('%02d', $loop->index + 1) }}
            </div>
            <div style="margin: 24px 40px 20px 20px">
                <img class="event-image" src="{{ URL::asset('images/' . $event->event_image) }}"
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
    @endforeach
@endsection
