@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Berita</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Atribut WEB

                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.atribut.create')}}">
                            <i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Atribut</th>
                                <th>Terakhir Diupdate</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atributs as $atribut)
                            <tr>
                                <td>{{$atribut->atribut}}</td>
                                <td> {{hari_tanggal_waktu($atribut->updated_at, true)}}</td>
                                <td class="text-center">
                                <a href="{{route('admin.atribut.show',['id'=>$atribut->id])}}" class="btn btn-sm btn-default">Detail</a>
                                <a class="btn btn-light btn-sm" href="{{route('admin.atribut.edit', ['id'=> $atribut->id])}}">
                                        <i class="fa fa-edit"></i>Edit</a>

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
<script src="{{asset('js/hapus.js')}}"></script>
@endsection
