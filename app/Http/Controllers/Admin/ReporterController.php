<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reporter;
use Illuminate\Support\Facades\Hash;

class ReporterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $reporters = Reporter::orderBy('id', 'DESC')->get();
    	return view('admin.reporter', compact('reporters'));
    }

    public function create()
    {
        return view('admin.reporter-tambah');
    }
    public function show($id)
    {
        $reporter = Reporter::find($id);
        return view('admin.reporter-show', compact('reporter'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:255|alpha_num',
            'password' => 'required|string',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $reporter = new Reporter();
        $reporter->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'reporter');
            $reporter['foto'] = $upload['url'];
        }
        $reporter['password'] = Hash::make($request['password']);
        $reporter->save();

        if($reporter){
            return redirect(route('admin.reporter.show',['id'=> $reporter->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $reporter = Reporter::findOrFail($id);
        return view('admin.reporter-edit', compact('reporter'));
    }
    public function status()
    {
        $reporter = Reporter::find($_GET['id']);
        if ($reporter->status == 'Aktif') {
            $reporter['status'] = 'Blok';
        }else{
            $reporter['status'] = 'Aktif';
        }
        $reporter->save();
        return response(['kode'=> '00', 'status' => $reporter->status]);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'username' => 'required|string',
            'password' => 'required|string',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $reporter = Reporter::findOrFail($request->id);
        $reporter->fill($request->all());
        if($request->hasFile('foto')){
            $upload = app('App\Helper\Images')->upload($request->file('foto'), 'reporter');
            $reporter['foto'] = $upload['url'];
        }
        if($request->has('password')){
            $reporter['password'] = Hash::make($request['password']);
        }
        $reporter->save();

        if($reporter){
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
        $reporter = Reporter::findOrFail($id);
        if (!empty($reporter)) {
            $reporter->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
