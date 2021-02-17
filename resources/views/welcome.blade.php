@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>
                    
                <div class="card-body">
                    <a href="{{route('registeration')}}">
                        <div class="py-4">
                            Apply for Vendor Registration here!!
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
