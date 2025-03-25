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
        var formData = new FormData(); 
        var file = $("#post_image")[0].files[0];

        formData.append("content", $("#content").val()); 
        if (file) {
            formData.append("post_image", file); 
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

function like(postId){
        let likeCount = $("#like-count_"+postId);
        $.ajax({
            url: "/like/" + postId,
            type: "GET",
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
            success: function(response) {
                likeCount.text(response.likes_count);
            },
            error: function(xhr) {
                alert("Erro: " + xhr.responseJSON.error);
            }
        });
}
function closeModalPosts(){
    $("#modalPosts").addClass("hidden");
}
function openModal(modalName, post_id) {
    $.ajax({
        url: "/modal-content",  
        type: "GET",
        data: { modal: modalName,
                post_id: post_id
         },  
        success: function(data) {
            $("#modalBody").html(data);
            $("#modalPosts").removeClass("hidden");
        }, 
        error: function(){
            alert('deu errado');
        }
    });
}

function followUser(user_id){
    //$("btn-follow").addClass("hidden");
    
    $.ajax({
        url: "/follow/" + user_id,  
        type: "GET", 
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
        success: function(data) {
            //alert(data.message);
            $("#btn-follow").addClass("hidden");
            $("#btn-unfollow").removeClass("hidden");
        }, 
        error: function(){
            alert('deu errado');
        }
    });
}
function unfollowUser(user_id){
    $.ajax({
        url: "/unfollow/" + user_id,  
        type: "GET", 
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
        success: function(data) {
            //alert(data.message);
            $("#btn-unfollow").addClass("hidden");
            $("#btn-follow").removeClass("hidden");
        }, 
        error: function(){
            alert('deu errado');
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-post").forEach(button => {
        button.addEventListener("click", function () {
            let postId = this.dataset.id;
            let postElement = document.getElementById(`post-${postId}`);

            fetch(`/delete/posts/${postId}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    postElement.remove();
                }
            })
            .catch(error => console.error("Erro ao excluir:", error));
        });
    });
});

function updateCount(element) {
    const textarea = document.getElementById("content");
    const charCount = document.getElementById("charCount");
    charCount.textContent = `${textarea.value.length}/256 caracteres`;
    //alert(element.scrollHeight);
    element.style.height = "auto"; // Reseta a altura
    element.style.height = (element.scrollHeight) + "px";
}

function previewImage() {
    const file = document.getElementById('post_image').files[0];
    const reader = new FileReader();

    document.getElementById('post_image').value = '';
    
    reader.onload = function(e) {
        const imagePreview = document.getElementById('imagePreview');
        const DivimagePreview = document.getElementById('DivimagePreview');
        imagePreview.src = e.target.result; // Define a imagem carregada
        DivimagePreview.classList.remove('hidden'); // Torna a imagem visível
        imagePreview.classList.remove('hidden'); // Torna a imagem visível
    }

    if (file) {
        reader.readAsDataURL(file); // Lê a imagem como URL
    }
}
function closeImagePreview(){

    const imagePreview = document.getElementById('imagePreview');
    const DivimagePreview = document.getElementById('DivimagePreview');
    DivimagePreview.classList.add('hidden'); // Torna a imagem visível
    imagePreview.classList.add('hidden');

}
function previewImageEditCoverImage(){
    const file = document.getElementById('cover_image').files[0];
    const reader = new FileReader();
    
    reader.onload = function(e) {
        const imagePreview = document.getElementById('cover_image_preview');
        imagePreview.src = e.target.result; // Define a imagem carregada
    }

    if (file) {
        reader.readAsDataURL(file); // Lê a imagem como URL
    }
}
function previewImageEditAvatarImage(){
    const file = document.getElementById('avatar_image').files[0];
    const reader = new FileReader();

    document.getElementById('avatar_image').value = '';
    
    reader.onload = function(e) {
        const imagePreview = document.getElementById('avatar_image_preview');
        imagePreview.src = e.target.result; // Define a imagem carregada
    }

    if (file) {
        reader.readAsDataURL(file); // Lê a imagem como URL
    }
}