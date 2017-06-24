<?php

namespace Cars;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function features(){

    	return $this->belongsToMany(Feature::class, 'car_feature');
    }
}
