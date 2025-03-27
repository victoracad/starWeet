@extends('layouts.main')
@section('title', $user->profile->name)
@section('home')
<form class="flex flex-col gap-1 text-white" action="/update_profile" method="POST" enctype="multipart/form-data">
    <div class="relative h-80">
        <div class="relative h-60">
            <img class="w-full h-full object-cover" id="cover_image_preview" src="/img/cover_images/{{$user->profile->cover_image}}" alt="">
            <input onchange="previewImageEditCoverImage()" type="file" class="hidden" id="cover_image" name="cover_image" placeholder="Imagem de capa">
            <label for="cover_image"><i class="material-icons absolute bottom-[40%] right-[45%] bg-gray-700/50 rounded-full p-2 text-white cursor-pointer">add_a_photo</i></label>
        </div>
        <div class="absolute bottom-0 left-6 border-4 border-black rounded-full overflow-hidden w-40 h-40">
            <img class="z-0 w-full h-full object-cover" id="avatar_image_preview" src="/img/avatar_images/{{$user->profile->avatar_image}}" alt="">
            <input type="file" id="avatar_image" class="hidden" onchange="previewImageEditAvatarImage()" id="avatar_image" name="avatar_image" placeholder="Imagem de avatar">
            <label for="avatar_image"><i class="material-icons absolute bottom-[40%] right-[38%] bg-gray-700/50 rounded-full p-2 text-white cursor-pointer">add_a_photo</i></label>
        </div>
    </div>
    @csrf
    <div class=" flex flex-col gap-8 p-5">
        <div class="input-group w-auto flex ">
            <input type="text" name="name" autocomplete="off" class="input w-full" value="{{$user->profile->name}}">
            <label for="name" class="user-label">Nome</label>
        </div>
        <div class="input-group w-auto flex ">
            <input type="text" name="bio" autocomplete="off" class="input w-full" value="{{$user->profile->bio}}">
            <label for="name" class="user-label">Bio</label>
        </div>
        <div class="input-group w-auto flex ">
            <input type="text" name="location" autocomplete="off" class="input w-full" value="{{$user->profile->location}}">
            <label for="name" class="user-label">Localização</label>
        </div>
        <div class="input-group w-auto flex ">
            <input type="text" name="website" autocomplete="off" class="input w-full" value="{{$user->profile->website}}">
            <label for="name" class="user-label">WebSite</label>
        </div>
    </div>
    <div class=" flex justify-end pr-5">
        <input class="p-2 border cursor-pointer w-40 rounded-2xl hover:bg-[#1a73e8]" type="submit" value="Salvar">
    </div>
    
<img width="" src="" alt="">
</form>
<h1>este é o meu Profile</h1> 
@endsection
<style>
    .input-group {
 position: relative;
}

.input {
 border: solid 1.5px #9e9e9e;
 border-radius: 1rem;
 background: none;
 padding: 1rem;
 font-size: 1rem;
 color: #f5f5f5;
 transition: border 150ms cubic-bezier(0.4,0,0.2,1);
}

.user-label {
 position: absolute;
 left: 15px;
 color: #e8e8e8;
 pointer-events: none;
 transform: translateY(1rem);
 transition: 150ms cubic-bezier(0.4,0,0.2,1);
}

.input:focus, input:valid {
 outline: none;
 border: 1.5px solid #1a73e8;
}

.input:focus ~ label, input:valid ~ label {
 transform: translateY(-50%) scale(0.8);
 background-color: black;
 padding: 0 .2em;
 color: #2196f3;
}
</style>
