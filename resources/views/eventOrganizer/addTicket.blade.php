@extends('layouts.eventOrganizerApp')
@section('title', 'Dashboard')

@section('content-css')
    <link rel="stylesheet" href="/css/eventOrganizer/addTicket.css">
@endsection

@section('dashboard-content-title', 'Add Ticket')

@section('dashboard-content')
    <div>
        <form method="POST" action="/dashboard/myEvents/add-ticket">
            @csrf
            @if ($errors->any())
                <div class="text-danger">

                    {{ $errors->first() }}
                </div>
            @endif
            <input type="hidden" name='eventId' value="{{ $event->id }}">
            <div class="mb-3">
                <label for="ticketType" class="form-label">Ticket Type</label>
                <input type="text" class="form-control" id="ticketType" name="ticketType"
                    value="{{ old('ticketType') }}">
            </div>

            <div class="mb-3">
                <label for="ticketDesc" class="form-label">Ticket Description</label>
                <input type="text" class="form-control" id="ticketDesc" name="ticketDesc"
                    value="{{ old('ticketDesc') }}">
            </div>
            <div class="mb-3">
                <label for="ticketStock" class="form-label">Ticket Stock</label>
                <input type="number" class="form-control" id="ticketStock" name="ticketStock"
                    value="{{ old('ticketStock') }}">
            </div>
            <div class="mb-3">
                <label for="ticketPrice" class="form-label">Ticket Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="number" min="1" class="form-control" name="ticketPrice" id="ticketPrice"
                        value="{{ old('ticketPrice') }}" placeholder="input price here">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
