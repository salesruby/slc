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




//Route::post('/import', 'Import@import')->name('import');




Route::group(['middleware' => ['admin']], function(){
    Route::get('/dashboard', function () {
        return view('ui.index');
    });
    
    Route::get('/import', function () {
        return view('ui.import');
    });
    
    Route::get('/leads', 'Import@leads')->name('lead');
    
    Route::post('/import', 'Import@import')->name('import');
    Route::post('/logout', 'AuthController@logout')->name('logout');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});


Route::group(['middleware' => ['visitor']], function(){
    Route::get('/', function () {
        return view('ui.login');
    });
    //Route::post('/register', 'AuthController@register')->name('register');
    Route::post('/login', 'AuthController@login')->name('login');
});