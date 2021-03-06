<?php

namespace Tests\Feature;
use Cars\Models\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FeatureTest extends TestCase
{   
    use DatabaseTransactions;

    public function test_filter_features()
    {
    	Feature::create(['name' => 'Feature 1']);
    	Feature::create(['name' => 'Feature 2']);

    	Feature::addNewFeatures([
    		'Feature 2', 
    		'Feature 3',
    		'   Feature 3   ', 
    		'Feature 4', 
    		'Feature 4'
    		]);
       
       $this->assertSame(
       		['Feature 1', 'Feature 2', 'Feature 3', 'Feature 4' ] ,
       		Feature::pluck('name')->toArray()
       	);
    }
}
