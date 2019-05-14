@extends('reporter.reporter-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Tambah Berita</p>
        </div>
    </div>

    <div class="row">
            <div class="col-md-12">
                <div class="tile">
                  <div class="tile-body">
                    <form class="form-horizontal" id="submit-form" method="post" action="{{route('reporter.album.store')}}">
                    {{ csrf_field() }} 
    
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                               <div class="form-group row">
                                    <label for="album" class="col-sm-3 col-form-label">Nama Album Baru</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="album" id="album" placeholder="Album Baru" value="{{old('album')}}">
                                        @if ($errors->has('album'))
                                            <small class="form-text text-muted">{{ $errors->first('album') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi Album</label>
                                    <div class="col-sm-9">
                                        <textarea  class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskrispi Album" rows="8">{{old('deskripsi')}}</textarea>
                                        @if ($errors->has('deskripsi'))
                                            <small class="form-text text-muted">{{ $errors->first('deskripsi') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                            </div>
                        </div>
    
                    </form>
    
                  </div>
                  <div class="tile-footer">
                    <div class="row">
                      <div class="col-md-8 col-md-offset-3">
                        <button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>
                        <a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                        {{-- <small class="form-text text-muted" id="jadwalhelp">Foto galeri diinputkan setelah nama gunung dan deskripsi gunung sudah ditambah</small> --}}
                    </div>
                    </div>
                  </div>
                </div>
              </div>
    
    </div>
</main>

@endsection

@section('script')
@endsection
