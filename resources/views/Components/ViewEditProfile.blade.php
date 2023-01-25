@extends('MainBody')
@section('title', $title)
@section('content')
<form class="d-flex justify-content-center align-items-center" action="{{ Route('edit-profile') }}" method="POST">
    @csrf
    <div class="card p-5 ps-5 w-75">
        <h1>Edit Profile</h1>
        <div class="d-flex flex-column justify-content-between">
            <div class="row">
                <div class="col-6 p-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" autofocus value="{{ old('email', $user->email) }}"">
                </div>
                <div class="col-6 p-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="fullName" class="form-control" name="full_name" id="full_name" value="{{ old('full_name', $user->full_name) }}"">
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label class="form-label" for="gender">Sex</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="Male" <?php if($user->gender == 'Male' || old('full_name') == 'Male'){echo("selected");}?> >Male</option>
                        <option value="Female" <?php if($user->gender == 'Female' || old('full_name') == 'Female'){echo("selected");}?> >Female</option>
                    </select>
                </div>
                <div class="col-6 p-3">
                    <label for="dob" class="form-label">DOB</label>
                    <input type="date" class="form-control" name="dob" id="dob" value="{{ old('dob', $user->dob) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="textarea" class="form-control" name="address" id="address" value="{{ old('address', $user->address) }}">
                </div>
                <div class="col-6 p-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-success">Update Profile</button>
        </div>
    </div>
</form>
@endsection
