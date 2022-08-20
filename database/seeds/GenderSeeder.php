<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['name'=> 'masculino'], 
            ['name' => 'femenino'],
            ['name' =>'otro']
        ];

        foreach ($genders as $gender) {
            Gender::create($gender);
          }
    }
}
