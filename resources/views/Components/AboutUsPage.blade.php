@extends('MainBody')
@section('title', $title)
@section('active', ($active == 'Browse') ? 'active' : '')
@section('content')

@include('Components.ImagePage')
</section>
@endsection
