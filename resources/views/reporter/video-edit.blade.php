@extends('reporter.reporter-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env('APP_NAME')}}</h1>
            <p>Update Video</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" method="post" action="{{route('reporter.video.update')}}">
                {{ csrf_field() }} @method('PUT')
                <input type="hidden" name="id"  value="{{$video->id}}">
                    <div class="row">
                        <input type="hidden" name="penulis_id" value="0">

                        <div class="col-sm-12">
                           <div class="form-group row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul Video</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Video" value="{{(empty(old('judul')))? $video->judul: old('judul')}}">
                                    @if ($errors->has('judul'))
                                        <small class="form-text text-muted">{{ $errors->first('judul') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Video">{{(empty(old('deskripsi')))? $video->deskripsi: old('deskripsi')}}</textarea>
                                    @if ($errors->has('deskripsi'))
                                        <small class="form-text text-muted">{{ $errors->first('deskripsi') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-sm-2 col-form-label">URL Youtube</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" name="url" id="url" placeholder="URL Video">{{(empty(old('url')))? app('App\Models\Video')->watch($video->url): old('url')}}</textarea>
                                    @if ($errors->has('url'))
                                        <small class="form-text text-muted">{{ $errors->first('url') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" onchange="fotoURl(this)" name="thumbnail" id="thumbnail" >
                                    @if ($errors->has('thumbnail'))
                                        <small class="form-text text-muted">{{ $errors->first('thumbnail') }}</small>
                                    @endif
                                    <small>Ukuran default 1200 x 600</small>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            @if (!empty($video->thumbnail))
                                <img src="{{asset($video->thumbnail)}}" style="max-height: 130px" class="rounded" alt="thumbnail" id="gambar">
                            @else
                                <img src="{{asset('images/thumbnail.svg')}}" style="max-height: 130px" class="rounded" alt="thumbnail" id="gambar">
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="redirect" value="{{url()->previous()}}">
				</form>

			  </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
<script>
$(document).ready(function() {
$("#deskripsi").summernote({
    placeholder: 'Deskirpsi',
        height: 100,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
});
<script>

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
