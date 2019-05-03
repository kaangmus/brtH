@extends('reporter.reporter-template')
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
                        <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('reporter.foto.create')}}">
                            <i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Foto</th>
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
                                <td class="text-center">
                                       {{$foto->status. ' - '. $foto->publish}}    
                                </td>
                                <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="{{route('reporter.foto.edit', ['id'=> $foto->id])}}">
                                                <i class="fa fa-edit"></i>Edit</a>

                                        <button onClick="hapus('{{route('reporter.foto.delete', ['id'=> $foto->id])}}', 'Foto yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
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
@endsection
