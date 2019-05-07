@extends('front.front-template')

@section('meta-judul', $video->judul)
@section('meta-keywords', $video->kategori)
@section('meta-news_keywords', $video->kategori)
@section('meta-deskripsi', $video->judul)
@section('meta-image', $video->gambarmedium($video->url))

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

                            <br><br><br>
                            <div class="widget-content float-right" style="padding: 5px;">
                                    <span class="mr-2">Bagikan :</span>
                                    <a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" style="margin: 0px 5px; color: blue" target="_blank"><img src="{{asset('images/icon/fb.png')}}" alt="" width="25px"></a>
                                    <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" style="margin: 0px 5px; color: lightblue" target="_blank"><img src="{{asset('images/icon/twitter.png')}}" alt="" width="22px"></a>
                                    <a href="   https://wa.me/?text={{url()->current()}}" style="margin: 0px 5px; color: green" target="_blank" data-action="share/whatsapp/share"><img src="{{asset('images/icon/wa.png')}}" alt="" width="25px"></a>
                            </div>
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
                                        <a href="{{route('berita.single', ['slug'=>$literasiv->slug])}}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                            <img src="{{asset($literasiv->gambar)}}" class="mr-3" alt="{{$literasiv->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                            <div class="media-body">
                                                <b class="mt-0">{{limit_word($literasiv->judul,30)}}</b>
                                                <br>
                                                {{-- {{$literasi->berita}} --}}
                                                {{$literasiv->reporter_id != 0 ?  ($literasiv->reporter) ? $literasiv->reporter->nama : 'NN' : 'Admin'}} on {{hari_tanggal_waktu($literasiv->created_at)}}
                                                
                                            </div>
                                            </div>
                                        </a>
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