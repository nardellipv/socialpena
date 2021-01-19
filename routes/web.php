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

    Route::post('/post/nuevo/', 'PostController@newPost')->name('post.newPost');
    Route::post('/post/comentar/{id}', 'PostController@commentPost')->name('post.commentPost');
    
    Route::get('/post/like/{id}', 'PostController@likePost')->name('post.likePost');
    Route::get('/post/dislike/{id}', 'PostController@disLikePost')->name('post.disLikePost');

    Route::get('/perfil/{profile_number}/', 'ProfileController@index')->name('profile.index');
    Route::get('/perfil/{profile_number}/editar', 'ProfileController@editProfile')->name('profile.edit');
    Route::get('/perfil/actualizar/provincia', 'ProfileController@updateProvince')->name('profile.updateProvince');
    Route::put('/perfil/actualizar/{id}', 'ProfileController@updateProfile')->name('profile.updateProfile');
    
    Route::get('/perfil/{profile_number}/editar/password', 'ProfileController@editpassword')->name('password.edit');
    Route::post('/perfil/update/password', 'ProfileController@updatepassword')->name('password.update');

    Route::post('/perfil/update/foto', 'ProfileController@updatephoto')->name('photo.update');

    Route::get('/perfil/{profile_number}/editar/redes-sociales', 'ProfileController@editsocial')->name('social.edit');
    Route::put('/perfil/{profile_number}/update/redes-sociales', 'ProfileController@updatesocial')->name('social.update');

    Route::get('/perfil/{profile_number}/editar/intereses', 'InterestController@editInterest')->name('interest.edit');
    Route::post('/perfil/update/intereses', 'InterestController@updateInterest')->name('interest.update');
    Route::get('/perfil/borrar/intereses/{id}', 'InterestController@deleteInterest')->name('interest.delete');

});
