<?php

use Illuminate\Database\Seeder;
use Cars\Feature;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create(['name' => '4-Wheel disc brake'] );
        Feature::create(['name' => 'ABS brakes'] );
        Feature::create(['name' => 'Alloy wheels'] );
        Feature::create(['name' => 'Anti whiplash front head'] );
        Feature::create(['name' => '9 speakers'] );
        Feature::create(['name' => 'Air conditioning'] );

    }
}
