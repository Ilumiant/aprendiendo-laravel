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
    $estado = 'create';
    return view('product.product_form',compact('estado'));
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

    Log::alert($request->all());

    Product::create($request->all());

    return redirect('products2')->with(["product-created" => "El producto ha sido creado exitosamente."]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store2(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'price' => 'required|numeric',
    ]);

    Log::alert($request->all());

    $product = new Product();
    $product->name = strtolower($request->input('name'));
    $product->price = $request->price;

    if ($request->input('description')) {
      $product->description = $request->description;
    } else {
      $product->description = '';
    }

    $product->save();

    return response()->json(["message" => "El producto ha sido creado exitosamente."], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $products = Product::find($id);
    if(!$products ) {
        return redirect('products2')->with(["product-created" => "por alguna razon este producto ya no existe"]);
    };
    return view('product.show', compact('products'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $estado = 'edit';
    $products = Product::find($id);
    if(!$products ) {
        return redirect('products2')->with(["product-created" => "por alguna razon este producto ya no existe"]);
    };
    return view('product.product_form', compact('products','estado'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function updaProductte(Request $request, $id)
  {
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
    ]);

    $producto = Product::find($id);
    if( !$producto) return redirect('products2')->with(["product-created" => "El producto no se puedo actualizar porque ya no existia."]);

    $producto->name = $request->name;
    $producto->price = $request->price;
    $producto->description = $request->description;
    if($request->description === null) $producto->description = '';

    $producto->update();

    return redirect('products2')->with(["product-created" => "El producto ha sido actualizado exitosamente."]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $producto = Product::find($id);
    if($producto) {
        $producto->delete();
        return redirect('products2')->with(["product-created" => "El producto ha sido eliminado."]);
    } else {
        return redirect('products2')->with(["product-created" => "Por alguna razon este producto ya no existia antes de eliminarlo"]);
    }
  }
}
