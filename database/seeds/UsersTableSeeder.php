<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        "name" => "Jose",
        "email" => "jose@mail.com",
        "password" => Hash::make("123123"),
      ]);

      User::create([
        "name" => "Antonio",
        "email" => "antonio@mail.com",
        "password" => Hash::make("123123"),
      ]);

      User::create([
        "name" => "Leidys",
        "email" => "leidys@mail.com",
        "password" => Hash::make("123123"),
      ]);
    }
}
