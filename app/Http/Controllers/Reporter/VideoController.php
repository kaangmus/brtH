<?php

namespace App\Http\Controllers\Reporter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
use File;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:reporter');
    }
    public function index()
    {
        $videos = Video::where('reporter_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
    	return view('reporter.video', compact('videos'));
    }

    public function create()
    {
        return view('reporter.video-tambah');
    }
    public function show($id)
    {
        $video = Video::find($id);
        return view('reporter.video-show', compact('video'));
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
        $video['reporter_id'] = Auth::user()->id;
        $video['url'] = app('App\Models\Video')->idyoutube($request->url);
        $video['dilihat'] = '0';
        if($request->hasFile('thumbnail')){
            $upload = app('App\Helper\Images')->upload($request->file('thumbnail'), 'video');
            $video['thumbnail'] = $upload['url'];
        }
        $video->save();

        if($video){
            return redirect(route('reporter.video.show',['id'=> $video->id]))
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
        return view('reporter.video-edit', compact('video'));
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
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $video =Video::findOrFail($request->id);
        $video->fill($request->all());
        $video['url'] = app('App\Models\Video')->idyoutube($request->url);
        if($request->hasFile('thumbnail')){
            $videod =Video::findOrFail($request->id);
            File::delete($videod->thumbnail);
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
            File::delete($video->thumbnail);
            $video->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
