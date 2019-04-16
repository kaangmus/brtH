<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $videos = Video::all();
    	return view('admin.video', compact('videos'));
    }

    public function create()
    {
        return view('admin.video-tambah');
    }
    public function show($id)
    {
        $video = Video::find($id);
        return view('admin.video-show', compact('video'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'url' => 'required|string',
        ]);

        $video = new Video();
        $video->fill($request->all());
        if (strpos($request->url, 'watch?v=') !== false) {
            $video['url'] = str_replace("watch?v=","embed/",$request->url);
        }
        $video['dilihat'] = '0';
        $video->save();

        if($video){
            return redirect(route('admin.video.show',['id'=> $video->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.video-edit', compact('video'));
    }
    public function publish()
    {
        $video = Video::find($_GET['id']);
        if ($video->publish == 'Public') {
            $video['publish'] = 'Private';
        }else{
            $video['publish'] = 'Public';
        }
        $video->save();
        return response(['kode'=> '00', 'publish' => $video->publish]);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'url' => 'required|string',
        ]);

        $video =Video::findOrFail($request->id);
        $video->fill($request->all());
        if (strpos($request->url, 'watch?v=') !== false) {
            $video['url'] = str_replace("watch?v=","embed/",$request->url);
        }
        $video->save();

        if($video){
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
        $video = Video::findOrFail($id);
        if (!empty($video)) {
            $video->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
