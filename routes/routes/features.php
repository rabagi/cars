<?php

use Cars\Models\makeYear;
use Cars\Models\Model;
use Cars\Models\Feature;
use Cars\Models\Car;

Route::get('features', function() {

	$car = Car::first();

	$features = Feature::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();



	return view('components/features', compact('features' , 'car'));
});


Route::post('features', function() {

	$features = Request::get('features');

	Feature::addNewFeatures($features);

	$car = Car::first();

	$car->saveFeatures($features);


	return redirect()->to('features');

});