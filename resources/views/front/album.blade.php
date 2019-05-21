@extends('front.front-template')


@section('meta-judul', $album->album)
@section('meta-keywords', $album->album)
@section('meta-news_keywords', $album->album)
@section('meta-deskripsi', $album->album)
@section('meta-image', 'data:image/jpeg;base64,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')

@section('css')
<link rel="stylesheet" href="{{asset('vendor/galeri/css/lc_lightbox.css')}}">
<link rel="stylesheet" href="{{asset('vendor/galeri/css/lc_lightbox.min.css')}}">
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
                           
                            <div class="widget-content float-right" style="padding: 5px;">
                                    <span class="mr-2">Bagikan :</span>
                                    <a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" style="margin: 0px 5px; color: blue" target="_blank"><img src="{{asset('images/icon/fb.png')}}" alt="" width="25px"></a>
                                    <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" style="margin: 0px 5px; color: lightblue" target="_blank"><img src="{{asset('images/icon/twitter.png')}}" alt="" width="22px"></a>
                                    <a href="https://wa.me/?text={{url()->current()}}" style="margin: 0px 5px; color: green" target="_blank" data-action="share/whatsapp/share"><img src="{{asset('images/icon/wa.png')}}" alt="" width="25px"></a>
                            </div>
                            <br>

                                <div id="aniimated-thumbnials">
                                    @forelse ($album->foto()->get() as $foto)
                                    <a href="{{asset($foto->foto)}}" class="mybox md-5" title="{{$foto->judul}}" data-lcl-txt="{{$foto->deskripsi}}" data-lcl-author="{{$foto->reporter_id != 0 ?  ($foto->reporter) ? $foto->reporter->nama : 'NN' : 'Admin'}}">
                                            <img src="{{asset($foto->foto)}}" width="100%">
                                        </a>
                                        <figcaption class="figure-caption text-left"><i class="fa fa-camera" aria-hidden="true" style="padding: 2px 12px"></i> {{$foto->reporter_id != 0 ? ($foto->reporter) ? $foto->reporter->nama: 'NN' : 'Admin'}} - {{hari_tanggal_waktu($foto->updated_at, true)}}</figcaption>

                                        <p style="padding: 20px 0px">{{$foto->deskripsi}}</p>
                                    @empty
                                    Belum ada content Foto
                                    @endforelse
                                </div> 
                                <hr>

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
                                            {{$video->reporter_id != 0 ?  ($video->reporter) ? $video->reporter->nama : 'NN' : 'Admin'}} - {{hari_tanggal_waktu($video->created_at)}}
                                            
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