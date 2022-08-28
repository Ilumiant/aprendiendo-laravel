@extends('layouts.app')

@section('title')
  ver libro
@endsection

@section('content')
<h1>datos de libro</h1>
<div class="container my-4">
    <div class="card mx-auto" style="width: 350px;">
        @if ($book->image)
          <img src="{{ Request::root() }}/{{ $book->image }}" class="card-img-top" alt="Es la imagen de perfil del usuario">
        @endif
        <div class="card-body">
            <p class="card-text">{{ 'Nombres:' . ' ' . $book->name}}</p>
            <p class="card-text">{{ 'Age:' . ' ' . $book->age }}</p>
            <p class="card-text">{{ 'Descripcion:' . ' ' . $book->description }}</p>
            <p class="card-text">Estado:
              @if ($book->status->name == "private")
                  @lang("book_status.private")
              @else
                  {{ trans("book_status.public") }}
                  {{-- __("book_status.public") --}}
              @endif
            </p>
            <div class="d-flex">

            <a href="{{Request::root() }}/books/{{ $book->id}}/edit" class="btn btn-primary mx-2">Editar</a>
            <form  action="/books/{{$book->id}}" method="POST" novalidate>
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
