<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $products = [
        [
          "name" => "Apple",
          "price" => 1.5,
          "description" => "It's a Apple"
        ],
        [
          "name" => "Pear",
          "price" => 2,
          "description" => "It's a Pear"
        ],
        [
          "name" => "Eggs",
          "price" => 4.2,
          "description" => "It's a Eggs"
        ],
        [
          "name" => "Chicken",
          "price" => 3.3,
          "description" => "It's a Chicken"
        ],
        [
          "name" => "Meat",
          "price" => 3.1,
          "description" => "It's a Meat"
        ],
      ];

      foreach ($products as $product) {
        Product::create($product);

        // $newProduct = new Product();
        // $newProduct->name = $product["name"];
        // $newProduct->price = $product["price"];
        // $newProduct->save();
      }
    }
}
