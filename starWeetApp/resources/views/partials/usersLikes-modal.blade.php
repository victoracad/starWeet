<div class="flex flex-row justify-between border-b">
    <div class="flex justify-end w-[62%]">
        <h1 class="text-2xl font-bold">Curtidas</h1>
    </div>
    <button onclick="closeModalPosts()" class=" cursor-pointer flex "><i class="material-icons cursor-pointer" style="font-size: 30px">close</i></button>
</div>
@foreach ($users as $user)
<div class="flex justify-between">
    <div class="flex justify-center items-center gap-2">
        <div class="w-15 h-15 rounded-full overflow-hidden">
            <img class="w-full h-full object-cover" src="/img/avatar_images/{{$user->profile->avatar_image}}" alt="">
        </div>
        <div class="flex flex-col">
            <span>{{$user->profile->name}}</span>
            <span class="text-gray-400">{{$user->username}}</span>
        </div>
    </div>
    
    <div class="flex justify-center items-center">
        <button id="btn-follow" class="border cursor-pointer rounded-2xl p-2 bg-white text-black w-30 font-bold">Seguir</button>
    </div>
</div>
@endforeach
