@extends('front.front-template')
@section('css')

@endsection
@section('content')

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center" style="min-height: 400px">
               <div class="col-sm-10 single-blog-content mb-100">
                   <br><br>
                   <div class="post-content">
                   {!!$atribut->deskripsi!!}
                   </div>
               </div>
            </div>

        </div>
    </div>

@endsection


@section('script')
@endsection