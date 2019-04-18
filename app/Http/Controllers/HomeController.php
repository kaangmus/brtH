<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $videos = Video::where('publish', 'Public')->orderBy('created_at', 'DESC')->limit(8)->get();
        $beritas = Berita::where('publish', 'Public')->orderBy('created_at', 'DESC')->limit(10)->get();
        $beritavs = Berita::where('publish', 'Public')->orderBy('dilihat', 'DESC')->limit(10)->get();
        return view('front.home', compact('beritavs', 'beritas', 'videos'));
    }
    public function beritasingle($id)
    {
        $berita = Berita::where(['id'=>$id,'publish'=>'Public'])->first();
        return view('front.berita-single', compact('berita'));
    }
}
