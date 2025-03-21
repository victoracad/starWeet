@extends('layouts.main')
@section('title', 'home')   
@section('home')
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
                <button id="like-button " class="cursor-pointer" onclick="like({{ $post->id }})" data-post-id="{{ $post->id }}">
                    👍 <span id="like-count_{{$post->id}}">{{ $post->likes->count() }}</span>
                </button>
                <button onclick="openModal('usersLikes', {{$post->id}})" class="border cursor-pointer">Quem curtiu...</button>
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
