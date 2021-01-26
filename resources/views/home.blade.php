@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3 pt-2 mr-4">
            <img src="{{Auth::user()->profile->ProfileImage()}}" class="rounded-circle  w-100" >
        </div>
              <div class="col-3 pt-5">
                <div><h1>{{ Auth::user()->firstname }}</h1></div>
                <p>{{Auth::user()->profile->description}}</p>
                <p>live in {{Auth::user()->country}}, {{Auth::user()->city}}</p>
                 <a href="/profile/{{Auth::user()->id}}/edit">edit profile</a>
                
        </div>
    </div>


</div>
@endsection
