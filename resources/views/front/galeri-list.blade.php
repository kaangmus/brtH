@extends('front.front-template')
@section('css')

<link rel="stylesheet" href="{{asset('display/css/lightgallery.css')}}">
<script src="{{asset('display/js/lightgallery.min.js')}}"></script>
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

                    <div class="row">
                        <div class="card-columns">
                            
                            <div id="aniimated-thumbnials">
                                @forelse ($fotos as $foto)
                                    <a href="{{asset($foto->foto)}}" >
                                        <img src="{{asset($foto->foto)}}" />
                                    </a>
                                @empty
                                Belum ada content Foto
                                @endforelse
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
                    {{$fotos->links()}}
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
