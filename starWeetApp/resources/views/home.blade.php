@extends('layouts.main')
@section('title', 'home')   
@section('home')
@foreach ($posts as $post)

    <div class="w-full h-auto text-green-50 border-t-1 border-gray-500 grid grid-flow-rol grid-cols-10">
        <div class="col-span-2 flex items-start justify-center"> 

            <div class="w-13 h-13 bg-gray-300 flex justify-center items-center rounded-full overflow-hidden">
                <img class="w-full h-full object-cover" src="/img/avatar_images/{{$post->user->profile->avatar_image}}" alt="">
            </div>
            
        </div>

        <div class="col-span-6">
            <div>
                <span>{{$post->user->profile->name}}</span>
                <span>{{'@'. $post->user->username}}</span>
            </div>
            <p>{{$post->content}}</p>
            @if($post->post_image != null)
                <img class="w-40 h-20" src="/img/post_images/{{$post->post_image}}" alt="">
            @endif
            <div class="flex flex-row">
                <i class="material-icons cursor-pointer hover:text-blue-400">mode_comment</i>
                <button id="like-button " class="cursor-pointer" onclick="like({{ $post->id }})" data-post-id="{{ $post->id }}">
                    <i class="material-icons cursor-pointer hover:text-blue-400">favorite</i> 
                </button>
                <span class="cursor-pointer" onclick="openModal('usersLikes', {{$post->id}})" id="like-count_{{$post->id}}">{{ $post->likes->count() }}</span>
                <i class="material-icons">schedule</i> 
                <span>{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d-m-y H:i') }}</span>
            </div>
        </div>
        <div class="col-span-2">
            <button>Com</button>
        </div>
    </div>

@endforeach

<div onclick="closeModalPosts()" id="modalPosts" class="hidden bg-gray-300/50 fixed inset-0 flex justify-center items-center">
    <div onclick="event.stopPropagation()" id="modalBody" class="bg-white w-90 h-120 rounded-2xl p-2 overflow-scroll flex flex-col  gap-5 ">
        
    </div>
</div>
    
@endsection
