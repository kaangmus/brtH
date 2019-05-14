<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Models\Foto;

class FotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $fotos = Foto::orderBy('id', 'DESC')->paginate(20);
    	return view('admin.galeri', compact('fotos'));
    }
    public function create($album_id)
    {
        return view('admin.foto-tambah', compact('album_id'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required|string',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = new Foto();
        $foto->fill($request->all());
        $foto['reporter_id'] = '0';
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'literasi');
            $foto['foto'] = $upload['url'];
            $foto['slug'] = str_slug($upload['name'], '-');
        }
        $foto->save();

        if($foto){
            return redirect(route('admin.album.show', ['album_id'=>$foto->album_id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    //     ]);

    //     $foto = new Foto();
    //     $foto['reporter_id'] = '0';
    //     if($request->hasFile('file')){
    //         $upload = app('App\Helper\Images')->upload($request->file('file'), 'galeri');
    //         $foto['foto'] = $upload['url'];
    //     }
    //     $foto->save();

    // }

    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        return view('admin.foto-edit', compact('foto'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required|string',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto =Foto::findOrFail($request->id);
        $foto->fill($request->all());
        if($request->hasFile('foto')){
            $fotod =Foto::findOrFail($request->id);
            File::delete($fotod->foto);

            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'galeri');
            $foto['foto'] = $upload['url'];
            $foto['slug'] = str_slug($upload['name'], '-');
        }
        $foto->save();

        if($foto){
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
        $foto = Foto::find($_GET['id']);
        if ($foto->publish == 'Public') {
            $foto['publish'] = 'Private';
        }else{
            $foto['publish'] = 'Public';
        }
        $foto->save();
        return response(['kode'=> '00', 'publish' => $foto->publish]);
    }
    public function verifikasi()
    {
        $foto = Foto::find($_GET['id']);
        if ($foto->status == 'Verifikasi') {
            $foto['status'] = 'Block';
        }else{
            $foto['status'] = 'Verifikasi';
        }
        $foto->save();
        return response(['kode'=> '00', 'status' => $foto->status]);
    }
    public function delete($id)
    {
        $foto = Foto::findOrFail($id);
        if (!empty($foto)) {
            File::delete($foto->foto);
            $foto->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
