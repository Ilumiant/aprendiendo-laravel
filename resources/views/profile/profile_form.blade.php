@extends('layouts.app')


@section('title')
   Crear perfil
@endsection


@section('content')
    <div class="container">
        <h1 class="mb-4">Formulario para {{$estado === 'edit' ? 'editar': 'crear'}} perfil</h1>
        <form id="productForm"
          action="{{ $estado === 'create' ? Request::root() . "/users/profile/store" : Request::root() . "/users/profile/" . $profile->user_id}}"
           method="POST" novalidate>
            @csrf
            @if ($estado === 'edit')
                @method("put")
            @endif

            <div class="mb-3">
                <label for="firstname" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required
                    value="{{$estado === 'edit' ? $profile->firstname: ''}}"
                >
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required
                    value="{{$estado === 'edit' ? $profile->lastname : ''}}"
                >
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Edad</label>
                <input type="text" class="form-control" id="age" name="age" required
                    value="{{$estado === 'edit' ? $profile->age: ''}}"
                >
            </div>
            
            @foreach($genders as $gender) 
              <div class="form-check">
                <input class="form-check-input" 
                  type="radio" 
                  name="gender" 
                  id="gender-{{ $gender->name }}" 
                  value="1" 
                  @if ($estado === 'edit')   
                    @if ($profile->gender->name === $gender->name) 
                      checked 
                    @endif 
                  @endif
                >
                <label class="form-check-label" for="gender">
                  {{ $gender->name }}
                </label>
              </div>
            @endforeach
            @if ($estado === 'create')
            <button type="submit" class="btn btn-primary">Crear perfil</button>
          @else
            <button type="submit" class="btn btn-success">Editar</button>
          @endif
        </form>
    </div>
@endsection
