@extends('layouts.admin')

@section('content')
<div class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if($vendors->count())
    <table class="table table-striped">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        @foreach($vendors as $vendor)
            <tr>
                <td>{{$vendor->id}}</td>
                <td>{{$vendor->name}}</td>
                <td>{{$vendor->email}}</td>
                @if($vendor->status == 0)
                <td class="text text-primary">{{__('Yet to check')}} </td>
                @elseif($vendor->status == 1) 
                <td class="text text-success">{{__('Accepted')}} </td>
                @elseif($vendor->status == 2) 
                <td class="text text-danger">{{__('Rejected')}} </td>
                @endif
                <td>
                    <a href="{{route('vendor.show',$vendor->id)}}" value="accept" class="btn btn-primary">View request</a>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        <div class="alert alert-danger py-4">No Vendor request accepted yet...</div>
    @endif
</div>
@endsection
