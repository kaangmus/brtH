@extends('reporter.reporter-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Manajemen Album Galeri</p>
        </div>
    </div>

    

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                <form class="form-horizontal" id="submit-form" method="post" action="{{route('reporter.album.store')}}">
                {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="album" class="col-sm-2 col-md-2 col-form-label">Album Baru</label>
                                <div class="col-sm-10 col-md-7">
                                    <input type="text" class="form-control" name="album" id="album" placeholder="Nama Album Baru" value="{{old('album')}}">
                                    @if ($errors->has('album'))
                                        <small class="form-text text-muted">{{ $errors->first('album') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <button class="btn btn-primary btn-block" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
                                </div>
                            </div>

                </form>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Album</h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Album</th>
                                <th class="text-center">Jumlah Foto</th>
                                <th>Reporter</th>
                                <th  class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $album)
                            <tr>
                                <td>{{$album->album}}</td>
                                <td class="text-center">{{$album->foto()->count()}}</td>
                                <td>{{$album->reporter_id != 0 ? ($album->reporter) ? $album->reporter->nama: 'NN' : 'Admin'}}</td>
                                <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="{{route('reporter.album.edit', ['id'=> $album->id])}}">
                                                <i class="fa fa-edit"></i>Edit</a>

                                        <button onClick="hapus('{{route('reporter.album.delete', ['id'=> $album->id])}}', 'Foto yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                                        <a href="{{route('reporter.album.show',['album_id'=>$album->id])}}" class="btn btn-sm btn-primary">Album</a>
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
