@extends('front.front-template')
@section('css')

@endsection
@section('content')

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area">

        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
            <!-- Single Slide -->
            @foreach ($videos as $i => $video)
            <div class="single-hero-slide bg-img background-overlay" style="background-image: url({{asset($video->thumbnail)}});"></div>
            @endforeach
        </div>

        <!-- Hero Post Slide -->
        <div class="hero-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-post-slide">
                            <!-- Single Slide -->
                            @foreach ($videos as $i => $video)
                            <div class="single-slide d-flex align-items-center">
                                <div class="post-number">
                                    <p>{{$i+1}}</p>
                                </div>
                                <div class="post-title">
                                    <a href="{{url('video/'.$video->id)}}">{{$video->judul}}</a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->



<div class="main-content-wrapper"  style="padding: 20px 0px">
    <div class="container">
        <div class="row justify-content-center">
                <div class="world-catagory-slider2 owl-carousel wow fadeInUpBig" data-wow-delay="0.4s">
                        <!-- ========= Single Catagory Slide ========= -->
                        <div class="single-cata-slide">
                            <div class="row">
                                @foreach ($videos as $i => $video)
                                @if ($i<4)
                                <div class="col-12 col-md-4 col-lg-3">
                                        <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                                                <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <a href="{{url('video/'.$video->id)}}">
                                                    <img src="{{app('App\Models\Video')->gambarmedium($video->url)}}" alt="">
                                                <!-- Catagory -->
                                                {{-- <div class="post-cta"><a href="#">travel</a></div> --}}
                                                <!-- Video Button -->
                                                {{-- <a href="{{app('App\Models\Video')->watch($video->url)}}" class="video-btn"><i class="fa fa-play"></i></a> --}}
                                                </a>
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{url('video/'.$video->id)}}" class="headline">
                                                    <h5>{{$video->judul}}</h5>
                                                </a>
                                                {{-- <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p> --}}
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <p><a href="#" class="post-author">{{$video->reporter_id != 0 ? $video->reporter->nama : 'Admin'}}</a> on <a href="#" class="post-date">{{hari_tanggal_waktu($video->created_at, true)}}</a></p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- ========= Single Catagory Slide ========= -->
                        <div class="single-cata-slide">
                            <div class="row">
                                @if (count($videos)>3)
                                    @foreach ($videos as $i => $video)
                                    @if ($i>3 && $i<8)
                                    <div class="col-12 col-md-4 col-lg-3">
                                            <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                                                    <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                <a href="{{url('video/'.$video->id)}}">
                                                    <img src="{{app('App\Models\Video')->gambarmedium($video->url)}}" alt="">
                                                    <!-- Catagory -->
                                                    {{-- <div class="post-cta"><a href="#">travel</a></div> --}}
                                                    <!-- Video Button -->
                                                    {{-- <a href="{{app('App\Models\Video')->watch($video->url)}}" class="video-btn"><i class="fa fa-play"></i></a> --}}
                                                </a>
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="{{url('video/'.$video->id)}}" class="headline">
                                                        <h5>{{$video->judul}}</h5>
                                                    </a>
                                                    {{-- <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p> --}}
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                        <p><a href="#" class="post-author">{{$video->reporter_id != 0 ? $video->reporter->nama : 'Admin'}}</a> on <a href="#" class="post-date">{{hari_tanggal_waktu($video->created_at, true)}}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                </div>
        </div>
    </div>
</div>

<div class="main-content-wrapper" style="padding: 20px 0px">
    <div class="container">

        <div class="world-latest-articles">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="title">
                        <h5>Berita Terbaru</h5>
                    </div>

                    <!-- Single Blog Post -->

                    @foreach ($beritas as $berita)
                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{asset($berita->gambar)}}" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{url('berita/'.$berita->id)}}" class="headline">
                                <h5>{{$berita->judul}}</h5>
                            </a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">{{$berita->reporter_id != 0 ? $berita->reporter->nama : 'Admin'}}</a> on <a href="#" class="post-date">{{hari_tanggal_waktu($berita->created_at, true)}}</a></p>

                                
                            </div>
                        </div>
                    </div>
                    @endforeach

                    


                </div>

                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Widget Area -->

                        <div class="sidebar-widget-area">
                            <h5 class="title">Berita Terpopuler</h5>
                            <div class="widget-content">
                                @foreach ($beritavs as $beritav)
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="{{asset($beritav->gambar)}}" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="{{url('berita/'.$beritav->id)}}" class="headline">
                                            <h5 class="mb-0">{{$beritav->judul}}</h5>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Stay Connected</h5>
                            <div class="widget-content">
                                <div class="social-area d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More btn -->
        <div class="row">
            <div class="col-12">
                <div class="load-more-btn mt-50 text-center">
                    <a href="{{url('berita-all')}}" class="btn world-btn">Load More</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main-content-wrapper" style="padding: 20px 0px">
    <div class="container">

        <div class="world-latest-articles">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="title">
                        <h5>Literasi Terbaru</h5>
                    </div>

                    <!-- Single Blog Post -->

                    @foreach ($literasis as $literasi)
                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{asset($literasi->gambar)}}" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{url('literasi/'.$literasi->id)}}" class="headline">
                                <h5>{{$literasi->judul}}</h5>
                            </a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">{{$literasi->reporter_id != 0 ? $literasi->reporter->nama : 'Admin'}}</a> on <a href="#" class="post-date">{{hari_tanggal_waktu($literasi->created_at, true)}}</a></p>

                                
                            </div>
                        </div>
                    </div>
                    @endforeach

                    


                </div>

                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Widget Area -->

                        <div class="sidebar-widget-area">
                            <h5 class="title">Literasivs Terpopuler</h5>
                            <div class="widget-content">
                                @foreach ($literasivs as $literasiv)
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="{{asset($literasiv->gambar)}}" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="{{url('literasi/'.$literasiv->id)}}" class="headline">
                                            <h5 class="mb-0">{{$literasiv->judul}}</h5>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Stay Connected</h5>
                            <div class="widget-content">
                                <div class="social-area d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More btn -->
        <div class="row">
            <div class="col-12">
                <div class="load-more-btn mt-50 text-center">
                    <a href="#" class="btn world-btn">Load More</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection
