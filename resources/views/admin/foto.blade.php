@extends('admin.admin-template')
@section('css')

<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
<script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Foto</p>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-sm-12">
                <div class="tile">
                <form action="{{ route('admin.foto.store') }}" class="dropzone" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                </form>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                    <div class="card-columns">
                        @foreach ($fotos as $foto)
                            <div class="card">
                                <a href="{{asset($foto->foto)}}" target="_blank"><img src="{{asset($foto->foto)}}" class=" card-img-top"></a>
                                <div class="card-body">

                                    <button onClick="hapus('{{route('admin.foto.delete', ['id'=> $foto->id])}}', 'Foto yakin ingin dihapus')" class="btn btn-danger btn-sm float-right">Hapus</button>
                                    <div class="toggle-flip float-right">
                                        <label>
                                            <input type="checkbox"  onchange="status('{{$foto->id}}')" {{($foto->status == 'Verifikasi')? 'checked' : '' }}  ><span id="ketstatus" class="flip-indecator" data-toggle-on="Verifikasi" data-toggle-off="{{$foto->status == 'Verifikasi' ? 'Block': $foto->status}}" style="width: 100px"></span>
                                        </label>
                                        <label>
                                            <input type="checkbox"  onchange="publish('{{$foto->id}}')" {{($foto->publish == 'Public')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="Public" data-toggle-off="Hidden"></span>
                                        </label>
                                        </div>
                                </div>
                            </div>
                            @endforeach
                    </div>

            </div>
            <div class="text-center">{{$fotos->links()}}</div>
        </div>
    </div>
</main>


@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
<script src="{{asset('js/hapusfunc.js')}}"></script>
<script>
    function publish(no) {
        $.get('{{ route('admin.foto.publish')}}?id='+no, function(response){
            console.log(response);
        });
    }
    function status(no) {
        $.get('{{ route('admin.foto.verifikasi')}}?id='+no, function(response){
            // console.log(response.status);
        });
    }
</script>
@endsection
