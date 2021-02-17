@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <h2>Vendor Registration form</h2>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('vendor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Vendor Name</label>
                    <input type="text" name="name" id="name" class="col-sm-8 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="address">Address</label>
                    <textarea name="address" id="address" cols="10" rows="3" class="col-sm-8 form-control"></textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="col-sm-8 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="mobile_number">Mobile Number</label>
                    <input type="text" name="mobile_number" id="mobile_number" class="col-sm-8 form-control">
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Fax</label>
                    <input type="text" name="fax" id="fax" class="col-sm-8 form-control">
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Gst Certificate</label>
                    <input type="file" name="gst_certificate" id="gst_certificate" class="col-sm-8 form-control-file">
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Company Certificate</label>
                    <input type="file" name="company_certificate" id="company_certificate" class="col-sm-8 form-control-file">
                </div>
                <div class="form-group row">
                    <label for="pan" class="col-sm-3 col-form-label">Pan</label>
                    <input type="file" name="pan" id="pan" class="col-sm-8 form-control-file">
                </div>
                <div class="form-group row">
                    <label for="adhaar" class="col-sm-3 col-form-label">Adhaar</label>
                    <input type="file" name="adhaar" id="adhaar" class="col-sm-8 form-control-file">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="email">Vendor email</label>
                    <input type="email" name="email" id="email" class="col-sm-8 form-control">
                </div>
                <div class="form-group row">
                    <label for="contact_person" class="col-sm-3 col-form-label">Contact person</label>
                    <input type="text" name="contact_person" id="contact_person" class="col-sm-8 form-control">
                </div>
                <div class="form-group row">
                    <label for="contact_person_mobile" class="col-sm-3 col-form-label">Contact person Mobile</label>
                    <input type="text" name="contact_person_mobile" id="contact_person_mobile" class="col-sm-8 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="contact_person_email">Contact Person email</label>
                    <input type="email" name="contact_person_email" id="contact_person_email" class="col-sm-8 form-control">
                </div>
                <button type="submit" class="btn btn-primary">Register Vendor</button>
            </form>
        </div>
    </div>
</div>
@endsection
