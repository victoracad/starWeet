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
        <button id="btn-unfollow" onclick="unfollowUser({{$user->id}})" class="@if (!$isFollowing)
            hidden
        @endif border cursor-pointer">Parar de seguir</button>
        <button id="btn-follow" onclick="followUser({{$user->id}})" class=" @if ($isFollowing)
            hidden
        @endif border cursor-pointer">Seguir</button>
</div>  

@foreach ($posts as $post)
    <div class="w-full h-40 border grid grid-flow-rol grid-cols-13">
        <div class="border col-span-2"> 
            <img class="rounded-full" src="/img/avatar_images/{{$post->user->profile->avatar_image}}" alt="">
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
            <div class="flex flex-row">
                <button class="border">comentar</button>
                <button id="like-button " class="cursor-pointer" onclick="like({{ $post->id }})" data-post-id="{{ $post->id }}">
                    👍 <span id="like-count_{{$post->id}}">{{ $post->likes->count() }}</span>
                </button>
                <button onclick="openModal('usersLikes', {{$post->id}})" class="border cursor-pointer">Quem curtiu...</button>
                <div>
                    Horário
                </div>
                <span>
                    {{$post->created_at}}
                </span>
            </div>
        </div>
        <div class="border col-span-2">
            <button>Compartilhar</button>
  
        </div>
    </div>
@endforeach
<div onclick="closeModalPosts()" id="modalPosts" class="hidden bg-gray-300/50 fixed inset-0 flex justify-center items-center">
    <div onclick="event.stopPropagation()" id="modalBody" class="bg-white w-90 h-120 rounded-2xl p-2 overflow-scroll flex flex-col  gap-5 ">
        
    </div>
</div>
@endsection
