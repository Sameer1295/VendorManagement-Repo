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
                    <a href="{{route('vendor.show',$vendor->id)}}" value="accept" class="btn btn-primary">View details</a>
                    @if(Auth::check() && Auth::user()->role_id == 1)
                        <form action="{{route('vendor.destroy',$vendor->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger my-1" onclick="confirm('are you sure?')">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    @else
        <div class="alert alert-danger py-4">No New Vendor request yet...</div>
    @endif
</div>
@endsection
