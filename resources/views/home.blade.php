@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check() && Auth::user()->role_id == 1)
                    
                    {{ __('You are logged in! Admin') }}
                    
                    @elseif(Auth::check() && Auth::user()->role_id == 2)
                    
                    {{__('You are logged in supervisor')}}

                    @elseif(Auth::guest())
                    <a href="{{route('vendor.create')}}">
                        <div class="py-4">
                            Apply for Vendor Registration here!!
                        </div>
                    </a>
                    @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
