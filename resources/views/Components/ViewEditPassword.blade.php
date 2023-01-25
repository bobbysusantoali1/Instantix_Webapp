@extends('MainBody')
@section('title', $title)
@section('content')
<form class="d-flex justify-content-center align-items-center" action="{{ Route('edit-password') }}" method="POST">
    @method('patch')
    @csrf
    <div class="card p-5 ps-5 w-75">
        <h1>Edit Password</h1>
        <div class="d-flex flex-column justify-content-between">
            <div class="row">
                <div class="col-6 p-3">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="password" class="form-control" name="old_password" id="old_password" autofocus>
                </div>
                <div class="col-6 p-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
        </div>
        <a id="back_btn" class="btn btn-danger w-100 mt-3 text-white" onclick="location.href='{{ url()->previous() }}'">Back</a>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-success">Update Password</button>
        </div>
    </div>
</form>
@endsection
