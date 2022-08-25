<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

  public function __construct() {
    // $this->middleware('can:users.index')->except('index'); esto es todo menos a este
    $this->middleware('can:products.edit')->only('edit', 'update');
    $this->middleware('can:products.edit')->only('create', 'store');
    $this->middleware('can:products.destroy')->only('destroy');
  }

  public function index()
  {
    $products = Product::all();

    // Log::info(["TIPO" => $products->first()->getQualifiedCreatedAtColumn()]);
    return view('product.products', compact("products"));
  }

  public function create()
  {
    $estado = 'create';
    return view('product.product_form',compact('estado'));
  }

  public function store(Request $request)
  {
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'image|max:512',
    ]);

    $product = new Product();
    $product->name = $request->input('name');
    $product->price = $request->price;
    $product->user_id = Auth::user()->id;
    $product->description = '';

    if ($request->input('description')) {
      $product->description = $request->description;
    }

    if($request->file('image')){
        $url = Storage::disk('public')->put('images/users/product', $request->file('image'));
        $product->image = $url;
    };

    $product->save();

    return redirect('products')->with(["success-message" => "El producto ha sido creado exitosamente."]);
  }

  public function show($id)
  {
    $products = Product::find($id);
    if(!$products ) {
        return redirect('products')->with(["error-message" => "por alguna razon este producto ya no existe"]);
    };
    return view('product.show', compact('products'));
  }

  public function edit($id)
  {
    $estado = 'edit';
    $products = Product::find($id);

    if(!$products) {
        return redirect('products')->with(["error-message" => "por alguna razon este producto ya no existe"]);
    };

    if($products->user_id !== Auth::user()->id ) {
        return redirect('products')->with(["error-message" => "No eres propietario de este producto"]);
    };

    return view('product.product_form', compact('products','estado'));

  }

  public function update(Request $request, $id)
  {
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'image|max:512',
    ]);

    $producto = Product::find($id);
    if( !$producto) return redirect('products')->with(["error-message" => "El producto no se puedo actualizar porque ya no existia."]);

    $producto->name = $request->name;
    $producto->price = $request->price;
    $producto->description = $request->description ? $request->description : '';

    if ($request->file('image')) {
        if ($producto->image != null) {
          if (file_exists(public_path() . '/' . $producto->image)) {
            unlink( public_path() . '/' . $producto->image );
          }
        }
        $url = Storage::disk('public')->put('images/users/product', $request->file('image'));
        $producto->image = $url;
      };

    $producto->update();

    return redirect('products')->with(["success-message" => "El producto ha sido actualizado exitosamente."]);
  }

  public function destroy($id)
  {
    $producto = Product::find($id);
    if($producto) {
        $producto->delete();
        return redirect('products')->with(["success-message" => "El producto ha sido eliminado."]);
    } else {
        return redirect('products')->with(["error-message" => "Por alguna razon este producto ya no existia antes de eliminarlo"]);
    }
  }


  private function indexOld()
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

    // Log::info($productsDB);
    // Log::info($products);

    return view('product.products', compact("products"));
  }

  private function storeAjax(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'price' => 'required|numeric',
    ]);

    // Log::alert($request->all());

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

  private function encontrar()
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
