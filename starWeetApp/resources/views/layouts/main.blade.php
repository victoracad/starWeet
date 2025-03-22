@extends('layouts.header')
@section('content')
    <section class=" border w-screen h-screen flex">

        <div class="fixed left-0 border-r-1 border-gray-600 top-0 w-1/3 h-full bg-black text-white flex items-center justify-center">
            <nav class="flex flex-col">
                <a href="/home">HOME</a>
                <a href="/user/{{$userAuth->username}}">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Sair</button>
                </form>
                <button class="border-2 border-amber-500 cursor-pointer" onclick="openPostCreate()">Postar</button>
            </nav>
        </div>

        <div class="flex-col ml-[33%] mr-[33%]  text-center flex">
            @yield('home')
        </div>

        <div class="fixed right-0 top-0 w-1/3 h-full border-l-1 border-gray-600  bg-black text-white flex items-center justify-center">
            <div>
                <h1>Quem Seguir</h1>
                @foreach ($users as $user)
                <a href="/user/{{$user->username}}">
                    <div class="flex flex-row">
                        <div>
                            <img class="w-10 h-10" src="/img/avatar_images/{{$user->profile->avatar_image}}" alt="">
                        </div>
                        <div>
                            <span>{{$user->profile->name}}</span>
                            <span>{{'@'.$user->username}}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>


        <!--MODAL POST-->
        <div id="modalPost" class="hidden w-full h-lvh  bg-gray-300/50 fixed flex justify-center items-top" onclick="closePostCreate()">
            <div onclick="event.stopPropagation()" class="w-150 h-70 bg-white mt-20 p-3">
                <div>
                    <button onclick="closePostCreate()" class="cursor-pointer">Fechar</button>
                </div>
                <form  id="modalHome" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row">
                        <div>
                            <img class="w-10 h-10" src="/img/avatar_images/placeholder.png" alt="">
                        </div>
                        <div>
                            <textarea id="content" class="border-2 border-amber-400" name="content" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div>
                        <label for="post_image">Imagem do Post</label>
                        <input type="file" name="post_image" id="post_image">
                        <button class="cursor-pointer" >Adicionar emoji</button>
                        <button type="button" class="cursor-pointer" onclick="CreatePost(event)">Postar</button>                     
                    </div>
                </form>
                <div style="display: none" id="loading">
                    Carregando...
                </div>
            </div>
           
        </div>

    </section>
@endsection