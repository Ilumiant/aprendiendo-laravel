@extends('app')

@section('title')
    Product Create
@endsection

@section('content')
  <h1>Product Create</h1>
  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if ($estado === 'create')
        <form id="productForm" action="/products/store" method="POST" novalidate>
    @else
        <form id="productForm" action="/products/{{$products->id}}" method="POST" novalidate>
            @method("put")
    @endif

      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required
            value="{{$estado !== 'create' ? $products->name : ''}}"
        >
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="text" class="form-control" id="price" name="price"
            value="{{$estado !== 'create' ? $products->price : ''}}"
        >
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description">{{$estado !== 'create' ? $products->description : ''}}</textarea>
      </div>
      @if ($estado === 'create')
      <button type="submit" class="btn btn-primary">Crear producto</button>
      <button type="button" class="btn btn-primary" id="createProductButton">Crear producto forma 2</button>
      @else
      <button type="submit" class="btn btn-primary">Editar</button>
      @endif
    </form>
  </div>
@endsection

@section('script')
  <script src="{{ Request::root() }}/js/product_form.js"></script>
@endsection
