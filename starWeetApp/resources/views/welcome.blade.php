@extends('layouts/header')

<body class="bg-black flex justify-center items-center h-screen ">

    <div class="text-center" >
        <h1 onclick="validarEmail()" class="text-3xl font-bold text-white" >Entre ou Cadastre-se na StarSweet</h1>
        <button class="mt-5 bg-blue-500 text-white px-6 py-3 cursor-pointer rounded-md hover:bg-blue-600" onclick="openModal('register-modal')">Cadastrar</button>
        <button class="mt-5 bg-blue-500 text-white px-6 py-3 cursor-pointer rounded-md hover:bg-blue-600" onclick="openModal('login-modal')">Entrar</button>
    </div>

    <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-400/50 flex justify-center items-center">

        <div id="modalContainer" class=" bg-black p-6 rounded-lg shadow-lg flex flex-col justify-center items-center" style="width: 500px; height: 600px">

            <div class="flex justify-between items-center w-full ">

                <i class="material-icons text-white" style="font-size: 55px">star_half</i>
                <i id="closeModal" style="font-size: 30px" class="material-icons cursor-pointer text-white">close</i>

            </div>

            <div id="modalBody" class="mt-4 border-2 w-[80%] " style="height: 500px">
                
            </div>

            <div id="loading" class="flex w-full h-full items-center justify-center" style="display: none" >
                <svg class="" viewBox="25 25 50 50">
                    <circle r="20" cy="50" cx="50"></circle>
                </svg>
            </div>
        </div>
    </div>
</body>

