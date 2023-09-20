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
    {{-- @toastr_css
    @jquery
    @toastr_js
    @toastr_render --}}
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
                                    <li><a href="{{url('/events')}}">Sự kiện</a></li>
                                    <li><a href="{{url('/musics')}}">Bài hát</a></li>
                                    <li><a href="{{url('/contact')}}">Góp Ý</a></li>
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
                                    <li><a href="{{url('/events')}}">Sự kiện</a></li>
                                    <li><a href="{{url('/musics')}}">Bài hát</a></li>
                                    <li><a href="{{url('/contact')}}">Góp Ý</a></li>
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
    <section class="breadcumb-area bg-img bg-overlay"
        style="background-image: url({{asset('img/bg3.jpg')}});">
        <div class="bradcumbContent">
            <p></p>
            <h2>@yield('title')</h2>
        </div>
    </section>
    <section class="contact-area">
        <div class="container">

            @yield('content')
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