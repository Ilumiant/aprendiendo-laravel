@extends('layouts.app')


@section('title')
    Create Profile
@endsection


@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif
    <div class="container">
        <h1 class="mb-4"> {{$estado === 'edit' ? 'Formulario para Editar ': 'Formulario para crear'}}</h1>
        <form action="users/profile/store" method="POST" novalidate>
            @csrf
            @if ($estado === 'edit')
                @method("put")
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="name" name="name" required
                    value="{{$estado === 'edit' ? $profile['name'] : ''}}"
                >
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required
                    value="{{$estado === 'edit' ? $profile['lastname'] : ''}}"
                >
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Edad</label>
                <input type="text" class="form-control" id="age" name="age" required
                    value="{{$estado === 'edit' ? $profile['age'] : ''}}"
                >
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" @if (false) checked @endif>
                <label class="form-check-label" for="exampleRadios1">
                  Masculino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                <label class="form-check-label" for="exampleRadios1">
                  Femenino
                </label>
              </div>

            @if ($estado === 'create')
            <button type="submit" class="btn btn-primary">Crear producto</button>
          @else
            <button type="submit" class="btn btn-success">Editar</button>
          @endif
        </form>
    </div>
@endsection
