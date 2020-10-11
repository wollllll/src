<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'admins', 'middleware' => 'auth', 'as' => 'admins.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::view('/', 'admins.dashboard.index')->name('dashboard.index');
});

