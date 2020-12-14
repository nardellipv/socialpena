<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function() {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    return 'FINISHED';
});


Auth::routes();

Route::view('/paso2-registro', 'web.parts.login.registerStep2')->name('register.step2');
Route::post('/paso3-registro', 'HomeController@step3')->name('register.step3');
Route::post('/paso3-update', 'HomeController@registerUpdate')->name('register.update');

Route::middleware(['auth','userActive'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/time-line/{profile_number}', 'PostController@index')->name('post.index');

    Route::get('/perfil/{profile_number}/', 'ProfileController@index')->name('profile.index');
    Route::get('/perfil/{profile_number}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::get('/perfil/actualizar/provincia', 'ProfileController@updateProvince')->name('profile.updateProvince');
    Route::put('/perfil/actualizar/{id}', 'ProfileController@updateProfile')->name('profile.updateProfile');
});
