<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [
                'user_id'=> 1,
                'gender_id' => 1,
                'firstName' => 'Jose gregorio',
                'lastName' => 'Rosales Urdaneta',
                'age' => 29
            ], 
            [
                'user_id'=> 2,
                'gender_id' => 1,
                'firstName' => 'Antonio Miguel',
                'lastName' => 'Alvares',
                'age' => 28
            ], 
            [
                'user_id'=> 3,
                'gender_id' => 2,
                'firstName' => 'Leidys Jhoanna',
                'lastName' => 'Matos Navarro',
                'age' => 26
            ], 
        ];

        foreach ($profiles as $profile) {
            Profile::create($profile);
          }
    }
}
