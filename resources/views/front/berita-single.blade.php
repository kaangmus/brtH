@extends('front.front-template')
@section('css')

@endsection
@section('content')

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area ============= -->
                <div class="col-12 col-lg-8">
                    <div class="single-blog-content mb-100">
                        <!-- Post Meta -->
                        <div class="post-meta">
                            <p><a href="#" class="post-date">{{hari_tanggal_waktu($berita->created_at, true)}}</a> <a href="#" class="post-author">{{$berita->reporter_id != 0 ? $berita->reporter->nama : 'Admin'}}</a> - Papua 60 Detik</p>
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">

                                <div class="text-center">
                                        <h3>{{$berita->judul}}</h3>
            
                                <img src="{{asset($berita->gambar)}}" style="max-width: 70%" alt="Gambar Timline Berita">
                                <br><br>
                                    </div>
                            {!!$berita->berita!!}
                        </div>
                        
                    </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area mb-100">
                        
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Top Berita</h5>
                            <div class="widget-content">
                                <!-- Single Blog Post -->
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
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Bagikan Artikel Ini</h5>
                            <div class="widget-content">
                                <div class="social-area d-flex ">
                                    <a href="#" style="margin: 0px 20px"><i class="fa fa-facebook"></i></a>
                                    <a href="#" style="margin: 0px 20px"><i class="fa fa-instagram"></i></a>
                                    <a href="#" style="margin: 0px 20px"><i class="fa fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- ============== Related Post ============== -->
            <div class="row">

                @foreach ($videos as $video)
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Blog Post -->
                    <div class="single-blog-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="{{url('video/'.$video->id)}}">
                            <img src="{{app('App\Models\Video')->gambarmedium($video->url)}}" alt="">
                            </a>
                            <!-- Catagory -->
                            {{-- <a href="{{app('App\Models\Video')->watch($video->url)}}" class="video-btn"><i class="fa fa-play"></i></a> --}}
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
                @endforeach
                
            </div>

        </div>
    </div>

@endsection


@section('script')
@endsection