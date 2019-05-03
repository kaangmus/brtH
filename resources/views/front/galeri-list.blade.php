@extends('front.front-template')
@section('css')

<link rel="stylesheet" href="{{asset('vendor/galeri/css/lc_lightbox.css')}}">
<link rel="stylesheet" href="{{asset('vendor/galeri/css/lc_lightbox.min.css')}}">

@endsection
@section('content')

<div class="main-content-wrapper" style="padding: 100px 0px">
    <div class="container">

        <div class="world-latest-articles">
            <div class="row">
                <div class="col-12 ">
                    <div class="title">
                        <h5>Geleri</h5>
                    </div>

                    <div class="row text-center ">
                        <div id="aniimated-thumbnials">
                            @forelse ($fotos as $foto)
                            <a href="{{$foto->foto}}" class="mybox md-5" title="{{$foto->judul}}" data-lcl-txt="{{$foto->deskripsi}}" data-lcl-author="{{$foto->reporter_id != 0 ?  ($foto->reporter) ? $foto->reporter->nama : 'NN' : 'Admin'}}">
                                    <img src="{{$foto->foto}}" style="padding: 0px; margin: 0px;object-fit: cover; width: 200px; height: 200px">
                                </a>
                            @empty
                            Belum ada content Foto
                            @endforelse
                        </div>
                    </div>

                    <div class="row justify-content-md-center" style="padding: 20px">
                        {{$fotos->links('pagination.default')}}
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
