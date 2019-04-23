@extends('front.front-template')
@section('css')

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
                                @forelse ($fotos as $foto)
                                    <div class="card">
                                        <a href="{{asset($foto->foto)}}" target="_blank"><img src="{{asset($foto->foto)}}" class=" card-img-top"></a>
                                    </div>
                                @empty
                                Belum ada content Foto
                                @endforelse
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
@endsection
