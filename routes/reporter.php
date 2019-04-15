<?php

Route::get('/', 'Reporter\HomeController@index')->name('reporter.home');
Route::get('/login', 'Reporter\LoginController@form');
Route::post('/login', 'Reporter\LoginController@login')->name('reporter.login');
Route::post('/logout', 'Reporter\LoginController@logout')->name('reporter.logout');

Route::get('/berita', 'Reporter\BeritaController@index')->name('reporter.berita');
Route::get('/berita/publish', 'Reporter\BeritaController@publish')->name('reporter.berita.publish');
Route::get('/berita/tambah', 'Reporter\BeritaController@create')->name('reporter.berita.create');
Route::get('/berita/show/{id}', 'Reporter\BeritaController@show')->name('reporter.berita.show');
Route::post('/berita/tambah', 'Reporter\BeritaController@store')->name('reporter.berita.store');
Route::get('/berita/edit/{id}', 'Reporter\BeritaController@edit')->name('reporter.berita.edit');
Route::put('/berita/update', 'Reporter\BeritaController@update')->name('reporter.berita.update');
Route::delete('/berita/delete/{id}', 'Reporter\BeritaController@delete')->name('reporter.berita.delete');

Route::get('/video', 'Reporter\VideoController@index')->name('reporter.video');
Route::get('/video/publish', 'Reporter\VideoController@publish')->name('reporter.video.publish');
Route::get('/video/tambah', 'Reporter\VideoController@create')->name('reporter.video.create');
Route::get('/video/show/{id}', 'Reporter\VideoController@show')->name('reporter.video.show');
Route::post('/video/tambah', 'Reporter\VideoController@store')->name('reporter.video.store');
Route::get('/video/edit/{id}', 'Reporter\VideoController@edit')->name('reporter.video.edit');
Route::put('/video/update', 'Reporter\VideoController@update')->name('reporter.video.update');
Route::delete('/video/delete/{id}', 'Reporter\VideoController@delete')->name('reporter.video.delete');

Route::get('/foto', 'Reporter\FotoController@index')->name('reporter.foto');
Route::get('/foto/publish', 'Reporter\FotoController@publish')->name('reporter.foto.publish');
Route::post('/foto/tambah', 'Reporter\FotoController@store')->name('reporter.foto.store');
Route::put('/foto/update', 'Reporter\FotoController@update')->name('reporter.foto.update');
Route::delete('/foto/delete/{id}', 'Reporter\FotoController@delete')->name('reporter.foto.delete');
