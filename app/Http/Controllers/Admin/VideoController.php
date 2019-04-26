<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $videos = Video::orderBy('id', 'DESC')->get();
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
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $video = new Video();
        $video->fill($request->all());
        $video['url'] = app('App\Models\Video')->idyoutube($request->url);
        $video['dilihat'] = '0';
        if($request->hasFile('thumbnail')){
            $upload = app('App\Helper\Images')->upload($request->file('thumbnail'), 'video');
            $video['thumbnail'] = $upload['url'];
        }
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
    public function verifikasi()
    {
        $video = Video::find($_GET['id']);
        if ($video->status == 'Verifikasi') {
            $video['status'] = 'Block';
        }else{
            $video['status'] = 'Verifikasi';
        }
        $video->save();
        return response(['kode'=> '00', 'status' => $video->status]);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'url' => 'required|string',
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $video =Video::findOrFail($request->id);
        $video->fill($request->all());
        $video['url'] = app('App\Models\Video')->idyoutube($request->url);
        if($request->hasFile('thumbnail')){
            $upload = app('App\Helper\Images')->upload($request->file('thumbnail'), 'video');
            $video['thumbnail'] = $upload['url'];
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
