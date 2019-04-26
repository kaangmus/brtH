@extends('front.front-template')
@section('css')
<link rel="stylesheet" href="{{asset('display/css/lightgallery.css')}}">
<script src="{{asset('display/js/lightgallery.min.js')}}"></script>
@endsection
@section('content')

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area">
            <div id="carouselExampleControls" class="background-overlay carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="max-height: 600px">
                        @foreach ($videos as $i => $video)
                            
                                <div class="carousel-item background-overlay {{$i == 0 ? 'active': ''}}">
                                        <img src="{{$video->thumbnail}}" style="object-fit: cover; width: 100%; height: 600px">
                                        <div class="carousel-caption text-left" style="text-shadow: 2px 2px #000000">
                                        <a class="text-white" href="{{url('video/'.$video->id)}}" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'"><i class="fa fa-play-circle-o fa-5x"></i></a>
                                        <h3 class="text-white font-weight-bold" style="width: 50%;" >{{$video->judul}}</h3>
                                        </div>
                                </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
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


{{-- 
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
                                                <!-- <div class="post-cta"><a href="#">travel</a></div> -->
                                                <!-- Video Button -->
                                                <!-- <a href="{{app('App\Models\Video')->watch($video->url)}}" class="video-btn"><i class="fa fa-play"></i></a> -->
                                                </a>
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{url('video/'.$video->id)}}" class="headline">
                                                    <h5>{{$video->judul}}</h5>
                                                </a>
                                                <!-- <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p> -->
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
                                                    {{-- <div class="post-cta"><a href="#">travel</a></div> -->
                                                    <!-- Video Button -->
                                                    {{-- <a href="{{app('App\Models\Video')->watch($video->url)}}" class="video-btn"><i class="fa fa-play"></i></a> -->
                                                </a>
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="{{url('video/'.$video->id)}}" class="headline">
                                                        <h5>{{$video->judul}}</h5>
                                                    </a>
                                                    {{-- <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p> -->
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
--}}

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

                    
                    @if (count($beritas) == 10)
                        <div class="load-more-btn mt-50 text-center">
                            <a href="{{url('berita-all')}}" class="btn world-btn">Selengkapnya</a>
                        </div>
                    @endif


                        <div class="title">
                            <h5>Berita Terpopuler</h5>
                        </div>
    
                        <!-- Single Blog Post -->
    
                        @foreach ($beritavs as $beritav)
                        <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="{{asset($beritav->gambar)}}" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="{{url('berita/'.$beritav->id)}}" class="headline">
                                    <h5>{{$beritav->judul}}</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-author">{{$beritav->reporter_id != 0 ? $beritav->reporter->nama : 'Admin'}}</a> on <a href="#" class="post-date">{{hari_tanggal_waktu($beritav->created_at, true)}}</a></p>
    
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
    

                    


                </div>

                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Widget Area -->

                        <div class="sidebar-widget-area">
                            <h5 class="title">Galeri</h5>
                            <div class="widget-content">
                                <div class="col-md-12">
                                    <div class="tile">
                                            <div class="row">
                                            <div id="aniimated-thumbnials">
                                                @forelse ($fotos as $foto)
                                                    <a href="{{asset($foto->foto)}}" style="text-decoration: none;padding: 0px; margin: 0px;">
                                                        <img src="{{asset($foto->foto)}}" class="col-sm-2" style="padding: 0px; margin: 0px;object-fit: cover; width: 100%; height: 60px"/>
                                                    </a>
                                                @empty
                                                Belum ada content Foto
                                                @endforelse
                                                </div>
                                            </div>

                                            @if (count($fotos) == 15)
                                                <div class="load-more-btn mt-50 text-center">
                                                    <a href="{{url('galeri-all')}}" class="btn world-btn">Selengkapanya</a>
                                                </div>
                                            @endif
                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget-area">
                            <h5 class="title">Literasi</h5>
                            <div class="widget-content">
                                
                                @forelse ($literasis as $literasi)
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="{{asset($literasi->gambar)}}" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="{{url('literasi/'.$literasi->id)}}" class="headline">
                                            <h5 class="mb-0">{{$literasi->judul}}</h5>
                                        </a>
                                    </div>
                                </div>
                                
                                @empty
                                    Belum ada content literasi
                                @endforelse

                                @if (count($literasis) == 10)
                                    <div class="load-more-btn mt-50 text-center">
                                        <a href="{{url('literasi-all')}}" class="btn world-btn">Selengkapnya</a>
                                    </div>
                                @endif

                                

                            </div>
                        </div>


                        {{-- <div class="sidebar-widget-area">
                            <h5 class="title">Literasi Terpopuler</h5>
                            <div class="widget-content">
                                
                                @forelse ($literasivs as $literasiv)
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
                                @empty
                                    Belum ada content literasi
                                @endforelse

                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@section('script')
<script>
        lightGallery(document.getElementById('aniimated-thumbnials'), {
            thumbnail:true
        }); 
    </script>
@endsection
