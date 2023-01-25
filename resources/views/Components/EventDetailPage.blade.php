@extends('MainBody')
@section('title', $title)
@section('content')
    <div class="container">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ url('storage/app/public/'.$data_event->event_image) }}" alt="{{ $data_event->event_image }}">
            <form action={{ route('view-book-detail', ['id' => $data_event->id]) }} method="post">
                @csrf
                <div class="card-body d-flex">
                    <div class="left" style="width: calc(100% / 3) !important">
                        <h5 class="card-title">{{ $data_event->event_name }}</h5>
                        <p class="card-text">{{ $data_event->event_desc }}</p>
                        <hr>
                        <p class="card-text">Artist(s): {{ $data_event->event_artist }}</p>
                        <p class="card-text">Organizer: {{$data_event->user->full_name}}</p>
                        <p class="card-text">Event Location: {{ $data_event->event_location }}</p>
                        <p class="card-text">Event Date: {{ $data_event->event_date }}</p>
                        <p class="card-text">Event Time: {{ date("H:i", strtotime($data_event->event_start_time)).' - '.date("H:i", strtotime($data_event->event_end_time)) }} </p>
                        @php
                            date_default_timezone_set('Asia/Jakarta');
                        @endphp
                    </div>
                    <div class="middle ms-5" style="width: calc(100% / 3) !important">
                        <div class="mdl text-center">
                            <h5 class="card-title">Ticket</h5>
                        </div>
                        <div class="center d-flex justify-content-center">
                            <p style="margin-top: auto; margin-bottom: auto" class="card-text">Type: </p>
                            <div class="selecttype">
                                <div class="radio">
                                    <input type="radio" value="Regular" class="btn-check" name="category" id="Regular" autocomplete="off" checked>
                                    <label style="width: 150px; margin-right: 5px;margin-left: 7px;" class="btn btn-outline-success" for="Regular">Regular</label>

                                    <input type="radio" value="VIP" class="btn-check" name="category" id="VIP" autocomplete="off">
                                    <label style="width: 150px" class="btn btn-outline-danger" for="VIP">VIP</label>
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
                        @if (!Auth::check() || auth()->user()->role != 'eventOrganizer')
                        <div class="quantity">
                            <label style="width: 150px; margin-bottom: 3px"  for="qty">Quantity</label>
                            <input type="number" name="qty" id="qty" class="form-control input-number" value="1" min="1" max="30">
                        </div>
                        @else
                        <div class="center d-flex justify-content-center">
                            <p style="" class="card-text">Stock: </p>
                            <div class="selecttype">
                                <div class="price d-flex">
                                    @foreach ($ticket as $item)
                                        @if ($item->category_name == 'Regular')
                                            <p style="margin-left: 7px" class="card-text">{{ $item->category_init_stock }}</p>
                                        @else
                                            <p style="margin-left: 120px; margin-right: 130px;" class="card-text">{{ $item->category_init_stock }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="center d-flex justify-content-center">
                            <p style="" class="card-text">Sold: </p>
                            <div class="selecttype">
                                <div class="price d-flex">
                                    @foreach ($ticket as $item)
                                        @if ($item->category_name == 'Regular')
                                            <p style="margin-left: 17px; margin-right: 10px;" class="card-text">{{ $item->category_curr_stock }}</p>
                                        @else
                                            <p style="margin-left: 120px; margin-right: 130px;" class="card-text">{{ $item->category_curr_stock }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @if (!Auth::check() || auth()->user()->role != 'eventOrganizer')
                    <div class="right" style="width: calc(100% / 3) !important">
                        <div class="buttons d-flex mt-4" style="justify-content: center">
                            <button type="submit" style="width: 150px" class="btn btn-danger">Book Now</button>
                        </div>
                    </div>
                    @else
                    <div class="right" style="width: calc(100% / 3) !important">
                        <div class="buttons d-flex mt-4" style="justify-content: center">
                            @if (auth()->user()->id == $data_event->user->id)
                                <a href="{{ route('view-manage-event', ['id' => $data_event->id]) }}" class="btn btn-danger fs-3">Manage Event</a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
