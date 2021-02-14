@extends('layouts.admin')

@section('content')
<div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    <table class="table table-striped">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        @foreach($supervisors as $supervisor)
        <tr>
            <td>{{$supervisor->id}}</td>
            <td>{{$supervisor->name}}</td>
            <td>{{$supervisor->email}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
