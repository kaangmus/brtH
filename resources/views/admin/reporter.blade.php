@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Reporter</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Reporter

                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.reporter.create')}}">
                            <i class="fa fa-plus"></i>Tambah</a>
                    </div>
                </h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama Reporter</th>
                                <th>Username</th>
                                <th class="text-center">Berita</th>
                                <th class="text-center">Video</th>
                                <th class="text-center">Literasi</th>
                                <th class="text-center">Foto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reporters as $reporter)
                            <tr>
                                <td><b>{{$reporter->nama}}</b></td>
                                <td><b>{{$reporter->username}}</b></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <button type="button" class="btn btn-primary btn-sm">{{$reporter->berita()->where('status', 'Verifikasi')->count()}}</button>
                                        <button type="button" class="btn btn-danger btn-sm">{{$reporter->berita()->where('status', 'Block')->count()}}</button>
                                        <button type="button" class="btn btn-info btn-sm">{{$reporter->berita()->where('status', 'Pengajuan')->count()}}</button>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <button type="button" class="btn btn-primary btn-sm">{{$reporter->video()->where('status', 'Verifikasi')->count()}}</button>
                                        <button type="button" class="btn btn-danger btn-sm">{{$reporter->video()->where('status', 'Block')->count()}}</button>
                                        <button type="button" class="btn btn-info btn-sm">{{$reporter->video()->where('status', 'Pengajuan')->count()}}</button>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <button type="button" class="btn btn-primary btn-sm">{{$reporter->literasi()->where('status', 'Verifikasi')->count()}}</button>
                                        <button type="button" class="btn btn-danger btn-sm">{{$reporter->literasi()->where('status', 'Block')->count()}}</button>
                                        <button type="button" class="btn btn-info btn-sm">{{$reporter->literasi()->where('status', 'Pengajuan')->count()}}</button>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <button type="button" class="btn btn-primary btn-sm">{{$reporter->foto()->where('status', 'Verifikasi')->count()}}</button>
                                        <button type="button" class="btn btn-danger btn-sm">{{$reporter->foto()->where('status', 'Block')->count()}}</button>
                                        <button type="button" class="btn btn-info btn-sm">{{$reporter->foto()->where('status', 'Pengajuan')->count()}}</button>
                                    </div>
                                </td>
                                <td class="text-center">
                                <a href="{{route('admin.reporter.show',['id'=>$reporter->id])}}" class="btn btn-sm btn-default">Detail</a>
                                <a class="btn btn-light btn-sm" href="{{route('admin.reporter.edit', ['id'=> $reporter->id])}}">
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
