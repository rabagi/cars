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
Use Cars\Models\User;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('users/{id}', function ($id){

	return User::findOrFail($id);

});


Route::get('bootstrap', function (){

	return view('bootstrap');

});

include __DIR__ . '/routes/dropdowns.php';
include __DIR__ . '/routes/features.php';
include __DIR__ . '/routes/autocomplete.php';