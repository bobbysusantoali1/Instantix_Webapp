@extends('MainBody')
@section('title', $title)
@section('content')
<div class="d-flex flex-column align-items-center bg bg-lightblue mt-4 border rounded border-3 border-dark" style="margin-left: 20%; margin-right:20%">
    <form method="POST" action="/AddNewEvent" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            {{$errors}}
        @endif
        <div class="row mt-4 mb-3">
            <label for="event_name" class="col-sm-4 font-weight-bold">Nama Event</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="event_name" id="event_name" value="{{ old('event_name') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="event_image" class="col-sm-4">Poster</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" name="event_image" id="event_image" value="{{ old('event_image') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="event_artist" class="col-sm-4">Artist</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="event_artist" id="event_artist" value="{{ old('event_artist') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="event_address" class="col-sm-4">Lokasi</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="event_address" id="event_address" value="{{ old('event_address') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="event_date" class="col-sm-4">Tanggal</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" name="event_date" id="event_date" value="{{ old('event_date') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="EventTime" class="col-sm-4">Jam</label>
            <div class="col-sm-4">
                <input type="time" class="form-control" name="event_start_time" id="event_start_time" value="{{ old('event_start_time') }}">
            </div>
            <div class="col-sm-4">
                <input type="time" class="form-control" name="event_end_time" id="event_end_time" value="{{ old('event_end_time') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-4"></div>
            <label for="EventRegular" class="col-sm-4 d-flex justify-content-center">Regular</label>
            <label for="EventVIP" class="col-sm-4 d-flex justify-content-center">VIP</label>
        </div>
        <div class="row mb-3">
            <label for="EventTicket" class="col-sm-4">Ticket Stock</label>
            <div class="col-sm-4">
                <input type="number" placeholder="1" min="1" class="form-control" name="EventRegularTicket" id="EventRegularTicket"  value="{{ old('EventRegularTicket') }}">
            </div>
            <div class="col-sm-4">
                <input type="number" placeholder="1" min="1" class="form-control" name="EventVIPTicket" id="EventVIPTicket" value="{{ old('EventVIPTicket') }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="EventPrice" class="col-sm-4">Price</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="number" min="10000" class="form-control" name="EventRegularPrice" id="EventRegularPrice" placeholder="10000"  value="{{ old('EventRegularPrice') }}">
                </div>

            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="number" min="20000" class="form-control" name="EventVIPPrice" id="EventVIPPrice" placeholder="20000" value="{{ old('EventVIPPrice') }}">
                </div>
            </div>
        </div>
        <div class="mb-4 d-flex justify-content-center">
            <button type="submit" class="btn bg-blue">Create</button>
        </div>
    </form>
</div>
@endsection
