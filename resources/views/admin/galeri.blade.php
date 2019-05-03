@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Literasi</p>
        </div>
    </div>

    

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Foto

                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.foto.create')}}">
                            <i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Reporter</th>
                                <th  class="text-center">Keterangan</th>
                                <th  class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fotos as $foto)
                            <tr>
                                <td>
                                    <div class="media">
                                    <img src="{{asset($foto->foto)}}" class="leading mr-3" alt="..." style="width: 64px">
                                    <div class="media-body">
                                        <b>{{$foto->judul}}</b><br>
                                        <small style="font-size: 80%">{{hari_tanggal_waktu($foto->created_at, true)}} <br> {{$foto->deskripsi}}</small> <br>
                                       
                                    </div>
                                    </div>
                                </td>
                                <td>{{$foto->reporter_id != 0 ? ($foto->reporter) ? $foto->reporter->nama: 'NN' : 'Admin'}}</td>
                                <td class="text-center">
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox"  onchange="status('{{$foto->id}}')" {{($foto->status == 'Verifikasi')? 'checked' : '' }}  ><span id="ketstatus" class="flip-indecator" data-toggle-on="Verifikasi" data-toggle-off="{{$foto->status == 'Verifikasi' ? 'Block': $foto->status}}" style="width: 100px"></span>
                                            </label>
                                            <label>
                                                <input type="checkbox"  onchange="publish('{{$foto->id}}')" {{($foto->publish == 'Public')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="Public" data-toggle-off="Hidden"></span>
                                            </label>
                                            </div>    
                                
                                </td>
                                <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="{{route('admin.foto.edit', ['id'=> $foto->id])}}">
                                                <i class="fa fa-edit"></i>Edit</a>

                                        <button onClick="hapus('{{route('admin.foto.delete', ['id'=> $foto->id])}}', 'Foto yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
</main>


@endsection

@section('script')
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
function fotoURl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#gambar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
