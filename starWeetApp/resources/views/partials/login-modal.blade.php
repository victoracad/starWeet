<div class="flex flex-col p-5 bg-black text-white rounded-lg shadow-md">
    <h2 class="text-3xl font-bold mb-5">Fazer Login</h2>
    <form class="flex flex-col gap-5" id="formEmailCod">
        @csrf
        <div class="input-group w-auto flex ">
            <input type="email" id="email" name="email" autocomplete="off" class="input border border-[#9e9e9e] w-full h-12" required>
            <label for="email" class="user-label">Email</label>
        </div>
        <div class="input-group w-auto flex ">
            <input type="password" id="password" name="password" autocomplete="off" class="input border border-[#9e9e9e] w-full h-12" required>
            <label for="password" class="user-label">Password</label>
        </div>
        <input hidden style="border: 1px solid black" type="email" id="email" name="email" placeholder="Email" required>
        <input hidden style="border: 1px solid black" type="password" id="password" name="password" placeholder="Senha" required>
        <div class="flex justify-end">
            <button type="button" class="border border-[#9e9e9e] bg-[#9e9e9e]/50 flex justify-center items-center w-full h-12 rounded-3xl font-bold text-2xl" type="submit" id="btn-login">Login</button>
        </div>
    </form>
    <div class="text-red-500 text-sm">
        @if (session('messageErrorLogin'))
            <p>{{session('messageErrorLogin')}}</p>
        @endif
    </div>
</div>
