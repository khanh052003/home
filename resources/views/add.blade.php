<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layout')
    @section('content')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="{{ ('/') }}">Home</a>
        <span class="breadcrumb-item active">Welecome {{ Auth::user() -> email }}</span>
        <span class="breadcrumb-item active">Upload Music</span>
    </div>
</div>
<section class="static about-sec">
    <div class="container">
        <h1>Upload Music</h1>
        <div class="form">
            <form class="" action="{{route('music.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-and-6">
                        <input type="hidden" name="id" value="">
                        <label for="name">Name of music:</label>
                        <input type="text" name="name" value="" placeholder="Fantasy World" required>
                        <label for="Music_url"> Music URL </label>
                        <input type="text" name="Music_url" value="" placeholder="FMW5vLCdPks">
                        <label for="description">Description</label>
                        <input type="text" name="description"value="" placeholder="">
                        <label for="category">Category</label>
                        <select name="category" class="form-control">
                            <option value="MUSIC">Music</option>
                            <option value="FILM">Film</option>
                            <option value="Nature">Nature</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
    <div class="col-lg-8 col-aid-12">
        <button type="submit" class="btn black">Upload music </button>
    </div>
</div>
</form>
</div>
</div>
</section>
@endsection
</body>
</html>


