<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these  tags -->

    <!-- Title -->
    <title>{{env('APP_NAME')}} - @yield('title')</title>
  
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Stylesheet -->

    <link rel="stylesheet" href="{{asset('vendor/main/stylecss.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/main/css/bootstrap.min.css')}}">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="loading" style="display:none;">
        <div class="spinner"></div>
        <br />
        Vui lòng chờ...
    </div>

    <div class="loader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="{{url('/')}}" class="nav-brand text-white">ONE SOUND</a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>


                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav navbar-collapse">
                                <ul class="nav">
                                    @guest
                                    <li>

                                        <form class="form-inline" action="{{ route('find') }}" method="post">
                                            {{ csrf_field() }}
                                            <input class="form-control mr-sm-2" type="search" name="keywords"
                                                placeholder="Tìm kiếm...">
                                            <button class="btn btn-dark" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </form>

                                    </li>
                                    <li><a href=""></a></li>
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li><a href="{{url('/albums')}}">Albums</a></li>
                                    <li><a href="{{url('/musics')}}">Bài hát</a></li>                       
                                    <li><a href=""></a></li>



                                    <li><a href="{{ route('login') }}"> <button type="button"
                                                class="btn btn-dark"><b>Đăng nhập</b></button></a></li>


                                    @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}"><button type="button"
                                                class="btn btn-dark"><b>Đăng ký</b></button></a></li>
                                    @endif
                                    @else

                                    <li>

                                        <form class="form-inline" action="{{ route('find') }}" method="post">
                                            {{ csrf_field() }}
                                            <input class="form-control mr-sm-2" type="search" name="keywords"
                                                placeholder="Tìm kiếm...">
                                            <button class="btn btn-dark" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </form>

                                    </li>
                                    <li><a href=""></a></li>
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li><a href="{{url('/albums')}}">Albums</a></li>
                                    <li><a href="{{url('/musics')}}">Bài hát</a></li>
                                    <li><a href=""></a></li>
                                    <li class="nav-item dropdown">

                                        <a class="nav-link btn btn-dark" id="navbarDropdown"
                                            role="button" href="#" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            <i class=""></i> <b>Welcome {{ Auth::user()->name }}</b></a>
                                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">

                                            @if ((Auth::check() && Auth::user()->typeuser == 'admin'))
                                            <a class="dropdown-item" href="{{url('/admin')}}">

                                                Trang quản trị
                                                <i class="fas fa-tasks-alt"></i>
                                            </a>
                                            @endif
                                            @if ((Auth::check() && Auth::user()->typeuser == 'admin')||(Auth::check() &&
                                            Auth::user()->typeuser ==
                                            'user'))

                                            <a class="dropdown-item" href="">

                                                Thông tin tài khoản
                                                <i class="fas fa-user"></i>
                                            </a>
                                           
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                                Đăng xuất
                                                <i class="fas fa-sign-out-alt"></i>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>

                                        </div>
                                    </li>

                                    @endguest
                                </ul>

                                <!-- Login/Register & Cart Button -->

                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section>
        <div class="bradcumbContent">
            <p></p>
            <h2>@yield('title')</h2>
        </div>
    </section>
    <section class="contact-area">
        <div class="container-fluid">

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url('/img/bg3.jpg');"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



   </section>
    <!-- ##### Buy Now Area Start ##### -->

    <!-- ##### Buy Now Area End ##### -->
    @if(count($musics) > 0)
    <!-- ##### Featured Artist Area Start ##### -->
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img src="images/albumart/{{$latest->image}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                            <h2>{{$latest->title}}</h2>
                        </div>
                        <p>{{$latest->content}}</p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>{{$latest->title}}</p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="songs/{{$latest->song}}">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Featured Artist Area End ##### -->
    @endif
    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>This week’s top</h2>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/a1.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <h6>Sam Smith</h6>
                                <p>Pop, R&B, Soul</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="150ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/a2.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <h6>Travis Scott</h6>
                                <p>Rap</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="200ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/a3.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <h6>Taylor Swift</h6>
                                <p>Country pop</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="250ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/a4.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <h6>Justin Bieber</h6>
                                <p>Pop</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="300ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/a5.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <h6>Camila Cabello</h6>
                                <p>	Pop R&B</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="350ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/a6.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <h6>Billie Eilish</h6>
                                <p>Pop Songs</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>
                        @if(count($musics) > 0)
                        @foreach($musics as $music)
                        <!-- Single Top Item -->
                        <div id="user-data" data-users="{{ json_encode($musics) }}"></div>
                        <a href="{{url('/music/'.$music->slug)}}">
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="images/thumbnails/{{$music->image}}"  alt="">
                                </div>
                                <div class="content-">
                                    <h6>{{Str::limit($music->title, 20)}}</h6>
                                    <p>{{$music->artist}}</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="songs/{{$music->song}}">
                            </audio>
                        </div>
                    </a>
                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>Popular Artist</h2>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/c1.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <p>Sam Smith</p>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="150ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/c2.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <p>Taylor Swift</p>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="200ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/c3.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <p>Snoop Dogg</p>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="250ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/c4.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <p>Justin Bieber</p>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/c5.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <p>DJ Snake</p>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="350ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/c6.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <p>Selena Gomez</p>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="400ms">
                            <div class="thumbnail">
                                <img src="{{ asset ('/img/c7.jpg') }}"  alt="">
                            </div>
                            <div class="content-">
                                <p>Travis Scott</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url('/img/bg3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    </div>
    </section>


    </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-12 col-md-6">
                    <a href="#" class="text-white h4">WEBMUSIC</a>
                    <p class="copywrite-text"><a href="#">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                            document.write(new Date().getFullYear());
                            </script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="{{url('/')}}">Trang Chủ</a></li>
                            <li><a href="{{url('/albums')}}">Albums</a></li>
                            <li><a href="{{url('/events')}}">Sự Kiện</a></li>
                            <li><a href="{{url('/musics')}}">Bài hát</a></li>
                            <li><a href="{{url('/contact')}}">Góp Ý</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

  
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->

    <script src="{{asset('vendor/main/js/mainn.js')}}"></script>
    <script src="{{asset('vendor/main/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('vendor/main/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('vendor/main/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('vendor/main/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->

    <script src="{{asset('vendor/main/js/active.js')}}"></script>
   
    

</body>



</html>