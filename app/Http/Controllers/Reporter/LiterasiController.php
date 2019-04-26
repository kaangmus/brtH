<?php

namespace App\Http\Controllers\reporter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Literasi;
use File;

class LiterasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:reporter');
    }
    public function index()
    {
        $literasis = Literasi::where('reporter_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
    	return view('reporter.literasi', compact('literasis'));
    }

    public function create()
    {
        return view('reporter.literasi-tambah');
    }
    public function show($id)
    {
        $literasi = Literasi::find($id);
        return view('reporter.literasi-show', compact('literasi'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'artikel' => 'required|string',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $literasi = new Literasi();
        $literasi->fill($request->all());
        $literasi['dilihat'] = '0';
        $literasi['reporter_id'] = Auth::user()->id;
        if($request->hasFile('gambar')){
            $upload = app('App\Helper\Images')->upload($request->file('gambar'), 'literasi');
            $literasi['gambar'] = $upload['url'];
        }
        $literasi->save();

        if($literasi){
            return redirect(route('reporter.literasi.show',['id'=> $literasi->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $literasi = Literasi::findOrFail($id);
        return view('reporter.literasi-edit', compact('literasi'));
    }
    public function publish()
    {
        $literasi = Literasi::find($_GET['id']);
        if ($literasi->publish == 'Public') {
            $literasi['publish'] = 'Private';
        }else{
            $literasi['publish'] = 'Public';
        }
        $literasi->save();
        return response(['kode'=> '00', 'publish' => $literasi->publish]);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'artikel' => 'required|string',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $literasi =Literasi::findOrFail($request->id);
        $literasi->fill($request->all());
        if($request->hasFile('gambar')){
            $literasid =Literasi::findOrFail($request->id);
            File::delete($literasid->gambar);

            $upload = app('App\Helper\Images')->upload($request->file('gambar'), 'literasi');
            $literasi['gambar'] = $upload['url'];
        }
        $literasi->save();

        if($literasi){
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
        $literasi = Literasi::findOrFail($id);
        if (!empty($literasi)) {
            File::delete($literasi->gambar);
            $literasi->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
