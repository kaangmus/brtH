<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Video;
use App\Models\Literasi;

class HomeController extends Controller
{
    public function index()
    {
        $videos = Video::where('publish', 'Public')->orderBy('created_at', 'DESC')->limit(8)->get();
        $beritas = Berita::where('publish', 'Public')->orderBy('created_at', 'DESC')->limit(10)->get();
        $beritavs = Berita::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();

        $literasis = Literasi::where('publish', 'Public')->orderBy('created_at', 'DESC')->limit(10)->get();
        $literasivs = Literasi::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.home', compact('beritavs', 'beritas', 'videos', 'literasis', 'literasivs'));
    }
    public function beritasingle($id)
    {
        $berita = Berita::where(['id'=>$id,'publish'=>'Public'])->first();
        $berita['dilihat'] = $berita->dilihat+1;
        $berita->save();
        $beritavs = Berita::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();
        $videos = Video::where('publish', 'Public')->orderBy('created_at', 'DESC')->limit(8)->get();
        return view('front.berita-single', compact('berita', 'beritavs', 'videos'));
    }

    public function literasisingle($id)
    {
        $literasi = Berita::where(['id'=>$id,'publish'=>'Public'])->first();
        $literasi['dilihat'] = $literasi->dilihat+1;
        $literasi->save();
        $literasivs = Berita::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();
        $videos = Video::where('publish', 'Public')->orderBy('created_at', 'DESC')->limit(8)->get();
        return view('front.literasi-single', compact('literasi', 'literasivs', 'videos'));
    }

    public function videosingle($id)
    {
        $video = Video::where(['id'=>$id,'publish'=>'Public'])->first();
        $video['dilihat'] = $video->dilihat+1;
        $video->save();
        $videovs = Video::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();
        $videos = Video::where('publish', 'Public')->orderBy('created_at', 'DESC')->limit(8)->get();
        return view('front.video-single', compact('video', 'videovs', 'videos'));
    }

    public function videolist()
    {
        $videos = Video::where('publish', 'Public')->orderBy('created_at', 'DESC')->paginate(10);
        $videovs = Video::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.video-list', compact('videovs', 'videos'));
    }

    public function beritalist()
    {
        $menu = 'berita';
        $title = 'Berita';
        $contents = Berita::where('publish', 'Public')->orderBy('created_at', 'DESC')->paginate(10);
        $populers = Berita::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.contents', compact('menu', 'title','contents', 'populers'));
    }

    public function literasilist()
    {
        $menu = 'literasi';
        $title = 'Literasi';
        $contents = Literasi::where('publish', 'Public')->orderBy('created_at', 'DESC')->paginate(10);
        $populers = Literasi::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.contents', compact('menu', 'title','contents', 'populers'));
    }
    
}
