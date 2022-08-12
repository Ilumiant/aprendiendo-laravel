<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
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
    Log::info(["TIPO" => gettype($products)]);
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

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('product.product_form', compact("products"));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'price' => 'required|numeric',
    ]);

    Product::create($request->all());
    
    return redirect('products2')->with(["product-created" => "El producto ha sido creado exitosamente."]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
