@extends('layouts.app')

@section('title')
    books
@endsection

@section('content')
<div class="container">
    <h1>Libros</h1>
    @include('components.message')

    <div class="mb-3">
      <a class="btn btn-primary" href="/books/create" role="button">Crear Libro</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Año</th>
          <th>Autores</th>
          <th>Creado por</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
          <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->age }}</td>
            <td>@foreach ($book->users as $user )
                {{$user->name}}. </br>
            @endforeach</td>
            <td></td>
            <td>
                <a class="btn btn-success mr-3" href="/books/{{ $book->id }}" role="button">Mostrar</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
