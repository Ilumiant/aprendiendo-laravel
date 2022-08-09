@extends('app')

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
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
