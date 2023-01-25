@extends('MainBody')
@section('title', $title)
@section('content')
<div class="d-flex flex-column align-items-center bg bg-lightblue mt-4 border rounded border-3 border-dark" style="margin-left: 20%; margin-right:20%">
    <form method="POST" enctype="multipart/form-data" action={{ route('update-event', ['id' => $data_event->id]) }}>
        @csrf
        @if ($errors->any())
            {{$errors}}
        @endif
            <div class="row mt-4 mb-3">
                <label for="event_name" class="col-sm-4 font-weight-bold">Nama Event</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="event_name" id="event_name" value="{{ $data_event->event_name }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="event_image" class="col-sm-4">Poster</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="event_image" id="event_image" value="{{ $data_event->event_image }}" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="event_artist" class="col-sm-4">Artist</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="event_artist" id="event_artist" value="{{ $data_event->event_artist }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="event_location" class="col-sm-4">Lokasi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="event_location" id="event_location" value="{{ $data_event->event_location }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="event_desc" class="col-sm-4">Deskripsi Event</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="event_desc" id="event_desc" value="{{ $data_event->event_desc }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="event_date" class="col-sm-4">Tanggal</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="event_date" id="event_date" value="{{ $data_event->event_date }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="EventTime" class="col-sm-4">Jam</label>
                <div class="col-sm-4">
                    <input type="time" class="form-control" name="event_start_time" id="event_start_time" value="{{ $data_event->event_start_time }}">
                </div>
                <div class="col-sm-4">
                    <input type="time" class="form-control" name="event_end_time" id="event_end_time" value="{{ $data_event->event_end_time }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4"></div>
                <label for="EventRegular" class="col-sm-4 d-flex justify-content-center">Regular</label>
                <label for="EventVIP" class="col-sm-4 d-flex justify-content-center">VIP</label>
            </div>

            <div class="row mb-3">
                <label for="EventTicket" class="col-sm-4">Ticket Stock</label>
                @foreach ($ticket as $item)
                    @if ($item->category_name == 'Regular')
                        <div class="col-sm-4">
                            <input type="number" placeholder="1" min="1" class="form-control" name="EventRegularTicket" id="EventRegularTicket"  value="{{ $item->category_init_stock }}">
                        </div>
                    @elseif ($item->category_name == 'VIP')
                        <div class="col-sm-4">
                            <input type="number" placeholder="1" min="1" class="form-control" name="EventVIPTicket" id="EventVIPTicket" value="{{ $item->category_init_stock }}">
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row mb-3">
                <label for="EventTicketSold" class="col-sm-4">Ticket Sold</label>
                @foreach ($ticket as $item)
                    @if ($item->category_name == 'Regular')
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="EventRegularTicketSold" id="EventRegularTicketSold" placeholder="{{ $item->category_curr_stock }}" disabled>
                        </div>
                    @elseif ($item->category_name == 'VIP')
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="EventVIPTicketSold" id="EventVIPTicketSold" placeholder="{{ $item->category_curr_stock }}"disabled>
                        </div>
                        @endif
                    @endforeach
            </div>
            <div class="row mb-3">
                <label for="EventPrice" class="col-sm-4">Price</label>
                @foreach ($ticket as $item)
                    @if ($item->category_name == 'Regular')
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" min="10000" class="form-control" name="EventRegularPrice" id="EventRegularPrice" value="{{ $item->price }}">
                            </div>
                        </div>
                    @elseif ($item->category_name == 'VIP')
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" min="20000" class="form-control" name="EventVIPPrice" id="EventVIPPrice" value="{{ $item->price }}">
                            </div>
                        </div>
                    @endif
                @endforeach
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
