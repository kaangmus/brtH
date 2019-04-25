@extends('front.front-template')
@section('css')

<link rel="stylesheet" href="{{asset('display/css/lightgallery.css')}}">
<script src="{{asset('display/js/lightgallery.min.js')}}"></script>

<style>
.cover {
  object-fit: cover;
  width: 100x;
  height: 100px;
}
</style>
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
                                <a href="{{asset($foto->foto)}}" style="text-decoration: none;padding: 0px; margin: 0px;">
                                    <img src="{{asset($foto->foto)}}" class="col-sm-2" style="padding: 0px; margin: 0px;object-fit: cover; width: 100%; height: 200px"/>
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
<script>
    lightGallery(document.getElementById('aniimated-thumbnials'), {
        thumbnail:true
    }); 
</script>
@endsection
