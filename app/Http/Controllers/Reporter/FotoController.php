<?php

namespace App\Http\Controllers\Reporter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use File;
use App\Models\Foto;

class FotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:reporter');
    }
    public function index()
    {
        $fotos = Foto::where('reporter_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(20);
    	return view('reporter.galeri', compact('fotos'));
    }
   
    public function create()
    {
        return view('reporter.foto-tambah');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = new Foto();
        $foto->fill($request->all());
        $foto['reporter_id'] = Auth::user('reporter')->id;
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'literasi');
            $foto['foto'] = $upload['url'];
        }
        $foto['slug'] = str_slug($request->judul, '-');
        $foto->save();

        if($foto){
            return redirect(route('reporter.foto'))
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
        return view('reporter.foto-edit', compact('foto'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto =Foto::findOrFail($request->id);
        $foto->fill($request->all());
        if($request->hasFile('foto')){
            $fotod =Foto::findOrFail($request->id);
            File::delete($fotod->foto);

            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'galeri');
            $foto['foto'] = $upload['url'];
        }
        $foto['slug'] = str_slug($request->judul, '-');
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
