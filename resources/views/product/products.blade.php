@extends('layouts.app')

@section('title')
  Product List
@endsection

@section('content')
<div class="container">
  <h1>Product List</h1>
  @if(session('product-created'))
    <div class="alert alert-success" role="alert">
      {{ session('product-created') }}
    </div>
  @endif
  <div class="mb-3">
    <a class="btn btn-primary" href="/products/create" role="button">Crear producto</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Tipo</th>
        <th>Creado por</th>
        <th>Creado en</th>
        <th>Actualizado en</th>
        <th>Acciones</th>
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
              Caro
            @else
              Barato
            @endif
          </td>
          <td>{{ $product->user->name }}</td>
          <td>{{ $product->createdAt() }}</td>
          <td>{{ $product->updatedAt() }}</td>
          <td class="d-flex">
            <a class="btn btn-success mr-3" href="/products/{{ $product->id }}" role="button">Mostrar</a>
            <form  action="/products/{{$product->id}}" method="POST" novalidate>
                @csrf @method("delete")
                <button type="submit" class="btn btn-danger" title="Eliminar este registro">
                    Eliminar
                </button>
            </form>
        </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection