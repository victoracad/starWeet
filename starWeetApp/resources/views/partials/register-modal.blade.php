<div class=" h-full flex flex-col p-5 gap-10 bg-black text-white rounded-lg shadow-md">
    <h2 onclick="test()" class="text-4xl font-bold">Crie uma conta</h2>
    <form class="flex flex-col gap-5" id="formEmailCod">
        @csrf
        <div class="input-group w-auto flex ">
            <input type="text" id="name" name="name" autocomplete="off" class="input border border-[#9e9e9e] w-full h-12" required>
            <label for="name" class="user-label">Nome</label>
        </div>

        <div class="input-group w-auto flex ">
            <input type="email" id="email" name="email" class="input border border-[#9e9e9e] w-full h-12" >
            <label for="email" class="user-label ">Email</label>
        </div>
        
        <div class="flex justify-end">
            <button type="button" class="border border-[#9e9e9e] bg-[#9e9e9e]/50 flex justify-center items-center w-full h-12 rounded-3xl font-bold text-2xl" type="submit" id="btn-sendEmail">Avançar</button>
        </div>
        
    </form>

    <div>
        @if (session('messageErrorRegister'))
            <p>{{session('messageErrorRegister')}}</p>
        @endif
    </div>
</div>
