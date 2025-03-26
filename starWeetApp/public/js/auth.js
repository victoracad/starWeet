
var nameRequired = false;
var emailRequired = false;
document.addEventListener("input", function (event) { //Função verifica se o campo email está certo (MODAL: REGISTER)
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (event.target && event.target.id === "email") {
        if(!regex.test($("#email").val())){
            
            $("#email").removeClass("border-red-500 border-[#9e9e9e]");
            $("#email").addClass("border-red-500");
            $("#btn-sendEmail").removeClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]")
            $("#btn-sendEmail").addClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
            emailRequired = false
        }else{
            $("#email").removeClass("border-[#9e9e9e] border-red-500");
            $("#email").addClass("border-[#1a73e8]"); 
            emailRequired = true
            if(nameRequired && emailRequired){
                $("#btn-sendEmail").removeClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
                $("#btn-sendEmail").addClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]");
            }
        }
    }
});
document.addEventListener("input", function (event) { //Função verifica se o campo name está certo (MODAL: REGISTER)
    if (event.target && event.target.id === "name") {
        if($("#name").val() === ''){ //Input name não está certo
            $("#name").removeClass("border-[#9e9e9e] border-red-500");
            $("#name").addClass("border-red-500");
            $("#btn-sendEmail").removeClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]")
            $("#btn-sendEmail").addClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
            nameRequired = false
        }else{ //input name ESTá certo
            $("#name").removeClass("border-[#9e9e9e] border-red-500");
            $("#name").addClass("border-[#1a73e8]"); 
            nameRequired = true
            if(nameRequired && emailRequired){//Os dois campos estão preechidos corretamente
                $("#btn-sendEmail").removeClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
                $("#btn-sendEmail").addClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]");
            }
        }
    }
});
document.addEventListener("click", function (event) { //Função que verifica se os campos estão prenchidos corretamente, e envia eles para o backend /** Função que cria o código de verificação */
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //alert('en');
    if (event.target && event.target.id === "btn-sendEmail") {
        //alert('en');
        if($("#name").val() != '' && $("#email").val() != '' && regex.test($("#email").val())){
            event.preventDefault(); 
            $("#modalBody").addClass("hidden");
            $("#loading").show();
            $.ajax({
                url: "/createcodemail",  
                type: "GET",
                data: { email: $("#email").val(),
                        name: $("#name").val(),
                },
                success: function(data) {
                    $("#loading").hide();
                    $("#modalBody").html(data);
                    $("#modalBody").removeClass("hidden");
                }
            });
        }else{

        }
    }
});
document.addEventListener("click", function (event) { //Função que verifica o campo de codigo de autenticação   
    if (event.target && event.target.id === "btn_confirmcode") {
        if($("#name").val() != '' && $("#email").val() != '' && $("#verification_code").val().split('').length == 6 ){
            event.preventDefault(); 
            $("#modalBody").addClass("hidden");
            $("#loading").show();
            $.ajax({
                url: "/confirm-code",
                type: "GET",
                data: { email: $("#email").val(),
                    verification_code: $("#verification_code").val(),
                    name: $('#name').val(),
                },
                success: function(response) {
                    $("#loading").hide();
                    $("#modalBody").removeClass("hidden");
                    $("#modalBody").html(response.view);
                },
                error(){
                    alert('deu erro')
                }
            });
        }
    }
});
document.addEventListener("click", function (event) { //Função que verifica o campo de senha e cria o usuário   
    if (event.target && event.target.id === "btn_createuser") {
        if($("#name").val() != '' && $("#email").val() != ''  && $("#password").val().split('').length > 7 ){
            event.preventDefault(); 
            $("#modalBody").addClass("hidden");
            $("#loading").show();
            $.ajax({
                url: "/createUser",  
                type: "GET",
                data: { email: $("#email").val(),
                        name: $("#name").val(),
                        password: $("#password").val()
                },
                success: function(data) {
                    $("#loading").hide();
                    $("#modalBody").removeClass("hidden");
                    if(data){
                        $("#modalBody").html(data);
                    }else{
                        window.location.href = '/home';
                    }
                    
                },
                error(){
                    alert('deu errado');
                }
            });
        }
    }
});
