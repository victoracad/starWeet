@extends('layouts.main')
@section('title', $user->username)
@section('home')
<div class="text-white flex ">
    <div class="flex items-center justify-center pl-5 pr-5">
        <i class="material-icons cursor-pointer" style="font-size: 20px">arrow_back</i>
    </div>
    <div class="flex flex-col items-start justify-center">
        <h1 class="text-2xl">{{$user->profile->name}}</h1>
        <span class="text-gray-400">{{$posts->count()}} Posts</span>
    </div>
</div>

<div class="flex flex-col text-white">

    <div class="relative h-80">
        <div class="relative h-60">
            <img class="w-full h-full object-cover" src="/img/cover_images/{{$user->profile->cover_image}}" alt="">
            
        </div>
        <div class="absolute bottom-0 left-6 border-4 border-black rounded-full overflow-hidden w-40 h-40">
            <img class="w-full h-full object-cover " src="/img/avatar_images/{{$user->profile->avatar_image}}" alt="">
        </div>
        <div class="absolute bottom-8 right-8">
            <a class="border rounded-2xl p-2 hover:bg-gray-600" href="/edit_profile">Editar perfil</a>
        </div>
    </div>

    <div class="flex flex-col items-start p-3">
        <span class="text-2xl font-bold">{{$user->profile->name}}</span>
        <span class="text-sm text-gray-400">{{'@'.$user->username}}</span>
        <span>{{$user->profile->bio}}</span>
        <div class=" flex flex-row gap-3">
            <span class="flex flex-row justify-center items-center gap-1 text-gray-400" ><i class="material-icons" style="font-size: 20px">location_on</i> {{$user->profile->location}}</span>
            <span class="flex flex-row justify-center items-center gap-1 text-gray-400"><i class="material-icons cursor-pointer" style="font-size: 20px">link</i>{{$user->profile->website}}</span>
            <span class="flex flex-row justify-center items-center gap-1 text-gray-400"><i class="material-icons" style="font-size: 20px">calendar_month</i>{{ \Illuminate\Support\Carbon::parse($user->created_at)->format('M Y') }}</span>
        </div>
        <div>
            <span>Seguindo {{$user->following->count()}}</span>
            <span>Seguidores {{$user->followers->count()}}</span>
        </div>
    </div>
    
</div> 

<h2 class="text-white text-3xl">Posts</h2>
@foreach ($posts as $post)

    <div id="post-{{$post->id}}" class="w-full h-auto text-green-50 border-t-1 border-gray-500 grid grid-flow-rol grid-cols-12">
        <div class="col-span-2 flex items-start justify-center"> 
            <a href="/user/{{$post->user->username}}">
                <div class="w-12 h-12 mt-2 cursor-pointer bg-gray-300 flex justify-center items-center rounded-full overflow-hidden">
                    <img class="w-full h-full object-cover" src="/img/avatar_images/{{$post->user->profile->avatar_image}}" alt="">
                </div>
            </a>
        </div>

        <div class="col-span-8 flex flex-col gap-3 mt-2 ">
            <div class="flex flex-row justify-start gap-2">
                <a href="/user/{{$post->user->username}}">
                    <span class="font-bold cursor-pointer hover:underline">{{$post->user->profile->name}}</span>
                </a>
                <a href="/user/{{$post->user->username}}">
                    <span class="text-gray-400 cursor-pointer">{{'@'. $post->user->username}}</span>
                </a>
            </div>
            <div class="break-words text-left">
                {{$post->content}}
            </div>
            

            @if($post->post_image != null)
            <div class="cursor-pointer border border-gray-500 flex justify-center items-center 
            w-full rounded-2xl overflow-hidden ">
                <img class="w-full h-full object-cover" src="/img/post_images/{{$post->post_image}}" alt="">
            </div>    
            @endif

            <div class="flex flex-row justify-between mb-2">
                <i class="material-icons cursor-pointer hover:text-blue-400">mode_comment</i>
                <div>
                    <button id="like-button " class="cursor-pointer" onclick="like({{ $post->id }})" data-post-id="{{ $post->id }}">
                        <i class="material-icons cursor-pointer hover:text-blue-400">favorite</i> 
                    </button>
                    <span class="cursor-pointer" onclick="openModal('usersLikes', {{$post->id}})" id="like-count_{{$post->id}}">{{ $post->likes->count() }}</span>
                </div>
                <div class="flex justify-center gap-1 text-gray-400">
                    <i class="material-icons">schedule</i> 
                    <span>{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d-m-y H:i') }}</span>
                </div>
                
            </div>

        </div>

        <div class="flex flex-col col-span-2 justify-center gap-2 ">
            <i class="material-icons cursor-pointer">share</i> 
            <button class="delete-post cursor-pointer" data-id="{{ $post->id }}">🗑</button>
        </div>
        
    </div>

@endforeach
<div onclick="closeModalPosts()" id="modalPosts" class="hidden bg-gray-300/50 fixed inset-0 flex justify-center items-center">
    <div onclick="event.stopPropagation()" id="modalBody" class="bg-white w-90 h-120 rounded-2xl p-2 overflow-scroll flex flex-col  gap-5 ">
        
    </div>
</div>




@endsection
