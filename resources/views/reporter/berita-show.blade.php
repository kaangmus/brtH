@extends('reporter.reporter-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

    <h4>{{$berita->judul}}</h4>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                    <div class="text-center" style="padding-bottom: 20px">
                            <h3>{{$berita->judul}}</h3>
                            <br>
                    <img src="{{asset($berita->gambar)}}" style="max-width: 70%" alt="Gambar Timline Berita">
                    </div>
                    {!!$berita->berita!!}
            <div class="tile-footer">
                Terakhir update {{hari_tanggal_waktu($berita->updated_at, true)}}

                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <a class="btn btn-outline-secondary mr-1 mb-1 btn-sm" href="{{route('reporter.berita.edit', ['id'=> $berita->id])}}">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button class="btn btn-outline-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapus deskripsi berita {{$berita->judul}}" data-url="{{route('admin.berita.delete', ['id'=> $berita->id])}}" data-redirect="{{route('admin.berita')}}" id="hapus">
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
