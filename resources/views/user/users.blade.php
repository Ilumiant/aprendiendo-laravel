@extends('layouts.app')

@section('title')
  Users
@endsection

@section('content') 
<div class="container">
  <h1>Users</h1>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>perfil</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if ($user->profile)
              <a class="btn btn-success mr-3" href="/users/profile/{{ $user->id }}" role="button">Perfil</a>  
            @else
                <p>No tiene perfil aun</p>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
