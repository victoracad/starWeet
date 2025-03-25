@extends('layouts.main')
@section('title', 'home')   
@section('home')
@foreach ($posts as $post)

    <div class="w-full h-auto text-green-50 border-t-1 border-gray-500 grid grid-flow-rol grid-cols-12">
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

        <div class="col-span-2 ">
            <i class="material-icons cursor-pointer">share</i> 
        </div>
    </div>

@endforeach
    
@endsection
