<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::view('/paso2-registro', 'web.parts.login.registerStep2')->name('register.step2');
Route::post('/paso3-registro', 'HomeController@step3')->name('register.step3');
Route::post('/paso3-update', 'HomeController@registerUpdate')->name('register.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

});
