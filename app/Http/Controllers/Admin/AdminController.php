<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function profil()
    {
        $profil = Auth::user('admin');

        return view('admin.admin-profil', compact('profil'));
    }
    public function profilupdate(Request $request)
    {
        $user = Admin::findOrFail(Auth::user('admin')->id);
        $user['username'] = $request['username'];
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
        $user = Admin::findOrFail(Auth::user('admin')->id);
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
    public function has()
    {
        dd(Hash::make('000018'));
    }
}
