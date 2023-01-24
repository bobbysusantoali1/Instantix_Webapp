@extends('MainBody')
@section('title', $title)
@section('content')
<div class="container">
    {{-- event news --}}
    <div class="card mb-3 p-3" style="max-width: 1200px; height: 600px">
        <div class="row g-0" style="height: 100%; width: 100%">
            <div class="col-md-8" style="max-width: 420px; margin-top: 50px;">
              <div class="card-body">
                <h3 class="card-title">Card title</h3>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a style="margin-top: 200px;"class="btn btn-danger">Learn More</a>
              </div>
            </div>
            <div class="col-md-4" style="width: auto;margin-top: auto; margin-bottom: auto">
              <img src="{{ asset('event.png') }}" style="width: 730px" class="img-fluid rounded-start" alt="...">
            </div>
        </div>
    </div>

    <div class="title mt-5" style="text-align: center; font-weight: bold; font-size: 2rem">
        <p>Find Event</p>
    </div>

    <section class="search-sec">
        <div class="container">
            <form action="#" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="Search Event ...">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>Location</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>Event Type</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
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
    @include('Components.ImagePage')
    @if (!Auth::check() || auth()->user()->role != 'customer')
        <div class="text-end w-100">
            <a href="/AddNewEvent" class="btn btn-danger fs-3">Add New Event</a>
        </div>
    @endif
</div>
@endsection
