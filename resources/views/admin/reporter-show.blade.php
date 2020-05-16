@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

    <h4>{{$reporter->nama}}</h4>

            <div class="toggle-flip">
            <label>
                <input type="checkbox"  onchange="publish('{{$reporter->id}}')" {{($reporter->status == 'Aktif')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="Aktif" data-toggle-off="Blok"></span>
            </label>
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                    <div class="text-center">
                        <h3>{{$reporter->nama}}</h3>
                    <img src="{{asset($reporter->foto)}}" style="max-width: 70%" alt="Gambar Timline Berita">
                    </div>
            <div class="tile-footer">
                Terakhir diupdate {{!empty($reporter->updated_at)?hari_tanggal_waktu($reporter->updated_at, true): ''}}

                <div class="btn-group float-right" role="group" aria-label="Basic example">

                    <a class="btn btn-outline-secondary mr-1 mb-1 btn-sm" href="{{route('admin.reporter.edit', ['id'=> $reporter->id])}}">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button class="btn btn-outline-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapu Reporter {{$reporter->nama}}" data-url="{{route('admin.reporter.delete', ['id'=> $reporter->id])}}" data-redirect="{{route('admin.reporter')}}" id="hapus">
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
    function status(no) {
        $.get('{{ route('admin.reporter.status')}}?id='+no, function(response){
            console.log(response);
        });
    }
</script>
@endsection
