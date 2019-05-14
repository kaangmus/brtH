<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Models\Album;
use App\Models\Foto;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $albums = Album::orderBy('id', 'DESC')->paginate(20);
    	return view('admin.galeri', compact('albums'));
    }
    public function create()
    {
        return view('admin.album-tambah');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'album' => 'required|string|max:255',
        ]);

        $album = new Album();
        $album->fill($request->all());
        $album['reporter_id'] = '0';
        $album['slug'] = str_slug($request->album, '-');
        $album->save();

        if($album){
            return redirect(route('admin.album.show', ['id'=> $album->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function show($id)
    {
        $album = Album::find($id);
        return view('admin.album-show', compact('album'));        
    }

    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('admin.album-edit', compact('album'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'album' => 'required|string|max:255',
        ]);

        $album =Album::findOrFail($request->id);
        $album->fill($request->all());
        $album['slug'] = str_slug($request->album, '-');
        $album->save();

        if($album){
            return redirect($request->redirect)
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function publish()
    {
        $album = Album::find($_GET['id']);
        if ($album->publish == 'Public') {
            $album['publish'] = 'Private';
        }else{
            $album['publish'] = 'Public';
        }
        $album->save();
        return response(['kode'=> '00', 'publish' => $album->publish]);
    }
    public function verifikasi()
    {
        $album = Album::find($_GET['id']);
        if ($album->status == 'Verifikasi') {
            $album['status'] = 'Block';
        }else{
            $album['status'] = 'Verifikasi';
        }
        $album->save();
        return response(['kode'=> '00', 'status' => $album->status]);
    }
    public function delete($id)
    {
        $album = Album::findOrFail($id);
        if (!empty($album)) {
            File::delete($album->album);
            $album->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
