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
                            <p><a href="#" class="post-date">{{hari_tanggal_waktu($literasi->created_at, true)}}</a> <a href="#" class="post-author">{{$literasi->reporter_id != 0 ?  ($literasi->reporter) ? $literasi->reporter->nama : 'NN' : 'Admin'}}</a> - Papua 60 Detik</p>
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">

                                <div class="text-center">
                                        <h3>{{$literasi->judul}}</h3>
            
                                <img src="{{asset($literasi->gambar)}}" style="max-width: 70%" alt="Gambar Timline literasi">
                                <br><br>
                                    </div>
                            {!!$literasi->literasi!!}
                        </div>
                        
                    </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area mb-100">
                        
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Top literasi</h5>
                            <div class="widget-content">
                                
                                        @foreach ($literasivs as $literasiv)
                                        <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="{{asset($literasiv->gambar)}}" alt="">
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{route('literasi.single', ['slug'=>$literasi->slug])}}" class="headline">
                                                    <h5 class="mb-0">{{$literasiv->judul}}</h5>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
        
                            </div>
                        </div>
                        <!-- Widget Area -->
                        
                    </div>
                </div>
            </div>

            <!-- ============== Related Post ============== -->
            <div class="row">

                @foreach ($videos as $video)
                <div class="col-12 col-md-4 col-lg-3">
                    <!-- Single Blog Post -->
                    <div class="single-blog-post">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="{{route('video.single', ['slug'=>$video->slug])}}">
                            <img src="{{app('App\Models\Video')->gambarmedium($video->url)}}" alt="">
                            </a>
                            <!-- Catagory -->
                            {{-- <a href="{{app('App\Models\Video')->watch($video->url)}}" class="video-btn"><i class="fa fa-play"></i></a> --}}
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{route('video.single', ['slug'=>$video->slug])}}" class="headline">
                                <h6 data-toggle="tooltip" data-placement="bottom" title="{{$video->judul}}">{{limit_word($video->judul, 40)}}</h6>
                            </a>
                            {{-- <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p> --}}
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">{{$video->reporter_id != 0 ?  ($foto->reporter) ? $video->reporter->nama : 'NN' : 'Admin'}}</a> on <a href="#" class="post-date">{{hari_tanggal_waktu($video->created_at, true)}}</a></p>

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