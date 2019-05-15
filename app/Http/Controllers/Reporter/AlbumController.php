<?php

namespace App\Http\Controllers\Reporter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use File;
use App\Models\Album;
use App\Models\Foto;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:reporter');
    }
    public function index()
    {
        $albums = Album::orderBy('id', 'DESC')->where('reporter_id', Auth::user()->id)->paginate(20);
    	return view('reporter.galeri', compact('albums'));
    }
    public function create()
    {
        return view('reporter.album-tambah');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'album' => 'required|string|max:255',
        ]);

        $album = new Album();
        $album->fill($request->all());
        $album['reporter_id'] = Auth::user()->id;
        $album['slug'] = str_slug($request->album, '-');
        $album->save();

        if($album){
            return redirect(route('reporter.album.show', ['id'=> $album->id]))
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
        return view('reporter.album-show', compact('album'));        
    }

    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('reporter.album-edit', compact('album'));
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
