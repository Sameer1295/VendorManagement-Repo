@extends('layouts.admin')

@section('content')
<div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    <div class="card">
        <div class="card-header">Vendor details</div>
        <div class="card-body">
            <p><b class="mr-4">Vendor name</b> {{$vendor->name}}</p>
            <p><b class="mr-4">Address</b> {{$vendor->address}}</p>
            <p><b class="mr-4">Phone no</b> {{$vendor->phone_number}}</p>
            <p><b class="mr-4">Mobile no</b> {{$vendor->mobile_number}}</p>
            <p><b class="mr-4">Fax</b> {{$vendor->fax}}</p>
            <p><b class="mr-4">Email</b> {{$vendor->email}}</p>
            <p><b class="mr-4">Documents</b> <strong>Gst Certificate Company certificate Pan Adhaar</strong></p>
            <h4>Contact person details</h4>
            <p><b class="mr-4">Contact person</b> {{$vendor->contact_person}}</p>
            <p><b class="mr-4">Mobile no</b> {{$vendor->contact_person_mobile}}</p>
            <p><b class="mr-4">Email</b> {{$vendor->contact_person_email}}</p>
            <p>
                <form action="{{route('vendor.update',$vendor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($vendor->status == 0)
                        <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                        <button type="submit" name="action" value="reject" class="btn btn-warning">Reject</button>
                    @endif

                    <!-- <a href="{{route('vendor.show',$vendor->id)}}" name="action" value="accept" class="btn btn-primary">Accept</a>
                    <a href="{{route('vendor.edit',$vendor->id)}}" value="action" class="btn btn-warning">Reject</a> -->
                </form>
            </p>
        </div>
    </div>
</div>
@endsection
