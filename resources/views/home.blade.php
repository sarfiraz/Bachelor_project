@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-12 text-center">
                <div class="card bg-light">
                    <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h5>{{ __('You are logged in!') }}</h5>
                        <div class=" mt-3 d-flex justify-content-around" >
                            <a href="{{route('templates')}}" class="btn btn-primary">{{ __('Create New Website') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <h6 class="h6 text-center">Websites of <span class="text-secondary rounded p-1">{{ Auth::user()->name }}</span></h6>
            <hr>
            <div class="row ">
                @forelse ($sites as $index => $site)
                    <div class="card bg-light shadow m-2" style="width: 15rem;">
                        <div class="card-body text-center">
                            {{-- <h5 class="card-title fw-bolder">ID = {{ $site->id ?? 'No ID' }}</h5> --}}
                            <h6 class="card-title fw-bolder">{{$site->title ?? 'No title'}}</h6>
                            {{-- <p class="card-title "><small>{{$site->description?? 'No Description'}}</small></p> --}}
                            <br><br>
                            <a role="button" href="{{ route('template', ['userId'=>Auth::id(), 'id' => $site->id]) }}" class="btn btn-success">
                                View Website
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No Websites available. Please create your first website by clicking button <span class="fw-bolder">Create New Website</span> above!</p>
                @endforelse
            </div>
        </div>
    </div>
    <h4 class="text-center text-bg-secondary shadow mt-3"> &copy; <span>{{ Auth::user()->name }}</span> - All rights reserved {{ date('Y') }}</h4>

@endsection
