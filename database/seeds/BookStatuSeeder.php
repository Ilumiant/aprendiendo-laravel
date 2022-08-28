<?php

use App\BookStatu;
use Illuminate\Database\Seeder;

class BookStatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $status = [
        ['name' => 'private'], 
        ['name' => 'public'],
    ];

    foreach ($status as $state) {
      BookStatu::create($state);
    }
  }
}
