<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
  public function index()
  {
    $productsDB = [
      [
        "id" => 1,
        "name" => "Apple",
        "price" => 1.5
      ],
      [
        "id" => 2,
        "name" => "Pear",
        "price" => 2
      ],
      [
        "id" => 3,
        "name" => "Eggs",
        "price" => 4.2
      ],
      [
        "id" => 4,
        "name" => "Chicken",
        "price" => 3.3
      ],
      [
        "id" => 5,
        "name" => "Meat",
        "price" => 3.1
      ],
    ];

    $products = array_map(function ($product) {
      $productObject = new \stdClass();
      $productObject->id = $product["id"];
      $productObject->name = $product["name"];
      $productObject->price = $product["price"];
      return $productObject;
    }, $productsDB);

    Log::info($productsDB);
    Log::info($products);

    return view('product.products', compact("products"));
  }

  public function index2()
  {
    $products = Product::all();
    return view('product.products2', compact("products"));
  }

  public function encontrar()
  {
    $product1 = Product::find(2);
    echo $product1->name . "\n";

    $product2 = Product::where('id', 2)->first();
    echo $product2->name . "\n";

    $product3 = Product::where('price', 1.5)->first();
    echo $product3->name . "\n";

    $products4 = Product::where('price', '>', 1.5)->get();
    print_r($products4->toArray());
    echo gettype($products4) . "\n";
    echo gettype($products4) . "\n";
    echo gettype($products4->toArray()) . "\n";
  }
}
