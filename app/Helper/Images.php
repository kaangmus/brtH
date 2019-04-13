<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function upload($request, $path, $name = null)
    {
        $filenamewithextension = $request->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->getClientOriginalExtension();
        $directori = 'images/'.env('APP_ENV').'/'.$path.'/';
        $filenamefile = empty($name)? $filename.uniqid().'.'.$extension: $name.'_'.$filename.uniqid().'.'.$extension;
        $request->move($directori,$filenamefile);
        return [
            'url' => $directori.$filenamefile
        ];
    }
}
