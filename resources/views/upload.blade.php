@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center shadow rounded-5">
        <div class="row">
            <div class="col-12 mt-2">
                <h1 class="h1 text-center">Upload Images For Your Website</h1>
                <div class="form-container mt-3">
                    <form action="/upload/{{$id}}" method="post" enctype="multipart/form-data" class="needs-validation">
                        @csrf
                        <input type="hidden" name="image_order[]" value="0">

                        <div class="mb-3">
                            <label for="title" class="form-label">Website Title:</label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Website Title" required>
                            <div class="invalid-feedback">Please enter a website title.</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Website Description:</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Website Description" ></textarea>
                            <div class="invalid-feedback">Please enter a website description.</div>
                        </div>

                        <div class="mb-3">
                            <label for="bg" class="form-label">Choose a background image <span class="text-danger rounded-5">(High quality recommended!)</span>:</label>
                            <input class="form-control" type="file" name="bg_image" id="bg" accept="image/*" required>
                            <div class="invalid-feedback">Please choose a background image.</div>
                        </div>

                        <div class="mb-3">
                            <label for="others" class="form-label">Please choose {{$refs}} other images:</label>
                            <input class="form-control" id="others" type="file" name="images[]" accept="image/*" multiple required>
                            <div class="invalid-feedback">Please choose at least one image.</div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-2">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
