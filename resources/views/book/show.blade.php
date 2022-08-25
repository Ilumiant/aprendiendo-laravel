@extends('layouts.app')

@section('title')
  ver libro
@endsection

@section('content')
<h1>datos de libro</h1>
<div class="container my-4">
    <div class="card mx-auto" style="width: 350px;">
        @if ($libro->image)
          <img src="{{ Request::root() }}/{{ $libro->image }}" class="card-img-top" alt="Es la imagen de perfil del usuario">
        @endif
        <div class="card-body">
            <p class="card-text">{{ 'Nombres:' . ' ' . $libro->name}}</p>
            <p class="card-text">{{ 'Age:' . ' ' . $libro->age }}</p>
            <p class="card-text">{{ 'Descripcion:' . ' ' . $libro->description }}</p>
            <div class="d-flex">

            <a href="{{Request::root() }}/books/{{ $libro->id}}/edit" class="btn btn-primary mx-2">Editar</a>
            <form  action="/books/{{$libro->id}}" method="POST" novalidate>
                @csrf @method("delete")
                <button type="submit" class="btn btn-danger" title="Eliminar este registro">
                    Eliminar
                </button>
            </form>
            </div>
            </div>
      </div>
</div>
@endsection
