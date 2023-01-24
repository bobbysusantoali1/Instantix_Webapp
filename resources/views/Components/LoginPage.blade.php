@extends('MainBody')
@section('css')
<link rel="stylesheet" href="{{url('../CSS/login.css')}}">
@endsection
@section('title', $title)
@section('content')
<div class="center">
    <h1>Login</h1>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form action="/Login" method="post">
        @csrf
        <div class="txt_field">
            <input type="text" name="email" required>
            <span></span>
            <label>Email Address</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
        </div>
        <div class="mb-3">
            <a href="/Register" class="text-decoration-none text-black">Forgot Password?</a>
        </div>
        @if (session('Login_Error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('Login_Error') }}
            </div>
        @endif
        <button type="submit" class="btn btn-danger w-100">Login</button>
        <div class="signup_link">
            Not a member? <a href="/Register">Register Now</a>
        </div>
    </form>
</div>
@endsection
