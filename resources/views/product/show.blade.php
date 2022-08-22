@extends('layouts.app')

@section('title')
  show
@endsection

@section('content')
<h1>datos de los productos</h1>
<div class="container my-4">
    <div class="card mx-auto" style="width: 350px;">
        @if ($products->image)
          <img src="{{ Request::root() }}/{{ $products->image }}" class="card-img-top" alt="Es la imagen de perfil del usuario">
        @endif
        <div class="card-body">
            <p class="card-text">{{ 'Nombres:' . ' ' . $products->name}}</p>
            <p class="card-text">{{ 'Apellidos:' . ' ' . $products->price }}</p>
            <p class="card-text">{{ 'Descripcion:' . ' ' . $products->description }}</p>

            @if(Auth::user()->id  === $products->user_id)
                <a href="{{Request::root() }}/products/{{ $products->id}}/edit" class="btn btn-primary">Editar</a>
            @endif
            {{-- <a href="{{Request::root() }}/products/{{ $products->id}}/edit" class="btn btn-primary">Editar</a> --}}
        </div>
      </div>
</div>
@endsection
