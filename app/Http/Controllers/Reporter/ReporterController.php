<?php

namespace App\Http\Controllers\Reporter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use File;
use App\Models\Reporter;
use Illuminate\Support\Facades\Auth;

class ReporterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:reporter');
    }
    
    public function profil()
    {
        $profil = Auth::user('reporter');

        return view('reporter.reporter-profil', compact('profil'));
    }
    public function profilupdate(Request $request)
    {
        $user = Reporter::findOrFail(Auth::user('reporter')->id);
        $user->fill($request->all());

        if ($request->hasFile('foto')){
            $userd = Reporter::findOrFail(Auth::user('reporter')->id);
            File::delete($userd->foto);

            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'berita');
            $user['foto'] = $upload['url'];
        }

        $user->update();
        if($user){
            return back()
            ->with(['alert'=> "'title':'Berhasil','text':'Profil Berhasil Diurubah', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal dirubah, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function profilupdatepasword(Request $request)
    {
        $user = Reporter::findOrFail(Auth::user('reporter')->id);
        if (Hash::check($request->passwordlama, $user->password)){

            if ($request->passwordbaru == $request->cpasswordbaru){
                $passwordbaru = Hash::make($request->passwordbaru);
                 $user->update(['password' => $passwordbaru]);
                 return back()
                    ->with(['alert'=> "'title':'Berhasil','text':'Password Berhasil Diurubah', 'icon':'success','buttons': false, 'timer': 1200"]);
            }else{
                return back()
                    ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Password gagal dirubah, Password baru tidak sama dengan konfirmasi password, periksa kembali data inputan', 'icon':'error'"])
                    ->withInput($request->all());
            }
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Password alama tidak sesuai', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
}
