@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">

    <h4>{{$literasi->judul}}</h4>

            <div class="toggle-flip">
            <label>
                <input type="checkbox"  onchange="status('{{$literasi->id}}')" {{($literasi->status == 'Verifikasi')? 'checked' : '' }}  ><span id="ketstatus" class="flip-indecator" data-toggle-on="Verifikasi" data-toggle-off="{{$literasi->status == 'Verifikasi' ? 'Block': $literasi->status}}" style="width: 100px"></span>
            </label>
            <label>
                <input type="checkbox"  onchange="publish('{{$literasi->id}}')" {{($literasi->publish == 'Public')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="Public" data-toggle-off="Private"></span>
            </label>
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-sm-12">
			<div class="tile">
                    <div class="text-center" style="padding-bottom: 20px">
                        <h3>{{$literasi->judul}} 
                            @if ($literasi->reporter_id != 0  && $literasi->reporter)
                            <br><small style="font-size: 14px">Reporter : <a href="{{url('/admin/reporter/show/'.$literasi->reporter_id)}}">{{$literasi->reporter->nama}}</a></small>
                            @endif
                        </h3>
                        <br>
                        <figure class="figure">
                    <img src="{{asset($literasi->gambar)}}" class="figure-img img-fluid rounded" alt="{{$literasi->caption}}">
                                <figcaption class="figure-caption text-left">{{$literasi->caption}}</figcaption>
                              </figure>
                    </div>

                    {!!$literasi->literasi!!}
            <div class="tile-footer row">
                <div class="col-sm-9" style="padding-bottom: 10px">
                        Terakhir update {{hari_tanggal_waktu($literasi->updated_at, true)}} 
                </div>
               
                <div class="col-sm-3">
                <div class="btn-group " role="group" aria-label="Basic example">

                    <a class="btn btn-secondary mr-1 mb-1 btn-sm" href="{{route('admin.literasi.edit', ['id'=> $literasi->id])}}">
                    <i class="fa fa-edit"></i>Edit</a>
                    <button class="btn btn-danger mr-1 mb-1 btn-sm" data-pesan="Apakah kamu yakin ingin menghapus deskripsi literasi {{$literasi->judul}}" data-url="{{route('admin.literasi.delete', ['id'=> $literasi->id])}}" data-redirect="{{route('admin.literasi')}}" id="hapus">
                    <i class="fa fa-fire"></i>Hapus</button>
                </div>
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
    function publish(no) {
        $.get('{{ route('admin.literasi.publish')}}?id='+no, function(response){
            // console.log(response.publish);
            $(this).value = response.publish;
        });
    }
    function status(no) {
        $.get('{{ route('admin.literasi.verifikasi')}}?id='+no, function(response){
            // console.log(response.status);
        });
    }
</script>
@endsection
