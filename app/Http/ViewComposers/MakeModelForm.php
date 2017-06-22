<?php

namespace Cars\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;


use Cars\Models\make;
use Cars\Models\makeYear;
use Cars\Models\Model;

class MakeModelForm {
	
	public function compose(View $view){

		$makeform = Request::only('make_id', 'makeyear_id', 'model_id');

		$makes = make::orderBy('name', 'ASC')
				->pluck('name', 'id')
				->toArray();

		$makeYears = $models = array();

		if($makeform['make_id'] != null ){

			$makeYears =  makeYear::where('make_id', $makeform['make_id'] )
			->orderBy('year', 'ASC')
			->pluck('year', 'id')			
			->toArray();


			if($makeform['makeyear_id'] != null ){

				$models = Model::where('makeyear_id', $makeform['makeyear_id'] )
				->orderBy('name', 'ASC')
				->pluck('name', 'id')				
				->toArray();
			}	

		}

	$view->with(compact('makeform', 'makes', 'makeYears', 'models'));

	}

}