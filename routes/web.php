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
Route::get('/berita/{id}', 'HomeController@beritasingle')->name('berita.single');

Route::post('/upload/gambar', 'ImagesController@upload')->name('upload.gambar');
Route::post('/galeri/store', 'ImagesController@store')->name('galeri.store');
Route::delete('/galeri/delete/{id}', 'ImagesController@delete')->name('galeri.delete');

Route::get('login', function (){
    print("Halaman Belum Tersedia");
})->name('login');
