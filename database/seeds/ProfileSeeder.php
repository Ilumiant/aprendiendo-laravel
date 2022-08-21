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
                'firstname' => 'Jose gregorio',
                'lastname' => 'Rosales Urdaneta',
                'age' => 29
            ], 
            [
                'user_id'=> 2,
                'gender_id' => 1,
                'firstname' => 'Antonio Miguel',
                'lastname' => 'Alvares',
                'age' => 28
            ], 
            [
                'user_id'=> 3,
                'gender_id' => 2,
                'firstname' => 'Leidys yojhanna',
                'lastname' => 'Matos Navarro',
                'age' => 27
            ], 
        ];

        foreach ($profiles as $profile) {
            Profile::create($profile);
          }
    }
}
