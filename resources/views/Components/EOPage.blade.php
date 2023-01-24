@extends('MainBody')
@section('title', $title)
@section('content')
<div class="container">
    @include('Components.ImagePage')
    <div class="d-flex justify-content-end">
        <a href="/AddEvent" class="btn btn-danger rounded-pill">Add New Event</a>
    </div>
</div>
@endsection
