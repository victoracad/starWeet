
/**SISTEMA DE AUTENTICAÇÃO, CODIGOS DE ASSINCRONISMO E TESTE NO FRONTEND */
var nameRequired = false;
var emailRequired = false;
var codRequired = false;
var passRequired = false;
document.addEventListener("input", function (event) { //Função verifica se o campo email está certo (MODAL: REGISTER)
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (event.target && event.target.id === "email") {
        if(!regex.test($("#email").val())){
            
            $("#email").removeClass("border-red-500 border-[#9e9e9e]");
            $("#email").addClass("border-red-500");
            $("#btn-sendEmail").removeClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]")
            $("#btn-sendEmail").addClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
            $("#btn-login").removeClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]")
            $("#btn-login").addClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
            emailRequired = false
        }else{
            $("#email").removeClass("border-[#9e9e9e] border-red-500");
            $("#email").addClass("border-[#1a73e8]"); 
            emailRequired = true
            if(nameRequired && emailRequired){
                $("#btn-sendEmail").removeClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
                $("#btn-sendEmail").addClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]");
            }
            if(emailRequired && passRequired){
                $("#btn-login").removeClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
                $("#btn-login").addClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]");
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
document.addEventListener("input", function (event) { //Função verifica se o campo verification_code está certo (MODAL: AUTHCODE)
    if (event.target && event.target.id === "verification_code") {
        if($("#verification_code").val().split('').length < 6 ){ //Input do Código não está certo
            $("#verification_code").removeClass("border-[#9e9e9e] border-red-500");
            $("#verification_code").addClass("border-red-500");
            $("#btn_confirmcode").removeClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]")
            $("#btn_confirmcode").addClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
            codRequired = false
        }else{ //input name ESTá certo
            $("#verification_code").removeClass("border-[#9e9e9e] border-red-500");
            $("#verification_code").addClass("border-[#1a73e8]"); 
            codRequired = true
            if(codRequired){//Os dois campos estão preechidos corretamente
                $("#btn_confirmcode").removeClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
                $("#btn_confirmcode").addClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]");
            }
        }
    }
});
document.addEventListener("input", function (event) { //Função verifica se o campo password está certo (MODAL: PASSWORD)
    if (event.target && event.target.id === "password") {
        if($("#password").val().split('').length < 8 ){ //Input do Password não está certo
            $("#password").removeClass("border-[#9e9e9e] border-red-500");
            $("#password").addClass("border-red-500");
            $("#btn_createuser").removeClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]")
            $("#btn_createuser").addClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
            $("#btn-login").removeClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]")
            $("#btn-login").addClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
            passRequired = false
        }else{ //input password ESTÁ certo
            $("#password").removeClass("border-[#9e9e9e] border-red-500");
            $("#password").addClass("border-[#1a73e8]"); 
            passRequired = true
            if(passRequired){//Os dois campos estão preechidos corretamente
                $("#btn_createuser").removeClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
                $("#btn_createuser").addClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]");
            }
            if(emailRequired && passRequired){
                $("#btn-login").removeClass("bg-[#9e9e9e]/50 border-[#9e9e9e]")
                $("#btn-login").addClass("border-[#1a73e8] cursor-pointer bg-[#1a73e8]");
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
document.addEventListener("click", function (event) { //Função que verifica o campo de senha e cria o usuário   
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (event.target && event.target.id === "btn-login"){
        if($("#email").val() != '' && regex.test($("#email").val()) && $("#password").val().split('').length > 7 ){
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
    }
});
document.addEventListener("click", function (event) { //Função que fecha o Modal de autenticação   
    if (event.target && event.target.id === "closeModal" || event.target && event.target.id === "modalOverlay"){
        $("#modalOverlay").addClass("hidden");
    }
});

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