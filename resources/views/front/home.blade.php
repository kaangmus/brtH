@extends('front.front-template')
@section('css')
<link rel="stylesheet" href="{{asset('vendor/galeri/css/lc_lightbox.css')}}">
<link rel="stylesheet" href="{{asset('vendor/galeri/css/lc_lightbox.min.css')}}">
<link href='https://fonts.googleapis.com/css?family=Heebo' rel='stylesheet' type='text/css'>
@endsection
@section('content')

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area">
            <div id="carouselExampleControls" class="background-overlay carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="max-height: 600px">
                        @foreach ($videos as $i => $video)
                                <div class="carousel-item background-overlay {{$i == 0 ? 'active': ''}}">
                                        <img src="{{$video->thumbnail}}" style="object-fit: cover; width: 100%; height: 600px">
                                        <div class="carousel-caption text-left" style="margin-top: -40px">
                                        <a class="text-white" href="{{route('video.single', ['slug'=>$video->slug])}}" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='white'"><i class="fa fa-play-circle-o fa-5x"></i></a>
                                        <div class="d-block d-sm-none">
                                            <br>
                                                <h3 class="text-white font-weight-bold" style="font-family: Futura">{{$video->judul}}</h3>
                                        </div>
                                        <div class="d-none d-sm-block ">
                                                <h1 class="text-white font-weight-bold"  style="width: 80%; font-family: 'Futura'" >{{$video->judul}}</h1>
                                        </div>
                                        </div>
                                </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="z-index: 10">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="z-index: 10">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

        <!-- Hero Post Slide -->
        <div class="hero-post-area d-none d-sm-block">
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
                                    <a href="{{route('video.single', ['slug'=>$video->slug])}}">{{$video->judul}}</a>
                                </div>
                            </div>
                            @endforeach

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
                        <h5>Story Terbaru</h5>
                    </div>

                    <!-- Single Blog Post -->

                    <div class="list-group">
                    @foreach ($beritas as $berita)
                                <a href="{{route('berita.single', ['slug'=>$berita->slug])}}" class="list-group-item list-group-item-action">
                                    <div class="media">
                                    <img src="{{asset($berita->gambar)}}" class="mr-3" alt="{{$berita->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 140px; height: 100px">
                                    <div class="media-body">
                                        <h6 class="mt-0" style="font-weight: 600">{{$berita->judul}}</h6>
                                        {{-- {{$berita->berita}} --}}
                                        {{$berita->reporter_id != 0 ?  ($berita->reporter) ? $berita->reporter->nama : 'NN' : 'Admin'}} on {{hari_tanggal_waktu($berita->created_at)}}
                                        
                                    </div>
                                    </div>
                                </a>
                    @endforeach
                    </div>

                    
                    @if (count($beritas) == 10)
                        <div class="load-more-btn mt-50 text-center">
                            <a href="{{url('berita-all')}}" class="btn world-btn">Selengkapnya</a>
                        </div>
                    @endif


                        <div class="title" >
                            <h5>Story Terpopuler</h5>
                        </div>
    
                        <!-- Single Blog Post -->
    
                    <div class="list-group">
                        @foreach ($beritavs as $beritav)
                        <a href="{{route('berita.single', ['slug'=>$beritav->slug])}}" class="list-group-item list-group-item-action">
                                <div class="media">
                                <img src="{{asset($beritav->gambar)}}" class="mr-3" alt="{{$beritav->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 140px; height: 100px">
                                <div class="media-body">
                                    <h6 class="mt-0" style="font-weight: 600">{{$beritav->judul}}</h6>
                                    {{-- {{$beritav->berita}} --}}
                                    {{$beritav->reporter_id != 0 ?  ($beritav->reporter) ? $beritav->reporter->nama : 'NN' : 'Admin'}} on {{hari_tanggal_waktu($beritav->created_at)}}
                                    
                                </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="d-none d-sm-block ">
                    <br><br>
                    </div>

                </div>

                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Widget Area -->

                        <div class="sidebar-widget-area">
                            <h5 class="title">Galeri</h5>
                            <div style="padding: 10px; border: 1px solid #DFDFDB; margin-top: 10px">
                                <div class="col-md-12">
                                    <div class="tile">
                                            <div class="row">
                                                @forelse ($fotos as $foto)
                                                <a href="{{$foto->foto}}" class="mybox md-5" title="{{$foto->judul}}" data-lcl-txt="{{$foto->deskripsi}}" data-lcl-author="{{$foto->reporter_id != 0 ?  ($foto->reporter) ? $foto->reporter->nama : 'NN' : 'Admin'}}">
                                                    <img src="{{$foto->foto}}" width="500px" style="padding: 0px; margin: 0px;object-fit: cover; width: 80px; height: 80px">
                                                </a>
                                                @empty
                                                "Belum ada foto"
                                                @endforelse
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
                                
                            <div class="list-group">
                                @forelse ($literasis as $literasi)
                                <a href="{{route('literasi.single', ['slug'=>$literasi->slug])}}" class="list-group-item list-group-item-action">
                                        <div class="media">
                                        <img src="{{asset($literasi->gambar)}}" class="mr-3" alt="{{$literasi->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                        <div class="media-body">
                                            <h6 class="mt-0" style="font-weight: 600">{{$literasi->judul}}</h6>
                                            {{-- {{$literasi->berita}} --}}
                                            {{$literasi->reporter_id != 0 ?  ($literasi->reporter) ? $literasi->reporter->nama : 'NN' : 'Admin'}} on {{hari_tanggal_waktu($literasi->created_at)}}
                                            
                                        </div>
                                        </div>
                                    </a>
                                @empty
                                    Belum ada content literasi
                                @endforelse
                            </div>
                                @if (count($literasis) == 10)
                                    <div class="load-more-btn mt-50 text-center">
                                        <a href="{{url('literasi-all')}}" class="btn world-btn">Selengkapnya</a>
                                    </div>
                                @endif

                                


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@section('script')
<script src="{{asset('vendor/galeri/lib/AlloyFinger/alloy_finger.min.js')}}"></script>
<script src="{{asset('vendor/galeri/js/lc_lightbox.lite.min.js')}}"></script>
<script>
        lc_lightbox('.mybox',{
            wrap_class: 'lcl_fade_oc',
            gallery: true,
            skin: 'minimal',
        })
</script>
@endsection
