@extends('MainBody')
@section('title', $title)
@section('content')
<div class="container bg-light">
    <div class="card-body d-flex align-items-center flex-column">
        <h1 class="card-title text-black my-4">My Profile</h1>
        <div class="container my-1 d-flex align-items-center flex-column">
            <span class="py-1 px-3 bg-secondary rounded text-white">
                @if ($user->role == 'customer')
                    Customer
                @else
                    Event Organizer
                @endif
            </span>
            <p class="m-1 card-text fw-bold">Full Name: {{ $user->full_name }}</p>
            <p class="m-1 card-text ">{{ $user->email }}</p>
            <p class="m-1 card-text ">Address: {{ $user->address }}</p>
            <p class="m-1 card-text ">Gender: {{ $user->gender }}</p>
            <p class="m-1 card-text ">Date of Birth: {{ $user->dob }}</p>
            <p class="m-1 card-text ">Phone: {{ $user->phone_number }}</p>
        </div>
        <div class="container my-3 d-flex justify-content-evenly">
            @if ($user->role == 'customer')
                <a href="{{ route('view-edit-profile') }}" class="btn btn-primary px-4">Edit Profile</a>
                @endif
            <a href="{{ route('view-edit-password') }}" class="btn btn-outline-primary px-4">Edit Password</a>
        </div>
    </div>
</div>
@endsection
