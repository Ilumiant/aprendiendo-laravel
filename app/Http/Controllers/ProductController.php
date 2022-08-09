<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = [
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

    return view('product.products', compact("products"));
  }

  public function index2()
  {
    $products = Product::all();
    return view('product.products2', compact("products"));
  }
}
