<?php

Route::get('/', 'admin\HomeController@index')->name('admin.home');
Route::get('/login', 'admin\LoginController@form');
Route::post('/login', 'admin\LoginController@login')->name('admin.login');
Route::post('/logout', 'admin\LoginController@logout')->name('admin.logout');
