@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

    <h4>{{$literasi->judul}}</h4>

            <div class="toggle-flip">
            <label>
                <input type="checkbox"  onchange="publish('{{$literasi->id}}')" {{($literasi->publish == 'Public')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="Public" data-toggle-off="Private"></span>
            </label>
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                    <div class="text-center" style="padding-bottom: 20px">
                        <h3>{{$literasi->judul}}</h3>
                        <br>
                    <img src="{{asset($literasi->gambar)}}" style="max-width: 70%" alt="Gambar Timline literasi">
                    </div>

                    {!!$literasi->artikel!!}
            <div class="tile-footer">
                Terakhir update {{hari_tanggal_waktu($literasi->updated_at, true)}}

                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <a class="btn btn-outline-secondary mr-1 mb-1 btn-sm" href="{{route('admin.literasi.edit', ['id'=> $literasi->id])}}">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button class="btn btn-outline-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapus deskripsi literasi {{$literasi->judul}}" data-url="{{route('admin.literasi.delete', ['id'=> $literasi->id])}}" data-redirect="{{route('admin.literasi')}}" id="hapus">
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
<script>
    function publish(no) {
        $.get('{{ route('admin.literasi.publish')}}?id='+no, function(response){
            console.log(response);
        });
    }
</script>
@endsection
