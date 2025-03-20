@extends('layouts.header')
@section('content')
    <section class=" border-2 border-green-500 w-full h-lvh grid grid-flow-row grid-cols-3 gap-2  ">
        <div class="border-2 border-green-500 p-3">
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
        <div class="border-2 border-blue-500 ">
            <h1>Últimas postagens</h1>
            @yield('home')
        </div>
        <div class="border-2 border-yellow-500 p-3">
            extra bar
        </div>

        <!--MODAL POST-->
        <div id="modalPost" class="hidden w-full h-lvh bg-gray-300/50 fixed flex justify-center items-top" onclick="closePostCreate()">
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