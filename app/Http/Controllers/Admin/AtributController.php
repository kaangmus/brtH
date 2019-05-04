<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Atribut;

class AtributController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $atributs = Atribut::orderBy('id', 'DESC')->get();
    	return view('admin.atribut', compact('atributs'));
    }

    public function create()
    {
        return view('admin.atribut-tambah');
    }
    public function show($id)
    {
        $atribut = Atribut::find($id);
        return view('admin.atribut-show', compact('atribut'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'atribut' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $atribut = new Atribut();
        $atribut->fill($request->all());
        $atribut->save();

        if($atribut){
            return redirect(route('admin.atribut.show',['id'=> $atribut->id]))
            ->with(['alert'=> "'title':'Berhasil','text':'Data Berhasil Disimpan', 'icon':'success','buttons': false, 'timer': 1200"]);
        }else{
            return back()
            ->with(['alert'=> "'title':'Gagal Menyimpan','text':'Data gagal disimpan, periksa kembali data inputan', 'icon':'error'"])
            ->withInput($request->all());
        }
    }
    public function edit($id)
    {
        $atribut = Atribut::findOrFail($id);
        return view('admin.atribut-edit', compact('atribut'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'atribut' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $atribut =Atribut::findOrFail($request->id);
        $atribut->fill($request->all());
        $atribut->save();

        if($atribut){
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
        $atribut = Atribut::findOrFail($id);
        if (!empty($atribut)) {
            $atribut->delete();
            return response()->json(['kode'=>'00'], 200);
        }else{
            return response()->json(['kode'=>'01'], 200);
        }
    }
}
