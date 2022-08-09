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
          "price" => 1.5
        ],
        [
          "name" => "Pear",
          "price" => 2
        ],
        [
          "name" => "Eggs",
          "price" => 4.2
        ],
        [
          "name" => "Chicken",
          "price" => 3.3
        ],
        [
          "name" => "Meat",
          "price" => 3.1
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
