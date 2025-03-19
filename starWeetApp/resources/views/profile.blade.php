@extends('layouts.main')
@section('title', $user->username)
@section('home')
<div class="flex flex-col">
    <label for="avatar_image">Imagem do Avatar</label>
    <img class="w-20 h-20" src="/img/avatar_images/{{$user->profile->avatar_image}}" alt="">
    <label for="cover_image">Imagem de capa</label>
    <img class="w-50 h-30" src="/img/cover_images/{{$user->profile->cover_image}}" alt="">
    <span>id: {{$user->id}}</span>
    <span>Nome de Usuário: {{$user->username}}</span>
    <span>Email: {{$user->email}}</span>
    <span>Bio: {{$user->profile->bio}}</span>
    <span>Localização: {{$user->profile->location}}</span>
    <span>WebSite: {{$user->profile->website}}</span>
</div>  
@endsection
