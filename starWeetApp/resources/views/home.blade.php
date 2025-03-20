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
                <button class="border">Likar</button>
            </div>
        </div>
        <div class="border col-span-2">
            <button>Compartilhar</button>
        </div>
    </div>
@endforeach
    
@endsection
