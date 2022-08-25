@extends('layouts.app')

@section('title')
    create books
@endsection

@section('content')
  <h1>crear libros</h1>
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
    <form id="productForm"
      action="{{ $estado === 'create' ? "/books/store" : "/books/" . $book->id }}"
      method="POST" novalidate
      enctype="multipart/form-data"
    >
      @if ($estado !== 'create')
        @method("put")
      @endif
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required
            value="{{$estado !== 'create' ? $book->name : ''}}"
        >
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">age</label>
        <input type="text" class="form-control" id="age" name="age"
            value="{{$estado !== 'create' ? $book->age : ''}}"
        >
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description">{{$estado !== 'create' ? $book->description : ''}}</textarea>
      </div>
      <div class="mb-3">
        <label for="user-image" class="form-label">Portada de imagen</label> <br/>
        <input type="file" id="user-image" name="image">
    </div>
      @if ($estado === 'create')
        <button type="submit" class="btn btn-primary">Crear Libro</button>
      @else
        <button type="submit" class="btn btn-primary">Editar Libro</button>
      @endif
    </form>
  </div>
@endsection
