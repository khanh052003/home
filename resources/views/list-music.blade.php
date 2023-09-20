@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DJoz Template">
    <meta name="keywords" content="DJoz, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>K-Tran | Music</title>

    <!-- Google Font -->
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap')}}" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/audioplayer.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/classy-nav.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
        <span class=" breadcrumb-item active">welecome{{ auth::user()-> email }}</span>
        <span class=" breadcrumb-item active">list of music available</span>
        <a href="{{ route('music.add') }}"><button><font color="red">Add music</font></button>
    </div>
</div>
<div class="container">
    <table class="col-md-12">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Descripton</th>
            <th>Publish Date</th>
            <th>Music URL</th>
            <th>Actions</th>
        </tr>
        @foreach ($createmusic as $music )
        <tr>
            <td>{{ $music->name }}</td>
            <td>{{ $music->category }}</td>
            <td>{{ $music->description }}</td>
            <td>{{ $music->crate_at }}</td>
            <td>{{ $music->name }}</td>
            <td>
            <a href="{{ route('music.update',$music->id) }}"><button class="btn-success" type=button>UPDATE</button></a>
            <a href="{{ route('music.delete',$music->id) }}"><button class="btn-danger" type=button>DELETE</button></a>
            </td>
        </tr>
            @endforeach
    </table>
</div>
@endsection
