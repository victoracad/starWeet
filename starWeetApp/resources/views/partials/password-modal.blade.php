<div class=" h-full flex flex-col p-5 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold">Crie uma senha</h2>
    <form style="display: flex ; flex-direction: column" id="formConfirCode">
        @csrf
        <input type="email" id="email" name="email" value="{{$email}}" hidden >
        <input type="email" id="name" name="name" value="{{$name}}" hidden >
        <input type="date" id="dateBirthday" name="dateBirthday" value="{{$dateBirthday}}" hidden >
        <input style="border: 1px solid black" type="password" id="password" name="password" placeholder="Senha" required>
        <button style="border: 1px solid black; cursor: pointer" type="submit" onclick="CreateUser()" >Inscrever-se</button>
    </form>
</div>
