@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <h4>{{$atribut->atribut}}</h4>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                    {!!$atribut->deskripsi!!}
            <div class="tile-footer">
                Terakhir update {{hari_tanggal_waktu($atribut->updated_at, true)}}

                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <a class="btn btn-outline-secondary mr-1 mb-1 btn-sm" href="{{route('admin.atribut.edit', ['id'=> $atribut->id])}}">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button class="btn btn-outline-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapus deskripsi atribut {{$atribut->judul}}" data-url="{{route('admin.atribut.delete', ['id'=> $atribut->id])}}" data-redirect="{{route('admin.atribut')}}" id="hapus">
                    <i class="fa fa-fire"></i>Hapus</button>
                </div>
            </div>
            </div>
        </div>

    </div>
</main>

@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
@endsection
