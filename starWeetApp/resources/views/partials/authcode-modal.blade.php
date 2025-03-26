<div class=" h-full flex flex-col p-5 bg-black rounded-lg shadow-md">
    <div class="text-white text-3xl font-bold flex flex-col">
        <h2>Enviamos um email para:</h2>
        <span>{{$email}}</span>
    </div>
    
    <form class="text-white flex flex-col gap-10" id="formConfirCode">
        @csrf
        <input type="email" id="email" name="email" value="{{$email}}" hidden >
        <input type="text" id="name" name="name" value="{{$name}}" hidden >
        <div class="input-group w-auto flex ">
            <input type="text" id="verification_code" name="verification_code" autocomplete="off" placeholder="REQ2QW" maxlength="6" class="input border border-[#9e9e9e] w-full h-12" required>
            <label for="name" class="user-label">Código</label>
        </div>
        <button id="btn_confirmcode" class="cursor-pointer w-full h-12 border-2 border-[#9e9e9e] flex justify-center items-center rounded-2xl" type="button">Verificar email</button>
    </form>
    <div>
        @if (session('messageErrorCode'))
            <p>{{session('messageErrorCode')}}</p>
        @endif
    </div>
</div>
