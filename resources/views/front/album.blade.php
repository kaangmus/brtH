@extends('front.front-template')


@section('meta-judul', $album->album)
@section('meta-keywords', $album->album)
@section('meta-news_keywords', $album->album)
@section('meta-deskripsi', $album->album)
@section('meta-image', env('APP_URL').$album->foto()->first()->foto)

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
                            <p><a href="#" class="post-date">{{hari_tanggal_waktu($album->created_at, true)}}</a> <a href="#" class="post-author">{{$album->reporter_id != 0 ?  ($album->reporter) ? $album->reporter->nama: 'NN' : 'Admin'}}</a> - Papua 60 Detik</p>
                        </div>

                        <!-- Post Content -->
                        <div>
                            <h4>{{$album->album}}</h4>
                            <p>{{$album->deskripsi}}</p>
                           
                            <br><br>
                            <div class="widget-content float-right" style="padding: 5px;">
                                    <span class="mr-2">Bagikan :</span>
                                    <a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" style="margin: 0px 5px; color: blue" target="_blank"><img src="{{asset('images/icon/fb.png')}}" alt="" width="25px"></a>
                                    <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" style="margin: 0px 5px; color: lightblue" target="_blank"><img src="{{asset('images/icon/twitter.png')}}" alt="" width="22px"></a>
                                    <a href="   https://wa.me/?text={{url()->current()}}" style="margin: 0px 5px; color: green" target="_blank" data-action="share/whatsapp/share"><img src="{{asset('images/icon/wa.png')}}" alt="" width="25px"></a>
                            </div>
                            <br>

                            @foreach ($album->foto()->get() as $foto)
                            <div class="card border-light float-left" style="width: 100%">
                                <figure class="figure">
{{-- 
                                        <a href="{{asset($foto->foto)}}" class="mybox" title="{{$foto->judul}}">
                                                <img src="{{asset($foto->foto)}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 200px; height: 200px">
                                            </a> --}}


                                    <img src="{{asset($foto->foto)}}" class="figure-img img-fluid rounded" style="width: 100%">
                                    <figcaption class="figure-caption text-left"><i class="fa fa-camera" aria-hidden="true" style="padding: 2px 12px"></i> {{$foto->reporter_id != 0 ? ($foto->reporter) ? $foto->reporter->nama: 'NN' : 'Admin'}} - {{hari_tanggal_waktu($foto->updated_at, true)}}</figcaption>
                                </figure>
                                <div class="card-body">
                                <p class="card-text">{{$foto->deskripsi}}</p>
                            </div>
                            </div>
                            @endforeach
                    </div>
                </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                        <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Widget Area -->
                            
    
                            <div class="sidebar-widget-area">
                                <h5 class="title">Video Terpopuler</h5>
                                <div class="widget-content">
                                    @foreach ($videos as $video)
                                    <a href="{{route('video.single', ['slug'=>$video->slug])}}" class="list-group-item list-group-item-action">
                                        <div class="media">
                                        <img src="{{asset($video->gambarmedium($video->url))}}" class="mr-3" alt="{{$video->slug}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 90px; height: 60px">
                                        <div class="media-body">
                                            <b class="mt-0">{{limit_word($video->judul,30)}}</b>
                                            <br>
                                            {{-- {{$literasi->berita}} --}}
                                            {{$video->reporter_id != 0 ?  ($video->reporter) ? $video->reporter->nama : 'NN' : 'Admin'}} on {{hari_tanggal_waktu($video->created_at)}}
                                            
                                        </div>
                                        </div>
                                    </a>
                                    @endforeach
    
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