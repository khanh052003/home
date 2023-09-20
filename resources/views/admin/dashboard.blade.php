@extends('layouts.admin')

@section('title')
Thống kê
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row" id="explore">
                    <div class="col-xl-3 col-md-3 mb-3">
                      <div class="card rounded-o text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fa fa-fw fa-music"></i>
                          </div>
                         <b> <div class="mr-5">{{ App\Models\Music::count() }} bài hát</div></b>
                        </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('music')}}">
                          <span class="float-left">Xem chi tiết</span>
                          <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="col-xl-3 col-md-3 mb-3">
                      <div class="card rounded-0 bg-primary text-white o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fa fa-fw fa-compact-disc"></i>
                          </div>
                         <b> <div class="mr-5">{{ App\Models\Album::count() }} Albums</div></b>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="">
                          <span class="float-left">Xem chi tiết</span>
                          <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                  
                    </div>
            <!--end of cards-->
            {{-- <h3 class="my-4 font-weight-bold">Bài hát mới</h3><hr> --}}
{{-- <div class="row">
        <div id="music" class="col-md-4">
        @foreach($musics as $music)
                <div class="card" style="width: 15rem;">
                <img src="{{url('/images/thumbnails/'.$music->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <p class="card-text font-weight-bold">{{$music->title}}</p>
                    </div>
                  </div>
                  @endforeach
        </div>
        <div id="album" class="col-md-4">

        </div>


        <div id="album" class="col-md-4">

        </div>

    </div> --}}

</div>


    </div>

</div>
@endsection
