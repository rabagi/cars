<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AutocompleteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {	

    	$gio = seed('User', [

    		'name' => 'Gio',
    		'email' => 'a@g.com'

    		]);

    	$jeff = seed('User', [

    		'name' => 'Jeffer',
    		'email' => 'jeffer@g.com'

    		]);


        $this->get('autocomplete/users?term=gio')
     
        ->seeJsonEquals([
        		[

        			'id' 	=> 1,
        			'name' 	=> 'gio',
        			'email'	=> 'g@c.com'
  
        		]
        	]);
    }
}
