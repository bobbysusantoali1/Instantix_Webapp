@extends('MainBody')
@section('css')
<link rel="stylesheet" href="{{url('../CSS/login.css')}}">
@endsection
@section('title', $title)
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="#" method="post">
        <div class="txt_field">
          <input type="text" name="email">
          <span></span>
          <label>Email Address</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password">
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="/Register">Register Now</a>
        </div>
      </form>
    </div>

  </body>
</html>

@endsection
