@extends('MainBody')
@section('title', $title)
@section('content')
<div class="d-flex flex-column align-items-center bg bg-lightblue mt-4 border rounded border-3 border-dark" style="margin-left: 20%; margin-right:20%">
    <form method="POST" action="#">
        @csrf
        @if ($errors->any())
            {{$errors}}
        @endif
            <div class="row mt-4 mb-3">
                <label for="EventName" class="col-sm-4 font-weight-bold">Nama Event</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="EventName" id="EventName">
                </div>
            </div>
            <div class="row mb-3">
                <label for="EventPoster" class="col-sm-4">Poster</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="EventPoster" id="EventPoster">
                </div>
            </div>
            <div class="row mb-3">
                <label for="EventArtist" class="col-sm-4">Artist</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="EventArtist" id="naEventArtistme">
                </div>
            </div>
            <div class="row mb-3">
                <label for="EventLocation" class="col-sm-4">Lokasi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="EventLocation" id="EventLocation">
                </div>
            </div>
            <div class="row mb-3">
                <label for="EventDate" class="col-sm-4">Tanggal</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="EventDate" id="EventDate">
                </div>
            </div>
            <div class="row mb-3">
                <label for="EventTime" class="col-sm-4">Jam</label>
                <div class="col-sm-4">
                    <input type="time" class="form-control" name="EventStartTime" id="EventStartTime">
                </div>
                <div class="col-sm-4">
                    <input type="time" class="form-control" name="EventEndTime" id="EventEndTime">
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
                    <input type="number" class="form-control" name="EventRegularTicket" id="EventRegularTicket">
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="EventVIPTicket" id="EventVIPTicket">
                </div>
            </div>
            <div class="row mb-3">
                <label for="EventTicketSOld" class="col-sm-4">Ticket Sold</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="EventRegularTicketSold" id="EventRegularTicketSold" disabled>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="EventVIPTicketSold" id="EventVIPTicketSold" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="EventPrice" class="col-sm-4">Price</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" min="10000" class="form-control" name="EventRegularPrice" id="EventRegularPrice" placeholder="10000">
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" min="20000" class="form-control" name="EventVIPPrice" id="EventVIPPrice" placeholder="20000">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="mb-4 col-sm-2">
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </div>
                <div class="mb-4 d-flex">
                    <button type="submit" class="btn bg-blue">Update</button>
                </div>
            </div>
    </form>
</div>
@endsection
