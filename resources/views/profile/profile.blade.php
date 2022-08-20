@extends('layouts.app')

@section('title')
    Profile
@endsection


@section('content')
    <h1>hola como esta soy Profile</h1>
    @foreach ($profiles as $profile)
        <h5>{{ $profile->firstName }}</h5>
        <h5>{{ $profile->lastName }}</h5>
        <h5>{{ $profile->age }}</h5> 
        <h5>{{ $profile->gender->name }}</h5> 

    @endforeach
@endsection
