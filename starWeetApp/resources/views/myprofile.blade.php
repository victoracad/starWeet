@extends('layouts.main')
@section('title', $user->username)
@section('home')
<div class="flex flex-col">
    <span>id: {{$user->id}}</span>
    <span>Nome: {{$user->username}}</span>
    <span>Email: {{$user->email}}</span>
</div> 
<h1>este é o meu Profile</h1> 
<button>Editar perfil</button>
@endsection
