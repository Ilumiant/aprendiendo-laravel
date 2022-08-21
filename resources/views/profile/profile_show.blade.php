@extends('layouts.app')

@section('title')
    Mostrar perfir
@endsection

@section('content')
    <h1>aqui se mostrara los datos del usuario</h1>
    <div class="container">
        <div class="card mx-auto" style="width: 350px;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">{{ 'Nombres:' . ' ' . $profile->firstname}}</p>
                <p class="card-text">{{ 'Apellidos:' . ' ' . $profile->lastname }}</p>
                <p class="card-text">{{ 'Edad:' . ' ' . $profile->age }}</p>
                <p class="card-text">{{ 'Genero:' . ' ' .  $profile->gender->name }}</p>
                @if(Auth::user()->id  === $profile->user_id) 
                    <a href="/users/profile/{{ $profile->user_id }}/edit" class="btn btn-primary">Editar</a>                    
                @endif
                {{-- <a href="/users/profile/{{ $profile->user_id }}/edit" class="btn btn-primary">Editar</a>                     --}}

            </div>
          </div>

    </div>
@endsection
