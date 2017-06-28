<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
Use Cars\Models\User;

class UserTableSeeder extends Seeder
{
    protected $total = 50;

    public function getModel()
    {
        return new  User();
    }

    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            'name' => $faker->name,
            'email' => $faker->name,
            'password' => bcrypt('secret'),

        ];
    }

}