<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    	return view('admin.foto', compact('fotos'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = new Foto();
        $foto['reporter_id'] = '0';
        if($request->hasFile('file')){
            $upload = app('App\Helper\Images')->upload($request->file('file'), 'galeri');
            $foto['foto'] = $upload['url'];
        }
        $foto->save();

    }
    public function publish()
    {
        $foto = Foto::find($_GET['id']);
        if ($foto->publish == 'Public') {
            $foto['publish'] = 'Hidden';
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
            $foto->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
