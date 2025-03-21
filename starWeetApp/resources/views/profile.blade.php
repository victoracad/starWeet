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
@foreach ($posts as $post)
    <div class="w-full h-40 border grid grid-flow-rol grid-cols-13">
        <div class="border col-span-2"> 
            <img class="rounded-full" src="/img/avatar_images/placeholder.png" alt="">
        </div>
        <div class="border col-span-9">
            <div>
                <span>{{$post->user->profile->name}}</span>
                <span>{{'@'. $post->user->username}}</span>
            </div>
            <p>{{$post->content}}</p>
            @if($post->post_image != null)
                <img class="w-40 h-20" src="/img/post_images/{{$post->post_image}}" alt="">
            @endif
            <div>
                <button class="border">comentar</button>
                <button class="border">Lika</button>
            </div>
        </div>
        <div class="border col-span-2">
            <button>Compartilhar</button>
        </div>
    </div>
@endforeach
@endsection
