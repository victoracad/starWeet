<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>
<body class="border h-screen flex items-center bg-black">
    @yield('content')

    <script src="/js/post.js"></script>
    <script src="/js/auth.js"></script>
</body>
<script>
    function openModal(modalName) {
        $.ajax({
            url: "/modal-content",  
            type: "GET",
            data: { modal: modalName },  
            success: function(data) {
                $("#modalBody").html(data);
                $("#modalOverlay").removeClass("hidden");
            }
        });
    }

    function fecharModal() {
        $("#modalOverlay").addClass("hidden");
    }

    function userLogin(){
        event.preventDefault(); 
        $("#modalBody").addClass("hidden");
        $("#loading").show();
        $.ajax({
            url: "/login-action",  
            type: "GET",
            data: { email: $("#email").val(),
                    password: $("#password").val(),
            },
            success: function(data) {
                $("#loading").hide();
                $("#modalBody").removeClass("hidden");
                if(data){
                    $("#modalBody").html(data);
                }else{
                    window.location.href = '/home';
                }
            }
        });
    }
</script>
<style>
    .input-group {
 position: relative;
}

.input {
 /*border: solid 1.5px #9e9e9e;*/
 border-radius: 1rem;
 background: none;
 padding: 1rem;
 font-size: 1rem;
 color: #f5f5f5;
 transition: border 150ms cubic-bezier(0.4,0,0.2,1);
}

.user-label {
 position: absolute;
 left: 15px;
 color: #e8e8e8;
 pointer-events: none;
 transform: translateY(1rem);
 transition: 150ms cubic-bezier(0.4,0,0.2,1);
}

.input:focus {
 outline: none;
}

.input ~ label {
 transform: translateY(-50%) scale(0.8);
 background-color: black;
 padding: 0 .2em;
}
</style>
</html>