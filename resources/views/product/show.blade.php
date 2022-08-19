@extends('layouts.app')

@section('title')
  show
@endsection

@section('content')
<div class="container">
    <h1>Products 2</h1>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Price</th>
          <th>Type</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>{{ $products->id }}</td>
            <td>{{ $products->name }}</td>
            <td>{{ $products->price }}</td>
            <td>
              @if ($products->price > 2.5)
                Expensive
              @else
                Cheap
              @endif
            </td>
            <td>
                <a class="btn btn-success" href="/products/{{ $products->id }}/edit" role="button">edict</a>
            </td>
          </tr>
      </tbody>
    </table>
  </div>
@endsection
