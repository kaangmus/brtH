<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'reporter_id','judul','url','kategori','publish','dilihat','data', 'thumbnail', 'deskripsi', 'status'
    ];
    protected $casts = [
        'data' => 'array'
    ];

    public function reporter(){
        return $this->belongsTo(Reporter::class, 'reporter_id', 'id');
    }

    public function idyoutube($url)
    {
        if (strpos($url, 'embed')){
            $url = explode("/", $url)[4];
        }elseif (strpos($url, 'watch?v=')) {
            $url = explode("watch?v=", $url)[1];
        }else{
            $url = $url;
        }

        return $url;
    }
    public function watch($idyoutube)
    {
        $url = "https://www.youtube.com/watch?v=".$idyoutube;
        return $url;
    }

    public function embed($idyoutube)
    {
        $url = "https://www.youtube.com/embed/".$idyoutube;
        return $url;
    }

    public function gambarkecil($url)
    {
        $get = "https://i1.ytimg.com/vi/idyoutube/1.jpg ";
        $thumbnail = str_replace("idyoutube",$url,$get);
        return $thumbnail;
    }
    public function gambarbesar($url)
    {
        $get = "https://i1.ytimg.com/vi/idyoutube/maxresdefault.jpg ";
        $thumbnail = str_replace("idyoutube",$url,$get);
        return $thumbnail;
    }
    public function gambarmedium($url)
    {
        $get = "https://i1.ytimg.com/vi/idyoutube/mqdefault.jpg ";
        $thumbnail = str_replace("idyoutube",$url,$get);
        return $thumbnail;
    }

    public function viewyoutube($url)
    {
        $JSON = file_get_contents("https://gdata.youtube.com/feeds/api/videos/{$url}?v=2&alt=json");
        $JSON_Data = json_decode($JSON);
        $views = $JSON_Data->{'entry'}->{'yt$statistics'}->{'viewCount'};
        return $views;
    }

    // | Thumbnail Name      | Size (px) | URL                                              |
    // |---------------------|-----------|--------------------------------------------------|
    // | Player Background   | 480x360   | https://i1.ytimg.com/vi/<VIDEO ID>/0.jpg         |
    // | Start               | 120x90    | https://i1.ytimg.com/vi/<VIDEO ID>/1.jpg         |
    // | Middle              | 120x90    | https://i1.ytimg.com/vi/<VIDEO ID>/2.jpg         |
    // | End                 | 120x90    | https://i1.ytimg.com/vi/<VIDEO ID>/3.jpg         |
    // | High Quality        | 480x360   | https://i1.ytimg.com/vi/<VIDEO ID>/hqdefault.jpg |
    // | Medium Quality      | 320x180   | https://i1.ytimg.com/vi/<VIDEO ID>/mqdefault.jpg |
    // | Normal Quality      | 120x90    | https://i1.ytimg.com/vi/<VIDEO ID>/default.jpg   |

    // | Thumbnail Name      | Size (px) | URL                                                  |
    // |---------------------|-----------|------------------------------------------------------|
    // | Standard Definition | 640x480   | https://i1.ytimg.com/vi/<VIDEO ID>/sddefault.jpg     |
    // | Maximum Resolution  | 1920x1080 | https://i1.ytimg.com/vi/<VIDEO ID>/maxresdefault.jpg |
}
