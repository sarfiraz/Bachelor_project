@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-3">
            <h2 class="h2 text-center">Dear <span class="text-secondary rounded p-1">{{ Auth::user()->name }}</span>, Choose a template for your website</h2>
            <hr>
            <div class="row">
                @forelse ($templates as $index => $template)
                    <div class="card bg-light m-2 shadow" style="width: 15rem;">
                        <div class="card-body text-center template-card">
                            {{-- <h5 class="card-title fw-bolder">ID = {{ $template->id ?? 'No ID' }}</h5> --}}
                            <h5 class="card-title fw-bold">{{ $template->title ?? 'No title' }}</h5>
                            {{-- <p class="card-text "><small>{{ $template->description ?? 'No Description' }}</small></p> --}}
                            <br><br>
                            <a role="button" href="{{ route('sample') }}" class="btn btn-outline-success">
                                View
                            </a>
                            <a role="button" href="{{ route('upload', ['id' => $template->id]) }}" class="btn btn-outline-primary">
                                Select
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No templates available. please first add temlplates!</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
