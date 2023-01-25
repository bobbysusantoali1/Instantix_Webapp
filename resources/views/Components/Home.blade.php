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
        <div class="card mb-3 p-3" style="max-width: 1200px; height: 600px">
            <div class="row g-0" style="height: 100%; width: 100%">
                <div class="col-md-8" style="max-width: 420px; margin-top: 50px;">
                    <div class="card-body">
                    <h3 class="card-title">{{ $first_event->event_name }}</h3>
                    <p class="card-text">{{ $first_event->event_desc }}</p>
                    <a href="/EventDetail/customer/{{ $first_event->id }}" style="margin-top: 200px;"class="btn btn-danger">Learn More</a>
                </div>
                </div>
                <div class="col-md-4">
                {{-- <img src="{{asset('storage/images/'.$first_event->event_image)}}" class="img-fluid rounded-start" alt="{{ $first_event->event_image }}"> --}}
                {{-- <img src="{{ URL::asset('images/'.$first_event->event_image) }}" class="img-fluid rounded-start" alt="{{ $first_event->event_image }}"> --}}
                <img class="card-img-top" src="{{ url('storage/app/public/'.$first_event->event_image) }}" alt="{{ $first_event->event_image }}">
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
