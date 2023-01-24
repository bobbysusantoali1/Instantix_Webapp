@extends('MainBody')
@section('title', $title)
@section('content')
<form class="d-flex justify-content-center align-items-center" method="POST" action="/Register">
    @csrf
    <div class="card p-5 ps-5 w-75">
        <h1>Register</h1>
        <div class="input-group">
            <label class="me-2" for="role">AS</label>
            <select style="width: 200px" id="role" name="role">
                <option value="customer" selected>Customer</option>
                <option value="eventOrganizer">Event Organizer</option>
            </select>
        </div>
        <div class="d-flex flex-column justify-content-between">
            <div class="row">
                <div class="col-6 p-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
                <div class="col-6 p-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="fullName" class="form-control" name="full_name" id="fullName" value="{{ old('full_name') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
                </div>
                <div class="col-6 p-3">
                    <label for="dob" class="form-label">DOB</label>
                    <input type="date" class="form-control" name="dob" id="dob" value="{{ old('dob') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" value="{{ old('confirmPassword') }}">
                </div>
                <div class="col-6 p-3">
                    <label class="form-label" for="gender">Sex</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="textarea" class="form-control" name="address" id="address" value="{{ old('address') }}">
                </div>
                <div class="col-6 p-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phone_number" id="phoneNumber" value="{{ old('phone_number') }}">
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-danger">Register</button>
        </div>
    </div>
</form>
@endsection
