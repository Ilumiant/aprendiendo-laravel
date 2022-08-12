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
    <form action="/products/store" method="POST" novalidate>
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="text" class="form-control" id="price" name="price">
      </div>
      <button type="submit" class="btn btn-primary">Crear producto</button>
    </form>
  </div>
@endsection
