@extends('layouts.admin')

@section('content')
<div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{route('checkOTP')}}" method="GET">
        @csrf
        <div class="form-group row">
            <label for="otp" class="col-sm-3 col-form-label">Email OTP</label>
            <input type="text" name="otp" id="otp" class="col-sm-8 form-control">
        </div>  
        <button type="submit" class="btn btn-primary">Verify OTP</button>      
@endsection
