<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background-color: rgb(172, 171, 171);
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        section{
            width: 400px;
            height: 800px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
</head>
<body>
    <section>
        <div id="imageStar">
            <img src="/image/starlogo.jpg" alt="">
        </div>
        <div>
            <h1>Confirme seu endereço de e-mail, {{$dados['name']}}</h1>
            <p>Você precisa concluir uma etapa rápida antes de criar sua conta do StarSweet. Vamos confirmar se este é seu endereço de e-mail correto. Confirme se este é o endereço correto a ser usado na sua nova conta.</p>
            <p>Insira este código de verificação para começar a usar o StarSweet:</p>
            <h2>{{$dados['cod']}}</h2>
            <p>Os códigos de verificação expiram depois de duas horas.</p>

            <p>Obrigado</p>
            <p>StarSweet</p>
        </div>
    </section>
</body>
</html>
