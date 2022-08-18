@extends('app')

@section('title')
  Products
@endsection

@section('content')
<div class="container">
  <h1>Products 2</h1>
  @if(session('product-created'))
    <div class="alert alert-success" role="alert">
      {{ session('product-created') }}
    </div>
  @endif
  <div>
    <a class="btn btn-primary" href="/products/create" role="button">Crear producto</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}</td>
          <td>
            @if ($product->price > 2.5)
              Expensive
            @else
              Cheap
            @endif
          </td>
          <td>
            <a class="btn btn-success" href="/products/{{ $product->id }}" role="button">show</a>
            {{-- <a class="btn btn-danger" href="/products/{{ $product->id }}" role="button">Eliminar</a> --}}
            <form  action="/products/{{$product->id}}" method="POST" novalidate>
                @csrf @method("delete")
                <button type="submit" class="btn btn-danger" title="Eliminar este registro">
                    eliminar
                </button>
            </form>
        </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
