<?php

namespace Cars\Http\ViewComposers;

use Illuminate\Constracts\View\View;
use Cars\Models\make;
use Cars\Models\makeYear;
use Cars\Models\Model;

class MakeModelForm {
	
	public function compose(View $view){

		$makeform = Request::only('make_id', 'makeyear_id', 'model_id');

		$makes = make::pluck('name', 'id')->orderBy('name', 'ASC')
				->toArray();

		$makeYears = $models = array();

		if($makeform['make_id'] != null ){

			$makeYears =  makeYear::where('make_id', $makeform['make_id'] )
			->pluck('year', 'id')
			->orderBy('year', 'ASC')
			->toArray();

			if($makeform['makeyear_id'] != null ){

				$models = Model::where('makeyear_id', $makeform['makeyear_id'] )
				->pluck('name', 'id')
				->orderBy('name', 'ASC')
				->toArray();

			}	

		}

	}

}