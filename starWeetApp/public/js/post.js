function openPostCreate(){
    $("#modalPost").removeClass("hidden");
}
function closePostCreate(){
    $("#modalPost").addClass("hidden");
}
function CreatePost(e){
        e.preventDefault();
        $("#modalHome").addClass("hidden");
        $("#loading").show();
        var formData = new FormData(); // Criando o objeto FormData
        var file = $("#post_image")[0].files[0];

        formData.append("content", $("#content").val()); // Adicionando o conteúdo do post
        if (file) {
            formData.append("post_image", file); // Adicionando a imagem (se existir)
        }
        formData.append("_token", $('meta[name="csrf-token"]').attr("content"));
        $.ajax({
            url: "/createPost",  
            type: "POST",
            data: formData,
            contentType: false,  
            processData: false,  
            success: function(data) {
                $("#loading").hide();
                $("#modalHome").removeClass("hidden");
                closePostCreate()
            },
            error:function(){
                alert('Algo deu errado');
                $("#loading").hide();
                $("#modalHome").removeClass("hidden");
                closePostCreate()
            }
        });
}