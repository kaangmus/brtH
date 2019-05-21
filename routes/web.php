<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/index2', 'HomeController@index2');
Route::get('/berita/{slug}', 'HomeController@beritasingle')->name('berita.single');
Route::get('/literasi/{slug}', 'HomeController@literasisingle')->name('literasi.single');
Route::get('/video/{slug}', 'HomeController@videosingle')->name('video.single');
Route::get('/folder/{slug}', 'HomeController@album')->name('album.single');
Route::get('/informasi/{atribut}', 'HomeController@atribut')->name('atribut.single');
Route::get('/cari', 'HomeController@cari')->name('cari');

Route::get('/berita-all', 'HomeController@beritalist')->name('berita.list');
Route::get('/literasi-all', 'HomeController@literasilist')->name('literasi.list');
Route::get('/video-all', 'HomeController@videolist')->name('literasi.list');
Route::get('/galeri-all', 'HomeController@fotolist')->name('galeri.list');

Route::post('/upload/gambar', 'ImagesController@upload')->name('upload.gambar');
Route::post('/galeri/store', 'ImagesController@store')->name('galeri.store');
Route::delete('/galeri/delete/{id}', 'ImagesController@delete')->name('galeri.delete');

Route::get('photoswipe', function(){
    $fotos = App\Models\Foto::all();
    return view('front.swipe', compact('fotos'));
});

Route::get('login', function (){
    print("Halaman Belum Tersedia");
})->name('login');


