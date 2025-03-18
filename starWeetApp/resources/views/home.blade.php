@extends('layouts.main')
@section('title', 'home')   
@section('home')
<h1>Bem vindo a sua home, {{$user->username}}</h1>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Sair</button>
</form>
@endsection
