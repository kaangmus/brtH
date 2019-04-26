@extends('front.front-template')
@section('css')

@endsection
@section('content')

    <div class="d-block d-sm-none">
        <br><br><br><br>
    </div>
    
    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area bg-img background-overlay">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="single-blog-title text-center">
                            <div class="embed-responsive embed-responsive-21by9"><iframe class="embed-responsive-item" src="{{app('App\Models\Video')->embed($video->url)}}" allowfullscreen></iframe></div>
                        <!-- Catagory -->
                    </div>
                    
                </div>
            </div>
    </div>
    <!-- ********** Hero Area End ********** -->
    
    <div class="main-content-wrapper">
            <div class="container">
        
                <div class="world-latest-articles">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="title">
                            <h5>{{$video->judul}}</h5>
                            </div>

                            {!!$video->deskripsi!!}

                            <div class="title">
                                <h5>Video Terbaru</h5>
                            </div>
        
                            <div class="row">
                                @foreach ($videos as $i => $video)
                                <div class="col-12 col-md-4">
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
                                            <div class="post-content" style="padding: 10px 15px">
                                                <a href="{{url('video/'.$video->id)}}" class="headline">
                                                    <h6>{{limit_word($video->judul, 30)}}</h6>
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
        
                        <div class="col-12 col-md-8 col-lg-4">
                            <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                                <!-- Widget Area -->
                                
        
                                <div class="sidebar-widget-area">
                                    <h5 class="title">Video Terpopuler</h5>
                                    <div class="widget-content">
                                        @foreach ($videovs as $videov)
                                        <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <a href="{{url('video/'.$videov->id)}}">
                                                    <img src="{{asset($videov->gambarmedium($videov->url))}}" alt="">
                                                </a>
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{url('video/'.$videov->id)}}" class="headline">
                                                    <h5 class="mb-0">{{$videov->judul}}</h5>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
        
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection


@section('script')
@endsection