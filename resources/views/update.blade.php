@extends('layout')
@section('contenet')
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <title>One sound</title>
        <link rel="stylesheet" href="{{asset('css/upload.css')}}">
    </head>


<body>
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="home.php">Home</a>
        <span class="breadcrumb-item active">Welecome {{ Auth::user() -> email }}</span>
        <span class="breadcrumb-item active">Upload Music</span>
    </div>
</div>
<section class="static about-sec">
    <div class="container">
        <h1>Upload Music></h1>
        <div class="form">
            <form class="" action="{{route('music.edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-and-6">
                        <input type="hidden" name="id" value="{{ $muisc->id }}">
                        <label for="name">Name music:</label>
                        <input type="text" name="name" value="{{ $music->name }}"  required>
                        <label for="Music_url"> Music URL </label>
                        <input type="text" name="Music_url" value="{{ $music->music_url }}" >
                        <label for="description">Description</label>
                        <input type="text" name="description"value="{{ $music->description }}" placeholder="">
                        <label for="category">Category</label>
                        <input type="text" name="category"value="{{ $music->category }}" >
                    </div>
                </div>
    <div class="col-lg-8 col-aid-12">
        <input type="hidden" name="id" value="{{ $video->id }}">
        <button type="submit" class="btn black">Upload music </button>
    </div>
</div>
</form>
</div>
</div>
</section>
@endsection
