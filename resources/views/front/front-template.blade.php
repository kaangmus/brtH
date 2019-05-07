<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/world/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 05:14:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="googlebot-news" content="index,follow"/><meta charSet="utf-8"/>
    <meta name="robots" content="index, follow"/>
    <meta name="author" content="{{env('APP_NAME')}}">
    
    <meta name="description" content="@yield('meta-deskripsi')"/>
    <meta name="keywords" content="@yield('meta-keywords')"/>
    <meta name="news_keywords" content="@yield('meta-news_keywords')"/>

    {{-- SEO share --}}
    <!--  Essential META Tags -->
    <meta property="og:site" content="{{env('APP_NAME')}}"/>
    <meta property="og:creator" content="{{env('APP_NAME')}}"/>
    <meta property="og:title" content="@yield('meta-judul')">
    <meta property="og:description" content="@yield('meta-deskripsi')">
    <meta property="og:image" content="@yield('meta-image')">
    <meta property="og:url" content="{{url()->current()}}">
    <meta name="twitter:card" content="@yield('meta-image')">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:site_name" content="{{env('APP_NAME')}}">
    <meta property="twitter:image" content="@yield('meta-image')">
    <meta name="twitter:image:alt" content="{{env('APP_NAME')}}">
    <!--  Non-Essential, But Required for Analytics -->
    <meta property="fb:app_id" content="{{env('APLIKASI_FB')}}" />
    <meta name="twitter:site" content="{{env('AKUN_TWITTER')}}">


    <!-- Title  -->
    <title>{{env('APP_NAME')}}</title>
    <link rel="icon" href="{{asset(env('APP_ICON', 'images/icon.png'))}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('front/style.css')}}">

    @yield('css')

</head>

<body>
    <!-- Preloader Start -->
    {{-- <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div> --}}
    <!-- Preloader End -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area {{(Request::is('/'))? '': 'sticky'}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg" style="border-bottom: 0px">
                        <!-- Logo -->
                        <a class="navbar-brand" href="{{url('')}}"><img src="{{asset(env('APP_LOGO'))}}" style="max-width:200px; " alt="Logo"></a>
                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item {{(Request::is('/'))? 'active': ''}}">
                                    <a class="nav-link" href="{{url('')}}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{(Request::is('video-all') OR \Request::is('video-all/*') OR \Request::is('video-all'))? 'active': ''}}">
                                    <a class="nav-link" href="{{url('video-all')}}">Video <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{(Request::is('berita') OR \Request::is('berita/*') OR \Request::is('berita-all'))? 'active': ''}}">
                                    <a class="nav-link" href="{{url('berita-all')}}">Stories <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{(Request::is('galeri') OR \Request::is('galeri/*') OR \Request::is('galeri-all'))? 'active': ''}}">
                                    <a class="nav-link" href="{{url('galeri-all')}}">Galeri <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{(Request::is('literasi') OR \Request::is('literasi/*') OR \Request::is('literasi-all'))? 'active': ''}}">
                                    <a class="nav-link" href="{{url('literasi-all')}}">Literasi <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                            <div id="search-wrapper">
                                <form action="{{route('cari')}}">
                                        <input type="text" name="word" id="search" placeholder="Search something...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    @yield('content')

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <img src="{{asset(env('APP_LOGO'))}}" class="mt-4" alt="..." style="max-width: 200px">
                        <p class="text-white">Copyright &copy 2019 - Papua60Detik.id</p>

                        <?php
                            $atributs = App\Models\Atribut::all();
                        ?>

                        {{-- <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
                        <p>Proudly distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></p> --}}
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mt-4">
                        @foreach ($atributs as $atribut)
                            <a href="{{url('informasi/'.$atribut->atribut)}}" class="btn btn-sm btn-default">{{$atribut->atribut}}</a>
                        @endforeach
                    </div>
                </div>
                
                <div class="col-12 col-md-3">
                    <div class="footer-single-widget">
                            <div class="sidebar-widget-area">
                                    <h5 class="title">Sosial Media</h5>
                                    <div class="widget-content" style="padding: 5px;">
                                        <div class="social-area d-flex ">
                                            <a target="_blank" href="{{env('URL_FACEBOOK')}}" style="margin: 0px 20px"><i class="fa fa-facebook"></i></a>
                                            <a target="_blank" href="{{env('URL_INSTAGRAM')}}" style="margin: 0px 20px"><i class="fa fa-instagram"></i></a>
                                            <a target="_blank" href="{{env('URL_YOUTUBE')}}" style="margin: 0px 20px"><i class="fa fa-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('front/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('front/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('front/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('front/js/active.js')}}"></script>
    @yield('script')
</body>
</html>
