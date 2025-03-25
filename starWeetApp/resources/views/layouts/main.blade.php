@extends('layouts.header')
@section('content')
    <section class=" border w-screen h-screen flex">

        <!--Left side-->
        <div class="fixed left-0 border-r-1 border-gray-600 top-0 w-1/3 h-full bg-black text-white flex  justify-end pr-10">

            <nav class="flex flex-col gap-2 h-[80%] w-[50%] justify-center">
                <div class="flex gap-2 items-center">
                    <div id="iconsDiv" class="flex flex-col  gap-2 ">
                        <i class="material-icons " style="font-size: 35px" >home</i>
                        <i class="material-icons " style="font-size: 35px">person</i> 
                        <i class="material-icons " style="font-size: 35px" >logout</i>
                    </div>
                    <div id="descDiv" class="justify-start">
                        <a href="/home" class="flex justify-start gap-2 text-4xl items-center">Home</a>
                        <a href="/user/{{$userAuth->username}}" class="flex justify-start items-center gap-2 text-4xl">Profile</a>
                        <form action="{{ route('logout') }}" class="flex items-center" method="POST">
                            @csrf
                            <button type="submit" class="cursor-pointer text-4xl">Sair</button>
                            
                        </form>
                        
                    </div>
                </div>
                <button class="flex justify-center border cursor-pointer rounded-[15px] w-[50%] pr-2 pl-2 text-4xl hover:bg-white hover:text-black" onclick="openPostCreate()">Postar</button>
                
                
                
                
            </nav>

        </div>

        <!--Midle side-->
        <div class="flex-col w-[33.4%] ml-[33.3%] mr-[33%]  text-center flex">
            @yield('home')
        </div>

        <!--right side-->
        <div class="fixed right-0 top-0 w-1/3 h-full border-l-1 border-gray-600  bg-black text-white flex flex-col gap-10 pl-10">

            <div class="w-100 h-12 rounded-2xl border-gray-500 border relative ">
                <i class="material-icons text-gray-500 absolute top-[25%] left-2">search</i>
                <input type="text" placeholder="Pesquisar" name="search" id="search" class="text-white w-full h-full rounded-2xl pl-8">
            </div>

            <div class="border border-gray-500 rounded-2xl h-87 w-100 flex flex-col gap-3">
                <h1 class="text-2xl p-2">Quem Seguir</h1>
                @foreach ($users as $user)
                    <div class="p-3">
                        <div class="flex justify-between">
                            <a href="/user/{{$user->username}}" >  
                                <div>
                                    <div class="flex flex-row gap-2">
                                        <div class="w-12 h-12 cursor-pointer bg-gray-300 flex justify-center items-center rounded-full overflow-hidden">
                                            <img class="w-full h-full object-cover" src="/img/avatar_images/{{$user->profile->avatar_image}}" alt="">
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <span>{{$user->profile->name}}</span>
                                            <span class="text-gray-500">{{'@'.$user->username}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                            <div class="flex justify-center items-center">
                                <span class="w-20 h-9 cursor-pointer rounded-2xl flex justify-center items-center hover:text-black hover:bg-white border">Seguir</span>
                            </div>
                        </div>
                    </div>
                   
                @endforeach
            </div>

        </div>




        <!--MODAL POST-->
        <div id="modalPost" class="w-full h-lvh hidden bg-gray-300/50 fixed flex justify-center items-start" onclick="closePostCreate()">

            <div id="ModalContent" onclick="event.stopPropagation()" class="flex flex-col gap-5 w-150  rounded-2xl text-white bg-black mt-20 p-3">
                <div>
                    <button onclick="closePostCreate()" class="cursor-pointer">  <i class="material-icons text-white" style="font-size: 25px" >close</i></button>
                </div>
                <form class="h-full flex flex-col"  id="modalHome" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row border-b border-gray-400 h-full pb-2">
                        <div class="flex justify-center items-center w-13 h-13 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover" src="/img/avatar_images/{{$userAuth->profile->avatar_image}}" alt="">
                        </div>
                        <div class="w-full ">
                            <textarea maxlength="256" id="content" oninput="updateCount(this)"  placeholder="O que está acontecendo?" class="focus:outline-none resize-none overflow-hidden text-2xl text-white w-full p-2" name="content" ></textarea>
                            <div class="relative hidden" id="DivimagePreview">
                                <img id="imagePreview"  src="" alt="Pré-visualização" class="hidden w-full object-cover rounded-2xl">
                                <div onclick="closeImagePreview()" class="rounded-full bg-black flex justify-center items-center p-1 cursor-pointer absolute top-2 right-2">
                                    <i class="material-icons text-white" style="font-size: 25px" >close</i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="flex items-center justify-between pl-2 pt-2 pr-2 gap-4">
                        <div class="flex justify-center gap-5">
                            <label for="post_image"><i class="material-icons cursor-pointer" style="font-size: 25px" >image</i></label>
                            <input type="file" class="hidden" name="post_image" id="post_image" onchange="previewImage()">
                            <button type="button" class="cursor-pointer" ><i class="material-icons cursor-pointer" style="font-size: 25px" >mood</i></button>
                            <span id="charCount" class="text-gray-600">0/256 caracteres</span>
                        </div>
                        
                        <button type="button" class="cursor-pointer border text-black bg-white p-1 w-17 rounded-2xl flex justify-center hover:bg-gray-100" onclick="CreatePost(event)">Postar</button>                     
                    </div>
                </form>

                <div style="display: none" id="loading">
                    Carregando...
                </div>
            </div>
           
        </div>
        <!--MODAL LIKES-->
        <div onclick="closeModalPosts()" id="modalPosts" class="hidden bg-gray-300/50 fixed inset-0 flex justify-center items-center">
            <div onclick="event.stopPropagation()" id="modalBody" class="bg-black text-white w-110 h-130 rounded-2xl p-2 flex flex-col  gap-3 ">
                
            </div>
        </div>

    </section>
@endsection