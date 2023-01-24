@extends('MainBody')
@section('title', $title)
@section('active_browse', ($active == 'Browse') ? 'active' : '')
@section('content')
<section class="search-sec">
    <div class="container">
        <form action="#" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="width: 50%">
                            <input type="text" class="form-control search-slt" placeholder="Search Event ...">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                @foreach ($datas as $item)
                                    <option value="{{ $item['event_location'] }}">{{ $item['event_location'] }}</option>
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
