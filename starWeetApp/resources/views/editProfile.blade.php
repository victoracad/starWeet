@extends('layouts.main')
@section('title', $user->profile->name)
@section('home')
<form class="flex flex-col gap-1" action="/update_profile" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="avatar_image">Imagem do Avatar</label>
    <input type="file" id="avatar_image" name="avatar_image" placeholder="Imagem de avatar">
    <img class="w-20 h-20" src="/img/avatar_images/{{$user->profile->avatar_image}}" alt="">
    <label for="cover_image">Imagem de capa</label>
    <input type="file" id="cover_image" name="cover_image" placeholder="Imagem de capa">
    <img class="w-50 h-30" src="/img/cover_images/{{$user->profile->cover_image}}" alt="">
    <label for="name">Nome</label>
    <input class="border-2 border-amber-600" type="text" id="name" name="name" placeholder="Nome" value="{{$user->profile->name}}">
    <label for="name">Bio</label>
    <input class="border-2 border-amber-600" type="text" id="bio" name="bio" placeholder="Bio" value="{{$user->profile->bio}}">
    <label for="name">Localização</label>
    <input class="border-2 border-amber-600" type="text" id="location" name="location" placeholder="Localização" value="{{$user->profile->location}}">
    <label for="name">WebSite</label>
    <input class="border-2 border-amber-600" type="text" id="name" name="website" placeholder="WebSite" value="{{$user->profile->website}}">
    <input class="p-2 bg-green-300 cursor-pointer" type="submit" value="Atualizar">
</form>
<h1>este é o meu Profile</h1> 
@endsection
