<?php

use Cars\Models\makeYear;
use Cars\Models\Model;
use Cars\Models\Feature;
use Cars\Models\Car;

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
