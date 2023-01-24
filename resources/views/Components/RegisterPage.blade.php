@extends('MainBody')
@section('title', $title)
@section('content')
<form class="d-flex justify-content-center align-items-center" method="POST" action="/Register">
    @csrf
    <div class="card p-5 ps-5 w-75">
        <h1>Register</h1>
        <div class="input-group">
            <label class="me-2" for="role">AS</label>
            <select style="width: 200px" id="role">
                <option value="roleC" selected>Customer</option>
                <option value="roleEO">Event Organizer</option>
            </select>
        </div>
        <div class="d-flex flex-column justify-content-between">
            <div class="row">
                <div class="col-6 p-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="col-6 p-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="fullName" class="form-control" name="fullName" id="fullName">
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-6 p-3">
                    <label for="dob" class="form-label">DOB</label>
                    <input type="date" class="form-control" name="dob" id="dob">
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
                </div>
                <div class="col-6 p-3">
                    <label for="gender" class="form-label mb-3">Sex</label>
                    <div class="d-flex mb-1">
                        <input type="radio"  name="gender" id="genderM" class="form-check-input">
                        <label for="genderM" class="form-label me-2 ms-1 my-auto">Male</label>
                        <input type="radio"  name="gender" id="genderF" class="form-check-input">
                        <label for="genderF" class="form-label me-2 ms-1 my-auto">Female</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="textarea" class="form-control" name="address" id="address">
                </div>
                <div class="col-6 p-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phoneNumber" id="phoneNumber">
                </div>
            </div>
            <div class="col-6">
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-danger">Register</button>
        </div>
    </div>
</form>
@endsection
