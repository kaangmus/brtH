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
    	return view('reporter.foto', compact('fotos'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = new Foto();
        if($request->hasFile('file')){
            $upload = app('App\Helper\Images')->upload($request->file('file'), 'galeri');
            $foto['foto'] = $upload['url'];
        }
        $foto['reporter_id'] = Auth::user()->id;
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
