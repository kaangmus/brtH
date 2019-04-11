<?php

Route::get('/', 'penulis\HomeController@index')->name('penulis.home');
Route::get('/login', 'penulis\LoginController@form');
Route::post('/login', 'penulis\LoginController@login')->name('penulis.login');
Route::post('/logout', 'penulis\LoginController@logout')->name('penulis.logout');
