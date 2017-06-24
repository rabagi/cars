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
use Cars\Models\makeYear;
use Cars\Models\Model;
use Cars\Feature;
use Cars\Car;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('bootstrap', function (){

	return view('bootstrap');

});

Route::get('dropdowns', function (){

	return view('components/dropdowns');

});

Route::get('makeyears/{make_id}',  function ($make_id) {

	$years = makeYear::where('make_id', $make_id)
			->select('id as value', 'year as text')
			->orderBy('year', 'DESC')
			->get()
			->toArray();

	array_unshift($years, ['value' => '', 'text' => 'Select value']);

	return $years;
});

Route::get('models/{makeyear_id}', function ($makeyear_id) {

	$models =  Model::where('makeyear_id', $makeyear_id)
		->select('id as value', 'name as text')
		->orderBy('name', 'ASC')
		->get()
		->toArray();

	array_unshift($models, ['value' => '', 'text' => 'Select value']);

	return $models;

});


Route::get('features', function() {

	$features = Feature::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();

	return view('components/features', compact('features'));
});


Route::post('features', function() {
	$car = Car::first();

	$car->features()->sync(Request::get('features'));

	dd(Request::get('features'));

	return redirect()->to('features');

});