@extends('front.front-template')
@section('css')

@endsection
@section('content')

<div class="main-content-wrapper" style="padding: 100px 0px">
    <div class="container">

        <div class="world-latest-articles">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="title">
                        <h5>{{$title}} Terbaru</h5>
                    </div>

                    <!-- Single Blog Post -->

                    @foreach ($contents as $content)
                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{asset($content->gambar)}}" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{url($menu.'/'.$content->id)}}" class="headline">
                                <h5>{{$content->judul}}</h5>
                            </a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="#" class="post-author">{{$content->reporter_id != 0 ? $content->reporter->nama : 'Admin'}}</a> on <a href="#" class="post-date">{{hari_tanggal_waktu($content->created_at, true)}}</a></p>

                                
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="row justify-content-md-center" style="padding: 20px">
                        {{$contents->links('pagination.default')}}
                    </div>

                </div>

                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Widget Area -->

                        <div class="sidebar-widget-area">
                            <h5 class="title">{{$title}} Terpopuler</h5>
                            <div class="widget-content">
                                @foreach ($populers as $populer)
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="{{asset($populer->gambar)}}" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="{{url($menu.'/'.$populer->id)}}" class="headline">
                                            <h5 class="mb-0">{{$populer->judul}}</h5>
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

        
    </div>
</div>

@endsection

@section('script')
@endsection
