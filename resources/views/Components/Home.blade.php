@extends('MainBody')
@section('title', $title)
@section('content')
<div class="container">
    @if (Auth::check() && auth()->user()->role == 'eventOrganizer')
        <div class="d-flex justify-content-center">
            <a href="{{ route('view-dashboard') }}" class="btn btn-danger">Go To Dashboard</a>
        </div>
    @else
        @if (!Auth::check() || auth()->user()->role != 'eventOrganizer')
        <div class="card mb-3 p-3">
            <div class="row g-0 d-flex flex-row">
                <div class="col-md-8">
                    <div class="card-body d-flex flex-column justify-content-between py-5 my-5">
                        <h1 class="card-title"> Check Out This Event </h1>
                        <h3 class="card-text">{{ $first_event->event_name }}</h3>
                        <p class="card-text">{{ $first_event->event_desc }}</p>
                        <a href="{{ route('view-event', ['id' => $first_event->id]) }}" class="btn btn-danger">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="img-fluid"  src="{{ url('storage/app/public/'.$first_event->event_image) }}" alt="{{ $first_event->event_image }}">
                </div>
            </div>
        </div>

        <div class="title mt-5" style="text-align: center; font-weight: bold; font-size: 2rem">
            <p>Find Event</p>
        </div>
        <section class="search-sec">
            <div class="container">
                <form action="/HomePage">
                    @method('get')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="width: 50%;">
                                    <input type="search" name="search"  class="form-control search-slt" placeholder="Search Event ..." value="{{ request('search') }}">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <select class="form-control search-slt" id="exampleFormControlSelect1" name="selected">
                                        <option value="" selected>Location</option>
                                        @foreach ($datas as $item)
                                            <option @if ($item['event_location'] == request()->selected)
                                                selected
                                            @endif
                                            value="{{ $item['event_location'] }}">{{ $item['event_location'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        @endif
        @if (Auth::check() && auth()->user()->role != 'customer')
            <div class="d-flex justify-content-center">
                <h1>Event</h1>
            </div>
        @endif
        @include('Components.ImagePage')
        @if (Auth::check() && auth()->user()->role != 'customer')
            <div class="text-end w-100">
                <a href="/AddNewEvent" class="btn btn-danger fs-3">Add New Event</a>
            </div>
        @endif
    @endif
</div>
@endsection
