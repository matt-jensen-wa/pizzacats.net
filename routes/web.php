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

Route::get('/', function () {
    return view('meow.index');
});

Route::get('meow', function(){
    return view('meow.meow');
})->name('meow');

Route::name('meow.')->prefix('meow')->group(function () {
    Route::get('meow', function(){
        return view('meow.meow');
    })->name('meow');
    Route::get('meow/meow', function(){
        return view('meow.meow');
    })->name('meow.meow');
    Route::get('meow/meow/meow', function(){
        return view('meow.meow');
    })->name('meow.meow.meow');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
