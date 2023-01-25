@extends('MainBody')
@section('title', $title)
@section('content')
<section class="search-sec">
    <div class="container">
        <form action="/Browse">
            @method('get')
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="width: 50%">
                            <input type="search" name= "search" class="form-control search-slt" placeholder="Search Event ..." value="{{ request('search') }}">
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
@include('Components.ImagePage')
</section>
@endsection
