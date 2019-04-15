<?php

Route::get('/', 'admin\HomeController@index')->name('admin.home');
Route::get('/login', 'admin\LoginController@form');
Route::post('/login', 'admin\LoginController@login')->name('admin.login');
Route::post('/logout', 'admin\LoginController@logout')->name('admin.logout');

// Route::get('/gunung', 'Admin\GunungController@index')->name('admin.gunung');
// Route::get('/gunung/publish', 'Admin\GunungController@publish')->name('admin.gunung.publish');
// Route::get('/gunung/tambah', 'Admin\GunungController@create')->name('admin.gunung.create');
// Route::get('/gunung/show/{id}', 'Admin\GunungController@show')->name('admin.gunung.show');
// Route::post('/gunung/tambah', 'Admin\GunungController@store')->name('admin.gunung.store');
// Route::get('/gunung/edit/{id}', 'Admin\GunungController@edit')->name('admin.gunung.edit');
// Route::put('/gunung/update', 'Admin\GunungController@update')->name('admin.gunung.update');
// Route::delete('/gunung/delete/{id}', 'Admin\GunungController@delete')->name('admin.gunung.delete');

Route::get('/berita', 'Admin\BeritaController@index')->name('admin.berita');
Route::get('/berita/publish', 'Admin\BeritaController@publish')->name('admin.berita.publish');
Route::get('/berita/tambah', 'Admin\BeritaController@create')->name('admin.berita.create');
Route::get('/berita/show/{id}', 'Admin\BeritaController@show')->name('admin.berita.show');
Route::post('/berita/tambah', 'Admin\BeritaController@store')->name('admin.berita.store');
Route::get('/berita/edit/{id}', 'Admin\BeritaController@edit')->name('admin.berita.edit');
Route::put('/berita/update', 'Admin\BeritaController@update')->name('admin.berita.update');
Route::delete('/berita/delete/{id}', 'Admin\BeritaController@delete')->name('admin.berita.delete');

Route::get('/reporter', 'Admin\ReporterController@index')->name('admin.reporter');
Route::get('/reporter/status', 'Admin\ReporterController@status')->name('admin.reporter.status');
Route::get('/reporter/tambah', 'Admin\ReporterController@create')->name('admin.reporter.create');
Route::get('/reporter/show/{id}', 'Admin\ReporterController@show')->name('admin.reporter.show');
Route::post('/reporter/tambah', 'Admin\ReporterController@store')->name('admin.reporter.store');
Route::get('/reporter/edit/{id}', 'Admin\ReporterController@edit')->name('admin.reporter.edit');
Route::put('/reporter/update', 'Admin\ReporterController@update')->name('admin.reporter.update');
Route::delete('/reporter/delete/{id}', 'Admin\ReporterController@delete')->name('admin.reporter.delete');

Route::get('/video', 'Admin\VideoController@index')->name('admin.video');
Route::get('/video/publish', 'Admin\VideoController@publish')->name('admin.video.publish');
Route::get('/video/tambah', 'Admin\VideoController@create')->name('admin.video.create');
Route::get('/video/show/{id}', 'Admin\VideoController@show')->name('admin.video.show');
Route::post('/video/tambah', 'Admin\VideoController@store')->name('admin.video.store');
Route::get('/video/edit/{id}', 'Admin\VideoController@edit')->name('admin.video.edit');
Route::put('/video/update', 'Admin\VideoController@update')->name('admin.video.update');
Route::delete('/video/delete/{id}', 'Admin\VideoController@delete')->name('admin.video.delete');

Route::get('/foto', 'Admin\FotoController@index')->name('admin.foto');
Route::get('/foto/publish', 'Admin\FotoController@publish')->name('admin.foto.publish');
Route::post('/foto/tambah', 'Admin\FotoController@store')->name('admin.foto.store');
Route::put('/foto/update', 'Admin\FotoController@update')->name('admin.foto.update');
Route::delete('/foto/delete/{id}', 'Admin\FotoController@delete')->name('admin.foto.delete');
