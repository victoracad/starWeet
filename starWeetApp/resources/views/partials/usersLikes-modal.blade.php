<div class="flex flex-row justify-between">
    <h1>Pessoas que curtiram esse post:</h1>
    <button onclick="closeModalPosts()" class="border cursor-pointer">fechar</button>
</div>
@foreach ($users as $user)
<div class="border">
    <div>
        <img class="w-10 h-10" src="/img/avatar_images/{{$user->profile->avatar_image}}" alt="">
    </div>
    <div>
        {{$user->profile->name}}
        {{$user->username}}
    </div>
</div>
@endforeach
