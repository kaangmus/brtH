@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Tambah Atribut</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('admin.atribut.store')}}">
                {{ csrf_field() }}

                    <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group row">
                                <label for="atribut" class="col-sm-2 col-form-label">Atribut</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="atribut" id="atribut" placeholder="Judul Atribut" value="{{old('atribut')}}">
                                    @if ($errors->has('atribut'))
                                        <small class="form-text text-muted">{{ $errors->first('atribut') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea id="deskripsi" name="deskripsi">{{old('deskripsi')}}</textarea>
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
<!-- include summernote css/js -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
<script>
$(document).ready(function() {
$("#deskripsi").summernote({
    placeholder: 'Deskirpsi Atribut',
        height: 500,
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
</script>
@endsection
