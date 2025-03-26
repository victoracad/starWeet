<div class=" h-full flex flex-col p-5 bg-black text-white rounded-lg shadow-md">
    <h2 class="font-bold text-3xl  mb-5">Crie uma senha</h2>
    <form class="flex flex-col gap-4 text-white" id="formConfirCode">
        @csrf
        <input type="email" id="email" name="email" value="{{$email}}" hidden >
        <input type="text" id="name" name="name" value="{{$name}}" hidden >
        <div class="input-group w-auto flex ">
            <input type="password" id="password" name="password" autocomplete="off" class="input border border-[#9e9e9e] w-full h-12" required>
            <label for="password" class="user-label">Senha</label>
        </div>
        <input hidden style="border: 1px solid black" type="password" id="password" name="password" placeholder="Senha" required>
        <button hidden style="border: 1px solid black; cursor: pointer" type="submit" onclick="CreateUser()" >Inscrever-se</button>
        <button id="btn_createuser" class="cursor-pointer w-full h-12 border-2 border-[#9e9e9e] flex justify-center items-center rounded-2xl" type="button">Criar conta</button>
    </form>
    <div>
        @if (session('message'))
            <p>{{session('message')}}</p>
        @endif
    </div>
</div>
