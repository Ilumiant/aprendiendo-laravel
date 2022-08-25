<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RoleSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(ProductSeeder::class);
      $this->call(GenderSeeder::class);
      $this->call(ProfileSeeder::class);

      $this->call(BookSeeder::class);
    //   $this->call(Book_UserSeeder::class);

    }
}
