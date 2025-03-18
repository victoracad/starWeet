<div class="flex flex-col p-5 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold">Faça login com sua conta STARSWEET</h2>
    <form style="display: flex ; flex-direction: column" id="formEmailCod">
        @csrf
        <input style="border: 1px solid black" type="email" id="email" name="email" placeholder="Email" required>
        <input style="border: 1px solid black" type="password" id="password" name="password" placeholder="Senha" required>
        <button style="border: 1px solid black; cursor: pointer" type="submit"  onclick="userLogin()" >Avançar</button>
    </form>
    <div>
        @if (session('messageErrorLogin'))
            <p>{{session('messageErrorLogin')}}</p>
        @endif
    </div>
</div>
