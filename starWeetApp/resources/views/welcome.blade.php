<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">


<div class="text-center">
    <h1 class="text-3xl font-bold">Home Page</h1>
    <button class="mt-5 bg-blue-500 text-white px-6 py-3 cursor-pointer rounded-md hover:bg-blue-600" onclick="openModal('register-modal')">Cadastrar</button>
    <button class="mt-5 bg-blue-500 text-white px-6 py-3 cursor-pointer rounded-md hover:bg-blue-600" onclick="openModal('login-modal')">Entrar</button>
</div>

<!-- Modal (Invisível inicialmente) -->
<div id="modalOverlay"  class="hidden fixed inset-0 flex justify-center items-center">
    <div id="modalContainer" class=" bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between items-center" style="width: 500px; height: 600px">
        <div class="flex justify-between items-center w-full ">
            <img width="70" height="70" src="/image/starlogo.jpg" alt="">
            <button onclick="fecharModal()" class="text-gray-600 hover:text-gray-900">&times;</button>
        </div>
        <div id="modalBody" class="mt-4 " style="height: 500px">
            
        </div>
    </div>
</div>

<script>
    function openModal(modalName) {
        $.ajax({
            url: "/modal-content",  // Rota fixa
            type: "GET",
            data: { model: modalName },  // Passando o nome do model como parâmetro
            success: function(data) {
                $("#modalBody").html(data);
                $("#modalOverlay").removeClass("hidden");
            }
        });
    }

    function fecharModal() {
        $("#modalOverlay").addClass("hidden");
    }
</script>

</body>
</html>
