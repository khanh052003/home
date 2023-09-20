@extends('layouts.main')

@section('title')
Page not found
@endsection

@section('content')


<div class="section-padding-100 text-center">
    <h1 class="display-2">
        404
    </h1>
    <h2>Không tìm thấy trang</h2>
    <p>

    </p>
<p class="lead">Xin lỗi không tìm thấy trang bạn đang tìm.</p>
<p><a href='{{url('/')}}' class='btn oneMusic-btn mt-10'>Về trang chủ</a></p>
</div>

@endsection
